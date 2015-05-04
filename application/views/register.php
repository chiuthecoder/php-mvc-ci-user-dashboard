<?php 
	$this->load->view('partials/head');
?>
	<title>Register</title>
</head>
<body>
<?php 
	$this->load->view('partials/navbar');
	$this->load->view('partials/messages-reg');
?>
<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h3>Register</h3>
				<form action="createNewUser" method="post">
				  <div class="form-group">
				    <label for="first_name">First Name:</label>
				    <input type="first_name" name="first_name" class="form-control" id="first_name" placeholder="First Name">
				  </div>
				  <div class="form-group">
				    <label for="last_name">Last Name:</label>
				    <input type="last_name" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
				  </div>
				  <div class="form-group">
				    <label for="email">Email Address:</label>
				    <input type="email" name="email" class="form-control" id="email" placeholder="e.g. barack.obama@gmail.com">
				  </div>
				  <div class="form-group">
				    <label for="password">Password:</label>
				    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
				  </div>
				  <div class="form-group">
				    <label for="confirm">Confirm Password:</label>
				    <input type="password" name="password_confirmation" class="form-control" id="confirm" placeholder="Confirm Password">
				  </div>
				  <button type="submit" class="btn btn-success pull-right">Register</button>
				</form>
				<a href="signin">Already have an account? Sign in now!</a>
			</div>
		</div>
	</div>

	<hr>

</body>
</html>

