<?php
 /**
 * Market Academy SAS 
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * It is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @copyright  Copyright (c) Market Academy SAS. (http://www.market-academy.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class MarketAcademy_Help_Model_Service extends Varien_Object
{
    const URL_REQUEST = 'https://tuto.market-academy.com/api/api.php';
    private $_apiKey;

    public function __construct(){
        $hasKey = Mage::getModel('mavideohelp/users')->getKey();
        if (!empty($hasKey["mu_apiKey"])) {
            $this->_apiKey = $hasKey['mu_apiKey'];
            return true;
        }

        return false;
    }
    
    public function getVideoList() {
        $url = $this->_getUrl('getVideos');
        $final = $url .$this;
        $ch = curl_init($final);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $dataJson = curl_exec($ch);
        curl_close($ch);
        return json_decode($dataJson, true);
    }

    public function getAllVideo() {
        $url = $this->_getUrl('getAllVideos');
        $final = $url .$this;
        $ch = curl_init($final);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $dataJson = curl_exec($ch);
        curl_close($ch);
        return json_decode($dataJson, true);
    }

    public function iframeUrl(){
        $urlAsk = static::URL_REQUEST.'?api=iframe&cms=magento'.'&'.$this->_getRouteParameters();
        if (!empty($this->_apiKey)) {
            $urlAsk .= "&key=".$this->_apiKey;
        }
        return $urlAsk;
    }

    public function getBtnUrl($direction){
        if ($direction == "left" || $direction == "right") {
            $urlAsk = static::URL_REQUEST.'?api=button&cms=magento&sens='.$direction.'&'.$this->_getRouteParameters();
            if (!empty($this->_apiKey)) {
                $urlAsk .= "&key=".$this->_apiKey;
            }
            return $urlAsk;
        }
        return false;
    }

    public function getTableFrameUrl(){
        return static::iframeUrl()."&table=1";
    }
    
    protected function _getUrl($action) {
        return static::URL_REQUEST . '?' . $this->_getUrlParameters($action);
    }
    
    protected function _getUrlParameters($api) {
        if (!empty($api)) {
            $moduleName = Mage::app()->getRequest()->getModuleName();
            $module = Mage::app()->getRequest()->getControllerName();
            $action = Mage::app()->getRequest()->getActionName();
            $storeLocaleCode = Mage::app()->getLocale()->getLocaleCode();

            if ($action == 'index') {
                $route = $module;
            }else{
                $route = $module.'/'.$action;
            }
            $parameters = array(
                'api'   => $api,
                'r'     => $route,
                'l'     => $storeLocaleCode,
                'm'     => $moduleName
            );
            
            if (!empty($section)) {
                $parameters['section'] = $section;
            }

            $urlP = array();
            foreach($parameters as $key=>$val){
                if(!empty($val)) 
                    $urlP[] = $key.'='.urlencode($val);
            }
            
            return implode('&', $urlP);
        }
        return false;
    }

    protected function _getRouteParameters() {
        $module = Mage::app()->getRequest()->getControllerName();
        $action = Mage::app()->getRequest()->getActionName();
        $storeLocaleCode = Mage::app()->getLocale()->getLocaleCode();
        $moduleName = Mage::app()->getRequest()->getControllerModule();
        $section = Mage::app()->getRequest()->getParam('section');

        if ($action == 'index') {
            $route = $module;
        }else{
            $route = $module.'/'.$action;
        }
        
        $parameters = array(
            'r' => $route,
            'l'  => $storeLocaleCode,
            'm'  => $moduleName,
        );

        if (!empty($section)) {
            $parameters['section'] = $section;
        }
        
        $urlP = array();
        foreach($parameters as $key=>$val){
            if(!empty($val)) 
                $urlP[] = $key.'='.urlencode($val);
        }
        
        return implode('&', $urlP);
    }
}