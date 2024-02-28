<?php
session_start();
include('route.php');
include(BASE_PATH . '/app/config/database_config.php');

$con = getConnection();
create_bbdd($con);

include(BASE_PATH . "/app/views/auth/login.php");