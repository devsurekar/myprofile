function submitEducationalDetails() {

	var strUrl = $('#formAddEducationalDetails').attr('action');
	var intRowCount = $("#hid_row_count").val();
	var arrmixEducationalData = [[]];
	var arrmixRowIndex = [];

	//get tr ids
	$("#edu_table_tbody tr").each(function() {
	  arrmixRowIndex.push(this.id);
	});


	for(var i = 0; i <= intRowCount; i++ ) {

		//var show_on_website = $('#check_showonwebsite_'+arrmixRowIndex[i].split("_")[2]).prop('checked');
		//var show_on_resume = $('#check_showonresume_'+arrmixRowIndex[i].split("_")[2]).prop('checked');
		arrmixEducationalData[i] = { qualification: $('#txt_standard_'+arrmixRowIndex[i].split("_")[2]).val(), institute: $('#txt_institute_'+arrmixRowIndex[i].split("_")[2]).val(), board: $('#txt_board_'+arrmixRowIndex[i].split("_")[2]).val(), passing_year: $('#txt_passing_year_'+arrmixRowIndex[i].split("_")[2]).val(), percentage: $('#txt_percentage_'+arrmixRowIndex[i].split("_")[2]).val(), id: $('#hid_id_'+arrmixRowIndex[i].split("_")[2]).val(), show_on_website: $('#check_showonwebsite_'+arrmixRowIndex[i].split("_")[2]).prop('checked'), show_on_resume: $('#check_showonresume_'+arrmixRowIndex[i].split("_")[2]).prop('checked') };
	
	}

	var strEducationalDetails =JSON.stringify(arrmixEducationalData);
	$('.se-pre-con').show();
	jQuery.ajax({
		type: "POST",
		url: strUrl,
		dataType : 'json', // data type
		//dataType:'dataString',
		//data:$('#formAddEducationalDetails').serialize(),
		data: {educational_details : strEducationalDetails, delete_ids: $("#hid_delete").val()},
		success: function(res) {
			//alert('hii');
			if($.isEmptyObject(res.error)){

                $(".alert-danger").css('display','none');
                $(".bottom-red-border").removeClass("bottom-red-border");

                	//alert(res.success);
                	$(".alert-success").css('display','block');

               		 $(".alert-success").html(res.success);
               		 $(".alert-success").hide(10000);

              }else{

              	var message = '';
              	$(".bottom-red-border").removeClass("bottom-red-border");
              	for (i in res.error) {
    				
    				$arrmixKeyMessage = res.error[i].split(':');
    				$("#"+$arrmixKeyMessage[0]).addClass("bottom-red-border");
    				message  =  message.concat($arrmixKeyMessage[1] + "</br>");
  				}

                $(".alert-danger").css('display','block');

                $(".alert-danger").html(message);

              }
		},
      complete: function(){
        $('.se-pre-con').hide();
      }
	});
}

function submitSkillDetails() {

	var strUrl = $('#formAddSkillDetails').attr('action');
	var intRowCount = $("#hid_row_count").val();
	var arrmixSkillData = [[]];
	var arrmixRowIndex = [];

	//get tr ids
	$("#skill_table_tbody tr").each(function() {
	  arrmixRowIndex.push(this.id);
	});


	for(var i = 0; i <= intRowCount; i++ ) {
		
		arrmixSkillData[i] = { skill: $('#txt_skill_'+arrmixRowIndex[i].split("_")[2]).val(), version: $('#txt_version_'+arrmixRowIndex[i].split("_")[2]).val(), exprience: $('#txt_exprience_'+arrmixRowIndex[i].split("_")[2]).val(), id: $('#hid_id_'+arrmixRowIndex[i].split("_")[2]).val(), show_on_website: $('#check_showonwebsite_'+arrmixRowIndex[i].split("_")[2]).prop('checked'), show_on_resume: $('#check_showonresume_'+arrmixRowIndex[i].split("_")[2]).prop('checked') };
	
	}

	var strSkillDetails =JSON.stringify(arrmixSkillData);
	$('.se-pre-con').show();
	jQuery.ajax({
		type: "POST",
		url: strUrl,
		dataType : 'json', // data type
		//dataType:'dataString',
		//data:$('#formAddEducationalDetails').serialize(),
		data: {skill_details : strSkillDetails, delete_ids: $("#hid_delete").val()},
		success: function(res) {
			//alert('hii');
			if($.isEmptyObject(res.error)){

                $(".alert-danger").css('display','none');
                $(".bottom-red-border").removeClass("bottom-red-border");

                	//alert(res.success);
                	$(".alert-success").css('display','block');

               		 $(".alert-success").html(res.success);
               		 $(".alert-success").hide(10000);

              } else{

              	var message = '';
              	$(".bottom-red-border").removeClass("bottom-red-border");
              	for (i in res.error) {
    				
    				$arrmixKeyMessage = res.error[i].split(':');
    				$("#"+$arrmixKeyMessage[0]).addClass("bottom-red-border");
    				message  =  message.concat($arrmixKeyMessage[1] + "</br>");
  				}

                $(".alert-danger").css('display','block');

                $(".alert-danger").html(message);

              }
		},
      complete: function(){
        $('.se-pre-con').hide();
      }
	});
}

