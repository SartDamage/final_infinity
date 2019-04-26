<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
//if(!$_GET['ID']){}else{$ID=$_GET['ID'];}
?>

<?php include './include/header.php';?>
<style>
a {
  -webkit-transition: .25s all;
  transition: .25s all;
}
.table td, .table th{vertical-align:middle!important;padding: 0.25rem!important;}
.table .center{text-align:  center;}
.card {
  overflow: hidden;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -webkit-transition: .25s box-shadow;
  transition: .25s box-shadow;
}

.card:focus,
.card:hover {
  box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
}

.card-inverse .card-img-overlay {
  background-color: rgba(51, 51, 51, 0.85);
  border-color: rgba(51, 51, 51, 0.85);
}
.accord{
    width: -webkit-fill-available;
    width:100%;
    border-radius: 0px;}
#accordion .panel{padding:5 0 5 0;}
#accordion .panel-body{padding:5px;border-style: none ridge none ridge;margin: 0 8 0 8;}
#accordion .panel-body-last{padding:5px;border-style: none ridge ridge ridge;margin: 0 8 0 8;}

.panel-default>.panel-heading a:after {
  content: "";
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
}

.panel-default>.panel-heading a[aria-expanded="true"] {
  /*background-color: #eee;*/
}

.panel-default>.panel-heading a[aria-expanded="true"]:after {
  content: "\2212";
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

.panel-default>.panel-heading a[aria-expanded="false"]:after {
  content: "\002b";
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}
.btn-bs-file{
    position:relative;
}
.btn-bs-file input[type="file"]{
    position: absolute;
    top: -9999999;
    filter: alpha(opacity=0);
    opacity: 0;
    width:150px;
    height:150px;
    outline: none;
    cursor: inherit;
}
.upload_lbl{
  display: block;
  max-width: 200px;
    margin: 0 auto 15px;
  text-align: center;
    word-wrap: break-word;
  color: #1a4756;
}

.hidden, #uploadImg:not(.hidden) + .upload_lbl{
  display: none;
}

#file{
  display: none;
    margin: 0 auto;
}


#upload{
  display: block;
  padding: 10px 25px;
  border: 0;
  margin: 0 auto;
  font-size: 15px;
  letter-spacing: 0.05em;
  cursor: pointer;
  background: #216e69;
  color: #fff;
  outline: none;
  transition: .3s ease-in-out;
  &:hover, &:focus{
    background: #1AA39A;
  }
  &:active{
    background: #13D4C8;
    transition: .1s ease-in-out;
  }
}

img{
  display: block;
  margin: 0 auto 15px;
}

.input_date:before {
   /*  position: absolute;
    top: 3px; left: 3px; */
    content: attr(data-date);
    display: inline-block;
    color: black;
}

.input_date::-webkit-datetime-edit, .input_date::-webkit-inner-spin-button, .input_date::-webkit-clear-button {
    display: none;
}

</style>

<?php// include './nav_sidebar.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/navbar_framework/nav_sidebar_patho_home.php';?>
<div id="main">
<?php include './nav_bartop.php';?>
	<div class="container" id="reg-form-container" style="padding-left:50px;margin-top:15px;">
<br>
			
			<div class="card card-outline-info mb-3">
			  <div class="card-block heading_bar">
				<h5><!--List of all Patients--> <!--title--></h5>
				<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			  </div>
			</div>
		<div class="card card-outline-info mb-3" style="margin-bottom: 6rem!important;">
			<div class="card-block" id="Cerificate_form">
				
				<!--INSERT HERE-->
                <form method="post" action=" " class="form " name="upload_consent_form_button_form"     id="upload_consent_form_button_form" enctype="multipart/form-data" style="">
                                <div class="form-group row justify-content-center"><!--Certificate_name-->
            				               <label for="name" id="name" class="col-2 col-form-label required">Form Name:</label>
            				                     <div class="col-6">
            					                    <input class="form-control noerror" type="text" tabindex="-1" placeholder="Form Name" name="consent_form_name" value="" id="consent_form_name">
            				                      </div>
                                          <input class="form-control noerror" type="text" tabindex="-1" placeholder="" name="ctl00_AdminID" id="ctl00_AdminID" value="<?php echo $userDetails->ID; ?>" hidden>
            				
            				<!---starting& ending date of Certificate------->
                             
                   <!--------------Upload_button--------------->
                          
                  <div class="form-group row justify-content-md-center">
                    <div class="row justify-content-center">
                      <div class="col-md-12">
                        <div class="container preview">
                          <label class="upload_lbl" for="input">Please upload a picture !</label>
                            <div class="input">
                              <input name="item_img" id="file" type="file" >
                            </div>
                        </div>
                        <br>
                        <center><span style="color:white;" id="input_image_number" class="input_image_number"></span></center>
                        </div>
                      </div>
                    </div>
                  </div>
                              <script>
                $(function(){
  var container = $('.preview'), inputFile = $('#file'), img, btn, txt = 'Browse', txtAfter = 'Browse another pic';

  if(!container.find('#upload').length){
    container.find('.input').append('<input type="button" value="'+txt+'" id="upload">');
    btn = $('#upload');
    container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg" width="100">');
    img = $('#uploadImg');
  }

  btn.on('click', function(){
    img.animate({opacity: 0}, 300);
    inputFile.click();
  });

  inputFile.on('change', function(e){
    document.getElementById('input_image_number').innerHTML=`Number of images selected : ${e.originalEvent.srcElement.files.length}`;
    container.find('label').html( inputFile.val() );

    var i = 0;
    for(i; i < e.originalEvent.srcElement.files.length; i++) {
      var file = e.originalEvent.srcElement.files[i],
        reader = new FileReader();

      reader.onloadend = function(){
        img.attr('src', reader.result).animate({opacity: 1}, 700);
      }
      reader.readAsDataURL(file);
      img.removeClass('hidden');
    }

    btn.val( txtAfter );
  });
});
                </script>

                        
                          <!--------------Save_button--------------->
                             
                                <div class="form-group row justify-content-md-center">
                                      <div class="row justify-content-center">
                                        <div class="col-md-2">
                                        <input type="submit" class="btn btn-success " name="  Upload_consent_form_button" id="Upload_consent_form_button" value="Save" style="width:150px; "/>
                                </div>
                                </div>
                              </div>
                             
                               <div class="card card-outline-info mb-3 margin_bot_8">
                                  <div class="card-block">
                                   <table id="myTable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
                      
                              </table>

                               </div>
                             </div>
                   </form>	
                  </div>
                </div>
        
            
				<!--INSERT HERE-->
				

        <!-----------list of call certificate with there expiry date----->

           

        
	
