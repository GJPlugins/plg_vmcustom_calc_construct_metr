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


    class VccmModelProduct_properties_manager extends \Joomla\CMS\MVC\Model\ListModel {
        protected $app ;
        /**
         * @var JDatabaseDriver|null
         * @since 3.9
         */
        protected $db;

        public function __construct($config = array())
        {
            parent::__construct($config);
            $this->app = \Joomla\CMS\Factory::getApplication();
            $this->db = \Joomla\CMS\Factory::getDbo();
            return $config ;
        }

        /**
         * Получить список созданных свойств для продукта
         * @param string $layout
         *
         * @return array|mixed
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   29.06.2021 12:32
         *
         */
        public function getListProductPropertyConfig( $layout = 'default')
        {

            $virtuemart_product_id = $this->app->input->get('virtuemart_product_id' , false , 'INT');

            switch ( $layout )
            {
                default :
                    $table = '#__plg_system_vmccm_product_property_config';
            }

            $Query = $this->db->getQuery(true);
            $select = [
                'ppc.*',
                $this->db->quoteName('pt.title'),
                $this->db->quoteName('pt.caption'),
                $this->db->quoteName('pt.type'),
            ];
            $Query->select($select)
                ->from($this->db->quoteName('#__plg_system_vmccm_product_property_config' , 'ppc'))
                ->leftJoin(
                    $this->db->quoteName('#__plg_system_vmccm_property_type' , 'pt')
                    . ' ON ' . $this->db->quoteName('pt.type_property_id') . '=' . $this->db->quoteName('ppc.type_property_id')
                );

            $where = [];
            if( $virtuemart_product_id )
            {
                $where[] = $this->db->quoteName('virtuemart_product_id') . '=' . $this->db->quote($virtuemart_product_id);
            }#END IF
            $Query->where($where);

            $this->db->setQuery($Query);

            $dataResult = $this->db->loadObjectList();



            return $dataResult ;

        }


    }
