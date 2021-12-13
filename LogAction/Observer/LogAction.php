<?php
namespace Changi\PreLogin\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Controller\ResultFactory;

class CheckLoginObserver implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        $actionName = $observer->getEvent()->getRequest()->getFullActionName();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/action-log.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($actionName);
    }
}