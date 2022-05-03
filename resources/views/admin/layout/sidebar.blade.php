<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
  <div class="brand-logo">
    <a href="{{ route('admin.account_user') }}">

      <h5 class="logo-text">Admin Pisolution</h5>
    </a>
  </div>
  <ul class="sidebar-menu do-nicescrol">
    <li class="sidebar-header">Main</li>
    <li>
    <a href="">
      <i class="zmdi zmdi-view-dashboard"></i> <span>Bảng điều khiển</span>
    </a>
    </li>
    <li>
      <a href="{{ route('admin.account_user') }}">
        
        <i class="zmdi zmdi-account-o"></i>
        <span>Người dùng</span>
        <i class="fa fa-angle-left float-right"></i>
      </a>
      <ul id="" class="sidebar-submenu">
        <li>
          <a href="{{ route('admin.account_user') }}">
            <span><i class="zmdi zmdi-long-arrow-right"></i>Danh sách tài khoản</span>
          </a>
        </li>
        
      </ul>
    </li>
    <li>
      <a>
        <i class="zmdi zmdi-folder-shared"></i> 
        <span>Dự án</span>
        <i class="fa fa-angle-left float-right"></i>
      </a>
      <ul id="" class="sidebar-submenu">
        <li>
          <a href="">
            <span><i class="zmdi zmdi-long-arrow-right"></i> Danh sách dự án</span>
          </a>
        </li>
        <li>
          <a href="">
            <span><i class="zmdi zmdi-long-arrow-right"></i> Thêm dự án</span>
          </a>
        </li>
        <li>
          <a href="">
            <span><i class="zmdi zmdi-long-arrow-right"></i> Danh mục dự án</span>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a>
        <i class="zmdi zmdi-calendar-note zmd-fw"></i>
        <span>Tin tức</span>
        <i class="fa fa-angle-left float-right"></i>
      </a>
      <ul id="" class="sidebar-submenu">
        <li>
          <a href="{{route('admin.listNews')}}">
            <span><i class="zmdi zmdi-long-arrow-right"></i> Danh sách tin tức</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.showAddNews')}}">
            <span><i class="zmdi zmdi-long-arrow-right"></i> Thêm tin tức</span>
          </a>
        </li>
        <li>
          <a href="">
            <span><i class="zmdi zmdi-long-arrow-right"></i> Danh mục tin tức</span>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="">
        <i class="zmdi zmdi-email"></i> <span>Thông tin liên hệ</span>
      </a>
    </li>
  </ul>

</div>
