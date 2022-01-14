<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Management</title>
    <link rel = "icon" href = "images/logo.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="app">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar col">
                        <div class="navbar-right">
                            <a class="navbar-right-link" href="{{route('dashboard')}}">
                                <img src="images/logo.png" alt="" style="width: 50px;">
                                Construction Management
                            </a>
                        </div>
                        <div href="{{route('logout')}}" class="user-navbar">
                            <i class="fas fa-user"></i>
                            {{Auth::user()->name}}<span class="navbar-left-icon"></span>
                            <ul class="user-navbar-list">
                                <a class="user-navbar-link" href="{{route('logout')}}">
                                <li class="user-navbar-item">Log out
                                    </li>
                                </a>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="container-fluid">
                <div class="row gx-0">
                    <div class="slidebar col-2">
                        <ul class="slidebar-list">
                            <a class="hiding-link" href="{{route('dashboard')}}">
                                <li class="slidebar-item">
                                    <i class="slidebar-item-icon fas fa-home"></i>
                                    <span class="slidebar-item-title">Dashboard</span>
                                </li>
                            </a>
                            <a class="hiding-link" href="{{route('employeelist')}}">
                                <li class="slidebar-item">
                                    <i class="slidebar-item-icon fas fa-users"></i>
                                    <span class="slidebar-item-title">Employee</span>
                                </li>
                            </a>
                            <a class="hiding-link" href="{{route('projectlist')}}">
                                <li class="slidebar-item">
                                    <i class="slidebar-item-icon fas fa-file"></i>
                                    <span class="slidebar-item-title">Project</span>
                                </li>
                            </a>
                            @if( Auth::user()->level == 1)
                            <a class="hiding-link" href="{{route('userlist')}}">
                                <li class="slidebar-item">
                                    <i class="slidebar-item-icon fas fa-user"></i>
                                    <span class="slidebar-item-title">Users</span>
                                </li>
                            </a>
                            @endif
                            @if( Auth::user()->level == 1 || Auth::user()->level == 2)
                            <li class="slidebar-setting slidebar-item">
                                <i class="slidebar-item-icon fas fa-cogs"></i>
                                <span class="slidebar-item-title" style="display: flex; align-items: center;">Settings<i
                                        class="fas fa-sort-down" style="margin: 0 0 6px 8px;"></i></span>
                            </li>
                            @endif
                            <ul class="slidebar-hiding-js slidebar-hiding">
                                <a class="hiding-link" href="{{route('positionlist')}}">
                                        <li class="hiding-item">
                                        <i class="slidebar-item-icon fas fa-paste"></i>
                                        Position
                                    </li>
                                </a>
                                <a class="hiding-link" href="{{route('divisionlist')}}">
                                        <li class="hiding-item">
                                        <i class="slidebar-item-icon fas fa-tasks"></i>
                                        Division
                                    </li>
                                </a>
                            </ul>
                        </ul>
                        <div class="slidebar-collapse-wrap">
                            <div class="slidebar-collapse">
                                <div class="sliderbar-collapse-left fas fa-chevron-left"></div>
                            </div>
                        </div>
                    </div>

                    <div class="content col-10">
                        @yield('content')
                        <div class="my-toast">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                <div class="toast" data-autohide="false">
                                    <div class="toast-header">
                                        <strong strong class="mr-auto text-danger">Error</strong>
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                                    </div>
                                    <div class="toast-body">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            @if(session('fail'))
                                <div class="toast" data-autohide="false">
                                    <div class="toast-header">
                                        <strong strong class="mr-auto text-danger">Error</strong>
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                                    </div>
                                    <div class="toast-body">
                                        {{session('fail')}}
                                    </div>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="toast" data-autohide="false">
                                    <div class="toast-header">
                                        <strong strong class="mr-auto text-success">Success</strong>
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                                    </div>
                                    <div class="toast-body">
                                        {{session('success')}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="copyright">
                            Copyright &copy; 2021
                            <br>
                            Design by 1716Team
                        </div>
                        <button class="btn-gotop">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>

        // Handle animation
        const Slidebar = document.querySelector('.slidebar')
        const SlideCollapse = document.querySelector('.slidebar-collapse-wrap')
        const SlideCollapseLeft = document.querySelector('.sliderbar-collapse-left')
        const SlideCollapseRight = document.querySelector('.sliderbar-collapse-right')
        const SlidebarItemsTitle = document.querySelectorAll('.slidebar-item-title')
        const Content = document.querySelector('.content')

        SlideCollapse.addEventListener('click', function (e) {
            if (Slidebar.classList.contains('col-2')) {
                SlideCollapseLeft.classList.remove('fa-chevron-left', 'fa')
                SlideCollapseLeft.classList.add('fa-chevron-right', 'fa')
                Slidebar.classList.add('col-0-5')
                Slidebar.classList.remove('col-2')
                Content.classList.add('col-11-5')
                Content.classList.remove('col-10')
                SlidebarHiding.style.height = '0px'
                SlidebarItemsTitle.forEach(element => {
                    element.classList.add('slidebar-item--mini')
                });
            } else {
                SlideCollapseLeft.classList.remove('fa-chevron-right', 'fa')
                SlideCollapseLeft.classList.add('fa-chevron-left', 'fa')
                Slidebar.classList.add('col-2')
                Slidebar.classList.remove('col-0-5')
                Content.classList.add('col-10')
                Content.classList.remove('col-11-5')
                SlidebarHiding.style.height = '0px'
                SlidebarItemsTitle.forEach(element => {
                    element.classList.remove('slidebar-item--mini')
                });
            }
        })

        const SlidebarHiding = document.querySelector('.slidebar-hiding-js')
        document.querySelector('.slidebar-setting').addEventListener('click', function (e) {
            if (Slidebar.classList.contains('col-0-5')) {
                SlidebarHiding.classList.add('slidebar-hiding--mini')
                SlidebarHiding.classList.remove('slidebar-hiding')
            } else {
                SlidebarHiding.classList.remove('slidebar-hiding--mini')
                SlidebarHiding.classList.add('slidebar-hiding')
            }
            if (SlidebarHiding.style.height == '80px') {
                SlidebarHiding.style.opacity = '0 !important';
                SlidebarHiding.style.height = '0px';
                SlidebarHiding.style.opacity = '0';
            } else {
                SlidebarHiding.style.height = '80px';
                SlidebarHiding.style.opacity = '1';
            }
        })

        const SlidebarItems = document.querySelectorAll('.slidebar-item')
        const HidingItems = document.querySelectorAll('.hiding-item')
        SlidebarItems.forEach(function (e, index) {
            e.addEventListener('click', function () {
                HidingItems.forEach(function (e) {
                    e.classList.remove('hiding-item--active')
                })
                SlidebarItems.forEach(function (e) {
                    e.classList.remove('slidebar-item--active')
                })
                if (!e.classList.contains('slidebar-item--active')) {
                    e.classList.add('slidebar-item--active')
                }
            })
        })

        HidingItems.forEach(function (e, index) {
            e.addEventListener('click', function () {
                HidingItems.forEach(function (e) {
                    e.classList.remove('hiding-item--active')
                })
                SlidebarItems.forEach(function (e) {
                    e.classList.remove('slidebar-item--active')
                })

                if (!e.classList.contains('hiding-item--active')) {
                    e.classList.add('hiding-item--active')
                }
            })
        })

        // Button go top
        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 0) {
                document.querySelector('.btn-gotop').style.display = "block"
            } else {
                document.querySelector('.btn-gotop').style.display = "none"
            }
        })

        document.querySelector('.btn-gotop').addEventListener('click', function () {
            window.scrollTo(0, 0)
        })

        // Toast
        $(document).ready(function(){
            $('.toast').toast('show');
        });
    </script>
</body>

</html>