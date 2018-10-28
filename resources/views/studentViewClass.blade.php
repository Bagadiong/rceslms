@extends('layouts.studentLayout')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="padding: 10px;">
            <h3 class="box-title">{{$className}}</h3>

            </div>
            <div class="panel panel-container">
			<div class="row">
          
					<div class="pull-left" >
						<div class="row" style="padding-left:40px;">Teacher: {{$teacherName}}
							<br>
							  Date Started: {{$dtStart}}
							<br>
							Description: {{$description}}	
						</div>

					</div>
				
			</div>
		</div>
<div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Quiz ID</th>
                    <th>Quiz Name</th>
                    <th>Items</th>
                     
                    <th>Date</th>
                   
                  
                    <th>Start Quiz</th>
                  </tr>
                  </thead>
                  @php
                  	$counter=0;
                  	@endphp
                  @foreach($classes as $class)
                  <tbody>
                 
                    

                  <tr>

                   

                     
                  	<td>{{$class -> intQuizID}}</td>
                  	<td>{{$class -> quiz}}</td>

                  	<td>{{$item[0] -> item}}</td>
                  	@php
                  	$counter+=1;
                  	@endphp
                    <td>{{$class -> dtStart}}</td>
                     
               
                    
                     
                    <td>
                      <form action="/student/class/view/quiz" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$class -> intQuizID}}">
                         <input type="hidden" name="classID" value="{{$class -> intClassID}}">
                         <input type="hidden" name="teacherID" value="{{$class -> intTeacherID}}">
                         <input type="hidden" name="className" value="{{$className}}">
                         <input type="hidden" name="quizName" value="{{$class -> quiz}}">
                       
                        <button type="submit" class="btn btn-success btn-md"><em class="fa fa-external-link">
                        </em></button>
                      </form>
                    </td>

                  </tr>
                
                   
                 
                  </tbody>
                  @endforeach
                </table>
              </div>

        </div>
@endsection