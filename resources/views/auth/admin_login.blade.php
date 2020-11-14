<!DOCTYPE html>
<html lang="zxx">
   
   <head>
      @include('dashboard.inc.head')
   </head>
   <body dir="rtl" data-auth-id="" data-auth-type="">
      <!--================================-->
      <!-- Page Content Start -->
      <!--================================-->
      <div class="ht-100v text-center">
         <div class="row pd-0 mg-0">
            <div class="col-lg-6 bg-gradient hidden-sm">
               <div class="ht-100v d-flex">
                  <div class="align-self-center w-100">
                     <img src="assets/images/logo-sm.png" class="img-fluid" alt="">
                     <h3 class="tx-20 tx-semibold tx-gray-100 pd-t-50">انظم لمجتمعنا</h3>
                     <p class="pd-y-15 pd-x-10 pd-md-x-100 tx-gray-200">بثقكبتن ن تنتن تمنبثشبى ىببقثتان تا تىةوىلا تنتايتت تنا تا تانيىصن ىن ت تى ةىوة</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 bg-light">
               <div class="ht-100v d-flex align-items-center justify-content-center">
                 
                
                <div class="w-50">

                    <form method="POST" id="loginform" action="{{ route('attempt') }}">
                        @csrf 
                     <h3 class="tx-dark mg-b-5 tx-right">تسجيل الدخول</h3>
                     <!-- <p class="tx-gray-500 tx-15 mg-b-40">Welcome back! Please signin to continue.</p> -->
                     <p class="tx-gray-500 tx-right mg-b-40">مرحبا مجددا! من فضلك سجل دخولك للمتابعة</p>
                     <div class="form-group tx-right">
                        <label class="tx-gray-500 mg-b-5">البريد الإلكتروني</label>
                        <input id="email" type="email" class="form-control tx-right" placeholder="البريد الإلكتروني"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                     </div>
                     <div class="form-group tx-right">
                        <label class="tx-gray-500 mg-b-0">كلمة المرور</label>
                        <input id="password" type="password" class="form-control tx-right" placeholder="كلمة المرور"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                     </div>
                     <button type="submit" class="btn btn-brand btn-block">تسجيل الدخول</button>



                            </form>
                  </div>
                
               </div>
            </div>
         </div>
      </div>
      <!--/ Page Content End -->
      
      <!--================================-->
        <!-- Footer Script -->
        <!--================================-->
        <script src="assets/js/all.js"></script>
   </body>

</html>