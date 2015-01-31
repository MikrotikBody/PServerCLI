<?php
return [
	'controllers' => [
		'invokables' => [
			'PServerCLI\Controller\PlayerHistory' => 'PServerCLI\Controller\PlayerHistoryController',
		]
	],

	'console' => [
		'router' => [
			'routes' => [
				'get-happen-use' => [
					'options' => [
						'route' => 'player-history <player>',
						'defaults' => [
							'__NAMESPACE__' => 'PServerCLI\Controller',
							'controller' => 'PlayerHistory',
							'action' => 'index'
						],
					],
				],
			]
		]
	],
];