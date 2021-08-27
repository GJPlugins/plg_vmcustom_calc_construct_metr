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
     * @date       08.06.2021 08:04
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

    $hideReadOnly = ' hide-read-only ';
    $veditorSectionEdit = '' ;

    $displayData = $this->displayData ;
    extract($displayData);
    extract($displayData);

    /**
     * @var $gtmSheetHeader string - заголовок листа
     * @var $readOnly bool - если true - то заголовок листа можно редактировать
     */
    if( !$readOnly )
    {
        $attrReadOnly = '';
        $hideReadOnly = '';
        $veditorSectionEdit = ' veditor__section--edit ' ; // Class - для скрытия элементов с классом - "show-read-only"
    }#END IF
    //    echo'<pre>';print_r( $displayData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;





?>
<!-- Блок заголовок  -->
<div class="gtm-veditor-section-first gtm-flex gtm-sheet-header <?= $veditorSectionEdit ?> " >
    <!-- Кнопка закрыть -->
    <i class="gtm-sheet-header__close" data-evt-action="closeSheet" role="button"></i>

    <input type="hidden" name="product_property_config_id" value="<?= $this->product_property_config_id ?>">

    <div class="gtm-flex__section gtm-sheet-header__title  ">
        <div class="gtm-veditor_entity-name">
            <div contenteditable=""
                 name="product_property_config_title"
                 data-evt-action="onKeydownActions__header__title"
                 required="1"
                 data-name-value=""
                 data-gtm-form-error-field=""
                 class="contenteditable <?= $hideReadOnly ?> ng-valid-name ng-not-empty ng-valid ng-valid-required ng-touched ng-dirty ng-valid-parse"
                 id="13-tag.data.name"
                 aria-invalid="false"
                 aria-required="true"
                 data-ng-model="ctrl.tag.data.name">
                <?= $gtmSheetHeader ?>
            </div>
            <!--<div class="contenteditable hide-read-only ng-pristine ng-untouched ng-valid-name ng-not-empty ng-valid ng-valid-required" >
                <?/*= $gtmSheetHeader */?>
            </div>-->
            <span class="show-read-only"><?= $gtmSheetHeader ?></span>
        </div>

        <div class="gtm-veditor_entity-folder" diff-field="trigger.data.parentFolderId">
            <?php
                // Элементы вне папок
                //                echo $this->sublayout('gtm-folder-dropdown' , $displayData )
            ?>


            <!---->
        </div>
    </div>

    <div class="gtm-flex__section--fixed gtm-sheet-header__actions">
        <!-- кнопка сохранить -->
        <button type="submit" data-gtm-submit-button=""
                class="btn btn-action hide-read-only left-spacer" disabled=""> Сохранить
        </button> <!---->
        <!-- Меню икон правое -->
        <ctui-bubble-icon-menu class="gtm-editor-snowman hide-read-only wd-trigger-overflow"
                               data-ng-if="::!ctrl.inCreateMode || ctrl.isEntityNotesEnabled"
                               data-icon="gtm-more-vert-icon">
            <i class="icon gtm-more-vert-icon" data-ng-class="[ctrl.icon]"
               data-ctui-bubble="" role="button">

            </i>
        </ctui-bubble-icon-menu>
        <!---->
    </div>

</div>
