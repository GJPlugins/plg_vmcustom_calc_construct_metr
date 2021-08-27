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


    class VccmModelProduct_property extends JModelItem {
        protected $app ;
        private $_ids ;
        public $operation_modification = ['+' , '-' ,  ];
        public function __construct($config = array())
        {
            parent::__construct($config);
            $this->app = \Joomla\CMS\Factory::getApplication();

            \JLoader::register( 'TableProduct_property', JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/tables/product_property.php' );

            $this->_ids = $this->app->input->get('ids' , [] , 'ARRAY' );
            return $config ;
        }

        public function getProductProperty($product_property_config_id){
            /**
             * @var TableProduct_property $table
             */
            $table = \Joomla\CMS\Table\Table::getInstance('product_property', 'Table', array());
            $table->load( $product_property_config_id );
            $table->param = json_decode( $table->param);

            if( !$table->param )
            {
                $table->param = new stdClass();
            }#END IF

            foreach ( $table->param as $key => $item)
            {
                $table->{$key} = $item ;
            }#END FOREACH
            return $table ;
        }

        /**
         * Сохранить форму свойства продукта
         *
         * @return TableProduct_property
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   01.07.2021 03:13
         *
         */
        public function saveForm(): TableProduct_property
        {
            $dataForm = $this->app->input->get('dataForm' , false , 'RAV') ;
            parse_str( $dataForm, $params);

            try
            {
                /**
                 * @var TableProduct_property $table #__plg_system_vmccm_product_property_config
                 */
                $table = \Joomla\CMS\Table\Table::getInstance('product_property', 'Table', array());

                $table->bind($params);
                $table->store();

                // throw new \Exception('Code Exception '.__FILE__.':'.__LINE__) ;
            }
            catch (\Exception $e)
            {
                // Executed only in PHP 5, will not be reached in PHP 7
                echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
                echo'<pre>';print_r( $e );echo'</pre>'.__FILE__.' '.__LINE__;
                die(__FILE__ .' '. __LINE__ );
            }

            return $table ;

        }

        /**
         * Удаление свойств у товара
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   01.07.2021 08:02
         *
         */
        public function deleteProperty(): bool
        {
            $this->_ids = $this->app->input->get('ids' , [] , 'ARRAY' );
            if( count( $this->_ids ) )
            {
                foreach ( $this->_ids as $id)
                {
                    /**
                     * @var TableProduct_property $table #__plg_system_vmccm_product_property_config
                     */
                    $table = \Joomla\CMS\Table\Table::getInstance('product_property', 'Table', array());
                    try
                    {
                        $table->delete( $id ) ;
                    }
                    catch (\Exception $e)
                    {
                        $this->app->enqueueMessage('Ошибка при удалении свойства' , 'error' );
                        return false ;
                    }
                }#END FOREACH
            }#END IF
            $this->app->enqueueMessage('Удалено' );
            return true ;
        }

        /**
         * Опубликовать или снять с публикации свойство продукта
         * @param false $unPublishProperty
         *
         * @return bool
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   01.07.2021 10:16
         *
         */
        public function publishProperty( $unPublishProperty = false ): bool
        {
            if( count( $this->_ids ) )
            {
                foreach ( $this->_ids as $id)
                {

                    $params = [
                        'product_property_config_id' => $id ,
                        'published' => !$unPublishProperty ? 1 : 0  ,
                    ] ;

                    /**
                     * @var TableProduct_property $table #__plg_system_vmccm_product_property_config
                     */
                    $table = \Joomla\CMS\Table\Table::getInstance('product_property', 'Table', array());
                    try
                    {
                        $table->bind($params);
                        $table->store();

                    }
                    catch (\Exception $e)
                    {
                        $this->app->enqueueMessage('Ошибка при удалении свойства' , 'error' );
                        return false ;
                    }
                }#END FOREACH
            }#END IF
            $resTxt = !$unPublishProperty? 'Опубликовано' : 'Приостановлено' ;
            $this->app->enqueueMessage( $resTxt );
            return true ;
        }

    }






















