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
.preview{
  width: 200px;
  margin: 50px auto;
  font-family: sans-serif;
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
                  <form method="post" action="" class="form " name="Certificated_upload"  id="certificated_upload" enctype="multipart/form-data" style="">
                  <div class="form-group row justify-content-center">
                    <!--Certificate_name-->
				      <label for="name" id="name" class="col-2 col-form-label required">Name Of Certificate</label>
				      <div class="col-8">
					    <input class="form-control noerror" type="text" tabindex="-1" placeholder="Certificat Name" name="first_name_input" value="" id="first_name_input">
				      </div>
				</div>
				<!---starting& ending date of Certificate------->
                  <div class="form-group row justify-content-center">
                         <label for="s_date_of_Certificate" class="col-2 col-form-label required">Starting Date of Certificate</label>

                                    <div id="s_date_of_Certificate_div" class="col-3 input-group date">
                                    <input class="form-control" type="text" id="s_date_of_Certificate" class="date_of_Certificate" name="s_date_of_Certificate"  autocomplete="none" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                           <label for="e_date_of_Certificate" class="col-2 col-form-label required">Expiry Date of Certificate</label>

                                    <div id="e_date_of_Certificate_div" class="col-3 input-group date">
                                    <input class="form-control" type="text" id="e_date_of_Certificate" class="date_of_Certificate" name="e_date_of_Certificate" autocomplete="none" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>

                        </div>
       <!--------------Upload_button--------------->
                  <div class="row justify-content-md-center">

                <div class="col-md-2">
                  <div class="container preview">
                    <label class=" upload_lbl" for="input">Please upload a picture !</label>
                    <div class="input">
                      <input name="item_img" id="file" type="file" multiple>
                    </div>
                  </div>
                  <br>
                  <center><span style="color:white;" id="input_image_number" class="input_image_number"></span></center>
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
              </div>
              <!--------------Save_button--------------->
                   <div class="row justify-content-md-center">

                <div class="col-md-2">

                                <div class="col-md-2">
                                <input type="submit" class="btn btn-success " name="certificate_save_button" value="Save" style="width:150px; "/>

                    </div>
                    </div>
                  </div>
                  <div class="row justify-content-md-center">
                     <div class="col-md-2">
                        <input type="text" id="hd_id" name="hd_id" hidden />

                     </div>
                  </div>
                 </div>
              <div class="card-block">
                <table class="table table-striped table-hover display nowrap" id="myTable" style="width:100%">

          </table>

        </div>



                   </form>


				<!--INSERT HERE-->


        <!-----------list of call certificate with there expiry date----->



         ----------------------------------------->

<!----------------------------------------------------------->
<script>
  $( "form#certificated_upload" ).on( "submit", function( event ) {
          event.preventDefault();// avoid to execute the actual submit of the form.
          //console.log( $(this).serialize() );
  //var form = document.getElementById('#registration');
  var formData = new FormData(this);
  //var formData = new FormData(this);
  console.log(formData);
  var url = "/setter/certificate_details.php"; // the script where you handle the form input.
  //validateForm(event)
 // var test=validateForm(event);
  //var test=true;

    $.ajax({
         url: url,
         data: formData, // serializes the form's elements.
          type: "POST",
       success: function(data)
         {
        //  console.log(data);

           setTimeout(function(){
                      location.reload();
                     }, 1000);

                swalSuccess("Your Data has been saved");

           // swalError("Error please reload the page !");

        //  console.log(`this is ajax loop  ${data}`);
          //on success take form data and enter to any page you require be it IPD or OPD or Patho.
          //location.href = "/login.php"
         },
      cache: true,
        contentType: false,
        processData: false
       });

});

$("#s_date_of_Certificate").datepicker({
        format: "dd MM yyyy "
    });
$("#e_date_of_Certificate").datepicker({
        format: "dd MM yyyy "
    });

      $.ajax({
            type: "POST",
            url: "/getter/get_details.php",//from global_variable
            //data: {start: '<?php /*if(isset($_SESSION['loggedin'])){ function base64url_encode($data) {return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); } echo base64url_encode($userDetails->RegistrationID);} */?>'}, // serializes the form's elements. */
            data: {id: "id"}, // serializes the form's elements. */
            success: function(data)
            {
              var json = JSON.parse(data);
              //alert(data);
              //alert("hello in ajax success loop");
              //on success take form data and enter to any pafe you require be it IPD or OPD or Patho.
              //location.href = "./home.php"
              //var json = data;
              console.log("data"+json);
              parseJsonToTable(json,"#myTable");
            }
          });

      function parseJsonToTable(json,myTable){
            /* <th class="no-sort">Select</th> */
            debugger;
            trbl=$('<thead class="thead-teal"><tr><th>Name Of Certificate</th><th>Starting Date</th><th>Expiry Date</th><th>Action</th><th>Action</th></tr></thead><tbody>')
            $(myTable).append(trbl);
            for (var i = 0; i < json.length; i++) {
            tr = $('<tr class="tbl_row" class="thead-teal">');

              tr.append("<td>"+json[i].certificate_name+"</td>");
              tr.append('<td><center>'+json[i].starting_date+'</center></td>');
              tr.append("<td>" +json[i].expiry_date+"</td>");
              tr.append('<td><button class="btn btn-outline-info" type="Completed" onclick="status_updater(this)" data-uid="'+json[i].id+'" data-vid= "'+json[i].certificate_name+'" data-wid= "'+json[i].starting_date+'" data-xid="'+json[i].expiry_date+'" data-toggle="modal" data-target="#myModal1" value="Completed"><i class="fa fa-pencil fa-2" aria-hidden="true"></i>Udpate</button>')
              tr.append('<td><button class="btn btn-outline-danger" type="Completed" onclick="deleteRow('+json[i].id+')" data-status_id="'+json[i].id+'" data-toggle="modal" data-target="#myModal1" value="Completed"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i>Delete</button>')

              $(myTable).append(tr);
            }

             



        $('#myTable').DataTable({
           "scrollX": true,
          "scrollCollapse": true,
           "order": [[ 3, "desc" ], [ 0, 'desc' ]],
           "dom": "<'row'<'col-sm-2'><'col-sm-7'f><'col-sm-1'><'col-sm-2'B>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-3'l><'col-sm-3'i><'col-sm-6'p>>",
            "buttons": [
            /* 'csv','csv', */ 'excel', /*'pdf'*/, 'print'
            ],
            "info":     false,
            "language": {
                searchPlaceholder: "Search records"
              },
            "oLanguage": {
                "sLengthMenu": "Display records&nbsp; _MENU_ &nbsp;",
                },
            /* "autoWidth": true, */
             /* "columnDefs": [{ "width": "15%", "targets": 0 },{ "width": "5%", "targets": 1 },{ "width": "5%", "targets": 2 },{ "width": "5%", "targets": 3 },], */
            "columnDefs": [ {
                  "targets"  : 'no-sort',
                  "orderable": false,
                }],
            /* "aoColumns": [null,null,{ "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },], */
            "pagingType":"simple_numbers",
             "lengthMenu": [[ 10, 15, 20, 25, 50, -1], [ 10, 15, 20, 25, 50, "All"]]
        });
        $('div.dataTables_filter input').focus();
      }

 function status_updater(context)
 {

   var certi_name=context.getAttribute("data-vid");
   var id=context.getAttribute("data-uid");
  var s_name=context.getAttribute("data-wid");
  var e_name=context.getAttribute("data-xid");
//  var pincode=context.getAttribute("data-xid");
  //alert(area_code);
  document.getElementById("first_name_input").value =certi_name;
  document.getElementById("hd_id").value =id;
  document.getElementById("s_date_of_Certificate").value = s_name;
  document.getElementById("e_date_of_Certificate").value = e_name;
 // document.getElementById("areamaster_pincode_text").value = pincode;
 }


      function deleteRow(code) {
  //console.log(code);
  //var code2= code.toString();
 // var code2 = code.getAttribute("data-uid");
 
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this Row!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    //alert(code2);
     $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL;?>setter/delete_certificate.php",
      data: {'id':code},
      success: function(output) {
                  swalSuccess("Row Deleted!");
                        // var data= JSON.parse(output);
                           console.log(output); 
                          setTimeout(function(){ 
                           location.reload(); 
                           }, 800);
                          populateTable(output);  
                        
                   },
      error: function(request, status, error){
        console.log(error);
      }
    });
  } else {
    swal("Row Not Deleted!");
  }
});

}
 



</script>
<?php
$pageTitle = "Certificated"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
