<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
      </style>
   </head>
   <body>
      <div style="background-color:#0000007a; padding:30px;" class='container'>         
         <div class='row'>            
            <div class='col-md-3'>
               <!-- ####################### LEFT - LIST CLASSES ############################## -->     
               <p class="white"> SELECT A CLASS </p>
               <div class="row">
                  <div class="col-md-8">
                     <form id='form-list-students'>
                        <select class="form-control" id='input-list-students'>
                         <option value="2">Oracle Class</option>
                         <option value="3">CISCO Class</option>
                         <option value="4">Microsoft Class</option>
                         <option value="5">AWS Class</option>
                        </select>
                  </div>
                  <div class="col-md-4">
                  <button id='submit-list-students' type="button" class="btn btn-success btn-block">Submit</button> 
                  </form>     
                  </div>
               </div>
               <!-- ####################### END LEFT - LIST CLASSES ############################## -->
               <br>
               <button id='create-assignment' data-toggle='modal' data-target="#modal-create-assignment" type="button" class="btn btn-success btn-block">CREATE ASSINGMENT</button>
               <ul class="nav nav-pills nav-stacked">                 
               </ul>
               <div id='content-side'>
               </div>
            </div>            
            <div class='col-md-9 bg-success'>
               <div id='content'>
               </div>
            </div>
         </div>
        



         <!-- ######################## LEFT CREATE ASSIGNMENT MODAL #############################-->                
         <div class="modal fade" id="modal-create-assignment" role="dialog">           
            <div class="modal-dialog">
               <div class="modal-content">                  
                  <form id='form-create-assignment'>
                     <div class='modal-header'>                       
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">CREATE ASSIGNMENT</h4>
                     </div>
                     <div class='modal-body'>                        
                        <label for='input-class'>For What Class?</label>
                        <select  class='form-control' id='input-class'>
                         <option value="2">Oracle Class</option>
                         <option value="3">CISCO Class</option>
                         <option value="4">Microsoft Class</option>
                         <option value="5">AWS Class</option>
                        </select>
                        <br>                            
                        <label for='input-create-assignment'>Assignment Name:</label>                            
                        <input id='input-create-assignment' class='form-control' type='text' autofocus required>
                        <label for='input-max-points'>Max Points for Assignment?</label>
                        <input id='input-max-points' class='form-control' type='text' autofocus required>
                     </div>
                     <div class='modal-footer'>                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button id='submit-create-assignment' type="button" class="btn btn-primary">Submit</button> 
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- ######################## END LEFT CREATE ASSIGNMENT MODAL #############################-->






         <!-- ####################### RIGHT ATTACH ASSIGNMENT MODAL ############################## -->                
         <div class="modal fade" id="modal-attach-assignments" role="dialog">           
            <div class="modal-dialog">
               <div class="modal-content">                  
                  <form id='form-attach-assignments'>
                     <div class='modal-header'>                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add an Assignment</h4>
                     </div>
                     <div class='modal-body'>
                        <label for='input-student-score'>Student Score:</label>
                        <input id='input-student-score' class='form-control' type='text' autofocus required>
                    
                    <label for=''>Choose assignment:</label>  
                        <div id='select-content'>
                        </div>
                     
                     </div>
                     <div class='modal-footer'>                       
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button id='submit-attach-assignments' type="button" class="btn btn-primary">Submit</button> 
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <tr>
        <!-- ####################### END RIGHT ATTACH ASSIGNMENT MODAL ############################## -->  






        
         <!-- ################################ LEFT WHEN SUBMIT CREATE ASSIGNMENT ####################### -->
         <script>
            var student; 
            var student_class;          
            $('#submit-create-assignment').click(function() 
            {
                $('#modal-create-assignment').modal('hide');                
                                
                var url = 'controller.php'; 
                var query = { page:"MainPage", 
                              command:"CreateAssignment",
                              assignment: $('#input-create-assignment').val(),
                              class: $('#input-class').val(),
                              max: $('#input-max-points').val()};
            
                $.post(url,query,
                    function(data) {
                        $('#content').html(data);
                });
            });
         </script>
         <!-- ################################ END LEFT WHEN SUBMIT CREATE ASSIGNMENT ####################### -->








         <!-- ################################ RIGHT WHEN ATTACH ASSIGNMENT BUTTON IS CLICKED ####################### -->
         <script>             
             $('#submit-attach-assignments').click(function() 
             {               
                 $('#modal-attach-assignments').modal('hide');                 
                    
                 var url = 'controller.php';  
                 var query = { page:"MainPage", 
                               command:"AttachAssignment",
                               assignment_score: $('#input-student-score').val(),
                               assignment_id: $('#input-assignment-id').val(),
                               student_id: student};  
             
                 $.post(url,query,
                     function(data) {
                         $('#content').html(data);  
                 });
                 
                 list_assignments(this,student);
             });
          </script>
          <!-- ################################ END RIGHT WHEN ATTACH ASSIGNMENT BUTTON IS CLICKED ####################### -->

          
          <!-- ########################## SHOWS ONLY ASSIGNMENTS FROM THAT STUDENTS CLASS ############################ -->
          <script>             
           function attach(){             
                 console.log(student_class);                               
                 var counter = 0   
                 var url = 'controller.php';  
                 var query = { page:"MainPage", 
                               command:"AttachAssignmentButton",
                               student_class: student_class};  
             
                 $.post(url,query,
                    function(data) {
                        var obj = JSON.parse(data);                        
                       
                      var t = '<select class=\'form-control\' id=\'input-assignment-id\'>';                           
                                          
                        for(var i =0; i< obj.length; i++){                           
                            for( p in obj[i]){                              
                               if(counter ==1){
                               t += '<option value=' + obj[i].id + '>' + obj[i].assignment_name + '</option>'
                               counter = 0;
                               }else{counter = 1}
                            }
                        
                        }
                        t  += '</select>';
                        $('#select-content').html(t);
                });                 
                 
             }              
          </script>
           <!-- ########################## END SHOWS ONLY ASSIGNMENTS FROM THAT STUDENTS CLASS ############################ -->






         <!-- ########################## RIGHT LIST STUDENTS ASSIGNMENTS WHEN STUDENT NAME CLICKED ############################ -->                
         <script>            
            function list_assignments(something,clr,cls){
            console.log(clr)            
            student = clr;
            student_class = cls;  
            console.log(student_class)              
                var url = "controller.php";  
                var query = { page:"MainPage", command:"ListAssignments",
                                assignment: clr };
            
                $.post(url,query,
                    function(data) {
                        var obj = JSON.parse(data);
                        var t = '<table class="table table-condensed">';
                        t += '<tr>';
                        for(var a in obj[0]){
                            t += '<th>' + a + "</th>";
                        }
                        t += '</tr>';                       
                        for(var i =0; i< obj.length; i++){
                            t += '<tr>';
                            for( p in obj[i]){
                               t +='<td>' + obj[i][p] + '</td>';
                            }
                            t  += '</tr>';
                        }
                        t += '</table><button id=\'attach-assignments\' onclick=\'attach()\' data-target=\'#modal-attach-assignments\' data-toggle=\'modal\' type=\'button\' class=\'btn btn-success btn-block\'>ADD ASSIGNMENT TO STUDENT</button><br>';
                        $('#content').html(t);
                });
            }
         </script>
         <!-- ##########################  END RIGHT LIST STUDENTS ASSIGNMENTS WHEN STUDENT NAME CLICKED  ############################ -->
            






         <!-- ########################## LEFT LIST STUDENT NAMES ############################ -->                
         <script>         
            $('#submit-list-students').click(function() {                      
                var url = "controller.php"; 
                var query = { page:"MainPage", command:"ListStudents",
                                class: $('#input-list-students').val() }; 
            
                $.post(url,query,
                    function(data) {                       
                        var obj = JSON.parse(data);
                        console.log(obj);
                        var t = '<br><p class="white">STUDENTS</p><table class="table table-condensed">';
                        var counter = 0;   
                        for(var i =0; i< obj.length; i++){
                            t += '<tr>';
                            for( p in obj[i]){
                               //So that it doesnt show ID numbers in results
                               if(counter == 0){ 
                               t +='<td style=\'border-top:0px;\'><button type="button" onclick="list_assignments(this, \'' +  obj[i].id +'\',  \'' +  obj[i].class_id +'\')" class="btn btn-default" data-dismiss="modal">' + obj[i][p] + '</button></td>';
                               counter++;
                            }else if(counter == 1){
                                counter ++}
                            else{counter = 0}

                            }
                            t  += '</tr>';
                        }
                        t += '</table>';
                        $('#content-side').html(t);
                });
            });
         </script>
         <!-- ########################## END LEFT LIST STUDENT NAMES ############################ -->


         <!-- ########################### SIGN OUT ###########################-->
         <form id='form-signout' method='post' action='controller.php' style='display:none'>
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='SignOut'>
         </form>
         <script>
            function signout() {
                document.getElementById('form-signout').submit(); 
            }            
            $('#signout').click(signout);
         </script>
         <!-- ########################### SIGN OUT ###########################-->
      </div>
   </body>
</html>