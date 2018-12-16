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
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">ประมวลผลประจำรอบ
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="systemcon.php">จัดเตรียมข้อมูลก่อนระมวลผล</a></li>
                              <li><a href="monthlyclosingprocress.php">ประมวลผลค่าจ้างประจำรอบ</a></li>
                            </ul>
                          </li>
                    </li>
                     <!-- time sheet -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Time Sheet
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="attentran.php">ประวัติการลา</a></li>
          <li><a href="overtime.php">รายการทำงานล่วงเวลา</a></li>
        </ul>
      </li>
                       <!-- รายได้ - รายการหัก -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">รายได้ - รายการหัก
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="otherdeduct.php">รายการหัก</a></li>
          <li><a href="otherallowance.php">รายได้อื่น ๆ</a></li>
          <li><a href="transcost.php">ค่าเดินทาง</a></li>
          <li><a href="positionallow.php">เงินประจำตำแหน่ง</a></li>
        </ul>
      </li>
                     <li>
                        <a href="#">รายงาน</a>
                    </li>
                    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ข้อมูลตั้งต้น
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="employee.php">พนักงาน</a></li>
          <li><a href="branch.php">สาขา</a></li>
          <li><a href="position.php">ตำแหน่งงาน</a></li>
          <li><a href="leavetype.php">ประเภทการลา</a></li>
          <li><a href="deducttype.php">ประเภทการหัก</a></li>
          <li><a href="department.php">แผนก/ฝ่าย</a></li>
          <li><a href="empincome.php">รายได้</a></li>
          <li><a href="bank.php">ธนาคาร</a></li>
        </ul>
      </li>
      <!-- Config -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">กำหนดค่าระบบ
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="systemconfig.php">กำหนดค่าใช้งานระบบ</a></li>
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
    
    