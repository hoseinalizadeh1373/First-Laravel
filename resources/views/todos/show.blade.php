@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="text-center text-warning mt-5 mb-2">{{ $todo ->title}}</h4>
            <div class="card">
                <div class="card-header">
                    توضیحات
                </div>
                <div class="card-body">
                    {{ $todo->description}}
                </div>
            </div>
            <div class="d-flex justify-content-center"></div>
        </div>
    </div>
</div>
@endsection