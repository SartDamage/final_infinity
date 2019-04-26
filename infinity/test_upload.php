<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <!--<input type="file" name="fileToUpload" id="fileToUpload">-->
    <input type="submit" value="Upload Image" name="submit">
	<div class="form-group row " >
			   <label for="fileToUpload" style="margin:auto;">
					<img id="test" src="https://www.w3schools.com/howto/img_avatar.png"/>
				</label>

				<input id="fileToUpload" name="fileToUpload" type="file"  onchange="document.getElementById('test').src = window.URL.createObjectURL(this.files[0])"/>
			</div>	
</form>

</body>
</html>