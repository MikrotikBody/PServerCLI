<?php

namespace PServerCLI;

use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface {

    /**
     * @return mixed
     */
	public function getConfig() {
		return include __DIR__ . '/../../config/module.config.php';
	}

    /**
     * @return array
     */
	public function getAutoloaderConfig() {
		return [
			'Zend\Loader\StandardAutoloader' => [
				'namespaces' => [
					__NAMESPACE__ => __DIR__ . '/../../src/' . __NAMESPACE__,
				],
			],
		];
	}

	/**
	 * Expected to return \Zend\ServiceManager\Config object or array to
	 * seed such an object.
	 *
	 * @return array|\Zend\ServiceManager\Config
	 */
	public function getServiceConfig() {
		return [];
	}
}
