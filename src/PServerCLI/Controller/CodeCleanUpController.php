<?php

namespace PServerCLI\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\Console\Request as ConsoleRequest;

class CodeCleanUpController extends AbstractActionController
{
    /** @var  \PServerCMS\Service\UserCodes */
    protected $userCodeService;

    public function indexAction()
    {
        $request = $this->getRequest();

        // only allowed from console....
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can only use this action from a console!');
        }

        $limit = $request->getParam('limit', 100);

        $this->getUserCodeService()->cleanExpireCodes($limit);
    }

    /**
     * @return \PServerCMS\Service\UserCodes
     */
    protected function getUserCodeService()
    {
        if (!$this->userCodeService) {
            $this->userCodeService = $this->getServiceLocator()->get('pserver_usercodes_service');
        }

        return $this->userCodeService;
    }
}