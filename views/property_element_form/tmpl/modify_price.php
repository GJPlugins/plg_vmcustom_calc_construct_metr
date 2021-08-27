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
     * @date       27.06.2021 16:27
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/


    defined('_JEXEC') or die; // No direct access to this file

    ?>


<div class="gtm-veditor-section ng-pristine ng-valid ng-valid-integer gtm-read-only veditor__section--read-only gtm-veditor-editable"
     role="button">
    <input type="hidden" name="type_property_id" value="<?= $this->TypeProperty['type_property_id'] ?>">

    <div class="gtm-veditor-index-container">

        <!-- Заголовок секции свойства -->
        <div class="gtm-veditor-title" diff-field="!section-title-section-0"
             data-ng-click="ctrl.veditorCtrl.closeStep(); $event.stopPropagation();"
             data-ng-transclude="section-title" role="button">
            <section-title> Конфигурация </section-title>
        </div>
        <!---->

        <div class="veditor__section__content" data-ng-transclude="section-content">
            <section-content>


                <div diff-field="tag.data.vendorTemplate.key"> <!---->
                    <div data-ng-if="ctrl.isTagTypeSelected" class="blg-form-input">
                        <div class="blg-spacer1 hide-read-only"></div>
                        <div class="blg-caption"> Тип свойства</div>
                        <div class="blg-spacer1 hide-in-diff"></div>

                        <!-- Марка типа свойства -->

                        <div class="tag-entity-type blg-really-comfortable"
                             onclick="vmccm._getPropertiesList( 'type-properties' )"

                             data-installation-method="replacement"
                             data-replacement-type-property-id="<?= $this->TypeProperty['type_property_id']  ?>">

                            <div  class="selected-entity-type" role="button">
                                <div class="entity-type-icon-tag blue">
                                    <!---->
                                    <img class="gtm-tag-thumbnail" src="<?= $this->TypeProperty['icon'] ?>">
                                    <!---->
                                    <!---->
                                </div>
                                <div class="entity-type-label blg-comfortable blg-body-and-caption">

                                    <div class="label-title">
                                        <?= $this->TypeProperty['title'] ?>
                                    </div>
                                    <div class="label-caption">
                                        <?= $this->TypeProperty['caption'] ?>
                                    </div>
                                </div>
                                <div class="entity-type-badge-list blg-comfortable">
                                    <gtm-vendor-template-badge-list data-template-data="ctrl.vtInstanceHelper.getTemplate()">
                                        <!---->
                                    </gtm-vendor-template-badge-list>
                                </div>
                            </div>
                        </div>


                        <!---->
                        <!---->
                        <div class="blg-spacer1"></div>
                    </div>
                    <!---->
                    <!---->
                </div>
                <!---->
                <?php  echo $this->formDefault ; ?>
                <!---->
                <!---->
                <!---->
                <div data-ng-if="ctrl.hasConfiguration()" class="vt-fields" diff-field="!vendor-template-fields">
                    <!---->
                </div>
                <!---->
                <!---->
                <!---->
                <gtm-zippy data-ng-if="ctrl.hasAdvancedConfiguration()" data-zippy-title="Расширенные настройки"
                           data-is-zippy-open="ctrl.advancedSettingsZippyOpen"
                           class="gtm-zippy--advanced-settings wd-adv-config-zippy">
                    <!---->
                    <!---->
                    <!---->

                </gtm-zippy>
                <!---->
                <!---->
                <!---->
            </section-content>
        </div>
    </div>
    <div class="gtm-veditor-section-overlay"></div>
</div>



