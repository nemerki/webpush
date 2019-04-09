/*
$(document).ready(function(){
		$('#phone').mask("0 (999) 999 99 99",{
		placeholder: '0 (___) ___ __ __'	
	});
	$('#iban').mask('SS00 0000 0000 0000 0000 00', {
		placeholder: '____ ____ ____ ____ ____ __'
	});
});
		*/
		
	 $("#register-form").validate({
    	wrapper: "div",
        // Specify the validation rules
        rules: {
            "email": {
                required: true,
                email: true
            },	
           					
			"pass":{
				required:true,
				minlength: 6	
			},
			"username":{
				required: true,
                minlength: 5
			},
			
			"phone":{
				required:true
			},
					
			"blog":{
				required:true,
				
			},
			"traffic_month":{
				required:true	
			},	
			"domain":{
				required:true,
				
			},
			"website":{
				required:true,
				
			},	
			"subdomain_name":{
				required:true,
				
			}															
        },
        messages: {
            	
            "email": {
                required:"E-mail adresiniz.",
                email: "Geçersiz e-posta."
            },					
			"pass":{
				required:"Şifrenizi girin.",
				minlength: "En az 6 karakterli."	
			},
			"username":{
				required:" Kullanıcı Adı Girin.",
					
			},
					
			"phone":{
				required:"Telefon Numaranızı girin."
			},
			"blog":{
				required:"Blog Adresinizi Girin.",
				
			},	
			"traffic_month":{
				required:"Aylık Trafik Girin.",
				
			},
			"domain":{
				required:"Domain Seçin."	
			},
			"website":{
				required:"Website Girin."	
			},
			"subdomain_name":{
				required:"subdomain Girin."	
			}		
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });
