<?php
 require_once "../classes/Header.php";

 $header=new Header();
 echo $header->getHeader('Doctor');

?>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="../index.php" >VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button" href="../index.php">Home</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../majors.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="./index.php">Doctors</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../login.php">login</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">doctors</li>
                </ol>
            </nav>
            <div class="doctors-grid">
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php"  class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php"  class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php"  class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                        <h6 class="card-title fw-bold text-center">Major</h6>
                        <a href="./doctor.php" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>


            </div>
            <nav class="mt-5" aria-label="navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link page-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                < </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link page-next" href="#" aria-label="Next">
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
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
                    <a href="../index.php" class="link text-white">Home</a>
                    <a href="../majors.php" class="link text-white">Majors</a>
                    <a href="./index.php"  class="link text-white">Doctors</a>
                    <a href="../login.php"  class="link text-white">Login</a>
                    <a href="../register.php" class="link text-white">Register</a>
                    <a href="../contact.php" class="link text-white">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>