function submitCompanyDetails() {

	var strUrl = $('#formAddCompanyDetails').attr('action');
	var intRowCount = $("#hid_row_count").val();
	var arrmixCompanyData = [[]];
	var arrmixRowIndex = [];

	//get tr ids
	$("#comp_table_tbody tr").each(function() {
	  arrmixRowIndex.push(this.id);
	});


	for(var i = 0; i <= intRowCount; i++ ) {

		if ($('#radio_comp_'+arrmixRowIndex[i].split("_")[2]).prop("checked")) {
		   $('#radio_comp_'+arrmixRowIndex[i].split("_")[2]).val(1);
		}

		
		arrmixCompanyData[i] = { comp_name: $('#txt_compname_'+arrmixRowIndex[i].split("_")[2]).val(), city: $('#txt_city_'+arrmixRowIndex[i].split("_")[2]).val(), country: $('#txt_country_'+arrmixRowIndex[i].split("_")[2]).val(), designation: $('#txt_designation_'+arrmixRowIndex[i].split("_")[2]).val(), join_date: $('#txt_joindate_'+arrmixRowIndex[i].split("_")[2]).val(), leaving_date: $('#txt_leavingdate_'+arrmixRowIndex[i].split("_")[2]).val(), current_company_flag: $('#radio_comp_'+arrmixRowIndex[i].split("_")[2]).val(), id: $('#hid_id_'+arrmixRowIndex[i].split("_")[2]).val(), show_on_website: $('#check_showonwebsite_'+arrmixRowIndex[i].split("_")[2]).prop('checked'), show_on_resume: $('#check_showonresume_'+arrmixRowIndex[i].split("_")[2]).prop('checked') };
	
	}

	var strComapnyDetails =JSON.stringify(arrmixCompanyData);
	$('.se-pre-con').show();
	jQuery.ajax({
		type: "POST",
		url: strUrl,
		dataType : 'json', // data type
		//dataType:'dataString',
		//data:$('#formAddEducationalDetails').serialize(),
		data: {company_details : strComapnyDetails, delete_ids: $("#hid_delete").val()},
		success: function(res) {
			//alert('hii');
			if($.isEmptyObject(res.error)){

                $(".alert-danger").css('display','none');
                $(".bottom-red-border").removeClass("bottom-red-border");

                	//alert(res.success);
                	$(".alert-success").css('display','block');

               		 $(".alert-success").html(res.success);
               		 $(".alert-success").hide(10000);

              } else{

              	var message = '';
              	$(".bottom-red-border").removeClass("bottom-red-border");
              	for (i in res.error) {
    				
    				$arrmixKeyMessage = res.error[i].split(':');
    				$("#"+$arrmixKeyMessage[0]).addClass("bottom-red-border");
    				message  =  message.concat($arrmixKeyMessage[1] + "</br>");
  				}

                $(".alert-danger").css('display','block');

                $(".alert-danger").html(message);

              }
		},
      complete: function(){
        $('.se-pre-con').hide();
      }
	});
}

