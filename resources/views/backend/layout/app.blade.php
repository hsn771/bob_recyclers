<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSRL</title>

    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.svg" type="image/x-icon')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png" type="image/png')}}">

    <link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <style>
        .tox.tox-silver-sink.tox-tinymce-aux {
            display: none;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="{{asset('asset/images/Mask group.png')}}"
                                    alt="Logo"></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{route('dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Pages</li>

                        <li class="sidebar-item  has-sub">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-gear"></i>
                                <span>Settings</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('info.index')}}">Company Info</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('carousel.index')}}">Carousel</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('track-record.index')}}">Record Cards</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('buyer-logo.index')}}">Buyer Logo</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('sister-logo.index')}}">Sister Concern Logo</a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Menu Setting</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item  ">
                                    <a href="{{route('front_menu.index')}}"> Add Submenu</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('page.index')}}">Add Page</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Text (with image)</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('history.index')}}">Our-history</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('mission.index')}}">Our-mission</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('about-us.index')}}">About-us</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('chairman.index')}}">Chairman-message</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Text (Only) </span>
                            </a>
                            <ul class="submenu ">

                                <li class="submenu-item  ">
                                    <a href="{{route('industry.index')}}">
                                        Industry Overview
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('moderation.index')}}" class='sidebar-link'>
                                        Moderation of Yard
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('text.index')}}">
                                        Text Contents
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('sisterC.index')}}">
                                        Sister Page
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Management</span>
                            </a>
                            <ul class="submenu ">

                                <li class="submenu-item  ">
                                    <a href="{{route('team.index')}}">
                                        Text
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('top.index')}}" class='sidebar-link'>
                                        Top Management
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('mid.index')}}">
                                        Mid Management
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('yard.index')}}">
                                        Yard Management
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Project</span>
                            </a>
                            <ul class="submenu ">

                                <li class="submenu-item  ">
                                    <a href="{{route('project.index')}}">
                                        File Upload
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('ship-info.index')}}" class='sidebar-link'>
                                        Image Upload
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('video.index')}}" class='sidebar-link'>
                                        Video Upload
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Career</span>
                            </a>
                            <ul class="submenu ">

                                <li class="submenu-item  ">
                                    <a href="{{route('circular.index')}}">
                                        Circular
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{route('applicants')}}" class='sidebar-link'>
                                        Applicants
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>User Management</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="{{route('user.index')}}">Users</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{route('role.index')}}">Roles</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('admin.blog.index') }}" class='sidebar-link'>
                                <i class="bi bi-journal-richtext"></i>
                                <span>Blog</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{route('contactList')}}" class='sidebar-link'>
                                <i class="bi bi-telephone"></i>
                                <span>Contacts</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{route('logOut')}}" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>Log out</span>
                            </a>
                        </li>
                        {{--<li class="sidebar-item  ">
                            <a href="{{route('team.index')}}" class='sidebar-link'>
                                <i class="bi bi-house-fill"></i>
                                <span>Management</span>
                            </a>
                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{Date('Y')}} &copy; MSRL</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">Muktodhara Technology Limited</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>

    <script src="https://cdn.tiny.cloud/1/ceyb8meqlrqis0sgk1xe964n5su0k26wvyrj80i1g9swpx2q/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {!! app('toastr')->message() !!}
    @stack('scripts')
</body>

</html>