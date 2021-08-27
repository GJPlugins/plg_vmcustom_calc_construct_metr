<?php
    /**
     * @package     Joomla.Site
     * @subpackage  Layout
     *
     * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
     * @license     GNU General Public License version 2 or later; see LICENSE.txt
     */

    defined('_JEXEC') or die;

    extract($displayData);

    /**
     * Layout variables
     * ---------------------
     *    $options         : (array)  Optional parameters
     *    $label           : (string) The html code for the label (not required if $options['hiddenLabel'] is true)
     *    $input           : (string) The input field html code
     */




    $class = empty($options['class']) ? '' : ' ' . $options['class'];
    $rel = empty($options['rel']) ? '' : ' ' . $options['rel'];
?>





<div class="control-group<?php echo $class; ?>"<?php echo $rel; ?>>
    <?php
        /*if( empty($options['hiddenLabel']) ) : */?><!--
            <div class="control-label">
                <?/*= $label; */?>
            </div>
        --><?php
/*        endif;*/
    ?>
    <gtm-checkbox class=" ng-pristine ng-untouched ng-valid hide-if-default">
    <!--<div class="controls gtm-checkbox">-->
<!---->
            <i class="show-read-only icon icon--small icon-not-interested"></i>
            <label for="id-param[defaultOn]">
                <?php echo $input; ?>
<!--                <input style="display: none" id="id-param[defaultOn]" type="checkbox" name="param[defaultOn]" value="1" data-default-value="false" onchange="vmccm.FormElements.changeCheckbox(this);">-->
                <span class="material-container hide-read-only">
            <span class="material-icon"></span>
        </span>
                <span>По умолчанию отмечено</span>
                <span class="gtm-tooltip">
    <gtm-popover class="gtm-popover-icon"></gtm-popover>
    <span class="gtm-popover tooltiptext">
        <span ng-bind-html="trustedText">
            Отмечен при загрузки товара        </span>
    </span>
</span>

            </label>
            <div class="blg-error" data-gtm-form-error-label="" data-field-name="ctrl.fieldPathName" style="display: none;">
                <div data-bind-html="errorMessage" class="gtm-error-message"></div>
            </div>
    </div>

<!--</div>-->
</gtm-checkbox>






















