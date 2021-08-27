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
     * @date       08.06.2021 06:19
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

?>
<table class="gtm-table--hide-empty gtm-multiselect-table">
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
    <?php

//        echo'<pre>';print_r( $this->DataTable );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        die(__FILE__ .' '. __LINE__ );



        foreach ( $this->DataTable as $item)
        {



            ?>
            <tr class="wd-tag-row <?= $item->published?:'gtm-table-row--paused' ?>">
                <!---->
                <td class="icon-cell"  >
                    <gtm-table-row-checkbox data-item="tag">
                        <i class="gtm-check-box-outline-blank-icon"
                           data-prop-id="<?=$item->product_property_config_id?>"></i>
                    </gtm-table-row-checkbox>
                </td>
                <!---->

                <td colspan="1">
                    <a href="#" class="open-tag-button fill-cell md-gtm-theme"
                       onclick="vmccm.SheetController.loadSheet( 'product_property' , <?=$item->product_property_config_id?> )">
                        <?= $item->product_property_config_title ?>
                    </a>
                </td>
                <!---->
                <td>
                    <?= $item->title ?>
                </td>
                <!---->
                <td>
                    <gtm-trigger-chip-list data-tag="tag"
                                           data-trigger-map="ctrl.triggerMap">
                        <div class="chip-list inline">
                            <!---->
                            <!---->
                            <!---->
                        </div>
                    </gtm-trigger-chip-list>
                </td>
                <!---->
                <td class="gtm-table__malware-column">
                    <gtm-timestamp time="ctrl.getLastModifiedTime(tag)"
                                   title="1 июн. 2021 г., 7:19:39"><span>7 дней назад</span>
                    </gtm-timestamp>
                    <i class="malware-found-icon no-padding"
                       title="Этот тег содержит вредоносное ПО."></i>
                    <i class="pause-circle-filled-icon no-padding"
                            title="Это свойство приостановлено и не будет срабатывать."></i>
                </td>
            </tr>
            <?php
        }#END FOREACH

    ?>

    <!---->
    </tbody>
</table>
