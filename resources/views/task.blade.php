<table class="table table-striped">
<thead>
    <tr>
    
      <th>Task</th>
      
      <th>Status</th>
      
      

 </tr>
  </thead>
  <tbody>
  @if(!empty($tasks) && $tasks->count())
   @foreach($tasks as $row)
   <tr>
 
 @if($row->status==0)
 <td >{{ $row->task }}</td>
 @else
 <td ><del>{{ $row->task }}</del></td>
 @endif
 
 @if($row->status==0)
 <td><input type="checkbox" id="{{ $row->id }}" class="chk_id" > </td>
 @else
 <td><h6>Task Completed</h6></td>
 @endif
   </tr>
   @endforeach
 @else
 <tr>
 <td colspan="4">No data found.</td>
 </tr>
 @endif
  </tbody>

</table>