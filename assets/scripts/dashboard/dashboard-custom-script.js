// to hide and show by id
function hideandshow(hidedivid,showdivid=null) {
	if(null==showdivid){
		$('#'+hidedivid).toggle();
		return;
	}
$('#'+hidedivid).hide(300,function(){ $('#'+showdivid).show(400); });
	//$('#'+hidedivid).hide(200);
	//$('#'+showdivid).show(300);
}

function addEduRow(id){ 
            var markup = "<tr id='edu_tr_"+id+"'><td><div class='form-group'><input type='text' class='form-control' id='txt_standard' placeholder='BE/ME/MCA' name='qualification' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_institute' placeholder='YMN School' name='institute' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_board' placeholder='Central' name='board' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_passing_year' placeholder='2014' name='passing_year' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_percentage' placeholder='60' name='percentage' value=''></div></td><td><div class='form-group'><a href='#' onclick='deleteRow(this)' class='badge badge-danger  rounded-circle float-right' style='margin-top: 15px'><i class='fas fa-minus fa-1x'></i></i></a></div></td></tr>";
            $("#edu_table_tbody").append(markup);
        }

function addSkillRow(id){
	var markup = "<tr id='skill_tr_"+id+"'><td><div class='form-group'><input type='text' class='form-control' id='txt_skill' placeholder='Java/PHP/.Net' name='skill' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_version' placeholder='1/2.1/3' name='version' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_exprience' placeholder='2/4.1' name='exprience' value=''></div></td><td><div class='form-group'><a href='#' onclick='deleteRow(this)' class='badge badge-danger rounded-circle float-right' style='margin-top: 20px'><i class='fas fa-minus fa-1x'></i></a></div></td></tr>";
	$("#skill_table_tbody").append(markup);
}

function addCompRow(id){
	var markup = "<tr id='comp_tr_"+id+"'><td><div class='form-check'><input style='margin-top: 20px' class='form-check-input position-static' type='radio' name='radio_comp' id='radio_comp_0' value='0' aria-label='...'></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_comp_name_0' placeholder='Tata Cons' name='comp_name' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_city_0' placeholder='Pune' name='city' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_country_0' placeholder='India' name='country' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_join_date_0' placeholder='23/10/2018' name='join_date' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_leaving_date_0' placeholder='23/09/2023' name='leaving_date' value=''></div></td><td><div class='form-group'><a href='#' onclick='deleteRow(this)' class='badge badge-danger rounded-circle float-right' style='margin-top: 20px'><i class='fas fa-minus fa-1x'></i></a></div></td></tr>";
	$("#comp_table_tbody").append(markup);
}

function deleteRow(e){           
            $(e).parents("tr").remove();               
        }

function addProjectSection(id){
	var markup = " <div class='row top-row'><div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'> <div class='form-group'> <label for='sel_project_type-"+ id +"'>Project Type</label> <select class='form-control' id='sel_project_type-"+ id +"' name='project_type'> <option value='N'>Select</option> <option value='A'>Academic Project</option> <option value='C'>Company Project</option> <option value='B'>Back Pocket Project</option> </select> </div></div></div><div class='row'> <div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'> <div class='form-group'> <label for='txt_add_edit_project_name-"+ id +"'>Project Name</label> <input type='text' class='form-control' id='txt_add_edit_project_name-"+ id +"' name='project_name'> </div></div><div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_degree_name-"+ id +"'>Degree Name</label> <input type='text' class='form-control' id='txt_add_edit_degree_name-"+ id +"' name='degree_name'></div></div> <div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_technology-"+ id +"'>Technology</label> <input type='text' class='form-control' id='txt_add_edit_technology-"+ id +"' name='technology'></div></div> </div> <div class='row'><div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_domain-"+ id +"'>Domain</label> <input type='text' class='form-control' id='txt_add_edit_domain-"+ id +"' name='domain'></div></div> <div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_team_size-"+ id +"'>Team Size</label> <input type='text' class='form-control' id='txt_add_edit_team_size-"+ id +"' name='team_size'></div></div> <div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_duration-"+ id +"'>Duration</label> <input type='text' class='form-control' id='txt_add_edit_duration-"+ id +"' name='duration'></div></div></div><div class='row'><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'> <label for='txt_add_edit_responsibility-"+ id +"'>Responsibility</label> <input type='text' class='form-control' id='txt_add_edit_responsibility-"+ id +"' name='responsibility'></div></div><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'> <label for='txt_add_edit_contribution-"+ id +"'>Contribution</label> <input type='text' class='form-control' id='txt_add_edit_contribution-"+ id +"' name='contribution'></div></div></div><div class='row'><div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'><div class='form-group'> <label for='txt_project_description-"+ id +"'>Project Description</label> <textarea class='form-control' id='txt_project_description-"+ id +"' rows='3' name='project_description'></textarea></div></div></div><div class='row'><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'> <label for='txt_add_edit_remark-"+ id +"'>Remark</label> <input type='text' class='form-control' id='txt_add_edit_remark-"+ id +"' name='contribution'></div></div><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'> <label for='txt_add_edit_project_link-"+ id +"'>Project Link</label> <input type='text' class='form-control' id='txt_add_edit_project_link-"+ id +"' name='project_link'></div></div></div> ";
	$("#section_project").append(markup);
}

function addActivitySection(id){
	var markup = "<div class='row top-row'><div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'><div class='form-group'> <label for='txt_add_edit_heading-"+ id +"'>Heading</label> <input type='text' class='form-control' id='txt_add_edit_heading-"+ id +"' placeholder='' name='heading'></div></div> </div> <div class='row'> <div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'> <div class='form-group'> <label for='txt_activity_discription-"+ id +"'>Discription</label> <textarea class='form-control' id='txt_activity_discription-"+ id +"' rows='3' name='discription'></textarea> </div></div></div>";
	$("#section_activity").append(markup);
}

// to reset the form by id
function resetform(id){
	$(id)[0].reset();
}

//remember me set or unset value
function checkRememberMe(obj){
	if(obj.checked){
		$('#remember_me_value').val(1);
	}else{
		$('#remember_me_value').val(0);
	}
}

function checkaddress(obj){
	if(obj.checked){
		$('#txt_per_add').val($('#txt_current_add').val());
		$('#hid_same_addr').val(1);
		
	}else{
		$('#txt_per_add').val('');
		$('#hid_same_addr').val(0);
	}
}


function pointupload(d){	
	$('.upload-label').css('cursor', 'pointer');
	$('.profile-pic-upload-icon').css({"display": "inline", "margin": "auto","background": "rgba(0, 0, 0, 0.5)","padding": "10px"});
	
}

function pointout(d){	
	
	$('.profile-pic-upload-icon').css({"display": "none", "margin": "auto","background": "rgba(0, 0, 0, 0.5)","padding": "10px"});
	
}


/////////////////
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        	$('#imagePreview').css('background-image', 'url("")');
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

///////////////