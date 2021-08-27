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
    $self = $displayData;

    //    echo'<pre>';print_r( $self );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
    $self->defaultText = false ;

?>
<gtm-select class="vis--outputMethod"  aria-hidden="false">
    <!---->
    <label class="blg-caption" for="id-<?= $self->name ?>">
        <?= $self->label ?>
        <?= $self->tooltip ?>
    </label>
    <!---->
    <div class="blg-form-input" >
        <!---->

        <!---->
        <select class="hide-read-only blg-select ng-pristine ng-valid ng-not-empty ng-touched"
                id="id-<?= $self->name ?>"
                name="<?= $self->name ?>"
                onchange="vmccm.FormElements.changeSelect(this);"
                aria-invalid="false">
            <!---->
            <?php
                if( !empty( $self->emptyOption ) )
                {
                    ?>
                    <option label="" value=""><?= $self->emptyOption->text ?></option>
                    <?php
                }#END IF

                foreach ($self->options as $option)
                {
                    $selected = null ;
                    if( $self->defaultValue === $option->value )
                    {
                        $self->defaultText = $option->label ;
                        $selected = ' selected="selected" ';
                    }#END IF
                    ?>
                    <option label="<?= $option->label ?>" value="<?= $option->value ?>" <?= $selected ?> >
                        <?= $option->text ?>
                    </option>
                    <?php
            }#END FOREACH
            ?>
            <!---->

        </select>
        <!---->
        <!---->
        <div class="show-read-only read-only-label blg-value"><?= !$self->defaultText?:$self->defaultText ?></div>

        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
        <?= $self->errorMessage?>
        <!---->
        <div data-ng-if="ctrl.param.subParam" class="vt-sub-params">
            <vt-params data-helper="ctrl.helper" data-params="ctrl.param.subParam"
                       data-instance-field-name="variable.data.vendorTemplate"></vt-params>
        </div><!----> </div>
</gtm-select>

