<?php
require_once dirname(__FILE__)."/../framework/loggedin.php";
require dirname(__FILE__)."/../framework/helpers.php";
if(!empty($_POST)){
	if(!empty($_POST['action'])){
		switch($_POST['action']){
			case 'insert':
				if(!empty($_POST['email'] && $_POST['password'] && $_POST['nickname'] )){
                    // db_query() > INSERT INTO
                    db_query("INSERT INTO `users` (`email`, `password`, `nickname`) VALUES ('".($_POST['email'])."','".($_POST['password'])."','".($_POST['nickname'])."')");
                }
				
			break;
			case 'update':
				if(!empty($_POST['ID'])){
					if(!empty($_POST['email'] && $_POST['nickname'])){
                    // db_query() > UPDATE Users SET ...
                    db_query("UPDATE `users` SET 'email'='".($_POST['email'])."','nickname'='".($_POST['nickname'])."' WHERE ID='".($_POST['ID'])."'");
                    }
				}
				
			break;
			case 'delete':
				if(!empty($_POST['ID'])){
                // db_query() > DELETE FROM Users ...
                db_query("DELETE FROM `users` WHERE ID='".($_POST['ID'])."'");
                }
			break;
		}
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

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 main">
					<h1 class="page-header">Users</h1>
                    <!-- ERROR !!!!  -->
                    
                    <a href="user.php?id=<?php echo $user->id ?>">Add New User</a>

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