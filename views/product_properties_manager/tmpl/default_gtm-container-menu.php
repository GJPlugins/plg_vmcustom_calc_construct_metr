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
     * @date       08.06.2021 06:16
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);


?>
<gtm-container-menu>
    <div class="gtm-container-menu">
        <div class="draft-menu-header">
            <div class="blg-caption gtm-draft-select-label">
                Управление свойствами
            </div>
            <!--<div data-ng-click="ctrl.openManageDraftSheet()"
                 class="gtm-clickable gtm-draft-select" role="button"> Default Workspace
            </div>-->
        </div>
        <div class="blg-body-med gtm-container-menu-list">
            <!---->
            <a class="gtm-container-menu-list-item open-tag-list-button md-gtm-theme selected" href="#">
                <i class="gtm-tag-temp-icon gtm-container-menu-item-icon"></i>
                Свойства
            </a>
            <!---->
            <!--<a class="gtm-container-menu-list-item wd-open-trigger-list-button md-gtm-theme"
               href="#">
                <i class="gtm-trigger-temp-icon gtm-container-menu-item-icon"></i>Триггеры
            </a>-->
            <a class="gtm-container-menu-list-item wd-open-variable-list-button md-gtm-theme" href="#">
                <i class="gtm-variable-temp-icon gtm-container-menu-item-icon"></i>
                Переменные
            </a>
            <a class="gtm-container-menu-list-item gtm-container-menu-list-item--folders-button md-gtm-theme"
               data-ng-class="{selected: ctrl.isOnFolderPage()}"
               href="#/container/accounts/6004056919/containers/46220408/workspaces/1/folders">
                <i class="gtm-folder-icon gtm-container-menu-item-icon"></i>
                Группы
            </a>
            <!---->
            <!---->
            <!--<a class="gtm-container-menu-list-item wd-open-template-list-button md-gtm-theme"
               href="#/container/accounts/6004056919/containers/46220408/workspaces/1/templates">
                <i class="icon icon-label-outline gtm-container-menu-item-icon"></i>
                Шаблоны
            </a>-->
            <!---->
        </div>
    </div>
</gtm-container-menu>


