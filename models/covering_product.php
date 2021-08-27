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
     * @date       25.08.2021 20:43
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file

    /**
     * Модель связи товара и ткани
     */

    /*use Exception;
    use JDatabaseDriver;*/
    use Joomla\CMS\Application\CMSApplication;
    use Joomla\CMS\Factory;

    /**
     * Class VccmModelCovering_product
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   25.08.2021 20:43
     *
     */
    class VccmModelCovering_product
    {

        /**
         * @var int[] Исключенные категории в которых не обрабатывать связь ткани и расположения
         * @since 3.9
         */
        protected static $excludedCategory = [
            200 , 208 , 209 , 210 , 211
        ];

        /**
         * @var CMSApplication|null
         * @since 3.9
         */
//        protected $app;
        /**
         * @var JDatabaseDriver|null
         * @since 3.9
         */
        protected $db;

        /**
         * VccmModelCovering_product constructor.
         *
         * @param $params array|object
         *
         * @throws Exception
         * @since 3.9
         */
        public function __construct( $params = [] )
        {
//            $this->app = Factory::getApplication();
            $this->db = Factory::getDbo();
            return $this;
        }

        /**
         * Получить карту тканей-покрытия
         *
         * @param VirtuemartViewProduct $view
         *
         * @return array|bool
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   25.08.2021 22:48
         */
        public function getMapCoveringProduct( VirtuemartViewProduct $view  ){

            # Если категория товара указана как исключенная
            if( in_array( $view->product->virtuemart_category_id , self::$excludedCategory ) ) return false; #END IF


            $Query = $this->db->getQuery(true) ;
            $Query->select('*')
                ->from( $this->db->quoteName('#__plg_system_vmccm_product_fabric_category_map'));
            $where = [
                $this->db->quoteName('product_id') .  '=' . $this->db->quote( $view->product->virtuemart_product_id ) ,
            ];
            $Query->where($where);
            $Query->order( 'covering_count ASC' )
                ->order( 'covering ASC' )
                ->order( 'fabric_category ASC' );
            $this->db->setQuery( $Query ) ;

            $resArray =  $this->db->loadObjectList();

            $returnArr = [] ;



            foreach ( $resArray as $item)
            {
                $returnArr[$item->covering_count][$item->covering][] = $item;
            }#END FOREACH


            if( empty( $returnArr ) )
            {
                $returnArr = $this->getEmptyMapCoveringProduct($view);
            }#END IF





            return $returnArr ;
        }

        /**
         * Получить пустой объект карты раскроя - если оно еще не создана для товара
         *
         * @param VirtuemartViewProduct $view
         *
         * @return array
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   27.08.2021 04:27
         *
         */
        protected function getEmptyMapCoveringProduct( VirtuemartViewProduct $view){
            /**
             * @var int $coveringCategoryMax - максимальное количество категорий для ткани
             */
            $coveringCategoryMax = plgSystemPlg_vmcustom_calc_construct_metr::$plg_params->get('fabric_category_max' , 6 );

            $resArr = [];

            for ($i = 0 ; $i < $coveringCategoryMax ; $i++){

                $emptyData = new stdClass();
                $emptyData->product_id = $view->product->virtuemart_product_id ;
                # Схема раскроя с одной тканью
                $emptyData->covering_count = 0 ;
                # Id ткани в схеме раскроя (не изменяется для EmptyMapCovering)
                $emptyData->covering = 1 ;
                # Категория ткани (динамически)
                $emptyData->fabric_category = $i+1;
                $emptyData->price = null ;

                $resArr[0][1][] = $emptyData;
            }



            return $resArr ;
        }


        /**
         * Сохранить карту
         *
         * @param $data
         * @param $product_data
         *
         * @throws Exception
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   25.08.2021 23:23
         *
         */
        public function storeMapCoveringProduct( $data , $product_data ){
            $virtuemart_product_id = $product_data->virtuemart_product_id ;
            $this->removeMapCoveringProduct( $virtuemart_product_id );





            $Query = $this->db->getQuery(true) ;

            $columns = [ 'product_id', 'covering_count', 'fabric_category', 'covering', 'price' ];

            # $coveringTypeID - Перебор таблиц схем раскроя
            foreach ( $data['covering'] as $coveringTypeID => $coveringType )
            {
                # $fabricIndex - строка в схеме раскроя
                foreach ( $coveringType as $fabricIndex =>  $covering)
                {
                    foreach ( $covering as $fabric_category => $price)
                    {
                        if( !$price ) $price = null ; #END IF
                        $values  =
                            $this->db->quote( $virtuemart_product_id ) . ","
                            . $this->db->quote($coveringTypeID ) . ","
                            . $this->db->quote($fabric_category ) . ","
                            . $this->db->quote( $fabricIndex ) . ","
                            . $this->db->quote( $price );
                        $Query->values( $values );
                    }#END FOREACH
                }#END FOREACH


            }#END FOREACH


            $Query->insert( $this->db->quoteName( '#__plg_system_vmccm_product_fabric_category_map' ) )->columns( $this->db->quoteName( $columns ) );

            $this->db->setQuery( $Query );

//            echo'<pre>';print_r( $Query->dump() );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            die(__FILE__ .' '. __LINE__ );

            try
            {
                // Code that may throw an Exception or Error.
                $this->db->execute();
                // throw new \Exception('Code Exception '.__FILE__.':'.__LINE__) ;
            }
            catch (\Exception $e)
            {
                $app = \Joomla\CMS\Factory::getApplication();
                $app->enqueueMessage('Ошибка при сохранении карты тканей и покрытий' , 'ERROR');
                $app->enqueueMessage($e->getMessage() , 'ERROR');
                $app->enqueueMessage(  $Query->dump()  , 'ERROR');
                // Executed only in PHP 5, will not be reached in PHP 7
//                echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
//                echo'<pre>';print_r( $e );echo'</pre>'.__FILE__.' '.__LINE__;
//                die(__FILE__ .' '. __LINE__ );
            }

        }

        /**
         * Удалить карту тканей у товара
         *
         * @param int $virtuemart_product_id
         *
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   25.08.2021 23:34
         *
         */
        private function removeMapCoveringProduct( int $virtuemart_product_id){
            $Query = $this->db->getQuery(true) ;
            $conditions = [
                $this->db->quoteName('product_id') . ' =  ' .$this->db->quote( $virtuemart_product_id )
            ];
            $Query->where($conditions);
            $Query->delete( $this->db->quoteName('#__plg_system_vmccm_product_fabric_category_map'));
            $this->db->setQuery($Query)->execute();
        }







    }
