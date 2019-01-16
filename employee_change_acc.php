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
if(isset($_POST["EmplCode"]))  {
    if(trim($_FILES["emp_pic"]["tmp_name"]) != ""){
    $target_dir = "file_upload/emp_img/";
$target_file = $target_dir . basename($_FILES["emp_pic"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
    //upload emp image
    $check = getimagesize($_FILES["emp_pic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
                        if (move_uploaded_file($_FILES["emp_pic"]["tmp_name"], $target_file)) {
                            $strSQL = "UPDATE tm03_employee SET ";
                            $strSQL .= "EmplType='".$_POST["EmplType"]."',
                                        ProcCode='".$_POST["ProcCode"]."',
                                        OT_Cal_F='".$_POST["OT_Cal_F"]."',
                                        Attn_Cal_F='".$_POST["Attn_Cal_F"]."',
                                        EmplTName='".$_POST["EmplTName"]."',
                                        EmplEName='".$_POST["EmplEName"]."',
                                        DeptCode='".$_POST["DeptCode"]."',
                                        PosiCode='".$_POST["PosiCode"]."',
                                        EnterDate='".$_POST["EnterDate"]."',
                                        ProbFlag='".$_POST["ProbFlag"]."',
                                        ProbDate='".$_POST["ProbDate"]."',
                                        ResignDate='".$_POST["ResignDate"]."',
                                        BankCode='".$_POST["BankCode"]."',
                                        BankAccCode='".$_POST["BankAccCode"]."',
                                        Sex='".$_POST["Sex"]."',
                                        Salary='".$_POST["Salary"]."',
                                        L_C_Gross='".$_POST["L_C_Gross"]."',
                                        L_C_Tax='".$_POST["L_C_Tax"]."',
                                        L_C_SOC='".$_POST["L_C_SOC"]."',
                                        BranchCode='".$_POST["BranchCode"]."',
                                        CompLoan='".$_POST["CompLoan"]."',
                                        Marital='".$_POST["Marital"]."',
                                        MarriageNo='".$_POST["MarriageNo"]."',
                                        MarriagedDate='".$_POST["MarriagedDate"]."',
                                        TaxID='".$_POST["TaxID"]."',
                                        TaxCond='".$_POST["TaxCond"]."',
                                        SpouseName='".$_POST["SpouseName"]."',
                                        ChildInEduc='".$_POST["ChildInEduc"]."',
                                        ChildNotEduc='".$_POST["ChildNotEduc"]."',
                                        Own_Fath_Red_F='".$_POST["Own_Fath_Red_F"]."',
                                        Own_Fath_ID='".$_POST["Own_Fath_ID"]."',
                                        Own_Moth_Red_F='".$_POST["Own_Moth_Red_F"]."',
                                        Own_Moth_ID='".$_POST["Own_Moth_ID"]."',
                                        SP_Fath_Red_F='".$_POST["SP_Fath_Red_F"]."',
                                        SP_Fath_ID='".$_POST["SP_Fath_ID"]."',
                                        SP_Moth_Red_F='".$_POST["SP_Moth_Red_F"]."',
                                        SP_Moth_ID='".$_POST["SP_Moth_ID"]."',
                                        Address='".$_POST["Address"]."',
                                        PostalCode='".$_POST["PostalCode"]."',
                                        HomePhone='".$_POST["HomePhone"]."',
                                        Nationality='".$_POST["Nationality"]."',
                                        Ethnic='".$_POST["Ethnic"]."',
                                        Religion='".$_POST["Religion"]."',
                                        BirthDate='".$_POST["BirthDate"]."',
                                        IDno='".$_POST["IDno"]."',
                                        Height='".$_POST["Height"]."',
                                        Weight='".$_POST["Weight"]."',
                                        UM_Flag='".$_POST["UM_Flag"]."',
                                        PF_Flag='".$_POST["PF_Flag"]."',
                                        PF_MemNo='".$_POST["PF_MemNo"]."',
                                        PF_EnterDate='".$_POST["PF_EnterDate"]."',
                                        PF_E_Rate='".$_POST["PF_E_Rate"]."',
                                        AL_Rem_Hrs='".$_POST["AL_Rem_Hrs"]."',
                                        O_Shft_D_PM='".$_POST["O_Shft_D_PM"]."',
                                        M_Shft_D_PM='".$_POST["M_Shft_D_PM"]."',
                                        E_Shft_D_PM='".$_POST["E_Shft_D_PM"]."',
                                        N_Shft_D_PM='".$_POST["N_Shft_D_PM"]."',
                                        Attn_ALW_F='".$_POST["Attn_ALW_F"]."',
                                        Attn_ALW_Accum='".$_POST["Attn_ALW_Accum"]."',
                                        Attn_ALW_AccumNext='".$_POST["Attn_ALW_AccumNext"]."',
                                        SL_Day='".$_POST["SL_Day"]."',
                                        SysUpdDate='".$_POST["SysUpdDate"]."',
                                        SysUserID='".$_POST["SysUserID"]."',
                                        SysPgmID='".$_POST["SysPgmID"]."',
                                        Feneral_F='".$_POST["Feneral_F"]."',
                                        Cooperative_F='".$_POST["Cooperative_F"]."',
                                        MoneyLoan_F='".$_POST["MoneyLoan_F"]."',
                                        GHB_F='".$_POST["GHB_F"]."',
                                        AccMoneyLoan='".$_POST["AccMoneyLoan"]."',
                                        LoanType='".$_POST["LoanType"]."',
                                        LoanAmt='".$_POST["LoanAmt"]."',
                                        AccGHB='".$_POST["AccGHB"]."',
                                        GHBType='".$_POST["GHBType"]."',
                                        GHBAmt='".$_POST["GHBAmt"]."',
                                        UnionMemberAmt='".$_POST["UnionMemberAmt"]."',
                                        AwardAmt='".$_POST["AwardAmt"]."',
                                        CooperativeAmt01='".$_POST["CooperativeAmt01"]."',
                                        CooperativeMemId01='".$_POST["CooperativeMemId01"]."',
                                        CooperativeUnit01='".$_POST["CooperativeUnit01"]."',
                                        CooperativeAmt02='".$_POST["CooperativeAmt02"]."',
                                        CooperativeMemId02='".$_POST["CooperativeMemId02"]."',
                                        CooperativeUnit02='".$_POST["CooperativeUnit02"]."',
                                        emp_pic='".$_FILES["emp_pic"]["name"]."' ";
                                $strSQL .= " WHERE EmplCode = '".$_POST["EmplCode"]."'";
                                $objQuery = mysqli_query($conn, $strSQL);    
                                $result = "";
                                if($objQuery)
                                {
                                    $result = 'ทำการแก้ไขข้อมูลสำเร็จ';
                                    //echo '<script>window.location.href="user.php"</script>';
                                }
                                else
                                {
                                    $result = 'ขออภัย! ไม่สามารถทำการอัปเดตข้อมูลได้';
                                }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
else{
    $strSQL = "UPDATE tm03_employee SET ";
                            $strSQL .= "EmplType='".$_POST["EmplType"]."',
                                        ProcCode='".$_POST["ProcCode"]."',
                                        OT_Cal_F='".$_POST["OT_Cal_F"]."',
                                        Attn_Cal_F='".$_POST["Attn_Cal_F"]."',
                                        EmplTName='".$_POST["EmplTName"]."',
                                        EmplEName='".$_POST["EmplEName"]."',
                                        DeptCode='".$_POST["DeptCode"]."',
                                        PosiCode='".$_POST["PosiCode"]."',
                                        EnterDate='".$_POST["EnterDate"]."',
                                        ProbFlag='".$_POST["ProbFlag"]."',
                                        ProbDate='".$_POST["ProbDate"]."',
                                        ResignDate='".$_POST["ResignDate"]."',
                                        BankCode='".$_POST["BankCode"]."',
                                        BankAccCode='".$_POST["BankAccCode"]."',
                                        Sex='".$_POST["Sex"]."',
                                        Salary='".$_POST["Salary"]."',
                                        L_C_Gross='".$_POST["L_C_Gross"]."',
                                        L_C_Tax='".$_POST["L_C_Tax"]."',
                                        L_C_SOC='".$_POST["L_C_SOC"]."',
                                        BranchCode='".$_POST["BranchCode"]."',
                                        CompLoan='".$_POST["CompLoan"]."',
                                        Marital='".$_POST["Marital"]."',
                                        MarriageNo='".$_POST["MarriageNo"]."',
                                        MarriagedDate='".$_POST["MarriagedDate"]."',
                                        TaxID='".$_POST["TaxID"]."',
                                        TaxCond='".$_POST["TaxCond"]."',
                                        SpouseName='".$_POST["SpouseName"]."',
                                        ChildInEduc='".$_POST["ChildInEduc"]."',
                                        ChildNotEduc='".$_POST["ChildNotEduc"]."',
                                        Own_Fath_Red_F='".$_POST["Own_Fath_Red_F"]."',
                                        Own_Fath_ID='".$_POST["Own_Fath_ID"]."',
                                        Own_Moth_Red_F='".$_POST["Own_Moth_Red_F"]."',
                                        Own_Moth_ID='".$_POST["Own_Moth_ID"]."',
                                        SP_Fath_Red_F='".$_POST["SP_Fath_Red_F"]."',
                                        SP_Fath_ID='".$_POST["SP_Fath_ID"]."',
                                        SP_Moth_Red_F='".$_POST["SP_Moth_Red_F"]."',
                                        SP_Moth_ID='".$_POST["SP_Moth_ID"]."',
                                        Address='".$_POST["Address"]."',
                                        PostalCode='".$_POST["PostalCode"]."',
                                        HomePhone='".$_POST["HomePhone"]."',
                                        Nationality='".$_POST["Nationality"]."',
                                        Ethnic='".$_POST["Ethnic"]."',
                                        Religion='".$_POST["Religion"]."',
                                        BirthDate='".$_POST["BirthDate"]."',
                                        IDno='".$_POST["IDno"]."',
                                        Height='".$_POST["Height"]."',
                                        Weight='".$_POST["Weight"]."',
                                        UM_Flag='".$_POST["UM_Flag"]."',
                                        PF_Flag='".$_POST["PF_Flag"]."',
                                        PF_MemNo='".$_POST["PF_MemNo"]."',
                                        PF_EnterDate='".$_POST["PF_EnterDate"]."',
                                        PF_E_Rate='".$_POST["PF_E_Rate"]."',
                                        AL_Rem_Hrs='".$_POST["AL_Rem_Hrs"]."',
                                        O_Shft_D_PM='".$_POST["O_Shft_D_PM"]."',
                                        M_Shft_D_PM='".$_POST["M_Shft_D_PM"]."',
                                        E_Shft_D_PM='".$_POST["E_Shft_D_PM"]."',
                                        N_Shft_D_PM='".$_POST["N_Shft_D_PM"]."',
                                        Attn_ALW_F='".$_POST["Attn_ALW_F"]."',
                                        Attn_ALW_Accum='".$_POST["Attn_ALW_Accum"]."',
                                        Attn_ALW_AccumNext='".$_POST["Attn_ALW_AccumNext"]."',
                                        SL_Day='".$_POST["SL_Day"]."',
                                        SysUpdDate='".$_POST["SysUpdDate"]."',
                                        SysUserID='".$_POST["SysUserID"]."',
                                        SysPgmID='".$_POST["SysPgmID"]."',
                                        Feneral_F='".$_POST["Feneral_F"]."',
                                        Cooperative_F='".$_POST["Cooperative_F"]."',
                                        MoneyLoan_F='".$_POST["MoneyLoan_F"]."',
                                        GHB_F='".$_POST["GHB_F"]."',
                                        AccMoneyLoan='".$_POST["AccMoneyLoan"]."',
                                        LoanType='".$_POST["LoanType"]."',
                                        LoanAmt='".$_POST["LoanAmt"]."',
                                        AccGHB='".$_POST["AccGHB"]."',
                                        GHBType='".$_POST["GHBType"]."',
                                        GHBAmt='".$_POST["GHBAmt"]."',
                                        UnionMemberAmt='".$_POST["UnionMemberAmt"]."',
                                        AwardAmt='".$_POST["AwardAmt"]."',
                                        CooperativeAmt01='".$_POST["CooperativeAmt01"]."',
                                        CooperativeMemId01='".$_POST["CooperativeMemId01"]."',
                                        CooperativeUnit01='".$_POST["CooperativeUnit01"]."',
                                        CooperativeAmt02='".$_POST["CooperativeAmt02"]."',
                                        CooperativeMemId02='".$_POST["CooperativeMemId02"]."',
                                        CooperativeUnit02='".$_POST["CooperativeUnit02"]."' ";
                                $strSQL .= " WHERE EmplCode = '".$_POST["EmplCode"]."'";
                                $objQuery = mysqli_query($conn, $strSQL);    
                                $result = "";
                                if($objQuery)
                                {
                                    $result = 'ทำการแก้ไขข้อมูลสำเร็จ';
                                    //echo '<script>window.location.href="user.php"</script>';
                                }
                                else
                                {
                                    $result = 'ขออภัย! ไม่สามารถทำการอัปเดตข้อมูลได้';
                                }
}
  }
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <?php echo $result; ?>
    <a href="employee.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
