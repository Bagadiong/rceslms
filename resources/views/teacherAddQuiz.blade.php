@extends('layouts.teacherLayout')

@section('content')


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="padding: 10px;">
            <h3 class="box-title">List of Quizzes</h3>

            </div>
             <div class="box-footer clearfix">
              <div class="col-md-8 mb-3">
                
              
              <a id="viewAddQuiz" class="btn btn-md btn-info btn-flat pull-left">Add New Quiz</a>
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
                    <th>Quiz ID</th>
                    <th>Quiz Name</th>
                    <th>Class Name</th>
                     
                    
                   
                    <th>Date</th>
                    <th>Delete</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Question</th>

                  </tr>
                  </thead>

                  @foreach($quiz as $quizzes)
                  <tbody>
                 
                    

                  <tr>
                     
                  	<td>{{$quizzes -> intQuizID}}</td>
                  	<td>{{$quizzes -> strName}}</td>
                  	<td>{{$quizzes -> class}}</td>
                   
                    <td>{{$quizzes -> dtStart}}</td>
                    
                     <td>
                      <form action="/teacher/quiz/delete" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$quizzes -> intQuizID}}">
                        <button type="submit" class="btn btn-danger btn-md"><em class="fa fa-trash">
                        </em></button>
                      </form>
                    </td>
                     <td>
                          <button id="viewQuiz" class="btn btn-success btn-md"  data-id='{{$quizzes -> intQuizID}}' data-qname='{{$quizzes -> strName}}' data-name='{{$quizzes -> class}}' ><em class="fa fa-edit" >
                        </em></button>
                      
                      
                    </td>

                    <td>
                    	@if($quizzes -> bitClose == 1)
                    	<form action="/openQuiz" method="post">
                    		<input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$quizzes -> intQuizID}}">
                    	
                    	<button type="submit" id="statusClass" class="btn btn-success btn-md">Open
                        </button>
                        @elseif($quizzes -> bitClose == 0)
                            <form action="/closeQuiz" method="post">
                    		<input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$quizzes -> intQuizID}}">
                    	

                        <button type="submit" id="statusClass" class="btn btn-danger btn-md" >Close
                        </button> 
                        @endif
                    	</form>

                    </td>
                    <td>
                    	<button id="viewAddQuestion" class="btn btn-success btn-md"  data-id='{{$quizzes -> intQuizID}}'><em class="fa fa-plus" >
                        </em></button>
                    </td>
                    
                    

                  </tr>
                
                   
                 
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div><br><br><br>
          </div>



          <!-- modal add quiz -->
 <div id="addQuestionModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
               <div class="row"><center>
                                    <h2 style="padding: 10px;">Add Question</h2>
                                      </center>
                  
                                </div>                 
      </div>
      <div class="modal-body">
   

                               <form  action="/addQuestion" role="form" method="post">

            <fieldset>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" id="quizID" name="quizID" value="">
              <div class="form-group">
                <input class="form-control" placeholder="Question" name="questionQuestion" autofocus="" required>
            </div>
                <div class="form-group">
                <select id="typeQuiz" class="form-control" name="typeQuestion">
                	<option value="1">Multiple Choice</option>
                	<option value="2">True or False</option>
                	<option value="3">Enumeration</option>
                </select>
              </div>

               <div id="divMultipleChoice" class="form-group">
               	<div class="row" style="padding-left: 40px;">
               		<input type="radio" name="choice" value="1">&nbsp&nbsp&nbsp&nbsp
               		 <input style="height:40px; font-size:14pt;" placeholder="Choice 1" name="choice1Question" autofocus="" >
            	</div><br>
            	<div class="row" style="padding-left: 40px;">
            		<input type="radio" name="choice" value="2">&nbsp&nbsp&nbsp&nbsp
               		 <input style="height:40px; font-size:14pt;"  placeholder="Choice 2" name="choice2Question" autofocus="" >
				</div><br>
					<div class="row" style="padding-left: 40px;">
					<input type="radio" name="choice" value="3">&nbsp&nbsp&nbsp&nbsp
               		 <input style="height:40px; font-size:14pt;"  placeholder="Choice 3" name="choice3Question" autofocus="" >
                </div><br>
                <div class="row" style="padding-left: 40px;">
                	<input type="radio" name="choice" value="4">&nbsp&nbsp&nbsp&nbsp
               		 <input style="height:40px; font-size:14pt;"  placeholder="Choice 4" name="choice4Question" autofocus="" >
              </div>
          </div>
              <div id="divTrueorFalse" class="form-group">
              	<div class="row" style="padding-left: 40px;">
              		<input type="radio" name="choices" value="True">&nbsp&nbsp&nbsp&nbsp
                <input style="height:40px; font-size:14pt;"  name="trueQuestion" autofocus="" value="True" required disabled>
            </div><br>
            <div class="row" style="padding-left: 40px;">
            	<input  type="radio" name="choices" value="False">&nbsp&nbsp&nbsp&nbsp
                <input style="height:40px; font-size:14pt;" name="falseQuestion" autofocus="" value="False" required disabled>
            </div>
                
              </div>
              <div id="divEnumeration" class="form-group">
                <input class="form-control" placeholder="Answer" name="enumerationQuestion">
               
              </div>

              
        
              

              <!-- <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">Remember Me
                </label>
              </div> -->
              <center>
               <input type="submit" class="btn btn-primary" value="Add Question">
               </center>
              </fieldset>
          </form>
                              

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>


 <div id="addQuizModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
               <div class="row">
                                    <h2 style="padding: 10px;">Add Quiz</h2>
                  
                                </div>                 
      </div>
      <div class="modal-body">
   
