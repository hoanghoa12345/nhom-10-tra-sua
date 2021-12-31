<?php $active_menu = session('active_menu'); ?>
<ul class="sidebar-menu">
  <li class="<?php if($active_menu == "1") echo "active"; ?>">
    <a href="/admin/index">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>
  <li class="<?php if($active_menu == "2") echo "active"; ?>">
    <a href="/admin/sanpham">
      <i class="fa fa-list-alt"></i> <span>Sản phẩm</span>
    </a>
  </li>
  <li class="<?php if($active_menu == "3") echo "active"; ?>">
    <a href="/admin/danhmuc">
      <i class="fa fa-bookmark"></i> <span>Danh mục</span>
    </a>
  </li>
  <li class="<?php if($active_menu == "4") echo "active"; ?>">
    <a href="/admin/donhang">
      <i class="fa fa-inbox"></i> <span>Đơn hàng</span>
    </a>
  </li>
</ul>