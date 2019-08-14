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
	class MarketAcademy_Help_Block_Adminhtml_Videos_Renderer_Thumbnail extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract{
		 
		public function render(Varien_Object $row) {
			$value =  $row->getData($this->getColumn()->getIndex());
			$baseUrl = "https://www.youtube.com/watch?v=";
			$url = $baseUrl.$row->getData('link');
			return '<a href="'.$url.'" target="_blank">'.$value.'</a>';
		}
		 
	}
?>