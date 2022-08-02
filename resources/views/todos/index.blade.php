@extends('layouts.master')
@section('content')

@include('layouts.search')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-flex justify-content-between my-3 align-items-center">
            <div class="col-md-12 text-center .text-decoration-none">
            <a class="floating pe-auto user-select-none text-decoration-none d-flex justify-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" ><i class="fas fa-plus fa-lg cursor-pointer"></i></a>   
            <h4 >تسک ها</h4>
            </div>
            <!-- href="{{route('todos.create')}}" -->
            
            </div>
            <div class="card">
                <!-- <div class="card-header">
                    تسک ها
                </div> -->
                <div class="card-body">
                    <ul class="list-group-item">
                        @foreach($todos as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          {{ $item->title }}
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ Route('todos.show',['todo'=>$item->id])}}" class="btn btn-dark btn-sm ">
                                نمایش
                            </a>
                            <!-- href="{{ Route('todos.done',['todo'=>$item->id])}}" -->
                            <!-- <a id="done_{{$item->id}}" data-iddone="{{$item->id}}" data-done="{{$item->done}}"  class="btn btn-outline-info btn-sm done_button2">
                              {{$item->done ==0 ?"انجام شد" : "لغو"}}
                             @if (!$item->done)انجام شد @endif -->
                            <!-- </a>     -->
                            
                            <div class="form-check form-switch ">
                            <input class="form-check-input slider" type="checkbox" role="switch" id="flexSwitchCheckDefault" />                    
                            </div>
                            </div>
                        </li>
                        
                        @endforeach
                    </ul>
                </div>
            </div>
<hr>    
            <div class="d-flex justify-content-center">{{ $todos -> links()}}</div>
        </div>
      
        
   
    </div>
</div>
@include('todos.create')
@endsection