<?php
session_start();
require_once('../classes/Functions.php');
require_once('../classes/Database.php');
require_once('../classes/validation.php');
$db=new Database();
if(!isset($_SESSION['auth'])||$_SESSION['auth']['type']!='admin'){
    (new Functions)->redirect('index.php');
}

$conn=$db->connection('clinc');
$fun=new Functions();
if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'home':
            require_once 'dashboard/view.php';
            break;
        case 'profile':
            require_once 'dashboard/profile.php';
            break;
        case 'contact':
            require_once 'views/contact.php';
            break;
        case 'search':
            require_once 'includes/search.php';
            break;
        case 'majors':
            require_once 'dashboard/majors.php';
            break;
        case 'doctors':
            require_once 'dashboard/doctors.php';
            break;
        case 'users':
            require_once 'dashboard/users.php';
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
            require_once 'dashboard/view.php';
    }
} else {
    require_once 'dashboard/view.php';
}?>
<script>
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function(event) {
            event.preventDefault();

            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                window.location.href = this.getAttribute('href');
            }
        });
    }
</script>
