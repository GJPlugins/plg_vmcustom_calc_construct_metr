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
     * @date       08.06.2021 03:38
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
<table class="gtm-table--hide-empty gtm-multiselect-table" >
    <!---->
    <colgroup>
        <col width="56px">
        <col width="30%">
        <col width="20%">
        <col width="33%">
        <col width="17%">
    </colgroup>
    <!---->
    <!---->
    <tbody>
    <tr class="no-hover"> <!---->
        <th class="icon-cell">
            <gtm-table-header-checkbox>
                <div>
                    <i role="button" class="gtm-check-box-outline-blank-icon">
                    </i>
                </div>
            </gtm-table-header-checkbox>
        </th><!---->
        <th colspan="1">
                                                        <span class="sortable active-sort" role="button">
                                                            Имя
                                                        </span>
        </th>
        <th>
                                                        <span class="sortable" role="button">
                                                            Тип
                                                        </span>
        </th>
        <th>Данные</th> <!---->
        <th>
                                                        <span class="sortable" role="button">
                                                            Последнее изменение
                                                        </span>
        </th>
    </tr>
    <!---->
    <tr class="wd-tag-row">
        <!---->
        <td class="icon-cell" data-ng-if="::ctrl.canEditDraft">
            <gtm-table-row-checkbox data-item="tag">
                <i data-ng-class="tableRowCheckboxCtrl.isSelected() ?
          'gtm-check-box-icon' : 'gtm-check-box-outline-blank-icon'" class="gtm-check-box-outline-blank-icon">
                </i></gtm-table-row-checkbox>
        </td><!---->
        <td colspan="1"><a
                href="#/container/accounts/6004056919/containers/46220408/workspaces/1/tags/4"
                class="open-tag-button fill-cell md-gtm-theme"
                data-ng-click="ctrl.openTagSheet($event, tag.key)"> 1111
                Тег без названия </a></td>
        <td> Google Аналитика: Universal Analytics</td>
        <td>
            <gtm-trigger-chip-list data-tag="tag"
                                   data-trigger-map="ctrl.triggerMap">
                <div class="chip-list inline"> <!----> <!----><!----> </div>
            </gtm-trigger-chip-list>
        </td> <!---->
        <td class="gtm-table__malware-column">
            <gtm-timestamp time="ctrl.getLastModifiedTime(tag)"
                           title="1 июн. 2021 г., 7:19:39"><span>7 дней назад</span>
            </gtm-timestamp>
            <i class="malware-found-icon no-padding"
               title="Этот тег содержит вредоносное ПО."></i> <i
                class="pause-circle-filled-icon no-padding"
                title="Этот тег приостановлен и не будет срабатывать."></i>
        </td>
    </tr><!----> </tbody>
</table>

