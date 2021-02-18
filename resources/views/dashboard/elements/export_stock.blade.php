<form action="{{ route('dashboard.stock.create.sortie') }}" method="post">
    @csrf
    <div class="d-flex flex-column">
        <div class="form-group">
            <select class="form-control" name="product">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="sortieAppend">
            <div class="d-flex clonedSortie">
                <div class="form-group col px-0">
                    <input  type="text"
                            class="form-control tx-right"
                            name="quantity[]"
                            placeholder="الكمية">
                </div>
                <div class="form-group col pl-0">
                    <select id="citiesList" class="form-control" name="cities[]" placeholder="produit">
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <a id="addRowSortie" href="#" class="btn btn-primary">+</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-4">
        <p class="p-0">
            <button type="submit" class="btn btn-success btn-block">إضافة المخزون</button>
        </p>
    </div>
</form>