function submitProjectDetails() {

	var strUrl = $('#formAddProjectDetails').attr('action');
	var intRowCount = $("#hid_row_count").val();
	var arrmixProjectData = [[]];
	var arrmixRowIndex = [];

	//get tr ids
	$(".top-row").each(function() {
	  arrmixRowIndex.push(this.id);
	});

	for(var i = 0; i <= intRowCount; i++ ) {
		//alert($('#txt_add_edit_project_name_'+arrmixRowIndex[i].split("_")[2]).val());
		//alert(i);
		arrmixProjectData[i] = { project_type: $('#sel_project_type_'+arrmixRowIndex[i].split("_")[2]).val(), project_name: $('#txt_add_edit_project_name_'+arrmixRowIndex[i].split("_")[2]).val(), degree_name: $('#txt_add_edit_degree_name_'+arrmixRowIndex[i].split("_")[2]).val(), technology: $('#txt_add_edit_technology_'+arrmixRowIndex[i].split("_")[2]).val(), domain: $('#txt_add_edit_domain_'+arrmixRowIndex[i].split("_")[2]).val(), team_size: $('#txt_add_edit_team_size_'+arrmixRowIndex[i].split("_")[2]).val(), duration: $('#txt_add_edit_duration_'+arrmixRowIndex[i].split("_")[2]).val(), responsibility: $('#txt_add_edit_responsibility_'+arrmixRowIndex[i].split("_")[2]).val(), contribution: $('#txt_add_edit_contribution_'+arrmixRowIndex[i].split("_")[2]).val(), project_description: $('#txt_project_description_'+arrmixRowIndex[i].split("_")[2]).val(), remark: $('#txt_add_edit_remark_'+arrmixRowIndex[i].split("_")[2]).val(), project_link: $('#txt_add_edit_project_link_'+arrmixRowIndex[i].split("_")[2]).val(), id: $('#hid_id_'+arrmixRowIndex[i].split("_")[2]).val(), show_on_website: $('#check_showonwebsite_'+arrmixRowIndex[i].split("_")[2]).prop('checked'), show_on_resume: $('#check_showonresume_'+arrmixRowIndex[i].split("_")[2]).prop('checked') };
	
	}

	var strProjectDetails =JSON.stringify(arrmixProjectData);
	//var person = prompt("Please enter your name", strProjectDetails);
	//return;
	$('.se-pre-con').show();
	jQuery.ajax({
		type: "POST",
		url: strUrl,
		dataType : 'json', // data type
		//dataType:'dataString',
		//data:$('#formAddEducationalDetails').serialize(),
		data: {project_details : strProjectDetails, delete_ids: $("#hid_delete").val()},
		success: function(res) {
			//alert('hii');
			if($.isEmptyObject(res.error)){

                $(".alert-danger").css('display','none');
                $(".bottom-red-border").removeClass("bottom-red-border");

                	//alert(res.success);
                	$(".alert-success").css('display','block');

               		 $(".alert-success").html(res.success);
               		 $(".alert-success").hide(10000);

              } else{

              	var message = '';
              	$(".bottom-red-border").removeClass("bottom-red-border");
              	for (i in res.error) {
    				
    				$arrmixKeyMessage = res.error[i].split(':');
    				$("#"+$arrmixKeyMessage[0]).addClass("bottom-red-border");
    				message  =  message.concat($arrmixKeyMessage[1] + "</br>");
  				}

                $(".alert-danger").css('display','block');

                $(".alert-danger").html(message);

              }
		},
      complete: function(){
        $('.se-pre-con').hide();
      }
	});
	
}

function submitActivityDetails() {

	var strUrl = $('#formAddActivityDetails').attr('action');
	var intRowCount = $("#hid_row_count").val();
	var arrmixActivityData = [[]];
	var arrmixRowIndex = [];

	//get tr ids
	$(".top-row").each(function() {
	  arrmixRowIndex.push(this.id);
	});

	for(var i = 0; i <= intRowCount; i++ ) {
		//alert($('#txt_add_edit_project_name_'+arrmixRowIndex[i].split("_")[2]).val());
		//alert(i);
		arrmixActivityData[i] = { heading: $('#txt_add_edit_heading_'+arrmixRowIndex[i].split("_")[2]).val(), discription: $('#txt_activity_discription_'+arrmixRowIndex[i].split("_")[2]).val(), id: $('#hid_id_'+arrmixRowIndex[i].split("_")[2]).val(), show_on_website: $('#check_showonwebsite_'+arrmixRowIndex[i].split("_")[2]).prop('checked'), show_on_resume: $('#check_showonresume_'+arrmixRowIndex[i].split("_")[2]).prop('checked') };
	
	}

	var strActivityDetails =JSON.stringify(arrmixActivityData);
	//var person = prompt("Please enter your name", strProjectDetails);
	//return;
	$('.se-pre-con').show();
	jQuery.ajax({
		type: "POST",
		url: strUrl,
		dataType : 'json', // data type
		//dataType:'dataString',
		//data:$('#formAddEducationalDetails').serialize(),
		data: {activity_details : strActivityDetails, delete_ids: $("#hid_delete").val()},
		success: function(res) {

			if($.isEmptyObject(res.error)){

                $(".alert-danger").css('display','none');
                $(".bottom-red-border").removeClass("bottom-red-border");

                	//alert(res.success);
                	$(".alert-success").css('display','block');

               		 $(".alert-success").html(res.success);
               		 $(".alert-success").hide(10000);

              } else{

              	var message = '';
              	$(".bottom-red-border").removeClass("bottom-red-border");
              	for (i in res.error) {
    				
    				$arrmixKeyMessage = res.error[i].split(':');
    				$("#"+$arrmixKeyMessage[0]).addClass("bottom-red-border");
    				message  =  message.concat($arrmixKeyMessage[1] + "</br>");
  				}

                $(".alert-danger").css('display','block');

                $(".alert-danger").html(message);

              }
		},
      complete: function(){
        $('.se-pre-con').hide();
      }
	});
	
}