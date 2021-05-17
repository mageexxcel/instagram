<?php
namespace Excellence\Instagram\Helper;
use Magento\Framework\HTTP\Client\Curl;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_curl;
    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\HTTP\Client\Curl $curl
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfigObject,
        \Magento\Framework\HTTP\Client\Curl $curl
    ) {
        $this->scopeConfigObject = $scopeConfigObject;
        $this->_curl = $curl;
        parent::__construct($context);
    }
    public function getCurlData()
    {
        $access_token = $this->scopeConfigObject->getValue('instagramSection/setting/accessToken');
        $url ="https://graph.instagram.com/me/media?fields=media_url,permalink&access_token={$access_token}";
        $this->_curl->get($url);
        $response = $this->_curl->getBody();
        return $response;
    }
    public function isEnable()
    {
        return $this->scopeConfigObject->getValue('instagramSection/setting/active');
    }
}
?>