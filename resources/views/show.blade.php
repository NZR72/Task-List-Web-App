@extends("layouts.app")

@section("title", $task -> title)

@section("content")
<h1>
    @if ($task -> completed == false)
        <h3>Not Completed!</h3>
    
    @elseif ($task -> completed == true)
        <h3>Completed!</h3>
    
    @endif
</h1>
<div>
    <p>{{$task -> description}}</p>
</div>
<div>
    @if ($task -> long_description)
        <p>{{$task -> long_description}}</p>
    @endif
</div>
<div>
    <p>{{$task -> created_at}}</p>
    <p>{{$task -> updated_at}}</p>
</div>
@endsection