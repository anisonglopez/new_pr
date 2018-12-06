<?php 
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php 
$sql = "SELECT * FROM tm01_system_condition";
$DATA = mysqli_query($conn, $sql);
//--------------------Select Database----------------------
  if(mysqli_num_rows($DATA) > 0)
  while ($rows = mysqli_fetch_array($DATA)) {
    $System_Name = $rows['System_Name'];
    $Copy_Right = $rows['Copy_Right'];
    $Owner_Brief_Name = $rows['Owner_Brief_Name'];
    $Owner_E_Name = $rows['Owner_E_Name'];
    $Owner_T_Name = $rows['Owner_T_Name'];
    $Owner_Address = $rows['Owner_Address'];
    $Owner_Tel = $rows['Owner_Tel'];
    $Owner_Fax = $rows['Owner_Fax'];
    $Tax_ID_Owner = $rows['Tax_ID_Owner'];
    $Term_P_M = $rows['Term_P_M'];
    $PaidDate = $rows['PaidDate'];
    $PaidDate_2 = $rows['PaidDate_2'];
    $WkHrs_Drv = $rows['WkHrs_Drv'];
    $WkHrs_Empl = $rows['WkHrs_Empl'];
    $ShiftALW_M_PD = $rows['ShiftALW_M_PD'];
    $ShiftALW_E_PD = $rows['ShiftALW_E_PD'];
    $ShiftALW_N_PD = $rows['ShiftALW_N_PD'];
    $MealALW_F_PD = $rows['MealALW_F_PD'];
    $MealALW_B_PM = $rows['MealALW_B_PM'];
    $LiveALW_PM = $rows['LiveALW_PM'];
    $NoAbsALW_PT = $rows['NoAbsALW_PT'];
    $FoodALW_PD = $rows['FoodALW_PD'];
    $NightFoodShift = $rows['NightFoodShift'];
    $ShiftALW_E_PD = $rows['ShiftALW_E_PD'];
    //------------Allowance --------------------
    $Allow1_Name = $rows['Allow1_Name'];
    $Allow2_Name = $rows['Allow2_Name'];
    $Allow3_Name = $rows['Allow3_Name'];
    $Allow4_Name = $rows['Allow4_Name'];
    $Allow5_Name = $rows['Allow5_Name'];
    $Allow6_Name = $rows['Allow6_Name'];
 //------------Allowance --------------------
//------------Expense --------------------
$Expen1_Name = $rows['Expen1_Name'];
$Expen2_Name = $rows['Expen2_Name'];
$Expen3_Name = $rows['Expen3_Name'];
$Expen4_Name = $rows['Expen4_Name'];
  
  //------------	Slick Leave Allowance --------------------
  $LDed_ResdALW_F = $rows['LDed_ResdALW_F'];
  $OVT_ResdALW_F = $rows['OVT_ResdALW_F'];
  $PF_ResdALW_F = $rows['PF_ResdALW_F'];
  $SOC_ResdALW_F = $rows['SOC_ResdALW_F'];
 //------------		Colla Allowance --------------------
 $LDed_LiveALW_F = $rows['LDed_LiveALW_F'];
 $OVT_LiveALW_F = $rows['OVT_LiveALW_F'];
 $PF_LiveALW_F = $rows['PF_LiveALW_F'];
 $SOC_LiveALW_F = $rows['SOC_LiveALW_F'];
 //------------		Position Allowance --------------------
 $LDed_PosiALW_F = $rows['LDed_PosiALW_F'];
 $OVT_PosiALW_F = $rows['OVT_PosiALW_F'];
 $PF_PosiALW_F = $rows['PF_PosiALW_F'];
 $SOC_PosiALW_F = $rows['SOC_PosiALW_F'];
 //------------		Petro Fee --------------------
 $LDed_CommALW_F = $rows['LDed_CommALW_F'];
 $OVT_CommALW_F = $rows['OVT_CommALW_F'];
 $PF_CommALW_F = $rows['PF_CommALW_F'];
 $SOC_CommALW_F = $rows['SOC_CommALW_F'];
 //------------			Shif Allowance--------------------
 $LDed_ShiftALW_F = $rows['LDed_ShiftALW_F'];
 $OVT_ShiftALW_F = $rows['OVT_ShiftALW_F'];
 $PF_ShiftALW_F = $rows['PF_ShiftALW_F'];
 $SOC_ShiftALW_F = $rows['SOC_ShiftALW_F'];
//------------		Attendance Allowance  --------------------
$LDed_NoAbsALW_F = $rows['LDed_NoAbsALW_F'];
$OVT_NoAbsALW_F = $rows['OVT_NoAbsALW_F'];
$PF_NoAbsALW_F = $rows['PF_NoAbsALW_F'];
$SOC_NoAbsALW_F = $rows['SOC_NoAbsALW_F'];
//------------		Other Allowance 1  --------------------
$LDed_OthALW1_F = $rows['LDed_OthALW1_F'];
$OVT_OthALW1_F = $rows['OVT_OthALW1_F'];
$PF_OthALW1_F = $rows['PF_OthALW1_F'];
$SOC_OthALW1_F = $rows['SOC_OthALW1_F'];
//------------		Other Allowance 2  --------------------
$LDed_OthALW2_F = $rows['LDed_OthALW2_F'];
$OVT_OthALW2_F = $rows['OVT_OthALW2_F'];
$PF_OthALW2_F = $rows['PF_OthALW2_F'];
$SOC_OthALW2_F = $rows['SOC_OthALW2_F'];
//------------		Other Allowance 3 --------------------
$LDed_OthALW3_F = $rows['LDed_OthALW3_F'];
$OVT_OthALW3_F = $rows['OVT_OthALW3_F'];
$PF_OthALW3_F = $rows['PF_OthALW3_F'];
$SOC_OthALW3_F = $rows['SOC_OthALW3_F'];
//------------		Other Allowance 4 --------------------
$LDed_OthALW4_F = $rows['LDed_OthALW4_F'];
$OVT_OthALW4_F = $rows['OVT_OthALW4_F'];
$PF_OthALW4_F = $rows['PF_OthALW4_F'];
$SOC_OthALW4_F = $rows['SOC_OthALW4_F'];
//------------		Other Allowance 5 --------------------
$LDed_OthALW5_F = $rows['LDed_OthALW5_F'];
$OVT_OthALW5_F = $rows['OVT_OthALW5_F'];
$PF_OthALW5_F = $rows['PF_OthALW5_F'];
$SOC_OthALW5_F = $rows['SOC_OthALW5_F'];
//------------		Other Allowance 6 --------------------
$LDed_OthALW6_F = $rows['LDed_OthALW6_F'];
$OVT_OthALW6_F = $rows['OVT_OthALW6_F'];
$PF_OthALW6_F = $rows['PF_OthALW6_F'];
$SOC_OthALW6_F = $rows['SOC_OthALW6_F'];
//------------		Other Expense 1 --------------------
$LDed_Expen1_F = $rows['LDed_Expen1_F'];
$OVT_Expen1_F = $rows['OVT_Expen1_F'];
$PF_Expen1_F = $rows['PF_Expen1_F'];
$SOC_Expen1_F = $rows['SOC_Expen1_F'];
//------------		Other Expense 2 --------------------
$LDed_Expen2_F = $rows['LDed_Expen2_F'];
$OVT_Expen2_F = $rows['OVT_Expen2_F'];
$PF_Expen2_F = $rows['PF_Expen2_F'];
$SOC_Expen2_F = $rows['SOC_Expen2_F'];
//------------		Other Expense 3 --------------------
$LDed_Expen3_F = $rows['LDed_Expen3_F'];
$OVT_Expen3_F = $rows['OVT_Expen3_F'];
$PF_Expen3_F = $rows['PF_Expen3_F'];
$SOC_Expen3_F = $rows['SOC_Expen3_F'];
//------------		Other Expense 4 --------------------
$LDed_Expen4_F = $rows['LDed_Expen4_F'];
$OVT_Expen4_F = $rows['OVT_Expen4_F'];
$PF_Expen4_F = $rows['PF_Expen4_F'];
$SOC_Expen4_F = $rows['SOC_Expen4_F'];
//------------		Setup--------------------
$TFB_Acc_No = $rows['TFB_Acc_No'];
$BBL_Acc_No = $rows['BBL_Acc_No'];
$PF_Name = $rows['PF_Name'];
$PF_No = $rows['PF_No'];
$PF_Comp_No = $rows['PF_Comp_No'];
$UMF_R = $rows['UMF_R'];




  //--------------------Select Database----------------------
  }
  ?>
