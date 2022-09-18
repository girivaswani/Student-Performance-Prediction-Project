<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vesit</title>
	<link rel="icon" type="image/png" href="images/icons/vesitlogo.png"/>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
		
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="css/sidebar_style.css">
        <link rel="stylesheet" href="css/styles_nsp.css">
		<script type="text/javascript" src="js/nsp.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


</head>
<body style="background-image: linear-gradient(to right, #A2DDF6 , #008ECC);">
<div class="wrapper d-flex align-items-stretch">
<nav id="sidebar">
				<!-- <div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div> -->
	  		<div class="img bg-wrap text-center py-4" >
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(images/icons/vesitlogo1.png);"></div>
	  				<h3>VESIT Admin</h3>
					  <h3></h3>
	  			</div>
	  		</div>
			  <!-- <div class="img" ></div> -->
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="addsubject.php"><span class="fa fa-book mr-3"></span> Add Subject</a>
          </li>
          <li>
              <a href="addclass.php"><span class="fa fa-university mr-3"></span> Add Class</a>
          </li>
          <li>
            <a href="addteacher.php"><span class="fa fa-male mr-3"></span> Add Teacher</a>
          </li>
          <li>
            <a href="addstudent.php"><span class="fa fa-user-circle-o mr-3"></span>Add Student</a>
          </li>
          <li>
            <a href="addrelation.php"><span class="fa fa-list-ul mr-3"></span>Assign Class</a>
          </li>
          <li>
            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

    	</nav>
			<div id="content" class="p-4 p-md-5 pt-5">
				<div class="signup-form" style="margin-top: 10rem;">
					<div class="form-group">
						<form name="add_name" id="add_name">
						<h3>ADD Subject</h3>
							<div class="table-responsive">
								<table class="table table-bordered" id="dynamic_field">
									<tr>
										<td><input type="text" name="name[]" placeholder="Enter Subject" class="form-control" id="ip1" required></td>
										<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
									</tr>
								</table>
								<div style="text-align: center;">
								<input type="button" name="submit" id="submit" class="btn btn-primary btn-lg"  value="Add Subjects" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<div class="modal fade" id="exampleModal" 
            tabindex="-1" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" 
                            id="exampleModalLabel">
                            Subject Inserted Successfully!
                        </h5>
                          
                        <button type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
  
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
				
                </div>
            </div>
        </div>
	
</body>
</html>
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'" ><td><input type="text" name="name[]" placeholder="Enter Subject" class="form-control name_list" id="ip'+i+'"  /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
		
});

$('#submit').click(function(){	
		var ip = document.querySelectorAll('[id^="ip"]');
		var rows = document.querySelectorAll('[id^="row"]');
		console.log(ip.length);	
		var n=ip.length;
		var n1=rows.length;
		var i;
		var inside=false;
		for(i=0;i<n;i++){
			console.log($(ip[i]).val());
			if($(ip[i]).val()==""){
				console.log("YEs");
				inside=true;
				swal({
					title: "Please select subject!",
				});
				break;
			}
		}
		if(inside==false){
			$.ajax({
				url:"addsubjectphp.php",
				method:"POST",
				data:$('#add_name').serialize(),
				success:function(data)
				{
					// alert(data);
					$('#add_name')[0].reset();
					$('#exampleModal').modal();
					console.log(rows);
					console.log(n1);
					for(i=0;i<n1;i++){
						$(rows[i]).remove();
						console.log("In");
					}	
					
			        // window.location.href='addsubject.php';
				}
			});
			// $('#exampleModal').modal("show");
		}
		
		// $.ajax({
		// 	url:"addsubjectphp.php",
		// 	method:"POST",
		// 	data:$('#add_name').serialize(),
		// 	success:function(data)
		// 	{
		// 		alert(data);
		// 		$('#add_name')[0].reset();
        //         // window.location.href='student_home.php';
		// 	}
		// });
	});

</script>