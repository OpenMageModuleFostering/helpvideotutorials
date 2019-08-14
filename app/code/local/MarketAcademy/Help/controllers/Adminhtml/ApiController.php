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

class MarketAcademy_Help_Adminhtml_ApiController extends Mage_Adminhtml_Controller_Action
{
	public function RegisterUserAction(){
		$db = Mage::getModel('mavideohelp/users');
		
		exit();
	}

	public function seenAction(){
		$get = $_GET;
		if (isset($get['idv'])) {
			if (!empty($get['idv'])) {
				$idvideo = $get['idv'];
			}else{
				return false;
			}
		}else{
			return false;
		}

		$db = Mage::getModel('mavideohelp/mavideohelp');
		if (!$db->hasSeen($idvideo)) {
			echo $db->seenVideo($idvideo);
			echo "true";
		}else{
			echo "false";
		}
		exit();
	}

	public function seenToggleAction(){
		$get = $_GET;
		if (isset($get['idv'])) {
			if (!empty($get['idv'])) {
				$idvideo = $get['idv'];
			}else{
				return false;
			}
		}else{
			return false;
		}

		$db = Mage::getModel('mavideohelp/mavideohelp');
		if ($db->hasSeen($idvideo)) {
			echo $db->unseeVideo($idvideo);
			echo "false";
		}else{
			echo $db->seenVideo($idvideo);
			echo "true";
		}
		exit();
	}

    public function testAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function _isAllowed(){
        return true;
    }
}