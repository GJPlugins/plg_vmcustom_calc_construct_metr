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
     * @date       08.06.2021 05:23
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

    class VccmModelFields_product extends \Joomla\CMS\MVC\Model\ListModel
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
         * @var JDatabaseDriver|null
         * @since 3.9
         */
        private $db;

        /**
         * VccmModelFields_product constructor.
         *
         * @param array $config
         * @since 3.9
         */
        public function __construct( $config = array() )
        {
            parent::__construct($config);
            $this->db = \Joomla\CMS\Factory::getDbo();
        }

        public function getFieldsProduct(){

            $Query = $this->db->getQuery(true) ;
            $select = [
                'p.* ',
                't.type'
            ];
            $Query->select( $select )
                ->from( $this->db->quoteName('#__plg_system_vmccm_product_property_config' , 'p'));
            $Query->leftJoin(
                $this->db->quoteName('#__plg_system_vmccm_property_type' , 't')
                .'ON'.$this->db->quoteName('t.type_property_id').'='.$this->db->quoteName('p.type_property_id')
            );

            $where = [
                $this->db->quoteName('p.virtuemart_product_id').'='.$this->db->quote( $this->virtuemart_product_id ),
                $this->db->quoteName('p.published').'='.$this->db->quote( 1 ),
            ];
            if( !empty( $this->fieldProductArr ) )
            {
                $where[] = $this->db->quoteName('p.product_property_config_id').'IN('.implode(',',$this->fieldProductArr) .')' ;
            }#END IF
            $Query->where($where);
            $this->db->setQuery( $Query ) ;
            $fields = $this->db->loadObjectList();
            foreach ( $fields as &$field)
            {
                $field->param = json_decode($field->param) ;
            }#END FOREACH

            return $fields ;
        }
    }
