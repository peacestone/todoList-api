<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Notes for Task #{{$task->id}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <h1 text-center >Task #{{$task->id}}</h1>  
</header>
  
  <section>
  
    <label id='description-label' ><strong>Description</strong></label>
  
    <p id='description-div'>
      {{$task->content}}
    </p>
  
    <span id="due-date-span"><strong>Due Date</strong></span> <span>{{$task->dueDate}}</span>
  
    <span id='assigned-to-span'><strong>Assigned to</strong></span> <span>{{$task->email}}</span>
  
    <hr>
    <h5>HISTORY</h5>
  
    @foreach ($notes as $note)

    <div  class='note-div' > <br />
    <span id='time-ago-span'>{{$note->created_time_ago}}</span>
      @if (!isset($note->img_url))
      <div>
        <div>{{$note->content}}</div>
      </div>
      @endif
      
      @if ($note->img_url)
      <div>        
        <img height="350" width="500" src="https://cool-todo-list.herokuapp.com{{$note->img_url}}" />
      </div>
      @endif 
      
    </div>
    <br />
    @endforeach
  </section>
  
</body>
</html>