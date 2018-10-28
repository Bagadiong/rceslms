<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form  action="/loginChecker" role="form" method="post">

						<fieldset>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							 <input type="submit" class="btn btn-primary" value="Login">
							 <a id="viewSignUp" class="btn btn-success">Sign Up</a>
							</fieldset>
					</form>
					
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	


	<div id="signUpModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
                <div class="row">
                                    <h2 style="padding: 10px;">Select User Type</h2>
                  
                                </div>                
      </div>
      <div class="modal-body">
   
<center>
                                <div class="row">
                             <a id="viewSignUpTeacher" class="btn btn-success" data-dismiss="modal">Teacher</a>
                         </div>
                             <div class="row">
                             <a id="viewSignUpStudent" class="btn btn-primary" data-dismiss="modal">Student</a>
                         </div>
                             <div class="row">
                             <a id="viewSignUpParent" class="btn btn-warning" data-dismiss="modal">Parent</a>

                             </div>
                                </center>

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>


    <!-- signUp Teacher -->
    <div id="signUpTeacherModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
               <div class="row">
                                    <h2 style="padding: 10px;">Teacher Sign Up</h2>
                  
                                </div>                 
      </div>
      <div class="modal-body">
   
<center>
                               <form  action="/signUpTeacher" role="form" method="post">

						<fieldset>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="nameTeacher" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="emailTeacher" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="usernameTeacher" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="passwordTeacher" type="password" value="" required>
							</div>

							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							 <input type="submit" class="btn btn-primary" value="SignUp">
							 
							</fieldset>
					</form>
                                </center>

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>




	<!-- end -->

	<!-- start sign up student -->

	<div id="signUpStudentModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
               <div class="row">
                                    <h2 style="padding: 10px;">Student Sign Up</h2>
                  
                                </div>                 
      </div>
      <div class="modal-body">
   
<center>
                               <form  action="/signUpStudent" role="form" method="post">

						<fieldset>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="nameStudent" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="emailStudent" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="usernameStudent" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="passwordStudent" type="password" value="" required>
							</div>

							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							 <input type="submit" class="btn btn-primary" value="SignUp">
							 
							</fieldset>
					</form>
                                </center>

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>
	<!-- end -->


	<!-- start sign up student -->

	<div id="signUpParentModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
               <div class="row">
                                    <h2 style="padding: 10px;">Parent Sign Up</h2>
                  
                                </div>                 
      </div>
      <div class="modal-body">
   
<center>
                               <form  action="/signUpParent" role="form" method="post">

						<fieldset>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="nameParent" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="emailParent" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="usernameParent" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="passwordSParent" type="password" value="" required>
							</div>

							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							 <input type="submit" class="btn btn-primary" value="SignUp">
							 
							</fieldset>
					</form>
                                </center>

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div></div></div>
	<!-- end -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewSignUp',function(){
      $('#signUpModal').modal('show');
       
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewSignUpTeacher',function(){
      $('#signUpTeacherModal').modal('show');
       
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewSignUpStudent',function(){
      $('#signUpStudentModal').modal('show');
       
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#viewSignUpParent',function(){
      $('#signUpParentModal').modal('show');
       
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
</body>
</html>
