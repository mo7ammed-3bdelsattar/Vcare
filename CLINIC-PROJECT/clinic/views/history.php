<<<<<<< HEAD:CLINIC-PROJECT/clinic/history.php
<?php require_once "classes/footer.php"?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
=======
<?php
 require_once "classes/Header.php";
>>>>>>> b34e86509f54d75932610235bcc374c21a7f2994:CLINIC-PROJECT/clinic/views/history.php

 $header=new Header();
 echo $header->getHeader(title: 'Hestory');

<<<<<<< HEAD:CLINIC-PROJECT/clinic/history.php
    <title>history</title>
</head>
<body>
=======
?>

>>>>>>> b34e86509f54d75932610235bcc374c21a7f2994:CLINIC-PROJECT/clinic/views/history.php
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="../index.php">VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button" href="../index.php">Home</a>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="../majors.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="../doctors/index.php">Doctors</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../login.php">login</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">history</li>
                </ol>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">major</th>
                        <th scope="col">location</th>
                        <th scope="col">completed</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>8/11/2023</td>
                        <td class="d-flex align-items-center gap-2"><img src="assets/images/major.jpg" alt="" width="25"
                                height="25" class="rounded-circle">
                            <a href="./doctors/doctor.php">hamada</a>
                        </td>
                        <td>bone</td>
                        <td><a href="https://www.google.com/maps" target="_blank">eraasoft</a></td>
                        <td>yes</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>8/11/2023</td>
                        <td class="d-flex align-items-center gap-2"><img src="assets/images/major.jpg" alt="" width="25"
                                height="25" class="rounded-circle">
                            <a href="./doctors/doctor.php">hamada</a>
                        </td>
                        <td>bone</td>
                        <td><a href="https://www.google.com/maps" target="_blank">eraasoft</a></td>
                        <td>no</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>8/11/2023</td>
                        <td class="d-flex align-items-center gap-2"><img src="assets/images/major.jpg" alt="" width="25"
                                height="25" class="rounded-circle">
                            <a href="./doctors/doctor.php">hamada</a>
                        </td>
                        <td>bone</td>
                        <td><a href="https://www.google.com/maps" target="_blank">eraasoft</a></td>
                        <td>no</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php $footer = new Footer();
    echo $footer->gitFooter();
    ?>