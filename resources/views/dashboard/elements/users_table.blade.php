<table class="table table-primary table-hover">
    <thead>
        <tr>
            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
            <th scope="col" class="arabic" data-type="reference">الصورة</th>
            <th scope="col" class="arabic" data-type="reference">اسم<br class="sm-break"> المستخدم</th>
            <th scope="col" class="arabic" data-type="email">الإميل</th>
            <th scope="col" class="arabic" data-type="registration">تاريخ<br class="sm-break"> التسجيل</th>
            <th scope="col" class="arabic" data-type="job">الوظيفة</th>
            <th scope="col" class="arabic" data-type="phone">رقم الهاتف</th>
            <th scope="col" class="arabic">تعديل</th>
        </tr>
    </thead>
    <tbody class="table-body-listing">
        @foreach($users as $user)
            <tr>
                <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                <td data-type="reference">
                    <span>{{$user->name}}</span>
                </td>
                <td data-type="avatar">
                    @if(!empty ( $user->image ))  
                    <div class="avatar mr-2"><img src="/uploads/{{$user->image}}" class="rounded-circle" alt=""></div>
                    @else
                <div class="avatar mr-2"><span style="background-color: {{ $user->color() }}" class="avatar-initial rounded-circle">{{ Str::limit($user->name, 1 , "") }}</span></div>
                    @endif
                </td>
                <td data-type="email">
                    <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                </td>
                <td data-type="registration">
                    <span>منذ<br class="sm-break"> أسبوعين</span>
                </td>
                <td data-type="job">
                    <span @if($user->role == "admin"){ class="bg-success text-white p-1" }
                        @elseif($user->role == "employee"){ class="bg-primary text-white p-1" }
                        @elseif($user->role == "provider"){ class="bg-warning text-white p-1" } 
                        @elseif($user->role == "client"){ class="bg-danger text-white p-1" } @endif >{{$user->role}}</span>
                </td>
                <td data-type="phone">
                    <a href="tel:{{$user->phone}}">{{$user->phone}}</a>
                </td>
                <td>
                    <a  type="button" href="{{route('dashboard.users.edit' , ['id' => $user->id, 'role' => $user->role])}}"
                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit">
                        تعديل
                    </a>
                    <a  type="button"
                        href="{{ route('dashboard.users.delete' , ['id' => $user->id, 'role' => $user->role]) }}"
                        class="btn btn-danger btn-lg border-none loadactions rounded-custom text-white delete">
                        حذف
                    </a> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="justify-content-center paginate">
        {!! $users->links() !!}
    </ul>
</nav>