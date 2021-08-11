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
    class VccmControllerFront extends \Joomla\CMS\MVC\Controller\BaseController
    {
        /**
         * @var int id товара для которого выбрать поля
         * @since 3.9
         */
        public $virtuemart_product_id ;
        /**
         * @var array массив Ids полей для этого товара
         * @since 3.9
         */
        public $fieldProductArr = [] ;

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



            \GNZ11\Core\Js::addJproLoad(
                \Joomla\CMS\Uri\Uri::root().'plugins/system/plg_vmcustom_calc_construct_metr/assets/js/plg_vmcustom_calc_construct_metr.front.core.js' ,   false ,   false
            );



            $dataScriptOptions = [
                '__name' => 'plg_vmcustom_calc_construct_metr',
                '__type' => 'system',
            ];
            $doc = \Joomla\CMS\Factory::getDocument();
            $doc->addScriptOptions('plg_vmcustom_calc_construct_metr' , $dataScriptOptions);





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
            parent::display();
        }

        public function getFields()
        {

            /**
             * @var vccmViewFields_product $view
             */
            $view = $this->getView('Fields_product' , 'html' , 'vccmView');
            $view->addTemplatePath(JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/views/fields_product/tmpl/');
            /**
             * @var VccmModelFields_product | JModelLegacy $ModelFields_product
             */
            $ModelFields_product = $this->getModel(ucfirst('Fields_product') , 'VccmModel');
            $ModelFields_product->virtuemart_product_id = $this->virtuemart_product_id;
            $ModelFields_product->fieldProductArr = $this->fieldProductArr;

            $view->setModel($ModelFields_product , true); // true задает модель по умолчанию

            return $view->display();

        }

    }
















