<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
 if(isset($_GET['ID'])){$ID=$_GET['ID'];}
 ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php';?>
	<link rel='stylesheet' type='text/css' href='/invoice/css/style.css'/>
	<link rel='stylesheet' type='text/css' href='/invoice/css/print.css' media="print"/>
	<script type='text/javascript' src='/invoice/js/example_ipd.js'></script>
	<link href="/dist/css/report.css" rel="stylesheet"/>
	<link href="/dist/css/AdminLayout.css" rel="stylesheet"/>
<style>
body{background:#f1f1f1;}
table{border:0px}
.hmms_hdr_rgt table td, table th ,.hmms_hdr_lft table td, table th {border: 0px solid #808080;padding: 0px;}
@media print {


	.section-notto-print, .section-notto-print * {
		visibility:none;
		display:none;
	}
	#qrcode{
		    margin-top: 5%;
	}
  .section-to-print, .section-to-print * {
    visibility: block;
  }
  .section-to-print {
	padding:10px!important;
	margin-top:5px;
    position: absolute;
    left: 0;
    top: 0;
  }
  .cke_top, .print_invisible{
		visibility:none;
		display:none!important;
	}
	.button_section{
		margin : 0px;
		border:0px;
	}
	.print_padding_letterhead{
		margin-top:15%;
	}
}
</style>
	<div class="container" id="reg-form-container" style="margin-top:15px;">
<br>

			<div class="card card-outline-info mb-3 print-section section-notto-print" >
			  <div class="card-block heading_bar">
				<h5><!--List of all Patients--> <!--title--></h5>
				<a href="#" onclick="goBack()" class="float" title="Click, to go back">
				<i class="fa fa-times my-float"></i>
			</a>
			  </div>
			</div>
		<div class="card card-outline-info mb-3" style="margin-bottom: 1rem!important;">
			<div class="card-block" id="print">
		      <!-------------main block--------------------->
          <form id="receipt_form">
              <div class="c" style="size: height:10%;">
                  <table class="border border-dark" width="100%">
                      <tr>
                          <td colspan="4">
                            <div >
                                  <br>
                                        <center>
                                            <h3 class="hr_special"><?PHP ECHO $hos_name;?></h3>
                                       </center>
                                       <hr class="hr_special">
                                         <center><?PHP ECHO $hos_add;?>, <br>  Mob.: <?PHP ECHO $contact;?></center>
                                        <hr>
                                  <br>
                             </div>
                         </td>
                      </tr>
                      <tr>
                          <td colspan="2">&nbsp; &nbsp; &nbsp; &nbsp;  Receipt No.<label id="receipt_num" name="receipt_num" style="font-weight:bold;"></label></td>
                          <td  colspan="2">Date: <label id="cur_date" style="font-weight:bold"></label></td>
                      </tr>
                      <tr>
                          <td  colspan="4">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Received with thanks for Mr./Mrs <label id="patient_name" name="patient_name" style="font-weight:bold"></label></td>
                      </tr>
                      <tr>
                          <td style="width: 21%;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;the sum of Rupees:₹</td>
                          <td ><input type="text" id="rupees" name="rupees" class="form-control-plaintext price" style="font-weight:bold;"/></td>
                          <td  colspan='2'></td>
                      </tr>
                      <tr>
                          <td  colspan="4">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;by<label class="radio-inline"><input type="radio" name="paymenttype" value="cheque" id="cheque">Cheque /</label><label class="radio-inline"><input type="radio" name="paymenttype" value="cash" id="cash" />Cash</label>in
                            <label class="radio-inline"><input type="radio" name="partradio" value="Full" id="full">Full /</label><label class="radio-inline"><input type="radio" name="partradio" value="part" id="part">Part</label><label></label>

                          </td>
                      </tr>
                      <tr class="show-me-cheque" style='display:none'>
                        <td >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cheque Number:</td>
                        <td><input type="text" id="cheque_no" name="cheque_no" class="form-control" /></td>
                        <td  colspan='2'></td>
                      </tr>
                      <tr>
                          <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Date:</td>
                          <td><input type="date" id="paid_date" name="paid_date" class="form-control" /></td>
                          <td>Drawn On:</td>
                          <td><input type="text" id="drawn_on" name="drawn_on" class="form-control-plaintext" style="font-weight:bold"/></td>
                      </tr>
                     <tr>
                     <td  colspan="2" rowspan="4" ><label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Amount:&nbsp;</label><span id="amt_in_words"></span><br/><br/><br/><br/></td>
                         <td>on A/c. of:</td>
                         <td><input type="text" id="acc_no" name="acc_no" class="form-control-plaintext" style="font-weight:bold"/></td>
                      </tr>
                        <tr>
                             
                            <td  colspan="2" rowspan="3"><?php echo $hos_name;?><br/><br/><br/><br/><br/><br/></td>
                        </tr>
                        <tr>
                            
                            
                        </tr>
                        <tr>
                            
                            
                        </tr>

                  </table>
             </div>
			<!-----------------------------main_block_end------------------>
			</div>
		</div>
    <div class="card card-outline-info mb-3 do-not-print button_section" style="margin-bottom: 3rem;margin-top: 1rem;">
      <div class="card-block" >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-2">
              <button type="Submit" class="btn btn-outline-teal" id="button_save_reciept" href="javascript:void(0)" style=""> <i class="fa fa-save fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Save</button>
            </div>
            <div class="col-md-2">
              <button type="Submit" class="btn btn-outline-danger" id="button_print" onclick="window.print();"> <i class="fa fa-print fa-2x add_row" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Print </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
  </form>

	</div>
</div>
<!----------------------------------------------------------->
	<div class="modal fade" id="myModal_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
		<div class="modal-dialog modal-lg modal_for_report" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
			<!--<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Send message</button>-->
			</div>
		</div>
	</div>
</div>
<!----------------------------------------------------------->
<script>
var $value="<?php echo $ID?>";
var $value1="<?php echo $_GET['Reg_id'];?>";
var $value2="<?php echo $_GET['ID'];?>";
<?php
if(isset($_GET['receipt_id'])){
  $reciept_id=$_GET['receipt_id'];
  echo "value3 = \"$reciept_id\" ;";
}else{
  echo "value3 = '';";
}
?>


$('input[name=paymenttype]').click(function () {
  if(this.value=="cheque"){
        $(".show-me-cheque").show('slow');
        $(".show-me-neft").hide('slow');
    } else if(this.value=="cash"){
        $(".show-me-cheque").hide('slow');
        $(".show-me-neft").hide('slow');
	}
});

$(document).ready(function() {
  if(value3==""){
    $.ajax({
    			   type: "GET",
    			   url: <?php echo $get_patient_detail_by_regID; ?>,//from global_variable
    			   data: {ID: $value1},
    			   success: function(data)
    			   {
    					var json = JSON.parse(data);
              document.getElementById('patient_name').innerHTML=json.FirstName+" "+json.LastName;

              $.ajax({
              			   type: "GET",
              			   url: "create_receipt_no.php",//from global_variable
              			   data: {'token':1},
              			   success: function(data)
              			   {
              					//var json = JSON.parse(data);
                        console.log(data);

                        document.getElementById('receipt_num').innerHTML=data;
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = mm + '/' + dd + '/' + yyyy;

                        document.getElementById('cur_date').innerHTML=today;
                        //var receipt_number=document.getElementById('receipt_num').innerHTML;
                        //  alert(data);

              			 }



                      });
    					//parseJsonToform(json);
            }
          });
  }else{
      document.getElementById('receipt_num').innerHTML=value3;
      $.ajax({
               type: "POST",
               url: "/clickview_receipt_details.php",//from global_variable
               data: {'ID':value3},
               success: function(data)
               {
                console.log(data);
                var json=JSON.parse(data);
                populate_data(json);

             }



              });

  }

    });

function populate_data(json){
  for(i=0;i<json.length;i++){
    debugger;
    document.getElementById('patient_name').innerHTML=json[i].patient_name;
    document.getElementById('paid_date').value=json[i].paid_date;
    document.getElementById('rupees').value=json[i].total;
    var amount=document.getElementById('rupees').value;
    convertNumberToWords(amount);
    document.getElementById('drawn_on').value=json[i].Drawn_on;
    document.getElementById('acc_no').value=json[i].Account_no;
    if(json[i].payment_type=="cash"){
      document.getElementById('cash').checked=true;
    }else   if(json[i].payment_type=="cheque"){
        document.getElementById('cheque').checked=true;
        $(".show-me-cheque").show('slow');
        $(".show-me-neft").hide('slow');
      }else{
          document.getElementById('cash').checked=true;
          $(".show-me-cheque").hide('slow');
          $(".show-me-neft").hide('slow');

        }
      document.getElementById('cheque_no').value=json[i].cheque_no;

      if(json[i].paid_in_installment=="part"){
        document.getElementById('part').checked=true;
      }else   if(json[i].paid_in_installment=="full"){
          document.getElementById('full').checked=true;
        }else{
            document.getElementById('full').checked=true;
          }
          if(json[i].receipt_date==""){

          var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy = today.getFullYear();

          today = mm + '/' + dd + '/' + yyyy;

          document.getElementById('cur_date').innerHTML=today;
        }else{
          document.getElementById('cur_date').innerHTML=json[i].receipt_date;
        }

  }

}
    $(".price").change(function(){
      var amount=document.getElementById('rupees').value;
      convertNumberToWords(amount);
    });

    function convertNumberToWords(amount) {
            var words = new Array();
            words[0] = '';
            words[1] = 'One';
            words[2] = 'Two';
            words[3] = 'Three';
            words[4] = 'Four';
            words[5] = 'Five';
            words[6] = 'Six';
            words[7] = 'Seven';
            words[8] = 'Eight';
            words[9] = 'Nine';
            words[10] = 'Ten';
            words[11] = 'Eleven';
            words[12] = 'Twelve';
            words[13] = 'Thirteen';
            words[14] = 'Fourteen';
            words[15] = 'Fifteen';
            words[16] = 'Sixteen';
            words[17] = 'Seventeen';
            words[18] = 'Eighteen';
            words[19] = 'Nineteen';
            words[20] = 'Twenty';
            words[30] = 'Thirty';
            words[40] = 'Forty';
            words[50] = 'Fifty';
            words[60] = 'Sixty';
            words[70] = 'Seventy';
            words[80] = 'Eighty';
            words[90] = 'Ninety';
            amount = amount.toString();
            var atemp = amount.split(".");
            var number = atemp[0].split(",").join("");
            var n_length = number.length;
            var words_string = "";
            if (n_length <= 9) {
                var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
                var received_n_array = new Array();
                for (var i = 0; i < n_length; i++) {
                    received_n_array[i] = number.substr(i, 1);
                }
                for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                    n_array[i] = received_n_array[j];
                }
                for (var i = 0, j = 1; i < 9; i++, j++) {
                    if (i == 0 || i == 2 || i == 4 || i == 7) {
                        if (n_array[i] == 1) {
                            n_array[j] = 10 + parseInt(n_array[j]);
                            n_array[i] = 0;
                        }
                    }
                }
                value = "";
                for (var i = 0; i < 9; i++) {
                    if (i == 0 || i == 2 || i == 4 || i == 7) {
                        value = n_array[i] * 10;
                    } else {
                        value = n_array[i];
                    }
                    if (value != 0) {
                        words_string += words[value] + " ";
                    }
                    if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Crores ";
                    }
                    if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Lakhs ";
                    }
                    if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Thousand ";
                    }
                    if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                        words_string += "Hundred and ";
                    } else if (i == 6 && value != 0) {
                        words_string += "Hundred ";
                    }
                }
                words_string = words_string.split("  ").join(" ");
                document.getElementById('amt_in_words').innerHTML="<b>"+words_string+"</b>";
            }
            return words_string;
        }

        $("#receipt_form").on("submit",function(event){
          event.preventDefault();
          //alert("swati");
          //var formData=$(this).serialize();
          var formData = new FormData(this);
          var receiptNo = document.getElementById('receipt_num').innerHTML;
          var cur_date = document.getElementById('cur_date').innerHTML;
          var patient_name = document.getElementById('patient_name').innerHTML;
          formData.append('receipt_No', receiptNo);
          formData.append('current_date', cur_date);
          formData.append('reg_id', $value1);
          formData.append('pat_id', $value2);
          formData.append('patient_name', patient_name);
          console.log("Form data is : "+formData);
          var test = validations();
          if(test == true){
          var url="/set_receipt_details.php";
          $.ajax({
            type: "POST",
            url:url,
            data: formData,
            success: function(data){

              //swalSuccess("success");
              swalSuccess("success");
              // setTimeout(function(){
              //   location.reload();
              // },2000);
            },
           cache: false,
           contentType: false,
           processData: false
          });
        }
        });

        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
        }

function print_div(){
  printDiv('reg-form-container');
}


        function validations(){


                var cash = document.getElementById('cash');
        				var cheque = document.getElementById('cheque');
        				var full = document.getElementById('full');
        				var part = document.getElementById('part');

        				if(full.checked || part.checked){
                    return true;
        				 }else {
        				 	swalError("Select the installment method !!");
        				 }

                 if(cash.checked || cheque.checked){
                  if(cheque.checked){
                    var cheque_number=document.getElementById('cheque_no').value;
                    if(cheque_number==""){
                      swalError("Enter Check No");
                    }else if(cash.checked){
                      return true;
                    }else{
                      return true;
                    }
                  }
                 }else{
                   swalError("Select the Payment method ");
                 }

                 var amount=document.getElementById('rupees').value;
                 if(amount==""){
                   swalError("Enter Amount");
                 }
                 
                 var paid_date=document.getElementById('paid_date').value;
                 if(paid_date==""){
                     swalError("Enter Paid date")
                 }

        }
</script>
<?php
$pageTitle = "Receipt"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>

<?php include './include/footer.php';?>
