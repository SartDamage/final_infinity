
<script>
	function detectmob() {
   if(window.innerWidth <= 767 ) {
     return true;
   } else {
     return false;
   }
}
function wait(ms){
   var start = new Date().getTime();
   var end = start;
   while(end < start + ms) {
     end = new Date().getTime();
  }
}
$(function() {
var i =	location.pathname.split("/");
var k ="";
 for (j=0;j<=i.length;j++){
	 if (i[j]){
		 var m = 0;
		 var m=i[j];
		 k += "/"+m;
		 //console.log("index in :"+k);
		}
 }
 console.log("index out :"+k);
  $('nav a[href^="' +k+'"]').addClass('active');
  console.log('nav a[href^="' +k + '"]');
});
/*   $('nav a[href^="/' + location.pathname.split("/")[1] + '/' + location.pathname.split("/")[2] +'"]').addClass('active');
  console.log('nav a[href^="/' + location.pathname.split("/")[1] + '/' + location.pathname.split("/")[2] +'/' + location.pathname.split("/")[3] + '"]');
}); now redundant*/
		//$('#myTable_filter input[0]').focus();
 $(document).one('ready', function () {
  /*  document.getElementById("mySidenav").style.width = "60px";
    document.getElementById("main").style.marginLeft= "60px";
	document.getElementById("cross").style.display = "none";
	document.getElementById("top").style.left="0";
	document.getElementById("top").style.bottom="0";
	document.getElementById("bars").style.display = "table-cell";
	document.getElementById("avatar").style.display = "none";
	document.getElementById("space").style.display = "block"; */
    //document.body.style.backgroundColor = "white";
        });

		var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
    isMobile = true;
}
function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}
if(isMobile==false){
	function openNav() {

		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("main").style.marginLeft = "250px";
		//document.getElementByClassName("a.float").style.Right= "26px";
		//document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
		document.getElementById("bars").style.display = "none";
		document.getElementById("cross").style.display = "table-cell";
		document.getElementById("top").style.left="194px";
		//document.getElementById("top").style.bottom="74px";
		document.getElementById("avatar").style.display="block";
		document.getElementById("space").style.display="none";
		document.getElementById('bars').setAttribute('toggle',"");
		document.getElementById('cross').setAttribute('toggle',"tooltip");
		 localStorage.setItem('sidebar_status', "open");
	}

	function closeNav() {

		document.getElementById("mySidenav").style.width = "60px";
		document.getElementById("main").style.marginLeft= "60px";
		//document.getElementByClassName("float").style.Right= "103px";26px
		document.getElementById("cross").style.display = "none";
		document.getElementById("top").style.left="0";
		document.getElementById("top").style.bottom="0";
		document.getElementById("bars").style.display = "table-cell";
		document.getElementById("avatar").style.display = "none";
		document.getElementById("space").style.display = "block";
		document.getElementById('bars').setAttribute('toggle',"tooltip");
		document.getElementById('cross').setAttribute('toggle',"");
		localStorage.setItem('sidebar_status', "closed");
		//document.body.style.backgroundColor = "white";
	}
}else{
	function openNav() {
		on();
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("main").style.marginLeft = "250px";
		//document.getElementByClassName("a.float").style.Right= "26px";
		//document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
		document.getElementById("bars").style.display = "none";
		document.getElementById("cross").style.display = "table-cell";
		document.getElementById("top").style.left="194px";
		//document.getElementById("top").style.bottom="74px";
		document.getElementById("avatar").style.display="block";
		document.getElementById("space").style.display="none";
		document.getElementById('bars').setAttribute('toggle',"");
		document.getElementById('cross').setAttribute('toggle',"tooltip");
		 localStorage.setItem('sidebar_status', "open");
	}

	function closeNav() {
		off();
		document.getElementById("mySidenav").style.width = "60px";
		document.getElementById("main").style.marginLeft= "60px";
		//document.getElementByClassName("float").style.Right= "103px";26px
		document.getElementById("cross").style.display = "none";
		document.getElementById("top").style.left="0";
		document.getElementById("top").style.bottom="0";
		document.getElementById("bars").style.display = "table-cell";
		document.getElementById("avatar").style.display = "none";
		document.getElementById("space").style.display = "block";
		document.getElementById('bars').setAttribute('toggle',"tooltip");
		document.getElementById('cross').setAttribute('toggle',"");
		localStorage.setItem('sidebar_status', "closed");
		//document.body.style.backgroundColor = "white";
	}
}

    var toggle_state = localStorage.getItem('sidebar_status');
    if(toggle_state){
		if(toggle_state=='open'){
			openNav();
		}else{
			closeNav();
		}
    }
