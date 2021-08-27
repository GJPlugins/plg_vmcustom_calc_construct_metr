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
     * @date       02.06.2021 15:43
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
     * Class HelperTypeProperty
     *
     * @package VCCM
     * @since   3.9
     * @auhtor  Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date    02.06.2021 15:43
     *
     */
    class HelperTypeProperty
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
         * @var HelperTypeProperty
         * @since  1.6
         */
        public static $instance;

        /**
         * HelperTypeProperty constructor.
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
         * @return HelperTypeProperty
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
         * Получить все типы свойств
         * @return array|mixed
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   02.06.2021 18:58
         *
         */
        public function getAllTypeProperty(){
            $Query = $this->db->getQuery(true) ;
            $Query->select('*')
                ->from( $this->db->quoteName('#__plg_system_vmccm_property_type'));
            $where = [
                $this->db->quoteName('published') .'='. $this->db->quote(1)
            ];
            $Query->where($where);
            $this->db->setQuery( $Query ) ;
            return $this->db->loadAssocList();
        }

        /**
         * Получить единственный тип свойства
         *
         * @throws Exception
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   02.06.2021 19:03
         *
         */
        public function getTypeProperty( $type_property_id = 0  ){
            if( !$type_property_id )
            {
                $type_property_id = $this->app->input->get('type_property_id' , 0 , 'INT' );
                if( !$type_property_id )
                {
                    throw new Exception("Не передан type_property_id");
                }#END IF
            }#END IF
            $Query = $this->db->getQuery(true) ;
            $Query->select('*')
                ->from( $this->db->quoteName('#__plg_system_vmccm_property_type'));
            $where = [
                $this->db->quoteName('type_property_id') .'='. $this->db->quote( $type_property_id ),
                $this->db->quoteName('published') .'='. $this->db->quote(1),
            ];
            $Query->where($where);
            $this->db->setQuery( $Query ) ;
            return $this->db->loadAssoc();


        }
    }















