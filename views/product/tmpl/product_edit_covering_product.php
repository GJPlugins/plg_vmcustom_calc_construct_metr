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
     * @date       25.08.2021 20:38
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file

    /**
     * Шаблон - Добавление вкладки Расчет ткани в  view=product
     */

    $doc = \Joomla\CMS\Factory::getDocument();
    $doc->addScriptOptions('uiBubbleMenu', [
        'coveringMethod' => [
                'Добавить ткань' => [
                        'onclick' => 'addFabric'
                ]
        ]
    ]);

//    ctui-bubble-icon-menu


    /**
     * $covering_count Индекс вариантов раскроя (0-Одна ткань,1-Две ткани,2-Три ткани....)
     */
    foreach ( $this->MapCoveringProduct as $covering_count =>  $itemNameArr)
    {
        $checked = false ;
//        echo'<pre>';print_r( count($itemNameArr) );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;

        if( count($this->MapCoveringProduct) === 1 && $covering_count === 0 ) $checked = 'checked' ; #END IF


        ?>
            <div id="covering-method-id--<?= $covering_count ?>" class="covering-method">

        <div class="gtm-flex__section--fixed gtm-sheet-header__actions">
            <ctui-bubble-icon-menu  class="gtm-editor-snowman"  data-icon="gtm-more-vert-icon">
                <i class="icon gtm-more-vert-icon" data-evt-action="uiBubbleMenu" data-ui-bubble-menu="coveringMethod" role="button"></i>
            </ctui-bubble-icon-menu>

            <label for="use-default--<?=$covering_count?>">
                <input type="radio" <?= $checked ?> id="use-default--<?=$covering_count?>" name="covering-use-default" value="<?=$covering_count?>" >
                <span>Use default</span>
            </label>
            <?php
                # Ткани по умолчанию
                for ($i=0; $i < count($itemNameArr) ; $i++  ){
                    $fabricDefaultInp_id = 'fabric-default--'.$covering_count . ('-' . ($i + 1) ) ;
                    ?>
                    <label for="<?=  $fabricDefaultInp_id ?>">
                        <input type="text" id="<?=  $fabricDefaultInp_id ?>" name="covering_fabric_default[<?=$covering_count?>][<?=$i+1?>]" value="" >
                        <span>Ткань <?=$i+1?> по умолчанию</span>
                    </label>
                    <?php
                }
            ?>
        </div>






                <input type="hidden" name="covering_method_id" value="<?=$covering_count?>">
                <table>
                    <?= $this->loadTemplate('covering_product_table_head') ?>
                    <?php

                        /*echo'<pre>';print_r( $itemNameArr );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
                        die(__FILE__ .' '. __LINE__ );*/



                        /**
                         * перебираем строки в варианте раскроя
                         * $itemTypeId - индекс строки
                         */
                        $indexLine = 0 ;
                        foreach ( $itemNameArr as $itemTypeId => $itemType)
                        {
                            $indexLine++;
                            ?>
                            <tr class="covering-type">
                                <td class="covering-type-name">
                                    Ткань <?= $indexLine ?>
                                </td>
                                <?php
                                    foreach ( $itemType as $item)
                                    {
                                        ?>
                                        <td>

                                            <input type="number" step="0.01"
                                                   name="covering[<?=$covering_count ?>][<?=$indexLine?>][<?=$item->fabric_category?>]" value="<?=$item->price?>">
                                        </td>
                                        <?php
//                                       echo'<pre>';print_r( $item );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;

                                    }#END FOREACH
                                ?>
                                <td class="tools">
                                    <input type="hidden" name="indexLastLine" value="<?=$indexLine?>" >
                                    <?php

                                        ?>
                                        <button class="icon icon-delete icon--button" type="button"
                                                onclick="window.ProductEditFabric.evtActionHandler.actionHandlerMethods.removeLine(this,'tr');"
                                                title="Удалить">
                                        </button>




                                </td><!-- /.tools -->

                            </tr>
                            <?php

                        }#END FOREACH
                    ?>

                </table>
            </div>


        <?php
    }#END FOREACH





//    die(__FILE__ .' '. __LINE__ );




//echo'<pre>';print_r( $this->MapCoveringProduct );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//die(__FILE__ .' '. __LINE__ );