<h1>System Condition</h1>
<hr>

<div class="col-md-12" style="align: right;">
<form  name="update" method="post"  action="systemconfig_change_acc.php">
<input type="hidden" name="update"/>
<input type="hidden" name="System_Name" value="<?php echo $System_Name ?>"/>
<input type="hidden" name="SysUserID" value="<?php echo $_SESSION['UserID']; ?>"/>
<button class="btn btn-success" data-toggle="modal" data-target="#modal_create">Update</button>
</div>
<br/>
<br/>



 <div class="col-md-12">
<div class="add-pad">
                            <div class="title-header-info-box add-pad">
                                <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                        <a class="nav-link active " data-toggle="tab" href="#owner"  role="tab">Owner</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#address" id="tabspecification" role="tab">Allowance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link typeA" data-toggle="tab" href="#communication" id="tabproductpackage" role="tab">Expense</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab6" role="tab">Calculation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setup" role="tab">Setup</a>
                                    </li>
                                </ul>
                            </div>
                            <br/>
                            
                            <div class="warpper-table">
                                <div class="tab-content">
<!-- ///////////////////////////////setup///////////////////////////////////////// -->

<div class="tab-pane active" id="owner">
                                        <div class="header-info-content-box content-box-padding">
                                        <div class="row">
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">System Name : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="System_Name" type="text" data-placement="top" required  class="form-control"  value="<?php echo $System_Name;?>" disabled / >      
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Copy Right : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="Copy_Right" type="text" data-placement="top" required  class="form-control"value="<?php echo $Copy_Right;?>"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ชื่อย่อบริษัท : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="Owner_Brief_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Owner_Brief_Name;?>" / >      
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ชื่อบริษัท Eng : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="Owner_E_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Owner_E_Name;?>" / >      
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ชื่อบริษัท Tha : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="Owner_T_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Owner_T_Name;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ที่ตั้ง : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <textarea name="Owner_Address" data-placement="top"  class="form-control"><?php echo $Owner_Address;?></textarea>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">เบอร์โทร : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="Owner_Tel" type="text" data-placement="top"  class="form-control" value="<?php echo $Owner_Tel;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">เบอร์แฟ็กส์ : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="Owner_Fax" type="text" data-placement="top"  class="form-control" value="<?php echo $Owner_Fax;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">เลขประจำตัวผู้เสียภาษี : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="Tax_ID_Owner" type="text" data-placement="top"  class="form-control"  value="<?php echo $Tax_ID_Owner;?>"/ >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">รอบการคำนวณ(ครั้ง) : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="Term_P_M" type="text" data-placement="top"  class="form-control" value="<?php echo $Term_P_M;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">วันที่จ่ายครั้งที่ 1 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="PaidDate" type="text" data-placement="top"  class="form-control" value="<?php echo $PaidDate;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">วันที่จ่ายครั้งที่ 2 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="PaidDate_2" type="text" data-placement="top"  class="form-control " value="<?php echo $PaidDate_2;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">WkHrs_Drv : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="WkHrs_Drv" type="text" data-placement="top"  class="form-control"value="<?php echo $WkHrs_Drv;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">WkHrs_Empl : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="WkHrs_Empl" type="text" data-placement="top"  class="form-control"value="<?php echo $WkHrs_Empl;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ค่าเข้ากะเช้า : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="ShiftALW_M_PD" type="text" data-placement="top"  class="form-control" value="<?php echo $ShiftALW_M_PD;?>"/ >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ค่าเข้ากะบ่าย : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="ShiftALW_E_PD" type="text" data-placement="top"  class="form-control" value="<?php echo $ShiftALW_E_PD;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ค่าเข้ากะดึก : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="ShiftALW_N_PD" type="text" data-placement="top"  class="form-control" value="<?php echo $ShiftALW_N_PD;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">MealALW_F_PD : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="MealALW_F_PD" type="text" data-placement="top"  class="form-control" value="<?php echo $MealALW_F_PD;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">MealALW_B_PM : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="MealALW_B_PM" type="text" data-placement="top"  class="form-control" value="<?php echo $MealALW_B_PM;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ค่าครองชีพ : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="LiveALW_PM" type="text" data-placement="top"  class="form-control" value="<?php echo $LiveALW_PM;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ค่าเบี้ยขยัน : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="NoAbsALW_PT" type="text" data-placement="top"  class="form-control" value="<?php echo $NoAbsALW_PT;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ค่าอาหาร : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="FoodALW_PD" type="text" data-placement="top"  class="form-control" value="<?php echo $FoodALW_PD;?>" / >        
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ค่าอาหารกะดึก : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="NightFoodShift" type="text" data-placement="top"  class="form-control" value="<?php echo $NightFoodShift;?>" / >        
                                </dd>
                            </dl>
                        </div>

                                            </div>
                                            </div>
                                            </div>



                                       
