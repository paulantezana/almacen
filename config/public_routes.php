<?php
    define('PUBLICROUTER',[
        '' => [
            'controller'    => 'Home',
            'action'        => 'index'
        ],
        'biblioteca' => [
            'controller'    => 'Session',
            'action'        => 'login'
        ],
        'login' => [
            'controller'    => 'Session',
            'action'        => 'login'
        ],
        'biblioteca/session/init' => [
            'controller'    => 'Session',
            'action'        => 'init'
        ],
    ]);