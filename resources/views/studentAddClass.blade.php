@extends('layouts.studentLayout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="padding: 10px;">
            <h3 class="box-title">List of Classes</h3>

            </div>

             <div class="box-footer clearfix">
              <div class="col-md-8 mb-3">
                
              
              <a id="viewAddClass" class="btn btn-md btn-info btn-flat pull-left">Enroll New Class</a>
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
                    <th>Teacher</th>
                     
                    <th>Date</th>
                   
                    <th>Leave</th>
                    <th>View</th>
                  </tr>
                  </thead>

                  @foreach($classes as $class)
                  <tbody>
                 
                    

                  <tr>

                   

                     
                  	<td>{{$class -> intClassID}}</td>
                  	<td>{{$class -> class}}</td>
                  	<td>{{$class -> teacher}}</td>
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
                          <button id="viewClass" class="btn btn-success btn-md" data-name='{{$class -> class}}' data-id='{{$class -> intClassID}}' data-quiz='' data-enrolled='' data-description='{{$class -> strDescription}}'><em class="fa fa-edit" >
                        </em></button>
                      
                  
                    </td>

                  </tr>
                
                   
                 
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div><br><br><br>

        </div>


@endsection