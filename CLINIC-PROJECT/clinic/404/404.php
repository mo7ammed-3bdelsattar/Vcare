<?php require_once "includes/header.php";
require_once "includes/nav.php";?>
<section class="content">
      <div class="error-page">
        <h2 class="headline text-danger"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="<?=Functions::url('index.php')?>">return to home</a>
          </p>

         
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <?php require_once "includes/footer.php";?>
    