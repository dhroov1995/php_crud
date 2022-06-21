

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/adminlte.js"></script>


   
<script src="js/select2.full.min.js"></script>
<script src="js/datepicker.js"></script>



<script>
/*image upload*/
$(function() { 
	$(document).on("change", '.sortpicture2', function() {
		var id=this.id;
		var attrlisting=$("#"+id+"").attr("attr-listing"); 
    
    var attr_type=$("#"+id+"").attr("attr-type"); 
		var file_data = $("#"+id+"").prop('files')[0];   
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		form_data.append('imgname', 'screenshot');
		form_data.append('type', attr_type);
		$('#imgsr_error2').html('<p class="error">Uploading please wait..</p>');
		$.ajax({
			url: 'ajax_upload.php', 
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			success: function(php_script_response){
				var data = jQuery.parseJSON(php_script_response);
				if(php_script_response!=""){ 
					$("#sortpicture_2").val(''); 
					$('#imgsr_error2').html('');
					if(data[3]!=""){
						$('#imgsr_error2').html(data[3]);
					}else{
						$('#imgsr_'+attrlisting+'').html(data[0]);
						$('#imageid_'+attrlisting+'').html(data[2]);
						/* $('#imageurl_'+attrlisting+'').val(data[2]);*/
					}
				}
			}
		}); 
	});
});
/*image upload*/
</script>

</body>
</html>
