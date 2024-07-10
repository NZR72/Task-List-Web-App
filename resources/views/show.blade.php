<h1>
    {{$task -> title}}
    @if ($task -> completed == false)
        <h3>Not Completed!</h3>
    
    @elseif ($task -> completed == true)
        <h3>Completed!</h3>
    
    @endif
</h1>
<div>
    {{$task -> description}}
</div>
<div>
    {{$task -> long_description}}
</div>
