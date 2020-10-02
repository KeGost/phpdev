$(document).ready( function () {
	$("form").submit( function (event) {
		event.preventDefault()

		$.ajax ({
			url:$(this).attr('action'),
			type: $(this).attr('method'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				data = JSON.parse(result);
				for (var key in data) {
					switch (key) {
						case "success":
							continue;
						case "successLogin":
							window.location.href = 'enter.php';
							break;
						case "successRegister":
							$("#loginForm").show();
							$("#registerForm").hide();
							swal("Отлично!", data[key], "success");
							break;
						case "error":
							continue;
						case "errorMsg":
							swal("Упс...", data[key], "error");
							break;
						case "logout":
							window.location.href = 'index.php';
							$("#showLogin").show();
							$("#showRegister").show();
							$("#logout").hide();
							break;
						default: 
							alert("Возникли непредвиденные трудности");
							break;
					}
				}
			}
		})
	});
	$(document).on('click', '#showLogin', function(e){
        if($('#loginForm').css('display') == "none") 
        { 
            $('#loginForm').show();
            $('#registerForm').hide();
        } 
        else 
        { 
            $('#loginForm').hide(); 
            $('#registerForm').hide(); 
        } 
    }); 
    $(document).on('click', '#showRegister', function(e){
        if($('#registerForm').css('display') == "none") 
        { 
            $('#loginForm').hide(); 
            $('#registerForm').show(); 
        } 
        else 
        { 
            $('#loginForm').hide(); 
            $('#registerForm').hide(); 
        } 
    });
});


