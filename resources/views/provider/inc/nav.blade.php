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
                        @if(!empty ( $provider->image ))  
                        <img src="/uploads/{{$provider->image}}"
                        class="img-fluid wd-30 ht-30 rounded-circle"
                        alt="">
                        @else
                        <div class="avatar mr-2"><span style="background-color: {{ System::color() }}" class="avatar-initial rounded-circle">{{ Str::limit($provider->name, 1 , "") }}</span></div>
                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                        <div class="user-profile-area d-flex flex-column tx-right">
                            <a href="{{route('provider.profile')}}" class="dropdown-item m-auto">
                                <i data-feather="settings" class="wd-16 mr-2"></i>
                                إعدادات حسابي
                            </a>
                            <a href="{{route('logout.provider')}}" class="dropdown-item m-auto" onclick="event.preventDefault();document.getElementById('logout-form-provider').submit();">
                                <i data-feather="power" class="wd-16 mr-2"></i>
                                تسجيل الخروج
                            </a>
                            <form id="logout-form-provider" action="{{route('logout.provider')}}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>