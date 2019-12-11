<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <router-link to="/dashboard" class="nav-link bg-light mr-2">
               <i class="nav-icon far fa-file-alt text-warning"></i> Documentation
            </router-link>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <router-link to="/dashboard" class="nav-link bg-light mr-2 ">
                <i class="nav-icon fas fa-cogs text-danger"></i> Setting
            </router-link>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <router-link to="/dashboard" class="nav-link bg-light">
               <i class="fas fa-chart-line text-success"></i> Reports
            </router-link>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="#" class="_dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <img src="https://www.searchpng.com/wp-content/uploads/2019/02/Deafult-Profile-Pitcher.png" class="user-image" alt="User Image" width="30" style="margin: 5px 10px 0px 10px;">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                     <img src="https://www.searchpng.com/wp-content/uploads/2019/02/Deafult-Profile-Pitcher.png" width="100" class="img-circle" alt="User Image">
                    <p>
                        Alexander Pierce - Web Developer
                        <small>Member since Nov. 2012</small>
                    </p>
                </span>
                <div class="dropdown-divider"></div>
                <div class="container">
                    <div class="row">
                        <div class="d-flex justify-content-start" style="width: 50%">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="d-flex justify-content-end" style="width: 50%">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="_display: none;">
                                @csrf
                                <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link text-red font-weight-bold" data-toggle="dropdown" href="#">
                LN<i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0">
                <a href="#" class="dropdown-item active">
                    <i class="flag-icon flag-icon-us mr-2"></i> English
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-de mr-2"></i> German
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-fr mr-2"></i> French
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-es mr-2"></i> Spanish
                </a>
            </div>
        </li>

    </ul>
</nav>
