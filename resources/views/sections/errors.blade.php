@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li class="alert-text">{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif