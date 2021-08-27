/*******************************************************************************************************************
 *     ╔═══╗ ╔══╗ ╔═══╗ ╔════╗ ╔═══╗ ╔══╗        ╔══╗  ╔═══╗ ╔╗╔╗ ╔═══╗ ╔╗   ╔══╗ ╔═══╗ ╔╗  ╔╗ ╔═══╗ ╔╗ ╔╗ ╔════╗
 *     ║╔══╝ ║╔╗║ ║╔═╗║ ╚═╗╔═╝ ║╔══╝ ║╔═╝        ║╔╗╚╗ ║╔══╝ ║║║║ ║╔══╝ ║║   ║╔╗║ ║╔═╗║ ║║  ║║ ║╔══╝ ║╚═╝║ ╚═╗╔═╝
 *     ║║╔═╗ ║╚╝║ ║╚═╝║   ║║   ║╚══╗ ║╚═╗        ║║╚╗║ ║╚══╗ ║║║║ ║╚══╗ ║║   ║║║║ ║╚═╝║ ║╚╗╔╝║ ║╚══╗ ║╔╗ ║   ║║
 *     ║║╚╗║ ║╔╗║ ║╔╗╔╝   ║║   ║╔══╝ ╚═╗║        ║║─║║ ║╔══╝ ║╚╝║ ║╔══╝ ║║   ║║║║ ║╔══╝ ║╔╗╔╗║ ║╔══╝ ║║╚╗║   ║║
 *     ║╚═╝║ ║║║║ ║║║║    ║║   ║╚══╗ ╔═╝║        ║╚═╝║ ║╚══╗ ╚╗╔╝ ║╚══╗ ║╚═╗ ║╚╝║ ║║    ║║╚╝║║ ║╚══╗ ║║ ║║   ║║
 *     ╚═══╝ ╚╝╚╝ ╚╝╚╝    ╚╝   ╚═══╝ ╚══╝        ╚═══╝ ╚═══╝  ╚╝  ╚═══╝ ╚══╝ ╚══╝ ╚╝    ╚╝  ╚╝ ╚═══╝ ╚╝ ╚╝   ╚╝
 *------------------------------------------------------------------------------------------------------------------
 * @author Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
 * @date 10.07.2021 09:01
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 ******************************************************************************************************************/
/* global jQuery , Joomla   */
window.plg_vmcustom_calc_construct_metrFrontCore = function () {
    var $ = jQuery;
    var self = this;
    // Домен сайта
    var host = Joomla.getOptions( 'GNZ11' ).Ajax.siteUrl;
    // Медиа версия
    var __v = '';

    this.__type = false;
    this.__plugin = false;
    this.__name = false;
    this._params = {
        __v : null ,    // version str
        _v  : null ,     // md5
    };
    // Параметры Ajax по умолчанию
    this.AjaxDefaultData = {
        template : null ,
        group    : null ,
        plugin   : null ,
        module   : null ,
        method   : null ,
        option   : 'com_ajax' ,
        format   : 'json' ,
        task     : null ,
    };
    // Default object parameters
    this.ParamsDefaultData = {
        // Медиа версия
        __v : '1.0.0' ,
        // Режим разработки
        development_on : false ,
    }

    /**
     * Start Init
     * @constructor
     */
    this.Init = function () {
        this._params = Joomla.getOptions( 'plg_vmcustom_calc_construct_metr' , this.ParamsDefaultData );
        __v = self._params.development_on ? '' : '?v=' + self._params.__v;
        // Параметры Ajax Default
        this.setAjaxDefaultData();
        // Добавить слушателей событий
        this.addEvtListener();

        console.log( this._params )
        console.log( this.AjaxDefaultData );
    }



    /**
     * Добавить слушателей событий
     */
    this.addEvtListener = function () {
        document.addEventListener('change' , function ( evt ){
            if ( typeof evt.target.dataset['vccmOptAction'] === 'undefined' ) return ;
            var form ;
            form = evt.target.closest('form');
            var opt = evt.target.dataset['vccmOptAction']
            console.log('plg_vmcustom_calc_construct_metr.front.core:->vccm-field >>> ' , evt.target );
            console.log('plg_vmcustom_calc_construct_metr.front.core:->vccm-field >>> ' , form );
            console.log('plg_vmcustom_calc_construct_metr.front.core:->vccm-field >>> ' , opt );

        })

        /**
         * ex.Tag : <div contenteditable data-evt-action="onKeydownActions__header__title"  >Заказать звонок</button>
         */
        document.addEventListener( 'keydown' , function ( evt ) {
            switch ( evt.target.dataset.evtAction )
            {
                case 'onKeydownActions__header__title' :
                    // self.Actions__header.title(evt);
                    // CollBack method

                    break;
                default :
                    return;
            }
        });
        /**
         * ex.Tag : <button data-evt-action="call-me-back" type="button" >Заказать звонок</button>
         */
        document.addEventListener( 'click' , function ( evt ) {
            switch ( evt.target.dataset.evtAction )
            {
                case 'call-me-back' :
                    // CollBack method
                    break;
                default :
                    return;
            }
        } , { passive : true } );


        var cart = jQuery('form.product');
        var virtuemart_product_id = cart.find('input[name="virtuemart_product_id[]"]').val();

        $('.vccm-field input:checkbox')
            .off('change', Virtuemart.eventsetproducttype)
            .on('change', {
                cart: cart,
                virtuemart_product_id: virtuemart_product_id
            }, Virtuemart.eventsetproducttype);


    };

    /**
     * Отправить запрос
     * @param Data - отправляемые данные
     * Должен содержать Data.task = 'taskName';
     * @returns {Promise}
     * @constructor
     */
    this.AjaxPost = function ( Data ) {
        var data = $.extend( true , this.AjaxDefaultData , Data );
        return new Promise( function ( resolve , reject ) {
            self.getModul( "Ajax" ).then( function ( Ajax ) {
                // Не обрабатывать сообщения
                Ajax.ReturnRespond = true;
                // Отправить запрос
                Ajax.send( data , self._params.__name ).then( function ( r ) {
                    resolve( r );
                } , function ( err ) {
                    console.error( err );
                    reject( err );
                } )
            } );
        } );
    };
    /**
     * Параметры Ajax Default
     */
    this.setAjaxDefaultData = function () {
        /**
         * Название модуля или плагина
         * @type {string}
         * @private
         */
        var __name = ''
        /**
         * Группа плагинов
         * @type {string}
         * @private
         */
        var __type = ''

        if ( typeof this._params.__name !== "undefined" )
        {
            __name = this._params.__name;
        }
        else if ( typeof this._params.plugin !== "undefined" )
        {
            __name = this._params.plugin;
        }

        if ( typeof this._params.__type !== "undefined" )
        {
            __type = this._params.__type;
        }
        else if ( typeof this._params.group !== "undefined" )
        {
            __type = this._params.group;
        }

        this.AjaxDefaultData.group = __type;
        this.AjaxDefaultData.plugin = __name;
        this.AjaxDefaultData.module = this._params.__module;
        this._params.__name = this._params.__name || this._params.__module;
    }
    this.Init();
};
/* global GNZ11 */
window.plg_vmcustom_calc_construct_metrFrontCore.prototype = new GNZ11();
new window.plg_vmcustom_calc_construct_metrFrontCore();

/*--------------------------------------------------------------------------------------------------------------------*/
/**
 * Прототип - Позволяет добавлять элементы из вновь созданных  элементов
 * https://stackoverflow.com/a/32135318/6665363
 * @param element
 */
Element.prototype.appendAfter = function ( element ) {
    element.parentNode.insertBefore( this , element.nextSibling );
};
Element.prototype.appendBefore = function ( element ) {
    element.parentNode.insertBefore( this , element );
};
