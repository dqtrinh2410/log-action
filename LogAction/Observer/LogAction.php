<?php
namespace Trinh\LogAction\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Controller\ResultFactory;

class LogAction implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        $actionName = $observer->getEvent()->getRequest()->getFullActionName();
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/Log-Action.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info($actionName);
    }
}