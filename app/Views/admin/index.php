<?= $this->extend("admin/layout") ?>

<?= $this->section("content") ?>

<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/home/index"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Trang chủ</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
              <?= $totalProduct ?>
            </h3>
            <p>
              Sản phẩm
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/admin/sanpham" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
              <?= $totalCategories ?>
            </h3>
            <p>
              Danh mục
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/admin/danhmuc" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
              <?= $totalOrder?>
            </h3>
            <p>
              Đơn hàng
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-ios7-cart-outline"></i>
          </div>
          <a href="/admin/donhang" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->

  </section><!-- /.content -->
</aside><!-- /.right-side -->

<?= $this->endSection() ?>