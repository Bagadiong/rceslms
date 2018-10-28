@extends('layouts.studentLayout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="padding: 10px;">
            <h3 class="box-title">List of Quizzes</h3>

            </div>

             <div class="box-footer clearfix">
              
              <div class="col-md-4 mb-3">
              <form action="/searchRU" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="text" name="searchRU" placeholder="Search">
                <input type="submit" name="" class="btn-primary btn-md" value="Search">
              </form>
            </div></div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Quiz ID</th>
                    <th>Class Name</th>
                    <th>Quiz Name</th>
                     
                    <th>Date</th>
                   <th>Score</th>
                    
                    <th>View</th>
                  </tr>
                  </thead>

                  @foreach($classes as $class)
                  <tbody>
                 
                    

                  <tr>

                   

                     
                  	<td>{{$class -> intQuizID}}</td>
                  	<td>{{$class -> class}}</td>
                  	<td>{{$class -> quiz}}</td>
                    <td>{{$class -> dtStart}}</td>
                    @if($class -> intScore!=null)
                     <td>{{$class -> intScore}}</td>
                    @else
                    <td>No record</td>
                    @endif
               
                    
                     
                     <td>
                          <button id="viewClass" class="btn btn-success btn-md" data-name='{{$class -> class}}' data-id='{{$class -> intClassID}}' data-quiz='' data-enrolled='' ><em class="fa fa-edit" >
                        </em></button>
                      
                  
                    </td>

                  </tr>
                
                   
                 
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div><br><br><br>

        </div>

        <div id="enrollClassModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
               <div class="row">
                                    <h2 style="padding: 10px;">Enroll Class</h2>
                  
                                </div>                 
      </div>
      <div class="modal-body">
   
<center>
                               <form  action="/enrollClass" role="form" method="post">

            <fieldset>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <input class="form-control" type="number" placeholder="Class ID" name="idClass" autofocus="" required>
              </div>
              
              

              <!-- <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">Remember Me
                </label>
              </div> -->
               <input type="submit" class="btn btn-primary" value="Enroll Class">
               
              </fieldset>
          </form>
                                </center>

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>


<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewEnrollClass',function(){
      $('#enrollClassModal').modal('show');
       
    });
  });
</script>

<script>
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"

		switch(type){
			case 'info':
		         toastr.info("{{ Session::get('message') }}");
		         break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
         	case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'error':
		        toastr.error("{{ Session::get('message') }}");
		        break;
		}
	@endif
</script>

@endsection