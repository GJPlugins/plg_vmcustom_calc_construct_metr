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

    class VccmModelProductdetails extends \Joomla\CMS\MVC\Model\ListModel
    {
        /**
         * @var int Id товара
         * @since 3.9
         */
        public $virtuemart_product_id ;


        /**
         * @var JDatabaseDriver|null
         * @since 3.9
         */
        private $db;

        /**
         * @var string директория хранения stl файлов
         * @since 3.9
         */
        private $dirModelsStl;

        /**
         * VccmModelFields_product constructor.
         *
         * @param array $config
         * @since 3.9
         */
        public function __construct( $config = array() )
        {
            parent::__construct($config);
            $app = \Joomla\CMS\Factory::getApplication();
            $this->db = \Joomla\CMS\Factory::getDbo();


            if (!class_exists( 'VmConfig' ))require(JPATH_ROOT .'/administrator/components/com_virtuemart/helpers/config.php');
            VmConfig::loadConfig();
            $this->virtuemart_product_id = $app->input->get('virtuemart_product_id' , false , 'INT' );


            $this->dirModelsStl = plgSystemPlg_vmcustom_calc_construct_metr::$plg_params->get('dir_stl' , '/images/_stl/');


        }

        /**
         * Проверить создан для товара модель 3D
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   26.08.2021 17:03
         *
         */
        public function checkThreeD(){

            /**
             * @var VirtueMartModelProduct $productModel
             */
            $productModel = VmModel::getModel('product');
            $product = $productModel->getProduct($this->virtuemart_product_id);


            echo'<pre>';print_r( $product->slug );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;

            echo'<pre>';print_r( plgSystemPlg_vmcustom_calc_construct_metr::$plg_params );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
            die(__FILE__ .' '. __LINE__ );

            die(__FILE__ .' '. __LINE__ );

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

















