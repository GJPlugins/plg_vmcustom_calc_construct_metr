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
     * @date       08.06.2021 08:22
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

    $clickableClass = 'clickable' ;
    /**
     * Имя JS триггера
     */
    $evtAction = null ;
    $displayData = $this->control ;
    extract($displayData);


    /**
     * @var $alias string - алиас элемента управления
     * @var $clickable bool - определяет будет ли этот элемент кликабельным
     * @var $evtAction string -  Имя JS триггера
     * @var $blgCaption string - заголовок перед элементом управления
     * @var $entityTypeLabel string - Надпись на кнопке
     */

    if( !isset($clickable) ) $clickable = true ; #END IF
    if( !$clickable ) $clickableClass = '' ; #END IF

    if(  $evtAction  ) $evtAction = ' data-evt-action="'.$evtAction.'" ' ; #END IF



    //    echo'<pre>';print_r( $displayData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;


?>
<div class="entity-list-selector">

    <div diff-field="trigger.data.type">
        <!---->
        <div class="blg-form-input">
            <div class="blg-spacer1 hide-read-only"></div>
            <!-- Заголовок перед элементом управления -->
            <div class="blg-caption">
                <?= $blgCaption ?>
            </div>
            <div class="blg-spacer1 hide-in-diff"></div>

            <div class="trigger-entity-type" onclick="vmccm.SheetController.loadSheet( 'property_picker_table' )"  >
                <!-- Кнопка элемента управления  $evtAction -->
                <div   class="selected-entity-type entity-list-selector-row <?= $clickableClass ?>" role="button">
                    <div   class="entity-type-icon">
                        <i class="icon-matting gtm-trigger-pageview-icon-small"></i>
                    </div>
                    <div  class="entity-type-label blg-body-med blg-comfortable">
                        <?= $entityTypeLabel ?>
                    </div>
                </div>
            </div>



            <div class="blg-spacer1"></div>
        </div><!----> <!---->
    </div>
</div>
