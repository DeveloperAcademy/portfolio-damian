<?php

define("ABS_PATH", dirname(__FILE__));
require_once "includes/functions.php";


get_header();

$page = $_GET['p'];
switch ($page) {
    case "contact":
        get_contact();
        break;
    default:
        echo "<h1>Index page</h1>";
        echo '<a href="index.php?p=contact">Go to contact</a>';
}

get_footer();