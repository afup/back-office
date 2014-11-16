var Login = function() {
	"use strict";
	var runBoxToShow = function() {
		var el = $('.box-login');
                var body = $('body');
                
		if (body.hasClass('register')) {
                    el = $('.box-register');
                } else if (body.hasClass('request')) {
                    el = $('.box-forgot');
                }
                
		el.show().addClass("animated flipInX").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			$(this).removeClass("animated flipInX");
		});
	};
	var runLoginButtons = function() {
		$('.main-login').on('click','.forgot', function(event) {
                    
                    event.preventDefault();
                    
                    $('.loading-forgot').show();
                   
                    showModuleAjax($(this), '.box-forgot', function(){
                        $('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                            $(this).hide().removeClass("animated bounceOutRight");
                        });

                        $('.loading-forgot').hide();
                        
                        $('.box-forgot').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                            $(this).show().removeClass("animated bounceInLeft");
                        });
                    });
		});
		$('.main-login').on('click','.register', function(event) {
                    
                    event.preventDefault();
                     
                    $('.loading-register').show();
                    
                    showModuleAjax($(this), '.box-register', function(){
                        $('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                            $(this).hide().removeClass("animated bounceOutRight");
                        });
                        
                        $('.loading-register').hide();
                        
                        $('.box-register').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                            $(this).show().removeClass("animated bounceInLeft");
                        });
                    });

		});
		$('.main-login').on('click','.go-back', function() {
                    var boxToShow;
                    if ($('.box-register').length !== 0 && $('.box-register').is(":visible")) {
                            boxToShow = $('.box-register');
                    } else {
                            boxToShow = $('.box-forgot');
                    }
                    boxToShow.addClass("animated bounceOutLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                            boxToShow.hide().removeClass("animated bounceOutLeft");

                    });
  
                    showModuleAjax($(this), '.box-login', function(){
                        $('.box-login').show().addClass("animated bounceInRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                            $(this).show().removeClass("animated bounceInRight");
                        });
                    });
		});
	};
        var showModuleAjax = function(click, className, callback) {
            if($(className).length === 0){
                $.ajax({
                    'url' : click.attr('href'),
                    'dataType' : 'html',
                    'success' : function(data){
                        $('.main-login').append(data);
                        callback();
                    }
                });
            } else {
                callback();
            }
            return;
        };
	//function to return the querystring parameter with a given name.
	var getParameterByName = function(name) {
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search);
		return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	};
	var runSetDefaultValidation = function() {
		$.validator.setDefaults({
			errorElement : "span", // contain the error msg in a small tag
			errorClass : 'help-block',
			errorPlacement : function(error, element) {// render error placement for each input type
				if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {// for chosen elements, need to insert the error after the chosen container
					error.insertAfter($(element).closest('.form-group').children('div').children().last());
				} else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
					error.appendTo($(element).closest('.form-group').children('div'));
				} else {
					error.insertAfter(element);
					// for other inputs, just perform default behavior
				}
			},
			ignore : ':hidden',
			success : function(label, element) {
				label.addClass('help-block valid');
				// mark the current input as valid and display OK icon
				$(element).closest('.form-group').removeClass('has-error');
			},
			highlight : function(element) {
				$(element).closest('.help-block').removeClass('valid');
				// display OK icon
				$(element).closest('.form-group').addClass('has-error');
				// add the Bootstrap error class to the control group
			},
			unhighlight : function(element) {// revert the change done by hightlight
				$(element).closest('.form-group').removeClass('has-error');
				// set error class to the control group
			}
		});
	};
	var runLoginValidator = function() {
		var form = $('.form-login');
		var errorHandler = $('.errorHandler', form);
		form.validate({
			rules : {
				username : {
					minlength : 2,
					required : true
				},
				password : {
					minlength : 6,
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler.hide();
				form.submit();
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler.show();
			}
		});
	};
	var runForgotValidator = function() {
		var form2 = $('.form-forgot');
		var errorHandler2 = $('.errorHandler', form2);
		form2.validate({
			rules : {
				email : {
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler2.hide();
				form2.submit();
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler2.show();
			}
		});
	};
	var runRegisterValidator = function() {
		var form3 = $('.form-register');
		var errorHandler3 = $('.errorHandler', form3);
		form3.validate({
			rules : {
				full_name : {
					minlength : 2,
					required : true
				},
				address : {
					minlength : 2,
					required : true
				},
				city : {
					minlength : 2,
					required : true
				},
				gender : {
					required : true
				},
				email : {
					required : true
				},
				password : {
					minlength : 6,
					required : true
				},
				password_again : {
					required : true,
					minlength : 5,
					equalTo : "#password"
				},
				agree : {
					minlength : 1,
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler3.hide();
				form3.submit();
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler3.show();
			}
		});
	};
	return {
		//main function to initiate template pages
		init : function() {
			runBoxToShow();
			runLoginButtons();
			runSetDefaultValidation();
			runLoginValidator();
			runForgotValidator();
			runRegisterValidator();
		}
	};
}();
