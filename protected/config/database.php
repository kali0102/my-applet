<?php

// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/applet.db',
    // uncomment the following lines to use a MySQL database

    'connectionString' => 'mysql:host=localhost;dbname=my-applet',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',

);