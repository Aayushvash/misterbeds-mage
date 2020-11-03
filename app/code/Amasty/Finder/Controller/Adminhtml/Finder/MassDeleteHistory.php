<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2019 Amasty (https://www.amasty.com)
 * @package Amasty_Finder
 */

/**
 * Copyright © 2015 Amasty. All rights reserved.
 */

namespace Amasty\Finder\Controller\Adminhtml\Finder;

class MassDeleteHistory extends \Amasty\Finder\Controller\Adminhtml\Finder
{
    use \Amasty\Finder\MyTrait\FinderController;

    public function execute()
    {
        $finder = $this->_initFinder();
        $finderId = $finder->getId();
        $ids = $this->getRequest()->getParam('history_file_ids');
        if ($ids) {
            try {
                $this->importHistoryRepository->deleteByIds($ids);
                $this->messageManager->addSuccess(__('You deleted the history file(s).'));
                $this->_redirect(
                    'amasty_finder/finder/edit',
                    ['id' => $finderId, '_fragment' => 'amasty_finder_finder_edit_tabs_import_history_section_content']
                );
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete history file(s) right now. Please review the log and try again.')
                );
                $this->logInterface->critical($e);
                $this->_redirect(
                    'amasty_finder/finder/edit',
                    ['id' => $finderId, '_fragment' => 'amasty_finder_finder_edit_tabs_import_history_section_content']
                );
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a history file(s) to delete.'));
        $this->_redirect(
            'amasty_finder/finder/edit',
            ['id' => $finderId, '_fragment' => 'amasty_finder_finder_edit_tabs_import_history_section_content']
        );
    }
}
