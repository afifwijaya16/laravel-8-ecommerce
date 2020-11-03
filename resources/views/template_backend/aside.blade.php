 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                    <a href="{{ route('category.index')}}" class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}">
                        <i class="far fa-edit nav-icon"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index')}}" class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                        <i class="fa fa-laptop nav-icon"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-item @if(!empty($dataTransaction)) menu-open @endif">
                    <a href="#" class="nav-link @if(!empty($dataTransaction)) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Transaction
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.order.index') }}" class="nav-link {{ request()->is('admin/order*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-file"></i>
                                <p>Order</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sales.index') }}" class="nav-link {{ request()->is('admin/sales*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-file"></i>
                                <p>Sales</p>
                            </a>
                        </li>
                    </ul>
                </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
