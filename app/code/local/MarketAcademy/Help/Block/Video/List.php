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
class MarketAcademy_Help_Block_Video_List extends Mage_Core_Block_Template
{
    protected $_list = array();
    protected $_route =NULL;
    
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('ma/videohelp/list.phtml');
    }
    
    public function getVideoRoute()
    {
        return $this->_route;
    }
    
    public function setVideoRoute($route)
    {
        $this->_route = $route;
        return $this;
    }
    
    public function setList($list)
    {
        if(!is_array($list)) $list = array();
        $this->_list = $list;
        return $this;
    }
    
    public function getList()
    {
        return $this->_list;
    }
    
    public function countList()
    {
        return count($this->getList());
    }
}