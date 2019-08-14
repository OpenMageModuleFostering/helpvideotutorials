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
class MarketAcademy_Help_Model_Feed extends Mage_AdminNotification_Model_Feed {
    public function getFeedUrl() {
        $url = 
            Mage::getStoreConfigFlag(self::XML_USE_HTTPS_PATH) ? 'https://' : 'http://'
            . 'tuto.market-academy.com/notification.rss';
            return $url;
    }
    
    public function observe() {
        $this->checkUpdate();
    }
}