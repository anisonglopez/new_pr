<?php 
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<!-- Bootstrap Core CSS -->
<!-- <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- MetisMenu CSS -->
<link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="./dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="./vendor/morrisjs/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="./css/b/log-home.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js 

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">        

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>พนักงานใหม่!</div>
                                </div>
                            </div>
                        </div>
                        <a href="employee.php">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียดเพิ่มเติม</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>พนักงานทั้งหมด!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียดเพิ่มเติม</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>รอบการประมวลผล!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียดเพิ่มเติม</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-inbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>พนักงานที่ลาในเดือนนี้</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-bar-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="342" version="1.1" width="510" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="32.515625" y="308" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,308H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.515625" y="237.25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,237.25H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.515625" y="166.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,166.5H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.515625" y="95.75" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,95.75H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.515625" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,25H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="453.57254464285717" y="320.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="327.8627232142857" y="320.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><text x="202.15290178571428" y="320.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan></text><text x="76.44308035714286" y="320.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2006</tspan></text><rect x="52.872488839285715" y="25" width="22.070591517857142" height="283" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="77.94308035714286" y="53.29999999999998" width="22.070591517857142" height="254.70000000000002" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="115.72739955357144" y="95.75" width="22.070591517857142" height="212.25" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="140.79799107142858" y="124.04999999999998" width="22.070591517857142" height="183.95000000000002" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="178.58231026785717" y="166.5" width="22.070591517857142" height="141.5" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="203.6529017857143" y="194.8" width="22.070591517857142" height="113.19999999999999" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="241.43722098214286" y="95.75" width="22.070591517857142" height="212.25" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="266.5078125" y="124.04999999999998" width="22.070591517857142" height="183.95000000000002" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="304.2921316964286" y="166.5" width="22.070591517857142" height="141.5" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="329.3627232142858" y="194.8" width="22.070591517857142" height="113.19999999999999" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="367.1470424107143" y="95.75" width="22.070591517857142" height="212.25" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="392.21763392857144" y="124.04999999999998" width="22.070591517857142" height="183.95000000000002" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="430.001953125" y="25" width="22.070591517857142" height="283" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="455.07254464285717" y="53.29999999999998" width="22.070591517857142" height="254.70000000000002" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Area Chart Example
                        </div>
                        <!-- /.panel-heading -->
                                                            <div class="panel-body">
                                                                <div id="morris-area-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="342" version="1.1" width="510" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.203125" y="308" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,308H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="237.25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,237.25H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="166.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,166.5H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="95.75" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,95.75H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.203125" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.703125,25H485" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="406.8212332928311" y="320.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="219.08932639732686" y="320.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan></text><path fill="#7cb57c" stroke="none" d="M61.703125,257.8807C73.53280680437425,252.69236666666666,97.19217041312271,241.9253958333333,109.02185221749696,237.12736666666666C120.8515340218712,232.3293375,144.51089763061967,226.06474717668488,156.3405794349939,219.49646666666666C168.04167774149454,212.9995805100182,191.44387435449573,186.80528908839776,203.14497266099636,184.86669999999998C214.71748746962334,182.94941408839776,237.8625170868773,202.66302023809524,249.43503189550427,204.07296666666667C261.2647136998785,205.51424523809524,284.92407730862703,195.3117583333333,296.75375911300125,196.27159999999998C308.58344091737547,197.23144166666665,332.24280452612396,228.79010418943534,344.0724863304982,211.7517C355.7735846369988,194.898495856102,379.17578125,68.92631666666666,390.8768795565006,60.705166666666656C402.57797786300125,52.48401666666666,425.9801744760024,133.9280789162113,437.681272782503,145.9825C449.51095458687723,158.16938724954463,473.1703181956258,154.748425,485,157.6704L485,308L61.703125,308Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#4da74d" d="M61.703125,257.8807C73.53280680437425,252.69236666666666,97.19217041312271,241.9253958333333,109.02185221749696,237.12736666666666C120.8515340218712,232.3293375,144.51089763061967,226.06474717668488,156.3405794349939,219.49646666666666C168.04167774149454,212.9995805100182,191.44387435449573,186.80528908839776,203.14497266099636,184.86669999999998C214.71748746962334,182.94941408839776,237.8625170868773,202.66302023809524,249.43503189550427,204.07296666666667C261.2647136998785,205.51424523809524,284.92407730862703,195.3117583333333,296.75375911300125,196.27159999999998C308.58344091737547,197.23144166666665,332.24280452612396,228.79010418943534,344.0724863304982,211.7517C355.7735846369988,194.898495856102,379.17578125,68.92631666666666,390.8768795565006,60.705166666666656C402.57797786300125,52.48401666666666,425.9801744760024,133.9280789162113,437.681272782503,145.9825C449.51095458687723,158.16938724954463,473.1703181956258,154.748425,485,157.6704" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="61.703125" cy="257.8807" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="109.02185221749696" cy="237.12736666666666" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="156.3405794349939" cy="219.49646666666666" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="203.14497266099636" cy="184.86669999999998" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="249.43503189550427" cy="204.07296666666667" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="296.75375911300125" cy="196.27159999999998" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="344.0724863304982" cy="211.7517" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="390.8768795565006" cy="60.705166666666656" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="437.681272782503" cy="145.9825" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="485" cy="157.6704" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#a8b4bd" stroke="none" d="M61.703125,282.8507333333333C73.53280680437425,277.1765833333333,97.19217041312271,265.12432083333334,109.02185221749696,260.15413333333333C120.8515340218712,255.18394583333333,144.51089763061967,245.80665191256827,156.3405794349939,243.0892333333333C168.04167774149454,240.4013519125683,191.44387435449573,240.71814415285453,203.14497266099636,238.53293333333335C214.71748746962334,236.3717358195212,237.8625170868773,228.73457664835163,249.43503189550427,225.7036C261.2647136998785,222.6052683150183,284.92407730862703,213.8871708333333,296.75375911300125,214.01569999999998C308.58344091737547,214.14422916666663,332.24280452612396,239.86483752276865,344.0724863304982,226.73183333333333C355.7735846369988,213.74157918943533,379.17578125,117.22498333333333,390.8768795565006,109.52266666666665C402.57797786300125,101.82034999999999,425.9801744760024,157.02737399817852,437.681272782503,165.1133C449.51095458687723,173.28808233151184,473.1703181956258,172.20245,485,174.5655L485,308L61.703125,308Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#7a92a3" d="M61.703125,282.8507333333333C73.53280680437425,277.1765833333333,97.19217041312271,265.12432083333334,109.02185221749696,260.15413333333333C120.8515340218712,255.18394583333333,144.51089763061967,245.80665191256827,156.3405794349939,243.0892333333333C168.04167774149454,240.4013519125683,191.44387435449573,240.71814415285453,203.14497266099636,238.53293333333335C214.71748746962334,236.3717358195212,237.8625170868773,228.73457664835163,249.43503189550427,225.7036C261.2647136998785,222.6052683150183,284.92407730862703,213.8871708333333,296.75375911300125,214.01569999999998C308.58344091737547,214.14422916666663,332.24280452612396,239.86483752276865,344.0724863304982,226.73183333333333C355.7735846369988,213.74157918943533,379.17578125,117.22498333333333,390.8768795565006,109.52266666666665C402.57797786300125,101.82034999999999,425.9801744760024,157.02737399817852,437.681272782503,165.1133C449.51095458687723,173.28808233151184,473.1703181956258,172.20245,485,174.5655" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="61.703125" cy="282.8507333333333" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="109.02185221749696" cy="260.15413333333333" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="156.3405794349939" cy="243.0892333333333" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="203.14497266099636" cy="238.53293333333335" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="249.43503189550427" cy="225.7036" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="296.75375911300125" cy="214.01569999999998" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="344.0724863304982" cy="226.73183333333333" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="390.8768795565006" cy="109.52266666666665" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="437.681272782503" cy="165.1133" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="485" cy="174.5655" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#2677b5" stroke="none" d="M61.703125,282.8507333333333C73.53280680437425,282.5866,97.19217041312271,284.44260833333334,109.02185221749696,281.7942C120.8515340218712,279.14579166666664,144.51089763061967,262.8360351548269,156.3405794349939,261.66346666666664C168.04167774149454,260.50364348816026,191.44387435449573,274.71505662983424,203.14497266099636,272.4646333333333C214.71748746962334,270.2389399631676,237.8625170868773,245.97829532967035,249.43503189550427,243.75900000000001C261.2647136998785,241.490386996337,284.92407730862703,252.16645833333334,296.75375911300125,254.513C308.58344091737547,256.85954166666664,332.24280452612396,273.67962604735885,344.0724863304982,262.53133333333335C355.7735846369988,251.50421771402551,379.17578125,172.7295375,390.8768795565006,165.81136666666666C402.57797786300125,158.89319583333332,425.9801744760024,199.3979123406193,437.681272782503,207.18596666666667C449.51095458687723,215.059604007286,473.1703181956258,223.14009166666668,485,228.45813333333334L485,308L61.703125,308Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#0b62a4" d="M61.703125,282.8507333333333C73.53280680437425,282.5866,97.19217041312271,284.44260833333334,109.02185221749696,281.7942C120.8515340218712,279.14579166666664,144.51089763061967,262.8360351548269,156.3405794349939,261.66346666666664C168.04167774149454,260.50364348816026,191.44387435449573,274.71505662983424,203.14497266099636,272.4646333333333C214.71748746962334,270.2389399631676,237.8625170868773,245.97829532967035,249.43503189550427,243.75900000000001C261.2647136998785,241.490386996337,284.92407730862703,252.16645833333334,296.75375911300125,254.513C308.58344091737547,256.85954166666664,332.24280452612396,273.67962604735885,344.0724863304982,262.53133333333335C355.7735846369988,251.50421771402551,379.17578125,172.7295375,390.8768795565006,165.81136666666666C402.57797786300125,158.89319583333332,425.9801744760024,199.3979123406193,437.681272782503,207.18596666666667C449.51095458687723,215.059604007286,473.1703181956258,223.14009166666668,485,228.45813333333334" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="61.703125" cy="282.8507333333333" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="109.02185221749696" cy="281.7942" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="156.3405794349939" cy="261.66346666666664" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="203.14497266099636" cy="272.4646333333333" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="249.43503189550427" cy="243.75900000000001" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="296.75375911300125" cy="254.513" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="344.0724863304982" cy="262.53133333333335" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="390.8768795565006" cy="165.81136666666666" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="437.681272782503" cy="207.18596666666667" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="485" cy="228.45813333333334" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 5.67188px; top: 179px; display: none;"><div class="morris-hover-row-label">2010 Q1</div><div class="morris-hover-point" style="color: #0b62a4">
                                    iPhone:
                                    2,666
                                    </div><div class="morris-hover-point" style="color: #7A92A3">
                                    iPad:
                                    -
                                    </div><div class="morris-hover-point" style="color: #4da74d">
                                    iPod Touch:
                                    2,647
                                    </div></div></div>
                                                            </div>
                                                            <!-- /.panel-body -->
                                                        </div>
                                                        <!-- /.panel -->
                                                    </div>
                                    </div>



            </div>
        <!-- /.row -->
<p>กำลังดำเนินการ</p>



        <?php include("includes/footer.php"); ?>
        <script src="./vendor/morrisjs/morris.min.js"></script>
        <script src="./data/morris-data.js"></script>
