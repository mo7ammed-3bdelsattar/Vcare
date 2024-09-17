<?php

if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'home':
            require_once 'views/index.php';
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
        case 'majors':
            require_once 'views/majors.php';
            break;
        case 'doctors':
            require_once 'doctors/index.php';
            break;
        case 'book':
            require_once 'doctors/doctor.php';
            break;
        case 'user_login':
            require_once 'controlers/user_login.php';
            break;
        case 'user_store':
            require_once 'controlers/user_store.php';
            break;
        default:
            require_once 'views/index.php';
    }
} else {
    require_once 'views/index.php';
}
