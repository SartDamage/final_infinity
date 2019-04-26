<?php
ob_start (); // Buffer output
//session_start();
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="manifest" href="/manifest.json">
<title><!--title--></title>
<!--<link rel="shortcut icon"  href="/favicon.ico" />-->
<link rel="shortcut icon" type="image/x-icon" href="data:image/x-icon;,">
<script >var favIcon = "R0lGODlhEAAQAPABAADl//8AACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFHgABACwAAAAAEAAQAAACE4yPqcvtD+IzEcxQr968+w+GRgEAIfkEBR4AAQAsAgAHAAMABwAAAgSEj6kFACH5BAUeAAEALAEABAAFAAoAAAIIhB2py+2/jikAIfkEBR4AAQAsBwAIAAEABgAAAgKEXwAh+QQFHgABACwIAAkABAAFAAACBgxgkYqsVgAh+QQFHgAAACwNAAYAAQABAAACAkwBACH5BAUeAAAALAwABQADAAMAAAIDRIxXACH5BAkeAAAALAcABAAJAAgAAAIKhB+ni80PEpwUFAAh+QQJHgACACwDAAQADAAKAAACEJSPqaHJLYKUMFbzrgK6wwIAIfkECR4AAgAsAgAEAAsACgAAAhWEhZmgLdyCU3KGe09crj44aeEBIgUAIfkECR4AAgAsAgAEAAkACgAAAhSEhQnJshxaii1YK+mbaLcjGR5SAAAh+QQJHgACACwBAAQACgAKAAACEASEqcsaLYJkstLZHtzKwAIAIfkEBR4AAgAsAAAAABAAEAAAAiGEhanG6tmeBLLa64LGSAfshVbojeR3lZzKVVQbXcxhMQUAIfkEBR4AAAAsAwADAAsACwAAAhGEEXmLyg9hmrTaa6PWM/ZTAAAh+QQFHgAAACwCAAIADAAMAAACFYQRGcfYvx6LTdmLs7ayU98dnzQaBQAh+QQFHgAAACwBAAEADgAOAAACFIQdGcftD6OMqtqLs951+g9OHVMAACH5BAUeAAEALAcABwACAAIAAAIChFEAIfkECR4AAQAsBQAFAAYABgAAAgpMAHaY7L+QkqEAACH5BAkeAAEALAQABAAIAAgAAAIPTIBglnrI2npwNZdi1a4AACH5BAkeAAEALAIAAgAMAAwAAAIZjAMJx6h9FoI0JqguzTVL9kTG13BbiKFBAQAh+QQJHgACACwAAAAAEAAQAAACJgQiqRt26wB7MEm2st68e/Nd12d5pQB2qcm2JlKhWQNbzmTUWwMUACH5BAkeAAIALAAAAAAQABAAAAIYRISpGLafDpy02oszAiBzDYbiyGSNVDUFACH5BAkeAAIALAAAAAAQABAAAAIXjI6Zpu0Po5QAzFPtzRf3D4biqDBTUAAAIfkEBR4AAQAsAwAFAAQAAwAAAgSEY4dQADs=";

var docHead = document.getElementsByTagName('head')[0];
var newLink = document.createElement('link');
newLink.rel = 'shortcut icon';
newLink.href = 'data:image/gif;base64,'+favIcon;
docHead.appendChild(newLink);
</script>
<!--bootstrap css-->

	<link rel="stylesheet" href="/dependencies/css/bootstrap.min.css">
	<link rel="stylesheet" media="print" href="/dependencies/css/bootstrap.min.css">
	       <!-- <link rel="stylesheet" href="/style4.css">-->
	<!--OPtional CDN-->
	<!--<link rel="stylesheet" href="./dependencies/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">-->
  <!--bootstrap JS-Popper-slimjs-->

	<!--<script src="/dependencies/js/jquery-3.2.1.slim.min.js"></script>-->
	<!-- CDN OPtion<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->


