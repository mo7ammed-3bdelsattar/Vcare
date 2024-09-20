<?php
$title = 'Search';
require_once "includes/header.php";
$fun = new Functions;
if (isset($_GET['q'])) :
    $db = new Database();
    $conn = $db->connection('clinc');
    if (strlen($_POST['q']) > 0) {
        $q = $_POST['q'];
        $result = $db->search('doctors', 'name', $q);
        if ($db->numRows($result) > 0) {
            $doctor = $db->fetchAssoc($result);
            $fun->redirect('index.php?page=doctors&id=' . $doctor['id']);
        } else {
            $result = $db->search('majors', 'title', $q);
            if ($db->numRows($result) > 0) {
                $major = $db->fetchAssoc($result);
                $fun->redirect('index.php?page=majors&id=' . $major['id']);
            } else {
                $_SESSION['errors']['search'] = 'No result exists';
                $fun->redirect('index.php?page=search');
            }
        }
    } else {
        $_SESSION['errors']['search'] = 'No result exists';
        $fun->redirect('index.php?page=search');
    }



endif;
?>





<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid text-center">
            <h2 class="text-center display-4">Search</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="<?= Functions::url('index.php?page=search&q') ?>" method="POST">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" name="q" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <span class="text-danger text-center"><?= $_SESSION['errors']['search'] ?? ""; ?></span>
        </div>
    </section>
</div>
<?php unset($_SESSION['errors']); ?>








<!-- <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= Functions::url('index.php?page=doctors') ?>" method="GET" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
            <input type="hidden" class="form-control" id="inputModalSearch" name="page" value="shop">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div> -->