function goBack() {
    window.history.back()
}

function setSelectValue (id, val) {
    document.getElementById(id).value = val;
	console.log("ID : "+id+"; Value : "+val);
}
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
var url="<?php echo BASE_URL;?>/textlocal/textlocal_send_sms.php";
var send_sms={
	welcome: function (type,number,name){
		$.ajax({
					type: "GET",
					url: url,
					data: {username:name,number:number,type:type}, // serializes the form's elements.
					success: function(data)
					{
						console.log(data);
					}
				});
	},
	bill: function (type,number,name,patient_id,date_admit){
		console.log("add ajax for bill sms");
	},
	welcome_ipd: function (type,number,name,patient_id,date_admit){
		$.ajax({
					type: "GET",
					url: url,
					data: {username:name,number:number,type:type,patient_id:patient_id,date_admit:date_admit}, // serializes the form's elements.
					success: function(data)
					{
						debugger;
						console.log(data);
					}
				});
	},
	///for ot messg send Aj//////////////////////////////////////////
	welcome_ot: function (type,number,name,patient_id,date_of_surgery,time_of_surgery){
		     
           $.ajax({
						 type:"GET",
						 url:url,
						 data: {username:name,number:number,type:type,patient_id:patient_id,date_of_surgery:date_of_surgery,time_of_surgery:time_of_surgery},
						 success:function(data){

							 console.log(data);
						 }
					 });
	},
//////////////////////////////////////////////////////////////////
	welcome_opd: function (type,number,name,patient_id,date_admit){
		$.ajax({

					type: "GET",
					url: url,
					data: {username:name,number:number,type:type,patient_id:patient_id,date_admit:date_admit}, // serializes the form's elements.
					success: function(data)
					{
						debugger;
						console.log(data);
					}
				});
	},
	welcome_patho: function (type,number,name,patient_id,date_admit,test1,test2,test3,test4,test5){
		$.ajax({
					type: "GET",
					url: url,
					data: {username:name,number:number,type:type,patient_id:patient_id,date_admit:date_admit,test1:test1,test2:test2,test3:test3,test4:test4,test5:test5}, // serializes the form's elements.
					success: function(data)
					{
						console.log(data);
					}
				});
	},
	bill_user: function (type,number,name,patient_id,date_admit,amount){
		$.ajax({
					type: "GET",
					url: url,
					data: {username:name,number:number,type:type,patient_id:patient_id,date_admit:date_admit,amount:amount}, // serializes the form's elements.
					success: function(data)
					{
						console.log(data);
					}
				});
	},
	discharge_user: function (type,number,name,patient_id,date_admit,amount){
		$.ajax({
					type: "GET",
					url: url,
					data: {username:name,number:number,type:type,patient_id:patient_id,date_admit:date_admit,amount:amount},
					// serializes the form's elements.
					success: function(data)
					{
						console.log(data);
					}
				});
	}
}