<!-- ///////////////////////////////setup///////////////////////////////////////// -->






                                    <!-- ///////////////////////////////Address///////////////////////////////////////// -->
                                    <div class="tab-pane" id="address">
                                        <div class="header-info-content-box content-box-padding">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Allow1_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Allow1_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Allow1_Name;?>" / >        
                                                     </dd>
                                                    </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Allow2_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Allow2_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Allow2_Name;?>" / >        
                                                     </dd>
                                                    </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Allow3_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Allow3_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Allow3_Name;?>" / >        
                                                     </dd>
                                                    </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Allow4_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Allow4_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Allow4_Name;?>" / >        
                                                     </dd>
                                                    </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Allow5_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Allow5_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Allow5_Name;?>" / >        
                                                     </dd>
                                                    </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Allow6_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Allow6_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Allow6_Name;?>" / >        
                                                     </dd>
                                                    </dl>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- ///////////////////////////////Expense///////////////////////////////////////// -->
                                    <div class="tab-pane" id="communication">
                                        <div class="header-info-content-box content-box-padding">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Expen1_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Expen1_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Expen1_Name;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Expen2_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Expen2_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Expen2_Name;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Expen3_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Expen3_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Expen3_Name;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Expen4_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="Expen4_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $Expen4_Name;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                   
                                    <!-- ///////////////////////////////tab6///////////////////////////////////////// -->
                                    <div class="tab-pane" id="tab6">
                                        <div class="header-info-content-box content-box-padding">
                                            <div class="row">
                                            <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
    <th scope="col"></th>
      <th scope="col">Calculation Flag</th>
      <th scope="col">Leave Late</th>
      <th scope="col">Over Time</th>
      <th scope="col">P_Fund</th>
      <th scope="col">Social</th>
    </tr>
  </thead>
  <tbody>
    <tr id="Slick Leave Allowance">
    <td></td>
      <td>Slick Leave Allowance</td>
      <td>
          <div class="material-switch ">
               <input id="LDed_ResdALW_F" name="LDed_ResdALW_F" type="checkbox" <?php echo ($LDed_ResdALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_ResdALW_F" class="label-success"></label>
            </div>
        </td>
      <td>
      <div class="material-switch ">
               <input id="OVT_ResdALW_F" name="OVT_ResdALW_F" type="checkbox"<?php echo ($OVT_ResdALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_ResdALW_F" class="label-success"></label>
            </div>
      </td>
      <td>
      <div class="material-switch ">
               <input id="PF_ResdALW_F" name="PF_ResdALW_F" type="checkbox"<?php echo ($PF_ResdALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_ResdALW_F" class="label-success"></label>
            </div>
      </td>
      <td>
      <div class="material-switch ">
               <input id="SOC_ResdALW_F" name="SOC_ResdALW_F" type="checkbox"<?php echo ($SOC_ResdALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_ResdALW_F" class="label-success"></label>
            </div>
      </td>
    </tr>
    <tr id="Colla Allowance">
    <td></td>
      <td>Colla Allowance</td>
      <td>
      <div class="material-switch ">
               <input id="LDed_LiveALW_F" name="LDed_LiveALW_F" type="checkbox"<?php echo ($LDed_LiveALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_LiveALW_F" class="label-success"></label>
            </div></td>
      <td>
      <div class="material-switch ">
               <input id="OVT_LiveALW_F" name="OVT_LiveALW_F" type="checkbox"<?php echo ($OVT_LiveALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_LiveALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_LiveALW_F" name="PF_LiveALW_F" type="checkbox"<?php echo ($PF_LiveALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_LiveALW_F" class="label-success"></label>
            </div></td>
      <td>
      <div class="material-switch ">
               <input id="SOC_LiveALW_F" name="SOC_LiveALW_F" type="checkbox"<?php echo ($SOC_LiveALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_LiveALW_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="Position Allowance">
    <td></td>
      <td>Position Allowance</td>
      <td>
      <div class="material-switch ">
               <input id="LDed_PosiALW_F" name="LDed_PosiALW_F" type="checkbox"<?php echo ($LDed_PosiALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_PosiALW_F" class="label-success"></label>
            </div></td>
      <td>
      <div class="material-switch ">
               <input id="OVT_PosiALW_F" name="OVT_PosiALW_F" type="checkbox"<?php echo ($OVT_PosiALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_PosiALW_F" class="label-success"></label>
            </div></td>
      <td>
      <div class="material-switch ">
               <input id="PF_PosiALW_F" name="PF_PosiALW_F" type="checkbox"<?php echo ($PF_PosiALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_PosiALW_F" class="label-success"></label>
            </div></td>
      <td>
      <div class="material-switch ">
               <input id="SOC_PosiALW_F" name="SOC_PosiALW_F" type="checkbox"<?php echo ($SOC_PosiALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_PosiALW_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="Petro Fee">
    <td></td>
      <td>Petro Fee</td>
      <td><div class="material-switch ">
               <input id="LDed_CommALW_F" name="LDed_CommALW_F" type="checkbox"<?php echo ($LDed_CommALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_CommALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_CommALW_F" name="OVT_CommALW_F" type="checkbox"<?php echo ($OVT_CommALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_CommALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_CommALW_F" name="PF_CommALW_F" type="checkbox"<?php echo ($PF_CommALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_CommALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_CommALW_F" name="SOC_CommALW_F" type="checkbox"<?php echo ($SOC_CommALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_CommALW_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="Shif Allowance">
    <td></td>
      <td>Shif Allowance</td>
      <td><div class="material-switch ">
               <input id="LDed_ShiftALW_F" name="LDed_ShiftALW_F" type="checkbox"<?php echo ($LDed_ShiftALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_ShiftALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_ShiftALW_F" name="OVT_ShiftALW_F" type="checkbox"<?php echo ($OVT_ShiftALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_ShiftALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_ShiftALW_F" name="PF_ShiftALW_F" type="checkbox"<?php echo ($PF_ShiftALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_ShiftALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_ShiftALW_F" name="LDed_CommALW_F" type="checkbox"<?php echo ($SOC_ShiftALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_ShiftALW_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="Attendance Allowance">
    <td></td>
      <td>Attendance Allowance</td>
      <td><div class="material-switch ">
               <input id="LDed_NoAbsALW_F" name="LDed_NoAbsALW_F" type="checkbox"<?php echo ($LDed_NoAbsALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_NoAbsALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_NoAbsALW_F" name="OVT_NoAbsALW_F" type="checkbox"<?php echo ($OVT_NoAbsALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_NoAbsALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_NoAbsALW_F" name="PF_NoAbsALW_F" type="checkbox"<?php echo ($PF_NoAbsALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_NoAbsALW_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_NoAbsALW_F" name="SOC_NoAbsALW_F" type="checkbox"<?php echo ($SOC_NoAbsALW_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_NoAbsALW_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthALW1">
    <td>(Plus +)</td>
      <td><?php  echo $Allow1_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_OthALW1_F" name="LDed_OthALW1_F" type="checkbox"<?php echo ($LDed_OthALW1_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_OthALW1_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_OthALW1_F" name="OVT_OthALW1_F" type="checkbox"<?php echo ($OVT_OthALW1_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_OthALW1_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_OthALW1_F" name="PF_OthALW1_F" type="checkbox"<?php echo ($PF_OthALW1_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_OthALW1_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW1_F" name="SOC_OthALW1_F" type="checkbox"<?php echo ($SOC_OthALW1_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW1_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthALW2">
    <td>(Plus +)</td>
      <td><?php  echo $Allow2_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_OthALW2_F" name="LDed_OthALW2_F" type="checkbox"<?php echo ($LDed_OthALW2_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_OthALW2_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_OthALW2_F" name="OVT_OthALW2_F" type="checkbox"<?php echo ($OVT_OthALW2_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_OthALW2_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_OthALW2_F" name="PF_OthALW2_F" type="checkbox"<?php echo ($PF_OthALW2_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_OthALW2_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW2_F" name="SOC_OthALW2_F" type="checkbox"<?php echo ($SOC_OthALW2_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW2_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthALW3">
    <td>(Plus +)</td>
      <td><?php  echo $Allow3_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_OthALW3_F" name="LDed_OthALW3_F" type="checkbox"<?php echo ($LDed_OthALW3_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_OthALW3_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_OthALW3_F" name="OVT_OthALW3_F" type="checkbox"<?php echo ($OVT_OthALW3_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_OthALW3_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_OthALW3_F" name="PF_OthALW3_F" type="checkbox"<?php echo ($PF_OthALW3_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_OthALW3_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW3_F" name="SOC_OthALW3_F" type="checkbox"<?php echo ($SOC_OthALW3_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW3_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthALW4">
    <td>(Plus +)</td>
      <td><?php  echo $Allow4_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_OthALW4_F" name="LDed_OthALW4_F" type="checkbox"<?php echo ($LDed_OthALW4_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_OthALW4_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_OthALW4_F" name="OVT_OthALW4_F" type="checkbox"<?php echo ($OVT_OthALW4_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_OthALW4_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_OthALW4_F" name="PF_OthALW4_F" type="checkbox"<?php echo ($PF_OthALW4_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_OthALW4_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW4_F" name="SOC_OthALW4_F" type="checkbox"<?php echo ($SOC_OthALW4_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW4_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthALW5">
    <td>(Plus +)</td>
      <td><?php  echo $Allow5_Name ?></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW5_F" name="SOC_OthALW5_F" type="checkbox"<?php echo ($SOC_OthALW5_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW5_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW5_F" name="SOC_OthALW5_F" type="checkbox"<?php echo ($SOC_OthALW5_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW5_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW5_F" name="SOC_OthALW5_F" type="checkbox"<?php echo ($SOC_OthALW5_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW5_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW5_F" name="SOC_OthALW5_F" type="checkbox"<?php echo ($SOC_OthALW5_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW5_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthALW6">
    <td>(Plus +)</td>
      <td><?php  echo $Allow6_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_OthALW6_F" name="LDed_OthALW6_F" type="checkbox"<?php echo ($LDed_OthALW6_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_OthALW6_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_OthALW6_F" name="OVT_OthALW6_F" type="checkbox"<?php echo ($OVT_OthALW6_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_OthALW6_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_OthALW6_F" name="PF_OthALW6_F" type="checkbox"<?php echo ($PF_OthALW6_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_OthALW6_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_OthALW6_F" name="SOC_OthALW6_F" type="checkbox"<?php echo ($SOC_OthALW6_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_OthALW6_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthExpense1">
    <td>(Minus -)</td>
      <td><?php  echo $Expen1_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_Expen1_F" name="LDed_Expen1_F" type="checkbox"<?php echo ($LDed_Expen1_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_Expen1_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_Expen1_F" name="OVT_Expen1_F" type="checkbox"<?php echo ($OVT_Expen1_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_Expen1_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_Expen1_F" name="PF_Expen1_F" type="checkbox"<?php echo ($PF_Expen1_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_Expen1_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_Expen1_F" name="SOC_Expen1_F" type="checkbox"<?php echo ($SOC_Expen1_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_Expen1_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthExpense2">
    <td>(Minus -)</td>
      <td><?php  echo $Expen2_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_Expen2_F" name="LDed_Expen2_F" type="checkbox"<?php echo ($LDed_Expen2_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_Expen2_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="LDed_Expen2_F" name="LDed_Expen2_F" type="checkbox"<?php echo ($LDed_Expen2_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_Expen2_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="LDed_Expen2_F" name="LDed_Expen2_F" type="checkbox"<?php echo ($LDed_Expen2_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_Expen2_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="LDed_Expen2_F" name="LDed_Expen2_F" type="checkbox"<?php echo ($LDed_Expen2_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_Expen2_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthExpense3">
    <td>(Minus -)</td>
      <td><?php  echo $Expen3_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_Expen3_F" name="LDed_Expen3_F" type="checkbox"<?php echo ($LDed_Expen3_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_Expen3_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_Expen3_F" name="OVT_Expen3_F" type="checkbox"<?php echo ($OVT_Expen3_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_Expen3_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_Expen3_F" name="PF_Expen3_F" type="checkbox"<?php echo ($PF_Expen3_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_Expen3_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_Expen3_F" name="SOC_Expen3_F" type="checkbox"<?php echo ($SOC_Expen3_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_Expen3_F" class="label-success"></label>
            </div></td>
    </tr>
    <tr id="OthExpense4">
    <td>(Minus -)</td>
      <td><?php  echo $Expen4_Name ?></td>
      <td><div class="material-switch ">
               <input id="LDed_Expen4_F" name="LDed_Expen4_F" type="checkbox"<?php echo ($LDed_Expen4_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="LDed_Expen4_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="OVT_Expen4_F" name="OVT_Expen4_F" type="checkbox"<?php echo ($OVT_Expen4_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="OVT_Expen4_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="PF_Expen4_F" name="PF_Expen4_F" type="checkbox"<?php echo ($PF_Expen4_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="PF_Expen4_F" class="label-success"></label>
            </div></td>
      <td><div class="material-switch ">
               <input id="SOC_Expen4_F" name="SOC_Expen4_F" type="checkbox"<?php echo ($SOC_Expen4_F == 1 ? 'checked' : ''); ?> value="1"/>
                <label for="SOC_Expen4_F" class="label-success"></label>
            </div></td>
    </tr>

  </tbody>
  </table>

                                            </div>
                                        </div>
                                    </div>
<!-- ///////////////////////////////setup///////////////////////////////////////// -->
<div class="tab-pane" id="setup">
                                        <div class="header-info-content-box content-box-padding">
                                        <h3><u>Social Security</u></h3>
                                       <br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Rate % : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="" type="text" data-placement="top"  class="form-control" value="<?php ?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Minimun Income(Bath) : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="" type="text" data-placement="top"  class="form-control" value="<?php ?>" / >   
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Soc(Bath) : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="" type="text" data-placement="top"  class="form-control" value="<?php ?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Maximum Income(Bath) :  </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="" type="text" data-placement="top"  class="form-control" value="<?php ?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Soc(Bath) :  </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="" type="text" data-placement="top"  class="form-control" value="<?php ;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Account No :  </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="" type="text" data-placement="top"  class="form-control" value="<?php ?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                            </div>

                                            <br/>
                                            <h3><u>Bank Information</u></h3>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">KBank Account No : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="TFB_Acc_No" type="text" data-placement="top"  class="form-control" value="<?php echo $TFB_Acc_No;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">BBL Account : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="BBL_Acc_No" type="text" data-placement="top"  class="form-control" value="<?php echo $BBL_Acc_No;?>" / >   
                                                     </dd>
                                                        </dl>
                                                </div>
                                                
                                            </div>
                                            <br/>
                                            <h3><u>Provident Fund Information</u></h3>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">PF_Name : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="PF_Name" type="text" data-placement="top"  class="form-control" value="<?php echo $PF_Name;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Provident Fund No : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="PF_No" type="text" data-placement="top"  class="form-control" value="<?php echo $PF_No;?>" / >   
                                                     </dd>
                                                        </dl>
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Company Code : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="PF_Comp_No" type="text" data-placement="top"  class="form-control" value="<?php echo $PF_Comp_No;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                               
                                            </div>
                                            <br/>
                                            <h3><u>Union Member Fee</u></h3>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <dl class="row">
                                                    <dt class="col-sm-4 info-box-label">Union Member Fee : </dt>
                                                     <dd class="col-sm-8 info-box-label">
                                                    <input name="UMF_R" type="text" data-placement="top"  class="form-control" value="<?php echo $UMF_R;?>" / >        
                                                     </dd>
                                                        </dl>
                                                </div>
                                              
                                               
                                            </div>
                                        
                                            </form>
                                        </div>
                                    </div>
    <!-- Blog Sidebar Widgets Column -->
<?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>