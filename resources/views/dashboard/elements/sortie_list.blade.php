@foreach($list as $sortie)
    <div class="row city_quantity  firstRow">
        <div class="col-lg-11">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-lg-10">
                    <input type="text" value="{{ $sortie->quantity}}" class="form-control" name="quantities[]" placeholder="quantity">
                </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-lg-10">
                    <input type="text" class="form-control sortieValidation" name="valid[]" placeholder="valid">
                </div>
                    </div>
                </div>
                <div class="col-md-4">
                <select data-val="{{ $sortie->cityID}}" class="form-control citiesList validatestockcitiesList" name="cities[]" placeholder="produit">
                    @foreach( $cities as $city )
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="col-lg-1"><a id="addRowSortie" href="javascript:;" class="btn btn-primary">+</a></div>
    </div>
@endforeach
