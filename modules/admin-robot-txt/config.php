<?php

return [
    '__name' => 'admin-robot-txt',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/admin-robot-txt.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/admin-robot-txt' => ['install','update','remove'],
        'theme/admin/robottxt/' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'admin' => NULL
            ],
            [
                'admin-site-setting' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'AdminRobotTxt\\Controller' => [
                'type' => 'file',
                'base' => 'modules/admin-robot-txt/controller'
            ]
        ],
        'files' => []
    ],
    'adminSiteSetting' => [
        'editable' => [
            'robot-txt' => [
                'label' => 'robots.txt',
                'icon'  => '<i class="fas fa-robot"></i>',
                'info'  => 'Modify file /robots.txt of the site',
                'perms' => 'update_robot_txt',
                'link'  => [
                    'label' => 'Update file',
                    'route' => ['adminRobotTxt', [], []]
                ]
            ]
        ]
    ],
    'routes' => [
        'admin' => [
            'adminRobotTxt' => [
                'path' => [
                    'value' => '/robots-txt'
                ],
                'handler' => 'AdminRobotTxt\\Controller\\Robot::edit',
                'method' => 'GET|POST'
            ]
        ]
    ],
    'libForm' => [
        'forms' => [
            'admin.robottxt.create' => [
                'value' => [
                    'label' => 'File Content',
                    'type'  => 'codemirror',
                    'nolabel' => true,
                    'rules' => []
                ]
            ]
        ]
    ],
    'adminRobotTxt' => [
        'base' => NULL
    ]
];