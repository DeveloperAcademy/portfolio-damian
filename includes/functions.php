<?php

function get_header()
{
    require_once ABS_PATH . "/header.php";
}

function get_footer()
{
    require_once ABS_PATH . "/footer.php";

}

function get_contact()
{
    require_once ABS_PATH . "/contact.php";
}

function get_front_page()
{
    require_once ABS_PATH . "/front-page.php";
}

function get_projects()
{
    require_once ABS_PATH . "/projects.php";
}


function clear_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}