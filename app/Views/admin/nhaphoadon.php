<?= $this->extend("admin/layout") ?>

<?= $this->section("content") ?>

<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Nhập hóa đơn
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Trang chủ</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="box-title">Chọn sản phẩm</div>
          </div>
          <form action="/admin/nhaphoadon" method="post" class="box-body table-responsive no-padding">
            <table class="table table-hover table-striped">
              <tr>
                <td>Check</td>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Size</th>
              </tr>

              <?php foreach ($rows as $row) : ?>
                <tr>
                  <td>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="sanpham[]" value="<?= $row->id ?>" />
                      </label>
                    </div>
                  </td>
                  <td><?= $row->id ?></td>
                  <td><?= $row->TenSanPham ?></td>
                  <td><?= $row->Gia ?><input type="hidden" class="form-control" name="dongia[]" value="<?= $row->Gia ?>" /></td>
                  <td>
                      <input type="text" class="form-control" name="soluong[]" placeholder="1" value="1" style="width: 100px;">
                  </td>
                  <td>
                    <div class="form-group">
                      <select class="form-control" name="size[]" id="size" style="width: 100px;">
                        <option value="S">S</option>
                        <option value="M" selected>M</option>
                        <option value="L">L</option>
                      </select>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
            <button class="btn btn-primary" type="submit">Nhập hóa đơn</button>
          </form>
        </div>
      </div>
    </div>
  </section><!-- /.content -->
</aside><!-- /.right-side -->

<?= $this->endSection() ?>