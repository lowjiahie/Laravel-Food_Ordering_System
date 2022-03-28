<!-- staff.master.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Custom fonts for this template-->
        <link href="{{ asset('sbadmin2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css' ) }}" rel="stylesheet">

        <!-- Default Bootstrap 5 styles-->
        <!--<link href="{{ asset('css/app.css' ) }}" rel="stylesheet">-->
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <svg t="1646128084418" class="d-inline-block align-text-top" viewBox="0 0 1612 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5134" width="50" height="50"><path d="M775.91073 915.593705c126.132189 0 260.541345-57.133047 355.4701-184.363948 7.690987-0.073247 19.337339-1.025465 37.136481-3.51588 56.840057-7.983977 173.303577-53.83691 220.621459-85.772818 30.031474-20.289557 81.231474-64.970529 101.960515-106.721602 15.601717-31.423176 29.006009-73.686981 23.439199-114.046352C1508.898426 380.813734 1484.726753 274.311874 1374.78226 260.248355c-54.789127-7.03176-92.145351-2.124177-115.877539 4.541345-0.219742-18.311874-0.87897-37.063233-1.904435-56.254077C1184.705007 278.340486 996.605436 328.148784 775.91073 328.148784S367.043205 278.340486 294.821173 208.462375C266.987124 709.47525 536.318169 915.593705 775.91073 915.593705zM1254.583119 377.517597c35.158798-28.420029 97.199428-63.945064 160.485265-30.177969 24.611159 13.111302 52.07897 53.763662 41.53133 105.842632-10.620887 52.07897-72.441774 109.065522-120.931617 132.065236-47.830615 22.706724-100.495565 30.104721-139.023748 32.082403C1225.723605 549.942203 1246.159657 470.322175 1254.583119 377.517597z" p-id="5135" fill="#997652"></path><path d="M0 987.376252c0 36.623748 36.623748 36.623748 36.623748 36.623748l1538.197425 0c0 0 36.623748 0 36.623748-36.623748s-36.623748-36.623748-36.623748-36.623748l-1538.197425 0C36.623748 950.752504 0 950.752504 0 987.376252z" p-id="5136" fill="#997652"></path><path d="M299.802003 146.494993a6.5 2 0 1 0 952.217454 0 6.5 2 0 1 0-952.217454 0Z" p-id="5137" fill="#997652"></path></svg>
                    </div>
                    <div class="sidebar-brand-text mx-2">Hǎinán Kopitiam</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Heading -->
                <div class="sidebar-heading mt-3">
                    ADMIN PANEL
                </div>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Nav Item - User Management -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-users"></i>
                        <span>User Management</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="userOne" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">User Functions :</h6>
                            <a class="collapse-item" href="#">1</a>
                            <a class="collapse-item" href="#">2</a>
                            <a class="collapse-item" href="#">3</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Food and Beverage -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-utensils"></i>
                        <span>F&B Management</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="foodTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">F&B functions:</h6>
                            <a class="collapse-item" href="#">Dish</a>
                            <a class="collapse-item" href="/beverageManagement">Beverages</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Order Management -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-receipt"></i>
                        <span>Order Management</span>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="orderThree" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Order Functions :</h6>
                            <a class="collapse-item" href="#">1</a>
                            <a class="collapse-item" href="#">2</a>
                            <a class="collapse-item" href="#">3</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Forum Management -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                        <i class="fas fa-comments"></i>
                        <span>Forum Management</span>
                    </a>
                    <div id="collapseSix" class="collapse" aria-labelledby="forumSix" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Forum Functions :</h6>
                            <a class="collapse-item" href="#">My Post</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Table Management -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-border-all"></i>
                        <span>Table Management</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="tableFour" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Table Functions :</h6>
                            <a class="collapse-item" href="#">1</a>
                            <a class="collapse-item" href="#">2</a>
                            <a class="collapse-item" href="#">3</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Delivery -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                        <i class="fas fa-truck"></i>
                        <span>Delivery Handle</span>
                    </a>
                    <div id="collapseFive" class="collapse" aria-labelledby="deliveryFive" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Delivery Functions :</h6>
                            <a class="collapse-item" href="#">1</a>
                            <a class="collapse-item" href="#">2</a>
                            <a class="collapse-item" href="#">3</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                                 alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                                problem I've been having.</div>
                                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                                 alt="...">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">I have the photos that you ordered last month, how
                                                would you like them sent to you?</div>
                                            <div class="small text-gray-500">Jae Chun · 1d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                                 alt="...">
                                            <div class="status-indicator bg-warning"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Last month's report looks great, I am very happy with
                                                the progress so far, keep up the good work!</div>
                                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                 alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                                told me that people say this to all dogs, even if they aren't good...</div>
                                            <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">LOW JIA HIE</span>
                                    <svg t="1646250226251" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6301" width="32" height="32"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667z m0 160c70.4 0 128 57.6 128 128s-57.6 128-128 128-128-57.6-128-128 57.6-128 128-128z m236.8 507.733333c-23.466667 32-117.333333 100.266667-236.8 100.266667s-213.333333-68.266667-236.8-100.266667c-8.533333-10.666667-10.666667-21.333333-8.533333-32 29.866667-110.933333 130.133333-187.733333 245.333333-187.733333s215.466667 76.8 245.333333 187.733333c2.133333 10.666667 0 21.333333-8.533333 32z" p-id="6302" fill="#515151"></path></svg>                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        @auth
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endauth

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('sbadmin2/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('sbadmin2/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('sbadmin2/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>
    </body>
</html>
