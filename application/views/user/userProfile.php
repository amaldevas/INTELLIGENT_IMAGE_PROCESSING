<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div>
		<?php if(!empty($error)){ echo $error; } ?>
		<?php if(!empty($message)){ echo $message; } ?>

		<h1>Upload Photo</h1>
		 <form role="form" action="" method="POST" enctype="multipart/form-data" class="form1">
			<label>Select Your Photo :- </label><input type="file" id="user-image" name="user-image[]" multiple >
			<input type="hidden" name="user-name">
			<input type="hidden" name="count" class="count" value="0">
			<br>
			<br>
			<input type="submit" id="submit" name="submit" value="Upload">
		</form>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
    

    $("input[type=file]").change(function(){
    	$("input").remove(".count");
    	 var files = $(this)[0].files;
        alert(files.length);
        var k=files.length;
        var row = "<input type='hidden' name='count' class='count' value='"+k+"'>";
                            $('.form1').append(row);
    });
});
</script>
</html>