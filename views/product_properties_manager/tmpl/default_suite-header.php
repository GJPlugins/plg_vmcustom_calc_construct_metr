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
     * @date       08.06.2021 06:08
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

?>
<suite-header data-redirect-to-accounts-page="routes.gotoAccountsList(currentContext.orgId)"
              data-is-root-page="ctrl.isRootPage()"
              data-ng-class="{'suite-header--no-border': !ctrl.suiteHeaderService.isNavBarVisible}">
    <div class="suite gms-header layout-column suite-header-is-ready"
         ng-class="{'suite-header-is-ready': ctrl.isHeaderReady}" layout="column" md-theme="standard">
        <md-toolbar layout="row" class="md-accent _md md-standard-theme layout-row _md-toolbar-transitions"
                    ng-class="{'gms-header-mobile': ctrl.isMobile}">
            <!---->
            <span ng-if="!ctrl.hideChip">
                <!-- Кнопка Выйти -->
                <button class="gms-chip-button gms-back-arrow-icon md-button md-standard-theme suite-free-chip"
                        title="Выйти"
                        type="button"
                        onclick="vmccm.SheetController.closeSheet(this)"
                        aria-label="На главную страницу">
                    <md-icon
                        class="md-icon-button suite-back-arrow-in-header md-standard-theme material-icons-extended suite-free-back-arrow"
                        md-font-set="material-icons-extended"
                        aria-hidden="true"
                        role="img">arrow_back</md-icon>
                </button>
                <!---->
                <!--                --><?php //echo JLayoutHelper::render('ic_tag_manager');  ?>
                <!---->
            </span>
            <!---->
            <!---->
            <div class="md-toolbar-tools gms-header-toolbar flex assistant-search-visible">
                <?php
                    echo $this->loadTemplate('suite-product-lockup');
//                    echo $this->sublayout('suite-product-lockup' , $displayData); ?>

                <!---->
                <div class="suite-divider suite-lockup-divider"></div>
                <!---->
                <!---->
                <!---->
                <!--                --><?php // echo $this->sublayout('suite-universal-picker' , $displayData );?>
                <!---->
                <!---->
                <!---->
                <span class="gms-header-title ng-hide" aria-hidden="true"></span>
                <!---->
                <!--                --><?php //echo $this->sublayout('suite-assistant-search' , $displayData); ?>
                <!---->
                <span flex="" class="flex"></span>
                <!---->
                <!---->
                <!--                --><?php //echo $this->sublayout('suite-gmp-product-switcher' , $displayData); ?>
                <!---->
                <!--                --><?php //echo $this->sublayout('suite-overflow-menu' , $displayData); ?>
                <!---->
                <!---->
                <!--                --><?php //echo $this->sublayout('suite-gaia-switcher' , $displayData); ?>
                <!---->
                <!---->
                <!---->

                <!---->
                <!---->
                <!---->
            </div>
        </md-toolbar>
    </div>
</suite-header>
