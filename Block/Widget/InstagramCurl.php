<?php
namespace Excellence\Instagram\Block\Widget;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Excellence\Instagram\Model\Config\Source\Design;
use Excellence\Instagram\Model\Config\Source\Layout;

class InstagramCurl extends Template implements BlockInterface
{
    protected $helper;
    protected $_template = 'Excellence_Instagram::widget/instagram-api.phtml';
    public function __construct(\Magento\Framework\View\Element\Template\Context $context, 
               \Excellence\Instagram\Helper\Data $helperData)
    {
        parent::__construct($context);
        $this->helper = $helperData;
    }
    
    public function isEnable()
    {
        return $this->helper->isEnable();
    }

   

    
    public function getCurlData()
    {
        return $this->helper->getCurlData();
    }
   

}

?>