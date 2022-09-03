<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


include dirname( dirname(__FILE__) ) . '/utils/db.php';

if (isset($_POST['endpoint'])) {

    if (is_readable(dirname(__FILE__) . '/controllers/' . $_POST['endpoint'] . '.php')) {

        include_once dirname(__FILE__) . '/controllers/' . $_POST['endpoint'] . '.php';
    }
}