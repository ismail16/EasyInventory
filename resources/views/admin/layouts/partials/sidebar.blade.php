<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('backend_assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar"> 
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.supplier') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Suppliers</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.category') }}" class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.warehouse') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p> Warehouse</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.supplier_invoice') }}" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Suppliers Invoice</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Expired Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-minus"></i>
                        <p>
                            Dead Stock
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Customers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Invoice
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Expenses
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Expense Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Expense Type</p>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Expenses Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Expenses Invoice</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Paid Expenses Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Unpaid Expenses Invoice</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-money-bill-alt"></i>
                        <p>
                            Loan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Loaner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Loaner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Loan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Loan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Staff
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Staff</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Staff</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-plus-circle"></i>
                                <p> Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link ml-2">
                                <i class="fas fa-tools"></i>
                                <p> Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Documentation
                        </p>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</aside>