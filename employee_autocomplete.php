<? 
error_reporting(0);
include "config/connect.php";

$q = urldecode($_GET["q"]);
$pagesize = 50; // จำนวนรายการที่ต้องการแสดง
$table_db="tm03_employee"; // ตารางที่ต้องการค้นหา
$find_field="EmplTName"; // ฟิลที่ต้องการค้นหา
$sql = "SELECT * FROM $table_db WHERE  LOCATE('$q', $find_field) > 0 ORDER BY LOCATE('$q', $find_field), $find_field LIMIT $pagesize";
$results = mysqli_query($conn,$sql);
$find_error = "ไม่พบข้อมูลการค้นหา";
if(mysqli_num_rows($results) > 0){
while ($row = mysqli_fetch_array( $results )) {
	$id = $row["EmplCode"]; // ฟิลที่ต้องการส่งค่ากลับ
	$name = ucwords(  $row["EmplTName"]  ); // ฟิลที่ต้องการแสดงค่า
	// ป้องกันเครื่องหมาย '
	//$name = str_replace("'", "'", $name);
	// กำหนดตัวหนาให้กับคำที่มีการพิมพ์
	//$display_name = ereg_replace("/(" . $q . ")/i", "<b>$1</b>", $name);
	echo "<li onselect=\"this.setText('$name').setValue('$id');\">$name</li>";
}
}
else{
    echo "<li onselect=\"this.setText(' ').setValue('');\">$find_error </li>";
}
?>