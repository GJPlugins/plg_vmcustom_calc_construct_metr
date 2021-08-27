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
     * @date       07.06.2021 02:54
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file

    use Joomla\CMS\Date\Date;
    use Joomla\CMS\Table\Table;

    /**
     * Class TableProduct_property
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   07.06.2021 02:54
     *
     */
    class TableProduct_property extends Table
    {
        /**
         *
         * @var bool
         * @since 3.9
         */
        public $published;
        /**
         * @var string json - Параметры формы настроек свойства
         * @since 3.9
         */
        public $param;
        /**
         * Имя свойства продукта
         * @var string
         * @since 3.9
         */
        public $product_property_config_title;

        /**
         * product_property constructor.
         *
         * @param JDatabaseDriverMysqli $_db
         *
         * @since 3.9
         */
        public function __construct( JDatabaseDriverMysqli &$_db )
        {
            parent::__construct('#__plg_system_vmccm_product_property_config' , 'product_property_config_id' , $_db);

        }

        /**
         * Метод привязки ассоциативного массива или объекта к экземпляру таблицы.
         * метод связывает только те свойства, которые общедоступны и опционально
         * принимает массив свойств, которые игнорируются при привязке.
         *
         * Method to bind an associative array or object to the Table instance.This
         * method only binds properties that are publicly accessible and optionally
         * takes an array of properties to ignore when binding.
         *
         * @param array|object $src     Ассоциативный массив или объект для привязки к экземпляру таблицы.
         *                              An associative array or object to bind to the Table instance.
         * @param array|string $ignore  Необязательный массив или список свойств, разделенных пробелами, которые следует игнорировать при привязке.
         *                              An optional array or space separated list of properties to ignore while binding.
         *
         * @return  boolean     True при успехе.
         *                      True on success.
         *
         * @throws  \InvalidArgumentException
         * @since   1.7.0
         */
        public function bind( $src , $ignore = array() )
        {

            if( !is_array( $src ) )
            {
                if( parent::bind($src , $ignore) )
                {
                    return true ;
                }#END IF
                return false;
            }#END IF

            if( isset($src['param']) && is_array( $src['param'] ) )
            {
                $src['param'] = json_encode( $src['param'] );
            }

            /*else if(isset($src->param)){
                $src->param = json_encode( $src->param );
            }*/#END IF



            $Date = new Date();
            if( is_array($src) )
            {
                $src['created_on'] = $Date->toSql();
            }else{
                $src->created_on = $Date->toSql();
            }#END IF

            if( parent::bind($src , $ignore) )
            {
                return true ;
            }#END IF
            return false ;
        }






    }
