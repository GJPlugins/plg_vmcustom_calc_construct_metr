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
     * @date       01.06.2021 10:15
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

    /**
     * Class HelperTemplateForm
     *
     * @package VCCM
     * @since   3.9
     * @auhtor  Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date    01.06.2021 10:15
     *
     */
    class HelperTemplateForm
    {
        /**
         * Параметры(Данные ) для листа список свойств товара ()
         *
         * @param false|array $params
         *
         * @return array
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   01.06.2021 15:21
         *
         */
        protected function listProperties ( $params = array() ): array
        {
            if( !isset($params['alias']) ) $params['alias'] = 'addNewProp' ; #END IF
            return [
                'gtmSheetHeader' => 'Список свойств товара' ,
                'type' => 'ListProperties' ,
                'alias' => $params['alias'] ,
                'setting' => [
                    'sheet'=>[
                        'width' => '100' , // Ширина листа в процентах
                    ],
                ],
                'virtuemart_product_id' => $params['virtuemart_product_id'] ,
                'readOnly' => true ,

                'selectors' => [],
                'sections' => [
                    [
                        'title' => 'Новое свойство для этого товара' ,

                        'readOnly' => false ,
                        'controls' => [
                            [

                                'clickable' => true , // - определяет будет ли этот элемент кликабельным
                                'evtAction' => 'loadTemplateAddNewGroup' , // JS trigger
                                'blgCaption' => 'Добавить свойство' ,
                                'entityTypeLabel' => 'Новая группа свойств'
                            ] ,
                            [

                                'clickable' => true , // - определяет будет ли этот элемент кликабельным
                                'evtAction' => 'loadTemplateAddNewProperty' , // JS trigger
                                'blgCaption' => 'Добавить свойство' ,
                                'entityTypeLabel' => 'Добавить свойство'
                            ] ,
                        ] ,
                    ] ,
                ]
            ];
        }

        /**
         * Шаблон для создания новой группы
         *
         * @param false|array $params
         *
         * @return array
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   01.06.2021 13:57
         *
         */
        private function AddNewGroup(  $params = false ): array
        {
            if( !isset($params['alias']) ) $params['alias'] = 'AddNewGroup' ; #END IF

            return [
                'gtmSheetHeader' => 'Группа без названия' ,
                'alias' => $params['alias'] ,
                'setting' => [
                    'sheet'=>[
                        'width' => '80' , // Ширина листа в процентах
                    ],
                ],
                'readOnly' => false ,
                'sections' => [
                    [
                        'title' => 'Настройки группы' ,
                        'readOnly' => false ,
                        'controls' => [
                            [

                                'clickable' => true , // - определяет будет ли этот элемент кликабельным
                                'evtAction' => 'loadTemplateAddNewProperty' , // JS trigger
                                'blgCaption' => 'Добавить свойство' ,
                                'entityTypeLabel' => 'Добавить свойство'
                            ] ,
                        ] ,
                    ] ,
                ]
            ];
        }

        /**
         * Шаблон для создания новой группы
         *
         * @param false|array $params
         *
         * @return array
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   01.06.2021 13:57
         *
         */
        private function property(  $params = false ): array
        {
            if( !isset($params['alias']) ) $params['alias'] = 'AddNewGroup' ; #END IF

            return [
                'gtmSheetHeader' => 'Свойство без названия' ,
                'type' => 'productProperty' ,
                'alias' => $params['alias'] ,
                'setting' => [
                    'sheet'=>[
                        'width' => '80' , // Ширина листа в процентах
                    ],
                ],
                'virtuemart_product_id' => $params['virtuemart_product_id'] ,
                'readOnly' => false ,
                'selectors' => [],
                'sections' => [
                    [
                        'title' => 'Конфигурация свойства' ,
                        'readOnly' => false ,
                        'controls' => [
                            [

                                'clickable' => true , // - определяет будет ли этот элемент кликабельным
                                'evtAction' => 'loadTemplateTypeProperty' , // JS trigger
                                'blgCaption' => 'Тип свойства' ,
                                'entityTypeLabel' => 'Выберите тип свойства'
                            ] ,
                        ] ,
                    ] ,
                ]
            ];
        }

        /**
         * Шаблон для создания Списка типов свойств
         *
         * @param false|array $params
         *
         * @return array
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   01.06.2021 13:57
         *
         */
        private function TypeProperty(  $params = false ): array
        {
            if( !isset($params['alias']) ) $params['alias'] = 'TypeProperty' ; #END IF
            $HelperTypeProperty = \VCCM\HelperTypeProperty::instance();
            $allProperty = $HelperTypeProperty->getAllTypeProperty();

            return [
                'gtmSheetHeader' => 'Выберите тип' ,
                'type' => 'listTypeProperties' ,
                'alias' => $params['alias'] ,
                'setting' => [
                    'sheet'=>[
                        'width' => '80' , // Ширина листа в процентах
                    ],
                ],
                'readOnly' => true ,
                'groups' => [
                    [
                        'subhead' => 'Рекомендуемые' ,
                        'rows' => $allProperty,
                    ],
                ],
            ];
        }

        /**
         * Получить элемент
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   02.06.2021 18:45
         *
         */
        public function getElement( $type    ){
            $basePath = JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/layouts';

            switch ( $type )
            {
                case 'TypeProperty':
                    $HelperTypeProperty = \VCCM\HelperTypeProperty::instance();
                    $res = $HelperTypeProperty->getTypeProperty();
                    $res['__group_type'] = 'TypeProperty';

                    $layout = new FileLayout('gtm-sheet.gtm-sheet-section.gtm-sheet-section-editable' , $basePath , [  /*'debug' => true*/]);
                    $htmlElement = $layout->render($res);
                    break;
            }
            return [ 'html' => $htmlElement ] ;
        }


        /**
         * HelperTemplateForm constructor.
         *
         * @param $params array|object
         *
         * @throws Exception
         * @since 3.9
         */
        public function __construct( $params = [] )
        {
//            $res_addNewProp =  $this->listProperties([]);
//            $resAddNewGroup =  $this->AddNewGroup([]);
//            $resAddNewProperty =  $this->AddNewProperty([]);
            return $this;
        }
        public function getTemplate( $templateName , $params = [] ): array
        {
            switch ($templateName){
                case 'AddNewProperty':
                case 'loadProperty':
                $dataParams = $this->loadProperty( $params );
                break;
                case 'listtypepropertys' :
                    $dataParams = $this->TypeProperty( $params );
                    break ;
                default :

                    $dataParams =    $this->{$templateName}( $params ) ;
            }
            return $dataParams ;
        }
    }






















