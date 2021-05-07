<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost:3306;dbname=hgsf_crm',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
