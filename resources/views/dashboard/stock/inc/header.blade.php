<div class="d-flex flex-column bg-white pt-4">
    <div class="d-flex justify-content-between align-items-center pr-4 pl-4">
        <h3 class="header-title">المستودع</h3>
        <div class="d-flex justify-content-around">
            <div class="btn-group btn-top d-flex justify-content-end add-stock-btn btn-action-sm-box" role="group">
                <a  href="#"
                    class="btn btn-primary d-flex col border-none"
                    id="addNewStock"
                    data-link="{{ route('dashboard.stock.create') }}">
                    <span class="d-flex justify-content-center add-new-icon">
                        <i class="mdi mdi-plus d-flex align-items-center text-white"></i>
                    </span>
                    <span   class="add-new-text"
                            data-toggle="modal"
                            data-target="#addToStockModalCenter">
                        إضافة السلعة للمخزون
                    </span>
                </a>
            </div>
            <div class="btn-group btn-top d-flex justify-content-center mx-2 return-btn btn-action-sm-box" role="group">
                <a  href="#"
                    class="btn btn-primary d-flex col-12 border-none"
                    id="returnStock"
                    data-link="{{ route('dashboard.stock.return') }}">
                    <span class="d-flex justify-content-center add-new-icon">
                        <i class="mdi mdi-keyboard-backspace d-flex align-items-center text-white"></i>
                    </span>
                    <span   class="add-new-text"
                            data-toggle="modal"
                            data-target="#returnStockModalCenter">
                        Retour
                    </span>
                </a>
            </div>
            <div class="btn-group btn-top d-flex justify-content-end export-stock-btn btn-action-sm-box" role="group">
                <a  href="#"
                    class="btn btn-primary d-flex col-12 border-none"
                    id="exportStock"
                    data-link="{{ route('dashboard.stock.export') }}">
                    <span class="d-flex justify-content-center add-new-icon">
                        <i class="mdi mdi-export d-flex align-items-center text-white"></i>
                    </span>
                    <span   class="add-new-text"
                            data-toggle="modal"
                            data-target="#exportStockModalCenter">
                        تصدير السلعة من المخزون
                    </span>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end bg-grey bt1 bb1 p-2">
        <div class="ml-4 btn py-0">
            <a href="{{ route('dashboard.stock.retour') }}" type="button">Retour</a>
        </div>
        <div class="ml-4 btn py-0">
            <a href="{{ route('dashboard.stock.index') }}">
                <span>المتبقي</span>
                <span class="quantity">{{ $nots['entree'] - $nots['sortie'] }}</span>
            </a>
        </div>
        <div class="ml-4 btn py-0">
            <a href="{{ route('dashboard.stock.create.sortie') }}" type="button">
                <span>الخروج</span>
                <span class="quantity">{{ $nots['sortie'] }}</span>
            </a>
        </div>
        <div class="ml-4 btn py-0">
            <a type="button">
                <span>الدخول</span>
                <span class="quantity">{{ $nots['entree'] }}</span>
            </a>
        </div>
    </div>
</div>