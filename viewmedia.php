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
	<title>View Media Data - CF Public Library</title>
	<!-- Custom styles for this template -->
	<link href="CSS/headertablefooter.css" rel="stylesheet">
	<link href="CSS/signin.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Bootstrap Javascript core -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container-fluid">
		<!--- HEADER SECTION BEGINS --->
		<header id="header" class="header">
			<div class="headerlogo" id="headerlogo">
				<img src="IMG/cfpubliclibrarylogo.png" alt="CF Public Library Logo">
			</div>
		</header><!-- /HEADER -->
		<!--- LOGIN CONTENT SECTION BEGINS FOR EMPLOYEES --->
		<div class="headertitle" id="headertitle" >
			<h1>Content Management System</h1>
		</div>
		<div class="">
			<table class="table table-responsive">
				<tr>
					<tr>
						<td><a href="viewmedia.php"><button class="btn btn-default">View Media Data</button></a></td>
						<td><a href="viewauthor.php"><button class="btn btn-default">View Author Data</button></a></td>
						<td><a href="viewpublisher.php"><button class="btn btn-default">View Publisher Data</button></a></td>
						<td><a href="viewgenres.php"><button class="btn btn-default">View Genres Data</button></a></td>
						<td><a href="viewemployee.php"><button class="btn btn-default">View Employee Data</button></a></td>
						<td><a href="indexcfpublib.php"><button class="btn btn-default">Hompage</button></a></td>

					</tr>
					<tr>
						<td><a href="createmedia.php"><button class="btn btn-default">Create Media Data</button></a></td>
						<td><a href="createauthor.php"><button class="btn btn-default">Create Author Data</button></a></td>
						<td><a href="createpublisher.php"><button class="btn btn-default">Create  Publisher Data</button></a></td>
						<td><a href="creategenres.php"><button class="btn btn-default">Create  Genres Data</button></a></td>
						<td><a href="createemployee.php"><button class="btn btn-default">Create  Employee Data</button></a></td>
						<td><a href="logout.php"><button class="btn btn-default">Logout</button></a></td>
					</tr>
				</table>
			</div>
			<hr>
			<!---CONTENT SECTION ENDS --->

			<!---TABLE AND DATABASE DATA PULL BEGINS--->
			<div>
				<H3>VIEW MEDIA DATA</H3>
			</div>
			<hr>
			<div class="manageTable">
				<table border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th>Media_ID</th>
							<th>ISBN#</th>
							<th>Media Code</th>
							<th>Title</th>
							<th>Image</th>
							<th>Description</th>
							<th>Media Type</th>
							<th>Publisher Date</th>
							<th>Total Units</th>
							<th>Available Units</th>
							<th>Unit Location</th>
							<th>Author</th>
							<th>Publisher</th>
							<th>Genre</th>
							<th>Admin</th>
							<th>Creation Date</th>
							<th>Last Updated</th>
							<th>Edit/Delete</th>
						</tr>
					</thead>
					<tbody>

						<?php
						require_once 'actions/db_connect.php';

						$sql = "SELECT `media`.`Media_ID`, `media`.`ISBN_No`, `media`.`MediaCode`, `media`.`Title`, `media`.`TitleImage`, `media`.`Description`, `media`.`MediaType`, `media`.`PublisherDate`, `media`.`Total_Count`, `media`.`Avail_Count`, `media`.`Location_ID`, `authors`.Name as authorName, `authors`.Surname as authorSurname, `publishers`.Name, `genres`.`GenreName`, `employee`.`Name` as empname, `employee`.`Surname` as empsurname, `media`.`Created_at`, `media`.`Updated_at`
						FROM `media`
						INNER JOIN `authors` ON `media`.`fk_Author_ID` = `authors`.`Author_ID`
						INNER JOIN publishers ON `media`.`fk_Publ_ID`  = `publishers`.`Publ_ID`
						INNER JOIN genres ON `media`.`fk_Genres_ID` = `genres`.`Genres_ID`
						INNER JOIN `employee` ON `media`.`fk_EmpAdmin_ID` = `employee`.`EmpAdmin_ID`";

						//when createing above like this `authors`.Name as authorName it is making it more simple to remember and link the name. Then used below. 
						$result = $connect->query($sql);

						if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<tr>
								<td>".$row['Media_ID']."</td> 
								<td>".$row['ISBN_No']."</td>
								<td>".$row['MediaCode']."</td>
								<td>".$row['Title']."</td>
								<td><img src='".$row['TitleImage']."' width=100px></td>
								<td>".$row['Description']."</td>
								<td>".$row['MediaType']."</td>
								<td>".$row['PublisherDate']."</td>
								<td>".$row['Total_Count']."</td>
								<td>".$row['Avail_Count']."</td>
								<td>".$row['Location_ID']."</td>
								<td>".$row['authorName']." " .$row['authorSurname']."</td>
								<td>".$row['Name']."</td>
								<td>".$row['GenreName']."</td>
								<td>".$row['empname']." ".$row['empsurname']."</td>
								<td>".$row['Created_at']."</td>
								<td>".$row['Updated_at']."</td>
								<td> 
								<a href='updatemedia.php?Media_ID=".$row['Media_ID']."'><button type='button'><i class='fas fa-edit'></i></button></a>
								<a href='deletemedia.php?Media_ID=".$row['Media_ID']."'><button type='button'><i class='fas fa-trash-alt'></i></button></a>
								</td>
								</tr>";
								
							} 
						} else {
							echo "<tr><td colspan='13'><center>No Data Avaliable</center></td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
			<!---ENDS TABLE AND DATABASE DATA PULL--->

			<!---FOOTER SECTION BEGINS --->
			<footer id="footer">
				<div>
					<img class="center-block" src="IMG/cfpubliclibraryblack.png" alt="CF Public Library Logo" width="300">
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