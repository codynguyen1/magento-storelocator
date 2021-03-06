<?php

namespace Simi\Simistorelocator\Controller\Adminhtml\Store;

use Magento\Framework\Controller\ResultFactory;

class ExportCsv extends \Simi\Simistorelocator\Controller\Adminhtml\AbstractExportAction {

    /**
     * file name to export.
     *
     * @return string
     */
    protected function _getFileName() {
        return 'stores.csv';
    }

    /**
     * get content.
     *
     * @return string
     */
    protected function _getContent() {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        /** @var \Magento\Backend\Block\Widget\Grid\ExportInterface $exportBlock  */
        $exportBlock = $resultPage->getLayout()
                ->getChildBlock('simistorelocatoradmin.store.grid', 'grid.export');

        return $exportBlock->getCsvFile();
    }

    /**
     * Check the permission to run it.
     *
     * @return bool
     */
    protected function _isAllowed() {
        return $this->_authorization->isAllowed('Simi\Simistorelocator::store');
    }

}
