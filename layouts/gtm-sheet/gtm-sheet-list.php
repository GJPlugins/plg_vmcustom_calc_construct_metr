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
     * @date       01.06.2021 00:58
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    defined('_JEXEC') or die; // No direct access to this file

    /* @var $displayData array */
    /* @var $self object */

    /**
     * Список отобранных объектов ()
     */






//    $doc = Factory::getDocument();
    extract($displayData);


//    echo'<pre>';print_r( $displayData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;

    ?>
<!-- Список активных объектов  layouts/gtm-sheet/gtm-sheet-section/gtm-sheet-list.php -->
<div  class="hide-in-diff blg-card blg-card--indented blg-card--bottom-margin">
    <div class="blg-subhead blg-comfortable"> Ссылки на этот триггер</div>
    <gtm-entity-list  data-read-only="ctrl.readOnly">
        <div class="entity-list-selector">
            <!---->
            <div data-ng-repeat="entity in $ctrl.entities | orderBy: 'name'">
                <div class="entity-list-selector-row blg-indented-icon blg-really-comfortable clickable"
                     data-ng-click="$ctrl.openEntitySheet(entity, $event)"
                     role="button">
                    <i class="entity-icon icon-matting gtm-md-tag-icon-small"
                       data-ng-class="$ctrl.getEntityIconName(entity) + '-small'"></i>
                    <div class="entity-list-selector-text blg-body-and-caption">
                        <div>Universal Analytics - Отслеживание заказов</div>
                        <div class="entity-list-selector-text__type"> Тег</div>
                    </div>
                    <div class="entity-list-selector-actions"></div>
                </div>
            </div>
            <!---->
        </div>
    </gtm-entity-list>
    <div class="blg-spacer3"></div>
</div>
<!---->


