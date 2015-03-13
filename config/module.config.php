<?php
return [
	'controllers' => [
		'invokables' => [
            'PServerCLI\Controller\PlayerHistory' => 'PServerCLI\Controller\PlayerHistoryController',
            'PServerCLI\Controller\CodeCleanUp' => 'PServerCLI\Controller\CodeCleanUpController',
		],
	],

	'console' => [
		'router' => [
			'routes' => [
                'player-history' => [
                    'options' => [
                        'route' => 'player-history [<player>]',
                        'defaults' => [
                            '__NAMESPACE__' => 'PServerCLI\Controller',
                            'controller' => 'PlayerHistory',
                            'action' => 'index'
                        ],
                    ],
                ],
                'user-codes-cleanup' => [
                    'options' => [
                        'route' => 'user-codes-cleanup [<limit>]',
                        'defaults' => [
                            '__NAMESPACE__' => 'PServerCLI\Controller',
                            'controller' => 'CodeCleanUp',
                            'action' => 'index'
                        ],
                    ],
                ],
			]
		]
	],
];