<form data-link="{{ route('dashboard.cities.store') }}" method="POST">
    @csrf
    <div class="d-flex flex-column">
        <div class="form-group">
            <input  type="text"
                    class="form-control tx-right"
                    name="name"
                    placeholder="إسم المدينة">
        </div>
        <div class="form-group">
            <input  type="text"
                    class="form-control tx-right"
                    name="reference"
                    placeholder="رمز المدينة">
        </div>
        <select class="form-control" name="provider_id">
            <option value="N-A">اختيار الموزع</option>
            @foreach ($providers as $provider)
                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
            @endforeach                
        </select>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <p class="row col p-0">
            <button type="submit" class="btn btn-success btn-block">إضافة مدينة جديدة</button>
        </p>
    </div>
</form>