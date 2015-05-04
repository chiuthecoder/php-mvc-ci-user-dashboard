<?php 
  $this->load->view('partials/head');
?>
  <title>Home Page</title>
</head>
<body>
<?php 
  $this->load->view('partials/navbar');
?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to the User Dashboard</h1>
        <p>We're going to build a cool application using an MVC Framework! A dashboard is "an easy to read, often single page, real-time user interface, showing a graphical presentation of the current status.</p>
        <p><a class="btn btn-success btn-lg" href="register" role="button">Register</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Manage Users</h2>
          <p>Using this application, you'll be able to add, remove and edit users for the application.</p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div>
        <div class="col-md-4">
          <h2>Leave Messages</h2>
          <p>Users will be able to leave a message to another user using this applicaiton.</p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
       </div>
        <div class="col-md-4">
          <h2>Edit User Information</h2>
          <p>Admins will be able to edit another user's information (email address, first name, last name, etc.).</p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; User Dashboard 2015</p>
      </footer>
    </div> <!-- /container -->
</body>
</html>