function parseJsonToTable_registered_instance(json)
	{
		if(json!=""){
		 for (var i = 0; i < json.length; i++) {//slice(0,<?php //echo $no_of_entries_displayed;?>)
				var update_url_dependency="#";
				var patient_type=json[i].patientID;
				var patient_type = patient_type.slice(0,3);
				if (patient_type=="PL0"){
					patient_type="Pathology";
					var button_text ="&nbspReport";
					var button_fa ="fas fa-edit 1x";
					var button_width="width:100px";
					}else{}
				if (patient_type=="OPD"){
					var discharge="N.A.";
					var update_url_dependency="<?php echo $update_patient_opd ;?>";
					var button_text ="Select";
					var button_fa="far fa-stethoscope fa-2";
					var button_width="width:100px";
					}else if(patient_type=="IPD"){
						var discharge=json[i].discharge_date_time;
						if (discharge==null){discharge=`--Admited--`}
						else{
						var discharge_time = discharge.substring(11,20);
						console.log(`discharge_time 116 :: ${discharge_time}`);
						var discharge = discharge.substring(0,11);
						var discharge= discharge.split("-").reverse().join("-");
						var discharge= discharge.split(" ").join("");
						discharge = `Date : ${discharge} <br> Time : ${discharge_time}`;// discharge string
						}
						var update_url_dependency="<?php echo $update_patient_ipd ;?>";
						var button_text ="Select";
						var button_fa = "far fa-bed fa-2";
						var button_width="width:100px";
						}else{var discharge="N.A.";}
				var symptom_column= json[i].symptoms;
				if (symptom_column ==  null || "" ){symptom_column="N.A";}else{
				get5Words(symptom_column.split(/((?:\w+ ){5})/g).filter(Boolean).join("\n"));}
				var date =json[i].whenentered;
				var time = date.substring(11,20);
				console.log(`time 132 :: ${time}`);
				var date = date.substring(0,11);
				var date= date.split("-").reverse().join("-");
				var date= date.split(" ").join("");
				var date_last_visit = json[0].whenentered;
				var time_last_visited = date_last_visit.substring(11,20);
				console.log(`time_last_visited 138 :: ${time_last_visited}`);
				var date_last_visit = date_last_visit.substring(0,11);
				var date_last_visit= date_last_visit.split("-").reverse().join("/");
				var date_last_visit= date_last_visit.split(" ").join("");
				var department_latest = json[0].patientID;
				var department_latest = department_latest.substring(0,3);
				if (department_latest=="PL0"){department_latest="Pathology";}else{}
				//var department = json[i].patientID;
				//var department = department.substring(0,3);
				var charges =json[i].charges;
				if (charges==null||charges==""){charges="N.A.";}
		//		if()
	document.getElementById("last_visit").innerHTML = "Last visit on :&nbsp" +date_last_visit+", at "+time_last_visited+", in "+department_latest+" section, with patient ID : "+json[0].patientID;
				tr = $('<tr class="tbl_row" id="'+json[i].patientID+'" onclick="showDetails(this.id)" data-pat_id="'+json[i].patientID+'" title="Click to update patient details/payment/scheduling/assigning Dr.">');
				tr.append("<td>" + json[i].patientID + "</td>");
				tr.append("<td> Date : " + date + " <br> Time : "+time+"</td>");
				tr.append("<td> "+discharge+"</td>");
				tr.append("<td><div class='symptom_cell break_word' style='width:200px;'>" + symptom_column + "</div></td>");/* .substring(0,50) */
				tr.append("<td>" + patient_type + "</td>");
				tr.append("<td>" + charges + "</td>");
				/* tr.append("<td> ₹ " + charges + "</td>"); */
				tr.append('<td class=""><button type="button" onclick="clickedbutton(this)" class="btn btn-outline-teal"  style="'+button_width+'" data-patho_scname="' +json[i].symptoms+ '"  data-uid=' + json[i].patientID + ' data-pat_type='+patient_type+' title="'+patient_type+' patient"><i class="'+button_fa+'" aria-hidden="true"></i> '+button_text+'</button></td>');
				$('#table_list_patients').append(tr);
			}
		}
		/********------<a href="patient_update.php?ID='+ json[i].patientID +'"></a>-----***********/
		else{
			tr = $('<tr class="tbl_row" id="Empty" onclick="#" data-pat_id=null>');
			tr.append ("<td colspan='7'><b>No Patient data entered</b></td>");
			$('#table_list_patients').append(tr);
		}
		////data table
		$('#table_list_patients').DataTable({
				"order": [ [ 1, 'desc' ],[ 0, "asc" ], [ 2, 'desc' ]],
				/* "order": [], */
				 "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-3'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
				 "buttons": [
					/* 'csv',  */'excel',/*  'pdf', */ 'print'
					],
				  "info":     false,
				  "autoWidth": true,
				  "language": {
									searchPlaceholder: "Search records",
									search:""
								},
				  "oLanguage": {
								"sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
								},
				  "columnDefs": [ {
									  "targets"  : 'no-sort',
									  "orderable": false,
									}],
				  //"aoColumns": [{ "bSortable": false },null,null,{ "bSortable": false },null,{ "bSortable": false },],
					"pagingType":"simple_numbers",
					 "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
			});
			$('div.dataTables_filter input').focus();
			$('[data-toggle="tooltip"]').tooltip();
		///////////////////////////////////////
	}

