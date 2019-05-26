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

function addEduRow(){ 
	//<td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked></label></div></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='check_showonresume_"+intRowId+"' checked></label></div></div></td>
			var intRowId = parseInt( $('#hid_row_count').val() )+1;
            var markup = "<tr id='edu_tr_"+intRowId+"'><td><div class='form-group'><input type='text' class='form-control' id='txt_standard_"+intRowId+"' placeholder='BE/ME/MCA' name='qualification-"+intRowId+"' value='' ></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_institute_"+intRowId+"' placeholder='YMN School' name='institute-"+intRowId+"' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_board_"+intRowId+"' placeholder='Central' name='board-"+intRowId+"' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_passing_year_"+intRowId+"' placeholder='2014' name='passing_year-"+intRowId+"' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_percentage_"+intRowId+"' placeholder='60' name='percentage-"+intRowId+"' value=''><input type='hidden' name='id-"+intRowId+"' id='hid_id_"+intRowId+"' value='0'></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked></label></div></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='check_showonresume_"+intRowId+"' checked></label></div></div></td><td><div class='form-group'><a href='#' id='"+intRowId+"' onclick='deleteRow(this)' class='badge badge-danger  rounded-circle float-right' style='margin-top: 15px'><i class='fas fa-minus fa-1x'></i></i></a></div></td></tr>";
            $("#edu_table_tbody").append(markup);
            $('#hid_row_count').val(intRowId);
            $(document).ready(function() { $('body').bootstrapMaterialDesign(); });
        }

function addSkillRow(id){
	//<td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked></label></div></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='check_showonresume_"+intRowId+"' checked></label></div></div></td>
	var intRowId = parseInt( $('#hid_row_count').val() )+1;
	var markup = "<tr id='skill_tr_"+intRowId+"'><td><div class='form-group'><input type='text' class='form-control' id='txt_skill_"+intRowId+"' placeholder='Java/PHP/.Net' name='skill' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_version_"+intRowId+"' placeholder='1/2.1/3' name='version' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_exprience_"+intRowId+"' placeholder='2/4.1' name='exprience' value=''> <input type='hidden' name='id-"+intRowId+"' id='hid_id_"+intRowId+"' value='0'></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked></label></div></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='check_showonresume_"+intRowId+"' checked></label></div></div></td><td><div class='form-group'><a href='#' id='"+intRowId+"' onclick='deleteRow(this)' class='badge badge-danger rounded-circle float-right' style='margin-top: 20px'><i class='fas fa-minus fa-1x'></i></a></div></td></tr>";
	$("#skill_table_tbody").append(markup);
	$('#hid_row_count').val(intRowId);
}

function addCompRow(id){

	//<td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked></label></div></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='check_showonresume_"+intRowId+"' checked></label></div></div></td>
	var intRowId = parseInt( $('#hid_row_count').val() )+1;
	var markup = "<tr id='comp_tr_"+intRowId+"'><td><div class='radio'><label><input style='margin-top: 20px' class='form-check-input position-static' type='radio' name='radio_comp' id='radio_comp_"+intRowId+"' value='0' aria-label='...'></label></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_compname_"+intRowId+"' placeholder='Tata Cons' name='comp_name' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_city_"+intRowId+"' placeholder='Pune' name='city' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_country_"+intRowId+"' placeholder='India' name='country' value=''></div></td><td><div class='form-group'><input type='text' class='form-control' id='txt_designation_"+intRowId+"' placeholder='Software Developer' name='designetion' value=''></div></td><td><div class='form-group'><input type='text' class='form-control datepic' id='txt_joindate_"+intRowId+"' placeholder='23/10/2018' name='join_date' value='' readonly></div></td><td><div class='form-group'><input type='text' class='form-control datepic' id='txt_leavingdate_"+intRowId+"' placeholder='23/09/2023' name='leaving_date' value='' readonly> <input type='hidden' name='id-"+intRowId+"' id='hid_id_"+intRowId+"' value='0'></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked></label></div></div></td><td><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='check_showonresume_"+intRowId+"' checked></label></div></div></td><td><div class='form-group'><a href='#' id='"+intRowId+"' onclick='deleteRow(this)' class='badge badge-danger rounded-circle float-right' style='margin-top: 20px'><i class='fas fa-minus fa-1x'></i></a></div></td></tr>";

	$("#comp_table_tbody").append(markup);
	
	$('#hid_row_count').val(intRowId);

	$('#txt_joindate_'+intRowId).datepicker({
       		format:'yyyy-mm-dd',       		
            showOtherMonths: true
        });

    $('#txt_leavingdate_'+intRowId).datepicker({
       		format:'yyyy-mm-dd',       		
            showOtherMonths: true
        });

}

function deleteRow(e){

	var deleted_id = '#hid_id_'+e.id;
	if( 0 != parseInt( $(deleted_id).val() ) ) {
		
		deleted_ids.push($(deleted_id).val());
		$('#hid_delete').val(deleted_ids);
	 }

    $(e).parents("tr").remove();
    var intRowId = parseInt( $('#hid_row_count').val() )-1; 
    $("#hid_row_count").val(intRowId);             
}

function deleteSection(e){

	var deleted_id = '#hid_id_'+e.id;
	if( 0 != parseInt( $(deleted_id).val() ) ) {
		
		deleted_ids.push($(deleted_id).val());
		$('#hid_delete').val(deleted_ids);
	 }

	var deletediv = '#divrow_id_'+e.id;

    $(deletediv).remove();
    var intRowId = parseInt( $('#hid_row_count').val() )-1; 
    $("#hid_row_count").val(intRowId);             
}