<!--------
  --------------------------------------------------->
<script>
  var $value=0;
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); // 1st
  /**********@@@@@@@@@@@@@@@@@@@@@@***************/  /*List of all active admitted patients*/
  
  $.ajax({
       type: "GET",
       url: "/get_consent_form.php",//from global_variable    <?php //echo $url_get_all_patients_ipd; ?>
       data: {start: $value}, // serializes the form's elements. */
       success: function(data)
       {
         console.log(`active patients ${data}`);
        var json = JSON.parse(data);
       /* on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
        location.href = "./home.php"
          var json = data;*/
        parseJsonToTable(json,"#myTable");
        $value=$value+10;
      }
    });
    
},true);

$( "form" ).on( "submit", function( event ) {
  event.preventDefault();// avoid to execute the actual submit of the form.
  var formData = new FormData(this);
  console.log(formData);
    var url = "<?php echo BASE_URL;?>set_consent_form.php"; // the script where you handle the form input.
  //validateForm(event)
  var test=validateForm(event);
  if (test==true){ 
      $.ajax({
           type: "POST",
           url: url,
           data: formData, // serializes the form's elements.
           success: function(data)
           { 
          
            console.log(data);
            //location.href = "./manage_accounts.php"
            if(data=="1"){
                swalSuccess("Form Stored");
          //setTimeout(function(){ location.reload(); }, 2000); 
            }else{
              swalError("From not Stored.");
            }

           
           },
          cache: false,
          contentType: false,
          processData: false
         });
     
         resetform(upload_consent_form_button_form)
      }else {}
      
});



function parseJsonToTable(json){

  trbl = $('<thead class="thead-teal"><tr class="head_row "><th >Sr. No.&nbsp;&nbsp;&nbsp;</th><th>Form Name</th><th>date added</th><th class="no-sort"><center>Action</center></th><th class="no-sort"><center>Action</center></th></tr></thead><tbody>');
  $('table').append(trbl);                   
     for (var i = 0; i < json.length; i++) {  
      var SrNo=i+1;
      var date = json[i].WhenEntered;
      tr=$(`<tr class="tbl_row" id="${json[i].ID}">`);
      tr.append("<td>&nbsp;&nbsp;&nbsp;" + SrNo + "</td>");
      tr.append("<td>" + json[i].name_form+ "</td>");
      /* tr.append("<td>&nbsp;&nbsp;&nbsp;" + json[i].bed_count+ "</td>");
      tr.append("<td>&nbsp;&nbsp;&nbsp;" + bed_available+ "</td>"); */
      tr.append("<td>" + date + "</td>");
      tr.append('<td class=""><center><button type="button" onclick="imgviewer('+json[i].id+')" class="btn btn-outline-info" title="view Form" style="width:100px"><i class="fa fa-pencil fa-2"aria-hidden="true"></i>&nbsp;View</button></td>');
      tr.append('<td class=""><center><button type="button" onclick="window.open(\'/'+json[i].path_cform+'\')" class="btn btn-outline-info" title="Download Form" style="width:100px"></i>Download</button></td>');
      $('table').append(tr);
      
      }
    table_list = $('#myTable').DataTable({
         "order": [[ 0, "asc" ]],
          "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
         "buttons": [
          /* 'csv', */ 'excel',/* 'pdf'*/, 'print'
          ],
        "info":     false,
        "language": {
        searchPlaceholder: "Search records",
        search:""
        },
        "oLanguage": {
        "sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
        },
          "autoWidth": false,
          /* "aoColumns": [null,null,null,{ "bSortable": false },{ "bSortable": false },], */
          "columnDefs": [ {
                    "targets"  : 'no-sort',
                    "orderable": false,
                  }],
          "pagingType":"simple_numbers",
          "lengthMenu": [[10, 15, 20, 25, 50, -1], [10, 15, 20, 25, 50, "All"]]
      });
      $('div.dataTables_filter input').focus();
}

function validateForm(){
  var tname = document.forms["upload_consent_form_button_form"]["consent_form_name"].value;
  //var bed_count = document.forms["add_category_form"]["ctl00_bed_count"].value;
    if (tname == "") {
    swalError("consent form name must be filled out");
    $("#consent_form_name").focus();
        return false;
  }/* else if (bed_count=="" || bed_count==null){
    swalError("Bed count must be filled out");
    $("#add_ward_bed_count").focus();
    return false;
  } */else{return true;}
}
function imgviewer(img)
{

window.open("/view_img.php?id="+img, "_blank");



}
function imgdownloader(link)
{



}



</script>

<?php
$pageTitle = "Consent Form"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>