<!--font awesome-->
	<!--<link rel="stylesheet" src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>-->
	<script src="/dist/js/jquery-3.2.1.min.js"></script>
	<script src="/dist/js/jquery-ui.min.js"></script>

			<!--<script src="/dependencies/js/popper.js/1.12.9/umd/popper.min.js"></script>-->
			<script src="/dependencies/js/popper.js/1.14.1/umd/popper.min.js"></script>
			<!--<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>-->
			<script src="/dependencies/js/bootstrap.min.js"></script>
	<!-- cdn option<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
			<script src="/dist/js/printThis.js"></script>
	<!-- CDN option<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>-->
	<script src="/dist/js/charts.js"></script>
	<script src="/dist/js/qrcode.min.js"></script><!--qr code-->
	<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
		<!--<script src="/dist/js/jquery.dataTables.min.js"></script><!-- essential for table -->
	<!-- <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> -->
	<!--<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>-->
		<!--<script src="/dist/js/dataTables.responsive.min.js"></script><!-- responsive table integration styling -->
		<!--<script src="/dist/js/dataTables.bootstrap.min.js"></script><!-- bootstrap integration styling -->
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>-->
	<!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> -->
		<!--<script src="/dist/js/buttons.print.min.js"></script><!-- for table rendering-->
	<!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script> -->
		<!--<script src="/dist/js/buttons.html5.min.js"></script><!-- for excel export button -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
		<!--<script src="/dist/js/jszip.min.js"></script><!-- for excel export button -->
	<!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> -->
		<!--<script src="/dist/js/dataTables.buttons.min.js"></script><!-- for export buttons-->
	<!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script> -->
	<!--<script src="/dist/js/buttons.flash.min.js"></script>-->      <!--------@@@@ for PDF @@@@ ------->
	<script type="text/javascript" src="/Datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/dist/js/plugins_for_datatables/moment.js"></script><!-- for date time sort -->
	<script type="text/javascript" src="/dist/js/plugins_for_datatables/datetime-moment.js"></script><!-- for date time sort -->
	<!-- no changes on excluding-->
	<script src="/dist/js/JsBarcode.all.js"></script>
	<!--custom js-->
	<script src="/dist/js/jsforall.js"></script>
	<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
	<!--<script src="/dist/js/camera_jpeg/swfobject.min.js" type="text/javascript"></script>
	<script src="/dist/js/camera_jpeg/canvas-to-blob.min.js" type="text/javascript"></script>
	<script src="/dist/js/camera_jpeg/jpeg_camera.min.js" type="text/javascript"></script>-->


	<!--<script src="/dist/js/camera_jpeg/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>-->
	<script src="/dist/js/webcam/webcam.min.js" type="text/javascript"></script>
	<script async language="JavaScript" type="text/javascript" src="/dist/js/jsrsasign-latest-all-min.js"></script><!-- for jwt-->
	<!--<script language="JavaScript" type="text/javascript" src="http://kjur.github.io/jsrsasign/jsrsasign-latest-all-min.js"></script><!-- for jwt-->
<!-- CDN option
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  -->
<!-- CDN option
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>-->
  <!--<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">-->
  <link href="/dist/font-awesome-4.7.0/css/fontawesome-all.css" rel="stylesheet">
  <!--<link href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet">-->
  <!--<link href="/dist/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
   <!--<script src="/dist/font-awesome-4.7.0/css/all.js"></script>-->


  <!--<script defer src="/dist/font-awesome-4.7.0/js/all.js"></script>-->
  <!--<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>-->
  <!--<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/v4-shims.js"></script>-->
  <!--<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>-->
  <!-- <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
  <link href="/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet"> -->
  <link href="/dist/css/responsive.dataTables.min.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet"> -->
  <link href="/include/roboto.css" rel="stylesheet">
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" rel="stylesheet">-->
  <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
  <script src="/dist/js/sweetalert.min.js"></script>
	<!--auto complete-->
	<!----><!-- JS file --><!----------------------------------------------------->
	<!----><script src="/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script> 	<!---->
	<!----><link rel="stylesheet" href="/EasyAutocomplete/easy-autocomplete.min.css"> <!---->
	<!--auto complete closed--><!------------------------------------------------->
  <!--style in header-->
  <link href="/dist/css/style_in_header.css" rel="stylesheet">

	<!-- end  style for sidevar-->


<!-- start from and to datepicker
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>-->

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="/dist/js/datepicker3.js"></script>
<link rel="stylesheet" href="/dist/css/datepicker3.css"/>
<!--end from and to datepicker-->

	<style>
	#overlay {
    position: fixed; /* Sit on top of the page content */
    display: none; /* Hidden by default */
    width: 100%; /* Full width (cover the whole page) */
    height: 100%; /* Full height (cover the whole page) */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255,255,255,1); /* Black background with opacity */
    z-index: 199; /* Specify a stack order in case you're using a different order for other elements */
    cursor: pointer; /* Add a pointer on hover */
}

.fieldset{
	border:1px solid #a1a1a1;padding:10px 30px;border-radius:10px;
}

div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }

	</style>

</head>
