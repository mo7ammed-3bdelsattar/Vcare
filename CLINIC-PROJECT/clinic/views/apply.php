<?php
$title = 'Contact';
require_once "includes/header.php";
require_once "includes/nav.php";
require_once "classes/Functions.php";
$result = $db->gitAll('majors');
$majorSelect = $db->fetchAssoc($result);
?>
<div class="content-wrapper">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Aplly</li>
        </ol>
    </nav>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <?php if (isset($_SESSION['success'])) :
            echo "<script>
                Swal.fire({
                title: 'Welcome!',
                text: ' $_SESSION[success]',
                icon: 'success'
                });
                </script>";
            unset($_SESSION['success']);
        endif;
        ?>
        <!-- Default box -->
        <div class="card">
            <div class="card-body row">
                <div class="col-5 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <h2>Admin<strong>LTE</strong></h2>
                        <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                            Phone: +1 234 56789012
                        </p>
                    </div>
                </div>
                <div class="col-7">
                    <form class="form-group border p-3" action="<?= Functions::url('index.php?page=apply-store') ?>" method="post">
                        <div class="mb-3">
                            <div class="form-group mb-3">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" id="inputName" class="form-control" />
                                <span class="text-danger"><?= $_SESSION['errors']['name'] ?? ""; ?></span>

                            </div>
                            <div class="form-group mb-3">
                                <label for="inputEmail">E-Mail</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" />
                                <span class="text-danger"><?= $_SESSION['errors']['email'] ?? ""; ?></span>

                            </div>
                            <div class="form-group mb-3">
                                <label for="inputSubject">Phone</label>
                                <input type="text" name="phone" id="inputPhone" class="form-control" />
                                <span class="text-danger"><?= $_SESSION['errors']['phone'] ?? ""; ?></span>

                            </div>
                            <div class="form-group mb-3">
                                <label for="inputMessage">Image</label>
                                <input type="text" name="image" id="inputimage" class="form-control" />
                                <span class="text-danger"><?= $_SESSION['errors']['image'] ?? ""; ?></span>

                            </div>
                            <div class="form-group mb-3">
                                <label for="inputMessage">Major</label>
                                <select class="form-control select2bs4" name="major" id="mySelect">
                                    <option value="<?= $majorSelect['id'] ?>"><?= $majorSelect['title'] ?></option>
                                    <?php while ($major = $db->fetchAssoc($result)): ?>
                                        <option value="<?= $major['id'] ?>"><?= $major['title'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <span class="text-danger"><?= $_SESSION['errors']['major'] ?? ""; ?></span>
                            </div>
                            <div class="form-group mb-3 py-3">
                                <input type="submit" class="btn btn-primary" value="Send message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </section>
    <!-- /.content -->
</div>

<?php
unset($_SESSION['errors']);
require_once "includes/footer.php" ?>