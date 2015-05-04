<?php 
	$this->load->view('partials/head');
?>
	<title>Admin Dashboard</title>
	<script>
		$(document).ready(function() {
			$('button.special-button').on('click', function() {
				var id = $(this).val();
				$('#passId').val(id);
			})
		});
	</script>
</head>
<body>
<?php 
	$this->load->view('partials/navbar');
	$this->load->view('partials/messages');
	$this->load->view('partials/modal');
?>
<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Hello <?= $this->session->userdata('username') ?> (<?= $this->session->userdata('user_level') ?>)</h3>
				<h4 class="inline">Manage Users</h4>
				<a href="new_user"><button type="submit" class="btn btn-info pull-right inline">Add New</button></a>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-bordered">
		      <thead>
		        <tr>
		          <th>ID</th>
		          <th>Name</th>
		          <th>Email</th>
		          <th>Created At</th>
		          <th>User Level</th>
		          <th colspan="2">Actions</th>
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
			          <td><?= $user['user_level']; ?></td>
			          <td>
			          	<form class="link" action="edit_user" method="post">
			          		<input type="hidden" name="id" value="<?= $user['id']; ?>">
			          		<input class="link" type="submit" value="edit">
			          	</form>
			          </td>
			          <td>
			          	<button value="<?= $user['id']; ?>" type="button" class="link special-button" data-toggle="modal" data-target=".bs-example-modal-lg">Remove</button>
			          </td>
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
