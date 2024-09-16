<?php

if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'home':
            require_once 'views/index.php';
            break;
        case 'contact':
            require_once 'views/contact.php';
            break;
        case 'about':
            require_once 'views/about.php';
            break;
        case 'register':
            require_once 'views/register.php';
            break;
        case 'login':
            require_once 'views/login.php';
            break;
        case 'search':
            require_once 'req/search.php';
            break;
        case 'logout':
            require_once 'views/logout.php';
            break;
        case 'profile':
            require_once 'views/profile.php';
            break;
        case 'addCategory':
            require_once 'dashboard/categories/addCat.php';
            break;
        case 'editCategory':
            require_once 'dashboard/categories/index.php';
            break;
        case 'updateCategory':
            require_once 'dashboard/categories/updateCat.php';
            break;
        case 'addCat':
            require_once 'controlers/categories/addCat.php';
            break;
        case 'editCat':
            require_once 'controlers/categories/editCat.php';
            break;
        case 'deleteCat':
            require_once 'controlers/categories/deleteCat.php';
            break;
        case 'addProduct':
            require_once 'dashboard/products/addPro.php';
            break;
        case 'editProduct':
            require_once 'dashboard/products/index.php';
            break;
        case 'updateProduct':
            require_once 'dashboard/products/editPro.php';
            break;
        case 'addPro':
            require_once 'controlers/products/addPro.php';
            break;
        case 'editPro':
            require_once 'controlers/products/editPro.php';
            break;
        case 'deletePro':
            require_once 'controlers/products/deletePro.php';
            break;
        case 'user_login':
            require_once 'controlers/user_login.php';
            break;
        case 'user_store':
            require_once 'controlers/user_store.php';
            break;
        case 'cart':
            require_once 'views/cart.php';
            break;
        case 'cartuser':
            require_once 'views/cartuser.php';
            break;
        case 'buy':
            require_once 'views/buy.php';
            break;
        case 'fav':
            require_once 'views/fav.php';
            break;
        case 'cart-control':
            require_once 'controlers/cart.php';
            break;
        case 'buy-control':
            require_once 'controlers/buy.php';
            break;
        default:
            require_once 'views/home.php';
    }
} else {
    require_once 'views/home.php';
}