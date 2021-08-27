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
     * @date       08.06.2021 01:45
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
?>
<header class="gtm-container-page-header">
    <div class="gtm-page-header-status-messages gms-container-status-header">
        <gtm-container-public-id container="ctrl.container"><a href=""
                                                               class="gtm-container-public-id md-gtm-theme"
                                                               data-ng-click="ctrl.showContainerSnippet()">
                GTM-TQ2M477 </a></gtm-container-public-id>
        <span class="gtm-draft-change-count"> <span class="gtm-draft-change-count__title"
                                                    title="Изменений в рабочей области:"> Изменений в раб. обл.: </span> <span
                class="gtm-draft-change-count__value"
                data-ng-class="{'unpublished-changes-label-view-only': hasContainerViewOnlyPermission}"> 3 </span> </span>
        <div class="gtm-container-page-header__toolbar">
            <gtm-draft-toolbar><!---->
                <div data-ng-if="ctrl.hasDraftEditPermission"
                     data-ng-class="{'gtm-hidden': !ctrl.isReady}"> <!---->
                    <button type="button" class="btn gtm-preview-button"
                            data-ng-click="ctrl.preview()" data-ng-if="!ctrl.isMobileContainer">
                        Предварительный просмотр
                    </button><!----> <!---->
                    <button type="button" class="btn btn-action wd-submit-workspace-button"
                            data-ng-click="ctrl.submit()"
                            data-ng-if="ctrl.hasContainerEditPermission || (ctrl.isPremium &amp;&amp; !ctrl.task.key)">
                        Отправить
                    </button><!----> </div><!----> </gtm-draft-toolbar>
        </div>
    </div>
</header>


