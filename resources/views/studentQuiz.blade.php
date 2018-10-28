@extends('layouts.studentLayout')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="padding: 10px;">
            <h3 class="box-title">{{$className}}</h3>
             <h4 class="box-title" style="padding: 15px;" >{{$quizName}}</h4>
            </div>
            @php
            $count=0;
            @endphp
            @foreach ($classes as $class)

            @if(($class -> intQuizTypeID) ==1)

            <div class="panel panel-container">
			<div class="row">
          
					<div class="pull-left" >
						<div class="row" style="padding-left:40px;">

							<div class="form-group">
                <input class="form-control" value="{{$class -> strQuestion}}" name="questionQuestion" autofocus="" required disabled="">
            </div>
				<div id="divMultipleChoice" class="form-group">
               	<div class="row" style="padding-left: 40px;">
               		<input type="radio" name="choice" value="1">&nbsp&nbsp&nbsp&nbsp
               		 <input style="height:40px; font-size:14pt;"  name="choice1Question" autofocus="" disabled="" value="{{$data[$count][0] -> strChoice}}">
            	</div><br>
            	<div class="row" style="padding-left: 40px;">
            		<input type="radio" name="choice" value="2">&nbsp&nbsp&nbsp&nbsp
               		 <input style="height:40px; font-size:14pt;" value="{{$data[$count][1] -> strChoice}}"   name="choice2Question" autofocus=""  disabled="">
				</div><br>
					<div class="row" style="padding-left: 40px;">
					<input type="radio" name="choice" value="3">&nbsp&nbsp&nbsp&nbsp
               		 <input style="height:40px; font-size:14pt;" value="{{$data[$count][2] -> strChoice}}"  name="choice3Question" autofocus="" disabled="">
                </div><br>
                <div class="row" style="padding-left: 40px;">
                	<input type="radio" name="choice" value="4">&nbsp&nbsp&nbsp&nbsp
               		 <input style="height:40px; font-size:14pt;"  value="{{$data[$count][3] -> strChoice}}" name="choice4Question" autofocus="" disabled="" >
              </div>
          </div> 	
						</div>

					</div>
				
			</div>
			</div>


			@elseif(($class -> intQuizTypeID) ==2)
			 <div class="panel panel-container">
			<div class="row">
          
					<div class="pull-left" >
						<div class="row" style="padding-left:40px;">

			<div class="form-group">
                <input class="form-control" value="{{$class -> strQuestion}}" name="questionQuestion" autofocus="" required disabled="">
            </div>

			<div id="divTrueorFalse" class="form-group">
              	<div class="row" style="padding-left: 40px;">
              		<input type="radio" name="choices" value="True">&nbsp&nbsp&nbsp&nbsp
                <input style="height:40px; font-size:14pt;"  name="trueQuestion" autofocus="" value="{{$data[$count][0] -> strChoice}}" required disabled>
            </div><br>
            <div class="row" style="padding-left: 40px;">
            	<input  type="radio" name="choices" value="False">&nbsp&nbsp&nbsp&nbsp
                <input style="height:40px; font-size:14pt;" name="falseQuestion" autofocus="" value="{{$data[$count][1] -> strChoice}}" required disabled>
            </div>
                
              </div>
          </div></div></div></div>

              @elseif(($class -> intQuizTypeID) ==3)
               <div class="panel panel-container">
			<div class="row">
          
					<div class="pull-left" >
						<div class="row" style="padding-left:40px;">
              <div class="form-group">
                <input class="form-control" value="{{$class -> strQuestion}}" name="questionQuestion" autofocus="" required disabled="">
            </div>
               <div id="divEnumeration" class="form-group">
                <input class="form-control" placeholder="Answer" name="enumerationQuestion">
               
              </div>
          </div></div></div></div>
			@endif

			@php
            $count+=1;
            @endphp
			@endforeach




            </div>

@endsection