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
	class MarketAcademy_Help_Block_Adminhtml_Videos_Grid extends Mage_Adminhtml_Block_Widget_Grid {
	    public function __construct()
	    {
	        parent::__construct();
	    }
	 
	    protected function _prepareCollection()
	    {
	        $collection = new Varien_Data_Collection();
	 		$videos = Mage::getModel("mavideohelp/service");
	    	$list = $videos->getAllVideo();
	    	foreach ($list as $vid) {
	    		$data = new Varien_Object();
            	$data->setId($vid['id_tuto']);
            	$data->setThumbnail($vid['thumbnail']);
            	$data->setCategory($vid['catName']);
            	$data->setTags($vid['tagsName']);
            	$data->setTitre(urldecode($vid['titre_tuto']));
            	$data->setDescription(urldecode($vid['description_tuto']));
            	$data->setDure($vid['lien_tuto']);
            	$data->setLink($vid['lien_tuto']);
            	$collection->addItem($data);
	    	}

	        $this->setCollection($collection);
	        //Debug
	        // foreach ($collection as $key => $value) {
	        // 	echo '<pre>';var_dump($value->getData());echo '</pre>';
	        // }
	        parent::_prepareCollection();
	        return $this;
	    }
	 
	    protected function _prepareColumns()
	    {
	        $helper = Mage::helper('mavideohelp');
	        // $currency = (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE);
	 
	        $this->addColumn('thumbnail', array(
	            'header' => $helper->__('Thumbnail'),
	            'index'  => 'thumbnail',
	            'renderer' => 'mavideohelp/Adminhtml_Videos_Renderer_Thumbnail'
	        ));
	        $this->addColumn('cats', array(
	            'header' => $helper->__('Categories'),
	            'index'  => 'category'
	        ));
	        
	        $this->addColumn('tags', array(
	            'header' => $helper->__('Tags'),
	            'index'  => 'tags'
	        ));

	        $this->addColumn('titre', array(
	            'header'       => $helper->__('Titre'),
	            'index'        => 'titre'
	        ));

	 		$this->addColumn('description', array(
	            'header'       => $helper->__('Description'),
	            'index'        => 'description'
	        ));

	        $this->addColumn('vue', array(
	            'header'       => $helper->__('Vue'),
	            'index'        => 'id',
	            'renderer' => 'mavideohelp/Adminhtml_Videos_Renderer_View'
	        ));

	        // $this->addColumn('increment_id', array(
	        //     'header' => $helper->__('Video #'),
	        //     'index'  => 'id',
	        //     'width' =>"20px"
	        // ));
	 
	        return parent::_prepareColumns();
	    }
	 
	    public function getGridUrl()
	    {
	        return $this->getUrl('*/*/grid', array('_current'=>true));
	    }
	}