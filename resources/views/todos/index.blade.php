@extends('layouts.master')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="d-flex justify-content-between my-3 align-items-center">
                <!-- <div class="col-md-12 text-center .text-decoration-none"> -->
                <!-- <i class="fas fa-plus fa-lg cursor-pointer"></i> -->
                    <h4 class="text-info">مدیریت وظایف ایجاد شده</h4>
                    <a class="floating bg-info pe-auto user-select-none text-decoration-none d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">افزودن</a>            
                

            </div>
            
            <div class="card">
              
                <div class="card-body bg-secondary" id='div'>
                @include('layouts.search')
                    <ul class="list-group-item bg-secondary">
                        @foreach($todos as $item)
                        <a href="{{ Route('todos.show',['todo'=>$item->id])}}" class="text-decoration-none text-dark fw-bold">
                        <li class="list-group-item  text-dark d-flex justify-content-between align-items-center bg-light my-2">
                            <!-- {{ $item->title }} -->  
                                {{ $item->title }}
                              
                            <div class="d-flex justify-content-between align-items-center">
                              
                                <!-- href="{{ Route('todos.done',['todo'=>$item->id])}}" -->
                                <!-- <a id="done_{{$item->id}}" data-iddone="{{$item->id}}" data-done="{{$item->done}}"  class="btn btn-outline-info btn-sm done_button2">
                              {{$item->done ==0 ?"انجام شد" : "لغو"}}
                             @if (!$item->done)انجام شد @endif -->
                                <!-- </a>     -->
                                @php $trfalse = $item->done == 0 ?"'flexSwitchCheckChecked' checked " : "flexSwitchCheckDefault"; @endphp
                                <div class="form-check form-switch ">
                                    <input id="done_{{$item->id}}" data-iddone="{{$item->id}}" data-done="{{$item->done}}" class="form-check-input slider done_button2" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{$trfalse}} />
                                </div>
                            </div>
                        </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <!-- button for new , spreadsheet s -->
            </div>
            <div class="d-flex justify-content-center " id="pagination2">{{ $todos -> links()}}</div>
            <hr class='d-block'>
        </div>
        
    </div>
</div>
@include('todos.create')
@endsection