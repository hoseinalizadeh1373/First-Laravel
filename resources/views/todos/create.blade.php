<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ایجاد تسک جدید</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- <form action="{{ route('todos.store') }}" method="post">
                        @csrf -->
                    <div class="form-group">
                        <label for="title">عنوان</label>
                        <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control @error('title')form-control-invalid @enderror">
                        <!-- @error('title')
                        <p class="invalid-feedback d-block">
                            <strong>{{$message}}</strong>
                        </p>
                        @enderror -->
                        <p class="invalid-feedback d-block">
                            <strong id="error_create_title"></strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="desc">توضیحات</label>
                        <textarea id="desc" name="description" class="form-control @error('description')form-control-invalid @enderror">{{old('description')}}</textarea>
                        <!-- @error('description')
                        <p class="invalid-feedback d-block">
                            <strong>{{$message}}</strong>
                        </p>
                        @enderror -->
                        <p class="invalid-feedback d-block">
                            <strong id="error_create_desc"></strong>
                        </p>
                    </div>
                    <!-- <button type="submit" class="btn-dark">ارسال</button> -->
                    <!-- </form> -->
                </div>
            </div>
            <div class="d-flex justify-content-center"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close_create">انصراف</button>
                <button type="button" class="btn btn-primary createtodo">ايجاد</button>
            </div>
        </div>
    </div>
</div>