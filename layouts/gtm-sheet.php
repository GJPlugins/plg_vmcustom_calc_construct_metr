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
     * @date       31.05.2021 20:36
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    defined('_JEXEC') or die; // No direct access to this file

    /* @var $displayData array */
    /* @var $self object */


    $doc = Factory::getDocument();
    $virtuemart_product_id = 0 ;
    $readOnly = true ;
    $attrReadOnly = ' read-only="readOnly" ';
    $veditorReadOnlyClass = ' veditor--read-only ' ;
    extract($displayData);

    /**
     * @var $gtmSheetHeader string - заголовок листа
     * @var $readOnly bool - если false - то заголовок листа можно редактировать
     * @var $sections array - Массив содержащий секции лист
     */

    if( !isset($sections) ) $sections = [] ; #END IF

    if( !$readOnly )
    {
        $attrReadOnly = '';
        $veditorReadOnlyClass = 'veditor--edit' ;
    }#END IF

      /* echo'<pre>';print_r( $displayData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
        die(__FILE__ .' '. __LINE__ );*/


    


    
?>


    <div tabindex="0"></div>
    <div tabindex="-1"></div>
    <gtm-trigger-editor <?= $attrReadOnly ?>  trigger="trigger" trigger-key="triggerKey">
        <div class="gtm-sheet-centered"> <!----> <!---->
            <form data-evt-action-submit="confirmDocumentWriteAndSubmit" class="ng-pristine ng-valid-name ng-valid-css-selector ng-valid-predicate ng-valid-regex ng-valid ng-valid-required">
                <input type="hidden" name="typeSheet" value="<?= $type ?>"  >
                <input type="hidden" name="virtuemart_product_id" value="<?= $virtuemart_product_id ?>"  >
                <gtm-veditor data-edit-mode="!ctrl.inCreateMode" data-gtm-register-veditor="gtmTagEditor" data-on-cancel="ctrl.onCancel()" data-read-only="ctrl.readOnly || !canEditDraft" >
                    <div class="gtm-veditor-single-mode">
                        <div class="gtm-veditor <?= $veditorReadOnlyClass ?> gtm-sheet-wrapper" >
                            <?php
                                # Блок Заголовок Листа
                                echo $this->sublayout('gtm-sheet-header' , $displayData );
                            ?>


                            <div class="sheet-scrollpane">
                                <div class="sheet-content sheet-padding">
                                    <div class="blg-error gtm-veditor_top-error" data-gtm-form-error-label=""
                                         data-field-name="trigger.data.name" style="display: none;">
                                        <div ng-bind-html="errorMessage" class="gtm-error-message">errorMessage</div>
                                    </div> <!---->
                                    <gtm-change-status data-ng-if="!ctrl.inCreateMode" data-entity="ctrl.trigger"
                                                       data-editor="ctrl">
                                        <!---->
                                    </gtm-change-status>
                                    <!---->
                                    <input type="hidden" data-ng-model="ctrl.selectedEventType"
                                           name="selectedEventType" required="" autocomplete="off"
                                           class="ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
                                           aria-invalid="false">

                                    <?php

                                        # Показывать список отобранных элементов на всех листах кроме "Выбор типов объектов"
                                        if( $displayData['alias'] != 'TypeProperty' )
                                        {
                                            # Вывод секций листа
                                            echo $this->sublayout('gtm-sheet-section' , $displayData);
                                        }#END IF
                                    ?>


                                    <?= $this->sublayout('gtm-sheet-groups' , $displayData); ?>

                                    <div class="blg-spacer2"></div>
                                    <!---->
                                    <?php

                                        # Показывать только на странице  "Настройка свойств товара"
                                        if( $displayData['alias'] == 'addNewProp' )
                                        {
                                            # Список активных объектов ( Ссылки на этот триггер )
                                            echo $this->sublayout('gtm-sheet-list' , $displayData);
                                        }


                                        # Примечания - Добавьте примечания для этого объекта
                                        echo $this->sublayout('gtm-sheet-notes' , $displayData);
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </gtm-veditor>
            </form><!----> </div>
    </gtm-trigger-editor>
    <div tabindex="-1"></div>
    <div tabindex="0"></div>



