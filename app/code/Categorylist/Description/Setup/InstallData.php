<?php

namespace Categorylist\Description\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        if (version_compare($context->getVersion(), '1.0.0') < 0){





		$eavSetup -> removeAttribute(\Magento\Catalog\Model\Category::ENTITY, 'custom_list_description');

		
			$eavSetup -> addAttribute(\Magento\Catalog\Model\Category :: ENTITY, 'custom_list_description', [
                        'type' => 'text',
                        'label' => 'Custom List Description',
                        'input' => 'textarea',
						'required' => false,
                        'sort_order' => 110,
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                        'wysiwyg_enabled' => true,
                        'is_html_allowed_on_front' => false,
                        'group' => 'General Information',
						"default" => "",
						"class"    => "",
						"note"       => ""
			]
			);
					

	

		$eavSetup -> removeAttribute(\Magento\Catalog\Model\Category::ENTITY, 'custom_list_yn');

		
			$eavSetup -> addAttribute(\Magento\Catalog\Model\Category :: ENTITY, 'custom_list_yn', [
                        'type' => 'int',
                        'label' => 'show image list page',
                        'input' => 'select',
						'required' => false,
                        'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                        'sort_order' => 120,
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                        'group' => 'General Information',
						"default" => "",
						"class"    => "",
						"note"       => ""
			]
			);



            $eavSetup -> removeAttribute(\Magento\Catalog\Model\Category::ENTITY, 'custom_price_desc_banner');

        
            $eavSetup -> addAttribute(\Magento\Catalog\Model\Category :: ENTITY, 'custom_price_desc_banner', [
                        'type' => 'text',
                        'label' => 'Custom Price Description Banner',
                        'input' => 'textarea',
                        'required' => false,
                        'sort_order' => 115,
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                        'wysiwyg_enabled' => true,
                        'is_html_allowed_on_front' => false,
                        'group' => 'General Information',
                        "default" => "",
                        "class"    => "",
                        "note"       => ""
            ]
            );
					

	



		}

    }
}