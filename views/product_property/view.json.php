<?php
    /*******************************************************************************************************************
     *     ╔═══╗ ╔══╗ ╔═══╗ ╔════╗ ╔═══╗ ╔══╗        ╔══╗  ╔═══╗ ╔╗╔╗ ╔═══╗ ╔╗   ╔══╗ ╔═══╗ ╔╗  ╔╗ ╔═══╗ ╔╗ ╔╗ ╔════╗
     *     ║╔══╝ ║╔╗║ ║╔═╗║ ╚═╗╔═╝ ║╔══╝ ║╔═╝        ║╔╗╚╗ ║╔══╝ ║║║║ ║╔══╝ ║║   ║╔╗║ ║╔═╗║ ║║  ║║ ║╔══╝ ║╚═╝║ ╚═╗╔═╝
     *     ║║╔═╗ ║╚╝║ ║╚═╝║   ║║   ║╚══╗ ║╚═╗        ║║╚╗║ ║╚══╗ ║║║║ ║╚══╗ ║║   ║║║║ ║╚═╝║ ║╚╗╔╝║ ║╚══╗ ║╔╗ ║   ║║
     *     ║║╚╗║ ║╔╗║ ║╔╗╔╝   ║║   ║╔══╝ ╚═╗║        ║║─║║ ║╔══╝ ║╚╝║ ║╔══╝ ║║   ║║║║ ║╔══╝ ║╔╗╔╗║ ║╔══╝ ║║╚╗║   ║║
     *     ║╚═╝║ ║║║║ ║║║║    ║║   ║╚══╗ ╔═╝║        ║╚═╝║ ║╚══╗ ╚╗╔╝ ║╚══╗ ║╚═╗ ║╚╝║ ║║    ║║╚╝║║ ║╚══╗ ║║ ║║   ║║
     *     ╚═══╝ ╚╝╚╝ ╚╝╚╝    ╚╝   ╚═══╝ ╚══╝        ╚═══╝ ╚═══╝  ╚╝  ╚═══╝ ╚══╝ ╚══╝ ╚╝    ╚╝  ╚╝ ╚═══╝ ╚╝ ╚╝   ╚╝
     *------------------------------------------------------------------------------------------------------------------
     *
     * @author     Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date       08.06.2021 05:34
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);


class vccmViewproduct_Property extends \Joomla\CMS\MVC\View\HtmlView{

    /**
     * Параметры листа Свойства товара | Новое свойство
     * @var int[]
     * @since 3.9
     */
    protected $sheetSetting = [
        'width' => 80 // Ширина листа в процентах
    ];

    /**
     * @var array
     * @since 3.9
     */
    protected $displayData;
    /**
     * Html форма редактирования свойства товара
     * @var string
     * @since 3.9
     */
    protected $form;
    /**
     * @var void
     * @since 3.9
     */
    protected $EditForm;
    /**
     * Информация о типе свойства из таблицы  #__plg_system_vmccm_property_type
     * @var array
     * @since 3.9
     */
    protected $TypeProperty;
    /**
     * @var int - id свойства товара из таблицы #__plg_system_vmccm_product_property_config
     * @since 3.9
     */
    protected $product_property_config_id;

    /**
     * @throws Exception
     * @since 3.9
     */
    public function display( $tpl = null)
    {
        $app = \Joomla\CMS\Factory::getApplication();
        $view = $app->input->get('view' , false , 'WORD' );
        $this->addTemplatePath( JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/views/'.$view.'/tmpl/' );
        /**
         * @var VccmModelProduct_property $model
         */
        $model = $this->getModel();







        /**
         * Получить параметры Листа
         */
        $HelperTemplateForm = new \VCCM\HelperTemplateForm();
        // $tmpl = $app->input->get('tmpl' , false , 'WORD' );
        $result['virtuemart_product_id'] = $app->input->get('virtuemart_product_id', false , 'INT' ) ;
        $params = [
            'virtuemart_product_id' => $result['virtuemart_product_id']  ,
        ] ;
        $_tmpl_setting = $HelperTemplateForm->getTemplate( 'property' , $params );




        $this->displayData = $_tmpl_setting ;

        /**
         * Если передан product_property_config_id - id свойства продукта
         * загружаем формы редактирования свойства
         */

        if(  $this->product_property_config_id = $app->input->get('product_property_config_id' , false , 'INT') )
        {
            $product_property_config = $model->getProductProperty( $this->product_property_config_id );
            $this->EditForm = $this->getEditForm( $this->product_property_config_id , $product_property_config );
            # Заменить название свойства
            $this->displayData['gtmSheetHeader'] = $product_property_config->product_property_config_title ;

        }#END IF


        $result['html'] = $this->loadTemplate($tpl);
        $result['params']  = $_tmpl_setting ;





        echo new \JResponseJson($result);
        die();


    }

    /**
     *
     * Загрузить форму для редактирования свойства
     * @throws Exception
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   30.06.2021 08:30
     *
     */
    protected function getEditForm( $product_property_config_id , $product_property_config ): string
    {
        /**
         *
         */
        $HelperTypeProperty = \VCCM\HelperTypeProperty::instance();
        $this->TypeProperty = $HelperTypeProperty->getTypeProperty( $product_property_config->type_property_id );

        /**
         * @var \VccmModelProperty_element_form $Model
         */
        $Model = $this->getModel('Property_element_form');

        # Получить html формы
        $this->formDefault = $Model->getForm( $this->TypeProperty['type'] , $product_property_config );


        $this->addTemplatePath( JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/views/property_element_form/tmpl/' );
        $layout = 'modify_price';
        $this->setLayout($layout);

        $editForm = $this->loadTemplate();

        $this->setLayout('default');
        return $editForm;
    }

    /**
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   30.06.2021 08:27
     *
     */
    public function saveForm(): TableProduct_property
    {
        /**
         * @var $Model VccmModelProduct_property
         */
        $Model = $this->getModel();
        $resSave = $Model->saveForm( );

        \Joomla\CMS\Factory::getApplication()
            ->enqueueMessage('Свойство <b>'. $resSave->product_property_config_title . '</b> сохранено'  );
        return $resSave ;


    }


    public function deleteProperty(){
        /**
         * @var $Model VccmModelProduct_property
         */
        $Model = $this->getModel();
        $resSave = $Model->deleteProperty( );
        return $resSave ;
    }
    public function publishProperty(){
        /**
         * @var $Model VccmModelProduct_property
         */
        $Model = $this->getModel();
        $resSave = $Model->publishProperty( );
        return $resSave ;
    }

    public function unPublishProperty(){
        /**
         * @var $Model VccmModelProduct_property
         */
        $Model = $this->getModel();
        $resSave = $Model->publishProperty( true );
        return $resSave ;
    }


}















