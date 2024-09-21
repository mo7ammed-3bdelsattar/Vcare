<?php
session_start();
require_once('../classes/Functions.php');
require_once('../classes/Database.php');
require_once('../classes/validation.php');
$db = new Database();
if (!isset($_SESSION['auth']) || $_SESSION['auth']['type'] != 'admin') {
    (new Functions)->redirect('index.php');
}

$conn = $db->connection('clinc');
$fun = new Functions();
if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'home':
            $fun->redirect('index.php');
            break;
        case 'profile':
            require_once 'dashboard/profile.php';
            break;
        case 'contact':
            require_once 'views/contact.php';
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
        case 'add-user':
            require_once 'controllers/pages/addUser.php';
            break;
        case 'add-doctor':
            require_once 'controllers/pages/addDoctor.php';
            break;
        case 'add-major':
            require_once 'controllers/pages/addMajor.php';
            break;
        case 'edit-user':
            require_once 'controllers/pages/editUser.php';
            break;
        case 'edit-doctor':
            require_once 'controllers/pages/editDoctor.php';
            break;
        case 'edit-major':
            require_once 'controllers/pages/editMajor.php';
            break;
        case 'addUse':
            require_once 'controllers/addUse.php';
            break;
        case 'addDoc':
            require_once 'controllers/addDoc.php';
            break;
        case 'addMaj':
            require_once 'controllers/addMaj.php';
            break;
        case 'deleteUse':
            require_once 'controllers/deleteUser.php';
            break;
        case 'deleteDoc':
            require_once 'controllers/deleteDoctor.php';
            break;
        case 'deleteMaj':
            require_once 'controllers/deleteMajor.php';
            break;
        case 'patients':
            require_once 'controllers/patients.php';
            break;
        default:
            require_once 'dashboard/view.php';
    }
} else {
    require_once 'dashboard/view.php';
} ?>
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