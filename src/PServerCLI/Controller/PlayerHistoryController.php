<?php

namespace PServerCLI\Controller;

use PServerCMS\Helper\HelperService;
use PServerCMS\Helper\HelperServiceLocator;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\Console\Request as ConsoleRequest;

class PlayerHistoryController extends AbstractActionController
{
    use HelperServiceLocator, HelperService;

	public function indexAction()
    {
		$request = $this->getRequest();

		// only allowed from console....
		if (!$request instanceof ConsoleRequest) {
			throw new \RuntimeException('You can only use this action from a console!');
		}

		$player = $request->getParam('player',0);

		$this->getPlayerHistory()->setCurrentPlayer($player);
	}

}