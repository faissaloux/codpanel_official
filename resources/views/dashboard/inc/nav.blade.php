<div class="page-header">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <div class="navbar-brand deletemarginright">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button">
                        <i data-feather="menu" class="wd-20"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class=" hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button">
                        <i data-feather="menu" class="wd-20"></i>
                    </a>
                </li>
            </ul>
            </div>
        </div>
        <div class="header-right pull-right">
            <ul class="list-inline justify-content-end">
                <li class="list-inline-item dropdown">
                    <a  href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">                    
                        @if(!empty ( Auth::user()->image ))  
                        <img src="/uploads/{{Auth::user()->image}}"
                        class="img-fluid wd-30 ht-30 rounded-circle"
                        alt="">
                        @else
                        <div class="avatar mr-2"><span style="background-color: {{ Auth::user()->color() }}" class="avatar-initial rounded-circle">{{ Str::limit(Auth::user()->name, 1 , "") }}</span></div>
                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                        <div class="user-profile-area d-flex flex-column tx-right">
                            <a href="{{route('dashboard.profile')}}" class="dropdown-item m-auto">
                                <i data-feather="settings" class="wd-16 mr-2"></i>
                                إعدادات حسابي
                            </a>
                            <a href="{{route('logout')}}" class="dropdown-item m-auto">
                                <i data-feather="power" class="wd-16 mr-2"></i>
                                تسجيل الخروج
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>