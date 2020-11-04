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
                    <h3 class="header-title">الملف الشخصي</h3>
                </div>
                <div class="page-inner mt-4">
                    <div class="d-flex flex-column">
                        <div class="col-12 mb-2">
                            <div class="form mb-4">
                                <form action="/profile/edit" method="GET">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <div class="input-group mb-3">
                                                                <span class="col-2 tx-right">اسم الموظفة</span>
                                                                <input  type="text"
                                                                        class="form-control col-10"
                                                                        placeholder="اسم الموظفة"
                                                                        aria-label="Username"
                                                                        aria-describedby="basic-addon3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text d-flex justify-content-center" id="basic-addon3">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <span class="col-2 tx-right">البريد الإلكتروني</span>
                                                                <input  type="text"
                                                                        class="form-control col-10"
                                                                        placeholder="البريد الإلكتروني"
                                                                        aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon4">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text d-flex justify-content-center" id="basic-addon4">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <span class="col-2 tx-right">كلمة المرور</span>
                                                                <input  type="password"
                                                                        class="form-control col-10"
                                                                        placeholder="كلمة المرور"
                                                                        aria-label="Recipient's password"
                                                                        aria-describedby="basic-addon4">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text d-flex justify-content-center" id="basic-addon4">
                                                                        <i class="fa fa-key"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <span class="col-2 tx-right">رقم الهاتف</span>
                                                                <input  type="text"
                                                                        class="form-control col-10"
                                                                        placeholder="رقم الهاتف"
                                                                        aria-label="Recipient's password"
                                                                        aria-describedby="basic-addon4">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text d-flex justify-content-center" id="basic-addon4">
                                                                        <i class="fa fa-phone"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="ml-2">تعديل</span>
                                                    <i class="fa fa-arrow-left"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

        <!--================================-->
        <!-- Footer Script -->
        <!--================================-->
        <script src="assets/js/all.js"></script>
        
    </body>

</html>