jQuery(document).ready(function($) {
    $("input[name='has_link']").bind("change", function(){
        $("#kodeklubb_link_label").toggle();
        $("#kodeklubb_link_field").toggle();
    });

    $("input[name='has_facebook_link']").bind("change", function(){
        $("#kodeklubb_facebook_link_label").toggle();
        $("#kodeklubb_facebook_link_field").toggle();
    });

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
			var contact_response = $.parseJSON(response);

			if(!contact_response.name && !contact_response.email){
				$('.error-message').append(
					"Navn og e-post er obligatorisk"
				);
				return;
			}

			var contactHTML = 
				"<strong>Navn:  </strong> <span>" + contact_response.name + "</span><br/>" +
				"<strong>E-post:  </strong> <span>" + contact_response.email + "</span><br/>";

			if(contact_response.phone){
				contactHTML += "<strong>Telefon:  </strong> <span>" + contact_response.phone + "</span><br/>";
			}

			if(contact_response.role){
				contactHTML += "<strong>Rolle:  </strong> <span>" + contact_response.role + "</span><br/>";
			}

			contactHTML += "<hr/>";

			$('#contact_list').append(
				contactHTML
			);

			$("input[name='kodeklubb_contact_name_field']").val("");
			$("input[name='kodeklubb_contact_phone_field']").val("");
			$("input[name='kodeklubb_contact_email_field']").val("");
			$("input[name='kodeklubb_contact_role_field']").val("");			
				//echo "<a class='kodeklubb-delete-contact' href=''>Slett</a>";
			
		});
    });
});
