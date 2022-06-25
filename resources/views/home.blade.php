@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>


                    @endif
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit">l;ogout</button>
                    </form>
                    {{ __('You are logged in!') }}

                    {{-- 
                    @can('update',$todo)
                    <!-- {{}} -->
                    @else
                    <!-- no can -->
                    @canend

                    @can('create',App\Models\Todo::class)
                    <!-- create can -->
                    @else
                    <!-- no -->
                    @canend

                    @can('update',$post)
                    <!-- update -->
                    @elsecan('create',App\Models\Todo::class)
                    <!-- can create -->
                    @canend
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection