<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
 
 ?>
<?php
$formid=$_GET['id'];
$db = getDB();
$statement=$db->prepare("SELECT * from concent_form where `id`=:formid");
$statement->bindParam(':formid',$formid);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);


$db=null;

?>
<style>
	
	@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<body>
	<center>
	<img src="/<?php echo $results[0]['path_cform']; ?>" alt="Smiley face" height="600" width="500">
	<br>
	<br>
	<br>
	<button id="img_print" onclick="print_img()" class="no-print">Print</button>
	</center>
	<script>
		function print_img()
		{

			window.print();




		}

	</script>
	</body>
<?php
$pageTitle = "Receipt generation";/* Call this in your pages' files to define the page title*/
$pageContents = ob_get_contents ();/* Get all the page's HTML into a string*/
ob_end_clean (); /* Wipe the buffer*/

/* Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML*/
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	
</html>