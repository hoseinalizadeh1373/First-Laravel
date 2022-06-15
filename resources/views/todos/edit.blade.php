@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          <!-- @include('sections.errors') -->
            <div class="card">
                <div class="card-header">
                 ویرایش تسک 
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.update',['todo' =>$todo->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" id="title" name="title" value="{{$todo->title}}" class="form-control @error('title')form-control-invalid @enderror">
                            @error('title')
                            <p class="invalid-feedback d-block">
                                <strong>{{$message}}</strong>
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">توضیحات</label>
                            <textarea id="desc" name="description" class="form-control @error('description')form-control-invalid @enderror" >{{ $todo->description}}</textarea>
                            @error('description')
                            <p class="invalid-feedback d-block">
                                <strong>{{$message}}</strong>
                            </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn-info">ویرایش</button>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center"></div>
        </div>
    </div>
</div>
@endsection