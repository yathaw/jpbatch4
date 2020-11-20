<!DOCTYPE html>
<html lang="en">
    <head>

        <title> Shopules </title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Favicon-->
        <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

        <!-- iconfont CSS -->
        <link rel="stylesheet" type="text/css" href="icon/icofont/icofont.min.css">
        <!-- Boxicon CSS -->
        <link rel="stylesheet" type="text/css" href="icon/boxicons-master/css/boxicons.min.css">

        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="backend/css/main.css">
    </head>
    
    <body class="app sidebar-mini">

        <!-- Navbar-->
        <header class="app-header">
            <a class="app-header__logo" href="index.html">
                <img src="logo/logo_wh_transparent.png" style="width: 50px; height: 50px">
                Shopules
            </a>
            
            <!-- Sidebar toggle button-->
            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
                <i class="icofont-navigation-menu"></i>
            </a>
          
            <!-- Navbar Right Menu-->
            <ul class="app-nav">
                <li class="app-search">
                    <input class="app-search__input" type="search" placeholder="Search">
                    <button class="app-search__button">
                        <i class="icofont-search-2"></i>
                    </button>
                </li>

                <!-- User Menu-->
                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                        <i class="icofont-user-alt-3"></i>
                </a>
                  <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="page-user.html">
                            <i class="icofont-ui-user"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="page-login.html">
                            <i class="icofont-logout"></i>
                            Logout
                        </a>
                    </li>
                  </ul>
                </li>
            </ul>
        </header>


        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <aside class="app-sidebar">
            <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
                <div>
                  <p class="app-sidebar__user-name">John Doe</p>
                  <p class="app-sidebar__user-designation">Frontend Developer</p>
                </div>
            </div>
            
            <ul class="app-menu">
                
                <li>
                    <a class="app-menu__item" href="dashboard.html">
                        <i class="app-menu__icon icofont-dashboard"></i>
                        <span class="app-menu__label">
                            Dashboard
                        </span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="dashboard.html">
                        <i class="app-menu__icon icofont-prestashop"></i>
                        <span class="app-menu__label">
                            Order
                        </span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="dashboard.html">
                        <i class="app-menu__icon icofont-users-social"></i>
                        <span class="app-menu__label">
                            Customer
                        </span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="brand_list.php">
                        <i class="app-menu__icon icofont-ui-tag"></i>
                        <span class="app-menu__label">
                            Brands 
                        </span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="item_list.php">
                        <i class="app-menu__icon icofont-package"></i>
                        <span class="app-menu__label">
                            Items
                        </span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="subcategory_list.php">
                        <i class="app-menu__icon icofont-tags"></i>
                        <span class="app-menu__label">
                            Sub-Category 
                        </span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="category_list.php">
                        <i class="app-menu__icon icofont-tag"></i>
                        <span class="app-menu__label">
                            Category 
                        </span>
                    </a>
                </li>
            
                
            </ul>
        </aside>


        <main class="app-content">
            
            
        