function addProjectSection(id){
	//<div class='row'><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group '><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='skillDetails["+intRowId+"][show_on_website]' checked > Show on website</label></div></div></div><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group text-center'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='skillDetails["+intRowId+"][show_on_resume]' checked > Show on resume</label></div></div></div></div>
	var intRowId = parseInt( $('#hid_row_count').val() )+1;
	var markup = "<div class='top-row' id='divrow_id_"+ intRowId +"'> <div class='row'><div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'> <div class='form-group'> <a href='#' id='"+intRowId+"' onclick='deleteSection(this)' class='badge badge-danger  float-right' style='margin-top: 15px; padding:10px'>Remove Project</i></a> <label for='sel_project_type_"+ intRowId +"'>Project Type</label> <select class='form-control' id='sel_project_type_"+ intRowId +"' name='project_type'> <option value='N'>Select</option> <option value='A'>Academic Project</option> <option value='C'>Company Project</option> <option value='B'>Back Pocket Project</option> </select> </div></div></div><div class='row'> <div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'> <div class='form-group'> <label for='txt_add_edit_project_name_"+ intRowId +"'>Project Name</label> <input type='text' class='form-control' id='txt_add_edit_project_name_"+ intRowId +"' name='project_name'> </div></div><div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_degree_name_"+ intRowId +"'>Degree Name</label> <input type='text' class='form-control' id='txt_add_edit_degree_name_"+ intRowId +"' name='degree_name'></div></div> <div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_technology_"+ intRowId +"'>Technology</label> <input type='text' class='form-control' id='txt_add_edit_technology_"+ intRowId +"' name='technology'></div></div> </div> <div class='row'><div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_domain_"+ intRowId +"'>Domain</label> <input type='text' class='form-control' id='txt_add_edit_domain_"+ intRowId +"' name='domain'></div></div> <div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_team_size_"+ intRowId +"'>Team Size</label> <input type='text' class='form-control' id='txt_add_edit_team_size_"+ intRowId +"' name='team_size'></div></div> <div class='col-sm-12 col-xs-12 col-md-4 col-lg-4'><div class='form-group'> <label for='txt_add_edit_duration_"+ intRowId +"'>Duration</label> <input type='text' class='form-control' id='txt_add_edit_duration_"+ intRowId +"' name='duration'></div></div></div><div class='row'><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'> <label for='txt_add_edit_responsibility_"+ intRowId +"'>Responsibility</label> <input type='text' class='form-control' id='txt_add_edit_responsibility_"+ intRowId +"' name='responsibility'></div></div><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'> <label for='txt_add_edit_contribution_"+ intRowId +"'>Contribution</label> <input type='text' class='form-control' id='txt_add_edit_contribution_"+ intRowId +"' name='contribution'></div></div></div><div class='row'><div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'><div class='form-group'> <label for='txt_project_description_"+ intRowId +"'>Project Description</label> <textarea class='form-control' id='txt_project_description_"+ intRowId +"' rows='3' name='project_description'></textarea></div></div></div><div class='row'><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'> <label for='txt_add_edit_remark_"+ intRowId +"'>Remark</label> <input type='text' class='form-control' id='txt_add_edit_remark_"+ intRowId +"' name='contribution'></div></div><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'> <label for='txt_add_edit_project_link_"+ intRowId +"'>Project Link</label> <input type='text' class='form-control' id='txt_add_edit_project_link_"+ intRowId +"' name='project_link'> <input type='hidden' name='project_id_"+intRowId+"' id='hid_id_"+intRowId+"' value='0'></div></div></div><div class='row'><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked > Show on website</label></div></div></div><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='check_showonresume_"+intRowId+"' checked > Show on resume</label></div></div></div></div></div>";
	$("#section_project").append(markup);
	$('#hid_row_count').val(intRowId);
}

function addActivitySection(id){
	//<div class='row'><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group '><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='skillDetails["+intRowId+"][show_on_website]' checked > Show on website</label></div></div></div><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='skillDetails["+intRowId+"][show_on_resume]' checked > Show on resume</label></div></div></div></div>
	
	var intRowId = parseInt( $('#hid_row_count').val() )+1;
	var markup = "<div class='top-row'  id='divrow_id_"+intRowId+"'><div class='row'><div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'><div class='form-group'><a href='#' id='"+intRowId+"' onclick='deleteSection(this)' class='badge badge-danger float-right' style='margin-top: 20px; padding:10px'> Remove Activity</a> <label for='txt_add_edit_heading_"+intRowId+"'>Heading</label> <input type='text' class='form-control' id='txt_add_edit_heading_"+intRowId+"' placeholder='' name='heading'></div></div> </div> <div class='row'> <div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'> <div class='form-group'> <label for='txt_activity_discription_"+intRowId+"'>Discription</label> <textarea class='form-control' id='txt_activity_discription_"+intRowId+"' rows='3' name='discription'></textarea><input type='hidden' name='activity_id_"+intRowId+"' id='hid_id_"+intRowId+"' value='0'> </div></div></div><div class='row'><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group '><div class='checkbox'><label><input type='checkbox' id='check_showonwebsite_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked > Show on website</label></div></div></div><div class='col-sm-12 col-xs-12 col-md-6 col-lg-6'><div class='form-group'><div class='checkbox'><label><input type='checkbox' id='check_showonresume_"+intRowId+"' name='check_showonwebsite_"+intRowId+"' checked > Show on resume</label></div></div></div></div></div>";
	$("#section_activity").append(markup);
	$('#hid_row_count').val(intRowId);
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

function countTextAreaChar(obj){
	var text_max = 250;
	$('#'+obj.id+'_count_message').html(text_max + ' remaining');
	  var text_length = $('#'+obj.id).val().length;
	  var text_remaining = text_max - text_length;	  
	  $('#'+obj.id+'_count_message').html(text_remaining + ' remaining');
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