<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backendLTD/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3') }}"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backendLTD/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!--sale start-->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>
                            Sale
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sales.create') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Add Sale</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sales.index') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>View Sale</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--sale end-->

                <!--Purchase start-->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <p>
                            Purchase
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('purchases.create') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Add Purchase</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('purchases.index') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>View Purchase</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Purchase end-->

                <!--Product Start-->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-brands fa-product-hunt"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.create') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>View Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Product End-->

                <!--Customer Start-->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-layer-group"></i>
                        <p>
                            Customer
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customers.create') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Add Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>View Customer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Customer End-->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-truck-field"></i>
                        <p>
                            Supplier
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('suppliers.create') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Add Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('suppliers.index') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>View Supplier</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!--Configuration start-->
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-sliders"></i>
                        <p>
                            Configuration
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Category
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('category.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>View Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Sub Category
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('sub-categories.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Sub Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sub-categories.index') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>View Sub Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Manufacturer
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('manufacturer.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Manufacturer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manufacturer.index') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>View Manufacturer</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Unit
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('units.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Unit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('units.index') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>View Unit</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!--Configuration start-->

            </ul>
        </nav>
    </div>
</aside>
