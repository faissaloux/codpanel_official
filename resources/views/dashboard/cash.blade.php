<!DOCTYPE html>
<html lang="zxx">
   
    <head>
        <?php require_once 'inc/head.php'; ?>
    </head>
    <body dir="rtl" data-auth-id="" data-auth-type="">
        <?php require_once 'inc/actions.php'; ?>
        <!--================================-->
        <!-- Page Container Start -->
        <!--================================-->
        <div class="page-container">
            <!--================================-->
            <!-- Page Sidebar Start -->
            <!--================================-->
            <?php require_once 'inc/sidebar.php'; ?>
            <!--/ Sidebar Footer End -->
            </div>
            <!--/ Page Sidebar End -->
            <!--================================-->
            <!-- Page Content Start -->
            <!--================================-->
            <div class="page-content get-down">
                <!--================================-->
                <!-- Page Header Start -->
                <!--================================-->
                <?php require_once 'inc/nav.php'; ?>
                <!--/ Page Header End -->
                <!--================================-->
                <!-- Page Inner Start -->
                <!--================================-->
                <div class="d-flex flex-column bg-white pt-4">
                    <div class="row align-items-center pr-4 pl-4">
                        <div class="col-md-6 col-sm-12 mb-md-0 mb-sm-5">
                            <h3 class="tx-right">الحساب اليومي</h3>
                        </div>
                        <div class="heading-elements stastsForm col-md-6 col-sm-12">
                            <form class="heading-form d-flex" id="form-stats-From-To" autocomplete="off" method="GET" action="">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="from" class="float-right">التاريخ من</label>
                                        <input  type="text"
                                                name="from"
                                                placeholder="التاريخ من"
                                                class="form-control tx-right"
                                                id="datepickerFrom">
                                    </div>
                                </div>
                        
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="to" class="float-right">التاريخ إلى</label>
                                        <input  type="text"
                                                name="to"
                                                placeholder="التاريخ الى"
                                                class="form-control tx-right"
                                                id="datepickerTo">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <button class="btn btn-success mt-4 search-btn" type="submit">
                                            <i data-feather="search" class="search-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start bg-grey bt1 bb1 p-2">
                        <div class="dropdown dropdown-provider">
                            <button class="dropdown-toggle"
                                    type="button"
                                    id="dropdownMenuButton"
                                    data-toggle="dropdown" 
                                    aria-haspopup="true"
                                    aria-expanded="false">
                              حسب الموزع
                            </button>
                            <div    class="dropdown-menu by-vendor-dropdown tx-right"
                                    aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">فوو</a>
                              <a class="dropdown-item" href="#">بوو</a>
                              <a class="dropdown-item" href="#">فوو بوو</a>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="d-flex flex-column">
                        <div class="col-12">
                            <div class="d-flex justify-content-between mb-4">
                                <a href="" class="btn-top p-2 tx-center bg-primary text-white">انتظار الاستلام</a>
                                <a href="" class="btn-top b-primary p-2 tx-center bg-white text-primary">تم الدفع</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card-body pd-0 tx-center">
                                <table class="table table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
                                            <th scope="col" class="arabic" data-type="date">اليوم</th>
                                            <th scope="col" class="arabic" data-type="requestsNum">عدد<br class="sm-break"> الطلبات</th>
                                            <th scope="col" class="arabic" data-type="totalSells">مجموع <br class="sm-break">المبيعات</th>
                                            <th scope="col" class="arabic" data-type="deliveryPrice">سعر<br class="sm-break"> التوصيل</th>
                                            <th scope="col" class="arabic" data-type="net">الصافي</th>
                                            <th scope="col" class="arabic" data-type="details">رؤية<br class="sm-break"> التفاصيل</th>
                                            <th scope="col" class="arabic" data-type="received">استلام<br class="sm-break"> الدفع</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr height="50">
                                            <td colspan="8" class="tx-right provider">
                                                فوو
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>2</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>4</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>8</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button" 
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>22</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>21</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>10</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>4</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>7</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button" 
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>12</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                        <tr height="50">
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="date">
                                                <span>2020-10-28</span>
                                            </td>
                                            <td data-type="requestsNum">
                                                <span>4</span>
                                            </td>
                                            <td data-type="totalSells">
                                                <span>498<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="deliveryPrice">
                                                <span>50<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="net">
                                                <span>448<br class="sm-break">درهم</span>
                                            </td>
                                            <td data-type="details">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white details">
                                                    رؤية<br class="sm-break"> التفاصيل
                                                </a>
                                            </td>
                                            <td data-type="received">
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white received">
                                                    تم استلام<br class="sm-break"> المبلغ
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!--/ Page Inner End --> 
            <!--================================-->	
            </div>
            <!--/ Page Content End -->
        </div> 
        <!--/ Page Container End -->
        <!--================================-->

        <!--================================-->
        <!-- Scroll To Top Start-->
        <!--================================-->	
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!--/ Scroll To Top End -->
        <!--================================-->

        <?php require_once 'inc/modals.php'; ?>

        <!--================================-->
        <!-- Footer Script -->
        <!--================================-->
        <script src="assets/js/all.js"></script>
        <script src="assets/js/custom.js"></script>

    </body>

</html>