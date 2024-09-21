<?php
$title = 'Home';
require_once 'includes/header.php';
$db = new Database();
$fun = new Functions();
$conn = $db->connection('clinc');


    $sql="SELECT `visitors`.* ,`doctors`.`id` AS doc_id ,`doctors`.`price`
    FROM `visitors` INNER JOIN `doctors` ON  `doctors`.`id`=`visitors`.`doctor_id`";
    $result=$db->query($conn,$sql);
    $sales=0;
    while($visitor=$db->fetchAssoc($result)){
        $sales=$sales+$visitor['price'];
    }
    $sql="SELECT `books`.* ,`doctors`.`id` AS doc_id ,`doctors`.`name` AS doc_name 
    FROM `books` INNER JOIN `doctors` ON  `doctors`.`id`=`books`.`doctor_id`";
    $result1=$db->query($conn,$sql);
    // $fun->dd(mysqli_error($conn));


    $sql="SELECT * FROM `users` ORDER BY `id` ASC LIMIT 4";
$result2 = $db->query($conn,$sql);
$members = $db->totalRows('users');
$visitors = $db->totalRows('visitors');


?>
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php require_once 'includes/nav.php' ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= Functions::urlAdmin('index.php') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Visitors</span>
                                <span class="info-box-number"><?= $visitors ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number"><?= $sales ?> LE</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Members</span>
                                <span class="info-box-number"><?= $members ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>


                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Books</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($book=$db->fetchAssoc($result1)):
                                        if($book['status']=='pending'){
                                            $color='warning';
                                        }elseif($book['status']=='visited'){
                                            $color='success';
                                        }else{
                                            $color='danger';
                                        }
                                        ?>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html"><?=$book['id']?></a></td>
                                        <td><?=$book['name']?></td>
                                        <td><span class=""><?=$book['doc_name']?></span></td>
                                        <td><span class="badge badge-<?=$color?>"><?=$book['status']?></span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?=$book['date']?></div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Book</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
                <div class="row">

                    <div class="col-md-6">
                        <!-- USERS LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Latest Members</h3>

                                <div class="card-tools">
                                    <span class="badge badge-danger"><?= $members ?> New Members</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                    <?php while($user=$db->fetchAssoc($result2)):?>
                                    <li>
                                        <img src="../<?= $user['image'] ?>" alt="User Image">
                                        <a class="users-list-name" href="#"><?= $user['name'] ?></a>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="<?= Functions::urlAdmin('index.php?page=users') ?>">View All Users</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->

    <?php require_once "includes/footer.php"; ?>