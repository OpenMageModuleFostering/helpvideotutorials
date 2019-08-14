<?php
/**
* Market Academy SAS 
*
* NOTICE OF LICENSE
*
*	 This source file is subject to the Open Software License (OSL 3.0)
* It is available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
*
* @copyright  Copyright (c) Market Academy SAS. (http://www.market-academy.com)
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
	class MarketAcademy_Help_Block_Adminhtml_Videos_Renderer_View extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract{
		 
		public function render(Varien_Object $row) {
			$idv =  $row->getData('id');
			if(Mage::getModel('mavideohelp/mavideohelp')->hasSeen($idv)){
				return '<span style="color:green;display:block;text-align:center;">Oui</span>';
			}else{
				return '<span style="color:red;display:block;text-align:center;">Non</span>';
			}
		}
		 
	}
?>