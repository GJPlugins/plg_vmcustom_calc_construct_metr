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
     * @date       06.06.2021 15:14
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
    use Joomla\CMS\Layout\LayoutHelper;
    use stdClass;

    /**
     * Class HelperFormElements
     *
     * @package VCCM
     * @since   3.9
     * @auhtor  Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date    06.06.2021 15:14
     *
     */
    class HelperFormElements
    {
        /**
         * @var string путь к макетам элементов
         * @since 3.9
         */
        protected $basePath ;

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
         * @var HelperFormElements
         * @since  1.6
         */
        public static $instance;

        /**
         * HelperFormElements constructor.
         *
         * @param $params array|object
         *
         * @throws Exception
         * @since 3.9
         */
        public function __construct( $params = [] )
        {
            $this->basePath = JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/elements';


            return $this;
        }

        /**
         * @param array $options
         *
         * @return HelperFormElements
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
        public function load( $element , $data = []){

            $element->errorMessage = LayoutHelper::render('tools.error-message', null , $this->basePath , [  /*'debug' => true*/ ] );

            if( isset($element->tooltip) && !empty($element->tooltip) )
            {
                $element->tooltip = LayoutHelper::render('tools.tooltip', $element->tooltip , $this->basePath , [  /*'debug' => true*/ ] );
            }else{
                $element->tooltip = null ;
            }

            if( isset($element->button) && !empty($element->button) )
            {
                $element->button = LayoutHelper::render('tools.button', $element->button, $this->basePath , [  /*'debug' => true*/ ] );
            }else{
                $element->button = null ;
            }


            $element->data = $data ;

            switch ( $element->type )
            {
                case 'checkbox' :
                    $elementRender = $this->loadCheckbox($element);
                    break;
                case 'text' :
                    $elementRender = $this->loadText($element);
                    break;
                case 'select' :
                    $elementRender = $this->loadSelect($element);
                    break;
                default :
                    $elementRender = 'Не известный элемент';
            }
            return $elementRender ;
        }
        /**
         * Создать элемент Checkbox
         *
         * @param stdClass $data
         *
         * @return string
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   06.06.2021 15:25
         *
         */
        protected function loadCheckbox( stdClass $data  ): string
        {
           $layout = new FileLayout('checkbox', $this->basePath, [  /*'debug' => true*/ ]);
            return $layout->render( $data );
        }

        /**
         * Создать элемент Text input
         * @param stdClass $data
         *
         * @return string
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   06.06.2021 18:02
         *
         */
        protected function loadText( stdClass $data  ): string
        {
            $layout = new FileLayout('text', $this->basePath, [  /*'debug' => true*/ ]);
            return $layout->render( $data );
        }

        /**
         * Создать элемент Select
         * @param stdClass $data
         *
         * @return string
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   06.06.2021 18:02
         *
         */
        protected function loadSelect( stdClass $data  ): string
        {
            $layout = new FileLayout('select', $this->basePath, [  /*'debug' => true*/ ]);
            return $layout->render( $data );
        }
    }