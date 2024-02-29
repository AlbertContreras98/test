<?php
require_once('../routes/route.php');

$con = getConnection();
create_bbdd($con);

include(BASE_PATH . "/app/views/auth/login.php");