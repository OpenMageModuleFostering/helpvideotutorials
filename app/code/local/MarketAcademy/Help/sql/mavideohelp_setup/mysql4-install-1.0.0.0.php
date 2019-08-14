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
$installer = $this;
$table = $this->getTable('markethelp_users');
$installer->startSetup();
$sql="CREATE TABLE IF NOT EXISTS `".$table."` (
  `mu_id` int(11) NOT NULL AUTO_INCREMENT,
  `mu_id_mage` int(11) NOT NULL,
  `mu_apiKey` varchar(255) NOT NULL,
  `mu_date` datetime NOT NULL,
  PRIMARY KEY (`mu_id`),
  KEY `mu_id_mage` (`mu_id_mage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
$installer->run($sql);
$installer->endSetup();