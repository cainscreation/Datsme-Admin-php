<?php
ob_start();
include_once("db_connect.php");
session_start();
$id=$_GET['id'];
$rs = mysqli_query($conn, "SELECT * FROM blog WHERE bid=$id");//selecting from row of the email
$rr=mysqli_fetch_assoc($rs);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>EDIT | <?php  echo $rr['btitle'];?></title>
    <link rel="stylesheet" href="css/mainregister.css">
    <link rel="stylesheet" href="css/images.css">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <div class="forum">
      <form role="form" action="up.php" method="post" name="signupform" enctype="multipart/form-data">
        <!-- <fieldset> -->
        <div class="form-group">
          <label for="name">ID</label>
          <input type="text" id="staticsEmail" name="id" placeholder=""  class="form-control-plaintext" value="<?php echo $rr['bid']; ?>">ID:<?php echo $rr['bid']; ?></text>
        </div>
        <div class="form-group">
          <label for="name">Title</label>
          <input type="text" name="title" placeholder=""  class="form-control" value="<?php echo $rr['btitle']; ?>"></text>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="50" type="text" name="content" placeholder=""><?php  echo $rr['bcontent'];?></textarea>
    </div>
    <!-- <div class="form-group">
      <p class="text-danger">If showing error while uploading.Please <strong>CHANGE NAME OF IMAGE</strong> then try again. </p>
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-dark" />

    </div> -->
        <div class="button" style="padding:2%;">
          <input type="submit" name="signup" value="Update" class="btn btn-dark" />
        </div>
        <!-- </fieldset> -->
      </form>
    </div>
    <?php include("footer.php"); ?>

  </body>
</html>
