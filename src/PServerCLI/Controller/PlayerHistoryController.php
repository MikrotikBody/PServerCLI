<?php
/**
 * Created by PhpStorm.
 * User: †KôKšPfLâÑzè®
 * Date: 14.10.2014
 * Time: 00:44
 */

namespace PServerCLI\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\Console\Request as ConsoleRequest;

class PlayerHistoryController extends AbstractActionController {

	/** @var  \PServerCMS\Service\PlayerHistory */
	protected $playerHistoryService;

	public function indexAction(){
		$request = $this->getRequest();

		// only allowed from console....
		if (!$request instanceof ConsoleRequest){
			throw new \RuntimeException('You can only use this action from a console!');
		}

		$player = $request->getParam('player',0);

		$this->getPlayerHistory()->setCurrentPlayer($player);
	}

	/**
	 * @return \PServerCMS\Service\PlayerHistory
	 */
	protected function getPlayerHistory(){
		if (!$this->playerHistoryService) {
			$this->playerHistoryService = $this->getServiceLocator()->get('pserver_playerhistory_service');
		}

		return $this->playerHistoryService;
	}
} 