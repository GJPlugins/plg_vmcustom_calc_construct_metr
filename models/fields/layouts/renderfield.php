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

    if( !empty($options['showonEnabled']) )
    {

        JHtml::_('script' , 'jui/cms.js' , array('version' => 'auto' , 'relative' => true));
    }

    $class = empty($options['class']) ? '' : ' ' . $options['class'];
    $rel = empty($options['rel']) ? '' : ' ' . $options['rel'];
?>
<div class="control-group<?php echo $class; ?>"<?php echo $rel; ?>>
    <?php
        if( empty($options['hiddenLabel']) ) : ?>
            <div class="control-label">
                <?= $label; ?>
            </div>
        <?php
        endif;
    ?>
    <div class="controls">

        <div class="vt-text-input-wrapper">
            <div class="blg-value ng-pristine ng-untouched ng-valid ng-empty gtm-text-input-inner gtm-text-addon "
                 aria-invalid="false">

                <?php echo $input; ?>

            </div>
        </div>


    </div>
</div>























