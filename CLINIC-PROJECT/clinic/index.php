<?php
session_start();
require_once "classes/Functions.php";
require_once "classes/validation.php";
require_once "classes/Database.php";
$db=new Database();
$conn=$db->connection('clinc');
if (isset($_SESSION['auth']) && $_SESSION['auth']['type'] == 'doctor') {
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'logout') {
            $_GET['page'] = 'logout';
        }
        elseif ($_GET['page'] == 'settings') {
            $_GET['page'] = 'settings';
        }
        elseif ($_GET['page'] == 'delete-book') {
            $_GET['page'] = 'delete-book';
        }
         else {
            $_GET['page'] = "profile-doc";
        }
    }else{
        $_GET['page'] = "profile-doc";  
     }
}
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            require_once 'views/home.php';
            break;
        case 'profile-doc':
            require_once 'views/profile-doc.php';
            break;
        case 'profile-user':
            require_once 'views/profile-user.php';
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
        case 'apply':
            require_once 'views/apply.php';
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
        case 'booked':
            require_once 'views/booked.php';
            break;
        case 'books':
            require_once 'controllers/books.php';
            break;
        case 'apply-store':
            require_once 'controllers/apply-store.php';
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
        case 'delete-book':
            require_once 'controllers/delete-book.php';
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
        case 'admin':
            require_once 'admin/index.php';
        case 'settings':
            require_once 'controllers/settings.php';
            break;
        case 'cancel':
            require_once 'controllers/cancel.php';
            break;
        case 'view_admin':
            require_once 'dashbord/view.php';

            break;
        default:
            require_once '404/404.php';
            break;
    }
} else {
    require_once 'views/home.php';
}
