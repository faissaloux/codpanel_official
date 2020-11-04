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
                <div class="d-flex justify-content-between p-2 bg-white p-4">
                    <h3 class="header-title">المدن والموزعين المكلفين بهم</h3>
                    <div class="btn-group btn-top d-flex justify-content-end" role="group">
                        <a href="#" class="btn btn-primary d-flex col-4 border-none">
                            <span class="d-flex justify-content-center add-new-icon">
                                <i class="mdi mdi-plus d-flex align-items-center text-white"></i>
                            </span>
                            <span   class="add-new-text"
                                    data-toggle="modal"
                                    data-target="#addCityModalCenter">
                                إضافة مدينة جديدة
                            </span>
                        </a>
                    </div>
                </div>
                <div class="page-inner mt-4">
                    <div class="d-flex">
                        <div class="col-12">
                            <div class="card-body pd-0 tx-center">
                                <table class="table table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
                                            <th scope="col" class="arabic" data-type="city">المدينة</th>
                                            <th scope="col" class="arabic" data-type="symbol">الرمز</th>
                                            <th scope="col" class="arabic" data-type="provider">الموزع</th>
                                            <th scope="col" class="arabic">تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Agadir</p>
                                            </td>
                                            <td data-type="symbol">
                                                <p>Aga</p>
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a type="button"
                                                        class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Marrakech</p>
                                            </td>
                                            <td  data-type="symbol">
                                                <p>Kech</p>
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Casablanca</p>
                                            </td>
                                            <td data-type="symbol">
                                                <p>Casa</p>
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a type="button" 
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Rabat</p>
                                            </td>
                                            <td data-type="symbol">
                                                Rab
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a type="button"
                                                        class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Tangier</p>
                                            </td>
                                            <td data-type="symbol">
                                                <p>Tan</p>
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a type="button"
                                                        class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Agadir</p>
                                            </td>
                                            <td data-type="symbol">
                                                <p>Aga</p>
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a type="button"
                                                        class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Marrakech</p>
                                            </td>
                                            <td  data-type="symbol">
                                                <p>Kech</p>
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a  type="button"
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Casablanca</p>
                                            </td>
                                            <td data-type="symbol">
                                                <p>Casa</p>
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a type="button" 
                                                    class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Rabat</p>
                                            </td>
                                            <td data-type="symbol">
                                                Rab
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a type="button"
                                                        class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="checkbox"/></th>
                                            <td data-type="city">
                                                <p>Tangier</p>
                                            </td>
                                            <td data-type="symbol">
                                                <p>Tan</p>
                                            </td>
                                            <td data-type="provider">
                                                <p>dealer</p>
                                            </td>
                                            <td>
                                                <a type="button"
                                                        class="btn btn-primary btn-lg border-none loadactions rounded text-white edit">
                                                    تعديل
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