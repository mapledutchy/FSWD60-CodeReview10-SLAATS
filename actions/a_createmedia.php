<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="CF Public Library">
	<meta name="Jamie Slaats" content="CF Public Library">
	<link rel="icon" href="../../favicon.ico">
	<title>Action Create Media - CF Public Library</title>
	<!-- Custom styles for this template -->
	<link href="../CSS/headertablefooter.css" rel="stylesheet">
	<link href="../CSS/signin.css" rel="stylesheet">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Bootstrap Javascript core -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
	<div class="container">
		<!--- HEADER SECTION BEGINS --->
		<header id="header" class="header">
			<div class="headerlogo" id="headerlogo">
				<img src="../IMG/cfpubliclibrarylogo.png" alt="CF Public Library Logo">
			</div>
		</header><!-- /HEADER -->
		<!--- LINKS CONTENT SECTION BEGINS --->
		<div class="headertitle" id="headertitle" >
			<h1>Content Management System</h1>
		</div>
		<div class="">
		<table class="table table-responsive">
				<tr>
					<tr>
					<td><a href="../viewmedia.php"><button class="btn btn-default">View Media Data</button></a></td>
					<td><a href="../viewauthor.php"><button class="btn btn-default">View Author Data</button></a></td>
					<td><a href="../viewpublisher.php"><button class="btn btn-default">View Publisher Data</button></a></td>
					<td><a href="../viewgenres.php"><button class="btn btn-default">View Genres Data</button></a></td>
					<td><a href="../viewemployee.php"><button class="btn btn-default">View Employee Data</button></a></td>
					<td><a href="../indexcfpublib.php"><button class="btn btn-default">Hompage</button></a></td>
					
				</tr>
					<tr>
					<td><a href="../createmedia.php"><button class="btn btn-default">Create Media Data</button></a></td>
					<td><a href="../createauthor.php"><button class="btn btn-default">Create Author Data</button></a></td>
					<td><a href="../createpublisher.php"><button class="btn btn-default">Create  Publisher Data</button></a></td>
					<td><a href="../creategenres.php"><button class="btn btn-default">Create  Genres Data</button></a></td>
					<td><a href="../createemployee.php"><button class="btn btn-default">Create  Employee Data</button></a></td>
					<td><a href="../logout.php"><button class="btn btn-default">Logout</button></a></td>
				</tr>
		</table>
		</div>
		<!--- LINKS CONTENT SECTION ENDS --->
		<hr>
		<!--- ADD CONTENT TO SYSTEM SECTION BEGINS --->
		<fieldset>

		<legend>ADD MEDIA CONTENT</legend>
		<div class="contentconfirmed">

<?php 

require_once 'db_connect.php';

if($_POST) {
 $isbnno = $_POST['ISBN_No'];
 $mediacode = $_POST['MediaCode'];
 $title = $_POST['Title'];
 $titleimage = $_POST['TitleImage'];
 $description = $_POST['Description'];
 $mediatype = $_POST['MediaType'];
 $publisherdate = $_POST['PublisherDate'];
 $totalcount = $_POST['Total_Count'];
 $availcount = $_POST['Avail_Count'];
 $locationid = $_POST['Location_ID'];
 $fkauthorid = $_POST['fk_Author_ID'];
 $fkpublid = $_POST['fk_Publ_ID'];
 $fkgenresid = $_POST['fk_Genres_ID'];
 $fkempadminid = $_POST['fk_EmpAdmin_ID'];

 $sql = "INSERT INTO media (ISBN_No,MediaCode, Title, TitleImage, Description, MediaType, PublisherDate, Total_Count, Avail_Count, Location_ID, fk_Author_ID, fk_Publ_ID, fk_Genres_ID, fk_EmpAdmin_ID) VALUES ('$isbnno','$mediacode', '$title', '$titleimage', '$description', '$mediatype', '$publisherdate', '$totalcount', '$availcount', '$locationid', '$fkauthorid', '$fkpublid', '$fkgenresid', '$fkempadminid')";
 if($connect->query($sql) === TRUE) {
   echo "<p>New Record Successfully Created</p>";
   echo "<a href='../createmedia.php'><button type='button'>Back</button></a>";
   echo "<a href='../indexcfpublib.php'><button type='button'>CF Home</button></a>";
 } else {
   echo "Error " . $sql . ' ' . $connect->connect_error;
 }

 $connect->close();
}

?>

</div>
		<br>
		<br>
<!---FOOTER SECTION BEGINS --->
			<footer id="footer">
				<div>
					<img class="center-block" src="../IMG/cfpubliclibraryblack.png" alt="CF Public Library Logo" width="300">
				</div>
				<div class="copyright text-center">
					<p>Jamie Slaats - CodeFactory 2019&#169;</p>
				</div>
			</footer>
			<!--- END OF FOOTER SECTION --->
		</footer>
	</div> <!-- /container -->
</body>

</html>