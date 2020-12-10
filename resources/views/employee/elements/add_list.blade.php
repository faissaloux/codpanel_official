<div class="modal-cont modal-top mb-3 float-right">
    <div class="d-flex flex-column">
        <form id="addnewlisting" action="javascript:;" data-link="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="row">
                <div>
                    <div>
                        <div class="panel-heading">
                            <h4 class="tx-right">معلومات الزبون</h4> <hr>
                        </div>
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 p-0">
                                            <div class="form-group col-md-12">
                                                <input  type="text"
                                                        class="form-control" 
                                                        name="name"
                                                        placeholder="الإسم الكامل للزبون">
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-0">
                                        <div class="form-group col-md-12">
                                            <input  type="text"
                                                    class="form-control frequired"
                                                    name="adress"
                                                    placeholder="العنوان">
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 p-0">
                                            <div class="form-group col-md-12">
                                                <input  type="number"
                                                        class="form-control frequired"
                                                        name="tel"
                                                        id="tel"
                                                        maxlength="10"
                                                        placeholder="رقم الهاتف">
                                            </div>
                                        </div>  
                                        
                                        <div class="col-md-6 p-0">
                                            <div class="form-group col-md-12">
                                                <select class="form-control frequired"
                                                        name="cityID"
                                                        placeholder="المدينة">
                                                        <option value="N-A">اختار المدينة</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-6 p-0">
                                            <div class="form-group col-md-12">
                                                <input  class="form-control frequired"
                                                        disabled
                                                        value="{{ $auth->name }}">
                                            </div>
                                        </div>

                                        <input name="employee" type="hidden" value="{{ $auth->id }}">
                                            
                                        <div class="col-md-6 p-0"  >
                                            <div class="form-group col-md-12">
                                                <input  type="number"
                                                        class="form-control frequired"
                                                        name="prix_de_laivraison"
                                                        id="prix_de_laivraison"
                                                        placeholder="ثمن الإرسال بالدرهم - أرقام فقط">
                                            </div>
                                        </div>

                                        <div class="col-md-12 p-0"  >
                                            <div class="form-group col-md-12 m-0">
                                                <label for="notes" class="float-right">ملاحظات</label>
                                                <textarea   class="form-control frequired notes"
                                                            name="notes"
                                                            placeholder="ملاحظات">
                                                </textarea>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel mg-t-45 mg-b-25 panel-flat">
                        <div class="panel-heading">
                            <h4 class="tx-right">المنتجات</h4>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <fieldset class="content-group productsList">
                                <div class="row col productsTosale">
                                    <div class="col-md-4 p-0">
                                        <div class="form-group col-md-12">
                                            <div class="product-q">
                                                <select class="selectpicker form-control" name="ProductID[]" data-style="btn-default" data-live-search="true">
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4 p-0">
                                        <div class="form-group col-md-12">
                                            <input  type="number"
                                                    class="form-control frequired"
                                                    name="prix[]"
                                                    placeholder="سعر البيع"
                                                    >
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-0">
                                        <div class="form-group col-md-12">
                                            <input  type="number"
                                                    name="quantity[]"
                                                    class="form-control frequired"
                                                    id="produit"
                                                    placeholder="الكمية"
                                                    >
                                        </div>
                                    </div>
                                    <div class="col-md-1 p-0">
                                        <a id="addmoreproducts" href="javascript:;" class="btn btn-primary">+</a>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-block">اضافة البيانات</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>