<?= $this->extend("admin/layout") ?>

<?= $this->section("content") ?>

<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Đơn hàng
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Đơn hàng</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Đơn hàng</h3>
            <div class="box-tools">
              <button class="btn btn-success btn-lg pull-right" onclick="window.location.replace('/admin/nhaphoadon');">Nhập đơn hàng</button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>ID Hóa đơn</th>
                <th>Ngày nhập</th>
                <th>Số lượng</th>
                <th>Tổng số tiền</th>
              </tr>

              <?php foreach ($rows as $row) : ?>
                <tr>
                  <td><?= $row->id ?></td>
                  <td><?= $row->idHoadon ?></td>
                  <td><?= $row->NgayNhap ?></td>
                  <td><?= $row->SoLuong ?></td>
                  <td><?= $row->TongSoTien ?></td>
                  <td>
                    <div class="btn-group"><button class="btn btn-warning" onclick="window.location.replace('/admin/suadanhmuc/<?= $row->id ?>');"><i class="fa fa-pencil"></i></button></div>
                    <div class="btn-group"><button class="btn btn-danger" data-toggle="modal" data-target="#delModal"><i class="fa fa-trash-o"></i></button></div>
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