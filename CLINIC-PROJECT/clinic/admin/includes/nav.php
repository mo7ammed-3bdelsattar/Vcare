
<?php 
  $db=new Database();
  $admin=$db->getRow('users',$_SESSION['auth']['id']);


  $result=$db->gitAll('contact_us');
  $numOfContact=$db->totalRows('contact_us');
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= Functions::urlAdmin('index.php') ?>" class="nav-link">View</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= Functions::url('index.php') ?>" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?= $numOfContact ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php while ($contact = $db->fetchAssoc($result)) : ?>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../assets/images/users/00.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?=$contact['name']?>
                </h3>
                <p class="text-sm"><?=$contact['message']?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <?php endwhile; ?>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= Functions::urlAdmin('index.php') ?>" class="brand-link">
            <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../<?= $admin['image'] ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= Functions::urlAdmin('index.php?page=profile') ?>" class="d-block"><?= $admin['name'] ?></a>
                </div>
            </div>

            
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview ">
                            <li class="nav-item " >
                                <a href="<?= Functions::urlAdmin('index.php?page=doctors') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Doctors</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?= Functions::urlAdmin('index.php?page=majors') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Majors</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?= Functions::urlAdmin('index.php?page=users') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
        <!-- /.sidebar -->
    </aside>