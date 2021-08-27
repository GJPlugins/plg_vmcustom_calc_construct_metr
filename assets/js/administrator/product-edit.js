/*******************************************************************************************************************
 *     ╔═══╗ ╔══╗ ╔═══╗ ╔════╗ ╔═══╗ ╔══╗        ╔══╗  ╔═══╗ ╔╗╔╗ ╔═══╗ ╔╗   ╔══╗ ╔═══╗ ╔╗  ╔╗ ╔═══╗ ╔╗ ╔╗ ╔════╗
 *     ║╔══╝ ║╔╗║ ║╔═╗║ ╚═╗╔═╝ ║╔══╝ ║╔═╝        ║╔╗╚╗ ║╔══╝ ║║║║ ║╔══╝ ║║   ║╔╗║ ║╔═╗║ ║║  ║║ ║╔══╝ ║╚═╝║ ╚═╗╔═╝
 *     ║║╔═╗ ║╚╝║ ║╚═╝║   ║║   ║╚══╗ ║╚═╗        ║║╚╗║ ║╚══╗ ║║║║ ║╚══╗ ║║   ║║║║ ║╚═╝║ ║╚╗╔╝║ ║╚══╗ ║╔╗ ║   ║║
 *     ║║╚╗║ ║╔╗║ ║╔╗╔╝   ║║   ║╔══╝ ╚═╗║        ║║─║║ ║╔══╝ ║╚╝║ ║╔══╝ ║║   ║║║║ ║╔══╝ ║╔╗╔╗║ ║╔══╝ ║║╚╗║   ║║
 *     ║╚═╝║ ║║║║ ║║║║    ║║   ║╚══╗ ╔═╝║        ║╚═╝║ ║╚══╗ ╚╗╔╝ ║╚══╗ ║╚═╗ ║╚╝║ ║║    ║║╚╝║║ ║╚══╗ ║║ ║║   ║║
 *     ╚═══╝ ╚╝╚╝ ╚╝╚╝    ╚╝   ╚═══╝ ╚══╝        ╚═══╝ ╚═══╝  ╚╝  ╚═══╝ ╚══╝ ╚══╝ ╚╝    ╚╝  ╚╝ ╚═══╝ ╚╝ ╚╝   ╚╝
 *------------------------------------------------------------------------------------------------------------------
 * @author Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
 * @date 27.08.2021 06:30
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 ******************************************************************************************************************/

