<?php

namespace PServerCLI\Controller;

use PServerCMS\Helper\HelperService;
use PServerCMS\Helper\HelperServiceLocator;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\Console\Request as ConsoleRequest;

class CodeCleanUpController extends AbstractActionController
{
    use HelperServiceLocator, HelperService;

    public function indexAction()
    {
        $request = $this->getRequest();

        // only allowed from console....
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can only use this action from a console!');
        }

        $limit = $request->getParam('limit', 100);

        $this->getUserCodesService()->cleanExpireCodes($limit);
    }
}