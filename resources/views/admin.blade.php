@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Admin</h6>
                </div>

                    <div class="card-body">
                       
                        <span id="message"></span>
                    <div class="row">
                    <div class="col-sm-4">
                    <label for="employee">Employee</label>
                    <select name="user" id="user" class="form-control">
                    <option value="">Please Select an Employee</option>
                    @foreach($user as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                    </select>
                    </div>
                    
                    <div class="col-sm-4">
                    <label for="employee">Task Name</label>
                    <select name="task_name" id="task_name" class="form-control" onchange="getTask()">
                    <option value="">Please Select a Task</option>
                    @foreach($task as $row)
                    <option value="{{$row}}">{{$row}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="col-sm-4">
                    <label for="employee">Task </label>
                    <input type="text" class="form-control" id="task">
                    </div>
                    &nbsp
                    <div  align="center">
                    <button class="btn btn-primary" id="submit">Assign</button>
<div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function getTask(){
        let task=document.getElementById('task_name').value;
       
        fetch('http://www.boredapi.com/api/activity?type='+task)
        .then(res=>res.json())
        .then(data=>{
            
             document.getElementById('task').value=data.activity;
            
           
        })

    }

    $(document).on('click', '#submit', function (e) {
     e.preventDefault();
     var data={
       'user':$('#user').val(),
       'task_name':$('#task_name').val(),
       'task':$('#task').val(),
       
     }
     
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
     $.ajax({
       type: "POST",
       url: "/tasks",
       data: data,
       dataType: "json",
       success: function (response) {
        $('#message').addClass('alert alert-success');
       $('#message').html(response.message).fadeIn('slow');
       $('#message').delay(10000).fadeOut('slow');
         
       }
     });
     });
 
</script>
@endsection