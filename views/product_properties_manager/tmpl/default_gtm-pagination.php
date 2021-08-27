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
     * @date       08.06.2021 06:21
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

?>
<gtm-pagination>
    <div class="gtm-pagination gtm-pagination--comfortable gtm-flex gtm-table--hide-empty">
        <!---->
        <div class="gtm-flex__section gtm-flex__section--no-grow gtm-pagination__select-label blg-comfortable"
             data-ng-if="!ctrl.isDynamicDataSource"> Строк на странице:
        </div>
        <!---->
        <!---->
        <div class="gtm-flex__section gtm-flex__section--no-grow gtm-pagination__select"
             data-ng-if="!ctrl.isDynamicDataSource"><select
                data-ng-options="o as o for o in ctrl.options"
                data-ng-change="ctrl.onPageSizeSelect()"
                data-ng-model="ctrl.itemsPerPage"
                aria-label="Количество элементов на странице"
                class="ng-pristine ng-untouched ng-valid ng-not-empty"
                aria-invalid="false">
                <option label="50" value="number:50" selected="selected">
                    50
                </option>
                <option label="100" value="number:100">100</option>
                <option label="200" value="number:200">200</option>
                <option label="ВСЕ" value="string:ВСЕ">ВСЕ</option>
            </select></div><!----> <!---->
        <div class="gtm-flex__section gtm-flex__section--no-grow gtm-pagination__count blg-comfortable"
             data-ng-if="!ctrl.isDynamicDataSource"> 1–1 из 1
        </div><!---->
        <div class="gtm-pagination__button gtm-flex__section gtm-flex__section--no-grow">
            <i class="gtm-arrow-left-icon icon-button disabled"
               ng-click="ctrl.prev()"
               ng-class="{ disabled : ctrl.tableCtrl.range.firstPage }"
               role="button"></i></div>
        <div class="gtm-pagination__button gtm-flex__section gtm-flex__section--no-grow">
            <i class="gtm-arrow-right-icon icon-button disabled"
               ng-click="ctrl.next()"
               ng-class="{ disabled : ctrl.tableCtrl.range.lastPage }"
               role="button"></i></div>
    </div>
</gtm-pagination>
