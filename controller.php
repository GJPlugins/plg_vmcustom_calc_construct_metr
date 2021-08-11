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
     * @date       08.06.2021 05:06
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);




    /**
     * Class vccm
     *
     * @uses :
     *      $task = $this->app->input->get('task' , false , 'STRING');
     *      JLoader::register('VccmController' , JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/controller.php');
     *      $Controller = new VccmController();
     *      $Controller->execute($task);
     *      return ;
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   08.06.2021 05:06
     *
     */
    class VccmController extends \Joomla\CMS\MVC\Controller\BaseController
    {


        /**
         * vccm constructor.
         *
         * @param array $config
         *
         * @since 3.9
         */
        public function __construct( $config = [] )
        {
            parent::__construct($config);
            $this->registerDefaultTask('display');
            $this->registerTask('getSheet', 'getSheet');
            $this->addViewPath( JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/views/' );

            \Joomla\CMS\MVC\Model\BaseDatabaseModel::addIncludePath( JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/models','VccmModel');
            \Joomla\CMS\Table\Table::addIncludePath( JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/tables');
            return $this;
        }

        /**
         *
         * @param false $cachable
         * @param false $urlparams
         *
         * @return JControllerLegacy|void
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   23.06.2021 23:19
         *
         */
        public function display($cachable = false, $urlparams = false)
        {
            $vName = $this->input->getCmd('view', 'properties');
            $this->input->set('view', $vName);
            parent::display();
        }

        /**
         * Получить лист VCCM
         *
         * @throws Exception
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   23.06.2021 23:14
         *
         */
        public function getSheet(){

            $nameView = $this->input->getCmd('view', 'product_property');
            /**
             * @var vccmViewproduct_properties_manager | vccmViewproduct_Property | vccmViewproperty_picker_table  $view
             */
            $view = $this->getView($nameView , 'json');

            /**
             * @var VccmModelProduct_properties_manager | VccmModelProduct_property | VccmModelProperty_picker_table  | JModelLegacy $Model
             */
            $Model = $this->getModel(ucfirst( $nameView ) , 'VccmModel' );
            $view->setModel( $Model , true); // true задает модель по умолчанию

            /**
             * @var VccmModelProperty_element_form | JModelLegacy   $ModelProperty_element_form
             */
            $ModelProperty_element_form = $this->getModel( 'Property_element_form' , 'VccmModel' );
            $view->setModel( $ModelProperty_element_form );

            parent::display();
        }

        /**
         *
         * @return array
         * @throws Exception
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   30.06.2021 06:53
         *
         *
         *
         */
        public function getElement(){
            /**
             * @var vccmViewproduct_Property $view
             */
            $nameView = $this->input->getCmd('view', 'property_element_form');

            $view = $this->getView($nameView , 'json');
            $ModelProperty_element_form = $this->getModel(ucfirst( $nameView ) , 'VccmModel' );
            $view->setModel( $ModelProperty_element_form , true); // true задает модель по умолчанию

            parent::display();
//            echo'<pre>';print_r( $view );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
            die(__FILE__ .' '. __LINE__ );


            $type = $this->input->get('type' , false , 'WORD' );
            $HelperTemplateForm = new \VCCM\HelperTemplateForm();
            $DataResult = $HelperTemplateForm->getElement($type);

            return $DataResult ;
        }

        /**
         * Сохранение формы редактирования типа свойства товара
         * @throws Exception
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   29.06.2021 08:01
         *
         */
        public function saveForm(){
            /**
             * Подключение модели
             */
            $nameView = $this->input->getCmd('view', 'product_property');
            /**
             * @var vccmViewproduct_properties_manager | vccmViewproduct_Property | vccmViewproperty_picker_table  $view
             */
            $view = $this->getView($nameView , 'json');
            /**
             * @var VccmModelProduct_properties_manager | VccmModelProduct_property | VccmModelProperty_picker_table  | JModelLegacy $Model1
             */
            $Model1 = $this->getModel(ucfirst( $nameView ) , 'VccmModel' );
            $view->setModel( $Model1 , true); // true задает модель по умолчанию
            $res = $view->saveForm();

            return $res;
        }
        public function unPublishProperty(){
            /**
             * Подключение модели
             */
            $nameView = $this->input->getCmd('view', 'product_property');
            /**
             * @var vccmViewproduct_properties_manager | vccmViewproduct_Property | vccmViewproperty_picker_table  $view
             */
            $view = $this->getView($nameView , 'json');
            /**
             * @var VccmModelProduct_properties_manager | VccmModelProduct_property | VccmModelProperty_picker_table  | JModelLegacy $Model1
             */
            $Model1 = $this->getModel(ucfirst( $nameView ) , 'VccmModel' );
            $view->setModel( $Model1 , true); // true задает модель по умолчанию
            $res = $view->unPublishProperty();
        }
        public function publishProperty(){
            /**
             * Подключение модели
             */
            $nameView = $this->input->getCmd('view', 'product_property');
            /**
             * @var vccmViewproduct_properties_manager | vccmViewproduct_Property | vccmViewproperty_picker_table  $view
             */
            $view = $this->getView($nameView , 'json');
            /**
             * @var VccmModelProduct_properties_manager | VccmModelProduct_property | VccmModelProperty_picker_table  | JModelLegacy $Model1
             */
            $Model1 = $this->getModel(ucfirst( $nameView ) , 'VccmModel' );
            $view->setModel( $Model1 , true); // true задает модель по умолчанию
            $res = $view->publishProperty();

            return $res;
        }
        public function deleteProperty(){
            /**
             * Подключение модели
             */
            $nameView = $this->input->getCmd('view', 'product_property');
            /**
             * @var vccmViewproduct_properties_manager | vccmViewproduct_Property | vccmViewproperty_picker_table  $view
             */
            $view = $this->getView($nameView , 'json');
            /**
             * @var VccmModelProduct_properties_manager | VccmModelProduct_property | VccmModelProperty_picker_table  | JModelLegacy $Model1
             */
            $Model1 = $this->getModel(ucfirst( $nameView ) , 'VccmModel' );
            $view->setModel( $Model1 , true); // true задает модель по умолчанию
            $res = $view->deleteProperty();

            return $res;
        }

    }
