window.productEditFabric = function () {
    var self = this;
    var param ;


    this.Init = function () {
        param = Joomla.getOptions( 'plg_vmcustom_calc_construct_metr' , {});
        // Добавить слушателей событий
        this.addEvtListener();


    }
    /**
     * Добавить слушателей событий
     */
    this.addEvtListener = function () {
        document.addEventListener( 'click' , function ( evt ) {


            switch ( evt.target.dataset.evtAction )
            {
                /**
                 * отправить для создания всплывающего меню пользователя
                 */
                case 'uiBubbleMenu' :
                    self.evtActionHandler.uiBubbleMenu(evt)
                    break ;
                case 'call-me-back' :
                    // CollBack method
                    break;
                default :
                    return;
            }
        } , { passive : true } );
    }


    this.evtActionHandler = {
        actionHandlerMethods : {
            /**
             * Удалить строку в которой находится элемент targetElement
             * @param targetElement дочерний элемент от которого искать родителя leneTag
             * @param leneTag селектор - родительский элемент строки которой нужно удалить
             */
            removeLine : function ( targetElement , leneTag ){
                if ( typeof leneTag === 'undefined') leneTag = 'li'
                targetElement.closest( leneTag ).remove();
            }
        },
        uiBubbleMenu : function ( evt ){
            var uiBubbleMenuId = evt.target.dataset.uiBubbleMenu
            var BubbleMenu  = Joomla.getOptions( 'uiBubbleMenu' , [] )[uiBubbleMenuId];

            /**
             * Получаем координаты
             * @type {DOMRect}
             */
            var c = evt.target.getBoundingClientRect();
            /**
             * Получить ширину и высоту элемента
             */
            var b = evt.target.getBoundingClientRect();
            var top = document.body.scrollTop + c.top + b.height,
                left = document.body.scrollLeft + c.left;
            // console.log('product-edit:uiBubbleMenu->c >>> ' , b);
            // console.log('product-edit:uiBubbleMenu->c >>> ' , b.height );
            // console.log('product-edit:uiBubbleMenu->c >>> ' , b.left );


            var wrapper = document.createElement("div");
            wrapper.setAttribute("class", "md-panel-outer-wrapper");
            wrapper.style.cssText = 'z-index: 90;';
            wrapper.onclick = function () {  this.parentElement.removeChild(this); };


            var bubbleContent = document.createElement("div");
            bubbleContent.setAttribute("class", 'bubble-content md-panel ctui-bubble md-gtm-theme _md-panel-animate-enter')
            bubbleContent.style.cssText = 'z-index: 91; top: '+top+'px; left: '+left+'px;';

            var bubbleUl = document.createElement("ul");


            for ( var Key in BubbleMenu )
            {
                var bubbleLi= document.createElement("li");
                bubbleLi.appendChild(document.createTextNode( Key ))

                // bubbleLi.dataset.menuAction = evt.target;

                if ( typeof BubbleMenu[Key].onclick !== 'undefined'  ){
                     if ( typeof self.evtActionHandler.actionHandlerMethods[BubbleMenu[Key].onclick] === 'function' ){
                         bubbleLi.onclick = function (){
                             self.evtActionHandler.actionHandlerMethods[BubbleMenu[Key].onclick](evt.target)
                         }
                     }
                }
                bubbleUl.appendChild(bubbleLi);

                console.log('product-edit:uiBubbleMenu->BubbleMenu >>> ' , BubbleMenu[Key].onclick );
                console.log('product-edit:uiBubbleMenu->BubbleMenu >>> ' , self.evtActionHandler.actionHandlerMethods );
                console.log('product-edit:uiBubbleMenu->BubbleMenu >>> ' , Key );
            }

            bubbleContent.appendChild(bubbleUl);

            wrapper.appendChild(bubbleContent);
            self.load.css( param.host + 'plugins/system/plg_vmcustom_calc_construct_metr/assets/css/bubbleUl.css?'+param.__v )


            document.getElementsByTagName('body')[0].appendChild(wrapper);
        }

    };


    /**
     * Обработка события uiBubbleMenu - (Добавить ткань)
     * @param uiBubbleMenuElement элемент uiBubbleMenu на котором вызвано меню
     */
    this.evtActionHandler.actionHandlerMethods.addFabric = function ( uiBubbleMenuElement ) {
        var coveringMethod = uiBubbleMenuElement.closest('.covering-method');
        var coveringMethodId = +coveringMethod.querySelector('input[name="covering_method_id"]').value

        var allTrCoveringType = coveringMethod.querySelectorAll('tr.covering-type');

        var parentTrCoveringType = allTrCoveringType[0].parentElement

        // клон последний tr с тканью
        var cloneLastTrCoveringType = allTrCoveringType[allTrCoveringType.length - 1].cloneNode(true);

        // обновляем индекс новой строки
        var indexNewLine = +cloneLastTrCoveringType.querySelector('input[name="indexLastLine"]').value + 1 ;
        cloneLastTrCoveringType.querySelector('input[name="indexLastLine"]').value = indexNewLine ;

        console.log('product-edit:addFabric->indexNewLine >>> ' , indexNewLine );


        // Поправляем название ткани (Ткань 1=>Ткань 2)
        var typeNameElement = cloneLastTrCoveringType.querySelector('td.covering-type-name')
        typeNameElement.textContent = typeNameElement.textContent.replace(/\d/, indexNewLine );

        // находим все input
        var allInputCovering = cloneLastTrCoveringType.querySelectorAll('input[type="number"]')

        for (var i = 0; i < allInputCovering.length; ++i) {
            allInputCovering[i].value = '';
            // ''
            var nameVal = 'covering['+coveringMethodId+']['+indexNewLine+']['+(i+1)+']';
            allInputCovering[i].setAttribute('name' , nameVal);
        }
        parentTrCoveringType.appendChild(cloneLastTrCoveringType);
        console.log('product-edit:addFabric->parentTrCoveringType >>> ' , parentTrCoveringType );

    }

    this.Init();
}
/* global GNZ11 */
window.productEditFabric.prototype = new GNZ11();
window.ProductEditFabric =  new window.productEditFabric();
