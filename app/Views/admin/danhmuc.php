<?= $this->extend("admin/layout") ?>

<?= $this->section("content") ?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh mục
            <small>Quản lý danh mục</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Danh mục</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh mục</h3>
                        <div class="box-tools">
                            <button class="btn btn-success btn-lg pull-right" onclick="window.location.replace('/admin/taodanhmuc');">Tạo mới danh mục</button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>

                            <?php foreach ($rows as $row) : ?>
                                <tr>
                                    <td><?= $row->id ?></td>
                                    <td><?= $row->TenDanhMuc ?></td>
                                    <td><?= $row->MoTa ?></td>
                                    <td>
                                        <div class="btn-group"><button class="btn btn-warning"><i class="fa fa-pencil"></i></button></div>
                                        <div class="btn-group"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->


<?= $this->endSection() ?>