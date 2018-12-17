<?php
require dirname(__FILE__)."/../framework/helpers.php";
$users = db_select("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Dashboard Template for Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 main">
					<h1 class="page-header">Users</h1>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Email</th>
									<th>Nickname</th>
								</tr>
							</thead>
							<tbody>
								
                                <?php foreach($users as $user){ ?>
                                    <tr>
                                        <td> <?php echo $user->ID; ?> </td>
                                        <td> <?php echo $user->email; ?> </td>
                                        <td> <?php echo $user->nickname; ?> </td>
                                    </tr>
                                
                                <?php } ?>

                                    
                               
                                
								<!-- add PHP here -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>