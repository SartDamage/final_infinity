<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';

$db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//echo $json;
$db=null;
?>
<!DOCTYPE html>
<html>
<head>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <title>Convert JSON Data to HTML Table Example</title>
</head>
<body>

					<table class="table table-hover">
					<thead >
					
						<tr class="">
							<th ></th>
							<th>Registration ID</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Contact</th>
							<th>Email</th>
							<th>First Visit</th>
						</tr>
						</thead>
						<tbody>
					</table>
					
					
</body>
<script>
        $(document).ready(function () {
        var json = <?php echo $json;?>
        //var tr;
        for (var i = 0; i < json.slice(0,5).length; i++) {
			var date = json[i].WhenEntered;
			var date = date.substr(0, 11);
            tr = $('<tr >');
			tr.append("<td >"+ json[i].FirstName + "  " + json[i].LastName + "</td>");
			tr.append("<td>" + json[i].RegistrationID + "</td>");
            tr.append("<td>" + json[i].FirstName + "  " + json[i].LastName + "</td>");
            tr.append("<td>" + json[i].Gender + "</td>");
			tr.append("<td >" + json[i].Age + "</td>");
            tr.append("<td>" + json[i].Mobile + "</td>");
            tr.append("<td>" + json[i].Email + "</td>");
            tr.append("<td>" + date + "</td>");
            $('table').append(tr);
        }
    });
</script>

</html>