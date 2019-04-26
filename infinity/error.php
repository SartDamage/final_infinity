<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();

?>
<style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}





/* Style the accordion panel. Note: hidden by default */
.panel {
    padding: 0 18px;
    background-color: white;
    display: none;
    overflow: hidden;
}
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
@keyframes fadeInOut {
  0% {
    opacity: 0;
  }

  50% {
    opacity: 1;
  }
  
  100% {
    opacity: 0;
  }
}
.blink {
/*      -webkit-animation-name: fadeInOut; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 2s; /* Safari 4.0 - 8.0 */
    -webkit-animation-iteration-count: 3; /* Safari 4.0 - 8.0 */
/*    animation-name: fadeInOut;
    animation-duration: 2s;
    animation-iteration-count: infinite; */
	animation: fadeInOut 1s steps(2, start) infinite;
    }

    @keyframes blink {
      to {
        visibility: hidden;
		-webkit-transition: all 3s ease;
	  -moz-transition: all 3s ease;
	  -ms-transition: all 3s ease;
	  -o-transition: all 3s ease;
	  transition: all 3s ease;
      }
    }
    @-webkit-keyframes blink {
      to {
        visibility: hidden;
		-webkit-transition: all 3s ease;
  -moz-transition: all 3s ease;
  -ms-transition: all 3s ease;
  -o-transition: all 3s ease;
  transition: all 3s ease;
      }
    }
</style>
<?php include  $_SERVER['DOCUMENT_ROOT']."/include/header.php";?>
<?php // include $_SERVER['DOCUMENT_ROOT']."/include/navbar_framework/nav_sidebar_patho_home.php";?>
  <link href="/dist/css/style_list_all_patients.css" rel="stylesheet">
  <script>

 $('a').click(function(){
        $('a').removeClass("active");
        $(this).addClass("active");
    });
	
	
  </script>

  <body>

		<?php include 'nav_bartop.php';?>
		<div class="container" style="margin-top:10px;">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Error !</h4>
					<p class="card-text"><small class="text-muted">Please retrace your steps</small></p>
				</div>
			</div>
		<!--<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>-->
		</div>
		<!---------------------------------->
		<div class="container" style="margin-top:10px;">

					
					<div class="card card-inverse card-primary p-2 text-center">
						<blockquote class="card-blockquote">
							<p>Error !</p>
							<!--<i class="fa fa-warning fa-jumbo blink" title="error" style="color:red"></i>-->
							<i class="fa fa-exclamation-circle fa-jumbo-7x blink" style="color:red">
								<!--<i class=" fa fa-circle-thin fa-stack-2x " style="color:red"></i>
								<i class=" fa fa-exclamation fa-stack-1x blink" style="color:red"></i>-->
							</i>
							<footer>
								Contact your <cite title="dr.vishal@hospital.com">Administrator</cite>
							</footer>
						</blockquote>
					</div>
		</div>

<?php
$pageTitle = "Not Allowed"; // Call this in your pages' files to define the page title
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--title-->', $pageTitle, $pageContents);
?>	

<?php include './include/footer.php';?>