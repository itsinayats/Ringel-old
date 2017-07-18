
<!DOCTYPE html>
 <html>
 <title>Account Settings</title>
 <head>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/seller_profile.css">

   <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

  </head>

  <body>
  	
    	<div class="col-md-8 col-md-offset-2">
    		<table class="table table-striped">
  				<div class="well"><center>Buyers Following You</center></div>
  					<tr>
  						<th>
  							buyer name
  						</th>

  						<th>
  							Email
  						</th>

  						<th>
  							Contact
  						</th>
  					</tr>

  						<?php
require 'includes/connect.php';

 $sellerid = $_GET['id'];


 $products_count = mysqli_query($con,"SELECT buyerid FROM seller_follow WHERE sellerid='".$sellerid."' ");
    while($display_followers = mysqli_fetch_array($products_count))
    {
    	$get_buyer_info = $display_followers['buyerid'];

    	$buyer_info  = mysqli_query($con,"SELECT * FROM buyer_info WHERE buyerid='".$get_buyer_info."' ");

    	$get_info = mysqli_fetch_array($buyer_info);

    	?>  

    	<tr>
    		<td> <?php echo $get_info['buyername']; ?>  </td>
    		<td> <?php echo $get_info['email']; ?>  </td>
    		<td> <?php echo $get_info['contact']; ?>  </td>



    	</tr>

    	<?php

    }

    	?>

  					
  				

			</table>
		</div>
    	
    	




  </body>
  </html>