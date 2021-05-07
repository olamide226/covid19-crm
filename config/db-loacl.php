<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost:3307;dbname=ebis_crm',
    'dsn' => 'mysql:host=192.168.30.8;dbname=ebis_crm',
    'username' => 'geepcmdc',
    // 'username' => 'root',
    'password' => '3ndl355',
    // 'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
