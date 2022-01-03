<?= $this->extend("admin/layout") ?>

<?= $this->section("content") ?>

<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sửa sản phẩm #<?=$row->id?>
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

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Sửa sản phẩm</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/suasanpham/<?= $row->id ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="id_cat">Danh mục</label>
                <div class="form-group">
                  <select name="id_cat" class="form-control">
                    <?php
                      foreach($ds as $dd){
                    ?>
                      <option value="<?= $dd->id; ?>" <?php if($dd->id == $cat_id) echo "selected"; ?>><?= $dd->TenDanhMuc; ?></option>
                    <?php 
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="tensanpham">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensanpham" id="tensanpham" placeholder="Nhập tên sản phẩm" value="<?= $row->TenSanPham; ?>">
              </div>
              <div class="form-group">
                <label for="gia">Giá</label>
                <input type="text" class="form-control" name="gia" id="gia" placeholder="Nhập giá" value="<?= $row->Gia; ?>">
              </div>
              <div class="form-group">
                <label for="mota">Mô tả</label>
                <input type="text" class="form-control" name="mota" id="mota" placeholder="Mô tả" value="<?= $row->MoTa; ?>">
              </div>
              <div class="form-group">
                <label for="hinhanh">Hình ảnh</label>
                <input type="file" name="hinhanh" id="hinhanh" class="form-control">
                <img src="/uploads/<?=$row->HinhAnh;?>" alt="" height="100">
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
</aside><!-- /.right-side -->

<?= $this->endSection() ?>