<?php 
	$this->load->view('partials/head');
?>
	<title>User Dashboard</title>
</head>
<body>
<?php 
	$this->load->view('partials/navbar');
?>
<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Hello <?= $this->session->userdata('username') ?> (<?= $this->session->userdata('user_level') ?>)</h3>
				<h4 class="inline">All Users</h4>
			</div>
			<div class="col-lg-12">
				<table class="table table-bordered">
		      <thead>
		        <tr>
		          <th>ID</th>
		          <th>Name</th>
		          <th>Email</th>
		          <th>Created At</th>
		          <th>User Level</th>
		        </tr>
		      </thead>
		      <tbody>
<!-- LOOP STARTS -->
<?php 			foreach ($users as $user)
						{
?>						<tr>
			          <td><?= $user['id']; ?></td>
			          <td>
			          	<form action="profile" method="post">
			          		<input type="hidden" name="id" value="<?= $user['id']; ?>">
			          		<input class="link" type="submit" value="<?= $user['first_name'] . " " . $user['last_name']; ?>">
			          	</form>
			          </td>
			          <td><?= $user['email']; ?></td>
			          <td><?= $user['created_at']; ?></td>
			          <td><?= $user['user_level'] ?></td>
			        </tr>
<?php 			}
?>
<!-- LOOP ENDS -->
		      </tbody>
		    </table>
			</div>
		</div>
	</div>
</body>
</html>