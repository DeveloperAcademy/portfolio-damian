<?php

define("ABS_PATH", dirname(__FILE__));
require_once "includes/functions.php";


get_header();

$page = isset($_GET['p']) ? $_GET['p'] : '';
switch ($page) {
    case "contact":
        get_contact();
        break;
    case "projects":
        get_projects();
        break;
    default:
        get_front_page();
}

get_footer();