<center>
                               <form  action="/addQuiz" role="form" method="post">

            <fieldset>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <input class="form-control" placeholder="Name" name="nameQuiz" autofocus="" required>
              </div>
              <div class="form-group">
                <select class="form-control" name="classQuiz">
                	@foreach($classes as $class)
                	<option value="{{$class -> intClassID}}">{{$class -> strName}}</option>
                	@endforeach
                </select>

              </div>
              

              <!-- <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">Remember Me
                </label>
              </div> -->
               <input type="submit" class="btn btn-primary" value="Add Quiz">
               
              </fieldset>
          </form>
                                </center>

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>


    <div id="viewQuizModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
               <center>                   
               <div class="row">
                                    <h2 id="classID" style="padding: 10px;">Quiz</h2>
                  
                                </div>                 </center>
      </div>
      <div class="modal-body">
   

            

						<fieldset>
							
							<div class="form-group">
                <label id="className"> Class Name:</label>
								<!-- <input class="form-control" placeholder="Name" name="nameClass" autofocus="" required> -->
							</div>


							<div class="form-group">
                <label id="quizName"> Quiz Name:</label>
								<!-- <input class="form-control" placeholder="Name" name="nameClass" autofocus="" required> -->
							</div>
							<div class="form-group" style="padding-right: 60px;">

                 <label  > View Questions </label> <form action="/quizGetQuestion" method="post">
                 	 <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" id="quizQuestion" value="">
                 	<button  class="btn btn-success btn-md pull-right" type="submit" >View</button>
                 </form>
								<!-- <textarea id="defects" placeholder="Add Description" name="descriptionClass" rows="10" style="width:100%;"></textarea> -->
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

<script type="text/javascript">
	$(document).ready(function() {
    $('#divTrueorFalse').hide();
    $('#divEnumeration').hide();
});



</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewQuiz',function(){
      var id='Quiz '+$(this).data('id');
      var name='Class Name: '+$(this).data('name');
      var qname='Quiz Name: '+$(this).data('qname');
      
      
     
      $('#quizName').text(qname);
      $('#quizQuestion').val($(this).data('id'));
      $('#classID').text(id);
      $('#className').text(name);
      $('#viewQuizModal').modal('show');
       
    });
  });
</script>

<script type="text/javascript">
	$('#typeQuiz').on('change', function () {
   if (this.value == '1') {
    $("#divMultipleChoice").fadeIn();
    $("#divEnumeration").fadeOut();
    $("#divTrueorFalse").fadeOut();
    } else if(this.value == '2') {
    $("#divMultipleChoice").fadeOut();
    $("#divTrueorFalse").fadeIn();
    $("#divEnumeration").fadeOut();
    
   } else if(this.value == '3'){
   	$("#divMultipleChoice").fadeOut();
    $("#divEnumeration").fadeIn();
    $("#divTrueorFalse").fadeOut();
   }

   });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewAddQuiz',function(){
      $('#addQuizModal').modal('show');
       
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewAddQuestion',function(){
    	 $('#quizID').val($(this).data('id'));
      $('#addQuestionModal').modal('show');
       
    });
  });
</script>
@endsection