    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Payroll System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Data
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="employee.php">Employee</a></li>
          <li><a href="branch.php">Branch</a></li>
          <li><a href="position.php">Position</a></li>
        </ul>
      </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
      <li>
      <a href="#"><span class="glyphicon glyphicon-bell"></span> การแจ้งเตือน</a>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['UserID']; ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">User Profile</a></li>
          <li><a href="includes/logout.php">Log Out</a></li>
        </ul>
      </li>
    </ul>
            </div>
            
            <!-- /.navbar-collapse -->
        </div>
        
        <!-- /.container -->
    </nav>
    
    