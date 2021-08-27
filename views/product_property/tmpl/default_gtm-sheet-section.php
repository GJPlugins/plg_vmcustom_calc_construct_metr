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
     * @date       08.06.2021 08:09
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

    $sections = [] ;
    $sectionClass = '';
    $displayData = $this->displayData ;
    extract($displayData);

    /**
     * @var $gtmSheetHeader string - заголовок листа
     * @var $sections       array - Массив содержащий секции лист [
     *                          'title'=> string , - Заголовок секции
     *                          'controls'=> [
     *
     *                              ] , - Элементы управления для секции
     *                          ]
     */







    foreach ($sections as $i => $section)
    {


        if( !isset( $section['controls'] ) ) $section['controls'] = [] ; #END IF
        if( !isset( $section['readOnly'] ) ) $section['readOnly'] = false ; #END IF

        if( $section['readOnly'] )
        {
            $sectionClass = ' gtm-read-only veditor__section--read-only ' ;
        }#END IF



        ?>
        <!-- layouts/gtm-sheet/gtm-sheet-section.php -->
        <gtm-veditor-section step-order="1">
            <div  class="gtm-veditor-section ng-pristine ng-valid  <?= $sectionClass ?>  ng-valid-css-selector ng-valid-predicate ng-valid-regex"
                  role="button">
                <div class="gtm-veditor-index-container">
                    <div class="gtm-veditor-title"  role="button">
                        <section-title><?= $section['title'] ?></section-title>
                    </div>
                    <div class="veditor__section__content"
                         data-ng-transclude="section-content">
                        <section-content>


                            <?php

                                foreach ( $section['controls'] as $control)
                                {
                                    $this->control =  $control ;



                                    # Элементы управления   Выберите тип свойства
                                    echo $this->loadTemplate('gtm-sheet-section-controls'   ) ;


                                    # Условия активации триггера
//                                    echo $this->sublayout('___options' , $control ) ;


                                }#END FOREACH
                            ?>
                            <!---->

                        </section-content>
                    </div>
                </div>
                <?php
                    // Если секции запрещено взаимодействие
                    if($section['readOnly'])
                    {
                        ?>
                        <div class="gtm-veditor-section-overlay"></div>
                        <?php

                    }#END IF
                ?>

            </div>
        </gtm-veditor-section>

        <?php
    }#END FOREACH


    if( $displayData['alias'] == 'AddNewGroup' )
    {
        #  Конфигурация тега  - настройка типа свойства
//        echo $this->sublayout('gtm-sheet-section-editable' , $displayData ) ;
    }#END IF

