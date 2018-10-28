@extends('layouts.teacherLayout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="padding: 10px;">
            <h3 class="box-title">List of Classes</h3>

            </div>
             <div class="box-footer clearfix">
              <div class="col-md-8 mb-3">
                
              
              <a id="viewAddClass" class="btn btn-md btn-info btn-flat pull-left">Add New Class</a>
              <br></div>

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
                    <th>Class ID</th>
                    <th>Class Name</th>
                    <th>Quizzes</th>
                     
                    <th>Date</th>
                   
                    <th>Delete</th>
                    <th>View</th>
                  </tr>
                  </thead>

                  @foreach($classes as $class)
                  <tbody>
                 
                    

                  <tr>

                   

                     
                  	<td>{{$class -> intClassID}}</td>
                  	<td>{{$class -> strName}}</td>
                  	<td></td>
                    <td>{{$class -> dtStart}}</td>
                     
               
                    
                     <td>
                      <form action="/teacher/class/delete" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$class -> intClassID}}">
                        <button type="submit" class="btn btn-danger btn-md"><em class="fa fa-trash">
                        </em></button>
                      </form>
                    </td>
                     <td>
                          <button id="viewClass" class="btn btn-success btn-md" data-name='{{$class -> strName}}' data-id='{{$class -> intClassID}}' data-quiz='' data-enrolled='' data-description='{{$class -> strDescription}}'><em class="fa fa-edit" >
                        </em></button>
                      
                  
                    </td>

                  </tr>
                
                   
                 
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div><br><br><br>
          </div>
          <!-- /.box -->


          <!-- signUp Teacher -->
    <div id="viewClassModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
               <center>                   
               <div class="row">
                                    <h2 id="classID" style="padding: 10px;">Class</h2>
                  
                                </div>                 </center>
      </div>
      <div class="modal-body">
   

            

						<fieldset>
							
							<div class="form-group">
                <label id="className"> Class Name:</label>
								<!-- <input class="form-control" placeholder="Name" name="nameClass" autofocus="" required> -->
							</div>
							<div class="form-group" style="padding-right: 60px;">

                 <label id="classEnrolled" > Numbers of Enrolled: </label> <button  class="btn btn-success btn-md pull-right" >View</button>
								<!-- <textarea id="defects" placeholder="Add Description" name="descriptionClass" rows="10" style="width:100%;"></textarea> -->
							</div>
              <div class="form-group" style="padding-right: 60px;">
                <label id="classQuiz">Quizzes: </label> <button  class="btn btn-success btn-md pull-right" >View</button>
              </div>
              <div class="form-group">
                <label>Description:</label>
                <p id="classDescription"></p>
              </div>
							

							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> --><center>
							 <input type="submit" class="btn btn-primary" value="Edit">
							 </center>
							</fieldset>
			
                                

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>



     <div id="addClassModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
               <div class="row">
                                    <h2 style="padding: 10px;">Add Class</h2>
                  
                                </div>                 
      </div>
      <div class="modal-body">
   
<center>
                               <form  action="/addClass" role="form" method="post">

            <fieldset>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <input class="form-control" placeholder="Name" name="nameClass" autofocus="" required>
              </div>
              <div class="form-group">
                <textarea id="defects" placeholder="Add Description" name="descriptionClass" rows="10" style="width:100%;"></textarea>
              </div>
              

              <!-- <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">Remember Me
                </label>
              </div> -->
               <input type="submit" class="btn btn-primary" value="Add Class">
               
              </fieldset>
          </form>
                                </center>

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>




	<!-- end -->
       
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewAddClass',function(){
      $('#addClassModal').modal('show');
       
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewClass',function(){
      var id='Class '+$(this).data('id');
      var name='Class Name: '+$(this).data('name');
      var enrolled='Numbers of Enrolled: '+$(this).data('enrolled');
      var quiz='Quizzes: '+$(this).data('quiz');
      var description=$(this).data('description');
      $('#classDescription').text(description);
      $('#classQuiz').text(quiz);
      $('#classEnrolled').text(enrolled);
      $('#classID').text(id);
      $('#className').text(name);
      $('#viewClassModal').modal('show');
       
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