<?php
error_reporting(0);
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php
include "config/connect.php";
if(isset($_GET["EmplCode"])) {    
    $strSQL = "SELECT * FROM tm03_employee WHERE EmplCode = '".$_GET["EmplCode"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) { 
      $deptcode = $rows["DeptCode"];
      $bankcode = $rows["BankCode"];
      $posicode = $rows["PosiCode"];
      $branchcode = $rows["BranchCode"];
      $Marital = $rows["Marital"];
      $Sex = $rows["Sex"];
      if ($rows["EmplType"] == "M"){
        $EmplMSe= "selected";
        $EmplDSe = "";
    }
    else
    {
        $EmplDSe= "selected";
        $EmplMSe = "";
    }

    if ($rows["ProcCode"] == 1){
      $ProcASe= "selected";
      $ProcMSe = "";
  }
  else
  {
      $ProcMSe = "selected";
      $ProcASe = "";
  }
  if ($rows["TaxCond"] == "C"){
    $TaxCondCSe= "checked";
}
else
{
    $TaxCondESe = "checked";
}
$output = "";
    $output .= '<input type="hidden" name="EmplCode" value="'.$rows["EmplCode"].'"/>
    <div class="modal-body" >
    <br/>
    <div class="row">
      <div class="col-md-7">
       <dl class="row">
         <dt class="col-sm-4 info-box-label">รหัสพนักงาน : <span class="field-required">*</span></dt>
         <dd class="col-sm-4 info-box-label">
         <input name="EmplCode" type="text" value="'.$rows["EmplCode"].'" data-placement="top" required  class="form-control"  maxlength="10" disabled/>      
         </dd>
       </dl>
 

       <dl class="row">
        <dt class="col-sm-4 info-box-label">ชื่อ - นามสกุล (ไทย): <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplTName" type="text" value="'.$rows["EmplTName"].'" data-placement="top" required  class="form-control" maxlength="50"/>
        </dd>
       </dl>


       <dl class="row">
        <dt class="col-sm-4 info-box-label">ชื่อ - นามสกลุ (English): : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplEName" type="text" value="'.$rows["EmplEName"].'" data-placement="top"  class="form-control"  maxlength="50"/>      
        </dd>
       </dl>


       <dl class="row">
        <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : <span class="field-required">*</span></dt>
        <dd class="col-sm-4 info-box-label">
        <select class="form-control"  name="EmplType" required>
          <option value="D" '.$EmplDSe.'>รายวัน</option>
          <option value="M" '.$EmplMSe.'>รายเดือน</option>
        </select>      
        </dd>
       </dl>
       <dl class="row">
        <dt class="col-sm-4 info-box-label">การประมวลผล : <span class="field-required">*</span></dt>
        <dd class="col-sm-4 info-box-label">
        <select class="form-control"  name="ProcCode" required>
          <option value="1" '.$ProcASe.'>Automatic</option>
          <option value="2" '.$ProcMSe.'>Manual</option>
        </select>     
        </dd>
       </dl>
      </div>
      <div class="col-md-2"></div>
      
      <div class="col-md-12">
      <br>
<!--Start-->
       <div class="add-pad">
        <div class="title-header-info-box add-pad">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">ข้อมูลพนักงาน</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab2" id="tabspecification" role="tab">ครอบครัว</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab3" id="tabspecification" role="tab">ข้อมูลทั่วไป</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab4" id="tabspecification" role="tab">อื่น ๆ</a>
            </li>
          </ul>
        </div>
        <div class="warpper-table">
          <div class="tab-content">
          <br/>
          <!-- ///////////////////////////////employee///////////////////////////////////////// -->
            <div class="tab-pane active" id="tab1">
              <div class="header-info-content-box content-box-padding">
                <div class="row">
                <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">แผนก/หน่วยงาน : <span class="field-required">*</span></dt>
                  <dd class="col-sm-3 info-box-label">
                   <select class="form-control"  name="DeptCode" required>';
                    
                    $strSQL = "SELECT * FROM tm02_department";
                   $objQuery = mysqli_query($conn, $strSQL);
                    while($objResuut = mysqli_fetch_array($objQuery))
                    {
                    
                      if($objResuut["DeptCode"] == $deptcode)
                      {
                        $sel = "selected";
                      }
                      else
                      {
                        $sel = "";
                      }

                    $output.='<option value="'.$objResuut["DeptCode"].'" '.$sel.'>'.$objResuut["DeptCode"].' - '.$objResuut["DeptTDesc"].'</option>';
                    }
                    
                  $output.='</select>      
                  </dd>
                  <dt class="col-sm-2 info-box-label">ธนาคารสำหรับโอนเงิน : </dt>
                  <dd class="col-sm-3 info-box-label">
                  <select class="form-control"  name="BankCode" >
                  <option value="">Select</option>
                  ';                    
                  $strSQL_bank = "SELECT * FROM tm02_bank";
                   $objQuery_bank = mysqli_query($conn, $strSQL_bank);
                    while($objResuut = mysqli_fetch_array($objQuery_bank))
                    {
                      if($objResuut["bankcode"] == $bankcode)
                      {
                        $sel = "selected";
                      }
                      else
                      {
                        $sel = "";
                      }

                      $output.='<option value="'.$objResuut["bankcode"].'" '.$sel.'>'.$objResuut["bankcode"].' - '.$objResuut["BankTName"].'</option>';
                    } 
                    $output.='</select>      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                 <dt class="col-sm-3 info-box-label">ตำแหน่งงาน : <span class="field-required">*</span></dt>
                 <dd class="col-sm-3 info-box-label">
                 <select class="form-control"  name="PosiCode" required>';
                    
                    $strSQL = "SELECT * FROM tm02_position";
                   $objQuery = mysqli_query($conn, $strSQL);
                    while($objResuut = mysqli_fetch_array($objQuery))
                    {
                      if($objResuut["PosiCode"] == $posicode)
                      {
                        $sel = "selected";
                      }
                      else
                      {
                        $sel = "";
                      }
                      $output.='<option value="'.$objResuut["PosiCode"].'" '.$sel.'>'.$objResuut["PosiCode"].' - '.$objResuut["PosiTDesc"].'</option>';
                   
                    }
                    
                    $output.='</select>      
                 </dd>
                 <dt class="col-sm-2 info-box-label">เลขที่บัญชี : </dt>
                 <dd class="col-sm-3 info-box-label">
                   <input name="BankAccCode" type="text" data-placement="top"   class="form-control" maxlength="20" value="'.$rows["BankAccCode"].'" />      
                 </dd>
                 <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">สาขา : <span class="field-required">*</span></dt>
                  <dd class="col-sm-3 info-box-label">
                    <select class="form-control"  name="BranchCode" required>';
                    
                    $strSQL = "SELECT * FROM tm02_branch";
                   $objQuery = mysqli_query($conn, $strSQL);
                    while($objResuut = mysqli_fetch_array($objQuery))
                    {
                    
                      if($objResuut["DeptCode"] == $branchcode)
                      {
                        $sel = "selected";
                      }
                      else
                      {
                        $sel = "";
                      }
                      $output.='<option value="'.$objResuut["BranchCode"].'">'.$objResuut["BranchCode"].' - '.$objResuut["BranchTName"].'</option>';
                    
                    }
                    
                    $output.='</select>      
                  </dd>
                  <dt class="col-sm-2 info-box-label"></dt>
                  <dd class="col-sm-3 info-box-label">
                    
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เงินเดือน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Salary" type="number" value="'.$rows["Salary"].'" data-placement="top" required  class="form-control" min="0"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label"> </dt>
                      <dd class="col-sm-3 info-box-label">
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่เริ่มงาน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="EnterDate" type="date" value="'.$rows["EnterDate"].'" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-3 info-box-label"> </dt>
                      <dd class="col-sm-3 info-box-label"></dd>
                      </dl>
                 </div>
                 ';
                 if ($rows["ProbFlag"] == 1){
                  $ProbFlag_ckk = "checked";
                  $disabled = "";
                }
                else{
                  $disabled = "disabled";
                }
                 $output .= '
                 <div class="col-md-12">
                      <dl class="row">
                      <dt class="col-sm-3 info-box-label">พ้นสถาพ :</dt>
                      <dd class="col-sm-3">
                      <input name="ProbFlag" id="ProbFlag" type="checkbox"  value="1" data-placement="top"   onclick="ProbFlag_Function()" '.$ProbFlag_ckk.' />     
                      </dd>
                      <dt class="col-sm-2 info-box-label">วันที่พ้นสถาพ :</dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="ProbDate" id="ProbDate" type="date" value="'.$rows["ProbDate"].'" data-placement="top"   class="form-control" '.$disabled .' />     
                      </dd>

                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่ลาออก :</dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ResignDate" id="ResignDate" type="date" value="'.$rows["ResignDate"].'" data-placement="top"   class="form-control" '.$disabled .'/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label"> </dt>
                      <dd class="col-sm-3 info-box-label">
                            
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
';
                      if ($rows["PF_Flag"] == 1){
                        $PF_Flag_ckk = "checked";
                        $disabled = "";
                      }
                      else{
                        $disabled = "disabled";
                      }
                    $output.= '
                 <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">กองทุนสำรองเลี้ยงชีพ : </dt>
                        <dd class="col-sm-3 ">
                        <input name="PF_Flag" type="checkbox" '.$PF_Flag_ckk.' data-placement="top"  id="PF_Flag" onclick="PF_Flag_edit_function()" value="1"/>       
                        </dd>
                        <dt class="col-sm-2 info-box-label">รหัสสมาชิกกองทุน : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="PF_MemNo" value="'.$rows["PF_MemNo"].'" type="text" data-placement="top"  class="form-control" id="PF_MemNo" '.$disabled .'/>      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>

                    <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่เป็นสมาชิกกองทุน : </dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="PF_EnterDate"  value="'.$rows["PF_EnterDate"].'"   type="date" data-placement="top"  class="form-control" id="PF_EnterDate" '.$disabled .' />       
                      </dd>
                      <dt class="col-sm-2 info-box-label">อัตราการหักเงินสำรองเลี้ยงชีพพนักงาน (%) : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="PF_E_Rate" value="'.$rows["PF_E_Rate"].'" type="number" data-placement="top"  class="form-control"   id="PF_E_Rate" '.$disabled .' min="0" max="100" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>

                    
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เงื่อนไขภาษี : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3">
                        <input   type="radio" name="TaxCond" value="C" required '.$TaxCondCSe.'> Company 
                        <input type="radio" name="TaxCond" value="E" required '.$TaxCondESe.'> Employee
                      </dd>
                      <dt class="col-sm-2 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label"></dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                      <dl class="row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-9">
                      <table width="80%">
                          <tbody>
                            <tr>';

                            if($rows["UM_Flag"] == '1'){
                              $umcheck = "checked";
                            }else{
                              $umcheck = "";
                            }
                            if($rows["Cooperative_F"] == '1'){
                              $coopcheck = "checked";
                            }else{
                              $coopcheck = "";
                            }
                            if($rows["GHB_F"] == '1'){
                              $gbhcheck = "checked";
                            }else{
                              $gbhcheck = "";
                            }
                            if($rows["Feneral_F"] == '1'){
                              $fencheck = "checked";
                            }else{
                              $fencheck = "";
                            }
                            if($rows["MoneyLoan_F"] == '1'){
                              $mlcheck = "checked";
                            }else{
                              $mlcheck = "";
                            }

                            $output.='<td><label class="checkbox-inline"><input type="checkbox" name="UM_Flag" value="1" '.$umcheck.'>  สมาชิกสหภาพฯ</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="Cooperative_F" value="1" '.$coopcheck.'>  สมาชิกสหกรณ์ออมทรัพย์</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="GHB_F" value="1" '.$gbhcheck.'>  สมาชิก ธอส.</label></td>

                            </tr>
                            <tr>

                              <td><label class="checkbox-inline"><input type="checkbox" name="Feneral_F" value="1" '.$fencheck.'>  สมาชิกฌาปนกิจสงเคราะห์</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="MoneyLoan_F" value="1" '.$mlcheck.'>  สมาชิก สินเชื่อเงินกู้</label></td>

                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          <!-- ///////////////////////////////employee///////////////////////////////////////// --> 
          
          <!-- ///////////////////////////////family///////////////////////////////////////// -->
          <div class="tab-pane" id="tab2">
              <div class="header-info-content-box content-box-padding">
                <div class="row">
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สถานะ : </dt>
                      <dd class="col-sm-3 info-box-label">';
                      $Marital_1 = $Marital == "โสด" ? "selected" :  "" ;
                      $Marital_2 = $Marital == "แต่งงานแล้ว" ? "selected" :  "" ;
                      $Marital_3 = $Marital == "หม้าย" ? "selected" :  "" ;
                      $Marital_4 = $Marital == "หย่า" ? "selected" :  "" ;
                      $Marital_5 = $Marital == "แยกกันอยู่" ? "selected" :  "" ;
                      $output .='
                       <select class="form-control"  name="Marital">
                                  <option value="">Select</option>   
                                  <option value="โสด" '.$Marital_1 .'>โสด</option>
                                  <option value="แต่งงานแล้ว" '.$Marital_2.'>แต่งงานแล้ว</option>
                                  <option value="หม้าย" '.$Marital_3.'>หม้าย</option>
                                  <option value="หย่า" '.$Marital_4.'>หย่า</option>
                                  <option value="แยกกันอยู่" '.$Marital_5.'>แยกกันอยู่</option>
                        </select> 
                      </dd>
                      <dt class="col-sm-2 info-box-label">หมายเลขสมรถ :</dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="MarriageNo" type="text" value="'.$rows["MarriageNo"].'" data-placement="top"   class="form-control"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                     <dt class="col-sm-3 info-box-label">วันที่สมรถ : </dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="MarriagedDate" type="date" value="'.$rows["MarriagedDate"].'" data-placement="top"   class="form-control"/ >      
                     </dd>
                     <dt class="col-sm-2 info-box-label">ชื่อ-สกุลคู่สมรถ : </dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="SpouseName" type="text" value="'.$rows["SpouseName"].'" data-placement="top"   class="form-control" / >      
                     </dd>
                     <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-1 info-box-label"></dt>
                        <dd class="col-sm-3">
                          <h3>ข้อมูลบุตร</h3>      
                          <hr>
                        </dd>
                        
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">จำนวนบุตรที่กำลังเรียน : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ChildInEduc" type="number" value="'.$rows["ChildInEduc"].'" data-placement="top"   class="form-control" min="0"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">จำนวนบุตรที่ไม่ได้เรียนแล้ว : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ChildNotEduc" type="number" value="'.$rows["ChildNotEduc"].'" data-placement="top"   class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-1 info-box-label"></dt>
                        <dd class="col-sm-4">
                          <h3>ข้อมูลผู้ปกครอง</h3>      
                          <hr>
                        </dd>
                        
                        
                      </dl>
                    </div>
                  ';
                  $checked = ($rows['Own_Fath_Red_F'] == '1') ? "checked" : "";
                  $output .='
                    <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนบิดา :</dt>
                      <dd class="col-sm-3">  
                        <input id="Own_Fath_Red_F" name="Own_Fath_Red_F" type="checkbox" value="1" '.$checked .'/>
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนบิดา : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Own_Fath_ID" type="text" data-placement="top"   class="form-control" maxlength="13" value="'.$rows["Own_Fath_ID"].'"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                      ';
                      $checked = ($rows['SP_Fath_Red_F'] == '1') ? "checked" : "";
                      $disabled = ($rows['SP_Fath_Red_F'] == '1') ? "" : "disabled";
                    $output .= '
                      <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนบิดาคู่สมรส :</dt>
                      <dd class="col-sm-3">  
                        <input id="SP_Fath_Red_F" name="SP_Fath_Red_F" type="checkbox" value="1" '.$checked.' onclick="SP_Fath_Red_F_function()"/>
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนบิดาของคู่สมรส : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input  id="SP_Fath_ID" name="SP_Fath_ID" type="text" data-placement="top"   class="form-control" maxlength="13" '.$disabled.' value="'.$rows["SP_Fath_ID"].'"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                    ';

                    $checked = ($rows['Own_Moth_Red_F'] == '1') ? "checked" : "";
                    $output.='
      <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนมารดา :</dt>
                      <dd class="col-sm-3">  
                        <input id="Own_Moth_Red_F" name="Own_Moth_Red_F" type="checkbox" value="1" '.$checked .'/>
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนมารดา : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Own_Moth_ID" type="text" data-placement="top" value="'.$rows["Own_Moth_ID"].'"  class="form-control" maxlength="13"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                      ';
                      $checked = ($rows['SP_Fath_Red_F'] == '1') ? "checked" : "";
                      $disabled = ($rows['SP_Fath_Red_F'] == '1') ? "" : "disabled";
                      $output.='
                   <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนมารดาคู่สมรส :</dt>
                      <dd class="col-sm-3">  
                        <input id="SP_Moth_Red_F" name="SP_Moth_Red_F" type="checkbox" '.$checked .' value="1" onclick="SP_Moth_Red_F_function()"/>
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนมารดาของคู่สมรส : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input id="SP_Moth_ID" name="SP_Moth_ID" type="text" data-placement="top" value="'.$rows["SP_Moth_ID"].'"  class="form-control" maxlength="13" '.$disabled.'/>      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>


                </div>
              </div>
            </div>
          <!-- ///////////////////////////////family///////////////////////////////////////// -->
          
          <!-- ///////////////////////////////personal///////////////////////////////////////// -->
          <div class="tab-pane" id="tab3">
              <div class="header-info-content-box content-box-padding">
                <div class="row">

                <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">วันเกิด : </dt>
                  <dd class="col-sm-3 info-box-label">
                   <input name="BirthDate" value="'.$rows["BirthDate"].'" type="date" data-placement="top"   class="form-control" / >      
                  </dd>
                  <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชน :</dt>
                  <dd class="col-sm-3 info-box-label">
                   <input name="IDno" type="text" value="'.$rows["IDno"].'" data-placement="top"   class="form-control" maxlength="13"/ >      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                 <dt class="col-sm-3 info-box-label">สัญชาติ : </dt>
                 <dd class="col-sm-3 info-box-label">
                   <input name="Nationality" type="text" value="'.$rows["Nationality"].'"  data-placement="top"   class="form-control"/ >      
                 </dd>
                 <dt class="col-sm-2 info-box-label">ชาติพันธ์ : </dt>
                 <dd class="col-sm-3 info-box-label">
                   <input name="Ethnic" type="text" value="'.$rows["Ethnic"].'" data-placement="top"   class="form-control" / >      
                 </dd>
                 <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                 <dt class="col-sm-3 info-box-label">ศาสนา : </dt>
                 <dd class="col-sm-3 info-box-label">
                 <input name="Religion" type="text" value="'.$rows["Religion"].'" data-placement="top"   class="form-control" / >     
                 </dd>
                 <dt class="col-sm-2 info-box-label"></dt>
                 <dd class="col-sm-3 info-box-label">
                        
                 </dd>
                 <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">น้ำหนัก : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="Weight" type="number"  value="'.$rows["Weight"].'" data-placement="top" min="0"   class="form-control"/ >      
                  </dd>
                  <dt class="col-sm-2 info-box-label">ส่วนสูง : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="Height" type="number"  value="'.$rows["Height"].'" data-placement="top"  min="0"   class="form-control" / >      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>';
              $SexM = $Sex == "M" ? "selected" :  "" ;
              $SexF = $Sex == "F" ? "selected" :  "" ;
              $output.='
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">เพศ :</dt>
                  <dd class="col-sm-3 info-box-label">
                  <select class="form-control"  name="Sex" >
      <option   value="">Select</option>   
      <option  '.$SexM.' value="M">ชาย</option>
      <option  '.$SexF.' value="F">หญิง</option>
    </select>     
        
                  </dd>
                  <dt class="col-sm-2 info-box-label">เบอร์โทรศัพท์ : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="HomePhone" type="text" value="'.$rows["HomePhone"].'"  data-placement="top"   class="form-control" / >      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">ที่อยู่ : </dt>
                  <dd class="col-sm-3 info-box-label">
                  <textarea class="form-control" rows="5"   name="Address" id="comment">'.$rows["Address"].'</textarea>      
                  </dd>
                  <dt class="col-sm-2 info-box-label">รหัสไปรษณีย์ : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="PostalCode" type="text" value="'.$rows["PostalCode"].'"  data-placement="top"   class="form-control"  maxlength="5"/ >      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">เลขประจำตัวผู้เสียภาษี : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="TaxID" type="text" value="'.$rows["TaxID"].'" data-placement="top"   class="form-control" maxlength="13"/ >      
                  </dd>
                  <dt class="col-sm-2 info-box-label"></dt>
                  <dd class="col-sm-3 info-box-label">
    
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
                </div>
              </div>
            </div>
          <!-- ///////////////////////////////personal///////////////////////////////////////// -->
          
          <!-- ///////////////////////////////other///////////////////////////////////////// -->
          <div class="tab-pane" id="tab4">
              <div class="header-info-content-box content-box-padding">
                <div class="row">
                <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">เงินได้สะสมจากบริษัทก่อนหน้า  (Last Company Gross) : </dt>
                  <dd class="col-sm-3 info-box-label">
                  <input name="L_C_Gross" value="'.$rows["L_C_Gross"].'" type="number" data-placement="top"   class="form-control"  min="0"/>      
                  </dd>
                  <dt class="col-sm-2 info-box-label">เงินภาษีรวมที่หักไว้จากบริษัทก่อนหน้า (Last Company Tax) : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="L_C_Tax" value="'.$rows["L_C_Tax"].'" type="number" data-placement="top"   class="form-control" min="0" />      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">เงินประกันสังคมสะสมที่หักไว้จากบริษัทก่อนหน้า (Last Company Social) : </dt>
                  <dd class="col-sm-3 info-box-label">
                  <input name="L_C_SOC"  value="'.$rows["L_C_SOC"].'"  type="number" data-placement="top"   class="form-control"  min="0" / >     
                  </dd>
                  <dt class="col-sm-2 info-box-label">Company Loan/Month : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="CompLoan" value="'.$rows["CompLoan"].'" type="number" data-placement="top"   class="form-control" min="0" />      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>';
              $checked = ($rows['OT_Cal_F'] == '1') ? "checked" : "";
              $output.='
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">Overtime Flag : </dt>
                  <dd class="col-sm-3"> 
                  <div class="material-switch ">
         <input id="OT_Cal_F" name="OT_Cal_F" type="checkbox" '.$checked.' value="1"/>
          <label for="OT_Cal_F" class="label-success"></label>
             </div>
                  </dd>';
                  $checked = ($rows['Attn_Cal_F'] == '1') ? "checked" : "";
                  $output.='
                  <dt class="col-sm-2 info-box-label">Attendance Flag : </dt>
                  <dd class="col-sm-3">
                              <div class="material-switch ">
                  <input id="Attn_Cal_F" name="Attn_Cal_F" type="checkbox" '.$checked .' value="1"/>
                    <label for="Attn_Cal_F" class="label-success"></label>
                          </div>   
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">เข้ากะในเวลาทำงาน(วัน) : </dt>
                  <dd class="col-sm-3 info-box-label">
                  <input name="O_Shft_D_PM" value="'.$rows["O_Shft_D_PM"].'"  type="number" data-placement="top"   class="form-control" min="0" / >      
                  </dd>
                  <dt class="col-sm-2 info-box-label">เข้ากะในช่วงเช้า(วัน) : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="M_Shft_D_PM" value="'.$rows["M_Shft_D_PM"].'"  type="number" data-placement="top"   class="form-control" min="0"  / >      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">เข้ากะในช่วงดึก(วัน) : </dt>
                  <dd class="col-sm-3 info-box-label">
                  <input name="E_Shft_D_PM" value="'.$rows["E_Shft_D_PM"].'"  type="number" data-placement="top"   class="form-control"  min="0"/ >      
                  </dd>
                  <dt class="col-sm-2 info-box-label">เข้ากะในเวลาเช้า(วัน) : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="N_Shft_D_PM" value="'.$rows["N_Shft_D_PM"].'"  type="number" data-placement="top"   class="form-control"  min="0"/ >      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">สิทธิ์ลาป่วย(วัน) : </dt>
                  <dd class="col-sm-3 info-box-label">
                  <input name="SL_Day" type="number" value="'.$rows["SL_Day"].'" data-placement="top"   class="form-control" min="0" / >      
                  </dd>
                  <dt class="col-sm-2 info-box-label">จำนวนชั่วโมงวันลาพักร้อนคงเหลือ : </dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="AL_Rem_Hrs" type="number" value="'.$rows["AL_Rem_Hrs"].'" data-placement="top"   class="form-control" / >      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
                </div>
              </div>
            </div>
          <!-- ///////////////////////////////other///////////////////////////////////////// -->
          
          </div>
        </div>
       </div>
<!--END-->

</div>
';
 }  }
 ?>
 
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-12">
            <h1>Change Employee</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="employee_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="employee.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">อัปเดตข้อมูล </button>
                    </div>
                    <div class="panel-body">
                    <?php  echo $output;?>
                    </div>
                </form>
