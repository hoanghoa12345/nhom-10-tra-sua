<?= $this->extend("admin/layout") ?>

<?= $this->section("content") ?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản phẩm
            <small>Quản lý sản phẩm</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/home/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">SanPham</h3>
                        <div class="box-tools">
                            <button class="btn btn-success btn-lg pull-right" onclick="window.location.replace('/admin/taosanpham');">Tạo mới sản phẩm</button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Danh mục</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá (VND)</th>
                                <th>Mô tả</th>
                                <th>Hình ảnh</th>
                                <th>Thao tác</th>
                            </tr>

                            <?php if (sizeof($rows) > 0) : ?>
                                <?php foreach ($rows as $row) : ?>
                                    <tr>
                                        <td><?= $row->id ?></td>
                                        <?php foreach ($ds as $dd) {

                                        ?>
                                                <?php if ($dd->id == $row->id_cat) {
                                                ?>
                                                    <td><?php echo $dd->TenDanhMuc; ?></td>
                                                <?php
                                                } ?>
                                        <?php
                                        }
                                        ?>
                                        <td><?= $row->TenSanPham ?></td>
                                        <td><?= $row->Gia ?></td>
                                        <td><?= $row->MoTa ?></td>
                                        <td><img src="/uploads/<?= $row->HinhAnh ?>" alt="" height="100"></td>
                                        <td>
                                            <div class="btn-group"><button class="btn btn-warning" onclick="window.location.replace('/admin/suasanpham/<?= $row->id ?>');"><i class="fa fa-pencil"></i></button></div>
                                            <div class="btn-group"><button class="btn btn-danger" data-toggle="modal" data-target="#delModal"><i class="fa fa-trash-o"></i></button></div>

                                            <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="modalLabel">Xóa sản phẩm</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            Xóa <?= $row->TenSanPham ?>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" onclick="window.location.replace('/admin/xoasanpham/<?= $row->id ?>');" class="btn btn-danger" data-dismiss="modal">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?= $this->endSection() ?>