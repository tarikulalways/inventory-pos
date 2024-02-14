<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('dashboard.view') }}"><img src="{{ asset('admin') }}/assets/img/icons/dashboard.svg"
                            alt="img"><span> Dashboard</span> </a>
                </li>
                {{-- product --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin') }}/assets/img/icons/product.svg"
                            alt="img"><span>
                            Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('create.category') }}">Add Category</a></li>
                        <li><a href="{{ route('index.category') }}">Category List</a></li>
                        <li><a href="{{ route('create.producct') }}">Add Product</a></li>
                        <li><a href="{{ route('index.producct') }}">Product List</a></li>
                    </ul>
                </li>
                {{-- product --}}

                {{-- sale --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin') }}/assets/img/icons/sales1.svg"
                            alt="img"><span> Sales</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('sale.create') }}">POS</a></li>
                        <li><a href="{{ route('index.invoice') }}">Sales List</a></li>
                    </ul>
                </li>
                {{-- sale --}}

                {{-- people --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin') }}/assets/img/icons/users1.svg"
                            alt="img"><span> People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('create.customer') }}">Add Customer </a></li>
                        <li><a href="{{ route('index.customer') }}">Customer List</a></li>
                        <li><a href="{{ route('create.supplier') }}">Add Supplier </a></li>
                        <li><a href="{{ route('index.supplier') }}">Supplier List</a></li>
                    </ul>
                </li>
                {{-- people --}}

                {{-- receive money --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin') }}/assets/img/icons/expense1.svg"
                            alt="img"><span>
                            Receive Money</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('create.customerMoney') }}">Get Money</a></li>
                        <li><a href="{{ route('index.customerMoney') }}">Get List Money</a></li>
                    </ul>
                </li>
                {{-- receive money --}}

                {{-- supplier payment --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin') }}/assets/img/icons/expense1.svg"
                            alt="img"><span>
                            Supplier Payment</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('create.smoney') }}">Get Money</a></li>
                        <li><a href="{{ route('index.smoney') }}">Get List Money</a></li>
                    </ul>
                </li>
                {{-- supplier payment --}}

                {{-- return --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin') }}/assets/img/icons/return1.svg"
                            alt="img"><span>
                            Return</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('create.return') }}">Add Sales Return </a></li>
                        <li><a href="{{ route('index.return') }}">Sales Return List</a></li>
                    </ul>
                </li>
                {{-- return --}}

                {{-- expensive --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin') }}/assets/img/icons/expense1.svg"
                            alt="img"><span>
                            Expense</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('create.expensive') }}">Add Expense</a></li>
                        <li><a href="{{ route('index.expensive') }}">Expense List</a></li>
                    </ul>
                </li>
                {{-- expensive --}}

                {{-- setting --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin') }}/assets/img/icons/settings.svg"
                            alt="img"><span>
                            Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('user.profile') }}">My Profile</a></li>
                    </ul>
                </li>
                {{-- setting --}}
            </ul>
        </div>
    </div>
</div>
