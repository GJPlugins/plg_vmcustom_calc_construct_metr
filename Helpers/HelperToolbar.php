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
     * @date       04.06.2021 21:49
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

    /**
     * Class HelperToolbar - работа с ToolBar Joomla
     *  1. - Добавление кнопок
     *
     * @package VCCM
     * @since   3.9
     * @auhtor  Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date    04.06.2021 21:49
     *
     */
    class HelperToolbar
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
         * @var HelperToolbar
         * @since  1.6
         */
        public static $instance;

        /**
         * HelperToolbar constructor.
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
         * @return HelperToolbar
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
         * Добавить кнопку "Свойства" в ToolBar на странице редактирования товара
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   31.05.2021 18:27
         *
         */
        public static function addButtonsInProduct(){





            \Joomla\CMS\Toolbar\ToolbarHelper::divider();
            $bar = \JToolBar::getInstance('toolbar'); //ссылка на объект JToolBar
            $title = \JText::_('Свойства'); //Надпись на кнопке

            $dhtml = '<button id="btn-properties-load" data-evt-task="getVccmSheet"  data-evt-view="product_properties_manager"   class="btn btn-small button-copy" disabled>
	                    <span class="icon-list" aria-hidden="true"></span>
	                    '.$title.'
	                  </button>' ;

            $bar->appendButton('Custom', $dhtml, 'properties');//давляем ее на тулбар
        }
    }
