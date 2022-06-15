@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          <!-- @include('sections.errors') -->
            <div class="card">
                <div class="card-header">
                 ایجاد تسک جدید
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control @error('title')form-control-invalid @enderror">
                            @error('title')
                            <p class="invalid-feedback d-block">
                                <strong>{{$message}}</strong>
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">توضیحات</label>
                            <textarea id="desc" name="description" class="form-control @error('description')form-control-invalid @enderror" >{{old('description')}}</textarea>
                            @error('description')
                            <p class="invalid-feedback d-block">
                                <strong>{{$message}}</strong>
                            </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn-dark">ارسال</button>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center"></div>
        </div>
    </div>
</div>
@endsection