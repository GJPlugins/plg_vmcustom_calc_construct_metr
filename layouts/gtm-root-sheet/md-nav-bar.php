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
     * @date       07.06.2021 21:50
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
<md-nav-bar data-ng-show="ctrl.suiteHeaderService.isNavBarVisible"
            data-md-selected-nav-item="ctrl.suiteHeaderService.navBarLocationName"
            data-nav-bar-aria-label="Основные элементы навигации" class="md-gtm-theme" aria-hidden="false">
    <div class="md-nav-bar">
        <nav role="navigation">
            <ul class="_md-nav-bar-list" ng-transclude="" role="tablist" ng-focus="ctrl.onFocus()"
                aria-label="Основные элементы навигации">
                <li class="md-nav-item" role="presentation"
                    data-md-nav-href="#/container/accounts/6004056919/containers/46220408/workspaces/1"
                    data-name="container"><a
                        class="_md-nav-button md-accent md-button md-gtm-theme md-ink-ripple md-active md-primary"
                        ng-transclude="" ng-class="ctrl.getNgClassMap()"
                        ng-blur="ctrl.setFocused(false)" ng-disabled="ctrl.disabled" tabindex="0"
                        role="tab" aria-selected="true"
                        ng-href="#/container/accounts/6004056919/containers/46220408/workspaces/1"
                        href="#/container/accounts/6004056919/containers/46220408/workspaces/1"
                        aria-label="Рабочая область"><span ng-transclude="" class="_md-nav-button-text"> Рабочая область </span></a>
                </li> <!---->
                <li class="md-nav-item" role="presentation"
                    data-md-nav-href="#/versions/accounts/6004056919/containers/46220408/versions?containerDraftId=1"
                    data-name="versions"><a
                        class="_md-nav-button md-accent md-button md-gtm-theme md-ink-ripple md-unselected"
                        ng-transclude="" ng-class="ctrl.getNgClassMap()"
                        ng-blur="ctrl.setFocused(false)" ng-disabled="ctrl.disabled" tabindex="-1"
                        role="tab" aria-selected="false"
                        ng-href="#/versions/accounts/6004056919/containers/46220408/versions?containerDraftId=1"
                        href="#/versions/accounts/6004056919/containers/46220408/versions?containerDraftId=1"
                        aria-label="Версии"><span ng-transclude=""
                                                  class="_md-nav-button-text"> Версии </span></a></li>
                <li class="md-nav-item" role="presentation"
                    data-md-nav-href="#/admin/?accountId=6004056919&amp;containerId=46220408&amp;containerDraftId=1"
                    data-name="admin"><a
                        class="_md-nav-button md-accent md-button md-gtm-theme md-ink-ripple md-unselected"
                        ng-transclude="" ng-class="ctrl.getNgClassMap()"
                        ng-blur="ctrl.setFocused(false)" ng-disabled="ctrl.disabled" tabindex="-1"
                        role="tab" aria-selected="false"
                        ng-href="#/admin/?accountId=6004056919&amp;containerId=46220408&amp;containerDraftId=1"
                        href="#/admin/?accountId=6004056919&amp;containerId=46220408&amp;containerDraftId=1"
                        aria-label="Администрирование"><span ng-transclude=""
                                                             class="_md-nav-button-text"> Администрирование </span></a>
                </li>
            </ul>
        </nav>
        <md-nav-ink-bar ng-hide="ctrl.mdNoInkBar" aria-hidden="false" class="_md-right"
                        style="left: 8px; width: 149px;"></md-nav-ink-bar>
    </div>
</md-nav-bar>

