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
     * @date       07.06.2021 23:59
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
<suite-universal-picker ng-if="ctrl.shouldRenderUniversalPicker"
                        class="gms-header-up assistant-search-visible"
                        ng-class="{'assistant-search-visible': ctrl.shouldRenderAssistantSearch}">
    <!---->
    <button class="suite suite-up-button md-button md-standard-theme md-ink-ripple layout-align-start-center layout-row"
            type="button"  aria-label="Открыть универсальное окно выбора.">
        <div layout="column" layout-align="center start"
             class="layout-align-center-start layout-column"> <!---->
            <div ng-if="$ctrl.hasSelectedEntity"
                 class="suite-up-breadcrumb layout-align-start-center layout-row"
                 layout="row" layout-align="start center"><span
                    class="suite-up-button-text-secondary"
                    ng-class="{'suite-up-text-only': !$ctrl.displayedBreadcrumb[1]}"
                    ng-bind="$ctrl.displayedBreadcrumb[0]">Все аккаунты</span> <!---->
                <md-icon md-font-set="material-icons-extended"
                         class="suite-up-breadcrumb-chevron md-standard-theme material-icons-extended"
                         ng-if="$ctrl.displayedBreadcrumb[1]" ng-bind="::'chevron_right'"
                         role="img" aria-hidden="true">chevron_right
                </md-icon><!----> <!----><span ng-if="$ctrl.displayedBreadcrumb[1]"
                                               class="suite-up-button-text-secondary"
                                               ng-bind="$ctrl.displayedBreadcrumb[1]">nst-alliance.pp.ua Диваны</span>
                <!----> </div><!---->
            <div class="suite-up-button-text layout-align-start-center layout-row"
                 layout="row" layout-align="start center"> <!----><span
                    ng-if="$ctrl.hasSelectedEntity" layout="row"
                    layout-align="start center"
                    class="suite-up-button-leaf-name layout-align-start-center layout-row"> <span
                        class="suite-up-text-name">nst-alliance.pp.ua</span>
                    <!----> </span><!----> <!---->
                <md-icon md-font-set="material-icons-extended" aria-hidden="true"
                         ng-bind="::'arrow_drop_down'"
                         class="md-standard-theme material-icons-extended" role="img">
                    arrow_drop_down
                </md-icon>
            </div>
        </div>
    </button><!----> </suite-universal-picker>

