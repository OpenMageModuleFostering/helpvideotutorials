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

class MarketAcademy_Help_Adminhtml_UsersController extends Mage_Adminhtml_Controller_Action
{
    public function adduserAction(){
        $post = $_POST;
        if (isset($post['idMage'])) {
            $idM = $post['idMage'];
        }

        if (isset($post['apiKey'])) {
            $apiKey = $post['apiKey'];
        }

        if (!empty($idM) && !empty($apiKey)) {
            if (is_int((int)$idM)) {
                if ($idM == Mage::getModel('mavideohelp/mavideohelp')->userId()) {
                   $newUser = Mage::getModel('mavideohelp/users')->addUser($apiKey);
                   if ($newUser) {
                       echo "true";
                   }else{
                        echo "false";
                   }
                }
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
        exit();
    }

    public function indexAction(){
    	$this->_title($this->__('Sales'))->_title($this->__('Les videos Market Academy'));
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('mavideohelp/adminhtml_videos_grid'));
        $this->renderLayout();
    }
    
    public function _isAllowed(){
        return true;
    }
}