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

    use Joomla\CMS\MVC\Model\ItemModel;

    defined('_JEXEC') or die; // No direct access to this file



    /**
     * Class VccmModelProperty_element_form
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   30.06.2021 07:16
     *
     */
    class VccmModelProperty_element_form extends \Joomla\CMS\MVC\Model\BaseDatabaseModel{
        /**
         * @var
         * @since 3.9
         */
        private $form;

        public function __construct( $config = array())
        {
            parent::__construct($config);

        }

        /**
         * Получить Html формы
         *
         * @param string $formName имя xml файла формы (models/forms/modify_price.xml)
         *
         * @return string HTML загруженной формы
         * @since  3.9
         * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
         * @date   30.06.2021 00:48
         *
         */
        public function getForm( string $formName = 'modify_price' , $formData = [] ): string
        {
            $options = [
                /**
                 * FormControl - Метод получения элемента управления формы. Эта строка служит контейнером для всех полей
                 * формы. Например, если есть поле с именем 'foo' и поле с именем 'bar', а элемент управления формы пуст,
                 * поля будут отображаться как: <input name="foo" />и <input name="bar" />.
                 * Однако, если для элемента управления формы установлено значение «joomla», поля будут отображаться как:
                 * <input name="joomla[foo]" />и <input name="joomla[bar]" />.
                 *
                 */
                'control' => 'param'
            ]  ;

            $this->form = \Joomla\CMS\Form\Form::getInstance('modify_price',JPATH_PLUGINS.'/system/plg_vmcustom_calc_construct_metr/models/forms/'.$formName.'.xml' , $options );
            $this->form->bind($formData);
            return $this->renderFieldset('default');
        }

        /**
         * Метод получения всех контрольных групп с меткой и вводом набора полей.
         * Method to get all control groups with label and input of a fieldset.
         *
         * @param string $name    Имя набора полей <fieldset name="default">, для которого нужно получить значения.
         *                        The name of the fieldset for which to get the values.
         * @param array  $options Любые параметры, которые нужно передать при ренденге поля.
         *                        Any options to be passed into the rendering of the field
         *
         * @return  string  Строка, содержащая html для контрольных групп
         *                  A string containing the html for the control groups
         *
         * @since   3.2.3
         */
        protected function renderFieldset( string $name, array $options = array() ): string
        {
            $fields = $this->form->getFieldset($name);

            $html = array();

            foreach ($fields as $field)
            {
                $html[] = $field->renderField($options);
            }
            return implode('', $html);
        }



    }
