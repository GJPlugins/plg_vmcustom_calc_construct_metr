<?php
/**
 * @package    plg_vmcustom_calc_construct_metr
 *
 * @author     oleg <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Plugin\CMSPlugin;

/**
 * plgvmcustom_calc_construct_metr plugin.
 *
 * @package   plg_vmcustom_calc_construct_metr
 * @since     1.0.0
 */
class plgSystemPlg_vmcustom_calc_construct_metr extends CMSPlugin
{
    public static $virtuemart_custom_id = false ;

	/**
	 * Application object
	 *
	 * @var    CMSApplication
	 * @since  1.0.0
	 */
	protected $app;

	/**
	 * Database object
	 *
	 * @var    JDatabaseDriver
	 * @since  1.0.0
	 */
	protected $db;

	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0.0
	 */
	protected $autoloadLanguage = true;
    /**
     * @var
     * @since 3.9
     */
    private $Helper;


    /** *****************************/
    /******  PARAMS  DEFAULT  *******/
    /** *****************************/
    /**
     * @var Joomla\Registry\Registry Параметры плагина
     * @since 3.9
     */
    public static $plg_params ;
    /**
     * @var string Версия плагина
     * @since 3.9
     */
    protected $_v;
    /**
     * @var bool Режим разработки
     * @since 3.9
     */
    protected $_development_on;
    /**
     * Установить параметры Script Options DEFAULT
     * @param array|string $params
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   26.08.2021 19:15
     *
     */
    private function _setParamsDefault( $params = [] ){

        self::$plg_params = new \Joomla\Registry\Registry( $params ) ;

        $doc = \Joomla\CMS\Factory::getDocument();
        $this->_v = $this->params->get('__v' , '1.0');
        $this->_development_on  = $this->params->get('development_on' ,  false );
        $dataScriptOptions = [
            '__name' => $this->_name,
            '__type' => $this->_type,
            '__v' => $this->_v,
            '__development_on' => $this->_development_on ,
        ];
        $doc->addScriptOptions('plg_vmcustom_calc_construct_metr' , $dataScriptOptions);
    }
    /** *****************************/



    /**
     * plgVmCustomPlg_vmcustom_calc_construct_metr constructor.
     *
     *
     * @throws Exception
     * @since 3.9
     */
    public function __construct( &$subject, $config = array() )
    {
        parent::__construct( $subject, $config  );
        # Установить параметры Script Options DEFAULT
        $this->_setParamsDefault($config['params']);





//        echo'<pre>';print_r( $this->_type );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $this->_name );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $this->_v );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $this->_development_on );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        die(__FILE__ .' '. __LINE__ );



        \JLoader::registerNamespace( 'GNZ11' , JPATH_LIBRARIES . '/GNZ11' , $reset = false , $prepend = false , $type = 'psr4' );
        $GNZ11_js =  \GNZ11\Core\Js::instance();

        $helpersPath = JPATH_PLUGINS.'/system/plg_vmcustom_calc_construct_metr/Helpers' ;
        \JLoader::registerNamespace( 'VCCM' , $helpersPath , $reset = false , $prepend = false , $type = 'psr4' );


        $this->Helper = \VCCM\HelperProduct::instance($config['params']);



    }


