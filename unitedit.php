<?php
// include dashboard.
include "header-test.php";
// include db connection.
include 'includes/dbh.inc.php';

// check GET request id param
if(isset($_GET['id'])){

	$id = Mysqli_real_escape_string($conn, $_GET['id']);

	$sql = "SELECT * FROM units WHERE id=$id";


	//get query results

	$result = Mysqli_query ($conn, $sql);

	//fetch result in array format
	$pizza = Mysqli_fetch_assoc($result);



	Mysqli_free_result($result);
	Mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Transcript Management System - Edit Units</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

     <link rel="stylesheet" href="css2/styles.css">
  </head>
<body id="unit" style="background-color: #c0c0c0;">

<?php if($pizza): ?>

<div class="container" style="margin-top: 2vh;">
<h3 style="text-align: center; color: blue;">Edit Unit Details</h3>
<form action="javascript:void(0)" id="ajax-form">
        <div class="row" style="margin-top:6vh">
            <div class="col col-md-4">
              <label for="newunitid">Unit ID</label>
              <input type="text" readonly class="form-control" id="newunitsid" name="newunitsid" value="<?php echo htmlspecialchars($pizza['units_id']); ?>">
            </div>
            <div class="col col-md-4">
              <label for="gender">Unit Name</label>
              <input type="text" class="form-control" id="newunitname" name="newunitname" value="<?php echo htmlspecialchars($pizza['unit_name']); ?>">
            </div>
            <div class="col col-md-4">
              <label for="gender">Department</label>
              <input type="text" class="form-control" id="newdepartment" name="newdepartment" value="<?php echo htmlspecialchars($pizza['department']); ?>">
            </div>

        </div> <br>

        <div class="row">
					<div class="col col-md-4">
						<label for="gender">Course</label>
						<input type="text" class="form-control" id="newcourse" name="newcourse" value="<?php echo htmlspecialchars($pizza['course']); ?>">
					</div>
          <div class="col col-md-4">
            <label for="newlevel">Level<span style="color:red;">*</span></label>
            <select class="form-control" id="newlevel" name="newlevel">
              <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['level']); ?></option>
              <option>Diploma</option>
              <option>Certificate</option>
              <option>Masters</option>
              <option>Phd</option>
              <option>Bachelor</option>
            </select>
          </div>
          <div class="col col-md-4">
            <label for="newlevel">Status<span style="color:red;">*</span></label>
            <select class="form-control" id="newstatus" name="newstatus">
              <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['status']); ?></option>
              <option>Disabled</option>
              <option>Active</option>
            </select>
          </div>

            <div class="col col-md-4">

              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $pizza['id']; ?>" readonly>
            </div>
       </div> <br>
          <button type="submit" name="submit" class="btn btn-primary">Update Unit</button>
          <span>
            <p class="alert alert-success" id="show_message" style="display: none; color:green;">Unit Updated Successfully</p>
            <p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
          </span>
</form>
    </div>
  <?php else: ?>
  <?php endif; ?>
  <script type="text/javascript">
 $(document).ready(function($){
    // hide messages
    $("#error").hide();
    $("#show_message").hide();

    // on submit...
    $('#ajax-form').submit(function(e){

        e.preventDefault();


        $("#error").hide();

				//Unit name required
				var newunitsid = $("input#newunitsid").val();
				if(newunitsid == ""){
						$("#error").fadeIn().text("Unit ID required.");
						$("input#newunitsid").focus();
						return false;
				}
				//Unit name required
        var newunitname = $("input#newunitname").val();
        if(newunitname == ""){
            $("#error").fadeIn().text("Unit Name required.");
            $("input#newunitname").focus();
            return false;
        }
		    //Department required
        var newdepartment = $("input#newdepartment").val();
        if(newdepartment == ""){
            $("#error").fadeIn().text("Department required.");
            $("input#newdepartment").focus();
            return false;
        }

		//Course required
        var newcourse = $("input#newcourse").val();
        if(newcourse == ""){
            $("#error").fadeIn().text("Course required.");
            $("input#newcourse").focus();
            return false;
        }

        // Level required
       var newlevel= $("select#newlevel").val();
        if(newlevel == ""){
            $("#error").fadeIn().text("Level required");
            $("select#newlevel").focus();
            return false;
        }

        // status required
          var newstatus = $("select#newstatus").val();
            if(newstatus == ""){
                $("#error").fadeIn().text("Status required");
                $("select#newstatus").focus();
                return false;
            }


        // ajax
        $.ajax({
            type:"POST",
            url: "unit-update.php",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(){
            $("#show_message").fadeIn();
            $("#show_message").fadeOut(5000);
			      $("#ajax-form")[0].reset();
            }

        });
    });

    return false;
    });
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
         integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
         integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
         integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>