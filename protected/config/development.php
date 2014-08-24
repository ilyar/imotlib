<?php

return CMap::mergeArray(
    require(dirname(__FILE__) . '/production.php'),
    array(
        'components' => array(

            'db' => array(
                //'connectionString' => 'mysql:host=localhost;dbname=library_dev',
                //'username' => 'library_dev',
                //'password' => 'library_dev',
                'enableProfiling' => true,
                'enableParamLogging' => true
            ),

        ),
        'modules' => array(
            // Gii tool
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => 'lamp',
                'ipFilters' => array('*')
            ),
        ),
    )
);
