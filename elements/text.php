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
     * @date       06.06.2021 15:18
     * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
     * @license    GNU General Public License version 2 or later;
     ******************************************************************************************************************/

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    defined('_JEXEC') or die; // No direct access to this file

    /* @var $displayData stdClass */
    /**
     * Элемент формы Checkbox
     */
    $self = $displayData ;
    
//    echo'<pre>';print_r( $self );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;


    // ng-empty | ng-not-empty


?>
<gtm-text class="blg-form-input <?= !$self->hideIfDefault?:'hide-if-default' ?> ng-empty"
          aria-hidden="false">
    <!---->
    <!---->
    <label for="id-<?= $self->name ?>"
           class="blg-caption"  >
        <?= $self->label ?>
        <?= $self->tooltip ?>
    </label>
    <!---->
    <!---->
    <!---->
    <div class="vt-text-input-wrapper">

        <div class="hide-read-only blg-value ng-pristine ng-untouched ng-valid ng-empty gtm-text-input-inner gtm-text-addon "
             aria-invalid="false" >
            <input type="text"
                   id="id-<?= $self->name ?>"
                   class="ctui-text-input blg-input ng-pristine ng-valid  ng-touched"
                   name="<?= $self->name ?>"
                   value="<?= ( isset($self->value) || !$self->value )?$self->defaultValue:$self->value ?>"
                   placeholder=""
                   autocomplete="off"
                   onkeyup="vmccm.FormElements.onkeyupInput(this);"
                <?= !$self->hideIfDefault?:'data-default-value="'.$self->defaultValue.'"' ?>
                <?= !$self->filter?:'data-filter="'.$self->filter.'"' ?>
                <?= !$self->filterErrorMessage?:'data-filterErrorMessage="'.$self->filterErrorMessage.'"' ?>
                   aria-invalid="false">
            <!---->
            <?= !$self->button?:$self->button  ?>
            <!---->
            <!---->
        </div>
        <div class="show-read-only read-only-label blg-value"></div>
    </div><!----> <!----> <!---->
    <?= $self->errorMessage?>

</gtm-text>

