<form id="cancelReason" action="javascript:;" data-link="{{ route('dashboard.listing.statue' , ['id' => '1' ]) }}" method="POST">
    @csrf
    <div class="d-flex flex-column">
        <div class="form-group">
            <textarea rows="3" class="form-control" placeholder="سبب الإلغاء" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <p class="row col p-0">
            <button type="submit" class="btn btn-success btn-block">حفظ سبب الإلغاء</button>
        </p>
    </div>
</form>