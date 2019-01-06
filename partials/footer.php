<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script  src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript"  src="libraries/uploadify/jquery.uploadify.js"></script>
<script type="text/javascript"  src="libraries/uploadify/i18n/de.js"></script>
<script  src="libraries/parsley/parsley.min.js" type="text/javascript"></script>
<script  src="libraries/parsley/i18n/fr.js" type="text/javascript"></script>
<script src="assets/js/jquery.timeago.js">
</script>
<script src="assets/js/jquery.timeago.fr.js">
</script>
</script>
 <script src="libraries/alertifyjs/alertify.min.js" >
</script>
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery("time.timeago").timeago();
  jQuery(".like").on("click",function(e){
	  e.preventDefault();
	  var action = $(this).attr("data-action");
	    })
		var url ='ajax/search.php';
$('#searchbox').on('keyup', function(){
	var query = $(this).val();
	if(query.length > 0){
		$.ajax({
	type:'POST',
	url:url,
	data: { 
	query: query
	},
	beforeSend: function(){
		$("#spinner").show();
	},
	success: function(data){
		$("#spinner").hide();
		$("#display-results").html(data).show();
	}
	});
	} else
	{
	$("#display-results").hide();	
	}
	

	});
	  });
</script>

</body>
</html>
