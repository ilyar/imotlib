<?php

return CMap::mergeArray(
    require(dirname(__FILE__) . '/production.php'),
    array(
        'components' => array(
            'fixture' => array(
                'class' => 'system.test.CDbFixtureManager',
            ),
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=imotlib_test',
                'emulatePrepare' => true,
                'tablePrefix'=>'lib_',
                'username' => 'imotlib',
                'password' => 'imotlib',
                'charset' => 'utf8',
            ),
        ),
    )
);
