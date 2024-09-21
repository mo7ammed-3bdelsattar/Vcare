<?php
require_once "classes/Functions.php";
require_once "classes/Database.php";
$db = new Database();
$conn = $db->connection('clinc');
$result1 = $db->gitAll('info');
$info=$db->fetchAll($result1);
?>

<footer class="container-fluid bg-blue text-white py-3">
    <div class="row gap-2">

        <div class="col-sm order-sm-1">
            <h1 class="h1"><?=$info[2]['title'] ?></h1>
            <p><?=$info[2]['description'] ?></p>
        </div>
        <div class="col-sm order-sm-2">
            <h1 class="h1">Links</h1>
           
            <div class="links d-flex gap-2 flex-wrap">
                <?php if(!isset($_SESSION['auth']) || $_SESSION['auth']['type']!='doctor'): ?>
                <a href="<?= Functions::url('index.php?page=home') ?>" class="link text-white">Home</a>
                <a href="<?= Functions::url('index.php?page=majors') ?>" class="link text-white">Majors</a>
                <a href="<?= Functions::url('index.php?page=doctors') ?>" class="link text-white">Doctors</a>
                <a href="<?= Functions::url('index.php?page=login') ?>" class="link text-white">Login</a>
                <a href="<?= Functions::url('index.php?page=register') ?>" class="link text-white">Register</a> 
                <a href="<?= Functions::url('index.php?page=apply') ?>" class="link text-white">Apply</a> 
                <?php endif; ?>
                <a href="<?= Functions::url('index.php?page=contact') ?>" class="link text-white">Contact</a>
            </div>
            
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/scripts/home.js"></script>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<script src="assets/dist/js/demo.js"></script>
<script>
    const stars = document.querySelectorAll(".star");

    stars.forEach((star, index) => {
        star.addEventListener("click", () => {
            const isActive = star.classList.contains("active");
            if (isActive) {
                star.classList.remove("active");
            } else {
                star.classList.add("active");
            }
            for (let i = 0; i < index; i++) {
                stars[i].classList.add("active");
            }
            for (let i = index + 1; i < stars.length; i++) {
                stars[i].classList.remove("active");
            }
        });
    });
</script>

</body>

</html>