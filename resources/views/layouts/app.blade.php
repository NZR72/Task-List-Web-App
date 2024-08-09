<!DOCTYPE html>
<html>
<head>
    <title>Task List Web App</title>
    @yield("styles")
</head>

<body>
    <h1>@yield("title")</h1>
    <div>
        @if (session()->has("success"))
            <div>{{session("success")}}</div>
        @endif
        @yield("content")
    </div>
</body>
</html>