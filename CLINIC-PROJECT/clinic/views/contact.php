<?php
$title = 'Contact';
require_once "includes/header.php";
require_once "includes/nav.php";
?>
<div class="content-wrapper">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="<?=Functions::url('index.php')?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>
    <!-- Content Header (Page header) -->
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
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body row">
                <div class="col-5 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <h2>Contact<strong>Us</strong></h2>
                        <p class="lead mb-5">
                            Phone: +1 234 56789012
                        </p>
                    </div>
                </div>
                <div class="col-7">
                    <form class="form-group border p-3" action="<?= Functions::url('index.php?page=contact-us') ?>" method="post">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" name="name"  class="form-control" />
                                <span class="text-danger"><?= $_SESSION['errors']['name'] ?? ""; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">E-Mail</label>
                                <input type="email" id="inputEmail" name="email" class="form-control" />
                                <span class="text-danger"><?= $_SESSION['errors']['email'] ?? ""; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="inputSubject">Subject</label>
                                <input type="text" id="inputSubject" name="subject" class="form-control" />
                                <span class="text-danger"><?= $_SESSION['errors']['subject'] ?? ""; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Message</label>
                                <textarea id="inputMessage" class="form-control" name="message" rows="4"></textarea>
                                <span class="text-danger"><?= $_SESSION['errors']['message'] ?? ""; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Send message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<?php
unset($_SESSION['errors']);
require_once "includes/footer.php" ?>