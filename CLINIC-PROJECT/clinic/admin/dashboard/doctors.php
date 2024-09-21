<?php
$title = 'Doctors';
require_once 'includes/header.php';
require_once 'includes/nav.php';


$sql = "SELECT `doctors`.* , `majors`.`id` AS maj_id ,`majors`.`title` FROM 
`doctors` INNER JOIN `majors` ON `majors`.`id`=`doctors`.`major_id`
";
$result=$db->query($conn,$sql);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Doctors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= Functions::urlAdmin('index.php') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Doctors</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Doctors</h3>

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
                                    <th>Doctor ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Major Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($doctor = $db->fetchAssoc($result)) : ?>
                                <tr>
                                        <td><a href="#"><?= $doctor['id'] ?></a></td>
                                        <td><?= $doctor['name'] ?></td>
                                        <td><?= $doctor['email'] ?></td>
                                        <td><?= $doctor['phone'] ?></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?= $doctor['title'] ?></div>
                                        </td>
                                        <td><a href="<?=Functions::urlAdmin('index.php?page=edit-doctor&id=').$doctor['id']?>" class="btn btn-info">
                                                <i class="fa fa-fw fa-edit text-dark "></i></a></td>
                                        <td><a href="<?= Functions::urlAdmin('index.php?page=deleteDoc&id=').$doctor['id']  ?>" data-confirm="Are you sure to delete this item?" class=" delete btn btn-danger ">
                                                <i class="fa fa-fw fa-trash text-dark "></i></a></td>
                                    
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="<?= Functions::urlAdmin('index.php?page=add-doctor') ?>" class="btn btn-sm btn-info float-left">Place New Doctor</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </section>


</div>


<?php require_once 'includes/footer.php';
?>