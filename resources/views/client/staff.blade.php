@extends('client/layout')
@section('content')
   <div class="container container-store container-top">
      <div class="row">
         <div class="col col-title">
            <div class="title-name title-table d-flex flex-sm-row flex-column justify-content-sm-between align-items-sm-center">
               <h2 class="title-bottom">https://mytraffic.ma staff </h2>
               <button data-toggle="modal" data-target="#createStaffModal" class="btn purple-button"
                  id="createStaff">Add user</button>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <table class="table table-staff sommerce-modals__order-result-table">
               <thead>
                  <tr class="table-borderless">
                     <th scope="col">Username</th>
                     <th scope="col">Access</th>
                     <th scope="col">Status</th>
                     <th scope="col">Last activity</th>
                     <th scope="col" style="width: 275px">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th data-label="Username">admin</th>
                     <td data-label="Status">Full access</td>
                     <td data-label="Access">Active</td>
                     <td data-label="Last activity">2020-08-14 22:40:58</td>
                     <td data-label="Actions" class="d-flex justify-content-between w-100">
                        <div class="actions">
                           <a class="edit-staff" href="/stores/staff/edit/132" data-toggle="modal" data-target="#editStaffModal" data-details="{&quot;id&quot;:132,&quot;login&quot;:&quot;admin&quot;,&quot;status&quot;:1,&quot;accessList&quot;:{&quot;orders&quot;:1,&quot;auto-orders&quot;:1,&quot;payments&quot;:1,&quot;customers&quot;:1,&quot;products&quot;:1,&quot;pages&quot;:1,&quot;settings&quot;:1,&quot;reports&quot;:1,&quot;coupons&quot;:1}}">
                              <svg height='24' width='24' >
                                 <use xlink:href='/themes/img/sprite.svg#edit'></use>
                              </svg>
                              Edit
                           </a>
                           <a class="set-staff-password" href="/stores/staff/password/132" data-toggle="modal" data-target="#setStaffPasswordModal" data-details="{&quot;id&quot;:132,&quot;login&quot;:&quot;admin&quot;}">
                              <svg height='24' width='24' >
                                 <use xlink:href='/themes/img/sprite.svg#set-password'></use>
                              </svg>
                              Set password
                           </a>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <div  class="modal fade"
         id="createStaffModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-add-staff-account"
         aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <div class="d-flex align-items-center">
                  <img src="https://ucarecdn.com/8e80a220-852f-461b-baed-3ee2a5c8fa3e/editstaff.svg"
                     alt="edit-staff">
                  <span>Add staff account</span>
               </div>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <img src="https://ucarecdn.com/1867e3e6-4720-4f8a-82f2-af16e0492f32/close.svg" alt="close">
               </button>
            </div>
            <form id="createStaffForm" class="form" action="/stores/staff/create/100" method="post">
               @csrf
               <div class="modal-body">
                  <fieldset>
                     <div id="createStaffError" class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                     <div class="form-group">
                        <label class="username-staff" for="createstaffform-account">Username</label>
                        <input type="text" id="createstaffform-account" class="input" name="CreateStaffForm[account]" placeholder="Username" aria-required="true">
                        <p class="help-block help-block-error"></p>
                     </div>
                     <div class="form-group generate-password">
                        <label for="staff_create_passwd">Password</label>
                        <input   type="text"
                                 id="staff_create_passwd"
                                 class="password-set"
                                 name="CreateStaffForm[password]"
                                 placeholder="Sxn9t0zZ" aria-required="true">
                        <a class="generate-password-button generate-password-staff" id="staff_create_gen" href="#">
                           <svg height='24' width='24' class='svg-active'>
                              <use xlink:href='/themes/img/sprite.svg#generate-password'></use>
                           </svg>
                        </a>
                        <span class="text-under-password">Type or generate new password for staff account</span>
                     </div>
                     <div class="form-group">
                        <div>
                           <div class="d-flex justify-content-between">
                              <label for="create-staff-status">Status</label>
                           </div>
                           <div class="select-wrapper">
                              <select  id="createstaffform-status"
                                       class="form-control no-radius"
                                       name="CreateStaffForm[status]"
                                       aria-required="true">
                                 <option value="1">Active</option>
                                 <option value="2">Suspended</option>
                              </select>
                              <p class="help-block help-block-error"></p>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="checkbox-modal">
                           <label>Access rights</label>
                           <div class="d-flex flex-wrap">
                              <span>
                                 <input type="checkbox" id="create-orders" class="invoice-checkbox" name="CreateStaffForm[access][orders]" value="1" checked>
                                 <label class="form-check-label" for="create-orders">Orders</label>
                              </span>
                              <span>
                                 <input type="checkbox" id="create-auto-orders" class="invoice-checkbox" name="CreateStaffForm[access][auto-orders]" value="1" checked>
                                 <label class="form-check-label" for="create-auto-orders">Auto orders</label>
                              </span>
                              <span>
                                 <input type="checkbox" id="create-payments" class="invoice-checkbox" name="CreateStaffForm[access][payments]" value="1" checked>
                                 <label class="form-check-label" for="create-payments">Payments</label>
                              </span>
                              <span>
                                 <input type="checkbox" id="create-customers" class="invoice-checkbox" name="CreateStaffForm[access][customers]" value="1" checked>
                                 <label class="form-check-label" for="create-customers">Customers</label>
                              </span>
                              <span>
                                 <input type="checkbox" id="create-products" class="invoice-checkbox" name="CreateStaffForm[access][products]" value="1" checked>
                                 <label class="form-check-label" for="create-products">Products</label>
                              </span>
                              <span>
                                 <input type="checkbox" id="create-pages" class="invoice-checkbox" name="CreateStaffForm[access][pages]" value="1" checked>
                                 <label class="form-check-label" for="create-pages">Pages</label>
                              </span>
                              <span>
                                 <input type="checkbox" id="create-reports" class="invoice-checkbox" name="CreateStaffForm[access][reports]" value="1" checked>
                                 <label class="form-check-label" for="create-reports">Reports</label>
                              </span>
                              <span>
                                 <input type="checkbox" id="create-settings" class="invoice-checkbox" name="CreateStaffForm[access][settings]" value="1" checked>
                                 <label class="form-check-label" for="create-settings">Settings</label>
                              </span>
                              <span>
                                 <input type="checkbox" id="create-coupons" class="invoice-checkbox" name="CreateStaffForm[access][coupons]" value="1" checked>
                                 <label class="form-check-label" for="create-coupons">Discounts</label>
                              </span>
                           </div>
                        </div>
                     </div>
                  </fieldset>
               </div>
               <div class="modal-footer">
                  <button type="submit"
                           id="createStaffButton"
                           class="btn save-changes-button purple-button"
                           name="create-staff-button">
                     Add account
                  </button>
               </div>
            </form>            
         </div>
      </div>
   </div>
   <div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <div class="d-flex align-items-center">
                  <img src="https://ucarecdn.com/8e80a220-852f-461b-baed-3ee2a5c8fa3e/editstaff.svg"
                     alt="edit-staff">
                  <span>Edit staff account</span>
               </div>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <img src="https://ucarecdn.com/1867e3e6-4720-4f8a-82f2-af16e0492f32/close.svg" alt="close">
               </button>
            </div>
            <form id="editStaffForm" class="form" action="/stores/staff/100" method="post">
               <div class="modal-body">
                     @csrf
                     <fieldset>
                        <div id="editStaffError" class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                        <div class="form-group">
                           <div class="form-group field-editstaffform-account required">
                              <label class="control-label" for="editstaffform-account">Username</label>
                              <input
                                 type="text" 
                                 d="editstaffform-account"
                                 class="input"
                                 name="EditStaffForm[account]"
                                 placeholder="Username"
                                 aria-required="true"
                              >
                           </div>
                        </div>
                        <div class="form-group">
                           <div>
                              <div class="d-flex justify-content-between">
                                 <label for="select-staff-status">Status</label>
                              </div>
                              <div class="select-wrapper">
                                 <div class="form-group field-editstaffform-status required">
                                    <select  id="editstaffform-status"
                                             class="form-control no-radius"
                                             name="EditStaffForm[status]"
                                             aria-required="true">
                                       <option value="1">Active</option>
                                       <option value="2">Suspended</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="checkbox-modal">
                              <label>Access rights</label>
                              <div class="d-flex flex-wrap">
                                 <span>
                                    <input type="checkbox" id="orders" class="invoice-checkbox" name="EditStaffForm[access][orders]" value="1" checked>
                                    <label class="form-check-label" for="orders">Orders</label>
                                 </span>
                                 <span>
                                    <input type="checkbox" id="auto-orders" class="invoice-checkbox" name="EditStaffForm[access][auto-orders]" value="1" checked>
                                    <label class="form-check-label" for="auto-orders">Auto orders</label>
                                 </span>
                                 <span>
                                    <input type="checkbox" id="payments" class="invoice-checkbox" name="EditStaffForm[access][payments]" value="1" checked>
                                    <label class="form-check-label" for="payments">Payments</label>
                                 </span>
                                 <span>
                                    <input type="checkbox" id="customers" class="invoice-checkbox" name="EditStaffForm[access][customers]" value="1" checked>
                                    <label class="form-check-label" for="customers">Customers</label>
                                 </span>
                                 <span>
                                    <input type="checkbox" id="products" class="invoice-checkbox" name="EditStaffForm[access][products]" value="1" checked>
                                    <label class="form-check-label" for="products">Products</label>
                                 </span>
                                 <span>
                                    <input type="checkbox" id="pages" class="invoice-checkbox" name="EditStaffForm[access][pages]" value="1" checked>
                                    <label class="form-check-label" for="pages">Pages</label>
                                 </span>
                                 <span>
                                    <input type="checkbox" id="reports" class="invoice-checkbox" name="EditStaffForm[access][reports]" value="1" checked>
                                    <label class="form-check-label" for="reports">Reports</label>
                                 </span>
                                 <span>
                                    <input type="checkbox" id="settings" class="invoice-checkbox" name="EditStaffForm[access][settings]" value="1" checked>
                                    <label class="form-check-label" for="settings">Settings</label>
                                 </span>
                                 <span>
                                    <input type="checkbox" id="coupons" class="invoice-checkbox" name="EditStaffForm[access][coupons]" value="1" checked>
                                    <label class="form-check-label" for="coupons">Discounts</label>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </fieldset>
               </div>
               <div class="modal-footer">
               <button type="submit" id="editStaffButton" class="btn save-changes-button purple-button" name="edit-staff-button">Save changes</button>            </div>
            </form>        
         </div>
      </div>
   </div>
   <div  class="modal fade"
         id="setStaffPasswordModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-set-password"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <div class="d-flex align-items-center">
                     <img src="https://ucarecdn.com/1f6824f5-cd1e-4ab7-a17f-deb81102907e/setpassword.svg"
                        alt="set-new-password">
                     <span>Set new password</span>
                  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <img src="https://ucarecdn.com/1867e3e6-4720-4f8a-82f2-af16e0492f32/close.svg" alt="close">
                  </button>
               </div>
               <div class="modal-body">
                  <form id="setStaffPasswordForm" class="form" action="/stores/staff/100" method="post">
                     @csrf
                     <fieldset>
                        <div id="setStaffPasswordError" class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                        <div class="form-group disable-input">
                           <label class="" for="setstaffpasswordform-username">Username</label>
                           <input   type="text"
                                    id="setstaffpasswordform-username"
                                    class="input"
                                    name="SetStaffPasswordForm[username]"
                                    readonly="readonly"
                           >
                           <p class="help-block help-block-error"></p>
                        </div>
                        <div class="form-group">
                           <label for="staff_edit_passwd">Password</label>
                           <input   type="text"
                                    id="staff_edit_passwd"
                                    class="input"
                                    name="SetStaffPasswordForm[password]"
                                    placeholder="Sxn9t0zZ"
                                    aria-required="true">
                           <a class="generate-password-button" id="staff_edit_gen" href="#">
                              <svg height='24' width='24' class='svg-active'>
                                 <use xlink:href='/themes/img/sprite.svg#generate-password'></use>
                              </svg>
                           </a>
                           <span class="text-under-password">Type or generate new password for staff account</span>
                        </div>
                     </fieldset>
               </div>
               <div class="modal-footer">
                  <button  type="submit"
                           id="setStaffPasswordButton"
                           class="btn save-changes-button purple-button"
                           name="set-staff-password-button">
                     Set password
                  </button>
               </div>
               </form>    
            </div>
         </div>
   </div>

   <script>window.modules.indexController = [];</script>
   <script>
      jQuery(function ($) {
         jQuery('#createStaffForm').yiiActiveForm([], {"errorSummary":".error-summary.alert.alert-danger","errorCssClass":""});
         jQuery('#editStaffForm').yiiActiveForm([], {"errorSummary":".error-summary.alert.alert-danger","errorCssClass":""});
         jQuery('#setStaffPasswordForm').yiiActiveForm([], {"errorSummary":".error-summary.alert.alert-danger","errorCssClass":""});
      });
   </script>
   <script>
      dataLayer = [{'userId':'502'}];
      /* <!-- Google Tag Manager --> */
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-NZ39BZB');
      /* <!-- End Google Tag Manager --> */
      dataLayer.push({'userId':'502'});
   </script>
@endsection