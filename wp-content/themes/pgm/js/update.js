$(document).ready(function() {

	$.editable.addInputType('custom_input', {
    	element : function(settings, original) {
            var input = $('<input size=20 class="input_inline"/>');
            if (settings.width  != 'none') { input.attr('width', settings.width);  }
            if (settings.height != 'none') { input.attr('height', settings.height); }
            /* https://bugzilla.mozilla.org/show_bug.cgi?id=236791 */
            //input[0].setAttribute('autocomplete','off');
            input.attr('autocomplete','off');
            $(this).append(input);
            return(input);
        }
    });

	$('.editable').editable(MyAjax.ajaxurl, {
        indicator : 'Sauvegarde ...', // Texte qui sera affiché lors de la sauvegarde.
        tooltip   : 'Cliquer pour éditer', // Texte affiché dans l'info bulle lors du survole du texte.
	    cancel    : 'Annuler', // Nom du bouton d'annulation.
        submit    : 'Valider', // Nom du bouton d'envoi.
        type 	  : 'custom_input',
        callback: function( sValue, y) {
        	sValue = JSON.parse(sValue);
        	if (sValue.valid) {
        		$(this).html(sValue.value);
        		$('#complete').html(sValue.complete);
        		
        	}else {
        		$(this).html(this.revert);
        		console.log(sValue.error);
        	}
        	
        },
        submitdata : {
        	target: $("#update_target").val(),
        	elem_id: $("#user_id").val(),
        	securite_nonce: $("#securite_nonce").val(),
        	action: "update",
        	},       
	});


	$('.edit_area').editable(MyAjax.ajaxurl, {
        indicator : 'Sauvegarde ...', // Texte qui sera affiché lors de la sauvegarde.
        tooltip   : 'Cliquer pour éditer', // Texte affiché dans l'info bulle lors du survole du texte.
	    cancel    : 'Annuler', // Nom du bouton d'annulation.
        submit    : 'Valider', // Nom du bouton d'envoi.
        type	  : 'textarea',
        rows	  : 5,       
        callback: function( sValue, y) {
        	sValue = JSON.parse(sValue);
        	if (sValue.valid) {
        		var retval = sValue.value.replace(/\n/gi, "<br>\n");
        		$(this).html(retval);
        		$('#complete').html(sValue.complete);
        		
        	}else {
        		$(this).html(this.revert);
        		console.log(sValue.error);
        	}
        	
        },
        data: function(value, settings) {
        	value = value.replace(/\r/gi, "");
        	value = value.replace(/\n/gi, "");
        	var retval = value.replace(/<br>/gi, "\n");
        	return retval;
        },
        submitdata : {
        	target: $("#update_target").val(),
        	elem_id: $("#user_id").val(),
        	securite_nonce: $("#securite_nonce").val(),
        	action: "update",
        	},       
	});

    $('#useravatar img').click(function(){
        
    });
});