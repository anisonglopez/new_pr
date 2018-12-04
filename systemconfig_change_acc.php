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
if(isset($_POST["update"]))  {
   
if(isset($_POST["update"])) {

    $slac = array($_POST["LDed_ResdALW_F"],$_POST["OVT_ResdALW_F"], $_POST["PF_ResdALW_F"],$_POST["SOC_ResdALW_F"],);
    for($i = 0; $i < count($slac); $i++){
        if($slac[$i] != 1)
        {
        $slac[$i] = 0;
        } 
        } 
        $cac = array($_POST["LDed_LiveALW_F"],$_POST["OVT_LiveALW_F"], $_POST["PF_LiveALW_F"],$_POST["SOC_LiveALW_F"],);
    for($i = 0; $i < count($cac); $i++){
        if($cac[$i] != 1)
        {
        $cac[$i] = 0;
        } 
        } 
        $pac = array($_POST["LDed_PosiALW_F"],$_POST["OVT_PosiALW_F"], $_POST["PF_PosiALW_F"],$_POST["SOC_PosiALW_F"],);
    for($i = 0; $i < count($pac); $i++){
        if($pac[$i] != 1)
        {
        $pac[$i] = 0;
        } 
        } 
    $pfc = array($_POST["LDed_CommALW_F"],$_POST["OVT_CommALW_F"], $_POST["PF_CommALW_F"],$_POST["SOC_CommALW_F"],);
    for($i = 0; $i < count($pfc); $i++){
        if($pfc[$i] != 1)
        {
        $pfc[$i] = 0;
        } 
        } 
    $sac = array($_POST["LDed_ShiftALW_F"],$_POST["OVT_ShiftALW_F"], $_POST["PF_ShiftALW_F"],$_POST["SOC_ShiftALW_F"],);
    for($i = 0; $i < count($sac); $i++){
        if($sac[$i] != 1)
        {
        $sac[$i] = 0;
        } 
        } 
        $aac = array($_POST["LDed_NoAbsALW_F"],$_POST["OVT_NoAbsALW_F"], $_POST["PF_NoAbsALW_F"],$_POST["SOC_NoAbsALW_F"],);
        for($i = 0; $i < count($aac); $i++){
            if($aac[$i] != 1)
            {
            $aac[$i] = 0;
            } 
            } 
        $oa1c = array($_POST["LDed_OthALW1_F"],$_POST["OVT_OthALW1_F"], $_POST["PF_OthALW1_F"],$_POST["SOC_OthALW1_F"],);
        for($i = 0; $i < count($oa1c); $i++){
            if($oa1c[$i] != 1)
            {
            $oa1c[$i] = 0;
            } 
            }
            $oa2c = array($_POST["LDed_OthALW2_F"],$_POST["OVT_OthALW2_F"], $_POST["PF_OthALW2_F"],$_POST["SOC_OthALW2_F"],);
            for($i = 0; $i < count($oa2c); $i++){
                if($oa2c[$i] != 1)
                {
                $oa2c[$i] = 0;
                } 
                }
    $oa3c = array($_POST["LDed_OthALW3_F"],$_POST["OVT_OthALW3_F"], $_POST["PF_OthALW3_F"],$_POST["SOC_OthALW3_F"],);
    for($i = 0; $i < count($oa3c); $i++){
        if($oa3c[$i] != 1)
        {
        $oa3c[$i] = 0;
        } 
        }
        $oa4c = array($_POST["LDed_OthALW4_F"],$_POST["OVT_OthALW4_F"], $_POST["PF_OthALW4_F"],$_POST["SOC_OthALW4_F"],);
        for($i = 0; $i < count($oa4c); $i++){
            if($oa4c[$i] != 1)
            {
            $oa4c[$i] = 0;
            } 
            }
            $oa5c = array($_POST["LDed_OthALW5_F"],$_POST["OVT_OthALW5_F"], $_POST["PF_OthALW5_F"],$_POST["SOC_OthALW5_F"],);
            for($i = 0; $i < count($oa5c); $i++){
                if($oa5c[$i] != 1)
                {
                $oa5c[$i] = 0;
                } 
                }
                $oa6c = array($_POST["LDed_OthALW6_F"],$_POST["OVT_OthALW6_F"], $_POST["PF_OthALW6_F"],$_POST["SOC_OthALW6_F"],);
                for($i = 0; $i < count($oa6c); $i++){
                    if($oa6c[$i] != 1)
                    {
                    $oa6c[$i] = 0;
                    } 
                    }
                    $oe1c = array($_POST["LDed_Expen1_F"],$_POST["OVT_Expen1_F"], $_POST["PF_Expen1_F"],$_POST["SOC_Expen1_F"],);
                    for($i = 0; $i < count($oe1c); $i++){
                        if($oe1c[$i] != 1)
                        {
                        $oe1c[$i] = 0;
                        } 
                        }
                        $oe2c = array($_POST["LDed_Expen2_F"],$_POST["OVT_Expen2_F"], $_POST["PF_Expen2_F"],$_POST["SOC_Expen2_F"],);
                        for($i = 0; $i < count($oe2c); $i++){
                            if($oe2c[$i] != 1)
                            {
                            $oe2c[$i] = 0;
                            } 
                            }
                            $oe3c = array($_POST["LDed_Expen3_F"],$_POST["OVT_Expen3_F"], $_POST["PF_Expen3_F"],$_POST["SOC_Expen3_F"],);
                            for($i = 0; $i < count($oe3c); $i++){
                                if($oe3c[$i] != 1)
                                {
                                $oe3c[$i] = 0;
                                } 
                                }
                                $oe4c = array($_POST["LDed_Expen4_F"],$_POST["OVT_Expen4_F"], $_POST["PF_Expen4_F"],$_POST["SOC_Expen4_F"],);
                                for($i = 0; $i < count($oe4c); $i++){
                                    if($oe4c[$i] != 1)
                                    {
                                    $oe4c[$i] = 0;
                                    } 
                                    }
date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d H:i:s');
        $strSQL = "UPDATE tm01_system_condition ";
        $strSQL .= "SET Copy_Right = '".($_POST["Copy_Right"])."',
        Owner_Brief_Name = '".$_POST["Owner_Brief_Name"]."',
        Owner_E_Name = '".$_POST["Owner_E_Name"]."',
        Owner_T_Name = '".$_POST["Owner_T_Name"]."',
        Owner_Address = '".$_POST["Owner_Address"]."',
        Owner_Tel = '".$_POST["Owner_Tel"]."',
        Owner_Fax = '".$_POST["Owner_Fax"]."',
        Tax_ID_Owner = '".$_POST["Tax_ID_Owner"]."',
        Term_P_M = '".$_POST["Term_P_M"]."',
        PaidDate_2 = '".$_POST["PaidDate_2"]."',
        WkHrs_Drv = '".$_POST["WkHrs_Drv"]."',
        WkHrs_Empl = '".$_POST["WkHrs_Empl"]."',
        ShiftALW_M_PD = '".$_POST["ShiftALW_M_PD"]."',
        ShiftALW_E_PD = '".$_POST["ShiftALW_E_PD"]."',
        ShiftALW_N_PD = '".$_POST["ShiftALW_N_PD"]."',
        MealALW_F_PD = '".$_POST["MealALW_F_PD"]."',
        MealALW_B_PM = '".$_POST["MealALW_B_PM"]."',
        LiveALW_PM = '".$_POST["LiveALW_PM"]."',
        NoAbsALW_PT = '".$_POST["NoAbsALW_PT"]."',
        FoodALW_PD = '".$_POST["FoodALW_PD"]."',
        NightFoodShift = '".$_POST["NightFoodShift"]."',
        ShiftALW_E_PD = '".$_POST["ShiftALW_E_PD"]."',
        Allow1_Name = '".$_POST["Allow1_Name"]."',
        Allow2_Name = '".$_POST["Allow2_Name"]."',
        Allow3_Name = '".$_POST["Allow3_Name"]."',
        Allow4_Name = '".$_POST["Allow4_Name"]."',
        Allow5_Name = '".$_POST["Allow5_Name"]."',
        Allow6_Name = '".$_POST["Allow6_Name"]."',
        Expen1_Name = '".$_POST["Expen1_Name"]."',
        Expen2_Name = '".$_POST["Expen2_Name"]."',
        Expen3_Name = '".$_POST["Expen3_Name"]."',
        Expen4_Name = '".$_POST["Expen4_Name"]."',
        LDed_ResdALW_F = '".$slac[0]."',
        OVT_ResdALW_F = '".$slac[1]."',
        PF_ResdALW_F = '".$slac[2]."',
        SOC_ResdALW_F = '".$slac[3]."',
        LDed_LiveALW_F = '".$cac[0]."',
        OVT_LiveALW_F = '".$cac[1]."',
        PF_LiveALW_F = '".$cac[2]."',
        SOC_LiveALW_F = '".$cac[3]."',
        LDed_LiveALW_F = '".$pac[0]."',
        OVT_LiveALW_F = '".$pac[1]."',
        PF_LiveALW_F = '".$pac[2]."',
        SOC_LiveALW_F = '".$pac[3]."',
        LDed_CommALW_F = '".$pfc[0]."',
        OVT_CommALW_F = '".$pfc[1]."',
        PF_CommALW_F = '".$pfc[2]."',
        SOC_CommALW_F = '".$pfc[3]."',
        LDed_ShiftALW_F = '".$sac[0]."',
        OVT_ShiftALW_F = '".$sac[1]."',
        PF_ShiftALW_F = '".$sac[2]."',
        SOC_ShiftALW_F = '".$sac[3]."',
        LDed_NoAbsALW_F = '".$aac[0]."',
        OVT_NoAbsALW_F = '".$aac[1]."',
        PF_NoAbsALW_F = '".$aac[2]."',
        SOC_NoAbsALW_F = '".$aac[3]."',
        LDed_OthALW1_F = '".$oa1c[0]."',
        OVT_OthALW1_F = '".$oa1c[1]."',
        PF_OthALW1_F = '".$oa1c[2]."',
        SOC_OthALW1_F = '".$oa1c[3]."',
        LDed_OthALW2_F = '".$oa2c[0]."',
        OVT_OthALW2_F = '".$oa2c[1]."',
        PF_OthALW2_F = '".$oa2c[2]."',
        SOC_OthALW2_F = '".$oa2c[3]."',
        LDed_OthALW3_F = '".$oa3c[0]."',
        OVT_OthALW3_F = '".$oa3c[1]."',
        PF_OthALW3_F = '".$oa3c[2]."',
        SOC_OthALW3_F = '".$oa3c[3]."',
        LDed_OthALW4_F = '".$oa4c[0]."',
        OVT_OthALW4_F = '".$oa4c[1]."',
        PF_OthALW4_F = '".$oa4c[2]."',
        SOC_OthALW4_F = '".$oa4c[3]."',
        LDed_OthALW5_F = '".$oa5c[0]."',
        OVT_OthALW5_F = '".$oa5c[1]."',
        PF_OthALW5_F = '".$oa5c[2]."',
        SOC_OthALW5_F = '".$oa5c[3]."',
        LDed_OthALW6_F = '".$oa6c[0]."',
        OVT_OthALW6_F = '".$oa6c[1]."',
        PF_OthALW6_F = '".$oa6c[2]."',
        SOC_OthALW6_F = '".$oa6c[3]."',
        LDed_Expen1_F = '".$oe1c[0]."',
        OVT_Expen1_F = '".$oe1c[1]."',
        PF_Expen1_F = '".$oe1c[2]."',
        SOC_Expen1_F = '".$oe1c[3]."',
        LDed_Expen2_F = '".$oe2c[0]."',
        OVT_Expen2_F = '".$oe2c[1]."',
        PF_Expen2_F = '".$oe2c[2]."',
        SOC_Expen2_F = '".$oe2c[3]."',
        LDed_Expen3_F = '".$oe3c[0]."',
        OVT_Expen3_F = '".$oe3c[1]."',
        PF_Expen3_F = '".$oe3c[2]."',
        SOC_Expen3_F = '".$oe3c[3]."',
        LDed_Expen4_F = '".$oe4c[0]."',
        OVT_Expen4_F = '".$oe4c[1]."',
        PF_Expen4_F = '".$oe4c[2]."',
        SOC_Expen4_F = '".$oe4c[3]."',
        TFB_Acc_No = '".$_POST["TFB_Acc_No"]."',
        BBL_Acc_No = '".$_POST["BBL_Acc_No"]."',
        PF_Name = '".$_POST["PF_Name"]."',
        PF_No = '".$_POST["PF_No"]."',
        PF_Comp_No = '".$_POST["PF_Comp_No"]."',
        UMF_R = '".$_POST["UMF_R"]."',
        SysUpdDate = '".$date ."',
        SysUserID = '".$_POST["SysUserID"]."',
        SysPgmID = 'FM01_System_Condition'
        ";
        $strSQL .="WHERE System_Name = '".$_POST["System_Name"]."'";
        $objQuery = mysqli_query($conn, $strSQL);  
        
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
    <a href="systemconfig.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
