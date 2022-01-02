<?= $this->extend("admin/layout") ?>

<?= $this->section("content") ?>

<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tạo mới sản phẩm
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
            <h3 class="box-title">Tạo mới sản phẩm</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/taosanpham" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="id_cat">ID danh mục</label>
                <input type="text" class="form-control" name="id_cat" id="id_cat" placeholder="Nhập tên ID danh mục">
              </div>
              <div class="form-group">
                <label for="tensanpham">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensanpham" id="tensanpham" placeholder="Nhập tên sản phẩm">
              </div>
              <div class="form-group">
                <label for="gia">Giá</label>
                <input type="text" class="form-control" name="gia" id="gia" placeholder="Nhập tên danh mục">
              </div>
              <div class="form-group">
                <label for="mota">Mô tả</label>
                <input type="text" class="form-control" name="mota" id="mota" placeholder="Mô tả">
              </div>
              <div class="form-group">
                <label for="hinhanh">Hình ảnh</label>
                <input type="file" name="hinhanh" id="hinhanh" class="form-control">
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