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
     * @date       01.06.2021 02:32
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    defined('_JEXEC') or die; // No direct access to this file

    /* @var $displayData array */
    /* @var $self object */


    $doc = Factory::getDocument();
    extract($displayData);

    /**
     * @var $alias string - алиас элемента управления
     * @var $blgCaption string - заголовок перед элементом управления
     */
    
    echo'<pre>';print_r( $displayData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
    
?>
<div diff-field="!trigger-type-options">
    <div ng-show="ctrl.selectedEventType" aria-hidden="false"
         class=""> <!---->
        <div diff-field="ctrl.trigger.data.filter">
            <div class="blg-caption"> Условия активации
                триггера
            </div>
            <div class="hide-read-only">
                <gtm-predicate
                        data-ng-model="ctrl.trigger.data.filter"
                        data-variables="ctrl.allowEventVariablesInPredicates() ? undefined : ctrl.nonEventVariables"
                        data-custom-label="ctrl.getPredicateCustomLabelMsg()"
                        data-all-events-name="ctrl.getSelectedEventDisplayNameAllEvents()"
                        data-some-events-name="ctrl.getSelectedEventDisplayNameSomeEvents()"
                        data-display-radio-buttons=""
                        data-required-if="ctrl.allowEventVariablesInPredicates() &amp;&amp; ctrl.isMobileContainer"
                        id="25-trigger.data.filter"
                        name="trigger.data.filter"
                        class="ng-pristine ng-untouched ng-valid ng-valid-css-selector ng-valid-predicate ng-valid-regex ng-not-empty"
                        aria-invalid="false"><!----> <!---->
                    <div data-ng-if="ctrl.state.displayRadioButtons"
                         class="blg-radio-row">
                        <md-radio-group
                                ng-model="ctrl.state.selectedDisplayMode"
                                data-ng-change="ctrl.filterOptionChanged()"
                                class="ng-pristine ng-untouched ng-valid _md md-gtm-theme ng-not-empty"
                                role="radiogroup" tabindex="0"
                                aria-activedescendant="radio_46"
                                aria-invalid="false">
                            <md-radio-button value="NONE"
                                             class="md-gtm-theme"
                                             id="radio_45"
                                             role="radio"
                                             aria-checked="false">
                                <div class="md-container md-ink-ripple"
                                     md-ink-ripple=""
                                     md-ink-ripple-checkbox="">
                                    <div class="md-off"></div>
                                    <div class="md-on"></div>
                                </div>
                                <div ng-transclude="" class="md-label"> Все
                                    просмотры страниц
                                </div>
                            </md-radio-button>
                            <md-radio-button value="SOME"
                                             class="md-gtm-theme md-checked"
                                             id="radio_46"
                                             role="radio"
                                             aria-checked="true">
                                <div class="md-container md-ink-ripple"
                                     md-ink-ripple=""
                                     md-ink-ripple-checkbox="">
                                    <div class="md-off"></div>
                                    <div class="md-on"></div>
                                </div>
                                <div ng-transclude="" class="md-label">
                                    Некоторые просмотры страниц
                                </div>
                            </md-radio-button>
                        </md-radio-group>
                        <div class="blg-spacer1"></div>
                    </div>
                    <!---->
                    <!---->
                    <!---->
                    <!---->
                    <div>
                        <!----><!---->
                        <label
                                data-ng-if="ctrl.customLabel"
                                class="blg-caption"
                                for="25-predicate"
                                id="25-label-predicate">
                            Активировать триггер при наступлении
                            события и выполнении всех этих
                            условий </label><!----><!---->
                        <!---->
                        <div data-ng-repeat="predicate in ctrl.state.value track by $index"
                             class="gtmPredicateItem gtm-predicate-flex vertical-space-small-bottom">
                            <gtm-variable-select
                                    data-ng-model="predicate.arg[0]"
                                    variables="ctrl.variables"
                                    data-variable-filter="ctrl.variableFilter"
                                    data-on-change="ctrl.updateModelValue()"
                                    class="flexible ng-pristine ng-untouched ng-valid ng-not-empty"
                                    aria-invalid="false">
                                <div class="gtmVariableSelect">
                                    <select data-ng-change="ctrl.onChangeWrapper()"
                                            data-ng-model="ctrl.selectedVariable"
                                            data-ng-options="v.macroReference for v in ctrl.variableReferenceList track by v.macroReference"
                                            class="flexible"
                                            aria-invalid="false">
                                        <option label="Константа слежения Google Analitic"
                                                value="Константа слежения Google Analitic">
                                            Константа слежения
                                            Google Analitic
                                        </option>
                                        <option label="Настройки Google Analytics"
                                                value="Настройки Google Analytics">
                                            Настройки Google
                                            Analytics
                                        </option>
                                        <option label="Переменная JavaScript - view_cart_donne"
                                                value="Переменная JavaScript - view_cart_donne"
                                                selected="selected">
                                            Переменная
                                            JavaScript -
                                            view_cart_donne
                                        </option>
                                        <option label="Page URL"
                                                value="Page URL">
                                            Page URL
                                        </option>
                                        <option label="──────────────"
                                                value="──────────────"
                                                class="divider"
                                                disabled="disabled">
                                            ──────────────
                                        </option>
                                        <option label="Выбрать встроенную переменную…"
                                                value="Выбрать встроенную переменную…">
                                            Выбрать встроенную
                                            переменную…
                                        </option>
                                        <option label="Новая переменная..."
                                                value="Новая переменная...">
                                            Новая переменная...
                                        </option>
                                    </select></div>
                            </gtm-variable-select>
                            <select data-ng-model="predicate.operator"
                                    data-ng-options="c.key as c.displayName for c in ctrl.operators | filter:ctrl.operatorFilter"
                                    data-gtm-form-error-field=""
                                    data-ng-change="ctrl.updateModelValue()"
                                    class="gtmPredicateOperator flexible ng-pristine ng-untouched ng-valid ng-not-empty"
                                    aria-invalid="false">
                                <option label="равно"
                                        value="string:EQUALS"
                                        selected="selected">
                                    равно
                                </option>
                                <option label="содержит"
                                        value="string:CONTAINS">
                                    содержит
                                </option>
                                <option label="начинается с"
                                        value="string:STARTS_WITH">
                                    начинается с
                                </option>
                                <option label="заканчивается на"
                                        value="string:ENDS_WITH">
                                    заканчивается на
                                </option>
                                <option label="соответствует селектору CSS"
                                        value="string:CSS_SELECTOR">
                                    соответствует селектору CSS
                                </option>
                                <option label="соответствует регулярному выражению"
                                        value="string:REGEX">
                                    соответствует регулярному
                                    выражению
                                </option>
                                <option label="соответствует регулярному выражению (без учета регистра)"
                                        value="string:REGEX_IGNORE_CASE">
                                    соответствует регулярному
                                    выражению (без учета
                                    регистра)
                                </option>
                                <option label="не равно"
                                        value="string:NOT_EQUALS">
                                    не равно
                                </option>
                                <option label="не содержит"
                                        value="string:NOT_CONTAINS">
                                    не содержит
                                </option>
                                <option label="не начинается с"
                                        value="string:NOT_STARTS_WITH">
                                    не начинается с
                                </option>
                                <option label="не заканчивается на"
                                        value="string:NOT_ENDS_WITH">
                                    не заканчивается на
                                </option>
                                <option label="не соответствует селектору CSS"
                                        value="string:NOT_CSS_SELECTOR">
                                    не соответствует селектору
                                    CSS
                                </option>
                                <option label="не соответствует регулярному выражению"
                                        value="string:NOT_REGEX">
                                    не соответствует регулярному
                                    выражению
                                </option>
                                <option label="не соответствует регулярному выражению (без учета регистра)"
                                        value="string:NOT_REGEX_IGNORE_CASE">
                                    не соответствует регулярному
                                    выражению (без учета
                                    регистра)
                                </option>
                                <option label="меньше"
                                        value="string:LESS_THAN">
                                    меньше
                                </option>
                                <option label="меньше или равно"
                                        value="string:LESS_EQUALS">
                                    меньше или равно
                                </option>
                                <option label="больше"
                                        value="string:GREATER_THAN">
                                    больше
                                </option>
                                <option label="больше или равно"
                                        value="string:GREATER_EQUALS">
                                    больше или равно
                                </option>
                            </select> <input type="text"
                                             data-ng-model="predicate.arg[1].string"
                                             data-ng-change="ctrl.updateModelValue()"
                                             class="gtmPredicateExpression flexible ng-pristine ng-untouched ng-valid ng-not-empty"
                                             aria-invalid="false">
                            <div class="gtm-predicate-buttons">
                                <!---->
                                <button class="btn compact predicate removeButton"
                                        type="button"
                                        data-ng-if="ctrl.isRemoveButtonVisible()"
                                        data-ng-click="ctrl.removeCondition($index)">
                                    -
                                </button><!----> <!---->
                                <button class="btn compact predicate addButton"
                                        type="button"
                                        data-ng-if="$last"
                                        data-ng-click="ctrl.addCondition()">
                                    +
                                </button><!----> </div>
                        </div><!----> </div><!---->
                </gtm-predicate>
                <div data-gtm-form-error-label=""
                     data-field-name="trigger.data.filter"
                     style="display: none;">
                    <div ng-bind-html="errorMessage"
                         class="gtm-error-message"></div>
                </div>
            </div>
            <div class="show-read-only">
                <gtm-predicate-summary
                        data-all-events-name="ctrl.isMobileContainer ? '' : ctrl.getSelectedEventDisplayNameAllEvents()"
                        data-display-radio-buttons=""
                        data-value="ctrl.trigger.data.filter"
                        data-expanded="true">
                    <div>
                        <!---->
                        <!---->
                        <div data-ng-if="predicates.length">
                            <!---->
                            <div data-ng-repeat="predicate in predicates| limitTo:expandedLimit track by $index"
                                 diff-field="trigger.data.filter.0"
                                 class="gtm-predicate-summary-row blg-body blg-spacer1"
                                 title="Переменная JavaScript - view_cart_donne равно cart_donne">
                                <span class="chip inline">Переменная JavaScript - view_cart_donne</span>
                                <span class="">равно</span>
                                <span class="">cart_donne</span>
                            </div><!----> <!----> </div><!---->
                    </div>
                </gtm-predicate-summary>
            </div>
        </div>
    </div> <!---->
    <div class="blg-spacer1"
         data-ng-if="ctrl.selectedEventType"></div><!---->
</div>

