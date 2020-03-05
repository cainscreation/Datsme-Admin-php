<?php


$error = false;
if (isset($_POST['delete'])) {
	$name = mysqli_real_escape_string($conn, $_POST['bid']);
if(mysqli_query($conn, "DELETE FROM blog where bid=$name")) {
  header("Location: dashboard.php");
	}
}

?>


	<div class="container" style="margin-top:5%;">


		<div class="forum">
			<form role="form" action="upload.php" method="post" name="signupform" enctype="multipart/form-data">
				<!-- <fieldset> -->
				<div class="form-group">
					<label for="name">Title</label>
					<input type="text" name="title" placeholder="Title of Blog"  class="form-control" />
				</div>
				<div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" type="text" name="content" placeholder="Content of Blog"></textarea>
  	</div>
		<div class="form-group">
			<p class="text-danger">If showing error while uploading.Please <strong>CHANGE NAME OF IMAGE</strong> then try again. </p>
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-dark" />

		</div>
				<div class="button" style="padding:2%;">
					<input type="submit" name="signup" value="Publish" class="btn btn-dark" />
				</div>
				<!-- </fieldset> -->
			</form>
		</div>


<div>
	<h2>Display already Uploaded</h2>
	<div>
		<table>
			<tr>
				<th class="display" style="width:10vw;">Blog ID</th>
				<th class="display" style="width:35vw;">Blog Title</th>
				<th class="display"style="width:35vw;">Blog Content</th>
				<th class="display" style="width:10vw;">Blog Update</th>
				<th class="display"style="width:10vw;">Blog Delete</th>
				<th class="display"style="width:10vw;">Blog View</th>


			</tr>
			<?php
	    $result3 = mysqli_query($conn, "SELECT * FROM blog");//selecting from row of the email
	    while($rows=mysqli_fetch_assoc($result3)){
	    ?>
			<tr>
				<td style="width:10%; margin-bottom:3%;"><?php echo $rows['bid'];  ?></td>
				<td style="width:35%;  margin-bottom:3%;"><?php echo $rows['btitle']; ?></td>
				<td style="width:35%;  margin-bottom:3%;"><p class="help"><?php echo $rows['bcontent']; ?></p></td>
				<td style="width:10%; margin-bottom:3%;"><a href="edit.php?id=<?php echo $rows['bid']; ?>">Edit</a></td>
				<td style="width:10%;  margin-bottom:3%;"><a href="delete.php?id=<?php echo $rows['bid'];?>">Delete</a></td>
				<td style="width:5%;  margin-bottom:3%;"><?php echo $rows['view'];?></td>

			</tr>
		<?php } ?>
		</table>
	</div>

</div>




</div>
