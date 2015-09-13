<?php

namespace PServerCLI\Controller;

use PServerCMS\Helper\HelperService;
use PServerCMS\Helper\HelperServiceLocator;
use Symfony\Component\Filesystem\LockHandler;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Request as ConsoleRequest;

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

		// run only 1 time, beta test
		// @todo refactoring that part in a service
		$lockHandler = new LockHandler($request->getContent()[0]);

		if (!$lockHandler->lock()) {
			throw new \RuntimeException('already running');
		}

		$player = $request->getParam('player', 0);

		$this->getPlayerHistory()->setCurrentPlayer($player);
	}

}