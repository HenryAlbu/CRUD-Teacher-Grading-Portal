<!DOCTYPE html>

<html>
<head>
    <title>Gradster - Grading System</title>	
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script>
        window.addEventListener('load', function() {
            document.getElementById('menu-student-signin').addEventListener('click', show_student_signin_modal_window);
			document.getElementById('menu-teacher-signin').addEventListener('click', show_teacher_signin_modal_window);
            document.getElementById('menu-join').addEventListener('click', show_join_modal_window);
            document.getElementById('blanket').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-teacher-signin').addEventListener('click', hide_all_modal_windows);
			document.getElementById('cancel-student-signin').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-join').addEventListener('click', hide_all_modal_windows);
            document.getElementById('student_only').style.display = 'none';  
            
            <?php
                if (isset($display_type))
                    if ($display_type == 'signin')
                        echo 'show_signin_modal_window();';
                    else if ($display_type == 'join')
                        echo 'show_join_modal_window();';
                    else
                        ;
            ?>
        });
        function show_student_signin_modal_window() {
            document.getElementById('blanket').style.display = 'block';
            document.getElementById('student-signin').style.display = 'block';
        }
		function show_teacher_signin_modal_window() {
            document.getElementById('blanket').style.display = 'block';
            document.getElementById('teacher-signin').style.display = 'block';
        }			
        function show_join_modal_window() {
            document.getElementById('blanket').style.display = 'block';
            document.getElementById('join').style.display = 'block';
        }
        function hide_all_modal_windows() {
            document.getElementById('blanket').style.display = 'none';
            document.getElementById('student-signin').style.display = 'none';
			document.getElementById('teacher-signin').style.display = 'none';
            document.getElementById('join').style.display = 'none';
        }
    </script>
</head>

<body>
	<img class='header-image top-margin' src='img/gradester-logo.png' />
    
    
	<div class="container">
  <div class="row top-margin">
    <div class="col-md-6">
	 <img style="float:right;" id='menu-teacher-signin' src='img/teacher-home-image.png' />
    
    </div>
    <div class="col-md-6">
     <img style="float:left;" id='menu-student-signin' src='img/student-home-image.png' />
    </div>
  </div>  
		<div class="row">
    <div class="col-md-12">
	 <button id='menu-join' type="button" class="btn create-button">CREATE ACCOUNT</button>   
    </div>
   
  </div>  
</div>
	
	
	
    
    
    <div id='blanket'>
    </div>
    <!-- ############################# STUDENT LOGIN MODAL ############################# -->
    <div id='student-signin' class='modal-window'> 
    <div class="row">
      <div class="col-md-5"> 
      <img src="img/student.png" style="max-width:69%">
      </div>
      <div class="col-md-7">
      <h1> STUDENT LOGIN </h1> 
        <form method='post' action='controller.php'>
              <input type='hidden' name='page' value='StartPage'></input>
              <input type='hidden' name='command' value='SignIn'></input>
              <div class="form-group">
                  <label for="username">Username:</label>
                  <input type='text' class="form-control" name='username' placeholder='Enter username' required></input>
                  <?php if (!empty($error_msg_username)) echo $error_msg_username; ?>
              </div>          
              <div class="form-group">
                  <label for="password">Password:</label>
                  <input type='password' class="form-control" name='password' placeholder='Enter password' required></input>
                  <?php if (!empty($error_msg_password)) echo $error_msg_password; ?>
              </div>                  
              <button  class="btn btn-default" type='submit' value='Submit'>Submit</button>           
	    		<!-- made the cancel button a reset since cancel keep sending values anyway -->
              <button  class="btn btn-default" id='cancel-student-signin' type='reset' value='Cancel'>Cancel</button>
          </form>
      </div>
    </div>
       

    </div>
  
   <!-- ############################# TEACHER LOGIN MODAL ############################# -->
   <div id='teacher-signin' class='modal-window'>
   <div class="row">
      <div class="col-md-5"> 
      <img src="img/teacher.png" style="max-width:100%">
      </div>
      <div class="col-md-7">
      <h1> TEACHER LOGIN </h1> 
        <form method='post' action='controller.php'>
              <input type='hidden' name='page' value='StartPage'></input>
              <input type='hidden' name='command' value='SignIn'></input>
              <div class="form-group">
                  <label for="username">Username:</label>
                  <input type='text' class="form-control" name='username' placeholder='Enter username' required></input>
                  <?php if (!empty($error_msg_username)) echo $error_msg_username; ?>
              </div>          
              <div class="form-group">
                  <label for="password">Password:</label>
                  <input type='password' class="form-control" name='password' placeholder='Enter password' required></input>
                  <?php if (!empty($error_msg_password)) echo $error_msg_password; ?>
              </div>                  
              <button  class="btn btn-default" type='submit' value='Submit'>Submit</button>           
	    		<!-- made the cancel button a reset since cancel keep sending values anyway -->
              <button  class="btn btn-default" id='cancel-teacher-signin' type='reset' value='Cancel'>Cancel</button>
          </form>
      </div>
    </div>
    </div>
    <!-- ############################# JOIN MODAL ############################# -->
    <div id='join' style="width:320px;left: calc(50% - 160px);" class='modal-window'>
        <h1 style='text-align:center'>JOIN</h1>
        <br>
        <form method='post' action='controller.php'>
            <input type='hidden' name='page' value='StartPage'></input>
            <input type='hidden' name='command' value='Join'></input>
            <div class="form-group">
                  <label for="username" class='modal-label'>Username:</label> 
                  <input type='text' class="form-control" name='username' placeholder='Enter username' required></input>
                  <?php if (!empty($error_msg_username)) echo $error_msg_username; ?>
            </div> 

            <div class="form-group">
                  <label for="password" class='modal-label'>Password:</label> 
                  <input type='password' class="form-control" name='password' placeholder='Enter password' required></input>
                  <?php if (!empty($error_msg_password)) echo $error_msg_password; ?>
            </div> 
            
            <div class="form-group">
                  <label for="full_name" class='modal-label'>Full Name:</label> 
                  <input type='text' class="form-control" name='full_name' placeholder='Enter Full Name' required></input>           
            </div> 
           
			<div class="radio">
			  <label><input type="radio"  onclick='disappear()' id='student_radio' name="user_type" value="0">Student</label>
			</div>
			<div class="radio">
			  <label><input type="radio" onclick='disappear()' id='teacher_radio' name="user_type" value="1" checked>Teacher</label>
			</div>	
            <div id="student_only">
                <label for="select">Select Class:</label> 
                <select class="form-control" id="select" name="select">
                    <option value="2">Oracle Class</option>
                    <option value="3">CISCO Class</option>
                    <option value="4">Microsoft Class</option>
                    <option value="5">AWS Class</option>
                </select>
            </div>
            <br>
            <button class="btn btn-default" type='submit' value='Submit'>Submit</button>
            <button class="btn btn-default" type='reset' value='Reset'>Reset</button>
			<!-- made the cancel button a reset since cancel keep sending values anyway -->
            <button id='cancel-join' class="btn btn-default" type='reset' value='Cancel'>Cancel</button>
        </form>
        <br>
    </div>
    <script>
        function disappear() {
            if(document.getElementById('student_only').style.display == 'inline'){
            document.getElementById('student_only').style.display = 'none';     
            }else{
            document.getElementById('student_only').style.display = 'inline';
            }      
        }

    </script>

</body>
</html>
