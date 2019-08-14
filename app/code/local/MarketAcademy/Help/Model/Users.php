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
class MarketAcademy_Help_Model_Users extends Mage_Core_Model_Abstract
{
	public function _construct() {
		parent::_construct();
		$this->_init('mavideohelp/Users');
	}

	public function addUser($apiKey){
	    $userId = Mage::getModel('mavideohelp/mavideohelp')->userId();
	    
		$list = $this->getCollection()->addFieldToFilter('mu_id_mage',$userId);
		foreach ($list as $key) {
			$key->delete();
		}
	    $userExist = $this->load($userId,"mu_id_mage");
	    if ($userExist) {
			$userExist->setData('mu_id_mage',$userId);
			$userExist->setData('mu_apiKey',$apiKey);
			$userExist->setData('mu_date',"NOW");
	    	$userExist->save();
	    }else{
			$this->setData('mu_id_mage',$userId);
			$this->setData('mu_apiKey',$apiKey);
			$this->setData('mu_date',"NOW");
			return $this->save();
	    }
	}

	public function getKey(){
		$userId = Mage::getModel('mavideohelp/mavideohelp')->userId();
		$list = $this->getCollection()->addFieldToFilter('mu_id_mage',$userId)->getData();
		if (count($list) > 0) {
			return $list[0];
		}
		return false;
	}
}