<br>
</div>
<!-- Blog Sidebar Widgets Column -->
<!-- /.row -->

<?php include("includes/footer.php"); ?>

  <script>
  function PF_Flag_create_function() {
    var provident_fund_checkbox = document.getElementById("PF_Flag_create");
    var PF_MemNo = document.getElementById("PF_MemNo_create");
    var PF_EnterDate = document.getElementById("PF_EnterDate_create");
    var PF_E_Rate = document.getElementById("PF_E_Rate_create");
    if (provident_fund_checkbox.checked == true){
        PF_MemNo.disabled = "";
        PF_EnterDate.disabled = "";
        PF_E_Rate.disabled = "";

    } else {
        PF_MemNo.disabled = "disabled";
        PF_EnterDate.disabled = "disabled";
        PF_E_Rate.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
function PF_Flag_edit_function() {
    var provident_fund_checkbox = document.getElementById("PF_Flag");
    var PF_MemNo = document.getElementById("PF_MemNo");
    var PF_EnterDate = document.getElementById("PF_EnterDate");
    var PF_E_Rate = document.getElementById("PF_E_Rate");
    if (provident_fund_checkbox.checked == true){
        PF_MemNo.disabled = "";
        PF_EnterDate.disabled = "";
        PF_E_Rate.disabled = "";

    } else {
        PF_MemNo.disabled = "disabled";
        PF_EnterDate.disabled = "disabled";
        PF_E_Rate.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
function SP_Moth_Red_F_create_function() {
    var SP_Moth_Red_F = document.getElementById("SP_Moth_Red_F_create");
    var SP_Moth_ID = document.getElementById("SP_Moth_ID_create");
    if (SP_Moth_Red_F.checked == true){
        SP_Moth_ID.disabled = "";
    } else {
        SP_Moth_ID.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
function SP_Moth_Red_F_function() {
    var SP_Moth_Red_F = document.getElementById("SP_Moth_Red_F");
    var SP_Moth_ID = document.getElementById("SP_Moth_ID");
    if (SP_Moth_Red_F.checked == true){
        SP_Moth_ID.disabled = "";
    } else {
        SP_Moth_ID.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
function SP_Fath_Red_F_create_function() {
    var SP_Fath_Red_F = document.getElementById("SP_Fath_Red_F_create");
    var SP_Fath_ID = document.getElementById("SP_Fath_ID_create");
    if (SP_Fath_Red_F.checked == true){
        SP_Fath_ID.disabled = "";
    } else {
        SP_Fath_ID.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
function SP_Fath_Red_F_function() {
    var SP_Fath_Red_F = document.getElementById("SP_Fath_Red_F");
    var SP_Fath_ID = document.getElementById("SP_Fath_ID");
    if (SP_Fath_Red_F.checked == true){
        SP_Fath_ID.disabled = "";
    } else {
        SP_Fath_ID.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
function ProbFlag_Function() {
    var ProbFlag = document.getElementById("ProbFlag");
    var ProbDate = document.getElementById("ProbDate");
    var ResignDate = document.getElementById("ResignDate");
    if (ProbFlag.checked == true){
        ProbDate.disabled = "";
        ResignDate.disabled = "";
    } else {
        ProbDate.disabled = "disabled";
        ResignDate.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}

</script>

