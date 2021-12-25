<?= $this->extend("admin/layout") ?>

<?= $this->section("content") ?>

<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tạo mới danh mục
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
            <h3 class="box-title">Tạo mới danh mục</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/taodanhmuc" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="tendanhmuc">Tên danh mục</label>
                <input type="text" class="form-control" name="tendanhmuc" id="tendanhmuc" placeholder="Nhập tên danh mục">
              </div>
              <div class="form-group">
                <label for="mota">Mô tả</label>
                <input type="text" class="form-control" name="mota" id="mota" placeholder="Mô tả">
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