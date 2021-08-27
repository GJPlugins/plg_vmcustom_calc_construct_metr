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
     * @date       08.06.2021 08:19
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/
    defined('_JEXEC') or die; // No direct access to this file
    if( !defined('DS') ) define('DS' , DIRECTORY_SEPARATOR);

    $displayData = $this->displayData ;
    extract($displayData);

?>
<!--  Примечания - Добавьте примечания для этого объекта -->
<gtm-entity-notes data-ng-class="{'hide-gtm-notes': !ctrl.isNotesShown}"
                  data-diff-field-name="trigger.data.userInstructions"
                  data-entity-data="ctrl.trigger.data" class="hide-gtm-notes">
    <!---->
    <gtm-veditor-section data-ng-if="ctrl.isEntityNotesEnabled" data-step-order="6"
                         data-section-name="notes-section">
        <div data-ng-form="ctrl.form"
             data-gtm-read-only="!ctrl.veditorCtrl.isActive(ctrl.state)"
             class="gtm-veditor-section ng-pristine ng-valid gtm-read-only veditor__section--read-only"
             data-ng-click="ctrl.onClick()" role="button">
            <div class="gtm-veditor-index-container">
                <div class="gtm-veditor-title"
                     diff-field="!section-title-notes-section"
                     data-ng-click="ctrl.veditorCtrl.closeStep(); $event.stopPropagation();"
                     data-ng-transclude="section-title" role="button">
                    <section-title> Примечания</section-title>
                </div>
                <div class="veditor__section__content"
                     data-ng-transclude="section-content">
                    <section-content>
                        <div class="blg-spacer2 hide-in-diff hide-read-only"></div>
                        <textarea
                            class="hide-read-only ng-pristine ng-untouched ng-valid ng-empty"
                            rows="10"
                            placeholder="Добавьте примечания для этого объекта"
                            data-allow-enter-on-text=""
                            data-ng-model="ctrl.entityData.userInstructions"
                            aria-invalid="false"> </textarea>
                        <div class="show-read-only gtm-notes-wrapper"
                             diff-field="trigger.data.userInstructions"> <!---->
                            <!---->
                            <div data-ng-if="!ctrl.entityData.userInstructions"
                                 class="blg-body"><span class="hide-in-diff"> Нажмите, чтобы добавить примечания </span>
                                <span class="gtm-notes__diff-message"> Нет примечаний для этого объекта. </span>
                            </div><!----> </div>
                        <div class="blg-spacer1 show-read-only hide-in-diff"></div>
                        <div class="blg-spacer2 hide-read-only"></div>
                    </section-content>
                </div>
            </div>
            <div class="gtm-veditor-section-overlay"></div>
        </div>
    </gtm-veditor-section><!----> </gtm-entity-notes>