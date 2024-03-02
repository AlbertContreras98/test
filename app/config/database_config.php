<?php
include(BASE_PATH . '/app/database/migrations/create_table_porfolio.php');
include(BASE_PATH . '/app/database/migrations/create_table_user.php');
include(BASE_PATH . '/app/database/seeders/UserSeeder.php');
require(BASE_PATH . '/app/config/database.php');

/**
 * Creamos las tablas
 */
$database = new Database();
$database->createTables();
