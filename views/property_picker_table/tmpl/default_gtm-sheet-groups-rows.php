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
     * @date       01.06.2021 23:33
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    defined('_JEXEC') or die; // No direct access to this file

    /* @var $displayData array */
    /* @var $self object */


    /**
     * @var $__group_type string - Тип списка групп
     */

    $type_property_id = 0 ;
    $type = 'typeRow' ;
    $title = 'Заголовок элемента группы' ;
    $caption = 'Подпись элемента группы' ;
    $icon = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTIiIGhlaWdodD0iMTkyIj48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDE5MnYxOTJIMHoiLz48cGF0aCBmaWxsPSIjRjlBQjAwIiBkPSJNMTMwIDI5djEzMmMwIDE0Ljc3IDEwLjE5IDIzIDIxIDIzIDEwIDAgMjEtNyAyMS0yM1YzMGMwLTEzLjU0LTEwLTIyLTIxLTIycy0yMSA5LjMzLTIxIDIxeiIvPjxwYXRoIGZpbGw9IiNFMzc0MDAiIGQ9Ik03NSA5NnY2NWMwIDE0Ljc3IDEwLjE5IDIzIDIxIDIzIDEwIDAgMjEtNyAyMS0yM1Y5N2MwLTEzLjU0LTEwLTIyLTIxLTIycy0yMSA5LjMzLTIxIDIxeiIvPjxjaXJjbGUgZmlsbD0iI0UzNzQwMCIgY3g9IjQxIiBjeT0iMTYzIiByPSIyMSIvPjwvc3ZnPg==';
    $displayData = $this->row ;
    extract($displayData);
    //    echo'<pre>';print_r( $displayData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $this->row  );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;

?>
<!-- Выберите тип layouts/gtm-sheet/gtm-sheet-groups/gtm-sheet-groups-rows.php -->
<div class="gtm-picker__row blg-really-comfortable"

     data-evt-action-click="addToList"
     data-evt-action-click-type="<?= $__group_type ?>"
     data-evt-action-click-id="<?= $this->row['type_property_id'] ?>"
     data-evt-action-click-layout="<?= $this->row['type'] ?>"
     role="button">

    <div class="column-row-icon no-border blue">
        <img class="gtm-tag-thumbnail" src="<?= $icon ?>" alt="">
    </div>
    <div class="blg-body-and-caption">
        <div><?= $title ?></div>
        <div  ><?= $caption ?></div>
    </div>
    <div class="picker-badge-list">
        <gtm-vendor-template-badge-list data-template-data="template">
            <!---->
        </gtm-vendor-template-badge-list>
    </div>
</div>
<!---->



