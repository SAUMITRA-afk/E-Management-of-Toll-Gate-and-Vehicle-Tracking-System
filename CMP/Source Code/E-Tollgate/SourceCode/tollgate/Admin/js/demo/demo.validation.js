/*
 * Dandelion Admin v1.0 - Form Validation JS
 *
 * This file is part of Dandelion Admin, an Admin template build for sale at ThemeForest.
 * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
 *
 * Development Started:
 * March 25, 2012
 *
 */

(function($) {
	$(document).ready(function(e) {
		if($.fn.chosen) {
			$("#da-ex-val-chzn").chosen().bind("change", function(){
				$("#da-ex-validate3").validate().element($(this));
			});
		}
		
		if($.fn.spinner) {
			$("#da-ex-val-spin").spinner();
		}
		
		if($.fn.validate) {
			$("#da-ex-validate1").validate({
				rules: {
					staffid: {
						required: true
					},
					name: {
						required: true
					},
					branid: {
						required: true
					},
					dob: {
						required: true
					},
					age: {
						required: true
					},
					gender: {
						required: true
					},
					address: {
						required: true
					},
					phone: {
						required: true
					},
					mobile: {
						required: true
					},
					doj: {
						required: true
					},
					salary: {
						required: true
					},
					country: {
						required: true
					},
					location: {
						required: true
					},
					emailid: {
						required: true, 
						email: true
					}, 
					//url1: {
//						required: true, 
//						url: true
//					}, 
					pass: {
						required: true, 
						minlength: 5
					}, 
					//cpass1: {
//						required: true, 
//						minlength: 5, 
//						equalTo: '#pass1'
//					}, 
					grpid: {
						required: true
					},
					designation: {
						required: true
					},
					image: {
						required: true
					},
				}, 
				invalidHandler: function(form, validator) {
					var errors = validator.numberOfInvalids();
					if (errors) {
						var message = errors == 1
						? 'You missed 1 field. It has been highlighted'
						: 'You missed ' + errors + ' fields. They have been highlighted';
						$("#da-ex-val1-error").html(message).show();
					} else {
						$("#da-ex-val1-error").hide();
					}
				}
			});
			
			
			
			$("#da-ex-validate_branch").validate({
				rules: {
					bid: {
						required: true
					}, 
					bname: {
						required: true
					},
					location: {
						required: true
					},
					address: {
						required: true
					},
					Postal: {
						required: true
					},
					url: {
						required: true, 
   					    url: true
					},
					country: {
						required: true
					},
					mobile: {
						required: true
					},
					phone: {
						required: true
					},
					emailid: {
						required: true, 
						email: true
					},
					fax: {
						required: true
					},
					nostaff: {
						required: true
					},
					start: {
						required: true
					},
					image: {
						required: true
					},				
					
				}, 
				invalidHandler: function(form, validator) {
					var errors = validator.numberOfInvalids();
					if (errors) {
						var message = errors == 1
						? 'You missed 1 field. It has been highlighted'
						: 'You missed ' + errors + ' fields. They have been highlighted';
						$("#da-ex-val2-error").html(message).show();
					} else {
						$("#da-ex-val2-error").hide();
					}
				}
			});
			
			
			$("#da-ex-validate_policy").validate({
				rules: {
					pid: {
						required: true,
						digits: true,
						rangelength: [3, 100]
					}, 
					pname: {
						required: true
					},
					ptype: {
						required: true
					},
					policyper: {
						required: true
					},
					amount: {
						required: true
					},
					ben: {
						required: true
   					    
					},
					image: {
						required: true
					},
					
				}, 
				invalidHandler: function(form, validator) {
					var errors = validator.numberOfInvalids();
					if (errors) {
						var message = errors == 1
						? 'You missed 1 field. It has been highlighted'
						: 'You missed ' + errors + ' fields. They have been highlighted';
						$("#da-ex-val2-error").html(message).show();
					} else {
						$("#da-ex-val2-error").hide();
					}
				}
			});
			
			$("#da-ex-validate2").validate({
				rules: {
					minl1: {
						required: true, 
						minlength: 5
					}, 
					maxl1: {
						required: true, 
						maxlength: 5
					}, 
					rangel1: {
						required: true, 
						rangelength: [5, 10]
					}, 
					min1: {
						required: true, 
						digits: true, 
						min: 5
					}, 
					max1: {
						required: true, 
						digits: true, 
						max: 5
					}, 
					range1: {
						required: true, 
						digits: true, 
						range: [5, 10]
					}
				}, 
				invalidHandler: function(form, validator) {
					var errors = validator.numberOfInvalids();
					if (errors) {
						var message = errors == 1
						? 'You missed 1 field. It has been highlighted'
						: 'You missed ' + errors + ' fields. They have been highlighted';
						$("#da-ex-val2-error").html(message).show();
					} else {
						$("#da-ex-val2-error").hide();
					}
				}
			});
			
			$("#da-ex-validate3").validate({
				ignore: '.ignore', 
				rules: {
					gender: {
						required: true
					}, 
					sport: {
						required: true
					}, 
					file1: {
						required: true, 
						accept: ['.jpeg']
					}, 
					dd1: {
						required: true
					}, 
					chosen1: {
						required: true
					}, 
					spin1: {
						required: true, 
						min: 5, 
						max: 10
					}
				}
			});
			
			$("#da-ex-validate4").validate({
				rules: {
					email: {
						required: true, 
						email: true
					}, 
					pass2: {
						required: true, 
						minlength: 5
					}, 
					cpass2: {
						required: true, 
						minlength: 5, 
						equalTo: '#pass2'
					}, 
					address: {
						required: "#souvenirs:checked"
					}
				}
			});
		}
	});
}) (jQuery);