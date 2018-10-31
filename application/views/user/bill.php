<!DOCTYPE html>
<html>
<head>
	 <?php
 header("Access-Control-Allow-Origin: *");
 ?>
	<script src="https://cdn.rawgit.com/naptha/tesseract.js/0.2.0/dist/tesseract.js">

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title></title>
</head>
<body>
	<div>
		<div id="ocr_results"> </div>
		<div id="ocr_status"> </div>
	</div>

</body>
<script type="text/javascript">
$(document).ready(function(){
	 var st = new Array();
    <?php foreach($url as $key => $val){ ?>
        st.push('<?php echo $val; ?>');
    <?php } ?>
    var count="<?php echo $count; ?>";
			for(var i=0;i<count;i++)
			{
				var url = 'http://localhost:8081/Billing/assets/'+st[i];
				alert(url);
            	runOCR(url);

			}
});
	function runOCR(url) {
    Tesseract.recognize(url)
         .then(function(result) {
            var row = "<div>"+result.text+"</div><hr>";
                            $('#ocr_results').append(row);
         }).progress(function(result) {
            document.getElementById("ocr_status")
                    .innerText = result["status"] + " (" +
                        (result["progress"] * 100) + "%)";
        });

}
</script>
</html>