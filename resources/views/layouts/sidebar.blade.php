      <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <!-- Left Menu Start -->

                        @if (Route::has('login'))

                            @auth

                                @if (Auth::user()->role == 'Admin')
                                    <!-- Admin Menu Start -->
                                    <ul class="metismenu" id="side-menu">
                                        <li class="menu-title">Main</li>
                                        <li class="">
                                            <a href="{{route('admin.dashboard')}}" class="waves-effect {{ request()->is("admin") || request()->is("admin/*") ? "mm active" : "" }}">
                                                <i class="ti-home"></i>
                                                {{-- <span class="badge badge-primary badge-pill float-right">2</span>  --}}
                                                <span> Dashboard </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> Employees <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="{{route('admin.employees')}}" class="waves-effect {{ request()->is("employees") || request()->is("/employees/*") ? "mm active" : "" }}"><i class="dripicons-view-apps"></i><span>Employees List</span></a>
                                                </li>
                                                <li>
                                                    <a href="{{route('admin.departments')}}" class="waves-effect {{ request()->is("departments") || request()->is("/departments/*") ? "mm active" : "" }}"><i class="dripicons-view-apps"></i><span>Departments List</span></a>
                                                </li>
                                                <li>
                                                    <a href="{{route('admin.jobTitles')}}" class="waves-effect {{ request()->is("jobTitles") || request()->is("/jobTitles/*") ? "mm active" : "" }}"><i class="dripicons-view-apps"></i><span>Job Titles List</span></a>
                                                </li>

                                            </ul>
                                        </li>

                                        <li class="">
                                            <a href="{{route('admin.attendances')}}" class="waves-effect {{ request()->is("attendance") || request()->is("attendance/*") ? "mm active" : "" }}">
                                                <i class="ti-time"></i> <span> Attendances </span>
                                            </a>
                                        </li>

                                        <li class="menu-title">Reports</li>

                                        <li class="">
                                            <a href="{{route('admin.report.attendances')}}" class="waves-effect {{ request()->is("report/attendances") || request()->is("report/attendances/*") ? "mm active" : "" }}">
                                                <i class="dripicons-to-do"></i> <span> Attendance Report </span>
                                            </a>
                                        </li>

                                        {{-- <li class="">
                                            <a href="/check" class="waves-effect {{ request()->is("check") || request()->is("check/*") ? "mm active" : "" }}">
                                                <i class="dripicons-to-do"></i> <span> Attendance Sheet </span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="/sheet-report" class="waves-effect {{ request()->is("sheet-report") || request()->is("sheet-report/*") ? "mm active" : "" }}">
                                                <i class="dripicons-to-do"></i> <span> Sheet Report </span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="/attendance" class="waves-effect {{ request()->is("attendance") || request()->is("attendance/*") ? "mm active" : "" }}">
                                                <i class="ti-calendar"></i> <span> Attendance Logs </span>
                                            </a>
                                        </li> --}}

                                        <li class="menu-title">Management</li>

                                        <li class="">
                                            <a href="{{route('admin.shifts')}}" class="waves-effect {{ request()->is("shift") || request()->is("shift/*") ? "mm active" : "" }}">
                                                <i class="ti-time"></i> <span> Schedule </span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="/latetime" class="waves-effect {{ request()->is("latetime") || request()->is("latetime/*") ? "mm active" : "" }}">
                                                <i class="dripicons-warning"></i><span> Late Time </span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="/leave" class="waves-effect {{ request()->is("leave") || request()->is("leave/*") ? "mm active" : "" }}">
                                                <i class="dripicons-backspace"></i> <span> Leave </span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="/overtime" class="waves-effect {{ request()->is("overtime") || request()->is("overtime/*") ? "mm active" : "" }}">
                                                <i class="dripicons-alarm"></i> <span> Over Time </span>
                                            </a>
                                        </li>
                                        {{-- <li class="menu-title">Tools</li>
                                        <li class="">
                                            <a href="{{ route("finger_device.index") }}" class="waves-effect {{ request()->is("finger_device") || request()->is("finger_device/*") ? "mm active" : "" }}">
                                                <i class="fas fa-fingerprint"></i> <span> Biometric Device </span>
                                            </a>
                                        </li> --}}

                                    </ul>
                                    <!-- Admin Menu End -->
                                @else
                                    <!-- Employee Menu Start -->
                                    <ul class="metismenu" id="side-menu">
                                        <li class="menu-title">Main</li>
                                        <li class="">
                                            <a href="{{route('employee.dashboard')}}" class="waves-effect {{ request()->is("employee") || request()->is("employee/*") ? "mm active" : "" }}">
                                                <i class="ti-home"></i> <span> Dashboard </span>
                                            </a>
                                        </li>

                                        {{-- <li class="">
                                            <a href="{{route('employee.account')}}" class="waves-effect {{ request()->is("employee") || request()->is("employee/*") ? "mm active" : "" }}">
                                                <i class="ti-user"></i><span> Account & Profile </span>
                                            </a>
                                        </li> --}}

                                        <li class="menu-title">Reports</li>
                                        <li class="menu-title"></li>

                                    </ul>
                                    <!-- Employee Menu End -->
                                @endif

                            @endauth

                        @endif

                        <!-- Left Menu End -->

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
