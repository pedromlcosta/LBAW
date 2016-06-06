$(document).ready(function() {

	// Person creation toggle and form submition
	$("#personEditForm").submit( editHandler);

});

 function editHandler(event){
	event.preventDefault();
	event.stopPropagation();
	var formData = new FormData(this);
	$('input[type=checkbox]').each(function(){ 
		 formData.append(this.name,this.checked );
	});   
	 var BASE_URL = $("#url").val();
	 var person = $("#personCode").val();
	  formData.append("username",person);
	$.ajax({
		url: '../../api/personEdit.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: formData,
		cache : false,
  		processData: false,	
  		contentType: false,
		success: function(data, textStatus, jqXHR) {
		 	if (typeof data.error === 'undefined') {	
					$("#success_messages").empty();	
				if (data.indexOf("true") > -1) {
					 
					 window.location.href =  BASE_URL + "pages/Person/personalPage.php?person="+person;
				} else {
					  $("#error_messages").empty();
					 $("#error_messages").append(data);
					// console.log(data.search(/\w+_\w+_key/));
					// console.log(data.substring(130,data.length))
				}
				
				

			} else {
				// Handle errors here
				console.log('ERRORS: ' + data.error); 
			} 
		},
		error: function(jqXHR, textStatus, errorThrown) {
			// Handle errors here
			console.log('ERRORS: ' + textStatus);
			// STOP LOADING SPINNER
		}
	});

}