<?php 
  if($this->session->userdata('logged_in') == TRUE)
  {
?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">UI Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="dashboard">Dashboard</a></li>
            <li>
               <a><form action="profile" method="post">
                <input type="hidden" name="id" value="<?= $this->session->userdata('user_id') ?>">
                <input class="nav-link" type="submit" value="<?= $this->session->userdata('first_name'); ?>'s Profile">
              </form></a>
            </li>
          </ul>

          <div class="navbar-form navbar-right">
            <a href="logout"><button type="submit" class="btn btn-success">Log Out</button></a>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<?php 
  }
  else
  {   
?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">UI Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
            <a href="signin"><button type="submit" class="btn btn-success">Sign In</button></a> 
            <a href="register"><button type="submit" class="btn btn-success">Register</button></a>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<?php 
  }
?>

