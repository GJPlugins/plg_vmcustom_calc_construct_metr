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

    use Joomla\CMS\Layout\FileLayout;

    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

    $HelperFormElements = \VCCM\HelperFormElements::instance();

    $displayData['elements'] = [
        // INPUT Text - Значение модификатора
        [
            'type' => 'text' ,                  // Тип поля
            'name' => 'param[modifierValue]' ,         // имя поля - параметра
            'value' => false ,                  // значение модификатора
            'label' => 'Значение модификатора' , // Подпись элемента
            'hideIfDefault' => '1' ,            // скрывать в режиме чтения если по умолчанию
            'defaultValue' => false ,           // значение по умолчанию
            'filter' => '([0-9.])' ,            // Фильтр для значения
            'filterErrorMessage' => 'Можно вводить только цифры и точку' , // Сообщение о нарушении фильтра
            'tooltip' => 'Значение для изменения цены' ,
            'button' => [
                'eventTrigger' => 'loadTemplateVariables' ,
                'iconClass' => 'gtm-add-variable-icon' ,
            ]
        ] ,
        // SELECT - Операция для модификации
        [
            'type' => 'select' ,                  // Тип поля
            'name' => 'param[operationModification]' ,   // имя поля - параметра
            'value' => false ,                  // значение модификатора
            'label' => 'Операция для модификации' , // Подпись элемента
            'hideIfDefault' => '1' ,            // скрывать в режиме чтения если по умолчанию
            'defaultValue' => '+' ,           // значение по умолчанию
//            'emptyOption' => [ 'text' => 'Выбрать значение' , ] , // Пустой элемент в начале списка
            // options
            'options' => [
                [
                    'value' => '+' ,
                    'label' => 'Прибавить к стоимости (+)' ,
                    'text' => 'Прибавить к стоимости (+)' ,
                ] ,
                [
                    'value' => '-' ,
                    'label' => 'Вычисть из стоимости (-)' ,
                    'text' => 'Прибавить из стоимости (-)' ,
                ] ,
                [
                    'value' => '+%' ,
                    'label' => 'Прибавить к стоимости процент (+%)' ,
                    'text' => 'Прибавить к стоимости процент(+%)' ,
                ] ,
                [
                    'value' => '-' ,
                    'label' => 'Вычисть из стоимости процент(-%)' ,
                    'text' => 'Прибавить из стоимости процент(-%)' ,
                ] ,
                [
                    'value' => 'set' ,
                    'label' => 'Установить фиксированно' ,
                    'text' => 'Установить фиксированно' ,
                ] ,

            ],
            'tooltip' => 'Определить метод изменения цены товара' ,
        ] ,
        [
            'type' => 'checkbox' ,
            'name' => 'param[defaultOn]' ,
            'value' => '1' ,
            'label' => 'По умолчанию отмечено' ,
            'hideIfDefault' => '1' , // скрывать в режиме чтения если по умолчанию
            'defaultValue' => 'false' , // значение по умолчанию
            'tooltip' => 'Отмечен при загрузки товара' ,

        ] ,

    ];
    $displayData['elements'] = json_encode( $displayData['elements'] );
    $displayData['elements'] = json_decode( $displayData['elements'] );

    extract($displayData);


//    $HelperTemplateForm = new \VCCM\HelperTemplateForm();
//    $DataResult = $HelperTemplateForm->getElement('modify_price');

    $basePath = JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/layouts';
    $HelperTypeProperty = \VCCM\HelperTypeProperty::instance();
    $res = $HelperTypeProperty->getTypeProperty();
    $res['__group_type'] = 'TypeProperty';

//    $layout = new FileLayout('gtm-sheet.gtm-sheet-section.gtm-sheet-section-editable' , $basePath , [  /*'debug' => true*/]);
//    $htmlElement = $layout->render($res);

//    echo'<pre>';print_r( $res );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//    die(__FILE__ .' '. __LINE__ );

//    echo $htmlElement ;






    ?>


