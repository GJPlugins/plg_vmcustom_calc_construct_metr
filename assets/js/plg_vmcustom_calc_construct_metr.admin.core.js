/*******************************************************************************************************************
 *     ╔═══╗ ╔══╗ ╔═══╗ ╔════╗ ╔═══╗ ╔══╗        ╔══╗  ╔═══╗ ╔╗╔╗ ╔═══╗ ╔╗   ╔══╗ ╔═══╗ ╔╗  ╔╗ ╔═══╗ ╔╗ ╔╗ ╔════╗
 *     ║╔══╝ ║╔╗║ ║╔═╗║ ╚═╗╔═╝ ║╔══╝ ║╔═╝        ║╔╗╚╗ ║╔══╝ ║║║║ ║╔══╝ ║║   ║╔╗║ ║╔═╗║ ║║  ║║ ║╔══╝ ║╚═╝║ ╚═╗╔═╝
 *     ║║╔═╗ ║╚╝║ ║╚═╝║   ║║   ║╚══╗ ║╚═╗        ║║╚╗║ ║╚══╗ ║║║║ ║╚══╗ ║║   ║║║║ ║╚═╝║ ║╚╗╔╝║ ║╚══╗ ║╔╗ ║   ║║
 *     ║║╚╗║ ║╔╗║ ║╔╗╔╝   ║║   ║╔══╝ ╚═╗║        ║║─║║ ║╔══╝ ║╚╝║ ║╔══╝ ║║   ║║║║ ║╔══╝ ║╔╗╔╗║ ║╔══╝ ║║╚╗║   ║║
 *     ║╚═╝║ ║║║║ ║║║║    ║║   ║╚══╗ ╔═╝║        ║╚═╝║ ║╚══╗ ╚╗╔╝ ║╚══╗ ║╚═╗ ║╚╝║ ║║    ║║╚╝║║ ║╚══╗ ║║ ║║   ║║
 *     ╚═══╝ ╚╝╚╝ ╚╝╚╝    ╚╝   ╚═══╝ ╚══╝        ╚═══╝ ╚═══╝  ╚╝  ╚═══╝ ╚══╝ ╚══╝ ╚╝    ╚╝  ╚╝ ╚═══╝ ╚╝ ╚╝   ╚╝
 *------------------------------------------------------------------------------------------------------------------
 * @author Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
 * @date 31.05.2021 18:37
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 ******************************************************************************************************************/
/* global jQuery , Joomla   */

