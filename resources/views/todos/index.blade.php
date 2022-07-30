@extends('layouts.master')
@section('content')

@include('layouts.search')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between my-3 align-items-center">
            <h4>تسک ها</h4>
            <a class="btn btn-outline-dark btn-sm " href="{{route('todos.create')}}">ایجاد تسک</a>
            </div>
            <div class="card">
                <div class="card-header">
                    تسک ها
                   
                </div>
                <div class="card-body" >
                    <ul class="list-group-item">
                        @foreach($todos as $item)
                        <li class="list-group-item d-flex justify-content-between">
                          {{ $item->title }}
                        <div>
                            <a href="{{ Route('todos.show',['todo'=>$item->id])}}" class="btn btn-dark btn-sm ">
                                نمایش
                            </a>
                            @if (!$item->done )
                            <a href="{{ Route('todos.done',['todo'=>$item->id])}}" class="btn btn-outline-info btn-sm ">
                                انجام شد
                            </a>    
                            @endif
                            
                        </div>
                        </li>
                        
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="d-flex justify-content-center">{{ $todos -> links()}}</div>
        </div>
      
         
   </body>
    </div>
</div>
@endsection