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
     * @date       07.06.2021 20:55
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
    $basePath = JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/layouts';
?>
<div class="gtm-root" data-ng-include="'/gtm/app/app.html'">
    <div data-ng-controller="ApplicationController as ctrl" class="gtm-page"
         data-ng-class="{'ghost-mode': isGhostMode}">
        <div class="gms-top-nav org-loaded" id="suite-top-nav" data-ng-class="{'org-loaded': currentContext.orgId}">
            <!---->
            <?php echo $this->sublayout('suite-header' , $displayData ); ?>
            <!---->
<!--            md-nav-bar --><?php //echo $this->sublayout('md-nav-bar' , $displayData ); ?>
            <!---->

        </div>
        <global-notification-bar data-ng-show="ctrl.isNotificationVisible()" aria-hidden="false">
            <gtm-notification-bar data-notifications="ctrl.notifications"><!----> </gtm-notification-bar>
        </global-notification-bar>
        <toast-holder>
            <div class="toast-holder">
                <div class="transient-toast ng-hide" data-ng-show="ctrl.transientToasts.length > 0" aria-hidden="true">
                    <!---->
                </div>
                <div class="persistent-toast ng-hide" data-ng-show="ctrl.persistentToasts.length > 0"
                     aria-hidden="true">
                    <!---->
                </div>
            </div>
        </toast-holder>
        <!---->
        <div data-ng-view="" class="gtm-ng-view">
            <gtm-tag-list-page>
                <gtm-container-page enable-preview-card="true">
                    <div data-gtm-page-tracker="">
                        <!---->
<!--                        --><?php //echo $this->sublayout('gtm-container-page-header' , $displayData); ?>
                        <!---->
                        <div class="gtm-container-page">
                            <div class="gtm-container-page-navigation">
                                <?php echo $this->sublayout('gtm-container-menu' , $displayData); ?>
                            </div>

                            <div class="gtm-container-page-content-wrapper">
                                <!---->
                                <gtm-preview-card data-ng-if="ctrl.enablePreviewCard">
                                    <!---->
                                </gtm-preview-card>
                                <!---->
                                <div class="gtm-container-page-content" data-ng-transclude="">
                                    <div class="card card--table gtm-cloaked gtm-cloaked-spinner gtm-cloaked-ready"
                                         data-gtm-cloak="tag-list-page"
                                         data-gtm-cloak-notifier="ctrl.tagListCloakNotifier">
                                        <div class="gtm-table-component gtm-table-component--single-page gtm-table-component--has-items"
                                             data-limit-to="50" data-table-id="tag-list"
                                             data-bind-to-parent="ctrl.setTableCtrl" >
                                            <div class="card-title-bar">
                                                <div class="card-title">
                                                    <div>Свойства продукта</div>
                                                    <!---->
                                                </div>
                                                <div class="card-actions" >
                                                    <!---->
                                                    <!--Фильтр по таблице--><?php //echo $this->sublayout('gtm-table-filter' , $displayData); ?>
                                                    <!---->
                                                    <!-- Кнопка создать свойство товара -->
                                                    <button class="btn btn--create wd-create-tag-btn"
                                                        onclick="vmccm._getPropertiesList( 'loadProperty' )">
                                                        Создать
                                                    </button>
                                                    <!---->
                                                </div>
                                            </div>
                                            <!--Таблица главного  листа -->
                                            <?php echo $this->sublayout('gtm-root-sheet-table' , $displayData); ?>
                                            <!-- gtm-pagination -->
                                            <?php echo $this->sublayout('gtm-pagination' , $displayData); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </gtm-container-page>
            </gtm-tag-list-page>
        </div>
        <?php
//            echo $this->sublayout('gtm-footer' , $displayData );
        ?>

    </div>
</div>

