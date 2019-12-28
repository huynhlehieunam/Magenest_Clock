<?php
namespace Magenest\CustomEav\Model\Product\Type;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product\Type\Virtual;

class CustomVirtualType extends Virtual{
    public function __construct(\Magento\Catalog\Model\Product\Option $catalogProductOption, \Magento\Eav\Model\Config $eavConfig, \Magento\Catalog\Model\Product\Type $catalogProductType, \Magento\Framework\Event\ManagerInterface $eventManager, \Magento\MediaStorage\Helper\File\Storage\Database $fileStorageDb, \Magento\Framework\Filesystem $filesystem, \Magento\Framework\Registry $coreRegistry, \Psr\Log\LoggerInterface $logger, ProductRepositoryInterface $productRepository, \Magento\Framework\Serialize\Serializer\Json $serializer = null)
    {
        parent::__construct($catalogProductOption, $eavConfig, $catalogProductType, $eventManager, $fileStorageDb, $filesystem, $coreRegistry, $logger, $productRepository, $serializer);
    }
}