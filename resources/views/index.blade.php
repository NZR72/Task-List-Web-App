@isset($name)
<h1>
    Hello {{ $name }},
</h1>
@endisset
<div>
    This is all the task you have. which one do you want to do first?
</div>
<div>
    @if (count($tasks))
        <div>There are task to be completed!</div>
        @foreach ($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ["id" => $task -> id]) }}">{{$task -> title}}</a>
        </div>
        @endforeach
    @else
        <div>There are no task, nice!</div>
    @endif
</div>