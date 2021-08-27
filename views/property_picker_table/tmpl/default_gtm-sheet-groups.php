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
     * @date       08.06.2021 20:49
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

    $displayData = $this->displayData ;
    extract($displayData);

//    echo'<pre>';print_r( $displayData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;




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
                        $this->row = $item ;
                        echo $this->loadTemplate('gtm-sheet-groups-rows'  );
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