<div class="gtm-veditor-section ng-pristine ng-valid ng-valid-integer gtm-read-only veditor__section--read-only gtm-veditor-editable"
     role="button">
    <input type="hidden" name="type_property_id" value="<?= $res['type_property_id'] ?>">

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
<!--                        --><?//= $this->sublayout('gtm-sheet-section-editable-label' , $displayData ); ?>

                        <div class="tag-entity-type blg-really-comfortable"

                             onclick="vmccm._getPropertiesList( 'type-properties' )"

                             data-installation-method="replacement"
                             data-replacement-type-property-id="<?= $res['type_property_id']  ?>">
                            <div data-ng-click="ctrl.openTagTypePicker()" class="selected-entity-type"
                                 role="button">
                                <div class="entity-type-icon-tag blue">
                                    <!---->
                                    <img class="gtm-tag-thumbnail" src="<?= $res['icon'] ?>">
                                    <!---->
                                    <!---->
                                </div>
                                <div class="entity-type-label blg-comfortable blg-body-and-caption">

                                    <div ng-bind-html="ctrl.selectedTagType.displayName">
                                        <?= $res['title'] ?>
                                    </div>
                                    <div ng-bind-html="ctrl.getTagTypeBrandName()">
                                        <?= $res['caption'] ?>
                                    </div>
                                </div>
                                <div class="entity-type-badge-list blg-comfortable">
                                    <gtm-vendor-template-badge-list
                                        data-template-data="ctrl.vtInstanceHelper.getTemplate()">
                                        <!----> </gtm-vendor-template-badge-list>
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
                <div data-ng-if="ctrl.hasConfiguration()" class="vt-fields" diff-field="!vendor-template-fields">

                    <?php


                        /*foreach ( $displayData['elements'] as $element)
                        {
                            $data = [] ;
                            echo  $HelperFormElements->load( $element , $data );
                        }#END FOREACH*/


                    ?>




                    <!---->
                    <vt-instance data-ng-if="ctrl.hasConfiguration()"
                                 data-helper="ctrl.vtInstanceHelper"
                                 data-instance-field-name="tag.data.vendorTemplate">
                        <vt-params data-helper="::helper" data-params="::params"
                                   data-instance-field-name="tag.data.vendorTemplate">




                            <vt-group data-ng-show="helper.paramDepsManager.isParamEnabled(params[1].name)"
                                      data-helper="helper" data-param-name="'analyticsSettingsGroup'"
                                      data-param="params[1]" data-instance="helper.instance"
                                      data-param-deps-manager="helper.paramDepsManager"
                                      data-instance-field-name="tag.data.vendorTemplate"
                                      data-field-path-name="tag.data.vendorTemplate.param.analyticsSettingsGroup"
                                      class="ua--analyticsSettingsGroup" aria-hidden="false">
                                <div diff-field="tag.data.vendorTemplate.param.analyticsSettingsGroup"> <!---->
                                    <!---->
                                    <!---->
                                    <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; !ctrl.hasZippy)">
                                        <!---->
                                        <label class="vt-subgroup blg-body">
                                            Настройки Google&nbsp;Аналитики
                                            <!-- Всплывающая подсказка -->
                                            <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)">
                                                <gtm-popover class="gtm-popover-icon"></gtm-popover>
                                            </span>
                                        </label>
                                        <!---->
                                        <!---->
                                        <vt-params data-ng-if="ctrl.param.subParam" data-helper="ctrl.helper"
                                                   data-param-name="ctrl.param.name"
                                                   data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                   data-instance-field-name="tag.data.vendorTemplate">
                                            <vt-select
                                                data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                data-helper="helper" data-param-name="'gaSettings'"
                                                data-param="params[0]" data-instance="helper.instance"
                                                data-param-deps-manager="helper.paramDepsManager"
                                                data-instance-field-name="tag.data.vendorTemplate"
                                                data-field-path-name="tag.data.vendorTemplate.param.gaSettings"
                                                class="ua--gaSettings" aria-hidden="false">
                                                <div class="blg-form-input"
                                                     data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                     data-instance-param-map="ctrl.instance.paramMap"
                                                     data-param-template="ctrl.param"
                                                     diff-field="tag.data.vendorTemplate.param.gaSettings"> <!---->
                                                    <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-not-empty"
                                                            data-ng-model="ctrl.selectedId"
                                                            data-ng-change="ctrl.onChange()"
                                                            data-ng-disabled="ctrl.helper.isDisabled"
                                                            data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                            data-gtm-form-error-field=""
                                                            id="9-tag.data.vendorTemplate.param.gaSettings"
                                                            name="tag.data.vendorTemplate.param.gaSettings"
                                                            aria-invalid="false">
                                                        <option label="Выбрать переменную настроек"
                                                                value="undefined:undefined">Выбрать переменную
                                                            настроек
                                                        </option>
                                                        <option label="{{1111 Настройки Google Аналитики}}"
                                                                value="string:s-1376" selected="selected">{{1111
                                                            Настройки Google Аналитики}}
                                                        </option>
                                                        <option disabled="" label="---------" value="string:s-1377">
                                                            ---------
                                                        </option>
                                                        <option label="Новая переменная…" value="string:s-1378">
                                                            Новая переменная…
                                                        </option>
                                                    </select>
                                                    <!---->
                                                    <!---->
                                                    <gtm-inspect-entity class="hide-read-only"

                                                                        data-entity="ctrl.selectedItem.entity">
                                                        <i class="gtm-info-outline-icon icon-button"
                                                           data-ng-click="ctrl.open($event);"
                                                           role="button">

                                                        </i>
                                                    </gtm-inspect-entity>
                                                    <!---->

                                                    <!-- Результат в режиме read-only -->
                                                    <div class="show-read-only blg-value">
                                                        {{1111 Настройки Google Аналитики}}
                                                        <!----> <!---->
                                                        <gtm-inspect-entity data-entity="ctrl.selectedItem.entity">
                                                            <i class="gtm-info-outline-icon icon-button"
                                                               data-ng-click="ctrl.open($event);"
                                                               role="button"></i></gtm-inspect-entity><!---->
                                                    </div>
                                                    <!---->
                                                    <!---->
                                                    <!---->
                                                    <!---->
                                                    <!---->
                                                    <div class="blg-error" data-gtm-form-error-label=""
                                                         data-field-name="tag.data.vendorTemplate.param.gaSettings"
                                                         style="display: none;">
                                                        <div ng-bind-html="errorMessage" class="gtm-error-message"></div>
                                                    </div>
                                                    <!---->

                                                    <div data-ng-if="ctrl.param.subParam" class="vt-sub-params">
                                                        <vt-params data-helper="ctrl.helper"
                                                                   data-params="ctrl.param.subParam"
                                                                   data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                    </div><!----> </div>
                                            </vt-select>




                                            <vt-checkbox
                                                data-evt-action-form-element="checkbox"

                                                data-ng-show="helper.paramDepsManager.isParamEnabled(params[1].name)"
                                                data-helper="helper"
                                                data-param-name="'overrideGaSettings'"
                                                data-param="params[1]"
                                                data-instance="helper.instance"
                                                data-param-deps-manager="helper.paramDepsManager"
                                                data-instance-field-name="tag.data.vendorTemplate"
                                                data-field-path-name="tag.data.vendorTemplate.param.overrideGaSettings"
                                                class="ua--overrideGaSettings"
                                                aria-hidden="false">
                                                <div data-param-template="ctrl.param"
                                                     data-instance-param-map="ctrl.instance.paramMap"
                                                     diff-field="tag.data.vendorTemplate.param.overrideGaSettings"
                                                     class="check-default hide-if-default">
                                                    <!---->
                                                    <div class="blg-checkbox">
                                                        <i data-ng-class="ctrl.instance.paramMap[ctrl.param.name].value.boolean ? 'icon-check' : 'icon-not-interested'"
                                                           class="show-read-only icon icon--small icon-not-interested"></i>
                                                        <!---->
                                                        <!---->


                                                        <gtm-checkbox role="checkbox"
                                                                      class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                                                      aria-checked="false"
                                                                      aria-labelledby="9-label-tag.data.vendorTemplate.param.overrideGaSettings"
                                                                      aria-disabled="false"
                                                                      aria-invalid="false"
                                                                      tabindex="2"
                                                                      id="9-tag.data.vendorTemplate.param.overrideGaSettings"
                                                                      name="tag.data.vendorTemplate.param."
                                                                      data-default-value="false">
                                                            <input type="hidden" name="overrideGaSettingsXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" value="">
                                                            <!-- Елемент checkbox -->
                                                            <div class="material-container">
                                                                <div class="material-icon"></div>
                                                            </div>
                                                        </gtm-checkbox>
                                                        <!---->
                                                        <!---->
                                                        <!---->
                                                        <!---->
                                                        <!---->
                                                        <label
                                                            for="9-tag.data.vendorTemplate.param.overrideGaSettings"
                                                            id="9-label-tag.data.vendorTemplate.param.overrideGaSettings">
                                                            Включить переопределение настроек в этом теге

                                                            <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)">
                                                                <gtm-popover class="gtm-popover-icon"></gtm-popover>
                                                            </span>
                                                        </label>
                                                        <!---->
                                                        <!---->

                                                        <div class="blg-error" data-gtm-form-error-label=""
                                                             data-field-name="ctrl.fieldPathName"
                                                             style="display: none;">
                                                            <div data-bind-html="errorMessage"
                                                                 class="gtm-error-message"></div>
                                                        </div>
                                                        <!---->

                                                        <div data-ng-if="ctrl.param.subParam" class="vt-sub-params">
                                                            <vt-params data-helper="ctrl.helper"
                                                                       data-params="ctrl.param.subParam"
                                                                       data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </vt-checkbox>





                                            <vt-text
                                                data-ng-show="helper.paramDepsManager.isParamEnabled(params[2].name)"
                                                data-helper="helper" data-param-name="'trackingId'"
                                                data-param="params[2]" data-instance="helper.instance"
                                                data-param-deps-manager="helper.paramDepsManager"
                                                data-instance-field-name="tag.data.vendorTemplate"
                                                data-field-path-name="tag.data.vendorTemplate.param.trackingId"
                                                class="ua--trackingId ng-hide" aria-hidden="true">
                                                <div data-hide-if-default="ctrl.getNotSetText() || ctrl.instance.paramMap[ctrl.param.name].value"
                                                     data-param-template="ctrl.param"
                                                     class="blg-form-input hide-if-default"
                                                     diff-field="tag.data.vendorTemplate.param.trackingId"> <!---->
                                                    <!----><label
                                                        data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                        class="blg-caption"
                                                        for="9-tag.data.vendorTemplate.param.trackingId"
                                                        id="9-label-tag.data.vendorTemplate.param.trackingId">
                                                        Идентификатор отслеживания <span
                                                            data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                class="gtm-popover-icon"></gtm-popover></span>
                                                        <!----> </label><!----><!----> <!---->
                                                    <div data-ng-if="ctrl.displayMode == ViewMode.SIMPLE"
                                                         class="vt-text-input-wrapper">
                                                        <ctui-text-input
                                                            class="hide-read-only blg-value ng-pristine ng-untouched ng-valid ng-empty"
                                                            placeholder="Источник наследования: переменная настроек"
                                                            data-ng-model="ctrl.paramValue.string"
                                                            data-ng-change="ctrl.paramDepsManager.paramInstancesChanged(ctrl.param.name)"
                                                            data-is-disabled="ctrl.helper.isDisabled"
                                                            data-suggest-on-focus="ctrl.param.suggestOnFocus"
                                                            data-suggestions="ctrl.suggestedValues"
                                                            data-icon-class="gtm-add-variable-icon"
                                                            data-button-callback="ctrl.buttonCallback || null"
                                                            data-gtm-form-error-field=""
                                                            id="9-tag.data.vendorTemplate.param.trackingId"
                                                            name="tag.data.vendorTemplate.param.trackingId"
                                                            aria-invalid="false">
                                                            <div class="gtm-text-input-inner gtm-text-addon"
                                                                 ng-class="ctrl.containerClass"><input type="text"
                                                                                                       placeholder="Источник наследования: переменная настроек"
                                                                                                       data-ng-model="ctrl.value"
                                                                                                       data-ng-change="ctrl.onInputChange()"
                                                                                                       data-ng-model-options="{ debounce: 50 }"
                                                                                                       data-ng-disabled="ctrl.isDisabled"
                                                                                                       data-ng-focus="ctrl.onFocus()"
                                                                                                       autocomplete="off"
                                                                                                       class="ctui-text-input blg-input ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                       aria-invalid="false">
                                                                <!---->
                                                                <button type="button"
                                                                        class="btn gtm-text-input__variable-btn"
                                                                        data-ng-if="ctrl.buttonCallback &amp;&amp; ctrl.iconClass"
                                                                        data-ng-click="ctrl.onButtonClick($event)"
                                                                        data-ng-disabled="ctrl.isDisabled"><i
                                                                        data-ng-class="ctrl.iconClass"
                                                                        class="gtm-add-variable-icon"></i>
                                                                </button><!----> </div>
                                                        </ctui-text-input> <!---->
                                                        <div class="show-read-only blg-value">  <!----> </div>
                                                    </div><!----> <!----> <!---->
                                                    <div data-gtm-form-error-label="" class="blg-error"
                                                         data-field-name="tag.data.vendorTemplate.param.trackingId"
                                                         style="display: none;">
                                                        <div ng-bind-html="errorMessage"
                                                             class="gtm-error-message"></div>
                                                    </div>
                                                </div>
                                            </vt-text>
                                            <vt-group
                                                data-ng-show="helper.paramDepsManager.isParamEnabled(params[3].name)"
                                                data-helper="helper" data-param-name="'moreSettings'"
                                                data-param="params[3]" data-instance="helper.instance"
                                                data-param-deps-manager="helper.paramDepsManager"
                                                data-instance-field-name="tag.data.vendorTemplate"
                                                data-field-path-name="tag.data.vendorTemplate.param.moreSettings"
                                                class="ua--moreSettings ng-hide" aria-hidden="true">
                                                <div diff-field="tag.data.vendorTemplate.param.moreSettings"><!---->
                                                    <!---->
                                                    <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                        <gtm-zippy data-zippy-title="Дополнительные настройки"
                                                                   data-is-zippy-open="ctrl.isZippyOpen"
                                                                   data-zippy-rich-help-text="">
                                                            <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                 class="gtm-zippy-collapsed"><label
                                                                    class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                    data-ng-click="toggleOpenState()"
                                                                    data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                    role="button"> <span
                                                                        class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                    <!----> <!---->
                                                                    <ng-container data-ng-if="::(!richTitleText)">
                                                                        Дополнительные настройки
                                                                    </ng-container><!----> <!----> <!----> </label>
                                                                <div class="gtm-zippy-content" data-ng-transclude=""
                                                                     style=""> <!---->
                                                                    <vt-params data-ng-if="ctrl.param.subParam"
                                                                               data-helper="ctrl.helper"
                                                                               data-param-name="ctrl.param.name"
                                                                               data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                               data-instance="ctrl.instance"
                                                                               data-param-deps-manager="ctrl.paramDepsManager"
                                                                               data-instance-field-name="tag.data.vendorTemplate">
                                                                        <vt-group
                                                                            data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                            data-helper="helper"
                                                                            data-param-name="'fieldsToSetSection'"
                                                                            data-param="params[0]"
                                                                            data-instance="helper.instance"
                                                                            data-param-deps-manager="helper.paramDepsManager"
                                                                            data-instance-field-name="tag.data.vendorTemplate"
                                                                            data-field-path-name="tag.data.vendorTemplate.param.fieldsToSetSection"
                                                                            class="ua--fieldsToSetSection ng-hide"
                                                                            aria-hidden="true">
                                                                            <div diff-field="tag.data.vendorTemplate.param.fieldsToSetSection">
                                                                                <!----> <!---->
                                                                                <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                                                    <gtm-zippy
                                                                                        data-zippy-title="Поля, которые необходимо задать"
                                                                                        data-is-zippy-open="ctrl.isZippyOpen"
                                                                                        data-zippy-rich-help-text="">
                                                                                        <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                                             class="gtm-zippy-collapsed">
                                                                                            <label class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                                                   data-ng-click="toggleOpenState()"
                                                                                                   data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                                                   role="button">
                                                                                                <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                                                <!----> <!---->
                                                                                                <ng-container
                                                                                                    data-ng-if="::(!richTitleText)">
                                                                                                    Поля, которые
                                                                                                    необходимо
                                                                                                    задать
                                                                                                </ng-container>
                                                                                                <!----> <!---->
                                                                                                <!----> </label>
                                                                                            <div class="gtm-zippy-content"
                                                                                                 data-ng-transclude=""
                                                                                                 style=""> <!---->
                                                                                                <vt-params
                                                                                                    data-ng-if="ctrl.param.subParam"
                                                                                                    data-helper="ctrl.helper"
                                                                                                    data-param-name="ctrl.param.name"
                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                    data-instance="ctrl.instance"
                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                    <vt-group
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'customUiGroup'"
                                                                                                        data-param="params[0]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.customUiGroup"
                                                                                                        class="ua--customUiGroup ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div diff-field="tag.data.vendorTemplate.param.customUiGroup">
                                                                                                            <!---->
                                                                                                            <div data-ng-if="::ctrl.useCustomUi">
                                                                                                                <vt-custom-ui-renderer
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-name="ctrl.param.customUiName"
                                                                                                                    data-param="ctrl.param"
                                                                                                                    data-param-name="ctrl.param.name"
                                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                                    data-instance="ctrl.instance"
                                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                                    data-instance-field-name="ctrl.instanceFieldName">
                                                                                                                    <gtm-vendor-template-custom-ui-fields-to-set
                                                                                                                        helper="ctrl.helper"
                                                                                                                        param="ctrl.param"
                                                                                                                        paramname="ctrl.paramName"
                                                                                                                        params="ctrl.params"
                                                                                                                        instance="ctrl.instance"
                                                                                                                        param-deps-manager="ctrl.paramDepsManager"
                                                                                                                        instance-field-name="tag.data.vendorTemplate">
                                                                                                                        <div data-hide-if-default="instance.paramMap['fieldsToSet'].value.listItem.length > 0"
                                                                                                                             class="blg-form-input hide-if-default"
                                                                                                                             diff-field="tag.data.vendorTemplate.param.fieldsToSet">
                                                                                                                            <div class="gtm-vendor-template-simple-table-md">
                                                                                                                                <div class="simple-table-row">
                                                                                                                                    <div class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                                                                                        Название
                                                                                                                                        поля
                                                                                                                                    </div>
                                                                                                                                    <div class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                                                                                        Значение
                                                                                                                                    </div>
                                                                                                                                    <div class="hide-read-only simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--minuscell"></div>
                                                                                                                                </div>
                                                                                                                                <!---->
                                                                                                                            </div>
                                                                                                                            <button class="btn hide-read-only"
                                                                                                                                    type="button"
                                                                                                                                    data-ng-click="addField()">
                                                                                                                                +&nbsp;Поле
                                                                                                                            </button>
                                                                                                                        </div>
                                                                                                                    </gtm-vendor-template-custom-ui-fields-to-set>
                                                                                                                </vt-custom-ui-renderer>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-group>
                                                                                                </vt-params><!---->
                                                                                            </div>
                                                                                        </div>
                                                                                    </gtm-zippy>
                                                                                </div><!----> <!----> </div>
                                                                        </vt-group>
                                                                        <vt-group
                                                                            data-ng-show="helper.paramDepsManager.isParamEnabled(params[1].name)"
                                                                            data-helper="helper"
                                                                            data-param-name="'customDimensionSection'"
                                                                            data-param="params[1]"
                                                                            data-instance="helper.instance"
                                                                            data-param-deps-manager="helper.paramDepsManager"
                                                                            data-instance-field-name="tag.data.vendorTemplate"
                                                                            data-field-path-name="tag.data.vendorTemplate.param.customDimensionSection"
                                                                            class="ua--customDimensionSection ng-hide"
                                                                            aria-hidden="true">
                                                                            <div diff-field="tag.data.vendorTemplate.param.customDimensionSection">
                                                                                <!----> <!---->
                                                                                <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                                                    <gtm-zippy
                                                                                        data-zippy-title="Специальные параметры"
                                                                                        data-is-zippy-open="ctrl.isZippyOpen"
                                                                                        data-zippy-rich-help-text="">
                                                                                        <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                                             class="gtm-zippy-collapsed">
                                                                                            <label class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                                                   data-ng-click="toggleOpenState()"
                                                                                                   data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                                                   role="button">
                                                                                                <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                                                <!----> <!---->
                                                                                                <ng-container
                                                                                                    data-ng-if="::(!richTitleText)">
                                                                                                    Специальные
                                                                                                    параметры
                                                                                                </ng-container>
                                                                                                <!----> <!---->
                                                                                                <!----> </label>
                                                                                            <div class="gtm-zippy-content"
                                                                                                 data-ng-transclude=""
                                                                                                 style=""> <!---->
                                                                                                <vt-params
                                                                                                    data-ng-if="ctrl.param.subParam"
                                                                                                    data-helper="ctrl.helper"
                                                                                                    data-param-name="ctrl.param.name"
                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                    data-instance="ctrl.instance"
                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                    <vt-simple-table
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'dimension'"
                                                                                                        data-param="params[0]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.dimension"
                                                                                                        class="ua--dimension ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.notSetText || ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             class="blg-form-input hide-if-default">
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-ng-if="!ctrl.notSetText || ctrl.instance.paramMap[ctrl.param.name].value.listItem.length"
                                                                                                                 class="vt-simple-table-md">
                                                                                                                <!---->
                                                                                                                <div class="simple-table-row"
                                                                                                                     data-ng-if="::ctrl.hasTableHeaders"
                                                                                                                     diff-field="!header-tag.data.vendorTemplate.param.dimension">
                                                                                                                    <!---->
                                                                                                                    <div data-ng-repeat="col in ::ctrl.param.simpleTableColumn"
                                                                                                                         class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                                                                        <!---->
                                                                                                                        <div data-ng-if="col.displayName">
                                                                                                                            Индекс
                                                                                                                        </div>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                    <!---->
                                                                                                                    <div data-ng-repeat="col in ::ctrl.param.simpleTableColumn"
                                                                                                                         class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                                                                        <!---->
                                                                                                                        <div data-ng-if="col.displayName">
                                                                                                                            Значение
                                                                                                                            параметра
                                                                                                                        </div>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                    <!---->
                                                                                                                    <div class="hide-read-only simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--remove-icon-cell"></div>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <button class="hide-read-only btn vt-st-add"
                                                                                                                    type="button"
                                                                                                                    data-ng-disabled="!ctrl.tableHelper.canAddRow || ctrl.helper.isDisabled"
                                                                                                                    data-ng-click="ctrl.addRow()">
                                                                                                                <!----><span
                                                                                                                    data-ng-if="ctrl.param.newRowButtonText"> +&nbsp;Специальный параметр </span>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                            </button>
                                                                                                            <input type="hidden"
                                                                                                                   data-ng-model="ctrl.hiddenInputValue"
                                                                                                                   name="tag.data.vendorTemplate.param.dimension"
                                                                                                                   data-gtm-form-error-field=""
                                                                                                                   autocomplete="off"
                                                                                                                   id="9-tag.data.vendorTemplate.param.dimension"
                                                                                                                   class="ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                   aria-invalid="false">
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.dimension"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-simple-table>
                                                                                                </vt-params><!---->
                                                                                            </div>
                                                                                        </div>
                                                                                    </gtm-zippy>
                                                                                </div><!----> <!----> </div>
                                                                        </vt-group>
                                                                        <vt-group
                                                                            data-ng-show="helper.paramDepsManager.isParamEnabled(params[2].name)"
                                                                            data-helper="helper"
                                                                            data-param-name="'customMetricSection'"
                                                                            data-param="params[2]"
                                                                            data-instance="helper.instance"
                                                                            data-param-deps-manager="helper.paramDepsManager"
                                                                            data-instance-field-name="tag.data.vendorTemplate"
                                                                            data-field-path-name="tag.data.vendorTemplate.param.customMetricSection"
                                                                            class="ua--customMetricSection ng-hide"
                                                                            aria-hidden="true">
                                                                            <div diff-field="tag.data.vendorTemplate.param.customMetricSection">
                                                                                <!----> <!---->
                                                                                <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                                                    <gtm-zippy
                                                                                        data-zippy-title="Специальные показатели"
                                                                                        data-is-zippy-open="ctrl.isZippyOpen"
                                                                                        data-zippy-rich-help-text="">
                                                                                        <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                                             class="gtm-zippy-collapsed">
                                                                                            <label class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                                                   data-ng-click="toggleOpenState()"
                                                                                                   data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                                                   role="button">
                                                                                                <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                                                <!----> <!---->
                                                                                                <ng-container
                                                                                                    data-ng-if="::(!richTitleText)">
                                                                                                    Специальные
                                                                                                    показатели
                                                                                                </ng-container>
                                                                                                <!----> <!---->
                                                                                                <!----> </label>
                                                                                            <div class="gtm-zippy-content"
                                                                                                 data-ng-transclude=""
                                                                                                 style=""> <!---->
                                                                                                <vt-params
                                                                                                    data-ng-if="ctrl.param.subParam"
                                                                                                    data-helper="ctrl.helper"
                                                                                                    data-param-name="ctrl.param.name"
                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                    data-instance="ctrl.instance"
                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                    <vt-simple-table
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'metric'"
                                                                                                        data-param="params[0]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.metric"
                                                                                                        class="ua--metric ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.notSetText || ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             class="blg-form-input hide-if-default">
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-ng-if="!ctrl.notSetText || ctrl.instance.paramMap[ctrl.param.name].value.listItem.length"
                                                                                                                 class="vt-simple-table-md">
                                                                                                                <!---->
                                                                                                                <div class="simple-table-row"
                                                                                                                     data-ng-if="::ctrl.hasTableHeaders"
                                                                                                                     diff-field="!header-tag.data.vendorTemplate.param.metric">
                                                                                                                    <!---->
                                                                                                                    <div data-ng-repeat="col in ::ctrl.param.simpleTableColumn"
                                                                                                                         class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                                                                        <!---->
                                                                                                                        <div data-ng-if="col.displayName">
                                                                                                                            Индекс
                                                                                                                        </div>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                    <!---->
                                                                                                                    <div data-ng-repeat="col in ::ctrl.param.simpleTableColumn"
                                                                                                                         class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                                                                        <!---->
                                                                                                                        <div data-ng-if="col.displayName">
                                                                                                                            Значение
                                                                                                                            показателя
                                                                                                                        </div>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                    <!---->
                                                                                                                    <div class="hide-read-only simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--remove-icon-cell"></div>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <button class="hide-read-only btn vt-st-add"
                                                                                                                    type="button"
                                                                                                                    data-ng-disabled="!ctrl.tableHelper.canAddRow || ctrl.helper.isDisabled"
                                                                                                                    data-ng-click="ctrl.addRow()">
                                                                                                                <!----><span
                                                                                                                    data-ng-if="ctrl.param.newRowButtonText"> +&nbsp;Специальный показатель </span>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                            </button>
                                                                                                            <input type="hidden"
                                                                                                                   data-ng-model="ctrl.hiddenInputValue"
                                                                                                                   name="tag.data.vendorTemplate.param.metric"
                                                                                                                   data-gtm-form-error-field=""
                                                                                                                   autocomplete="off"
                                                                                                                   id="9-tag.data.vendorTemplate.param.metric"
                                                                                                                   class="ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                   aria-invalid="false">
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.metric"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-simple-table>
                                                                                                </vt-params><!---->
                                                                                            </div>
                                                                                        </div>
                                                                                    </gtm-zippy>
                                                                                </div><!----> <!----> </div>
                                                                        </vt-group>
                                                                        <vt-group
                                                                            data-ng-show="helper.paramDepsManager.isParamEnabled(params[3].name)"
                                                                            data-helper="helper"
                                                                            data-param-name="'contentGroupSection'"
                                                                            data-param="params[3]"
                                                                            data-instance="helper.instance"
                                                                            data-param-deps-manager="helper.paramDepsManager"
                                                                            data-instance-field-name="tag.data.vendorTemplate"
                                                                            data-field-path-name="tag.data.vendorTemplate.param.contentGroupSection"
                                                                            class="ua--contentGroupSection ng-hide"
                                                                            aria-hidden="true">
                                                                            <div diff-field="tag.data.vendorTemplate.param.contentGroupSection">
                                                                                <!----> <!---->
                                                                                <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                                                    <gtm-zippy
                                                                                        data-zippy-title="Группы контента"
                                                                                        data-is-zippy-open="ctrl.isZippyOpen"
                                                                                        data-zippy-rich-help-text="">
                                                                                        <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                                             class="gtm-zippy-collapsed">
                                                                                            <label class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                                                   data-ng-click="toggleOpenState()"
                                                                                                   data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                                                   role="button">
                                                                                                <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                                                <!----> <!---->
                                                                                                <ng-container
                                                                                                    data-ng-if="::(!richTitleText)">
                                                                                                    Группы контента
                                                                                                </ng-container>
                                                                                                <!----> <!---->
                                                                                                <!----> </label>
                                                                                            <div class="gtm-zippy-content"
                                                                                                 data-ng-transclude=""
                                                                                                 style=""> <!---->
                                                                                                <vt-params
                                                                                                    data-ng-if="ctrl.param.subParam"
                                                                                                    data-helper="ctrl.helper"
                                                                                                    data-param-name="ctrl.param.name"
                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                    data-instance="ctrl.instance"
                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                    <vt-simple-table
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'contentGroup'"
                                                                                                        data-param="params[0]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.contentGroup"
                                                                                                        class="ua--contentGroup ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.notSetText || ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             class="blg-form-input hide-if-default">
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-ng-if="!ctrl.notSetText || ctrl.instance.paramMap[ctrl.param.name].value.listItem.length"
                                                                                                                 class="vt-simple-table-md">
                                                                                                                <!---->
                                                                                                                <div class="simple-table-row"
                                                                                                                     data-ng-if="::ctrl.hasTableHeaders"
                                                                                                                     diff-field="!header-tag.data.vendorTemplate.param.contentGroup">
                                                                                                                    <!---->
                                                                                                                    <div data-ng-repeat="col in ::ctrl.param.simpleTableColumn"
                                                                                                                         class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                                                                        <!---->
                                                                                                                        <div data-ng-if="col.displayName">
                                                                                                                            Индекс
                                                                                                                        </div>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                    <!---->
                                                                                                                    <div data-ng-repeat="col in ::ctrl.param.simpleTableColumn"
                                                                                                                         class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                                                                        <!---->
                                                                                                                        <div data-ng-if="col.displayName">
                                                                                                                            Группа
                                                                                                                            контента
                                                                                                                        </div>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                    <!---->
                                                                                                                    <div class="hide-read-only simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--remove-icon-cell"></div>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <button class="hide-read-only btn vt-st-add"
                                                                                                                    type="button"
                                                                                                                    data-ng-disabled="!ctrl.tableHelper.canAddRow || ctrl.helper.isDisabled"
                                                                                                                    data-ng-click="ctrl.addRow()">
                                                                                                                <!----><span
                                                                                                                    data-ng-if="ctrl.param.newRowButtonText"> +&nbsp;Группа контента </span>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                            </button>
                                                                                                            <input type="hidden"
                                                                                                                   data-ng-model="ctrl.hiddenInputValue"
                                                                                                                   name="tag.data.vendorTemplate.param.contentGroup"
                                                                                                                   data-gtm-form-error-field=""
                                                                                                                   autocomplete="off"
                                                                                                                   id="9-tag.data.vendorTemplate.param.contentGroup"
                                                                                                                   class="ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                   aria-invalid="false">
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.contentGroup"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-simple-table>
                                                                                                </vt-params><!---->
                                                                                            </div>
                                                                                        </div>
                                                                                    </gtm-zippy>
                                                                                </div><!----> <!----> </div>
                                                                        </vt-group>
                                                                        <vt-group
                                                                            data-ng-show="helper.paramDepsManager.isParamEnabled(params[4].name)"
                                                                            data-helper="helper"
                                                                            data-param-name="'ecommerceSection'"
                                                                            data-param="params[4]"
                                                                            data-instance="helper.instance"
                                                                            data-param-deps-manager="helper.paramDepsManager"
                                                                            data-instance-field-name="tag.data.vendorTemplate"
                                                                            data-field-path-name="tag.data.vendorTemplate.param.ecommerceSection"
                                                                            class="ua--ecommerceSection ng-hide"
                                                                            aria-hidden="true">
                                                                            <div diff-field="tag.data.vendorTemplate.param.ecommerceSection">
                                                                                <!----> <!---->
                                                                                <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                                                    <gtm-zippy
                                                                                        data-zippy-title="Электронная торговля"
                                                                                        data-is-zippy-open="ctrl.isZippyOpen"
                                                                                        data-zippy-rich-help-text="">
                                                                                        <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                                             class="gtm-zippy-collapsed">
                                                                                            <label class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                                                   data-ng-click="toggleOpenState()"
                                                                                                   data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                                                   role="button">
                                                                                                <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                                                <!----> <!---->
                                                                                                <ng-container
                                                                                                    data-ng-if="::(!richTitleText)">
                                                                                                    Электронная
                                                                                                    торговля
                                                                                                </ng-container>
                                                                                                <!----> <!---->
                                                                                                <!----> </label>
                                                                                            <div class="gtm-zippy-content"
                                                                                                 data-ng-transclude=""
                                                                                                 style=""> <!---->
                                                                                                <vt-params
                                                                                                    data-ng-if="ctrl.param.subParam"
                                                                                                    data-helper="ctrl.helper"
                                                                                                    data-param-name="ctrl.param.name"
                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                    data-instance="ctrl.instance"
                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'enableEcommerce'"
                                                                                                        data-param="params[0]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.enableEcommerce"
                                                                                                        class="ua--enableEcommerce ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input hide-if-default"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.enableEcommerce">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.enableEcommerce"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.enableEcommerce">
                                                                                                                Включить
                                                                                                                расширенные
                                                                                                                функции
                                                                                                                электронной
                                                                                                                торговли
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                                                                        class="gtm-popover-icon"></gtm-popover></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.enableEcommerce"
                                                                                                                    name="tag.data.vendorTemplate.param.enableEcommerce"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Источник наследования: переменная настроек"
                                                                                                                        value="undefined:undefined"
                                                                                                                        selected="selected">
                                                                                                                    Источник
                                                                                                                    наследования:
                                                                                                                    переменная
                                                                                                                    настроек
                                                                                                                </option>
                                                                                                                <option label="False"
                                                                                                                        value="string:s-1691">
                                                                                                                    False
                                                                                                                </option>
                                                                                                                <option label="True"
                                                                                                                        value="string:s-1690">
                                                                                                                    True
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Источник
                                                                                                                наследования:
                                                                                                                переменная
                                                                                                                настроек
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.enableEcommerce"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                    <vt-checkbox
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[1].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'useEcommerceDataLayer'"
                                                                                                        data-param="params[1]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.useEcommerceDataLayer"
                                                                                                        class="ua--useEcommerceDataLayer ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             diff-field="tag.data.vendorTemplate.param.useEcommerceDataLayer"
                                                                                                             class="hide-if-default">
                                                                                                            <!---->
                                                                                                            <div class="blg-checkbox">
                                                                                                                <i data-ng-class="ctrl.instance.paramMap[ctrl.param.name].value.boolean ? 'icon-check' : 'icon-not-interested'"
                                                                                                                   class="show-read-only icon icon--small icon-not-interested"></i>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <gtm-checkbox
                                                                                                                    data-ng-if="::!ctrl.displayStyles['CHECKBOX_IS_SWITCH']"
                                                                                                                    data-ng-model="ctrl.instance.paramMap[ctrl.param.name].value.boolean"
                                                                                                                    data-ng-change="ctrl.paramDepsManager.paramInstancesChanged()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    id="9-tag.data.vendorTemplate.param.useEcommerceDataLayer"
                                                                                                                    aria-labelledby="9-label-tag.data.vendorTemplate.param.useEcommerceDataLayer"
                                                                                                                    name="tag.data.vendorTemplate.param.useEcommerceDataLayer"
                                                                                                                    aria-checked="false"
                                                                                                                    role="checkbox"
                                                                                                                    tabindex="0"
                                                                                                                    aria-disabled="false"
                                                                                                                    aria-invalid="false">
                                                                                                                    <div class="material-container">
                                                                                                                        <div class="material-icon"></div>
                                                                                                                    </div>
                                                                                                                </gtm-checkbox>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!----><label
                                                                                                                    data-ng-if="ctrl.param.checkboxText"
                                                                                                                    for="9-tag.data.vendorTemplate.param.useEcommerceDataLayer"
                                                                                                                    id="9-label-tag.data.vendorTemplate.param.useEcommerceDataLayer">
                                                                                                                    Использовать
                                                                                                                    уровень
                                                                                                                    данных
                                                                                                                    <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                                </label>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <div class="blg-error"
                                                                                                                     data-gtm-form-error-label=""
                                                                                                                     data-field-name="ctrl.fieldPathName"
                                                                                                                     style="display: none;">
                                                                                                                    <div ng-bind-html="errorMessage"
                                                                                                                         class="gtm-error-message"></div>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                                <div data-ng-if="ctrl.param.subParam"
                                                                                                                     class="vt-sub-params">
                                                                                                                    <vt-params
                                                                                                                        data-helper="ctrl.helper"
                                                                                                                        data-params="ctrl.param.subParam"
                                                                                                                        data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-checkbox>
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[2].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'ecommerceMacroData'"
                                                                                                        data-param="params[2]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.ecommerceMacroData"
                                                                                                        class="ua--ecommerceMacroData ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.ecommerceMacroData">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.ecommerceMacroData"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.ecommerceMacroData">
                                                                                                                Чтение
                                                                                                                данных
                                                                                                                из
                                                                                                                переменной
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-not-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.ecommerceMacroData"
                                                                                                                    name="tag.data.vendorTemplate.param.ecommerceMacroData"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="{{1111 Настройки Google Аналитики}}"
                                                                                                                        value="string:s-1597"
                                                                                                                        selected="selected">
                                                                                                                    {{1111
                                                                                                                    Настройки
                                                                                                                    Google
                                                                                                                    Аналитики}}
                                                                                                                </option>
                                                                                                                <option label="{{Event}}"
                                                                                                                        value="string:s-1598">
                                                                                                                    {{Event}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Hostname}}"
                                                                                                                        value="string:s-1599">
                                                                                                                    {{Page
                                                                                                                    Hostname}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Path}}"
                                                                                                                        value="string:s-1600">
                                                                                                                    {{Page
                                                                                                                    Path}}
                                                                                                                </option>
                                                                                                                <option label="{{Page URL}}"
                                                                                                                        value="string:s-1601">
                                                                                                                    {{Page
                                                                                                                    URL}}
                                                                                                                </option>
                                                                                                                <option label="{{Referrer}}"
                                                                                                                        value="string:s-1602">
                                                                                                                    {{Referrer}}
                                                                                                                </option>
                                                                                                                <option disabled=""
                                                                                                                        label="---------"
                                                                                                                        value="string:s-1603">
                                                                                                                    ---------
                                                                                                                </option>
                                                                                                                <option label="Новая переменная…"
                                                                                                                        value="string:s-1604">
                                                                                                                    Новая
                                                                                                                    переменная…
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <gtm-inspect-entity
                                                                                                                class="hide-read-only"
                                                                                                                data-ng-if="ctrl.selectedItem &amp;&amp; ctrl.selectedItem.type === ctrl.SuggestionType.VARIABLE"
                                                                                                                data-entity="ctrl.selectedItem.entity">
                                                                                                                <i class="gtm-info-outline-icon icon-button"
                                                                                                                   data-ng-click="ctrl.open($event);"
                                                                                                                   role="button"></i>
                                                                                                            </gtm-inspect-entity>
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                {{1111
                                                                                                                Настройки
                                                                                                                Google
                                                                                                                Аналитики}}
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <gtm-inspect-entity
                                                                                                                    data-ng-if="ctrl.selectedItem &amp;&amp; ctrl.selectedItem.type === ctrl.SuggestionType.VARIABLE"
                                                                                                                    data-entity="ctrl.selectedItem.entity">
                                                                                                                    <i class="gtm-info-outline-icon icon-button"
                                                                                                                       data-ng-click="ctrl.open($event);"
                                                                                                                       role="button"></i>
                                                                                                                </gtm-inspect-entity>
                                                                                                                <!---->
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.ecommerceMacroData"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                    <vt-checkbox
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[3].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'useGA4SchemaForEcommerce'"
                                                                                                        data-param="params[3]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.useGA4SchemaForEcommerce"
                                                                                                        class="ua--useGA4SchemaForEcommerce ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             diff-field="tag.data.vendorTemplate.param.useGA4SchemaForEcommerce"
                                                                                                             class="hide-if-default">
                                                                                                            <!---->
                                                                                                            <div class="blg-checkbox">
                                                                                                                <i data-ng-class="ctrl.instance.paramMap[ctrl.param.name].value.boolean ? 'icon-check' : 'icon-not-interested'"
                                                                                                                   class="show-read-only icon icon--small icon-not-interested"></i>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <gtm-checkbox
                                                                                                                    data-ng-if="::!ctrl.displayStyles['CHECKBOX_IS_SWITCH']"
                                                                                                                    data-ng-model="ctrl.instance.paramMap[ctrl.param.name].value.boolean"
                                                                                                                    data-ng-change="ctrl.paramDepsManager.paramInstancesChanged()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    id="9-tag.data.vendorTemplate.param.useGA4SchemaForEcommerce"
                                                                                                                    aria-labelledby="9-label-tag.data.vendorTemplate.param.useGA4SchemaForEcommerce"
                                                                                                                    name="tag.data.vendorTemplate.param.useGA4SchemaForEcommerce"
                                                                                                                    aria-checked="false"
                                                                                                                    role="checkbox"
                                                                                                                    tabindex="0"
                                                                                                                    aria-disabled="false"
                                                                                                                    aria-invalid="false">
                                                                                                                    <div class="material-container">
                                                                                                                        <div class="material-icon"></div>
                                                                                                                    </div>
                                                                                                                </gtm-checkbox>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!----><label
                                                                                                                    data-ng-if="ctrl.param.checkboxText"
                                                                                                                    for="9-tag.data.vendorTemplate.param.useGA4SchemaForEcommerce"
                                                                                                                    id="9-label-tag.data.vendorTemplate.param.useGA4SchemaForEcommerce">
                                                                                                                    Use
                                                                                                                    GA4
                                                                                                                    schema
                                                                                                                    <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                                </label>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <div class="blg-error"
                                                                                                                     data-gtm-form-error-label=""
                                                                                                                     data-field-name="ctrl.fieldPathName"
                                                                                                                     style="display: none;">
                                                                                                                    <div ng-bind-html="errorMessage"
                                                                                                                         class="gtm-error-message"></div>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                                <div data-ng-if="ctrl.param.subParam"
                                                                                                                     class="vt-sub-params">
                                                                                                                    <vt-params
                                                                                                                        data-helper="ctrl.helper"
                                                                                                                        data-params="ctrl.param.subParam"
                                                                                                                        data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-checkbox>
                                                                                                </vt-params><!---->
                                                                                            </div>
                                                                                        </div>
                                                                                    </gtm-zippy>
                                                                                </div><!----> <!----> </div>
                                                                        </vt-group>
                                                                        <vt-group
                                                                            data-ng-show="helper.paramDepsManager.isParamEnabled(params[5].name)"
                                                                            data-helper="helper"
                                                                            data-param-name="'advertisingSection'"
                                                                            data-param="params[5]"
                                                                            data-instance="helper.instance"
                                                                            data-param-deps-manager="helper.paramDepsManager"
                                                                            data-instance-field-name="tag.data.vendorTemplate"
                                                                            data-field-path-name="tag.data.vendorTemplate.param.advertisingSection"
                                                                            class="ua--advertisingSection ng-hide"
                                                                            aria-hidden="true">
                                                                            <div diff-field="tag.data.vendorTemplate.param.advertisingSection">
                                                                                <!----> <!---->
                                                                                <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                                                    <gtm-zippy
                                                                                        data-zippy-title="Реклама"
                                                                                        data-is-zippy-open="ctrl.isZippyOpen"
                                                                                        data-zippy-rich-help-text="">
                                                                                        <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                                             class="gtm-zippy-collapsed">
                                                                                            <label class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                                                   data-ng-click="toggleOpenState()"
                                                                                                   data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                                                   role="button">
                                                                                                <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                                                <!----> <!---->
                                                                                                <ng-container
                                                                                                    data-ng-if="::(!richTitleText)">
                                                                                                    Реклама
                                                                                                </ng-container>
                                                                                                <!----> <!---->
                                                                                                <!----> </label>
                                                                                            <div class="gtm-zippy-content"
                                                                                                 data-ng-transclude=""
                                                                                                 style=""> <!---->
                                                                                                <vt-params
                                                                                                    data-ng-if="ctrl.param.subParam"
                                                                                                    data-helper="ctrl.helper"
                                                                                                    data-param-name="ctrl.param.name"
                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                    data-instance="ctrl.instance"
                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'advertisingFeaturesType'"
                                                                                                        data-param="params[0]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.advertisingFeaturesType"
                                                                                                        class="ua--advertisingFeaturesType ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.advertisingFeaturesType">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.advertisingFeaturesType"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.advertisingFeaturesType">
                                                                                                                Включить
                                                                                                                функции
                                                                                                                для
                                                                                                                рекламодателей
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-not-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.advertisingFeaturesType"
                                                                                                                    name="tag.data.vendorTemplate.param.advertisingFeaturesType"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Нет"
                                                                                                                        value="string:s-1605"
                                                                                                                        selected="selected">
                                                                                                                    Нет
                                                                                                                </option>
                                                                                                                <option label="Функции для контекстно-медийной сети"
                                                                                                                        value="string:s-1606">
                                                                                                                    Функции
                                                                                                                    для
                                                                                                                    контекстно-медийной
                                                                                                                    сети
                                                                                                                </option>
                                                                                                                <option label="Функции для контекстно-медийной сети и списки ремаркетинга для поисковых объявлений"
                                                                                                                        value="string:s-1607">
                                                                                                                    Функции
                                                                                                                    для
                                                                                                                    контекстно-медийной
                                                                                                                    сети
                                                                                                                    и
                                                                                                                    списки
                                                                                                                    ремаркетинга
                                                                                                                    для
                                                                                                                    поисковых
                                                                                                                    объявлений
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Нет
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.advertisingFeaturesType"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[1].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'doubleClick'"
                                                                                                        data-param="params[1]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.doubleClick"
                                                                                                        class="ua--doubleClick ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input hide-if-default"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.doubleClick">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.doubleClick"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.doubleClick">
                                                                                                                Включить
                                                                                                                функции
                                                                                                                для
                                                                                                                контекстно-медийной
                                                                                                                сети
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                                                                        class="gtm-popover-icon"></gtm-popover></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.doubleClick"
                                                                                                                    name="tag.data.vendorTemplate.param.doubleClick"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Источник наследования: переменная настроек"
                                                                                                                        value="undefined:undefined"
                                                                                                                        selected="selected">
                                                                                                                    Источник
                                                                                                                    наследования:
                                                                                                                    переменная
                                                                                                                    настроек
                                                                                                                </option>
                                                                                                                <option label="False"
                                                                                                                        value="string:s-1693">
                                                                                                                    False
                                                                                                                </option>
                                                                                                                <option label="True"
                                                                                                                        value="string:s-1692">
                                                                                                                    True
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Источник
                                                                                                                наследования:
                                                                                                                переменная
                                                                                                                настроек
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.doubleClick"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                </vt-params><!---->
                                                                                            </div>
                                                                                        </div>
                                                                                    </gtm-zippy>
                                                                                </div><!----> <!----> </div>
                                                                        </vt-group>
                                                                        <vt-group
                                                                            data-ng-show="helper.paramDepsManager.isParamEnabled(params[6].name)"
                                                                            data-helper="helper"
                                                                            data-param-name="'crossDomainSection'"
                                                                            data-param="params[6]"
                                                                            data-instance="helper.instance"
                                                                            data-param-deps-manager="helper.paramDepsManager"
                                                                            data-instance-field-name="tag.data.vendorTemplate"
                                                                            data-field-path-name="tag.data.vendorTemplate.param.crossDomainSection"
                                                                            class="ua--crossDomainSection ng-hide"
                                                                            aria-hidden="true">
                                                                            <div diff-field="tag.data.vendorTemplate.param.crossDomainSection">
                                                                                <!----> <!---->
                                                                                <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                                                    <gtm-zippy
                                                                                        data-zippy-title="Междоменное отслеживание"
                                                                                        data-is-zippy-open="ctrl.isZippyOpen"
                                                                                        data-zippy-rich-help-text="">
                                                                                        <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                                             class="gtm-zippy-collapsed">
                                                                                            <label class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                                                   data-ng-click="toggleOpenState()"
                                                                                                   data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                                                   role="button">
                                                                                                <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                                                <!----> <!---->
                                                                                                <ng-container
                                                                                                    data-ng-if="::(!richTitleText)">
                                                                                                    Междоменное
                                                                                                    отслеживание
                                                                                                </ng-container>
                                                                                                <!----> <!---->
                                                                                                <!----> </label>
                                                                                            <div class="gtm-zippy-content"
                                                                                                 data-ng-transclude=""
                                                                                                 style=""> <!---->
                                                                                                <vt-params
                                                                                                    data-ng-if="ctrl.param.subParam"
                                                                                                    data-helper="ctrl.helper"
                                                                                                    data-param-name="ctrl.param.name"
                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                    data-instance="ctrl.instance"
                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                    <vt-text
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'autoLinkDomains'"
                                                                                                        data-param="params[0]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.autoLinkDomains"
                                                                                                        class="ua--autoLinkDomains ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.getNotSetText() || ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             class="blg-form-input hide-if-default"
                                                                                                             diff-field="tag.data.vendorTemplate.param.autoLinkDomains">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                class="blg-caption"
                                                                                                                for="9-tag.data.vendorTemplate.param.autoLinkDomains"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.autoLinkDomains">
                                                                                                                Автоматическое
                                                                                                                связывание
                                                                                                                доменов
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                                                                        class="gtm-popover-icon"></gtm-popover></span>
                                                                                                                <!---->
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.displayMode == ViewMode.SIMPLE"
                                                                                                                 class="vt-text-input-wrapper">
                                                                                                                <ctui-text-input
                                                                                                                    class="hide-read-only blg-value ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    placeholder=""
                                                                                                                    data-ng-model="ctrl.paramValue.string"
                                                                                                                    data-ng-change="ctrl.paramDepsManager.paramInstancesChanged(ctrl.param.name)"
                                                                                                                    data-is-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-suggest-on-focus="ctrl.param.suggestOnFocus"
                                                                                                                    data-suggestions="ctrl.suggestedValues"
                                                                                                                    data-icon-class="gtm-add-variable-icon"
                                                                                                                    data-button-callback="ctrl.buttonCallback || null"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.autoLinkDomains"
                                                                                                                    name="tag.data.vendorTemplate.param.autoLinkDomains"
                                                                                                                    aria-invalid="false">
                                                                                                                    <div class="gtm-text-input-inner gtm-text-addon"
                                                                                                                         ng-class="ctrl.containerClass">
                                                                                                                        <input type="text"
                                                                                                                               placeholder=""
                                                                                                                               data-ng-model="ctrl.value"
                                                                                                                               data-ng-change="ctrl.onInputChange()"
                                                                                                                               data-ng-model-options="{ debounce: 50 }"
                                                                                                                               data-ng-disabled="ctrl.isDisabled"
                                                                                                                               data-ng-focus="ctrl.onFocus()"
                                                                                                                               autocomplete="off"
                                                                                                                               class="ctui-text-input blg-input ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                               aria-invalid="false">
                                                                                                                        <!---->
                                                                                                                        <button type="button"
                                                                                                                                class="btn gtm-text-input__variable-btn"
                                                                                                                                data-ng-if="ctrl.buttonCallback &amp;&amp; ctrl.iconClass"
                                                                                                                                data-ng-click="ctrl.onButtonClick($event)"
                                                                                                                                data-ng-disabled="ctrl.isDisabled">
                                                                                                                            <i data-ng-class="ctrl.iconClass"
                                                                                                                               class="gtm-add-variable-icon"></i>
                                                                                                                        </button>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                </ctui-text-input>
                                                                                                                <!---->
                                                                                                                <div class="show-read-only blg-value">
                                                                                                                    <!----> </div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-gtm-form-error-label=""
                                                                                                                 class="blg-error"
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.autoLinkDomains"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-text>
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[1].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'useHashAutoLink'"
                                                                                                        data-param="params[1]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.useHashAutoLink"
                                                                                                        class="ua--useHashAutoLink ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input hide-if-default"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.useHashAutoLink">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.useHashAutoLink"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.useHashAutoLink">
                                                                                                                Использовать
                                                                                                                решетку
                                                                                                                в
                                                                                                                качестве
                                                                                                                разделителя
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.useHashAutoLink"
                                                                                                                    name="tag.data.vendorTemplate.param.useHashAutoLink"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Источник наследования: переменная настроек"
                                                                                                                        value="undefined:undefined"
                                                                                                                        selected="selected">
                                                                                                                    Источник
                                                                                                                    наследования:
                                                                                                                    переменная
                                                                                                                    настроек
                                                                                                                </option>
                                                                                                                <option label="False"
                                                                                                                        value="string:s-1695">
                                                                                                                    False
                                                                                                                </option>
                                                                                                                <option label="True"
                                                                                                                        value="string:s-1694">
                                                                                                                    True
                                                                                                                </option>
                                                                                                                <option label="{{1111 Настройки Google Аналитики}}"
                                                                                                                        value="string:s-1696">
                                                                                                                    {{1111
                                                                                                                    Настройки
                                                                                                                    Google
                                                                                                                    Аналитики}}
                                                                                                                </option>
                                                                                                                <option label="{{Event}}"
                                                                                                                        value="string:s-1697">
                                                                                                                    {{Event}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Hostname}}"
                                                                                                                        value="string:s-1698">
                                                                                                                    {{Page
                                                                                                                    Hostname}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Path}}"
                                                                                                                        value="string:s-1699">
                                                                                                                    {{Page
                                                                                                                    Path}}
                                                                                                                </option>
                                                                                                                <option label="{{Page URL}}"
                                                                                                                        value="string:s-1700">
                                                                                                                    {{Page
                                                                                                                    URL}}
                                                                                                                </option>
                                                                                                                <option label="{{Referrer}}"
                                                                                                                        value="string:s-1701">
                                                                                                                    {{Referrer}}
                                                                                                                </option>
                                                                                                                <option disabled=""
                                                                                                                        label="---------"
                                                                                                                        value="string:s-1702">
                                                                                                                    ---------
                                                                                                                </option>
                                                                                                                <option label="Новая переменная…"
                                                                                                                        value="string:s-1703">
                                                                                                                    Новая
                                                                                                                    переменная…
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Источник
                                                                                                                наследования:
                                                                                                                переменная
                                                                                                                настроек
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.useHashAutoLink"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[2].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'decorateFormsAutoLink'"
                                                                                                        data-param="params[2]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.decorateFormsAutoLink"
                                                                                                        class="ua--decorateFormsAutoLink ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input hide-if-default"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.decorateFormsAutoLink">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.decorateFormsAutoLink"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.decorateFormsAutoLink">
                                                                                                                Изменение
                                                                                                                внешнего
                                                                                                                вида
                                                                                                                форм
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.decorateFormsAutoLink"
                                                                                                                    name="tag.data.vendorTemplate.param.decorateFormsAutoLink"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Источник наследования: переменная настроек"
                                                                                                                        value="undefined:undefined"
                                                                                                                        selected="selected">
                                                                                                                    Источник
                                                                                                                    наследования:
                                                                                                                    переменная
                                                                                                                    настроек
                                                                                                                </option>
                                                                                                                <option label="False"
                                                                                                                        value="string:s-1705">
                                                                                                                    False
                                                                                                                </option>
                                                                                                                <option label="True"
                                                                                                                        value="string:s-1704">
                                                                                                                    True
                                                                                                                </option>
                                                                                                                <option label="{{1111 Настройки Google Аналитики}}"
                                                                                                                        value="string:s-1706">
                                                                                                                    {{1111
                                                                                                                    Настройки
                                                                                                                    Google
                                                                                                                    Аналитики}}
                                                                                                                </option>
                                                                                                                <option label="{{Event}}"
                                                                                                                        value="string:s-1707">
                                                                                                                    {{Event}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Hostname}}"
                                                                                                                        value="string:s-1708">
                                                                                                                    {{Page
                                                                                                                    Hostname}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Path}}"
                                                                                                                        value="string:s-1709">
                                                                                                                    {{Page
                                                                                                                    Path}}
                                                                                                                </option>
                                                                                                                <option label="{{Page URL}}"
                                                                                                                        value="string:s-1710">
                                                                                                                    {{Page
                                                                                                                    URL}}
                                                                                                                </option>
                                                                                                                <option label="{{Referrer}}"
                                                                                                                        value="string:s-1711">
                                                                                                                    {{Referrer}}
                                                                                                                </option>
                                                                                                                <option disabled=""
                                                                                                                        label="---------"
                                                                                                                        value="string:s-1712">
                                                                                                                    ---------
                                                                                                                </option>
                                                                                                                <option label="Новая переменная…"
                                                                                                                        value="string:s-1713">
                                                                                                                    Новая
                                                                                                                    переменная…
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Источник
                                                                                                                наследования:
                                                                                                                переменная
                                                                                                                настроек
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.decorateFormsAutoLink"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                </vt-params><!---->
                                                                                            </div>
                                                                                        </div>
                                                                                    </gtm-zippy>
                                                                                </div><!----> <!----> </div>
                                                                        </vt-group>
                                                                        <vt-group
                                                                            data-ng-show="helper.paramDepsManager.isParamEnabled(params[7].name)"
                                                                            data-helper="helper"
                                                                            data-param-name="'advancedSection'"
                                                                            data-param="params[7]"
                                                                            data-instance="helper.instance"
                                                                            data-param-deps-manager="helper.paramDepsManager"
                                                                            data-instance-field-name="tag.data.vendorTemplate"
                                                                            data-field-path-name="tag.data.vendorTemplate.param.advancedSection"
                                                                            class="ua--advancedSection ng-hide"
                                                                            aria-hidden="true">
                                                                            <div diff-field="tag.data.vendorTemplate.param.advancedSection">
                                                                                <!----> <!---->
                                                                                <div data-ng-if="::(!ctrl.useCustomUi &amp;&amp; ctrl.hasZippy)">
                                                                                    <gtm-zippy
                                                                                        data-zippy-title="Расширенная конфигурация"
                                                                                        data-is-zippy-open="ctrl.isZippyOpen"
                                                                                        data-zippy-rich-help-text="">
                                                                                        <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                                                                             class="gtm-zippy-collapsed">
                                                                                            <label class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                                                                                   data-ng-click="toggleOpenState()"
                                                                                                   data-ng-class="{'hide-read-only': isZippyEmpty()}"
                                                                                                   role="button">
                                                                                                <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                                                                                <!----> <!---->
                                                                                                <ng-container
                                                                                                    data-ng-if="::(!richTitleText)">
                                                                                                    Расширенная
                                                                                                    конфигурация
                                                                                                </ng-container>
                                                                                                <!----> <!---->
                                                                                                <!----> </label>
                                                                                            <div class="gtm-zippy-content"
                                                                                                 data-ng-transclude=""
                                                                                                 style=""> <!---->
                                                                                                <vt-params
                                                                                                    data-ng-if="ctrl.param.subParam"
                                                                                                    data-helper="ctrl.helper"
                                                                                                    data-param-name="ctrl.param.name"
                                                                                                    data-params="ctrl.helper.getSubParams(ctrl.param.name)"
                                                                                                    data-instance="ctrl.instance"
                                                                                                    data-param-deps-manager="ctrl.paramDepsManager"
                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                    <vt-text
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'functionName'"
                                                                                                        data-param="params[0]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.functionName"
                                                                                                        class="ua--functionName ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.getNotSetText() || ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             class="blg-form-input hide-if-default"
                                                                                                             diff-field="tag.data.vendorTemplate.param.functionName">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                class="blg-caption"
                                                                                                                for="9-tag.data.vendorTemplate.param.functionName"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.functionName">
                                                                                                                Название
                                                                                                                глобальной
                                                                                                                функции
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                                                                        class="gtm-popover-icon"></gtm-popover></span>
                                                                                                                <!---->
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.displayMode == ViewMode.SIMPLE"
                                                                                                                 class="vt-text-input-wrapper">
                                                                                                                <ctui-text-input
                                                                                                                    class="hide-read-only blg-value ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    placeholder=""
                                                                                                                    data-ng-model="ctrl.paramValue.string"
                                                                                                                    data-ng-change="ctrl.paramDepsManager.paramInstancesChanged(ctrl.param.name)"
                                                                                                                    data-is-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-suggest-on-focus="ctrl.param.suggestOnFocus"
                                                                                                                    data-suggestions="ctrl.suggestedValues"
                                                                                                                    data-icon-class="gtm-add-variable-icon"
                                                                                                                    data-button-callback="ctrl.buttonCallback || null"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.functionName"
                                                                                                                    name="tag.data.vendorTemplate.param.functionName"
                                                                                                                    aria-invalid="false">
                                                                                                                    <div class="gtm-text-input-inner gtm-text-addon"
                                                                                                                         ng-class="ctrl.containerClass">
                                                                                                                        <input type="text"
                                                                                                                               placeholder=""
                                                                                                                               data-ng-model="ctrl.value"
                                                                                                                               data-ng-change="ctrl.onInputChange()"
                                                                                                                               data-ng-model-options="{ debounce: 50 }"
                                                                                                                               data-ng-disabled="ctrl.isDisabled"
                                                                                                                               data-ng-focus="ctrl.onFocus()"
                                                                                                                               autocomplete="off"
                                                                                                                               class="ctui-text-input blg-input ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                               aria-invalid="false">
                                                                                                                        <!---->
                                                                                                                        <button type="button"
                                                                                                                                class="btn gtm-text-input__variable-btn"
                                                                                                                                data-ng-if="ctrl.buttonCallback &amp;&amp; ctrl.iconClass"
                                                                                                                                data-ng-click="ctrl.onButtonClick($event)"
                                                                                                                                data-ng-disabled="ctrl.isDisabled">
                                                                                                                            <i data-ng-class="ctrl.iconClass"
                                                                                                                               class="gtm-add-variable-icon"></i>
                                                                                                                        </button>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                </ctui-text-input>
                                                                                                                <!---->
                                                                                                                <div class="show-read-only blg-value">
                                                                                                                    <!----> </div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-gtm-form-error-label=""
                                                                                                                 class="blg-error"
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.functionName"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-text>
                                                                                                    <vt-text
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[1].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'transportUrl'"
                                                                                                        data-param="params[1]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.transportUrl"
                                                                                                        class="ua--transportUrl ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.getNotSetText() || ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             class="blg-form-input hide-if-default"
                                                                                                             diff-field="tag.data.vendorTemplate.param.transportUrl">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                class="blg-caption"
                                                                                                                for="9-tag.data.vendorTemplate.param.transportUrl"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.transportUrl">
                                                                                                                URL
                                                                                                                отправки
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                                                                        class="gtm-popover-icon"></gtm-popover></span>
                                                                                                                <!---->
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.displayMode == ViewMode.SIMPLE"
                                                                                                                 class="vt-text-input-wrapper">
                                                                                                                <ctui-text-input
                                                                                                                    class="hide-read-only blg-value ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    placeholder="Источник наследования: переменная настроек"
                                                                                                                    data-ng-model="ctrl.paramValue.string"
                                                                                                                    data-ng-change="ctrl.paramDepsManager.paramInstancesChanged(ctrl.param.name)"
                                                                                                                    data-is-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-suggest-on-focus="ctrl.param.suggestOnFocus"
                                                                                                                    data-suggestions="ctrl.suggestedValues"
                                                                                                                    data-icon-class="gtm-add-variable-icon"
                                                                                                                    data-button-callback="ctrl.buttonCallback || null"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.transportUrl"
                                                                                                                    name="tag.data.vendorTemplate.param.transportUrl"
                                                                                                                    aria-invalid="false">
                                                                                                                    <div class="gtm-text-input-inner gtm-text-addon"
                                                                                                                         ng-class="ctrl.containerClass">
                                                                                                                        <input type="text"
                                                                                                                               placeholder="Источник наследования: переменная настроек"
                                                                                                                               data-ng-model="ctrl.value"
                                                                                                                               data-ng-change="ctrl.onInputChange()"
                                                                                                                               data-ng-model-options="{ debounce: 50 }"
                                                                                                                               data-ng-disabled="ctrl.isDisabled"
                                                                                                                               data-ng-focus="ctrl.onFocus()"
                                                                                                                               autocomplete="off"
                                                                                                                               class="ctui-text-input blg-input ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                               aria-invalid="false">
                                                                                                                        <!---->
                                                                                                                        <button type="button"
                                                                                                                                class="btn gtm-text-input__variable-btn"
                                                                                                                                data-ng-if="ctrl.buttonCallback &amp;&amp; ctrl.iconClass"
                                                                                                                                data-ng-click="ctrl.onButtonClick($event)"
                                                                                                                                data-ng-disabled="ctrl.isDisabled">
                                                                                                                            <i data-ng-class="ctrl.iconClass"
                                                                                                                               class="gtm-add-variable-icon"></i>
                                                                                                                        </button>
                                                                                                                        <!---->
                                                                                                                    </div>
                                                                                                                </ctui-text-input>
                                                                                                                <!---->
                                                                                                                <div class="show-read-only blg-value">
                                                                                                                    <!----> </div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div data-gtm-form-error-label=""
                                                                                                                 class="blg-error"
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.transportUrl"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-text>
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[2].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'useDebugVersion'"
                                                                                                        data-param="params[2]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.useDebugVersion"
                                                                                                        class="ua--useDebugVersion ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input hide-if-default"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.useDebugVersion">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.useDebugVersion"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.useDebugVersion">
                                                                                                                Использовать
                                                                                                                отладочную
                                                                                                                версию
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.useDebugVersion"
                                                                                                                    name="tag.data.vendorTemplate.param.useDebugVersion"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Источник наследования: переменная настроек"
                                                                                                                        value="undefined:undefined"
                                                                                                                        selected="selected">
                                                                                                                    Источник
                                                                                                                    наследования:
                                                                                                                    переменная
                                                                                                                    настроек
                                                                                                                </option>
                                                                                                                <option label="False"
                                                                                                                        value="string:s-1715">
                                                                                                                    False
                                                                                                                </option>
                                                                                                                <option label="True"
                                                                                                                        value="string:s-1714">
                                                                                                                    True
                                                                                                                </option>
                                                                                                                <option label="{{1111 Настройки Google Аналитики}}"
                                                                                                                        value="string:s-1716">
                                                                                                                    {{1111
                                                                                                                    Настройки
                                                                                                                    Google
                                                                                                                    Аналитики}}
                                                                                                                </option>
                                                                                                                <option label="{{Event}}"
                                                                                                                        value="string:s-1717">
                                                                                                                    {{Event}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Hostname}}"
                                                                                                                        value="string:s-1718">
                                                                                                                    {{Page
                                                                                                                    Hostname}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Path}}"
                                                                                                                        value="string:s-1719">
                                                                                                                    {{Page
                                                                                                                    Path}}
                                                                                                                </option>
                                                                                                                <option label="{{Page URL}}"
                                                                                                                        value="string:s-1720">
                                                                                                                    {{Page
                                                                                                                    URL}}
                                                                                                                </option>
                                                                                                                <option label="{{Referrer}}"
                                                                                                                        value="string:s-1721">
                                                                                                                    {{Referrer}}
                                                                                                                </option>
                                                                                                                <option disabled=""
                                                                                                                        label="---------"
                                                                                                                        value="string:s-1722">
                                                                                                                    ---------
                                                                                                                </option>
                                                                                                                <option label="Новая переменная…"
                                                                                                                        value="string:s-1723">
                                                                                                                    Новая
                                                                                                                    переменная…
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Источник
                                                                                                                наследования:
                                                                                                                переменная
                                                                                                                настроек
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.useDebugVersion"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[3].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'enableLinkId'"
                                                                                                        data-param="params[3]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.enableLinkId"
                                                                                                        class="ua--enableLinkId ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input hide-if-default"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.enableLinkId">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.enableLinkId"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.enableLinkId">
                                                                                                                Включение
                                                                                                                улучшенной
                                                                                                                атрибуции
                                                                                                                ссылок
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.enableLinkId"
                                                                                                                    name="tag.data.vendorTemplate.param.enableLinkId"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Источник наследования: переменная настроек"
                                                                                                                        value="undefined:undefined"
                                                                                                                        selected="selected">
                                                                                                                    Источник
                                                                                                                    наследования:
                                                                                                                    переменная
                                                                                                                    настроек
                                                                                                                </option>
                                                                                                                <option label="False"
                                                                                                                        value="string:s-1725">
                                                                                                                    False
                                                                                                                </option>
                                                                                                                <option label="True"
                                                                                                                        value="string:s-1724">
                                                                                                                    True
                                                                                                                </option>
                                                                                                                <option label="{{1111 Настройки Google Аналитики}}"
                                                                                                                        value="string:s-1726">
                                                                                                                    {{1111
                                                                                                                    Настройки
                                                                                                                    Google
                                                                                                                    Аналитики}}
                                                                                                                </option>
                                                                                                                <option label="{{Event}}"
                                                                                                                        value="string:s-1727">
                                                                                                                    {{Event}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Hostname}}"
                                                                                                                        value="string:s-1728">
                                                                                                                    {{Page
                                                                                                                    Hostname}}
                                                                                                                </option>
                                                                                                                <option label="{{Page Path}}"
                                                                                                                        value="string:s-1729">
                                                                                                                    {{Page
                                                                                                                    Path}}
                                                                                                                </option>
                                                                                                                <option label="{{Page URL}}"
                                                                                                                        value="string:s-1730">
                                                                                                                    {{Page
                                                                                                                    URL}}
                                                                                                                </option>
                                                                                                                <option label="{{Referrer}}"
                                                                                                                        value="string:s-1731">
                                                                                                                    {{Referrer}}
                                                                                                                </option>
                                                                                                                <option disabled=""
                                                                                                                        label="---------"
                                                                                                                        value="string:s-1732">
                                                                                                                    ---------
                                                                                                                </option>
                                                                                                                <option label="Новая переменная…"
                                                                                                                        value="string:s-1733">
                                                                                                                    Новая
                                                                                                                    переменная…
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Источник
                                                                                                                наследования:
                                                                                                                переменная
                                                                                                                настроек
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.enableLinkId"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[4].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'setTrackerName'"
                                                                                                        data-param="params[4]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.setTrackerName"
                                                                                                        class="ua--setTrackerName ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input hide-if-default"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.setTrackerName">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.setTrackerName"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.setTrackerName">
                                                                                                                Задать
                                                                                                                имя
                                                                                                                трекера
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                                                                        class="gtm-popover-icon"></gtm-popover></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.setTrackerName"
                                                                                                                    name="tag.data.vendorTemplate.param.setTrackerName"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Источник наследования: переменная настроек"
                                                                                                                        value="undefined:undefined"
                                                                                                                        selected="selected">
                                                                                                                    Источник
                                                                                                                    наследования:
                                                                                                                    переменная
                                                                                                                    настроек
                                                                                                                </option>
                                                                                                                <option label="False"
                                                                                                                        value="string:s-1735">
                                                                                                                    False
                                                                                                                </option>
                                                                                                                <option label="True"
                                                                                                                        value="string:s-1734">
                                                                                                                    True
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Источник
                                                                                                                наследования:
                                                                                                                переменная
                                                                                                                настроек
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.setTrackerName"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate">
                                                                                                                    <vt-text
                                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[0].name)"
                                                                                                                        data-helper="helper"
                                                                                                                        data-param-name="'trackerName'"
                                                                                                                        data-param="params[0]"
                                                                                                                        data-instance="helper.instance"
                                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.trackerName"
                                                                                                                        class="ua--trackerName ng-hide"
                                                                                                                        aria-hidden="true">
                                                                                                                        <div data-hide-if-default="ctrl.getNotSetText() || ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                                             data-param-template="ctrl.param"
                                                                                                                             class="blg-form-input hide-if-default"
                                                                                                                             diff-field="tag.data.vendorTemplate.param.trackerName">
                                                                                                                            <!---->
                                                                                                                            <!----><label
                                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                                class="blg-caption"
                                                                                                                                for="9-tag.data.vendorTemplate.param.trackerName"
                                                                                                                                id="9-label-tag.data.vendorTemplate.param.trackerName">
                                                                                                                                Имя
                                                                                                                                трекера
                                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"></span>
                                                                                                                                <!---->
                                                                                                                            </label>
                                                                                                                            <!---->
                                                                                                                            <!---->
                                                                                                                            <!---->
                                                                                                                            <div data-ng-if="ctrl.displayMode == ViewMode.SIMPLE"
                                                                                                                                 class="vt-text-input-wrapper">
                                                                                                                                <ctui-text-input
                                                                                                                                    class="hide-read-only blg-value ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                                    placeholder=""
                                                                                                                                    data-ng-model="ctrl.paramValue.string"
                                                                                                                                    data-ng-change="ctrl.paramDepsManager.paramInstancesChanged(ctrl.param.name)"
                                                                                                                                    data-is-disabled="ctrl.helper.isDisabled"
                                                                                                                                    data-suggest-on-focus="ctrl.param.suggestOnFocus"
                                                                                                                                    data-suggestions="ctrl.suggestedValues"
                                                                                                                                    data-icon-class="gtm-add-variable-icon"
                                                                                                                                    data-button-callback="ctrl.buttonCallback || null"
                                                                                                                                    data-gtm-form-error-field=""
                                                                                                                                    id="9-tag.data.vendorTemplate.param.trackerName"
                                                                                                                                    name="tag.data.vendorTemplate.param.trackerName"
                                                                                                                                    aria-invalid="false">
                                                                                                                                    <div class="gtm-text-input-inner gtm-text-addon"
                                                                                                                                         ng-class="ctrl.containerClass">
                                                                                                                                        <input type="text"
                                                                                                                                               placeholder=""
                                                                                                                                               data-ng-model="ctrl.value"
                                                                                                                                               data-ng-change="ctrl.onInputChange()"
                                                                                                                                               data-ng-model-options="{ debounce: 50 }"
                                                                                                                                               data-ng-disabled="ctrl.isDisabled"
                                                                                                                                               data-ng-focus="ctrl.onFocus()"
                                                                                                                                               autocomplete="off"
                                                                                                                                               class="ctui-text-input blg-input ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                                               aria-invalid="false">
                                                                                                                                        <!---->
                                                                                                                                        <button type="button"
                                                                                                                                                class="btn gtm-text-input__variable-btn"
                                                                                                                                                data-ng-if="ctrl.buttonCallback &amp;&amp; ctrl.iconClass"
                                                                                                                                                data-ng-click="ctrl.onButtonClick($event)"
                                                                                                                                                data-ng-disabled="ctrl.isDisabled">
                                                                                                                                            <i data-ng-class="ctrl.iconClass"
                                                                                                                                               class="gtm-add-variable-icon"></i>
                                                                                                                                        </button>
                                                                                                                                        <!---->
                                                                                                                                    </div>
                                                                                                                                </ctui-text-input>
                                                                                                                                <!---->
                                                                                                                                <div class="show-read-only blg-value">
                                                                                                                                    <!----> </div>
                                                                                                                            </div>
                                                                                                                            <!---->
                                                                                                                            <!---->
                                                                                                                            <!---->
                                                                                                                            <div data-gtm-form-error-label=""
                                                                                                                                 class="blg-error"
                                                                                                                                 data-field-name="tag.data.vendorTemplate.param.trackerName"
                                                                                                                                 style="display: none;">
                                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                                     class="gtm-error-message"></div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </vt-text>
                                                                                                                </vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                    <vt-select
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[5].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'useInternalVersion'"
                                                                                                        data-param="params[5]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.useInternalVersion"
                                                                                                        class="ua--useInternalVersion ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div class="blg-form-input hide-if-default"
                                                                                                             data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             diff-field="tag.data.vendorTemplate.param.useInternalVersion">
                                                                                                            <!---->
                                                                                                            <!----><label
                                                                                                                class="blg-caption"
                                                                                                                data-ng-if="ctrl.helper.getText(ctrl.param.displayName)"
                                                                                                                for="9-tag.data.vendorTemplate.param.useInternalVersion"
                                                                                                                id="9-label-tag.data.vendorTemplate.param.useInternalVersion">
                                                                                                                Использовать
                                                                                                                внутреннюю
                                                                                                                версию
                                                                                                                <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                                                                        class="gtm-popover-icon"></gtm-popover></span>
                                                                                                            </label>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <select class="hide-read-only blg-select ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    data-ng-model="ctrl.selectedId"
                                                                                                                    data-ng-change="ctrl.onChange()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-ng-options="i.id as i.displayValue disable when i.type === ctrl.SuggestionType.SPACER for i in ctrl.selectItems"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    id="9-tag.data.vendorTemplate.param.useInternalVersion"
                                                                                                                    name="tag.data.vendorTemplate.param.useInternalVersion"
                                                                                                                    aria-invalid="false">
                                                                                                                <option label="Источник наследования: переменная настроек"
                                                                                                                        value="undefined:undefined"
                                                                                                                        selected="selected">
                                                                                                                    Источник
                                                                                                                    наследования:
                                                                                                                    переменная
                                                                                                                    настроек
                                                                                                                </option>
                                                                                                                <option label="False"
                                                                                                                        value="string:s-1737">
                                                                                                                    False
                                                                                                                </option>
                                                                                                                <option label="True"
                                                                                                                        value="string:s-1736">
                                                                                                                    True
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="show-read-only blg-value">
                                                                                                                Источник
                                                                                                                наследования:
                                                                                                                переменная
                                                                                                                настроек
                                                                                                                <!---->
                                                                                                                <!----> </div>
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <!---->
                                                                                                            <div class="blg-error"
                                                                                                                 data-gtm-form-error-label=""
                                                                                                                 data-field-name="tag.data.vendorTemplate.param.useInternalVersion"
                                                                                                                 style="display: none;">
                                                                                                                <div ng-bind-html="errorMessage"
                                                                                                                     class="gtm-error-message"></div>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                            <div data-ng-if="ctrl.param.subParam"
                                                                                                                 class="vt-sub-params">
                                                                                                                <vt-params
                                                                                                                    data-helper="ctrl.helper"
                                                                                                                    data-params="ctrl.param.subParam"
                                                                                                                    data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                            </div>
                                                                                                            <!---->
                                                                                                        </div>
                                                                                                    </vt-select>
                                                                                                    <vt-checkbox
                                                                                                        data-ng-show="helper.paramDepsManager.isParamEnabled(params[6].name)"
                                                                                                        data-helper="helper"
                                                                                                        data-param-name="'enableRecaptcha'"
                                                                                                        data-param="params[6]"
                                                                                                        data-instance="helper.instance"
                                                                                                        data-param-deps-manager="helper.paramDepsManager"
                                                                                                        data-instance-field-name="tag.data.vendorTemplate"
                                                                                                        data-field-path-name="tag.data.vendorTemplate.param.enableRecaptcha"
                                                                                                        class="ua--enableRecaptcha ng-hide"
                                                                                                        aria-hidden="true">
                                                                                                        <div data-hide-if-default="ctrl.instance.paramMap[ctrl.param.name].value"
                                                                                                             data-param-template="ctrl.param"
                                                                                                             data-instance-param-map="ctrl.instance.paramMap"
                                                                                                             diff-field="tag.data.vendorTemplate.param.enableRecaptcha"
                                                                                                             class="hide-if-default">
                                                                                                            <!---->
                                                                                                            <div class="blg-checkbox">
                                                                                                                <i data-ng-class="ctrl.instance.paramMap[ctrl.param.name].value.boolean ? 'icon-check' : 'icon-not-interested'"
                                                                                                                   class="show-read-only icon icon--small icon-not-interested"></i>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <gtm-checkbox
                                                                                                                    data-ng-if="::!ctrl.displayStyles['CHECKBOX_IS_SWITCH']"
                                                                                                                    data-ng-model="ctrl.instance.paramMap[ctrl.param.name].value.boolean"
                                                                                                                    data-ng-change="ctrl.paramDepsManager.paramInstancesChanged()"
                                                                                                                    data-ng-disabled="ctrl.helper.isDisabled"
                                                                                                                    data-gtm-form-error-field=""
                                                                                                                    class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                                                                                                    id="9-tag.data.vendorTemplate.param.enableRecaptcha"
                                                                                                                    aria-labelledby="9-label-tag.data.vendorTemplate.param.enableRecaptcha"
                                                                                                                    name="tag.data.vendorTemplate.param.enableRecaptcha"
                                                                                                                    aria-checked="false"
                                                                                                                    role="checkbox"
                                                                                                                    tabindex="0"
                                                                                                                    aria-disabled="false"
                                                                                                                    aria-invalid="false">
                                                                                                                    <div class="material-container">
                                                                                                                        <div class="material-icon"></div>
                                                                                                                    </div>
                                                                                                                </gtm-checkbox>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <!----><label
                                                                                                                    data-ng-if="ctrl.param.checkboxText"
                                                                                                                    for="9-tag.data.vendorTemplate.param.enableRecaptcha"
                                                                                                                    id="9-label-tag.data.vendorTemplate.param.enableRecaptcha">
                                                                                                                    Enable
                                                                                                                    reCAPTCHA
                                                                                                                    <span data-vt-tooltip="ctrl.helper.getText(ctrl.param.help)"><gtm-popover
                                                                                                                            class="gtm-popover-icon"></gtm-popover></span>
                                                                                                                </label>
                                                                                                                <!---->
                                                                                                                <!---->
                                                                                                                <div class="blg-error"
                                                                                                                     data-gtm-form-error-label=""
                                                                                                                     data-field-name="ctrl.fieldPathName"
                                                                                                                     style="display: none;">
                                                                                                                    <div ng-bind-html="errorMessage"
                                                                                                                         class="gtm-error-message"></div>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                                <div data-ng-if="ctrl.param.subParam"
                                                                                                                     class="vt-sub-params">
                                                                                                                    <vt-params
                                                                                                                        data-helper="ctrl.helper"
                                                                                                                        data-params="ctrl.param.subParam"
                                                                                                                        data-instance-field-name="tag.data.vendorTemplate"></vt-params>
                                                                                                                </div>
                                                                                                                <!---->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </vt-checkbox>
                                                                                                </vt-params><!---->
                                                                                            </div>
                                                                                        </div>
                                                                                    </gtm-zippy>
                                                                                </div><!----> <!----> </div>
                                                                        </vt-group>
                                                                    </vt-params><!----> </div>
                                                            </div>
                                                        </gtm-zippy>
                                                    </div><!----> <!----> </div>
                                            </vt-group>
                                        </vt-params><!----> </div><!----> </div>
                            </vt-group>






                        </vt-params>
                    </vt-instance>
                </div>
                <!---->
                <!---->
                <gtm-zippy data-ng-if="ctrl.hasAdvancedConfiguration()" data-zippy-title="Расширенные настройки"
                           data-is-zippy-open="ctrl.advancedSettingsZippyOpen"
                           class="gtm-zippy--advanced-settings wd-adv-config-zippy">
                    <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}" class="gtm-zippy-collapsed"><label
                            class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                            data-ng-click="toggleOpenState()" data-ng-class="{'hide-read-only': isZippyEmpty()}"
                            role="button"> <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                            <!----> <!---->
                            <ng-container data-ng-if="::(!richTitleText)">Расширенные настройки</ng-container>
                            <!----> <!----> <!----> </label>
                        <div class="gtm-zippy-content" data-ng-transclude="" style=""> <!---->
                            <div data-ng-if="::ctrl.supportsTagFiringPriority()"
                                 class="blg-form-input hide-if-default"
                                 data-hide-if-default="ctrl.tag.data.priority" diff-field="tag.data.priority">
                                <label> Приоритет активации тегов
                                    <gtm-popover class="gtm-popover-icon"></gtm-popover>
                                </label> <input type="text"
                                                class="hide-read-only ng-pristine ng-untouched ng-valid ng-valid-integer ng-empty"
                                                data-ng-model="ctrl.tag.data.priority" data-gtm-integer-value=""
                                                data-gtm-form-error-field="" id="9-tag.data.priority"
                                                name="tag.data.priority" aria-invalid="false">
                                <div class="show-read-only blg-value"></div>
                                <div data-gtm-form-error-label="" data-field-name="tag.data.priority"
                                     class="blg-error" style="display: none;">
                                    <div ng-bind-html="errorMessage" class="gtm-error-message"></div>
                                </div>
                            </div><!----> <!---->
                            <div data-ng-if="::ctrl.supportsTagScheduling()"
                                 data-hide-if-default="ctrl.tagHasSchedule" class="hide-if-default">
                                <div class="blg-checkbox" diff-field="!tag-schedule"><i
                                        class="show-read-only gtm-check-icon-small"></i>
                                    <gtm-checkbox class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                                  data-ng-model="ctrl.tagHasSchedule" id="9-ctrl.tagHasSchedule"
                                                  aria-labelledby="9-label-ctrl.tagHasSchedule"
                                                  name="ctrl.tagHasSchedule" aria-checked="false" role="checkbox"
                                                  tabindex="0" aria-invalid="false">
                                        <div class="material-container">
                                            <div class="material-icon"></div>
                                        </div>
                                    </gtm-checkbox>
                                    <label for="9-ctrl.tagHasSchedule" id="9-label-ctrl.tagHasSchedule"> Включить
                                        специальное расписание активации тега </label> <!----> </div>
                                <div class="blg-spacer2 hide-in-diff"></div>
                            </div><!----> <!---->
                            <div data-ng-if="::ctrl.supportsLiveOnly()"
                                 class="blg-checkbox blg-spacer2 hide-if-default"
                                 data-hide-if-default="ctrl.tag.data.liveOnly" diff-field="tag.data.liveOnly"><i
                                    class="show-read-only gtm-check-icon-small"></i>
                                <gtm-checkbox class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                              data-ng-model="ctrl.tag.data.liveOnly" data-gtm-form-error-field=""
                                              id="9-tag.data.liveOnly" aria-labelledby="9-label-tag.data.liveOnly"
                                              name="tag.data.liveOnly" aria-checked="false" role="checkbox"
                                              tabindex="0" aria-invalid="false">
                                    <div class="material-container">
                                        <div class="material-icon"></div>
                                    </div>
                                </gtm-checkbox>
                                <label for="9-tag.data.liveOnly" id="9-label-tag.data.liveOnly"> Активировать этот
                                    тег только в опубликованных контейнерах. </label>
                                <gtm-popover class="gtm-popover-icon"></gtm-popover>
                                <div data-gtm-form-error-label="" data-field-name="tag.data.liveOnly"
                                     class="blg-error" style="display: none;">
                                    <div ng-bind-html="errorMessage" class="gtm-error-message"></div>
                                </div>
                            </div><!----> <!---->
                            <div data-ng-if="::ctrl.supportsTagFiringOptions()"
                                 class="blg-form-input hide-if-default"
                                 data-hide-if-default="ctrl.hasNonDefaultTagFiringOption"
                                 diff-field="tag.data.tagFiringOption"><label for="9-tag.data.tagFiringOption"
                                                                              id="9-label-tag.data.tagFiringOption">
                                    Настройки активации тега </label> <select
                                    class="hide-read-only ng-pristine ng-untouched ng-valid ng-not-empty"
                                    data-ng-model="ctrl.tag.data.tagFiringOption"
                                    data-ng-options="option.key as option.displayName for option in ctrl.tagFiringOptions"
                                    data-ng-change="ctrl.updateHasNonDefaultTagFiringOption()"
                                    id="9-tag.data.tagFiringOption" name="tag.data.tagFiringOption"
                                    aria-invalid="false">
                                    <option label="Без ограничений" value="number:0">Без ограничений</option>
                                    <option label="Один раз на событие" value="number:1" selected="selected">Один
                                        раз на событие
                                    </option>
                                    <option label="Один раз на страницу" value="number:2">Один раз на страницу
                                    </option>
                                </select>
                                <div class="show-read-only blg-value"> Один раз на событие</div>
                            </div><!----> <!---->
                            <gtm-zippy data-ng-if="::ctrl.supportsTagSequencing()"
                                       data-zippy-title="Порядок активации тегов" data-zippy-tooltip-id="6238868"
                                       data-zippy-tooltip-text="Настроив порядок активации тегов, вы можете указать, какие теги должны срабатывать непосредственно до текущего тега и сразу после него."
                                       data-is-zippy-open="ctrl.tagSetupAndTeardownZippyOpen">
                                <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                     class="gtm-zippy-collapsed"><label
                                        class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                        data-ng-click="toggleOpenState()"
                                        data-ng-class="{'hide-read-only': isZippyEmpty()}" role="button"> <span
                                            class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span> <!---->
                                        <!---->
                                        <ng-container data-ng-if="::(!richTitleText)">Порядок активации тегов
                                        </ng-container><!----> <!---->
                                        <gtm-popover data-ng-if="::zippyTooltipText"
                                                     class="gtm-popover-icon"></gtm-popover><!----> <!----> </label>
                                    <div class="gtm-zippy-content" data-ng-transclude="" style="">
                                        <div id="9-tag.data.setupTeardownTag" name="tag.data.setupTeardownTag">
                                            <div class="blg-checkbox blg-checkbox--setup-teardown hide-if-default"
                                                 data-hide-if-default="ctrl.tagHasSetup"
                                                 diff-field="tag.data.setupTag.0">
                                                <gtm-checkbox
                                                    class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                                    data-ng-model="ctrl.tagHasSetup" id="9-ctrl.tagHasSetup"
                                                    aria-labelledby="9-label-ctrl.tagHasSetup"
                                                    name="ctrl.tagHasSetup" aria-checked="false" role="checkbox"
                                                    tabindex="0" aria-invalid="false">
                                                    <div class="material-container">
                                                        <div class="material-icon"></div>
                                                    </div>
                                                </gtm-checkbox>
                                                <label class="hide-read-only blg-spacer1"
                                                       data-ng-bind-html="ctrl.getEnableFireSetupTagMessage(ctrl.tag.data.name)"
                                                       for="9-ctrl.tagHasSetup" id="9-label-ctrl.tagHasSetup">Активировать
                                                    тег перед тегом <b>1111 Тег без названия</b></label>
                                                <div class="blg-form-input ng-hide" data-ng-show="ctrl.tagHasSetup"
                                                     aria-hidden="true"><label> Тег setup </label>
                                                    <div class="blg-value show-read-only"></div>
                                                    <div class="hide-read-only gtm-tag-select gtm-form-input"
                                                         ng-click="ctrl.selectSetupTag()" role="button"> Выберите
                                                        тег
                                                    </div>
                                                    <div class="blg-spacer1 hide-read-only"></div>
                                                    <div data-ng-show="ctrl.setupTag"
                                                         class="hide-read-only blg-checkbox ng-hide"
                                                         aria-hidden="true">
                                                        <gtm-checkbox data-ng-model="ctrl.continuePayloadOnSuccess"
                                                                      id="9-ctrl.continuePayloadOnSuccess"
                                                                      aria-labelledby="9-label-ctrl.continuePayloadOnSuccess"
                                                                      name="ctrl.continuePayloadOnSuccess"
                                                                      class="ng-pristine ng-untouched ng-valid ng-empty"
                                                                      aria-checked="false" role="checkbox"
                                                                      tabindex="0" aria-invalid="false">
                                                            <div class="material-container">
                                                                <div class="material-icon"></div>
                                                            </div>
                                                        </gtm-checkbox>
                                                        <label data-ng-bind-html="ctrl.getContinueNextOnPreviousSuccessMessage( ctrl.setupTag, ctrl.tag.data.name)"
                                                               for="9-ctrl.continuePayloadOnSuccess"
                                                               id="9-label-ctrl.continuePayloadOnSuccess">Не
                                                            активировать тег <b>1111 Тег без названия</b>, если тег
                                                            <b>Undefined parameter - previousTag</b> не сработал или
                                                            приостановлен</label>
                                                        <div class="blg-spacer2"></div>
                                                    </div>
                                                    <div data-gtm-form-error-label=""
                                                         data-field-name="tag.data.setupTag" class="blg-error"
                                                         style="display: none;">
                                                        <div ng-bind-html="errorMessage"
                                                             class="gtm-error-message"></div>
                                                    </div>
                                                    <div data-gtm-form-error-label=""
                                                         data-field-name="tag.data.setupTag.0" class="blg-error"
                                                         style="display: none;">
                                                        <div ng-bind-html="errorMessage"
                                                             class="gtm-error-message"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blg-checkbox blg-checkbox--setup-teardown hide-if-default"
                                                 data-hide-if-default="ctrl.tagHasTeardown"
                                                 diff-field="tag.data.teardownTag.0">
                                                <gtm-checkbox
                                                    class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                                    data-ng-model="ctrl.tagHasTeardown"
                                                    id="9-ctrl.tagHasTeardown"
                                                    aria-labelledby="9-label-ctrl.tagHasTeardown"
                                                    name="ctrl.tagHasTeardown" aria-checked="false"
                                                    role="checkbox" tabindex="0" aria-invalid="false">
                                                    <div class="material-container">
                                                        <div class="material-icon"></div>
                                                    </div>
                                                </gtm-checkbox>
                                                <label class="hide-read-only blg-spacer1"
                                                       data-ng-bind-html="ctrl.getEnableFireTeardownTagMessage(ctrl.tag.data.name)"
                                                       for="9-ctrl.tagHasTeardown" id="9-label-ctrl.tagHasTeardown">Активировать
                                                    тег после тега <b>1111 Тег без названия</b></label>
                                                <div class="blg-form-input--nopadding ng-hide"
                                                     data-ng-show="ctrl.tagHasTeardown" aria-hidden="true"><label>
                                                        Тег cleanup </label>
                                                    <div class="blg-value show-read-only"></div>
                                                    <div class="hide-read-only gtm-tag-select gtm-form-input"
                                                         ng-click="ctrl.selectTeardownTag()" role="button"> Выберите
                                                        тег
                                                    </div>
                                                    <div class="blg-spacer1 hide-read-only"></div>
                                                    <div data-ng-show="ctrl.teardownTag"
                                                         class="hide-read-only blg-checkbox ng-hide"
                                                         aria-hidden="true">
                                                        <gtm-checkbox data-ng-model="ctrl.continueTeardownOnSuccess"
                                                                      id="9-ctrl.continueTeardownOnSuccess"
                                                                      aria-labelledby="9-label-ctrl.continueTeardownOnSuccess"
                                                                      name="ctrl.continueTeardownOnSuccess"
                                                                      class="ng-pristine ng-untouched ng-valid ng-empty"
                                                                      aria-checked="false" role="checkbox"
                                                                      tabindex="0" aria-invalid="false">
                                                            <div class="material-container">
                                                                <div class="material-icon"></div>
                                                            </div>
                                                        </gtm-checkbox>
                                                        <label data-ng-bind-html="ctrl.getContinueNextOnPreviousSuccessMessage( ctrl.tag.data.name, ctrl.teardownTag)"
                                                               for="9-ctrl.continueTeardownOnSuccess"
                                                               id="9-label-ctrl.continueTeardownOnSuccess">Не
                                                            активировать тег <b>Undefined parameter - nextTag</b>,
                                                            если тег <b>1111 Тег без названия</b> не сработал или
                                                            приостановлен</label>
                                                        <div class="blg-spacer2"></div>
                                                    </div>
                                                    <div data-gtm-form-error-label=""
                                                         data-field-name="tag.data.teardownTag" class="blg-error"
                                                         style="display: none;">
                                                        <div ng-bind-html="errorMessage"
                                                             class="gtm-error-message"></div>
                                                    </div>
                                                    <div data-gtm-form-error-label=""
                                                         data-field-name="tag.data.teardownTag.0" class="blg-error"
                                                         style="display: none;">
                                                        <div ng-bind-html="errorMessage"
                                                             class="gtm-error-message"></div>
                                                    </div>
                                                </div>
                                                <div class="blg-spacer1 show-read-only hide-in-diff"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </gtm-zippy><!----> <!---->
                            <div data-ng-if="::ctrl.supportsTagMetadata()" diff-field="tag.data.monitoringMetadata">
                                <gtm-zippy data-zippy-title="Дополнительные метаданные тега"
                                           data-zippy-tooltip-text="Укажите дополнительные метаданные тега, которые будут включены в данные события при активации тега."
                                           data-is-zippy-open="ctrl.isTagMetadataTableZippyOpen">
                                    <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                         class="gtm-zippy-collapsed"><label
                                            class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                            data-ng-click="toggleOpenState()"
                                            data-ng-class="{'hide-read-only': isZippyEmpty()}" role="button">
                                            <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                            <!----> <!---->
                                            <ng-container data-ng-if="::(!richTitleText)">Дополнительные метаданные
                                                тега
                                            </ng-container><!----> <!---->
                                            <gtm-popover data-ng-if="::zippyTooltipText"
                                                         class="gtm-popover-icon"></gtm-popover><!----> <!---->
                                        </label>
                                        <div class="gtm-zippy-content" data-ng-transclude="" style="">
                                            <gtm-tag-metadata-table data-tag-data="ctrl.tag.data">
                                                <div class="blg-checkbox blg-checkbox--include-tag-name hide-if-default"
                                                     data-hide-if-default="ctrl.includeName"><i
                                                        class="show-read-only gtm-not-interested-icon-small"
                                                        data-ng-class="ctrl.includeName ? 'gtm-check-icon-small' : 'gtm-not-interested-icon-small'"> </i>
                                                    <gtm-checkbox
                                                        class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                                                        data-ng-change="ctrl.includeNameChanged()"
                                                        data-ng-model="ctrl.includeName"
                                                        id="9-tag.data.monitoringMetadataIncludeTagName"
                                                        aria-labelledby="9-label-tag.data.monitoringMetadataIncludeTagName"
                                                        name="tag.data.monitoringMetadataIncludeTagName"
                                                        aria-checked="false" role="checkbox" tabindex="0"
                                                        aria-invalid="false">
                                                        <div class="material-container">
                                                            <div class="material-icon"></div>
                                                        </div>
                                                    </gtm-checkbox>
                                                    <label for="9-tag.data.monitoringMetadataIncludeTagName"
                                                           id="9-label-tag.data.monitoringMetadataIncludeTagName">
                                                        Добавить название тега </label></div> <!---->
                                                <div class="blg-spacer2 show-in-diff hide-if-default"
                                                     data-hide-if-default="ctrl.includeName"
                                                     diff-field="!tag.data.monitoringMetadataIncludeTagName.spacer"></div>
                                                <div data-hide-if-default="ctrl.tagData.monitoringMetadata"
                                                     class="hide-if-default">
                                                    <div class="gtm-vendor-template-simple-table-md"
                                                         diff-field="tag.data.monitoringMetadata.map">
                                                        <div class="simple-table-row"
                                                             diff-field="!tag.data.monitoringMetadata.map.header">
                                                            <div class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                Ключ
                                                            </div>
                                                            <div class="simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--cols3">
                                                                Значение
                                                            </div>
                                                            <div class="hide-read-only simple-table-row__cell simple-table-row__cell--header simple-table-row__cell--remove-icon-cell"></div>
                                                        </div> <!----> </div>
                                                    <div class="blg-spacer1 hide-read-only"></div>
                                                    <button class="btn hide-read-only wd-add-row-button"
                                                            type="button" data-ng-click="ctrl.addRow()"> Добавить
                                                        метаданные
                                                    </button>
                                                    <div class="blg-spacer2"
                                                         diff-field="!tag.data.monitoringMetadata.table.spacer"></div>
                                                </div>
                                            </gtm-tag-metadata-table>
                                        </div>
                                    </div>
                                </gtm-zippy>
                            </div><!----> <!---->
                            <div data-ng-if="::ctrl.supportsConsentUi()">
                                <gtm-zippy
                                    data-zippy-rich-title="Настойки, связанные с согласием <sup class='sup--beta' >(BETA)</sup>"
                                    data-zippy-rich-tooltip-text="ctrl.MSG_CONSENT_ZIPPY_TOOLTIP"
                                    data-is-zippy-open="ctrl.isTagConsentZippyOpen" class="wd-consent-zippy">
                                    <div data-ng-class="{'gtm-zippy-collapsed': !isZippyOpen}"
                                         class="gtm-zippy-collapsed"><label
                                            class="gtm-zippy-title blg-body blg-comfortable hide-read-only"
                                            data-ng-click="toggleOpenState()"
                                            data-ng-class="{'hide-read-only': isZippyEmpty()}" role="button">
                                            <span class="gtm-zippy-icon icon icon-keyboard-arrow-down"></span>
                                            <!---->
                                            <ng-container data-ng-if="::richTitleText"
                                                          data-ng-bind-html="::richTitleText">Настойки, связанные с
                                                согласием <sup class="sup--beta">(BETA)</sup></ng-container><!---->
                                            <!----> <!----> <!---->
                                            <gtm-popover data-ng-if="::richTooltipText"
                                                         class="gtm-popover-icon"></gtm-popover><!----> </label>
                                        <div class="gtm-zippy-content" data-ng-transclude="" style="">
                                            <gtm-tag-consent-form data-tag-data="ctrl.tag.data"
                                                                  data-public-id="ctrl.selectedTagType.key.publicId"
                                                                  data-set-form-dirty="ctrl.boundSetFormDirty">
                                                <div diff-field="tag.data.consentSettings"> <!----> <!---->
                                                    <div data-ng-if="!ctrl.tagData.consentSettings.alwaysFire &amp;&amp; ctrl.nativeConsents.length"
                                                         data-hide-if-default="!ctrl.getHasDefaultConsentStatus()"
                                                         class="hide-if-default">
                                                        <div class="blg-caption"> Проверки встроенного согласия
                                                            <gtm-popover class="gtm-popover-icon"></gtm-popover>
                                                        </div>
                                                        <div class="chip-list inline"> <!----><span
                                                                data-ng-repeat="consent in ctrl.nativeConsents"
                                                                class="chip inline"> ad_storage </span>
                                                            <!----><span
                                                                data-ng-repeat="consent in ctrl.nativeConsents"
                                                                class="chip inline"> analytics_storage </span>
                                                            <!----> </div>
                                                        <div class="blg-spacer2"></div>
                                                    </div><!----> <!---->
                                                    <div data-hide-if-default="!ctrl.getHasDefaultConsentStatus()"
                                                         data-ng-if="!ctrl.tagData.consentSettings.alwaysFire"
                                                         class="hide-if-default"><label class="blg-caption">
                                                            Проверки дополнительного согласия </label>
                                                        <div class="blg-radio-group wd-consent-radios">
                                                            <md-radio-group
                                                                data-ng-model="ctrl.tagData.consentSettings.manualConsentStatus"
                                                                class="ng-pristine ng-untouched ng-valid _md md-gtm-theme ng-not-empty"
                                                                role="radiogroup" tabindex="0"
                                                                aria-invalid="false"
                                                                aria-activedescendant="radio_20"> <!---->
                                                                <div data-ng-repeat="option in ctrl.consentStatusOptions">
                                                                    <div class="vt-radio-with-tooltip hide-read-only md-checked">
                                                                        <md-radio-button data-ng-value="option.key"
                                                                                         class="md-gtm-theme md-checked"
                                                                                         id="radio_20" role="radio"
                                                                                         aria-checked="true"
                                                                                         value="0"
                                                                                         aria-label="Не настроено">
                                                                            <div class="md-container md-ink-ripple"
                                                                                 md-ink-ripple=""
                                                                                 md-ink-ripple-checkbox="">
                                                                                <div class="md-off"></div>
                                                                                <div class="md-on"></div>
                                                                            </div>
                                                                            <div ng-transclude="" class="md-label">
                                                                                Не настроено
                                                                            </div>
                                                                        </md-radio-button> <!----> </div> <!---->
                                                                    <div class="blg-value show-read-only"
                                                                         data-ng-if="option.key === ctrl.tagData.consentSettings.manualConsentStatus">
                                                                        Не настроено
                                                                    </div><!----> </div><!---->
                                                                <div data-ng-repeat="option in ctrl.consentStatusOptions">
                                                                    <div class="vt-radio-with-tooltip hide-read-only">
                                                                        <md-radio-button data-ng-value="option.key"
                                                                                         class="md-gtm-theme"
                                                                                         id="radio_21" role="radio"
                                                                                         aria-checked="false"
                                                                                         value="1"
                                                                                         aria-label="Дополнительное согласие не требуется">
                                                                            <div class="md-container md-ink-ripple"
                                                                                 md-ink-ripple=""
                                                                                 md-ink-ripple-checkbox="">
                                                                                <div class="md-off"></div>
                                                                                <div class="md-on"></div>
                                                                            </div>
                                                                            <div ng-transclude="" class="md-label">
                                                                                Дополнительное согласие не требуется
                                                                            </div>
                                                                        </md-radio-button> <!---->
                                                                        <gtm-popover data-ng-if="option.tooltip"
                                                                                     class="gtm-popover-icon"></gtm-popover>
                                                                        <!----> </div> <!----> </div><!---->
                                                                <div data-ng-repeat="option in ctrl.consentStatusOptions">
                                                                    <div class="vt-radio-with-tooltip hide-read-only">
                                                                        <md-radio-button data-ng-value="option.key"
                                                                                         class="md-gtm-theme"
                                                                                         id="radio_22" role="radio"
                                                                                         aria-checked="false"
                                                                                         value="2"
                                                                                         aria-label="Для активации тега требуется дополнительное согласие">
                                                                            <div class="md-container md-ink-ripple"
                                                                                 md-ink-ripple=""
                                                                                 md-ink-ripple-checkbox="">
                                                                                <div class="md-off"></div>
                                                                                <div class="md-on"></div>
                                                                            </div>
                                                                            <div ng-transclude="" class="md-label">
                                                                                Для активации тега требуется
                                                                                дополнительное согласие
                                                                            </div>
                                                                        </md-radio-button> <!---->
                                                                        <gtm-popover data-ng-if="option.tooltip"
                                                                                     class="gtm-popover-icon"></gtm-popover>
                                                                        <!----> </div> <!----> </div><!---->
                                                            </md-radio-group>
                                                        </div> <!---->
                                                        <div class="blg-spacer2 hide-read-only"></div>
                                                    </div><!----> </div>
                                            </gtm-tag-consent-form>
                                        </div>
                                    </div>
                                </gtm-zippy>
                            </div><!----> </div>
                    </div>
                </gtm-zippy>
                <!---->
            </section-content>
        </div>
    </div>
    <div class="gtm-veditor-section-overlay"></div>
</div>



