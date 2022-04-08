<!-- customer.master.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('sbadmin2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

        <style>
            .uper {
                margin-top: 50px;
            }
            .set-right{
                right: 0px;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <!-- Nav bar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container-md">
                    <!--Logo-->
                    <a class="navbar-brand" href="#">
                        <svg t="1646128084418" class="d-inline-block align-text-top" viewBox="0 0 1612 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5134" width="30" height="24"><path d="M775.91073 915.593705c126.132189 0 260.541345-57.133047 355.4701-184.363948 7.690987-0.073247 19.337339-1.025465 37.136481-3.51588 56.840057-7.983977 173.303577-53.83691 220.621459-85.772818 30.031474-20.289557 81.231474-64.970529 101.960515-106.721602 15.601717-31.423176 29.006009-73.686981 23.439199-114.046352C1508.898426 380.813734 1484.726753 274.311874 1374.78226 260.248355c-54.789127-7.03176-92.145351-2.124177-115.877539 4.541345-0.219742-18.311874-0.87897-37.063233-1.904435-56.254077C1184.705007 278.340486 996.605436 328.148784 775.91073 328.148784S367.043205 278.340486 294.821173 208.462375C266.987124 709.47525 536.318169 915.593705 775.91073 915.593705zM1254.583119 377.517597c35.158798-28.420029 97.199428-63.945064 160.485265-30.177969 24.611159 13.111302 52.07897 53.763662 41.53133 105.842632-10.620887 52.07897-72.441774 109.065522-120.931617 132.065236-47.830615 22.706724-100.495565 30.104721-139.023748 32.082403C1225.723605 549.942203 1246.159657 470.322175 1254.583119 377.517597z" p-id="5135" fill="#997652"></path><path d="M0 987.376252c0 36.623748 36.623748 36.623748 36.623748 36.623748l1538.197425 0c0 0 36.623748 0 36.623748-36.623748s-36.623748-36.623748-36.623748-36.623748l-1538.197425 0C36.623748 950.752504 0 950.752504 0 987.376252z" p-id="5136" fill="#997652"></path><path d="M299.802003 146.494993a6.5 2 0 1 0 952.217454 0 6.5 2 0 1 0-952.217454 0Z" p-id="5137" fill="#997652"></path></svg>
                        Hǎinán Kopitiam
                    </a>
                    <!--End Logo-->

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor01">

                        <!--Left side nav-bar - nav-link -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Food</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Dish</a>
                                    <a class="dropdown-item" href="#">Beverage</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Forum</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">My Post</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('Customer.Booking.add.viewAddBooking')}}">Booking</a>
                            </li>
                        </ul>
                        <!--End Left side nav-bar - nav-link -->

                        <!--Right side navbar - cart && user -->
                        <div class="set-right">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link position-relative" href="#">
                                        <svg t="1646286316804" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4887" width="28" height="28"><path d="M1024 447.792l-0.016-0.304a51.792 51.792 0 0 0-0.4-5.536c-0.064-0.64-0.176-1.28-0.272-1.92A48 48 0 0 0 980.064 400H48a48 48 0 1 0 0 96h42.528l102.912 411.664 0.144-0.032A47.904 47.904 0 0 0 240 944l0.256-0.016V944H784a47.888 47.888 0 0 0 46.4-36.4l0.16 0.032L933.472 496H976a48 48 0 0 0 48-48v-0.08-0.128zM368 800a48 48 0 1 1-96 0V544a48 48 0 1 1 96 0v256z m192 0a48 48 0 1 1-96 0V544a48 48 0 1 1 96 0v256z m192 0a48 48 0 1 1-96 0V544a48 48 0 1 1 96 0v256zM566.128 151.504L672.288 352h108.624L650.976 106.592l-0.176 0.096A47.824 47.824 0 0 0 608 80a48 48 0 0 0-48 48c0 8.544 2.4 16.448 6.336 23.392l-0.208 0.112z m-108.16 0l-0.272-0.144C461.584 144.416 464 136.528 464 128a48 48 0 0 0-48-48 47.856 47.856 0 0 0-42.784 26.64l-0.096-0.048L243.2 352h108.624l106.144-200.496z" p-id="4888" fill="#8a8a8a"></path></svg>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-3">
                                            99+
                                        </span>
                                    </a>
                                </li> 
                                <li class="nav-item dropdown">
                                    <a class="nav-link d-inline-flex ms-3" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="mr-2 pt-2 small">LOW JIA HIE</span>
                                        <svg t="1646278750138" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6511" width="32" height="32"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667z m0 160c70.4 0 128 57.6 128 128s-57.6 128-128 128-128-57.6-128-128 57.6-128 128-128z m236.8 507.733333c-23.466667 32-117.333333 100.266667-236.8 100.266667s-213.333333-68.266667-236.8-100.266667c-8.533333-10.666667-10.666667-21.333333-8.533333-32 29.866667-110.933333 130.133333-187.733333 245.333333-187.733333s215.466667 76.8 245.333333 187.733333c2.133333 10.666667 0 21.333333-8.533333 32z" p-id="6512" fill="#8a8a8a"></path></svg>                                
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="#">My Order</a>
                                        <a class="dropdown-item" href="{{route('Customer.Booking.list.RecentBooking')}}">My Bookings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">LogOut</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--End Right side navbar - cart && user -->

                    </div>
                </div>
            </nav>
            <!--End Nav bar -->
            <div class="container uper">
                @yield('content')
            </div>
        </div>
    </body>
</html>
