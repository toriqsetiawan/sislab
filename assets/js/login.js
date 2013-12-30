$(document).ready(function() {

	$(window).bind('load resize', function() {
		var winY = $(window).height(),
			windowX = $(window).outerWidth(),
			windowY = $('html, body').outerHeight();

		$('#sequence').css('height', winY);

		$('#myLogin').click(function(){
			var href = $(this).attr('href'),
			popUp = $('.login-popup' + $(this).attr('href'))
			popUp.fadeIn(300);
			$('.login-popup, .overlay').css({
				'height': 	windowY
			});
			return false;
		});

		$('.overlay').click(function(){
			$('.login-popup').fadeOut(300);
			return false;
		});
	});

	$("#submite").click(function(e) {
        e.preventDefault();
        user = $("#loginuser").val();
        pass = $("#loginpass").val();

        if(user==''){
            $("#status").show();
            $("#status").html("Please fill Username field");
            setInterval(function(){
	   			$("#status").hide();
	   		},1500);
        }
        else if(pass==''){
            $("#status").show();
            $("#status").html("Please fill Password field");
            setInterval(function(){
	   			$("#status").hide();
	   		},1500);
        }
        else {
            var datastr = 'user='+user + '&pass='+pass; 
            $.ajax({
                url: 'login_user/process',
                type: 'POST',
                data: datastr,
                dataType: 'text',
                success:function(result) {
                	if ( result == "ok" ) {
	                    $("#status").show();
            			$("#status").html("Login Successfully");
	                }
	                else {
	                    $("#status").show();
	                    $("#status").html("Login Failure");
	                }
	                setInterval(function(){
			   			$("#status").hide();
			   			window.location.href = "/sislab";
			   		},1500);
	            }
            });
        }
    });
	
	$("#submit-msg").click(function(e) {
        e.preventDefault();
        usermsg = $("#message").val();

        if(usermsg==''){
            $("#alert-msg").html("Please fill Message field");
            setInterval(function(){
	   			$("#alert-msg").html("Message");
	   		},2000);
        }
        else {
            var datastr = 'message='+usermsg; 
            $.ajax({
                url: 'message/add_msg',
                type: 'POST',
                data: datastr,
                dataType: 'text',
                success:function(result) {
                	if ( result == "ok" ) {
            			$("#alert-msg").html("Success");
	                } else if( result == "login") {
	                	$("#alert-msg").html("Please Login");
	                } else {
	                	$("#alert-msg").html("Failure");
	                }	
	                setInterval(function(){
			   			$("#status").hide();
			   			window.location.href = "/sislab";
			   		},2000);
	            }
            });
        }
    });
}); // end of jQuery
;

