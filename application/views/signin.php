<?php 
	$this->load->view('partials/head');
?>
	<title>Signin Page</title>
</head>
<body>
<?php 
	$this->load->view('partials/navbar');
	$this->load->view('partials/messages');
?>
<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h3>Sign-In</h3>
				<form action="retrieveOneUser" method="post">
				  <div class="form-group">
				    <label for="email">Email Address:</label>
				    <input type="email" name="email" class="form-control" id="email" placeholder="First Name">
				  </div>
				  <div class="form-group">
				    <label for="password">Password:</label>
				    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-success pull-right">Sign In</button>
				</form>
				<a href="register">Don't have an account? Register today!</a>
			</div>
		</div>
	</div>

	<hr>

</body>
</html>

