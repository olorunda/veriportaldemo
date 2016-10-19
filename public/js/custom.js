$(function() {

	$(document).ajaxStart(function() {
		paceOptions = {
			elements: true,
			ajax: true,
			restartOnRequestAfter: true,
			restartOnPushState: true
		}
	}).stop(function() {
	});

    //$("#e").ladda('bind');
    

    Ladda.bind('#vsearch', {timeout:2000});

    $(document).ajaxStart(function(){
    	$("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
    	$("#wait").css("display", "none");
    });

    $("#sendmsg").click(function(e) {
    	e.preventDefault();
    	$("#msg-pane").show("slow");
    	$("#addmem-pane").hide("slow");
    	$("#addmem").removeClass('active');
    	$("#sendmsg").addClass('active');
    	$("#skillTable").removeClass('active');
    });
    $("#addmem").click(function(e) {
    	e.preventDefault();
    	$("#addmem-pane").show("slow");
    	$("#msg-pane").hide("slow");
    	$("#addmem").addClass('active');
    	$("#sendmsg").removeClass('active');
    	$("#skillTable").hide("slow");
    	$("#showskills").removeClass('active');
    });

    $("#showskills").click(function(e){
    	e.preventDefault();
    	$("#skillTable").show("slow");
    	$("#addmem-pane").hide("slow");
    	$("#msg-pane").hide("slow");
    	$("#showskills").addClass('active');
    	$("#sendmsg").removeClass('active');
    	$("#addmem").removeClass('active');
    });

    $("#reload").click(function(e) {
    	e.preventDefault();
    	location.reload();
    });

    $("#send").click(function(e){
    	e.preventDefault();
    	var name = $("#uname").val();
    	var email = $("#email").val();
    	var token = $("#_token").val();

    	var formData = {'name':name, 'email':email, '_token':token};
    	$.get('/checkmail', formData, function(data,xhr,status){
    		if(data) {
    			swal("Interview", "This E-Mail recipient already exist!", "error");
    			return false;
    		} else {
    			$.post('/panelists', formData, function(data,xhr,status){
    				console.log(data);
    			});
    		}
    	});
    });

    $("#addSkill").click(function(e) {
    	var token = $("#addToken").val();
    	var skill = $("#skill").val();
    	var grade = $("#grade").val();
    	var formData = {'_token':token, 'skill':skill, 'grade':grade};
    	if(skill=="" || skill == null) {
    		swal("Interview", "Please enter a valid skill/qualification to continue.", "error");
    	} else {
    		$.post('/checkskill', formData, function(data,xhr,status) {
    			if(data) {
    				swal("Interview", "Skill could not be added because it already existed. Please add another skill.", "error");
    			} else {
    				$.post('/addskill', formData, function(data,xhr,status) {
    					if(data) {
    						swal("Interview", "Skill was successfully added", "success");
    						location.reload();
    					} else {
    						swal("Interview", "Skill could not be added! Please try again", "error");
    					}
    				});
    			}
    		});
    	}
    	e.preventDefault();
    });

    $("button").click(function(e) {
    	var selectedButton = $(this).attr('id');
    	var selectedIndex = selectedButton.match(/\d+/);
    });
});

function validateRating(rate) {
	var range = /^(?:5(?:\.0)?|[1-4](?:\.[0-9])?|0?\.[1-9])$/;
	return range.test(rate);
}

function edit(index) {
	var name = $("#edituname"+index).val();
	var email = $("#editemail"+index).val();
	var token = $("#_edittoken"+index).val();
	var formData = {'name':name, 'email':email, '_token':token};
	swal({
		title: "Interview",   
		text: "You are about to edit " + name + " data?",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, Continue!",   
		closeOnConfirm: false 
	}, function(){
		$.post('/editmember', formData, function(data,xhr,status){
			if(data) {
				swal("Interview", "Update Successfull", "success");
				window.location.reload();
			} else {
				swal("Interview", "The update was not successfull! Please try again", "error");
			}
		});
	});
}

function editSkills(index) {
	var oldskill = $("#oldskill"+index).val();
	var skill = $("#editskillskill"+index).val();
	var grade = $("#gradeedit"+index).val();
	var token = $("#_editskilltoken"+index).val();
	var formData = {'oldskill':oldskill, 'skill':skill, 'grade':grade, '_token':token};
	swal({
		title: "Interview",   
		text: "You are about to edit " + oldskill + "?",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, Continue!",   
		closeOnConfirm: false 
	}, function(){
		$.post('/editskill', formData, function(data,xhr,status){
			if(data) {
				swal("Interview", "Update Successfull", "success");
				window.location.reload();
			} else {
				swal("Interview", "The update could not be applied. Please try again.", "error");
			}
		});
	});
}


function deleteSkill(index) {
	var skill = $("#editskillskill"+index).val();
	var grade = $("#gradeedit"+index).val();
	var token = $("#_editskilltoken"+index).val();
	var formData = {'skill':skill, 'grade':grade, '_token':token};
	swal({
		title: "Interview",   
		text: "You are about to delete " + skill + "?",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, Continue!",   
		closeOnConfirm: false 
	}, function(){
		$.post('/deleteskill', formData, function(data,xhr,status){
			if(data) {
				swal("Interview", skill + " Deleted", "success");
				window.location.reload();
			} else {
				swal("Interview", "The last operation was not successfull! Please try again", "error");
				console.log(data);
			}
		});
	});
}

function deletemember(index) {
	var name = $("#edituname"+index).val();
	var email = $("#editemail"+index).val();
	var token = $("#_edittoken"+index).val();
	var formData = {'name':name, 'email':email, '_token':token};
	swal({
		title: "Interview",   
		text: "You are about to delete " + name + " data?",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, Continue!",   
		closeOnConfirm: false 
	}, function(){
		$.post('/deletemember', formData, function(data,xhr,status){
			if(data) {
				swal("Interview", "Data Deleted", "success");
				window.location.reload();
			} else {
				swal("Interview", "The last operation was not successfull! Please try again", "error");
			}
		});
	});
}

function submitrate(index) {
	var ratings = [];
	var total = $("#total").val();
	var i = total;
	ratings['_token'] = $("#skillToken").val();
	ratings['user'] = $("#user").val();
	while(i>0) {
		ratings['skillvalue'+i] = $("#skillvalue"+i).val();
		ratings['skillname'+i] = $("#skillname"+i).val();	
		i--;
	}
	ratings['ref_num'] = $("#ref_num"+index).val();
	ratings['total'] = (total * 2) + 5;
	ratings['comments'] = $("#comments"+index).val();
	var formData = $.extend({}, ratings);
	swal({
		title: "Interview",   
		text: "Note this cannot be undone?",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, Continue!",   
		closeOnConfirm: false 
	}, function(){
		swal({
			title: "Interview - Please wait...",
            text: "<div class='cssload-wrap'><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div></div>",
            type: "success",
            html: true,
            showCancelButton: false,
            closeOnConfirm: false
        });
		$.post('/rate1', formData, function(data,xhr,status) {
			console.log(data);
			if(data) {
				swal("Interview - Continue", "Update Successfull!", "success");
				//window.location.href="/comments";
				window.location.reload();
			} else {
				swal("Interview", "The last operation was not successfull! Please try again", "error");
			}
		});
	});
}

function saver(serial) {
	var ratings = {};
	ratings['skillvalue'+serial] = $("#skillvalue"+serial).val();
	ratings['skillname'+serial] = $("#skillname"+serial).val();
}