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
                        <a href="#">ประมวลผลประจำรอบ</a>
                    </li>
                     <!-- time sheet -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Time Sheet
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">ประวัติการลงเวลา</a></li>
          <li><a href="#">รายการทำงานล่วงเวลา</a></li>
        </ul>
      </li>
                       <!-- รายได้ - รายการหัก -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">รายได้ - รายการหัก
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="otherdeduct.php">รายการหัก</a></li>
          <li><a href="#">รายได้อื่น ๆ</a></li>
          <li><a href="transcost.php">ค่าเดินทาง</a></li>
        </ul>
      </li>
                     <li>
                        <a href="#">รายงาน</a>
                    </li>
                    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Data
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="employee.php">Employee</a></li>
          <li><a href="branch.php">Branch</a></li>
          <li><a href="position.php">Position</a></li>
          <li><a href="leavetype.php">Leave Type</a></li>
          <li><a href="deducttype.php">Deduct Type</a></li>
          <li><a href="department.php">Department</a></li>
          <li><a href="empincome.php">Employee Income</a></li>
          <li><a href="bank.php">Bank Information</a></li>
        </ul>
      </li>
      <!-- Config -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuration
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="systemcon.php">Prepare for Monthly Closing</a></li>
          <li><a href="systemconfig.php">System Configuration</a></li>
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
          <li><a href="userprofile.php">User Profile</a></li>
          <li><a href="includes/logout.php">Log Out</a></li>
        </ul>
      </li>
    </ul>
            </div>
            
            <!-- /.navbar-collapse -->
        </div>
        
        <!-- /.container -->
    </nav>
    
    