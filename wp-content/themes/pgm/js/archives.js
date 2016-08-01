$(function($){

	$("#archive-wrapper").height($("#archive-pot").height());

	$("#archive-browser select").change(function() {
	
		$("#archive-pot")
			.empty()
			.html("<div style='text-align: center; padding: 30px;'><img src='/wp-content/themes/DiggingIntoWordPress-2/images/ajax-loader.gif' /></div>");
	
		var dateArray = $("#month-choice").val().split("/");
		var y = dateArray[3];
		var m = dateArray[4];
		var c = $("#cat").val();
		
		$.ajax({
		
			url: "",
			dataType: "html",
			type: "POST",
			data: ({
				"digwp_y": y,
				"digwp_m" : m,
				"digwp_c" : c
			}),
			error: function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
  alert(err.Message);
},
			success: function(data) {
				$("#archive-pot").html(data);
				
				$("#archive-wrapper").animate({
					height: $("#archives-table tr").length * 50
				});
			
			}
			
		});
			
	});

});