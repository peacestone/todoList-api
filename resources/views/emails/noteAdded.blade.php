<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <a href="https://cool-todo-list.herokuapp.com/tasks/{{$taskId}}/notes"> click here to view this email in your browser</a> <br>
    <strong>Task id:</strong>{{$taskId}}<br/>
    <strong>Due Date:</strong>{{$taskDueDate}} <br/>
    <strong>Task Description:</strong>{{$taskDescription}}<br/>
    <strong>Note id:</strong> {{$noteId}} <br/>
    @if (isset ($img_url))
        <img src="{{$message->embed(public_path().$img_url)}}"></img> <br/>
    @else
        <strong>Note Content:</strong>{{$noteContent}} <br/>
    @endif

</body>
</html>