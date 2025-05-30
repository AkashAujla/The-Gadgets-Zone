<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
      <li class="header">MANAGE</li>
      <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products.php"><i class="fa fa-circle-o"></i> Product List</a></li>
          <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
		   <li><a href="products.php"><i class="fa fa-circle-o"></i> Return</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<style>
.user-panel {
  position: relative;
  width: 100%;
  padding: 10px;
  overflow: hidden;
  .clearfix();
  > .image > img {
    width: 100%;
    max-width: 45px;
    height: auto;
  }
  > .info {
    padding: 5px 5px 5px 15px;
    line-height: 1;
    position: absolute;
    left: 55px;
    > p {
      font-weight: 600;
      margin-bottom: 9px;
    }
    > a {
      text-decoration: none;
      padding-right: 5px;
      margin-top: 3px;
      font-size: 11px;
      > .fa,
      > .ion,
      > .glyphicon {
        margin-right: 3px;
      }
    }
  }
}

// Sidebar menu
.sidebar-menu {
  list-style: none;
  margin: 0;
  padding: 0;
  //First Level
  > li {
    position: relative;
    margin: 0;
    padding: 0;
    > a {
      padding: 12px 5px 12px 15px;
      display: block;
      > .fa,
      > .glyphicon,
      > .ion {
        width: 20px;
      }
    }
    .label,
    .badge {
      margin-right: 5px;
    }
    .badge {
      margin-top: 3px;
    }
  }
  li.header {
    padding: 10px 25px 10px 15px;
    font-size: 12px;
  }
  li > a > .fa-angle-left,
  li > a > .pull-right-container > .fa-angle-left {
    width: auto;
    height: auto;
    padding: 0;
    margin-right: 10px;
    .transition(transform .5s ease);
  }
  li > a > .fa-angle-left {
    position: absolute;
    top: 50%;
    right: 10px;
    margin-top: -8px;
  }

  .menu-open {
    > a > .fa-angle-left,
    > a > .pull-right-container > .fa-angle-left {
      .rotate(-90deg);
    }
  }
  .active > .treeview-menu {
    display: block;
  }
}

</style>