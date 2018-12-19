<?php
require_once dirname(__FILE__)."/../framework/loggedin.php";
require dirname(__FILE__)."/../framework/helpers.php";
if(!empty($_POST)){
	if(!empty($_POST['action'])){
		switch($_POST['action']){
			case 'insert':
			echo "here";
				if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nickname'] )){
                    // db_query() > INSERT INTO
                    db_query(
						sprintf("INSERT INTO `users` (`email`, `password`, `nickname`) VALUES ('%s','%s','%s')",
						$_POST['email'],
						$_POST['password'],
						$_POST['nickname']
						)
					);
                }
				
			break;
			case 'update':
				if(!empty($_POST['id'])){
					if(!empty($_POST['email']) && !empty($_POST['nickname'])){
					// db_query() > UPDATE Users SET ...
					$db_query = sprintf("UPDATE `users` SET `email`= '%s', `nickname`= '%s'  WHERE ID= %d",
						$_POST['email'],
						$_POST['nickname'],
						$_POST['id']
					);
                    db_query($db_query);
                    }
				}
				
			break;
			case 'delete':
				if(!empty($_POST['id'])){
                // db_query() > DELETE FROM Users ...
                db_query(
					sprintf("DELETE FROM Users WHERE ID=%d",
						$_POST['id']
					)
					);
                }
			break;
		}
		header('Location: pages.php');
	}
}

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
	<?php require_once dirname(__FILE__)."/parts/header.php"; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 main">
					<h1 class="page-header">Users</h1>
                    <!-- ERROR !!!!  -->
                    
                    <a href="user.php">Add New User</a>

					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Email</th>
									<th>Nickname</th> 
									<th>ACTIONS</th> 
								</tr>
							</thead>
							<tbody>
								
                                <?php foreach($users as $user){ ?>
                                    
                                    <tr>
                                        <td> <?php echo $user->ID; ?> </td>
                                        <td> <?php echo $user->email; ?> </td>
                                        <td> <?php echo $user->nickname; ?> </td>
										<td> <a href="user.php?ID=<?php echo  $user->ID ?>">Update</a>  </td>
                                    </tr>
                                
                                <?php } ?>
                                                                                     			
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