	/**
	 * onAfterInitialise.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterInitialise()
	{
	}

	/**
	 * onAfterRoute.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterRoute()
	{
	}

	/**
	 * onAfterDispatch.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterDispatch()
	{
	    $app = \Joomla\CMS\Factory::getApplication();

        $isClientAdmin = $this->app->isClient('administrator') ;
        if( !$isClientAdmin   ) return; #END IF

	    $option = $this->app->input->get('option' , false , 'string' );
	    $view = $this->app->input->get('view' , false , 'string' );
	    $task = $this->app->input->get('task' , false , 'string' );
        if( !($option == 'com_virtuemart' &&  $view =='product' && $task == 'edit') ) return; #END IF

        $product_id = $this->app->input->get('virtuemart_product_id'  , 0 )[0];


        \GNZ11\Core\Js::instance();
        /**
         * Добавить в отложенную загрузку файлы рессурсов ( CSS or JS )
         * @param $Assets   string Url - ресурса
         * @param $Callback string|null Callback после загрузки ( для JS файлов )
         * @param bool $Trigger string  Trigger - для ожидания загрузки
         */
        \GNZ11\Core\Js::addJproLoad(\Joomla\CMS\Uri\Uri::root().'plugins/system/plg_vmcustom_calc_construct_metr/assets/js/plg_vmcustom_calc_construct_metr.admin.core.js' ,   false ,   false );
//        \GNZ11\Core\Js::addJproLoad(\Joomla\CMS\Uri\Uri::root().'plugins/system/plg_vmcustom_calc_construct_metr/assets/css/gtm-sheet.css' ,   false ,   false );
        # Добавить JS опции
        $this->Helper::addPluginOptions($product_id);
        # Добавить кнопку "Свойства" в ToolBar на странице редактирования товара
        \VCCM\HelperToolbar::addButtonsInProduct();
	}

    /**
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   12.07.2021 16:13
     *
     */
    public function onBeforeRender()
    {
    }

	/**
	 * onAfterRender.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
    public function onAfterRender()
    {
    }

	/**
	 * onAfterCompileHead.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
    public function onAfterCompileHead()
    {
    }

	/**
	 * OnAfterCompress.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterCompress()
	{
	}

	/**
	 * onAfterRespond.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterRespond()
	{

	}

    /**
     * Точка Входа AJAX -----------------------------------------------------------------
     *
     * @throws Exception
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   02.06.2021 18:52
     *
     */
	public function onAjaxPlg_vmcustom_calc_construct_metr()
    {
        $task = $this->app->input->get('task' , false , 'STRING');
        /**
         * Запуск Контроллера
         */
        JLoader::register('VccmController' , JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/controller.php');
        $Controller = new VccmController();
        $dataArr = $Controller->execute($task);

        echo new \JResponseJson($dataArr);
        die();
    }



    /**
     * --- Virtuemart VmConfig
     * /administrator/components/com_virtuemart/helpers/config.php
     */

    /**
     * Запуск VMart - FRONT
     *
     * @package Virtuemart
     *
     * @see VmConfig::loadConfig
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 16:01
     *
     */
    public function plgVmInitialise()
    {
    }

    /**
     * Страница редактирования Custom Filed
     *
     * @param $virtuemart_custom_id
     * @param $customPlugin
     *
     * @see VirtuemartViewCustom::display()
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   11.07.2021 16:52
     *
     */
    public function plgVmOnDisplayEdit( $virtuemart_custom_id , &$html )
    {
    }


    /**
     * --- Virtuemart VirtueMartModelCustomfields
     * /administrator/components/com_virtuemart/models/customfields.php
     */

    /**
     *
     * @param stdClass $obj
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 16:08
     *
     */
    public function plgVmDeclarePluginParamsCustomVM3(&$data){ }

    /**
     * Точка входа страница редактирования товара ADMIN
     *
     * @param $field
     * @param $product_id
     * @param $row
     * @param $retValue
     *
     * @throws Exception
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   31.05.2021 21:04
     *
     * @see VirtueMartModelCustomfields::displayProductCustomfieldBE
     */
    function plgVmOnProductEdit( $field, $product_id, &$row, &$retValue) {
//         $retValue = 'ccccxxxzzzzz' ;
    }





    /*******************/
    /* Product Display */
    /*******************/
    /**
     * Отобразить Custom Field - FRONT  view => productdetails|category    PAGE Product Display
     * - Trigger Virtuemart /com_virtuemart/sublayouts/customfield.php
     *
     * @param stdClass $product Object - product
     * @param stdClass $group   Object - custom field in product
     *
     * @return bool true
     *
     * @see  /templates/nst/html/com_virtuemart/sublayouts/customfield.php
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   12.07.2021 18:42
     *
     */
    public function plgVmOnDisplayProductFEVM3( &$product,&$group) {

        $option = $this->app->input->get('option' , false , 'STRING' );
        $view = $this->app->input->get('view' , false , 'STRING' );

        if( $option == 'com_virtuemart' && $view == 'productdetails'  )
        {
            $doc = \Joomla\CMS\Factory::getDocument();
            $ScriptOptions = ['virtuemart_product_id'=>$product->virtuemart_product_id ];
            $doc->addScriptOptions('plg_vmcustom_calc_construct_metr', $ScriptOptions ) ;
            /**
             * Подключить загрузчик 3D models FRONT
             */
            try
            {
                JLoader::registerNamespace( 'GNZ11' , JPATH_LIBRARIES . '/GNZ11' , $reset = false , $prepend = false , $type = 'psr4' );
                $GNZ11_js =  \GNZ11\Core\Js::instance();
                \GNZ11\Core\Js::addJproLoad(\Joomla\CMS\Uri\Uri::root().'plugins/system/plg_vmcustom_calc_construct_metr/assets/js/3d/three-d-loader.js?'.$this->_v ,   false ,   false );
            }
            catch( Exception $e )
            {

                if( !\Joomla\CMS\Filesystem\Folder::exists( $this->patchGnz11 ) && $this->app->isClient('administrator') )
                {
                    $this->app->enqueueMessage('Должна быть установлена библиотека GNZ11' , 'error');
                }#END IF
            }
        }#END IF


        if (empty($group->custom_element) or $group->custom_element != $this->_name ) return false;
        $idx=0;
        $this->plgVmOnDisplayProductFE($product,$idx,$group);
        return true;
    }

    /**
     * Render - html customs fields - page product detail
     *
     * @param $product
     * @param $idx
     * @param $group
     *
     * @return bool
     * @throws Exception
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   11.08.2021 17:26
     *
     */
    protected function plgVmOnDisplayProductFE($product,&$idx,&$group) {

//        $options = [];
//        $session = JFactory::getSession($options);
//        $cartSession = $session->get('vmcart', 0, 'vm');
//        $cartData = json_decode( $cartSession ) ;
//        echo'<pre>';print_r( $cartData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;

//        die(__FILE__ .' '. __LINE__ );
//

        ob_start();
        \VCCM\HelperProduct::getFields( $product->virtuemart_product_id , [] );
        $html = ob_get_clean();

        $group->display .= $html ;





        return true;
    }



    /****************/
    /* Cart Display */
    /****************/

    /**
     * Отобразить настраиваемые поля в для товара в корзине
     *
     * @param $product
     * @param $productCustom
     * @param $html
     *
     * @return false|void
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   11.08.2021 16:47
     *
     */
    function plgVmOnViewCartVM3(&$product, &$productCustom, &$html ) {


        if (empty($productCustom->custom_element) or $productCustom->custom_element != $this->_name) return false;

        $pluginCustomId = $this->_getPluginCustomId();

        $vmcustom_calc_construct_metrFields =  $product->customProductData[$pluginCustomId];
        if( !isset($vmcustom_calc_construct_metrFields['vmcustom_calc_construct_metr']) || !$vmcustom_calc_construct_metrFields['vmcustom_calc_construct_metr'] ) return false; #END IF

        $productCustom->customfield_price = 33333 ;

//        echo'<pre>';print_r( $productCustom );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $product );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $vmcustom_calc_construct_metrFields );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $productCustom );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $html );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        die(__FILE__ .' '. __LINE__ );

//        $options = [];
//        $session = JFactory::getSession($options);
//        $cartSession = $session->get('vmcart', 0, 'vm');
//        $cartData = json_decode( $cartSession ) ;
//        echo'<pre>';print_r( $cartData );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//
//        echo'<pre>';print_r( $product->customProductData[$productCustom->virtuemart_custom_id] );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        die(__FILE__ .' '. __LINE__ );
//


//        if(empty($product->customProductData[$productCustom->virtuemart_custom_id][$productCustom->virtuemart_customfield_id])) return false;

//        die(__FILE__ .' '. __LINE__ );

        foreach( $product->customProductData[$productCustom->virtuemart_custom_id] as $k =>$item ) {

//            echo'<pre>';print_r( $item );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;




            if($productCustom->virtuemart_customfield_id == $k) {



                if(isset($item['comment'])){
                    $html .= $this->renderByLayout('cart',array($productCustom->custom_title,$item) );
                    //$html .='<span>'.vmText::_($productCustom->custom_title).' '.$item['comment'].'</span>';
                }
            }
        }
        return true;
    }

    /**
     * Пересчитывает сумму за товар с применением цены за отобранные customs fields this plugin
     *  - Используется для обновления модуля корзины (task: viewJS)
     *
     * EVENT - VirtueMartModelCustomfields::calculateModificators()
     *
     * @param stdClass $product
     * @param stdClass $customfield
     * @param mixed    $selected 1 если поле отмечено
     * @param float    $modificationSum
     *
     * @return bool|void
     * @throws Exception
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   11.07.2021 10:56
     * @see    VirtueMartModelCustomfields::calculateModificators
     */
    public function plgVmPrepareCartProduct( stdClass &$product, stdClass &$customfield, $selected , float &$modificationSum )
    {
        $modificationSum += 0 ;
        $PluginCustomId = $this->_getPluginCustomId() ;
        $app = \Joomla\CMS\Factory::getApplication();
        $view = $this->app->input->get('view' , false , 'STRING') ;

//        echo'<pre>';print_r( $view );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        die(__FILE__ .' '. __LINE__ );






        if( $view != 'cart' )
        {
            if ($customfield->custom_element !==$this->_name  ) return ;
            $virtuemart_product_id = $product->virtuemart_product_id ;
            $arrGet = [
                'customProductData' => [
                    $virtuemart_product_id => [
                        'vmcustom_calc_construct_metr' => 'int'
                    ]
                ],
            ] ;
            $customProductData = $app->input->getArray( $arrGet ) ;
            if( !$customProductData['customProductData'][$virtuemart_product_id]['vmcustom_calc_construct_metr'] ) return; #END IF
            $vmcustom_calc_construct_metr = $customProductData['customProductData'][$virtuemart_product_id]['vmcustom_calc_construct_metr'] ;

        }else{
            if( !isset( $product->customProductData[$PluginCustomId]['vmcustom_calc_construct_metr'] ) ) return; #END IF



            /**
             * @var array $vmcustom_calc_construct_metrFields - Id полей отобранных для этого товара
             */
            $vmcustom_calc_construct_metrFields = $product->customProductData[$PluginCustomId]['vmcustom_calc_construct_metr'] ;

            if ( !$vmcustom_calc_construct_metrFields ) return ;
            $vmcustom_calc_construct_metr = $vmcustom_calc_construct_metrFields ;
        }#END IF





        /**
         * @var VccmModelProduct_property $product_propertyModel
         */
        \Joomla\CMS\MVC\Model\BaseDatabaseModel::addIncludePath( JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/models','VccmModel');
        $product_propertyModel = \Joomla\CMS\MVC\Model\BaseDatabaseModel::getInstance( ucfirst( 'Product_property' ) , 'VccmModel' ,  $config = array() );



        foreach ( $vmcustom_calc_construct_metr as $item)
        {
            $propData = $product_propertyModel->getProductProperty( $item );
            switch ($propData->param->operation_modification){
                case 2 :
                    $modifier_value =   $propData->param->modifier_value * -1;
                    break;
                default :
                    $modifier_value =   $propData->param->modifier_value ;
            }
            $modificationSum += $modifier_value ;

        }#END FOREACH

        return true ;
    }



    function plgVmOnViewCart($product,$row,&$html) {
        if (empty($product->productCustom->custom_element) or $product->productCustom->custom_element != $this->_name) return '';

        if (!$plgParam = $this->GetPluginInCart($product)) return '' ;

        foreach($plgParam as $k => $item){

            if(!empty($item['comment']) ){
                if($product->productCustom->virtuemart_customfield_id==$k){
                    $html .= $this->renderByLayout('cart',array($product->productCustom->custom_title,$item) );
                    //$html .='<span>'.JText::_($product->productCustom->custom_title).' '.$item['comment'].'</span>';
                }
            }
        }

        return true;
    }



    /**
     * --- Virtuemart VirtueMartModelProduct
     */

    /**
     * для сортировки, поиска, фильтрации и нумерации страниц по идентификаторам товаров
     * @see VirtueMartModelProduct::sortSearchListQuery
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 14:47
     *
     */
    public function plgVmBeforeProductSearch($select, $joinedTables,$where,$groupBy,$orderBy,$joinLang){
        die(__FILE__ .' '. __LINE__ );

    }



    /**
     * Store a product
     * @param $data
     * @param $product_data
     *
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 14:53
     *
     */
    public function plgVmAfterStoreProduct( $data, $product_data ){}

    /**
     * Creates a clone of a given product id
     * @param $product
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 14:55
     *
     */
    public function plgVmCloneProduct( $product ){}

    /**
     * При удалении товара и связанные записи таблицы
     * @param $id
     * @param $ok
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 15:43
     *
     */
    public function plgVmOnDeleteProduct( $id, $ok ){}


    /**
     * --- Virtuemart - calculationHelper ---
     */

    /**
     * Получите информацию о купоне и рассчитайте стоимость
     * Get coupon details and calculate the valuev
     * @param $_code
     * @param $cartData
     * @param $cartPrices
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 14:24
     *
     */
    public function plgVmCouponHandler($_code,$cartData, $cartPrices){}

    /**
     * Рассчитывает влияющие цены Пересылка / оплаты для расчета
     * calculationHelper::calculateMethodPrice
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 12:23
     *
     */
    public function plgVmonSelectedCalculatePriceShipment( $_cart, $cartPrices, $cartData ){ }

    /**
     * Рассчитывает влияющие цены Пересылка / оплаты для расчета
     * calculationHelper::calculateMethodPrice
     * @param $_cart
     * @param $cartPrices
     * @param $cartData
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 12:27
     *
     */
    public function plgVmonSelectedCalculatePricePayment( $_cart, $cartPrices, $cartData ){}


    /**
     * Триггер для использования настраиваемого фильтра для входных данных кастомарных полей
     *
     * - Используется для того что бы перестроить данные кастомарного поля этого плагина (-этот принцип позволяет уйти
     * от создания полей для каждого товара и создавать их уже непосредственно в этом плагине)
     *
     * Trigger to use custom filter on customer inputs
     *
     *
     * @param $product
     * @param $customfield
     * @param $customProductData
     * @param $customFiltered
     *
     * @see    VirtueMartCart::add()
     *
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   12.07.2021 09:54
     *
     */
    public function plgVmOnAddToCartFilter(&$product, &$customfield, &$customProductData, &$customFiltered){

        if( !isset( $customProductData['vmcustom_calc_construct_metr'] ) ) return false ; #END IF


        $pluginCustomId = $this->_getPluginCustomId();
        $customProductData[$pluginCustomId] = ['vmcustom_calc_construct_metr' => $customProductData['vmcustom_calc_construct_metr'] ] ;
    }






    /**
     * ====================================
     * |========   ADMIN TRIGGERS ========|
     * ====================================
     */


    /**
     * Добавляем вкладку "РАСЧЕТ ТКАНИ" ADMIN на product.edit
     * Метод добавления || переопределения щаблонов вкладок(Табов) в Админ панели - Virtuemart
     *
     * @param VirtuemartViewProduct $view          object
     * @param $load_template array - Массив ключи имена шаблонов - значения название вкладок
     *
     * @throws Exception
     * @since 3.9
     */
    public function plgVmBuildTabs ( &$view , &$load_template )
    {
        $viewNameArr = ['product'];
        $viewName = $view->get('_name');

        if( !in_array($viewName , $viewNameArr ) ) return ; #END IF

        try
        {
            JLoader::registerNamespace( 'GNZ11' , JPATH_LIBRARIES . '/GNZ11' , $reset = false , $prepend = false , $type = 'psr4' );
            $GNZ11_js =  \GNZ11\Core\Js::instance();
        }
        catch( Exception $e )
        {
            if( !\Joomla\CMS\Filesystem\Folder::exists($this->patchGnz11) && $this->app->isClient('administrator') )
            {
                $this->app->enqueueMessage('Должна быть установлена библиотека GNZ11' , 'error');
            }#END IF
        }



        $doc = \Joomla\CMS\Factory::getDocument();
        $_v =   self::$plg_params->get('__v' , 1.0 );
        $doc->addStyleSheet(\Joomla\CMS\Uri\Uri::root().'plugins/system/plg_vmcustom_calc_construct_metr/assets/css/administrator/product-edit.css?'.$_v);

        \GNZ11\Core\Js::addJproLoad(\Joomla\CMS\Uri\Uri::root().'plugins/system/plg_vmcustom_calc_construct_metr/assets/js/administrator/product-edit.js?'.$_v ,   false ,   false );


        /**
         * @var VccmModelCovering_product | JModelLegacy $ModelCovering_product
         */
        require_once (JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/models/covering_product.php');
        $ModelCovering_product = new VccmModelCovering_product();
        $view->MapCoveringProduct = $ModelCovering_product->getMapCoveringProduct( $view );

        if( !$view->MapCoveringProduct && !is_array($view->MapCoveringProduct) ) return ; #END IF

        $view->addTemplatePath( JPATH_PLUGINS.'/system/plg_vmcustom_calc_construct_metr/views/'.$viewName.'/tmpl' );
        $load_template[ 'covering_product' ] = 'Расчет ткани';
    }#END FUNCTION

    /**
     * Сохранение товара ADMIN TRIGGER
     * Сохраняем - карту тканей для товара
     * Store a product
     *
     * @param Array  $data         - Данные формы
     * @param Object $product_data - TableProducts
     *
     * @throws Exception
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 14:52
     *
     */
    public function plgVmBeforeStoreProduct( array $data , object $product_data )
    {
        require_once (JPATH_PLUGINS . '/system/plg_vmcustom_calc_construct_metr/models/covering_product.php');
        $ModelCovering_product = new VccmModelCovering_product();
        $ModelCovering_product->storeMapCoveringProduct( $data , $product_data );
    }










    /**
     * Позволяет добавить название новой вычислительной операции в
     * выпадающий список в панели редактирования правил расчета “Налоги и правила расчета [ Изменить ] >>> Операция” .
     * @package plgVmCalculation
     * @param array $entryPoints содержит в себе массив уже имеющихся на данный момент в системе типов “математических”
     *                           операций, которые могут быть использованы при пересчете.
     *                           Ключи :
     *                           ‘calc_value_mathop’ - это что-то вроде ключа операции, системного названия;
     *                           ‘calc_value_mathop_name’ - название операции, которое будет видно в админке пользователю.
     *
     *
     *
     * @since   3.9
     * @auhtor  Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date    11.07.2021 21:13
     *
     */
    public function plgVmAddMathOp( array &$entryPoints ){
        $entryPoints[] = [
            "calc_value_mathop" => "progress",
            "calc_value_mathop_name" => "Progressive Discount"];
    }

    /**
     * Отбор правил расчета для товара FRONT && ADMIN
     * format ( html , json )
     * Правила расчета
     *                  Marge  -  Модификатор цены для выделения прибыли
     *                  VatTax - НДС (налог) для каждого товара
     *                  DBTax  - Цена перед уплатой налогов
     *
     * @package plgVmCalculation
     * @param calculationHelper $calculationHelper
     *                                      $calculationHelper->_app - Joomla\CMS\Application\SiteApplication Object
     *                                      $calculationHelper->_db - JDatabaseDriverMysqli Object
     *                                      $calculationHelper->_cart - VirtueMartCart
     *                                      $calculationHelper->_product - stdClass текущего товара
     *                                      $calculationHelper->_calcModel - VirtueMartModelCalc Object
     *
     *                                      $calculationHelper->_cats - array категорий товара
     *                                      $calculationHelper->productPrices - array - для текущего товара
     *
     *
     * @param array $testedRules
     *
     *
     *
     * @since   3.9
     * @auhtor  Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date    10.07.2021 13:40
     */
    public function plgVmInGatherEffectRulesProduct( calculationHelper $calculationHelper , array &$testedRules ){


//        $testedRules[1]['calc_value'] = 1 ;
//        $testedRules[1]['calc_value_mathop'] = '+' ;
//        $testedRules[1]['for_override'] = 1 ;
//        unset( $calculationHelper->_app  ) ;
//        echo'<pre>';print_r( $testedRules );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        echo'<pre>';print_r( $calculationHelper->productPrices );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//        die(__FILE__ .' '. __LINE__ );

    }

    /**
     * Интерпретатор метода математического вычисления для цены
     * - если метод вычисления был установлен методом "plgVmAddMathOp"
     * этот метод удобнее всего использовать для непосредственных вычислений и преобразования стоимости.
     *
     * @package plgVmCalculation
     *
     * @param calculationHelper $calculationh
     * @param                   $rule
     * @param                   $price
     * @param                   $_revert
     *
     * @return float модифицированною цены за товар
     *
     *
     * @see     calculationHelper::interpreteMathOp()
     *
     * @since   3.9
     * @auhtor  Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date    10.07.2021 10:52
     */
    public function plgVmInterpreteMathOp( calculationHelper $calculationh , $rule , $price , $_revert )
    {

        return $price + 1  ;
    }


    /**
     * Отбор правил расчета -
     * у которых параметр - "Вид расчета" установлен в "Цена перед уплатой налогов за счет - DBTaxBill"
     * [calc_kind] => DBTaxBill
     *
     * @param calculationHelper $calculationh
     * @param Array             $testedRules массив с правилами расчета
     *
     * @see    calculationHelper::gatherEffectingRulesForBill
     *
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   10.07.2021 12:45
     *
     */
    public function plgVmInGatherEffectRulesBill( calculationHelper $calculationh , $testedRules ){
        die(__FILE__ .' '. __LINE__ );

    }



    /**
     * Получить id кастомарного поля из тбл. #__virtuemart_customs для плагина
     * @return int - id кастомарного поля
     * @since  3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date   11.08.2021 15:45
     *
     */
    protected function _getPluginCustomId(){

        if( self::$virtuemart_custom_id ) return self::$virtuemart_custom_id ; #END IF

        $plugin = \Joomla\CMS\Plugin\PluginHelper::getPlugin($this->_type , $this->_name );

        $Query = $this->db->getQuery(true) ;
        $Query->select('*')
            ->from( $this->db->quoteName('#__virtuemart_customs'));
        $where = [
            $this->db->quoteName('custom_jplugin_id') .'='. $this->db->quote( $plugin->id ),
        ];
        $Query->where($where);
        $this->db->setQuery( $Query ) ;

        $virtuemart_custom_id = $this->db->loadObjectList();

        if( count( $virtuemart_custom_id ) > 1 )
        {
            $this->app->enqueueMessage('Опубликовано больше одного поля для плагина '
                . \Joomla\CMS\Language\Text::_('PLG_VMCUSTOM_CALC_CONSTRUCT_METR'), 'warning' );
        }#END IF

        self::$virtuemart_custom_id = $virtuemart_custom_id[0]->virtuemart_custom_id ;

        return self::$virtuemart_custom_id ;
    }


}
