<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<h2 class="text-center mb-4">Admin Login</h2>
        <div>
          <?php if(isset($_GET['alertMessage'])) {echo "<div class='alert alert-danger' role='alert'>". $_GET['alertMessage']." Please try again.</div>";} ?>
        </div>
				<form action="action.php?action=login" method="post" >
					<div class="form-group">
						<label for="username">Username</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
	<!-- Include Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>