function swalInfo(text,title,time){
	if (!title){
			swal({
					  title: "info!",
					  text: text,
					  icon: "info",
					  timer: 2000,
					  button:false
				   });
	}else if(!time){
			swal({
					  title: title,
					  text: text,
					  icon: "info",
					  timer: 2000,
					  button:false
				   });
	}else{
			swal({
					  title: title,
					  text: text,
					  icon: "info",
					  timer: time,
					  button:false
				   });
	}
}

function swalWarning(text,title,time){
	if (!title){
	swal({
              title: "warning",
              text: text,
              icon: "warning",
              timer: 2000,
			  button:false
	});}
	else if (!time){swal({
              title: title,
              text: text,
              icon: "warning",
              timer: 2000,
			  button:false
	});}
	else {swal({
              title: title,
              text: text,
              icon: "warning",
              timer: time,
			  button:false
	});

	}
}

function swalError(text,title){
	if (!title){
	swal({
			  title: "Error!",
			  text: text,
			  icon: "error",
			  timer: 2000,
			  button:false
	});
	}else{
		swal({
			  title: title,
			  text: text,
			  icon: "error",
			  timer: 2000,
			  button:false
	});}
}

function swalSuccess(text,title){
	if (!title){
	swal({
              title: "Success!",
              text: text,
              icon: "success",
              timer: 2000,
			  button:false
           });
	}else{
		swal({
              title: title,
              text: text,
              icon: "success",
              timer: 2000,
			  button:false
           });}
}

function resetform(formID){
	//alert("hello");
	$(formID).trigger("reset");
}

function openInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}

window.onload = function(){ document.getElementById("loading").style.display = "none" }

function base64url(source) {
  // Encode in classical base64
  encodedSource = CryptoJS.enc.Base64.stringify(source);

  // Remove padding equal characters
  encodedSource = encodedSource.replace(/=+$/, '');

  // Replace characters according to base64url specifications
  encodedSource = encodedSource.replace(/\+/g, '-');
  encodedSource = encodedSource.replace(/\//g, '_');

  return encodedSource;
}
var Base64 = {
    characters: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=" ,

    encode: function( string )
    {
        var characters = Base64.characters;
        var result     = '';

        var i = 0;
        do {
            var a = string.charCodeAt(i++);
            var b = string.charCodeAt(i++);
            var c = string.charCodeAt(i++);

            a = a ? a : 0;
            b = b ? b : 0;
            c = c ? c : 0;

            var b1 = ( a >> 2 ) & 0x3F;
            var b2 = ( ( a & 0x3 ) << 4 ) | ( ( b >> 4 ) & 0xF );
            var b3 = ( ( b & 0xF ) << 2 ) | ( ( c >> 6 ) & 0x3 );
            var b4 = c & 0x3F;

            if( ! b ) {
                b3 = b4 = 64;
            } else if( ! c ) {
                b4 = 64;
            }

            result += Base64.characters.charAt( b1 ) + Base64.characters.charAt( b2 ) + Base64.characters.charAt( b3 ) + Base64.characters.charAt( b4 );

        } while ( i < string.length );

        return result;
    } ,

    decode: function( string )
    {
        var characters = Base64.characters;
        var result     = '';

        var i = 0;
        do {
            var b1 = Base64.characters.indexOf( string.charAt(i++) );
            var b2 = Base64.characters.indexOf( string.charAt(i++) );
            var b3 = Base64.characters.indexOf( string.charAt(i++) );
            var b4 = Base64.characters.indexOf( string.charAt(i++) );

            var a = ( ( b1 & 0x3F ) << 2 ) | ( ( b2 >> 4 ) & 0x3 );
            var b = ( ( b2 & 0xF  ) << 4 ) | ( ( b3 >> 2 ) & 0xF );
            var c = ( ( b3 & 0x3  ) << 6 ) | ( b4 & 0x3F );

            result += String.fromCharCode(a) + (b?String.fromCharCode(b):'') + (c?String.fromCharCode(c):'');

        } while( i < string.length );

        return result;
    }
};
</script>
<section id="footer">
<footer class="footer hidden-print non-printable" style="left: 0px;right: auto;">
      <div class="container">
        <a target="_blank" href="https://darstek.com"><span class="text-muted pull-right" >© Darstek Trading and Solution Pvt. Ltd. - 2018</span></a>
      </div>
</footer>
</section>
</body>
</html>
