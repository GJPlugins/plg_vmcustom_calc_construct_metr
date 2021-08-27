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
     * @date       05.06.2021 06:19
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    defined('_JEXEC') or die; // No direct access to this file

    /* @var $displayData array */
    /**
     * @var $type_property_id    int       - ID типа
     * @var $title               string    - Название типа
     * @var $icon                string    - base64 image
     * @var $caption             string    - Подпись типа
     */



    extract($displayData);


// data-evt-action="loadTemplateTypeProperty"
    ?>
<div class="tag-entity-type blg-really-comfortable"

     onclick="vmccm._getPropertiesList( 'type-properties' )"

     data-installation-method="replacement"
     data-replacement-type-property-id="<?= $type_property_id ?>">
    <div data-ng-click="ctrl.openTagTypePicker()" class="selected-entity-type"
         role="button">
        <div class="entity-type-icon-tag blue">
            <!---->
            <img class="gtm-tag-thumbnail" src="<?= $icon ?>">
            <!---->
            <!---->
        </div>
        <div class="entity-type-label blg-comfortable blg-body-and-caption">

            <div ng-bind-html="ctrl.selectedTagType.displayName">
                <?= $title ?>
            </div>
            <div ng-bind-html="ctrl.getTagTypeBrandName()">
                <?= $caption ?>
            </div>
        </div>
        <div class="entity-type-badge-list blg-comfortable">
            <gtm-vendor-template-badge-list
                data-template-data="ctrl.vtInstanceHelper.getTemplate()">
                <!----> </gtm-vendor-template-badge-list>
        </div>
    </div>
</div>


