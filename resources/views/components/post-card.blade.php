<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="direction: ltr;">
        @for ($i=0;$i<count($names) ;$i++) 
        @if ($i === count($names)-1)
        <li class="breadcrumb-item active" aria-current="page">{{$names[$i]}}</li>
        @break
        @endif
        @if( str_contains($href[$i],','))
       @php  $t = mb_split(',',$href[$i]);
       $td= "'$t[0]','$t[1]'";
       @endphp
        <li class="breadcrumb-item "><a href="{{route($href[$i])}}">{{$names[$i]}}</a></li>
        @endif
        @endfor 
        <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
    </ol>
</nav>