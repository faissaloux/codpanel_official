<div class="page-header">
    <nav class="navbar navbar-default d-flex justify-content-end">
        <div class="header-right">
            <ul class="list-inline justify-content-end">
                <li class="list-inline-item dropdown">
                    <a  href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">                    
                        @if(!empty ( $employee->image ))  
                        <img src="/uploads/{{ $employee->image}}"
                        class="img-fluid wd-30 ht-30 rounded-circle"
                        alt="">
                        @else
                        <div class="avatar mr-2"><span style="background-color: {{ System::color() }}" class="avatar-initial rounded-circle">{{ Str::limit($employee->name, 1 , "") }}</span></div>
                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                        <div class="user-profile-area d-flex flex-column tx-right">
                            <a href="{{ route('employee.profile', ['id' => $employee->id]) }}" class="dropdown-item m-auto">
                                <i data-feather="settings" class="wd-16 mr-2"></i>
                                إعدادات حسابي
                            </a>
                            <a href="{{route('logout.employee')}}" class="dropdown-item m-auto" onclick="event.preventDefault();document.getElementById('logout-form-employee').submit();">
                                <i data-feather="power" class="wd-16 mr-2"></i>
                                تسجيل الخروج
                            </a>
                            <form id="logout-form-employee" action="{{route('logout.employee')}}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>