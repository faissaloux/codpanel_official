<!--================================-->
<!-- Page Sidebar Start -->
<!--================================-->
<div class="page-sidebar get-down">
    <!--================================-->
    <!-- Sidebar Menu Start -->
    <!--================================-->
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.listing.index') }}" class="tx-right">
                        <i data-feather="package"></i>
                        <span>الطلبات الجديدة</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.listing.employees') }}" class="tx-right">
                        <i data-feather="headphones"></i>
                        <span>عملاء الإتصال</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.listing.providers') }}" class="tx-right">
                        <i data-feather="truck"></i>
                        <span>مندوب التوصيل</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.users.index') }}" class="d-flex justify-content-between tx-right">
                        <i>
                            <i data-feather="users"></i>
                            <span>المستخدمين</span>
                        </i>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.cities.index') }}" class="tx-right">
                        <i data-feather="flag"></i>
                        <span>المدن</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.products.index') }}" class="tx-right">
                        <i data-feather="shopping-bag"></i>
                        <span>المنتجات</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="employeesStats.php" class="tx-right">
                        <i data-feather="trending-up"></i>
                        <span>التقارير و الإحصائيات</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.stock.index') }}" class="d-flex justify-content-between tx-right">
                        <i>
                            <i data-feather="archive"></i>
                            <span>المخزون</span>
                        </i>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.statistiques.index') }}" class="tx-right">
                        <i data-feather="dollar-sign"></i>
                        <span>التكاليف</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.statistiques.revenue') }}" class="tx-right">
                        <i data-feather="dollar-sign"></i>
                        <span>المداخيل</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.stock.reception') }}" class="tx-right">
                        <i data-feather="grid"></i>
                        <span>عمليات المخزون</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--/ Sidebar Menu End -->
    <!--================================-->
    <!-- Sidebar Footer Start -->
    <!--================================-->
    <div class="sidebar-footer">									
        <div class="d-flex justify-content-around">
            <a  class="pull-left"
                href="{{ route('dashboard.profile', ["id" => Auth::user()->id ]) }}"
                data-toggle="tooltip"
                data-placement="top"
                data-original-title="Profile">
            <i data-feather="user" class="wd-16"></i></a>
            <a  class="pull-left"
                href="aut-signin.html"
                data-toggle="tooltip"
                data-placement="top"
                data-original-title="Sing Out">
            <i data-feather="log-out" class="wd-16"></i></a>
        </div>
    </div>
<!--/ Sidebar Footer End -->
</div>
<!--/ Page Sidebar End -->