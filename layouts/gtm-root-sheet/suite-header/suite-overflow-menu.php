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
     * @date       08.06.2021 01:38
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    defined('_JEXEC') or die; // No direct access to this file

    /* @var $displayData array */
    /* @var $self object */


    $doc = Factory::getDocument();
    extract($displayData);

?>
<suite-overflow-menu>
    <div class="suite suite-overflow-menu"> <!----> <!---->
        <button class="md-icon-button suite-help-button md-button md-standard-theme md-ink-ripple"
                type="button" ng-transclude="" ng-if="$ctrl.shouldRenderHelpButton()"
                aria-label="Справка" guidedhelpid="suite-header-help-button"
                suite-header-gtm-action="Click Help" ng-click="$ctrl.onHelpClicked()">
            <md-icon class="suite-help-menu md-standard-theme material-icons-extended"
                     md-font-set="material-icons-extended" aria-hidden="true"
                     ng-bind="::'help'" role="img">help
            </md-icon>
        </button><!----> <!---->
        <md-menu ng-if="$ctrl.hasOverflowContent()" class="md-menu _md">
            <button class="md-icon-button suite-overflow-menu-button md-button md-standard-theme md-ink-ripple"
                    type="button" ng-transclude=""
                    guidedhelpid="suite-header-overflow-menu"
                    suite-header-gtm-action="Open Overflow Menu"
                    ng-click="$mdMenu.open($event)"
                    aria-label="Открыть дополнительное меню" aria-haspopup="true"
                    aria-expanded="false" aria-owns="menu_container_2">
                <md-icon aria-hidden="true"
                         class="suite-overflow-extras md-standard-theme material-icons-extended"
                         md-font-set="material-icons-extended" ng_bind="::'more_vert'"
                         role="img">more_vert
                </md-icon>
            </button>
            <div class="_md md-open-menu-container md-whiteframe-z2"
                 id="menu_container_2" style="display: none;" aria-hidden="true">
                <md-menu-content class="suite suite-panel suite-overflow-menu-popup"
                                 ng-keydown="$ctrl.keydownHandler($event)" role="menu">
                    <ng-transclude class="suite-overflow-extras"
                                   ng-transclude-slot="extras">
                        <overflow-extras>
                            <button class="md-button md-standard-theme md-ink-ripple"
                                    type="button" ng-transclude=""
                                    ng-click="routes.goto('settings')"> Пользовательские
                                настройки
                            </button>
                        </overflow-extras>
                    </ng-transclude>
                    <div> <!---->
                        <button class="suite-feedback-button md-button md-standard-theme md-ink-ripple"
                                type="button" ng-transclude=""
                                ng-if="$ctrl.shouldRenderFeedbackButton()"
                                suite-header-gtm-action="Click Feedback"
                                ng-click="$ctrl.onFeedbackClicked()"> Оставить отзыв
                        </button><!----> </div>
                </md-menu-content>
            </div>
        </md-menu><!----> </div>
</suite-overflow-menu>

