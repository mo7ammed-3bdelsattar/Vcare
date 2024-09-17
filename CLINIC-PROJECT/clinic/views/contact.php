<?php
$title = 'Contact';
require_once "includes/header.php";
require_once "includes/nav.php";
require_once "classes/Functions.php";
?>
<div class="content-wrapper">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

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
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" id="inputName" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" id="inputEmail" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Subject</label>
                        <input type="text" id="inputSubject" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Message</label>
                        <textarea id="inputMessage" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Send message">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<footer class="container-fluid bg-blue text-white py-3">
    <div class="row gap-2">

        <div class="col-sm order-sm-1">
            <h1 class="h1">About Us</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                laborum
                saepe
                enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                cum
                iure
                quod facere.</p>
        </div>
        <div class="col-sm order-sm-2">
            <h1 class="h1">Links</h1>
            <div class="links d-flex gap-2 flex-wrap">
                <a href="./index.php" class="link text-white">Home</a>
                <a href="./majors.php" class="link text-white">Majors</a>
                <a href="./doctors/index.php" class="link text-white">Doctors</a>
                <a href="./login.php" class="link text-white">Login</a>
                <a href="./register.php" class="link text-white">Register</a>
                <a href="./contact.php" class="link text-white">Contact</a>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>