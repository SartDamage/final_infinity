<?PHP 
$db = getDB();
$statement=$db->prepare("SELECT * FROM adminpageconfigmaster");
$statement->execute();
$admin_base=$statement->fetch();
//$json=json_encode($results);
//echo $json;
$username = "";
if(isset($admin_base) && $admin_base!="") {$username = $admin_base["email"];}
$password = "";
if(isset($admin_base) && $admin_base!="") {$password = base64_decode($admin_base["password"]);}
$sender_name = "";
if(isset($admin_base) && $admin_base!="") {$sender_name = $admin_base["sender_name"];}
$smtp_secure = "";
if(isset($admin_base) && $admin_base!="") {$smtp_secure = $admin_base["smtp_secure"];}
$host = "";
if(isset($admin_base) && $admin_base!="") {$host = $admin_base["host_email"];}
$port = "";
if(isset($admin_base) && $admin_base!="") {$port = $admin_base["port_email"];}
$hospital_name = "";
if(isset($admin_base) && $admin_base!="") {$hospital_name = $admin_base["name_hospital"];}
$db=null;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top navbar_custom_bg">
  <a class="navbar-brand" href="/index.php">
    <!--<img src="<?php// echo $logourl;?>" width="30" height="30" alt="">-->
	<?PHP ECHO $hospital_name;?><!--Hospital Management System-->
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
    </form>-->
	</ul><!-- delete when un comment-->
	<span class="navbar-text justify-content-end" title="Click to logout">
    Welcome <?php echo $userDetails->firstname; ?>, <a  
    onclick="logout()"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;logout</a>
	<script>
	function logout(){
		swal({
		  title: "Log out?",
		  text: "Are you sure to end your session?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			swal("Successfully Logged out", {
			  icon: "success",
			});
			window.setTimeout(redirect(), 3000);
			
			
		  } else {
			swal("You are continuing your session");
		  }
		});
	}
	function redirect(){
			window.location="<?php echo BASE_URL;?>logout.php";
		}
	</script>
  </span>
  </div>
</nav>
<div id="overlay"></div>