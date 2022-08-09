<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> ویرایش تسک </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{ route('todos.update',['todo' =>$todo->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" id="title" name="title" value="{{$todo->title}}" class="form-control @error('title')form-control-invalid @enderror" autofocus>
                            @error('title')
                            <p class="invalid-feedback d-block">
                                <strong>{{$message}}</strong>
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">توضیحات</label>
                            <textarea id="desc" name="description" class="form-control @error('description')form-control-invalid @enderror">{{ $todo->description}}</textarea>
                            @error('description')
                            <p class="invalid-feedback d-block">
                                <strong>{{$message}}</strong>
                            </p>
                            @enderror
                        </div>
                        <!-- <button type="submit" class="btn-info">ویرایش</button> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn btn-primary">ويرايش</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>