window.plg_vmcustom_calc_construct_metrAdminCore = function () {
    var r = {
        data : {
            params :  {} ,
        }
    }
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
        virtuemart_product_id : null ,
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
        // Установить пустые шаблоны листа и overlay
        this.SheetController._setHolderSheetEmpty();

        // Делаем кнопку свойства в toolBar - активной
        document.getElementById('btn-properties-load').removeAttribute('disabled');

        console.log( this._params )
        console.log( this.AjaxDefaultData );
    }

    /**
     * Добавить слушателей событий
     */
    this.addEvtListener = function () {
        /* ------------- Key Events ----------------------------------------------------------------------------------*/
        /**
         * Ловим нажатие Enter - редактирование в названии листа
         * Ловим нажатие кнопок у инпута на листах у которых есть  - data-filter=""
         *
         * ex.Tag : <div contenteditable data-evt-action="onKeydownActions__header__title"  >Заказать звонок</button>
         */
        document.addEventListener( 'keydown' , function ( evt ) {


            if ( evt.target.closest( '.gtm-sheet' ) && evt.target.tagName === 'INPUT' && evt.target.dataset.filter !== "undefined" )
            {
                console.log( 'plg_vmcustom_calc_construct_metr.admin.core:->evt >>> ' , evt );
                if ( evt.code !== 'Backspace' && evt.code !== 'Tab' && evt.code !== 'Delete' && evt.code !== 'Enter' )
                {
                    self.FormElements.onkeydownInput( evt );
                }
            }


            switch ( evt.target.dataset.evtAction )
            {
                /**
                 * Ловим нажатие Enter - редактирование в названии листа
                 */
                case 'onKeydownActions__header__title' :
                    self.Actions__header.title_keydown( evt );
                    break;
                default :
                    return;
            }

        } );
        /**
         * следим за именем листа что бы не было пустым
         */
        document.addEventListener( 'keyup' , function ( evt ) {
            switch ( evt.target.dataset.evtAction )
            {
                /**
                 * следим за именем листа что бы не было пустым
                 */
                case 'onKeydownActions__header__title' :
                    self.Actions__header.title_keyup( evt );
                    break;
                default :
                    return;
            }
        } );
        /* --------- END Key Events ----------------------------------------------------------------------------------*/


        /* --------- Forms Events ----------------------------------------------------------------------------------*/
        /**
         * Ловим отправку формы с листа
         */
        document.addEventListener( 'submit' , function ( evt ) {
            if ( typeof evt.target.dataset.evtActionSubmit === 'undefined' )
            {
                return;
            }
            evt.preventDefault();
            self.FormController.submit( evt )
        } );

        /* --------- END Forms Events ----------------------------------------------------------------------------------*/


        /**
         * Ловим вызовы для загрузки шаблона "sheet" (листов)
         */
        document.addEventListener( 'click' , function ( evt ) {

            /**
             * Событие клик по checkbox но элементе списка
             */
            if ( evt.target.closest('gtm-table-row-checkbox') || evt.target.closest('gtm-table-header-checkbox') ){
                // Отметить - снять отметку с checkBox
                self.ListController.checkBoxToggle( evt )

            }



            if ( typeof evt.target.dataset.evtAction === 'undefined' )
            {
                return;
            }

            if ( !evt.target.dataset.evtAction.match( /loadTemplate.+/ ) )
            {
                return;
            }
            var templateName = evt.target.dataset.evtAction.replace( 'loadTemplate' , '' );

            self._getPropertiesList( templateName );

        } );

        /**
         * Обработчик кликов на элементах выбора типа объектов ( модификатор цены )
         * Добавляет объект по которому кликнули на предыдущий лист
         */
        document.addEventListener( 'click' , function ( evt ) {
            if ( typeof evt.target.dataset.evtActionClick === "undefined" )
            {
                var clickElement = evt.target.closest( '[data-evt-action-click]' )
                if ( !clickElement )
                {
                    return;
                }

                var actionClick = clickElement.getAttribute( "data-evt-action-click" );
                var actionClickType = clickElement.getAttribute( "data-evt-action-click-type" );
                var method = self[actionClick][actionClickType];
                /**
                 * Добавить на предыдущий лист тип объекта
                 * addToList.TypeProperty(div.gtm-picker__row)
                 */
                method( clickElement );
            }
        } , false );

        /* ---------- Section Events ----------------------- */
        /**
         * Переключить редактируемую секцию .gtm-veditor-section-active в режим чтения .gtm-read-only
         */
        document.addEventListener( 'click' , function ( evt ) {
            // Если лист не может содержать редактируемые секции
            if ( !evt.target.closest( '.veditor--edit' ) )
            {
                return;
            }
            self.SectionController.onSectionEditOff( evt.target )
        } );
        /**
         * Клик по section-overlay - Включаем редактирование секции (Конфигурация тега)
         */
        document.addEventListener( 'click' , function ( evt ) {
            // Если клик не по section-overlay
            if ( !evt.target.classList.contains( 'gtm-veditor-section-overlay' ) )
            {
                return;
            }
            self.SectionController.onSectionEditOn( evt.target )
        } , false );
        /* ---------- END Section Events ----------------------- */


        /**
         * ex.Tag : <button data-evt-action="call-me-back" type="button" >Заказать звонок</button>
         */
        document.addEventListener( 'click' , function ( evt ) {

            switch ( evt.target.dataset.evtTask )
            {
                case 'getVccmSheet' :
                    var view = evt.target.dataset.evtView
                    self.SheetController.loadSheet( view )

                    break;
                default :
                    switch ( evt.target.dataset.evtAction )
                    {


                        case 'getPropertiesList' :
                            // CollBack method
                            self._getPropertiesList();
                            break;

                        /**
                         * Закрыть лист
                         */
                        case 'closeSheet' :
                            // CollBack method
                            self.SheetController._closeSheet( evt );
                            break;
                        default :
                            return;
                    }
            }
        } , { passive : true } );

    };


    /**
     * Контроллер списков в таблицах
     * @type {{}}
     * Отметить - снять отметку с checkBox
     * self.ListController.Toggle( evt )
     */
    this.ListController = {
        /**
         * Отметить - снять отметку с checkBox
         * @param evt
         */
        checkBoxToggle : function ( evt ){
            var propId = evt.target.dataset.propId
            if ( propId ){
                evt.target.classList.toggle("gtm-check-box-icon")
                evt.target.classList.toggle("gtm-check-box-outline-blank-icon")
                this._checkBoxTableHeader_Checked( evt )
            }else{
                var Select = false;
                Select = evt.target.classList.contains('gtm-check-box-outline-blank-icon');
                var table = evt.target.closest('table');
                var checkBoxRows = table.querySelectorAll('gtm-table-row-checkbox i');
                for ( let i = 0; i < checkBoxRows.length; i++ )
                {
                    if ( Select ) {
                        checkBoxRows[i].classList.remove('gtm-check-box-outline-blank-icon')
                        checkBoxRows[i].classList.add('gtm-check-box-icon')
                    }else{
                        checkBoxRows[i].classList.add('gtm-check-box-outline-blank-icon')
                        checkBoxRows[i].classList.remove('gtm-check-box-icon')
                    }
                }
                this._checkBoxTableHeader_Checked( evt )
            }
       },

        playCheckedLine : function ( Btn ){
            var parenElement = Btn.closest('.gtm-table-component')
            this._publishProp(parenElement);
        },
        pauseCheckedLine : function ( Btn ){
            var parenElement = Btn.closest('.gtm-table-component')
            this._publishProp(parenElement , true );
        },
        _publishProp : function ( parenElement , unPublic ){
            if ( typeof unPublic === "undefined" ) unPublic = false ;
            var dataProduct_property_config_id = [];
            // Отмеченные checkBox в строчках
            var checkBox = parenElement.querySelectorAll('gtm-table-row-checkbox i.gtm-check-box-icon');
            for ( let i = 0; i < checkBox.length; i++ )
            {
                dataProduct_property_config_id.push( checkBox[i].dataset.propId );
            }
            var Data = {
                view: 'product_property',
                task : !unPublic ? 'publishProperty' : 'unPublishProperty' ,
                ids :  dataProduct_property_config_id ,
            }
            self.AjaxPost(Data).then(function ( r ){
                if ( r.messages   ){
                    self.Message.alert(r.messages.message[0])
                }
                if ( r.success ){
                    for ( let i = 0; i < checkBox.length; i++ )
                    {
                        if ( !unPublic ){
                            checkBox[i].closest('tr').classList.remove('gtm-table-row--paused');
                        }else{
                            checkBox[i].closest('tr').classList.add('gtm-table-row--paused');
                        }

                        checkBox[i].classList.remove('gtm-check-box-icon');
                        checkBox[i].classList.add('gtm-check-box-outline-blank-icon');

                    }

                }
                // Скрыть элементы управления для выделенных строк
                self.ListController._cardActionsOffCheck();
                // Снять выделение с общего checkBox
                var checkBoxTableHeader = parenElement.querySelector('gtm-table-header-checkbox i');
                checkBoxTableHeader.classList.remove('gtm-indeterminate-check-box-icon');
                checkBoxTableHeader.classList.remove('gtm-check-box-icon');
                checkBoxTableHeader.classList.add('gtm-check-box-outline-blank-icon');
            })
        },
        /**
         * Удаление отмеченного свойства
         * @param Btn
         */
        removeCheckedLine : function (Btn){
            var dataProduct_property_config_id = [];
            var parenElement = Btn.closest('.gtm-table-component')
            // Отмеченные checkBox в строчках
            var checkBox = parenElement.querySelectorAll('gtm-table-row-checkbox i.gtm-check-box-icon');

            for ( let i = 0; i < checkBox.length; i++ )
            {
                dataProduct_property_config_id.push( checkBox[i].dataset.propId );
            }

            var Data = {
                view: 'product_property',
                task : 'deleteProperty',
                ids :  dataProduct_property_config_id ,
            }
            self.AjaxPost(Data).then(function ( r ){
                if ( r.messages   ){
                    self.Message.alert(r.messages.message[0])
                }
                if ( r.data ){
                    for ( let i = 0; i < checkBox.length; i++ )
                    {
                        checkBox[i].closest('tr.wd-tag-row').remove();
                    }

                }
                self.ListController._cardActionsOffCheck();
                var checkBoxTableHeader = parenElement.querySelector('gtm-table-header-checkbox i');
                checkBoxTableHeader.classList.remove('gtm-indeterminate-check-box-icon');
                checkBoxTableHeader.classList.remove('gtm-check-box-icon');
                checkBoxTableHeader.classList.add('gtm-check-box-outline-blank-icon');
            })
        },

        /**
         * Установить отметку на checkBoxTableHeader
         * @param evt
         * @private
         */
       _checkBoxTableHeader_Checked : function ( evt ){
            var table = evt.target.closest('table');
            var checkBoxTableHeader = table.querySelector('gtm-table-header-checkbox i');
            var checkBoxRows = table.querySelectorAll('gtm-table-row-checkbox i');

            var checkedCount = 0 ;
            for ( let i = 0; i < checkBoxRows.length; i++ )
            {
                if ( checkBoxRows[i].classList.contains('gtm-check-box-icon') ){
                    checkedCount++;
                }
            }
           checkBoxTableHeader.classList.remove('gtm-check-box-outline-blank-icon');
           checkBoxTableHeader.classList.remove('gtm-indeterminate-check-box-icon');
           checkBoxTableHeader.classList.remove('gtm-check-box-icon');

           // Если нет отмеченных строк
           if ( !checkedCount ) {
               checkBoxTableHeader.classList.add('gtm-check-box-outline-blank-icon');
               this._cardActionsOffCheck();
               return ;
           }
            // Если выбрано частично
            if ( checkedCount < checkBoxRows.length  ){
                checkBoxTableHeader.classList.add('gtm-indeterminate-check-box-icon')
                this._cardActionsOnCheck()
            }
            // сли выбраны все
            else if( checkedCount === checkBoxRows.length ){
                checkBoxTableHeader.classList.add('gtm-check-box-icon');
                this._cardActionsOnCheck()
            }


           console.log('plg_vmcustom_calc_construct_metr.admin.core:_checkBoxTableHeader_Checked->checkBoxRows >>> ' , checkedCount );
           console.log('plg_vmcustom_calc_construct_metr.admin.core:_checkBoxTableHeader_Checked->checkBoxRows >>> ' , checkBoxTableHeader );
        },
        /**
         * показать кнопки управления выделенными строками
         * @private
         */
        _cardActionsOnCheck : function ( ){
            document.querySelector('.card-actions').classList.add('on-check')
        },
        /**
         * скрыть кнопки управления выделенными строками
         * @private
         */
        _cardActionsOffCheck : function ( ){
            document.querySelector('.card-actions').classList.remove('on-check')
        },
    }

    /**
     * Добавление на листы элементов
     * @type {{TypeProperty: Window.addToList.TypeProperty, addToPrevSheet: Window.addToList.addToPrevSheet}}
     */
    this.addToList = {
        /**
         * Добавить в предыдущий лист
         * @param type - тип значения Группа свойств | Свойство | Тип свойства (TypeProperty)
         * @param Obj
         */
        addToPrevSheet : function ( type , Obj ){
            // Найти все листы на
            var allGtmSheet = document.querySelectorAll('.gtm-sheet');
            // Предыдущий лист от текущего
            var prevSheet = allGtmSheet[ allGtmSheet.length - 3 ];
            var arrSection = prevSheet.querySelectorAll('.sheet-content > gtm-veditor-section')
            // Последняя секция на листе
            var lastSection = arrSection[ arrSection.length - 1 ]
            // Создать элемент -  блок секции
            var parent = document.createElement("gtm-veditor-section");
            parent.innerHTML = Obj ;
            // Установить секцию на лист
            parent.appendAfter(lastSection);
            // Провести валидацию листа
            self.ValidatorController.Sheet(prevSheet);
        },
        /**
         * Загрузить выбранный объект "Тип Свойства"
         * @param evtElement
         * @constructor
         */
        TypeProperty : function ( evtElement ){
            var type_property_id = evtElement.getAttribute("data-evt-action-click-id");
            var layout = evtElement.getAttribute("data-evt-action-click-layout");
            var Data = {
                method: 'getElement',

                view : 'property_element_form',
                layout : layout,
                task : 'getElement' ,

                type: 'TypeProperty' ,
                type_property_id: type_property_id ,

            }
            self.AjaxPost(Data).then(function ( r ){
                // Добавить в предыдущий лист
                self.addToList.addToPrevSheet( 'TypeProperty' , r.data.html );
                // Закрыть текущий лист
                self.SheetController.closeSheet( evtElement )

            },function ( err ){console.error(err)});


        }
    }

    /**
     * Контроллер Форм
     * @type {{}}
     */
    this.FormController = {
        /**
         * Выгрузить форму
         * @param evt
         */
        submit : function ( evt ){
            var form = evt.target
            // Если форма не прошла валидацию
            if ( !self.ValidatorController.Form( form ) ) return ;
            form = self.FormController.write(form)
            var serializeData = self.FormController.serialize( form );

            var Data = {
                view: 'product_property',
                task : 'saveForm',
                dataForm :  serializeData ,
            }
            self.AjaxPost(Data).then(function ( r ){
                self.addToList.addToPrevSheet( 'TypeProperty' , r.data.html );
                self.SheetController.closeSheet( evtElement )

                console.log('plg_vmcustom_calc_construct_metr.admin.core:submit->r >>> ' , r );
            },function ( err ){console.error(err)});




        },
        /**
         * Перенести значения из <div name="" > в <input type="hidden" />
         * @param form
         * @return {*}
         */
        write : function (  form ){
            var inputDivName , input , name , value  ;
            inputDivName = form.querySelectorAll('div[name]');
            for ( const Key in inputDivName )
            {
                if ( inputDivName.hasOwnProperty(Key) ){
                    name = inputDivName[Key].getAttribute("name");
                    value = inputDivName[Key].innerText;
                }
                input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", name );
                input.setAttribute("value", value );
                form.appendChild(input);
            }
            return form ;
        },
        serialize : function ( form ){
            var data = new FormData(form);
            return  self.Form.serialize(form);
        }
    }

    /**
     * Контроллер Validator
     * @type {{Sheet: ((function(*=): (boolean|undefined))|*), Name: Window.ValidatorController.Name}}
     */
    this.ValidatorController = {
        Form : function (form){
            return true ;
        },
        /**
         * Валидация листа
         * @param sheet - лист для валидации
         * @constructor
         */
        Sheet : function (sheet){
            alert('ValidatorController.Sheet')
            if ( !true ) return false ;
            // Разрешить сохранение данного листа
            self.Actions__header.saveOn(sheet)
        },
        Name : function ( sheet ){

        }
    }

    /**
     * Управление секциями на листе
     * @type {{sectionEditOn: Window.SectionController.sectionEditOn, sectionEditOff: Window.SectionController.sectionEditOff}}
     */
    this.SectionController = {
        /**
         * Включить режим редактирования секции
         * @param section
         */
        sectionEditOn : function (section){
            section.closest('.veditor--read-only').classList.remove('veditor--read-only')
            section.classList.remove('gtm-read-only','veditor__section--read-only','gtm-veditor-editable');
            section.classList.add('editor__section--edit','gtm-veditor-section-active');

            section.closest('.gtm-sheet').querySelector('.gtm-sheet-header__actions > button[type=submit]').removeAttribute('disabled')


        },
        /**
         * Прокси Event для включения редактирования секции
         * @param target
         */
        onSectionEditOn : function ( target ){
            // Если секция может редактироваться
            var veditorEditable = target.closest('.gtm-veditor-editable');
            // Включить редактирование секции
            self.SectionController.sectionEditOn(veditorEditable);

        },
        /**
         * Выключить режим редактирования секции
         * @param section
         */
        sectionEditOff : function (section){
            section.classList.remove('editor__section--edit','gtm-veditor-section-active');
            section.classList.add('gtm-read-only','veditor__section--read-only','gtm-veditor-editable');
        },
        /**
         * Прокси Event для отключения режима редактирования секции
         * @param target
         */
        onSectionEditOff : function ( target ){
            // Находим лист в котором находятся редактируемые секции
            var veditorEdit = target.closest('.veditor--edit')
            // Если клик внутри редактируемой секции
            if ( target.closest('.gtm-veditor-section-active') ) return;

            // Найти секцию которая в режиме редактирования
            var sectionActive = veditorEdit.querySelector('.gtm-veditor-section-active');
            if ( !sectionActive ) return;
            // Отключить редактирование секции
            self.SectionController.sectionEditOff(sectionActive);
        },
    }

    /**
     * Управление Листами
     * @type {{closeSheet: Window.SheetController.closeSheet, _closeSheet: Window.SheetController._closeSheet, _setHolderSheetEmpty: Window.SheetController._setHolderSheetEmpty, moveToFirst: Window.SheetController.moveToFirst}}
     */
    this.SheetController = {

        SheetsParams : [] ,
        /**
         * Закрыть текущий лист и удалить
         * @param targetSheet - текущий элемент или любой элемент на листе
         *
         */
        closeSheet : function ( targetSheet ){
            if ( !targetSheet.classList.contains('gtm-sheet') ){
                targetSheet = targetSheet.closest('.gtm-sheet');
            }
            // Индекс предыдущего листа
            var prevIndex = targetSheet.indexSheetsParams - 1
            // Параметры предыдущего листа
            var prevSheetSetting = {
                setting : self.SheetController.SheetsParams[ targetSheet.indexSheetsParams - 1 ]
            };

            console.log('plg_vmcustom_calc_construct_metr.admin.core:closeSheet->targetSheet >>> ' , targetSheet );
            alert('targetSheet.indexSheetsParams')
            console.log('plg_vmcustom_calc_construct_metr.admin.core:closeSheet->targetSheet >>> ' , self.SheetController.SheetsParams );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:closeSheet->targetSheet >>> ' , targetSheet.indexSheetsParams-1 );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:closeSheet->targetSheet >>> ' , prevSheetSetting );


            var wWidth = $( document ).width();
            var $prevSheet = $(targetSheet).prev().prev();

            // Делаем прозрачным Overlay Sheet
            $(targetSheet).prev().css({ 'opacity' : '0' })
            // Отодвигаем в право на всю ширину экрана
            $(targetSheet).attr( 'style' , 'transform : translate('+   wWidth     +'px, 0px); max-width : 1164px' )

            // Если есть предыдущий лист
            if ( $prevSheet[0] ){
                self.SheetController.moveToFirst( $prevSheet , prevSheetSetting )
            }

            setTimeout(function (  ){
                $(targetSheet).prev().remove();
                $(targetSheet).remove();
            },400);
        },
        /**
         * прокси для закрытия окна по событию
         * Клик на крестик или overlay
         * @param evt
         * @private
         */
        _closeSheet : function ( evt ){
            var targetSheet = evt.target.closest('.gtm-sheet');
            if ( !targetSheet ){
                targetSheet = evt.target.nextSibling ;
            }
            self.SheetController.closeSheet(targetSheet)
        },
        /**
         * Выровнять лист по правому краю экрана
         * @param $Element
         * @param paramsSheet
         */
        moveToFirst : function ( $Element , paramsSheet ){

            var _setting = {
                sheet : {
                    width : 80
                }
            }


            var sheetIndex = $Element[0].dataset.sheetIndex;
            var SheetsParams = self.SheetController.SheetsParams[sheetIndex];

            console.log('plg_vmcustom_calc_construct_metr.admin.core:moveToFirst->$Element >>> ' , $Element );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:moveToFirst->$Element >>> ' , $Element[0].dataset.sheetIndex );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:moveToFirst->$Element >>> ' , SheetsParams );







            // Ширина документа
            var wWidth = $( document ).width();

            // Ширина из настроек листа
            var _settingWidth = SheetsParams.setting.sheet.width
            // Вычисляем максимальную ширину
            var maxWidth = wWidth * ( _settingWidth/100 ) /* default : 0.8 */;

            // Меряем ширину листа которого надо выровнять по правому краю
            var newElWidth = $Element[0].offsetWidth
            var translate = wWidth-maxWidth
            $Element.attr( 'style' , 'transform : translate('+ (translate) +'px, 0px); max-width : '+maxWidth+'px' )
        },
        /**
         * Установить пустые шаблоны листа и overlay
         * @private
         */
        _setHolderSheetEmpty : function (  ) {
            // Блок обвертка .gtm-sheet-holder
            var $gtmSheetHolder = $( '<div />' , { class : 'gtm-sheet-holder gtm-sheet-holder--animated' } )
            // Overlay - клонируемый
            var $gtmSheetOverlay = $( '<div />' , {
                class : 'gtm-sheet-overlay' ,
                'data-evt-action' : "closeSheet" ,
            } )

            // Пустая обвертка листа для клонирования
            var $gtmSheetEmpty = $( '<div />' , {class : 'gtm-sheet'} );

            var wWidth = $( document ).width();
            console.log( 'plg_vmcustom_calc_construct_metr.admin.core:->wWidth >>> ' , wWidth );

            self.isHolder = true;
            $gtmSheetHolder.append( $gtmSheetOverlay );
            $gtmSheetHolder.append( $gtmSheetEmpty );
            $( 'body' ).append( $gtmSheetHolder );
            $( '.gtm-sheet' ).attr( 'style' , 'color : red ; transform: translate(' + wWidth + 'px, 0px); max-width: 1164px; ' )

        } ,
        /**
         * Загрузить страницу формы VCCM
         * @param templates
         */
        loadSheet : function ( templates , product_property_config_id ) {

            if ( typeof product_property_config_id === 'undefined') product_property_config_id = 0;

            if ( typeof templates === 'string' ) {

            }

            if ( typeof templates === 'undefined' ) {

                templates = 'listProperties' ;
            }

            var Data = {

                view : templates ,
                task : 'getSheet' ,
                product_property_config_id : product_property_config_id ,
                virtuemart_product_id : self._params.virtuemart_product_id
            };
            self.AjaxPost(Data).then(function ( r ){
                var wWidth = $(document).width() ;
                var $gtmSheetLast = $('.gtm-sheet-holder').find('.gtm-sheet').last();
                // найти шаблон Overlay
                var $gtmSheetOverlayLast = $gtmSheetLast.prev();
                var $testPrev = $gtmSheetOverlayLast.prev()


                $gtmSheetOverlayLast.clone().insertBefore($gtmSheetOverlayLast);

                var sheetIndex = document.querySelectorAll('.gtm-sheet-holder > .gtm-sheet').length - 1 ;
                $gtmSheetLast.clone()
                    .attr('data-sheet-index',sheetIndex)
                    .html( r.data.html )
                    .insertBefore($gtmSheetOverlayLast);

                self.SheetController.SheetsParams[sheetIndex] = r.data.params

                setTimeout(function (  ){
                    // Если есть предыдущий лист - протягиваем его до левого края
                    if ( $testPrev[0] ){
                        // Получить индекс этого листа
                        var  indexSheet = $testPrev[0].dataset.sheetIndex ;
                        // Ширина листа из настроек
                        var _settingWidth = self.SheetController.SheetsParams[indexSheet].setting.sheet.width
                        var maxWidth = wWidth * ( _settingWidth/100 )
                        $testPrev.attr( 'style' , 'transform : translate(0px, 0px); max-width : '+maxWidth+'px' )
                    }
                    // Вновь созданный лист
                    var $newEl = $gtmSheetOverlayLast.prev();
                    // Выровнять по правому краю
                    if ( $newEl[0] ) self.SheetController.moveToFirst( $newEl   )
                },200)



                console.log('plg_vmcustom_calc_construct_metr.admin.core:->$gtmSheetOverlayLast >>> ' , $gtmSheetLast );
                console.log('plg_vmcustom_calc_construct_metr.admin.core:->$gtmSheetOverlayLast >>> ' , $gtmSheetOverlayLast );
                return
            },function ( err ){console.error(err)});
        },
    }

    /**
     * Получить Шаблон листа формы
     * @param templates
     * @private
     * @deprecated Use onclick="vmccm.SheetController.loadSheet( 'product_property' )"
     *
     */
    this._getPropertiesList = function ( templates ){
        alert('Deprecated Method _getPropertiesList')
        self.SheetController.loadSheet(templates)

    }

    /**
     * События для заголовка
     * @type {{title_keyup: Window.Actions__header.title_keyup, title_keydown: ((function(*): boolean)|*)}}
     */
    this.Actions__header = {
        /**
         * Разрешить сохранение листа ( Разблокировать кнопку сохранить )
         * @param sheet
         */
        saveOn : function (sheet){
            sheet.querySelector('[type="submit"]').removeAttribute('disabled')
            console.log('plg_vmcustom_calc_construct_metr.admin.core:saveOn->sheet >>> ' , sheet );

        },
        /**
         * Блокируем Enter в заголовке
         * @param evt
         * @return {boolean}
         */
        title_keydown : function ( evt ){
            if (evt.keyCode === 13) {
                evt.preventDefault();
                return false;
            }
        },
        /**
         * Копировать текст из заголовка в span.show-read-only
         * @param evt
         */
        title_keyup : function ( evt ){
            var sheet = evt.target.closest('.gtm-veditor')
            var t = evt.target.outerText ;

            if ( !t.length  ) {
                self.addError.add( evt , 'Значение отсутствует');
                return ;
            }
            self.addError.remove(evt)
            var span = evt.target.parentElement.querySelector('span.show-read-only').innerHTML = t;

            self.Actions__header.saveOn(sheet)

        }
    }

    /**
     * Вывод ошибок
     * @param text
     */
    this.addError = {

        /**
         * создать сообщение об ошибке
         * @param evt
         * @param text
         */
        add : function ( evt , text ){
            var gtmSheetParent = evt.target.closest('.gtm-sheet');
            gtmSheetParent.querySelector('.blg-error.gtm-veditor_top-error').style.display = 'block' ;
            gtmSheetParent.querySelector('.blg-error.gtm-veditor_top-error .gtm-error-message').innerHTML = text ;
        },
        /**
         * Убрать сообщение об ошибке
         * @param evt
         */
        remove : function (evt){
            var gtmSheetParent = evt.target.closest('.gtm-sheet');
            console.log('plg_vmcustom_calc_construct_metr.admin.core:remove->gtmSheetParent.querySelector style >>> ' , gtmSheetParent.querySelector('.blg-error.gtm-veditor_top-error').style   );

            gtmSheetParent.querySelector('.blg-error.gtm-veditor_top-error').style.display = 'none' ;
        },
    };

    this.FormElements = {
        changeSelect : function ( element ){
            var blockElementForm = element.closest('gtm-select')
            var options = element.options[element.selectedIndex];
            var labelOptions = options.getAttribute('label');
            var readOnlyLabel = blockElementForm.querySelector('.read-only-label')

            readOnlyLabel.innerText = labelOptions ;

            console.log('plg_vmcustom_calc_construct_metr.admin.core:changeSelect->options >>> ' , options );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:changeSelect->options >>> ' , readOnlyLabel );



        },
        /**
         * Событие нажатие кнопок в поле input применить фильтр если установлен
         * @param evt
         */
        onkeydownInput : function ( evt ){
            var element = evt.target ;
            var filter = element.dataset.filter ;
            if ( typeof filter === "undefined") return ;
            var m = evt.key.match( filter )
            if ( !m ) {
                evt.preventDefault();
                // TODO Добавить Noty из element.dataset.filterErrorMessage
                return;
            }
        },
        /**
         * Событие ввода в поле input
         * @param element
         */
        onkeyupInput : function ( element ){
            var blockElementForm = element.closest('gtm-text');
            var readOnlyLabel = blockElementForm.querySelector('.read-only-label');
            var defaultValue = self.FormElements.stringToBoolean ( element.dataset.defaultValue )  ;
            var elementValue = self.FormElements.stringToBoolean ( element.value )  ;


            readOnlyLabel.innerText = element.value ;

            if ( elementValue === defaultValue  ){
                blockElementForm.classList.add('hide-if-default');
            }else{
                blockElementForm.classList.remove('hide-if-default');
            }

            if ( elementValue.length ){
                blockElementForm.classList.remove('ng-empty');
                blockElementForm.classList.add('ng-not-empty');

            }else{
                blockElementForm.classList.add('ng-empty');
                blockElementForm.classList.remove('ng-not-empty');
            }

            console.log('plg_vmcustom_calc_construct_metr.admin.core:onkeyupInput->element >>> ' , element.value );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:onkeyupInput->defaultValue >>> ' , elementValue );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:onkeyupInput->defaultValue >>> ' , defaultValue );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:onkeyupInput->defaultValue >>> ' , defaultValue === elementValue );


        },
        /**
         * Событие - переключение Checkbox
         * @param element
         */
        changeCheckbox : function ( element ){
            var blockElementForm = element.closest('gtm-checkbox');
            var iconShowReadOnly = blockElementForm.querySelector('.show-read-only.icon');
            var defaultValue = self.FormElements.stringToBoolean ( element.dataset.defaultValue )  ;

            if ( element.checked === defaultValue  ){
                blockElementForm.classList.add('hide-if-default');
            }else{
                blockElementForm.classList.remove('hide-if-default');
            }

            console.log('plg_vmcustom_calc_construct_metr.admin.core:changeCheckbox->defaultValue >>> ' , defaultValue );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:changeCheckbox->.checked >>> ' , element.checked );
            console.log('plg_vmcustom_calc_construct_metr.admin.core:changeCheckbox->.checked >>> ' , (element.checked === defaultValue) );

            iconShowReadOnly.classList.toggle('icon-not-interested')
            iconShowReadOnly.classList.toggle('icon-check')

        },
        stringToBoolean: function(string){
            switch(string.toLowerCase().trim()){
                case "true": case "yes": case "1": return true;
                case "false": case "no": case "0": case null: return false;
                default: return Boolean(string);
            }
        },
        /**
         * Инициализация элементов форм
         */
        /*init : function (){
            document.addEventListener( 'click' , function ( evt ){
                var clickElement = evt.target.closest('[data-evt-action-form-element]')
                if ( !clickElement ) return ;
                var typeElement = clickElement.getAttribute('data-evt-action-form-element')
                self.FormElements[typeElement](clickElement);
            });
        },*/
        /**
         * управление role="checkbox"
         * @param blockElementForm
         */
        checkbox : function ( blockElementForm ){
            var checkbox = blockElementForm.querySelector('[role="checkbox"]');

            var iconShowReadOnly = blockElementForm.querySelector('.show-read-only.icon');
            var inputHidden = blockElementForm.querySelector('input[]')
            console.log('plg_vmcustom_calc_construct_metr.admin.core:checkbox->iconShowReadOnly >>> ' , iconShowReadOnly );

            iconShowReadOnly.classList.toggle('icon-not-interested')
            iconShowReadOnly.classList.toggle('icon-check')
            var newValue
            switch ( checkbox.getAttribute('aria-checked') ){
                case "true":
                    newValue =  "false"
                    checkbox.setAttribute('aria-checked', newValue );
                    checkbox.classList.add("ng-empty" );
                    checkbox.classList.remove( "ng-not-empty" , "material-checked"  );
                    break;
                case "false":
                    newValue =  "true"
                    checkbox.setAttribute('aria-checked', "true");
                    checkbox.classList.remove("ng-empty" );
                    checkbox.classList.add( "ng-not-empty" , "material-checked"  );
                    break;
            }

            if ( checkbox.dataset.defaultValue !== newValue  ){
                checkbox.closest('.check-default').classList.remove('hide-if-default');
            }else{
                checkbox.closest('.check-default').classList.add('hide-if-default');
            }



        }
    }
    /**
     * Отобразить Noty сообщение
     * @type {{param: {layout: string, type: string, timeout: number}, alert: Window.Message.alert, On: *}}
     */
    this.Message = {
        On    : 1 ,
        param : {
            type    : 'info' ,            // Тип сообщений - alert, success, warning, error, info/information
            layout  : 'bottomRight' ,   // Позиция вывода top, topLeft, topCenter, topRight, center, centerLeft, centerRight, bottom, bottomLeft, bottomCenter, bottomRight
            timeout : 10000 ,       // Время отображения
        } ,
        alert : function ( text ) {
            if ( !self.Message.On ) return;
            wgnz11.__loadModul.Noty( self.Message.param ).then( function ( Noty ) {
                Noty.options.text = text;
                Noty.show();
            } )
        }
    }
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

        if ( typeof this._params.__name !== "undefined" ){
            __name = this._params.__name ;
        }else if(typeof this._params.plugin !== "undefined" ){
            __name = this._params.plugin ;
        }

        if ( typeof this._params.__type !== "undefined" ){
            __type = this._params.__type ;
        }else if(typeof this._params.group !== "undefined" ){
            __type = this._params.group ;
        }

        this.AjaxDefaultData.group = __type;
        this.AjaxDefaultData.plugin = __name;
        this.AjaxDefaultData.module = this._params.__module;
        this._params.__name = this._params.__name || this._params.__module;
    }
    this.Init();
};
/* global GNZ11 */
window.plg_vmcustom_calc_construct_metrAdminCore.prototype = new GNZ11();
window.vmccm = new window.plg_vmcustom_calc_construct_metrAdminCore();


/**
 * Прототип - Позволяет добавлять элементы из вновь созданных  элементов
 * https://stackoverflow.com/a/32135318/6665363
 * @param element
 */
Element.prototype.appendAfter = function (element) {
    element.parentNode.insertBefore(this, element.nextSibling);
};
Element.prototype.appendBefore = function(element) {
    element.parentNode.insertBefore(this, element);
};
