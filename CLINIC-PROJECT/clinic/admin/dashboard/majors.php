<?php
$title = 'majors';
require_once 'includes/header.php';
require_once 'includes/nav.php';

$result=$db->gitAll('majors');

?>
  <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success text-center">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['errors'])) : ?>
        <div class="alert alert-danger text-center">
            <?php
            echo $_SESSION['errors'];
            unset($_SESSION['errors']);
            ?>
        </div>
    <?php endif; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Majors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= Functions::urlAdmin('index.php') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Majors</li>
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
                    <h3 class="card-title">Majors</h3>

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
                                    <th>Major ID</th>
                                    <th>Title</th>
                                    <th>image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($major = $db->fetchAssoc($result)) : ?>
                                <tr>
                                    <td><a href=""></a><?= $major['id'] ?></td>
                                    <td><?= $major['title'] ?></td>
                                    <td>../<?= $major['image'] ?></td>
                                    <td><a href="<?= Functions::urlAdmin('index.php?page=edit-major&id=').$major['id']  ?>" class="btn btn-info">
                                            <i class="fa fa-fw fa-edit text-dark "></i></a></td>
                                    <td><a href="<?= Functions::urlAdmin('index.php?page=deleteMaj&id=').$major['id']  ?>" data-confirm="Are you sure to delete this item?" class=" delete btn btn-danger ">
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
                    <a href="<?= Functions::urlAdmin('index.php?page=add-major') ?>" class="btn btn-sm btn-info float-left">Place New Major</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </section>

</div>

<?php require_once 'includes/footer.php';
?>