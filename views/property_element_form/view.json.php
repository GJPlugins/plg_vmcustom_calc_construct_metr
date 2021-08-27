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


class vccmViewproperty_element_form extends \Joomla\CMS\MVC\View\HtmlView{

    /**
     * @var array
     * @since 3.9
     */
    protected $displayData;
    /**
     * @var string
     * @since 3.9
     */
    public $formDefault;
    /**
     * @var
     * @since 3.9
     */
    protected $form;
    /**
     * Информация о типе свойства из таблицы  #__plg_system_vmccm_property_type
     * @var array
     * @since 3.9
     */
    protected $TypeProperty;

    /**
     * @throws Exception
     * @since 3.9
     */
    public function display( $tpl = null)
    {


        $app = \Joomla\CMS\Factory::getApplication();
        $view = $app->input->get('view' , false , 'WORD' );
        $this->addTemplatePath( JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/views/'.$view.'/tmpl/' );


        $layout = $app->input->get('layout' , 'default' , 'WORD' );
        $this->setLayout($layout);



        $HelperTypeProperty = \VCCM\HelperTypeProperty::instance();
        $this->TypeProperty = $HelperTypeProperty->getTypeProperty();
        /**
         * @var \VccmModelProperty_element_form $Model
         */
        $Model = $this->getModel();
        $this->formDefault = $Model->getForm();


        $result['html'] = $this->loadTemplate($tpl);

        echo new \JResponseJson($result);
        die();
    }








}















