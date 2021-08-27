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
     * @date       31.05.2021 15:41
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    namespace VCCM;
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

    use Exception;
    use JDatabaseDriver;
    use Joomla\CMS\Application\CMSApplication;
    use Joomla\CMS\Factory;
    use Joomla\CMS\Layout\FileLayout;
    use Joomla\CMS\Uri\Uri;

    /**
     * Class HelperProduct
     *
     * @package VCCM
     * @since   3.9
     * @auhtor  Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date    31.05.2021 15:41
     *
     */
    class HelperProduct
    {



        /**
         * @var CMSApplication|null
         * @since 3.9
         */
        protected $app;
        /**
         * @var JDatabaseDriver|null
         * @since 3.9
         */
        protected $db;
        /**
         * Array to hold the object instances
         *
         * @var HelperProduct
         * @since  1.6
         */
        public static $instance;
        /**
         * @var array
         * @since 3.9
         */
        public $returnData = [
            'html' => null,
            'virtuemart_product_id' => null,
        ];


        /**
         * HelperProduct constructor.
         *
         * @param $params array|object
         *
         * @throws Exception
         * @since 3.9
         */
        public function __construct( $params = [] )
        {
            $this->app = Factory::getApplication();
            $this->db = Factory::getDbo();

            return $this;
        }

        /**
         * @param array $options
         *
         * @return HelperProduct
         * @throws Exception
         * @since 3.9
         */
        public static function instance( $options = array() )
        {
            if( self::$instance === null )
            {
                self::$instance = new self($options);
            }
            return self::$instance;
        }

        /**
         * Точка входа FRONT. Загрузка Custom Field
         *
         * @use    echo \VCCM\HelperProduct::getFields( $virtuemart_product_id , $fieldsArr );
         *
         * @param int       $virtuemart_product_id  id продукта
         * @param array|int $fieldsArr массив id или id свойства
         *
         * @return string|null - html разметка свойств товара
         * @throws Exception
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   01.07.2021 15:55
         *
         */
        public static function getFields( int $virtuemart_product_id , $fieldsArr = [] ): ?string
        {
            if( !is_array( $fieldsArr ) )
            {
                $fieldsArr = [$fieldsArr];
            }#END IF

            \JLoader::register('VccmControllerFront' , JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/controller-front.php');
            $Controller = new \VccmControllerFront();
            $Controller->virtuemart_product_id = $virtuemart_product_id;
            $Controller->fieldProductArr = $fieldsArr ;

            return $Controller->execute( 'getFields' );
        }





        /**
         * Установить JS Options Плагина ADMIN
         * @param $product_id
         *
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   31.05.2021 19:09
         *
         */
        public static function addPluginOptions($product_id){

            $doc = \Joomla\CMS\Factory::getDocument();
            $Options = [
                'host' => \Joomla\CMS\Uri\Uri::root() ,
                'group' => 'system' ,
                'plugin' => 'plg_vmcustom_calc_construct_metr' ,
                'virtuemart_product_id' => $product_id ,

            ];
            $doc->addScriptOptions('plg_vmcustom_calc_construct_metr' , $Options ) ;
            $doc->addStyleSheet(Uri::root().'plugins/system/plg_vmcustom_calc_construct_metr/assets/css/gtm-sheet.css');
            $doc->addStyleSheet(Uri::root().'plugins/system/plg_vmcustom_calc_construct_metr/assets/fonts/tt.woff2');
            $doc->addStyleSheet( 'https://fonts.googleapis.com/icon?family=Material+Icons+Extended|Google+Material+Icons');
        }



        /**
         * Создать макет листов
         *
         * @throws Exception
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   31.05.2021 20:01
         *
         */
        public function getPropertiesList(){

            $HelperTemplateForm = new \VCCM\HelperTemplateForm();
            $basePath = JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/layouts';

            $this->returnData['virtuemart_product_id'] = $this->app->input->get('virtuemart_product_id', false , 'INT' ) ;
            $tmpl = $this->app->input->get('tmpl' , false , 'WORD' );

            if( !$tmpl )
            {
                throw new Exception( 'Не передано название шаблона листа' );
            }#END IF
            $params = [
                'virtuemart_product_id' => $this->returnData['virtuemart_product_id']  ,
            ] ;

            /**
             * Получить параметры Листа
             */
            $_tmpl_setting = $HelperTemplateForm->getTemplate( $tmpl , $params );


            $layout = 'gtm-sheet';
            if( $tmpl == 'listProperties' )
            {
                $layout = 'gtm-root-sheet';
                $View = $this->getView();
                $View->display();
                echo'<pre>';print_r( $View );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
                die(__FILE__ .' '. __LINE__ );


                $viewInput = $this->app->input->get('view' , 'properties' , 'WORD' );
                switch ($viewInput){
                    default :

                }
            }#END IF
            $_tmpl_setting['basePath'] = $basePath ;






            $layout = new FileLayout( $layout , $basePath, [  /*'debug' => true*/ ]);
            $this->returnData['html']  = $layout->render( $_tmpl_setting );
            $this->returnData['params']  = $_tmpl_setting ;

            echo new \JResponseJson($this->returnData);
            die();
        }


        /**
         * @var array Конфигурация представления
         * @since 3.9
         */
        public static $viewConfig = [
            'name' => 'propertyList' ,
            'charset' => 'UTF-8' ,
            'template_plath' => null ,
        ];

        /**
         * Получить представление View
         *
         * @return \Joomla\CMS\MVC\View\HtmlView
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   08.06.2021 04:14
         * @uses :
         *       $View = $this->getView();
         *       $View->display();
         *
         *
         */
        public function getView(): \Joomla\CMS\MVC\View\HtmlView
        {
            $view = new \Joomla\CMS\MVC\View\HtmlView(self::$viewConfig);
            $path = JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/views/propertyList/tmpl/' ;
            $view->addTemplatePath($path);
            return $view ;
        }




    }

















