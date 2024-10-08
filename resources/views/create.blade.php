@extends("layouts.app")

@section("title", "Add Task")

@section("styles")
<style>
    .error-message{
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section("content")
    <!-- {{$errors}} -->
    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <br>
            <input text="text" name="title" id="title" value="{{old("title")}}"/>
            @error("title")
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="description">
                Description
            </label>
            <br>
            <textarea name="description" id="description" rows="5">{{old("description")}}</textarea>
            @error("description")
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        
        <div>
            <label for="long_description">
                Long Description
            </label>
            <br>
            <textarea name="long_description" id="long_description" rows="15">{{old("long_description")}}</textarea>
            @error("long_description")
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection