<?php

return CMap::mergeArray(
    require(dirname(__FILE__) . '/production.php'),
    array(
        'theme' => 'yiistrap',
      'aliases' => array(
/*        'vendor' => realpath(__DIR__ . '/../vendor'),
        'vendor.twbs.bootstrap.dist' => realpath(__DIR__ . '/../vendor/twbs/bootstrap/dist'),
        */
        'bootstrap' => 'vendor.crisu83.yiistrap',
      ),
/*      'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
    ),
      'import' => array(
        'bootstrap.helpers.TbHtml',
    ),*/

        'components' => array(

            'db' => array(
                //'connectionString' => 'mysql:host=localhost;dbname=library_dev',
                //'username' => 'library_dev',
                //'password' => 'library_dev',
                'enableProfiling' => true,
                'enableParamLogging' => true
            ),
          'bootstrap' => array(
            'class' => 'vendor.crisu83.yiistrap.components.TbApi',
          ),

        ),
        'modules' => array(
            // Gii tool
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => 'lamp',
                'ipFilters' => array('*'),
              'generatorPaths' => array('vendor.crisu83.yiistrap.gii'),
            ),
        ),
    )
);
