jQuery(document).ready(function($) {
	$("a.kodeklubb-delete-contact").on('click', function(event){
    	handle_delete(event);
    });

    function handle_delete(event){    	
    	var post_id = $("input[name='post_id']").val();
    	var contact_id = event.target.id;
    	
    	var data = {
			'action': 'delete_contact',
			'id': post_id,
			'contact_id': contact_id
		};

		$.post(ajaxurl, data, function(response) {
			if(response === "deleted"){
				$("a#"+contact_id).parent().remove();
			}
		});
    }

    $("button[name='append_contact']").click(function(){
    	var contact = {
    		name: $("input[name='kodeklubb_contact_name_field']").val(),
    		phone: $("input[name='kodeklubb_contact_phone_field']").val(),
    		email: $("input[name='kodeklubb_contact_email_field']").val(),
    		role: $("input[name='kodeklubb_contact_role_field']").val()
    	};

		$('.error-message').empty();

    	var post_id = $("input[name='post_id']").val();

	    var data = {
			'action': 'save_contact',
			'id': post_id, 
			'contact': contact
		};

		$.post(ajaxurl, data, function(response) {
			if(response.indexOf("invalid_email") !== -1){
				$('.error-message').append(
					"Ugyldig e-post"
				);
				return;
			}

			var contact_response = $.parseJSON(response);

			if(!contact_response.name && !contact_response.email){
				$('.error-message').append(
					"Navn og e-post er obligatorisk"
				);
				return;
			}

			var contactHTML = 
				"<div>" +
				"<a id='"+contact_response.id+"' class='kodeklubb-delete-contact' href='javascript:void(0);'>Slett</a>" +
				"<strong>Navn:  </strong> <span>" + contact_response.name + "</span><br/>" +
				"<strong>E-post:  </strong> <span>" + contact_response.email + "</span><br/>";

			if(contact_response.phone){
				contactHTML += "<strong>Telefon:  </strong> <span>" + contact_response.phone + "</span><br/>";
			}

			if(contact_response.role){
				contactHTML += "<strong>Rolle:  </strong> <span>" + contact_response.role + "</span><br/>";
			}

			contactHTML += "<hr/></div>";

			$('#contact_list').append(
				contactHTML
			);

			$("input[name='kodeklubb_contact_name_field']").val("");
			$("input[name='kodeklubb_contact_phone_field']").val("");
			$("input[name='kodeklubb_contact_email_field']").val("");
			$("input[name='kodeklubb_contact_role_field']").val("");	
			

		    $("a.kodeklubb-delete-contact").on('click', function(event){
		    	handle_delete(event);
		    });
		});
    });
});