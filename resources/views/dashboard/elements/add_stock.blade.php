<form action="{{ route('dashboard.stock.create.entree') }}" method="post">
    @csrf
    <div class="d-flex flex-column">
        <div class="form-group d-flex align-items-center">
            <label for="product" class="col-1 pr-0 text-right">المنتوج</label>
            <select class="form-control col" name="product">
                @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group d-flex align-items-center">
            <label for="quantity" class="col-1 pr-0 text-right">الكمية</label>
            <input  type="text"
                    class="form-control tx-right col"
                    name="quantity"
                    placeholder="الكمية">
        </div>
        <div class="form-group d-flex align-items-center">
            <label for="note" class="col-1 pr-0 text-right">ملاحظة</label>
            <textarea   class="form-control tx-right col"
                        name="note"
                        style="height: 100px;"
                        placeholder="ملاحظة">
            </textarea>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-4">
        <p class="p-0">
            <button type="submit" class="btn btn-success btn-block">إضافة السلعة للمخزون</button>
        </p>
    </div>
</form>