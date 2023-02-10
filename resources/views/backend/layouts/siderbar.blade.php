<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('backend')}}/images/admin.jpg" class="" alt="User Image"><a href="{{ route('admin.index') }}"></a>
        </div> 
        <div class="pull-left info">
          <p>Phan Thuy</p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
  
      <ul class="sidebar-menu" data-widget="tree">
  
        <li>
          <a href="menu.html">
            <i class="fa fa-th"></i> <span>Quản lý Menu </span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">FE</small>
            </span>
          </a>
        </li>
   
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Quản lý danh muc</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i> Product</a></li>
            <li><a href="{{ route('order.index') }}"><i class="fa fa-circle-o"></i> Order</a></li>
          </ul>
        </li>
        <li>
          <a href="">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span> 
          </a>
        </li>
  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>