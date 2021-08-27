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



    $doc = Factory::getDocument();
    $alias = ''; // Тип Списка
    $groups = [
        [
            'subhead' => 'Заголовок группы' ,
            'rows' => [] ,
        ] ,

    ];


    extract($displayData);


    if( empty($groups[0]['rows']) ) return ; #END IF


    
    ?>
<!---->
<div class="sheet-content sheet-white gtm-picker">
    <?php

        foreach ($groups as $group)
        {
            ?>
            <div data-ng-repeat="tagGroup in $ctrl.tagTypeGroups" data-ng-if="tagGroup.tags.length > 0"> <!---->
                <div class="blg-spacer2" data-ng-if="$ctrl.tagTypeGroups.length > 1"></div><!----> <!---->
                <div class="blg-subhead blg-indented"
                     data-ng-if="$ctrl.tagTypeGroups.length > 1"><?= $group['subhead'] ?></div>
                <!---->
                <!---->


                <?php
                    foreach ($group['rows'] as $item)
                    {
                        $item['__group_type'] = $alias;
                        echo $this->sublayout('gtm-sheet-groups-rows' , $item);
                    }#END FOREACH
                ?>


            </div>
            <?php
        }#END FOREACH
    ?>
    <div class="blg-spacer2"></div>
</div>
<!---->

<div class="blg-spacer2" data-ng-if="$ctrl.tagTypeGroups.length > 1"></div>

