@extends('layouts.master')
@section('content')


@for($counter=0;$counter<=5;$counter++)
<x-btn title='' countervalue="$counter" ><span class="toast-header">hello</span></x-btn>
@endfor
@endsection