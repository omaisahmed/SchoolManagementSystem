<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="/dashboard" class="logo">
                <img src="{{ asset('assets/images/logo-sms.png') }}" alt="" class="mx-auto" style="width: 60px;transform: rotateZ(87deg);">
            </a>
        </div>
    </div>

    <div class="sidebar-inner niceScrollleft">

        <div id="sidebar-menu">
            <ul>
                <!-- Dashboard -->
                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="fa fa-tachometer-alt"></i>
                        <span> Dashboard</span>
                    </a>
                </li>

                <!-- Users -->
                <li>
                    <a href="/users" class="waves-effect">
                        <i class="fa fa-users"></i> <!-- Users Icon -->
                        <span> Users </span>
                    </a>
                </li>

                <!-- Students -->
                <li>
                    <a href="/students" class="waves-effect">
                        <i class="fa fa-graduation-cap"></i> <!-- Students Icon -->
                        <span> Students </span>
                    </a>
                </li>

                <!-- Admission -->
                <li>
                    <a href="/students/create" class="waves-effect">
                        <i class="fa fa-user-plus"></i> <!-- Admission Icon -->
                        <span> Admission </span>
                    </a>
                </li>

                <!-- Teachers -->
                <li>
                    <a href="/teachers" class="waves-effect">
                        <i class="fa fa-chalkboard-teacher"></i> <!-- Teacher Icon -->
                        <span> Teachers </span>
                    </a>
                </li>

                <!-- Classes -->
                <li>
                    <a href="/classes" class="waves-effect">
                        <i class="fa fa-school"></i> <!-- Classes Icon -->
                        <span> Classes </span>
                    </a>
                </li>

                <!-- Subjects -->
                <li>
                    <a href="/subjects" class="waves-effect">
                        <i class="fa fa-book"></i> <!-- Subjects Icon -->
                        <span> Subjects </span>
                    </a>
                </li>

                <!-- Department -->
                <li>
                    <a href="/department" class="waves-effect">
                        <i class="fa fa-building"></i> <!-- Department Icon -->
                        <span> Department </span>
                    </a>
                </li>

                <!-- Classroom -->
                <li>
                    <a href="/classroom" class="waves-effect">
                        <i class="fa fa-chalkboard"></i> <!-- Classroom Icon -->
                        <span> Class Room </span>
                    </a>
                </li>

                <!-- Class Routine -->
                <li>
                    <a href="/classroutine" class="waves-effect">
                        <i class="fa fa-calendar"></i> <!-- Class Routine Icon -->
                        <span> Class Routine </span>
                    </a>
                </li>

                <!-- Syllabus -->
                <li>
                    <a href="/syllabus" class="waves-effect">
                        <i class="fa fa-book-open"></i> <!-- Syllabus Icon -->
                        <span> Syllabus </span>
                    </a>
                </li>

                <!-- Log Out -->
                <li class="py-3" style="margin-left: 35px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="fa fa-sign-out-alt"></i> <!-- Log Out Icon -->
                            <span> {{ __('Log Out') }} </span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
