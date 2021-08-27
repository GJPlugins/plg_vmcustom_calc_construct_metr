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
     * @date       01.07.2021 06:50
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file


?>
<div class="card-actions__bulk" data-ng-if="ctrl.canEditDraft &amp;&amp; ctrl.hasSelectedItems()">
    <!---->
    <div class="separator" data-ng-if="::ctrl.isTagPausingEnabled"></div>
    <!---->
<!--    <button class="icon gtm-trigger-temp-icon icon--button" title="Изменить триггеры" data-ng-click="ctrl.openBulkTriggerEditor()"> </button>-->
    <!---->
    <button class="icon icon-play-circle-filled icon--button"
            onclick="vmccm.ListController.playCheckedLine(this)" title="Возобновить">
    </button>
    <!---->
    <button class="icon icon-pause-circle-filled icon--button"
            onclick="vmccm.ListController.pauseCheckedLine(this)" title="Приостановить"> </button>
    <!---->
    <!---->
    <div class="separator" data-ng-if="::ctrl.isTagPausingEnabled"></div>
    <!---->
<!--    <button class="icon icon-drive-file-move-outline icon--button" data-ng-click="ctrl.moveToFolder()" title="Переместить в папку"> </button>-->
    <button class="icon icon-delete icon--button" onclick="vmccm.ListController.removeCheckedLine(this)" title="Удалить"> </button>
    <!---->
    <ctui-bubble-icon-menu class="gtm-editor-snowman" data-ng-if="::ctrl.isTagPausingEnabled">
        <i class="icon icon-more-vert" data-ng-class="[ctrl.icon]" data-ctui-bubble="" role="button"></i>
    </ctui-bubble-icon-menu>
    <!---->
</div>
