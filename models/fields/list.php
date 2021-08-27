<?php
    /**
     * @package     Joomla.Platform
     * @subpackage  Form
     *
     * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
     * @license     GNU General Public License version 2 or later; see LICENSE
     */

    defined('JPATH_PLATFORM') or die;

    use Joomla\CMS\Layout\FileLayout;


    jimport('joomla.filesystem.folder');
    jimport('joomla.filesystem.file');
    jimport('joomla.filesystem.path');

    JFormHelper::loadFieldClass('list');

    /**
     * Supports an HTML select list of files
     *
     * @since  1.7.0
     */
    class GtmFormFieldList extends JFormFieldList
    {
        /**
         * Layout to render the form field
         *
         * @var  string
         * @since 3.9
         */
//        protected $renderLayout = 'renderfield';

        protected $renderLabelLayout = 'renderlabel' ;
        protected static $IncludePath = JPATH_PLUGINS.'/system/plg_vmcustom_calc_construct_metr/models/fields/layouts' ;
        /**
         * @var array|mixed
         * @since 3.9
         */
        protected $value;
        /**
         * @var array|mixed|string
         * @since 3.9
         */
        protected $class;
        /**
         * @var SimpleXMLElement
         * @since 3.9
         */
        protected $element;

        /**
         * Method to get the field input markup for a generic list.
         * Use the multiple attribute to enable multiselect.
         *
         * @return  string  The field input markup.
         *
         * @since   3.7.0
         */
        protected function getInput()
        {
            $this->class .=  ' blg-select ng-pristine ng-valid ng-not-empty ng-touched';
            $Input = '<div class="blg-form-input">' . parent::getInput() . '</div>';

            foreach ( $this->element->xpath('option') as $option)
            {
                $value = (string) $option['value'];
                $text  = trim((string) $option) != '' ? trim((string) $option) : $value;
                $options[$value] = $text ;

                $selected = (string) $option['selected'];
                $selected = ($selected == 'true' || $selected == 'selected' || $selected == '1');
            }#END FOREACH

            if( !$selected )
            {
               $value = $options[$this->default];
            }#END IF

//            echo'<pre>';print_r( $text );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            echo'<pre>';print_r( $value  );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            echo'<pre>';print_r( $selected  );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            echo'<pre>';print_r( $options  );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            echo'<pre>';print_r( $this->default  );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            echo'<pre>';print_r( $value  );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;


//            $readOnlyLabel =  $this->value ? $this->element->option[$this->value] : $this->element->option[ $this->default ];
//            echo'<pre>';print_r(  $this->element->xpath('option')  );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            echo'<pre>';print_r( $this->element->option  );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            echo'<pre>';print_r( $this );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            die(__FILE__ .' '. __LINE__ );



            $Input .= $this->getRenderer('renders.read-only-label')->render(['value' => $value ]);

            return $Input;
        }

        /**
         * Method to get the field label markup.
         *
         * @return  string  The field label markup.
         *
         * @since   1.7.0
         */
        protected function getLabel()
        {
            return parent::getLabel();
        }


        /**
         * Get the renderer
         *
         * @param   string  $layoutId  Id to load
         *
         * @return  FileLayout
         *
         * @since   3.5
         */
        protected function getRenderer($layoutId = 'default')
        {
            $renderer = new FileLayout($layoutId);

            $renderer->setDebug($this->isDebugEnabled());
//            $renderer->setDebug(true);

            $layoutPaths = $this->getLayoutPaths();

            if ($layoutPaths)
            {
                $renderer->setIncludePaths($layoutPaths);
            }

            $renderer->addIncludePath( self::$IncludePath );
//            echo'<pre>';print_r( $renderer );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//            die(__FILE__ .' '. __LINE__ );


            return $renderer;
        }






    }
