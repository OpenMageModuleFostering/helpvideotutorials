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

	class MarketAcademy_Help_Block_Help extends Mage_Core_Block_Template{

		public function isRegisterMA(){
			$id = $this->userId();
			$url = Mage::getUrl();

			return Mage::getModel('mavideohelp/service')->isRegister($url,$id);
		}

		public function getVideoRoute(){
	        return Mage::app()->getRequest()->getControllerName().'/'.Mage::app()->getRequest()->getActionName();
	    }
	    
	    public function getVideoUrl(){
	    	// Mage::getModel('mypackage_module/modeltest)
	    	$videos = Mage::getModel("mavideohelp/service");
	    	$list = $videos->getVideoList();
	    	// var_dump($list);
	        return Mage::helper("adminhtml")->getUrl('ma_videohelp');
	    }

	    public function getVideos(){
	    	$videos = Mage::getModel("mavideohelp/service");
	    	$list = $videos->getVideoList();
	    	// var_dump($list);
	    	return $list;
	    }
	    
	    public function decode($item){
			$result = htmlspecialchars_decode(urldecode($item));
			return $result;
		}

		public function viewedVids(){
			$userId = $this->userId();
			$collection = Mage::getModel('mavideohelp/mavideohelp')->getCollection()->addFieldToFilter('id_user_seen',$userId)->getData();
			// echo '<pre>';var_dump(Mage::getModel('mavideohelp/mavideohelp')->UserId());echo '</pre>';
			$vidIds = array();
			foreach ($collection as $vue) {
				$vidIds[] = $vue['id_video_seen'];
			}
			return $vidIds;
		}

		public function jsviewedVids(){
			$js = $this->viewedVids();
			$js = "[".implode(",", $js)."]";
			return $js;
		}

		public function userId(){
			return Mage::getModel('mavideohelp/mavideohelp')->userId();
		}

		public function UserData(){
			return Mage::getSingleton('admin/session')->getUser()->getData();
		}
	}