<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Task #{{$task->id}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" >
</head>
<body>

<header >Task #{{$task->id}}</header>  

  
  <section>
  
    <label id='description-label' ><strong>Description</strong></label>
  
    <p id='description-div'>
      {{$task->content}}
    </p>
  
    <span id="due-date-span"><strong>Due Date</strong></span> <span>{{$task->dueDate}}</span>
  
    <span id='assigned-to-span'><strong>Assigned to</strong></span> <span>{{$task->email}}</span>
  
    <hr>
  </section>
  
</body>
</html>