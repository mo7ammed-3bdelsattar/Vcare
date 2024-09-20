<?php
session_start();
require_once "classes/Functions.php";
require_once "classes/validation.php";
require_once "classes/Database.php";
if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'home':
            require_once 'views/index.php';
            break;
        case 'profile':
            require_once 'views/profile.php';
            break;
        case 'contact':
            require_once 'views/contact.php';
            break;
        case 'register':
            require_once 'views/register.php';
            break;
        case 'login':
            require_once 'views/login.php';
            break;
        case 'logout':
            require_once 'views/logout.php';
            break;
        case 'search':
            require_once 'includes/search.php';
            break;
        case 'majors':
            require_once 'views/majors.php';
            break;
        case 'doctors':
            require_once 'doctors/index.php';
            break;
        case 'book':
            require_once 'doctors/doctor.php';
            break;
        case 'user-login':
            require_once 'controllers/user-login.php';
            break;
        case 'user-register':
            require_once 'controllers/user-register.php';
            break;
        case 'contact-us':
            require_once 'controllers/contact-us.php';
            break;
        case 'patients':
            require_once 'controllers/patients.php';
            break;
        default:
            require_once 'views/index.php';
    }
} else {
    require_once 'views/index.php';
}