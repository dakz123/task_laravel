@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h6>Employee</h6>
                </div>

                <div class="card-body">
                   
                <div id="table_data">
            @include('task')
                   </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function fetchtask()
 {
  $.ajax({
    type:"GET",
    url:"tasks/create",
   success:function(data)
   {
    $('#table_data').html(data);
   }
  });
 }
  $(document).on('click', '.chk_id', function (e) {
     e.preventDefault();
     let id= $(this).attr("id");
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
     $.ajax({
       type: "PUT",
       url: "/tasks/"+id,
       data: {id:id},
       dataType: "json",
       success: function (response) {
        fetchtask();
         
       }
     });
     
  });
</script>
@endsection
