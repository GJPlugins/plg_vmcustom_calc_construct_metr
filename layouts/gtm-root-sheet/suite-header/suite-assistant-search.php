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
     * @date       08.06.2021 01:29
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    defined('_JEXEC') or die; // No direct access to this file

    /* @var $displayData array */
    /* @var $self object */



    extract($displayData);
?>
<suite-assistant-search flex="" ng-if="ctrl.shouldRenderAssistantSearch"
                        class="gms-header-assistant-search flex">
    <div flex="" role="search"
         class="suite suite-assistant-search layout-align-start-center layout-row flex"
         guidedhelpid="suite-header-assistant-search"
         ng-class="{'suite-flatten-bottom': $ctrl.dropdownHasItems}"
         ng-click="$ctrl.openSuggestionDropdown()" layout-align="start center" layout="row">
        <!---->
        <md-icon ng-if="!$ctrl.customIcon"
                 class="suite-assistant-search-icon md-standard-theme material-icons-extended"
                 aria-hidden="true" md-font-set="material-icons-extended"
                 ng-bind="$ctrl.icon || 'search'" role="img">search
        </md-icon><!----> <!---->
        <div flex="" class="suite-assistant-search-input-container flex"><input flex=""
                                                                                class="suite-assistant-search-input suite-input ng-pristine ng-untouched ng-valid flex ng-empty"
                                                                                aria-label="Поиск"
                                                                                placeholder="Поиск в рабочей области"
                                                                                type="text"
                                                                                spellcheck="true"
                                                                                ng-change="$ctrl.onUserInputChange()"
                                                                                ng-focus="$ctrl.onUserInputFocus()"
                                                                                ng-model="$ctrl.userInput"
                                                                                ng-trim="false"
                                                                                aria-autocomplete="list"
                                                                                autocomplete="off"
                                                                                aria-invalid="false">
            <!----> </div> <!----> </div>
</suite-assistant-search>


