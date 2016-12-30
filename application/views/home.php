<?php
	require "myconnect.php";
	
	
	$instanceid = basename(dirname($_SERVER['SCRIPT_FILENAME']));
	session_start();
	//echo $_SESSION['clientid'];
	if ((!isset($_SESSION['uid'])) || $_SESSION['clientid']!=$instanceid) {
		header('Location: index.php');
	}else{
	if (session_status() !== PHP_SESSION_ACTIVE) {
		header("location:logout.php");
	}else{
		//echo session_id();
	$accss_wright=$_SESSION['access'];
	$managername = $_SESSION['managername'];
	$managerid=$_SESSION['uid'];
	$photo = $_SESSION['photo'];
	$sql_rem="select count(*) count,remidate FROM lconnect.lead_reminder group by remidate";			  
	$query_rem=mysqli_query($con,$sql_rem);
	
	$sql_cal = "select count(*) totrem
FROM lead_reminder a, subinfo b, managerinfo c where 
c.managerid = '".$managerid."' and 
b.subscriberMGR=c.managerid AND
a.subid=b.subscriberid AND
date(remidate) = date(CONVERT_TZ(NOW(), @@session.time_zone, '+5:30')) LIMIT 1";
$cal_count = mysqli_query($con,$sql_cal) or die(mysqli_error());
$row = mysqli_fetch_assoc($cal_count);
if($row['totrem']>0){
	$calCount = $row['totrem'];
}else{
	$calCount = "";
}
// $timeout = 10; // Set timeout minutes
// $logout_redirect_url = "index.php"; // Set logout URL

// $timeout = $timeout * 60; // Converts minutes to seconds
// if (isset($_SESSION['start_time'])) {
    // $elapsed_time = time() - $_SESSION['start_time'];
    // if ($elapsed_time >= $timeout) {
        // session_destroy();
        // header("Location: $logout_redirect_url");
    // }
// }
// $_SESSION['start_time'] = time();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lconnect | Dashboard</title>
	<link rel="icon" href="/images/LConnectt Fevicon.png" type="image/png">
    <link rel="shortcut icon" href="/images/LConnectt Fevicon.png" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="plugins/selectBox/jquery.selectBox.css"/>

	  <style>
/* Change the link color on hover 
li a span:hover {
   
	
    color: white;
	font-family: "Times New Roman", Times, serif;

}
*/
#generalEmailSettings tr th,td{text-align:center;border-top:none!important;}
.myIframe {
position: relative;
padding-bottom: 56.25%;
    padding-top: 25px;
    height: 550px;
	margin-top:-15px;
} 
.myIframe iframe {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%!important;
overflow:scroll;
}
.editProfile > a > span.glyphicon{color:#fff;font-size:10px;}
.editProfile{position:relative;top:0px;left:5px;float:right;}
.accessLabel{font-size:14px;margin:15px;color:#fff;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;}
.lactive{background:#D3D3D3;}
.lactive a.active{color:#fff;}
button,button:hover{background:#b5000a;cursor:pointer;border:none;color:#fff;padding:7px;}
</style>
<script src="/js/jquery-1.12.3.min.js"></script>
<script>
$(document).ready(function(){
	$('#calCount').hide();
	$('#signOut').click(function(){
		var r1 = confirm("Are you sure you want to Sign Out");
		if(r1==true){
			window.open("logout.php","_self");	
		}
	});
	$('a.sidebar-toggle').toggle(
		function(){$("#calCount").replaceWith(""); },
		function(){$("#calCount").replaceWith("<small class='label pull-right bg-red'><?php echo $calCount;?></small>"); }
	);
});
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo" >
          <!-- mini logo for sidebar mini 50x50 pixels -->
         <span class="logo-mini" style="vertical-align:middle;padding:4px;"><img src="/images/new/White L.png" width="75%"></span>
           <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="/images/new/White Logo.png" width="100%"></span>
        </a>
		
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            
          </a>
		  
		  
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
				<?php
				if($accss_wright=='admin'){
					echo "<label class='accessLabel'>Admin Module</label>";
				}else if($accss_wright=='user'){
					echo "<label class='accessLabel'>Manager Module</label>";
				}
					
				?>
			  </li>
			  <li>
                <a id="signOut" type="button" style="color:#fff;" data-toggle="tooltip" title="Sign Out" ><i class="fa fa-sign-out fa-lg"></i></a>
              </li>
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar"style="margin-top:px;margin-bottom:88px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel" style="margin-bottom:10px;">
            <div class="pull-left image">
				<?php
				if($photo!=''){
					$path = 'uploads/'.$photo;
					if(file_exists($path)){
					
						echo "<img src='uploads/$photo' width='35' height='25' alt='Image' >";
					
					}else{
					
						echo "<img src='/images/default-pic.jpg' width='30' height='35' alt='Image' >";
					
					}
				}else{
					echo "<img src='/images/default-pic.jpg' width='30' height='35' alt='Image' >";
				}
				
				?>
            </div>
            <div class="pull-left info" >
              <p><?php echo $managername;?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
			<?php
				if($accss_wright=='user'){
			?>
			<div class="editProfile"><a href="user_edit_profile.php" target="abc"><span class="glyphicon glyphicon-pencil"></span></a></div>
			<?php
				}else if($accss_wright=='admin'){
			?>
			<div class="editProfile"><a href="admin_edit_profile.php" target="def"><span class="glyphicon glyphicon-pencil"></span></a></div>
			<?php
				}
			?>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
			
			<?php
				if($accss_wright=='admin'){
			?>
				<li class="active treeview">
					<a href="">
						<i class="fa fa-home" ></i> <span>Home</span> 
					</a>
				</li>
				<!--<li class="treeview"> 
					<a href="list_department.php" target="def" style="color:#ffffff;">
						<i class="fa fa-table"></i> <span >Functions</span> 
					</a>
				</li>-->
			<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Functions</span>
                <i class="fa fa-angle-down pull-right"></i>
              </a>
              <ul class="treeview-menu submenu">
					<li>
					  <a href="#" target="def"><i class="fa fa-building-o"></i> Company <i class="fa fa-angle-down pull-right"></i></a>
						<ul class="treeview-menu">
						<li><a href="list_department.php" target="def"><i class="fa fa-building"></i> Department</a></li>
						<li><a href="list_user_role.php" target="def"><i class="fa fa-circle-o"></i> Roles</a></li>
						<li><a href="list_hierarcy.php" target="def"><i class="fa fa-sitemap"></i> Hierachy</a></li>
					  </ul>
					</li>
					<li>
					  <a href="#" target="def"><i class="fa fa-circle-o"></i> Commerce <i class="fa fa-angle-down pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="list_currency.php" target="def"><i class="fa fa-money"></i> Currency</a></li>
						<li><a href="list_products.php" target="def"><i class="fa fa-circle-o"></i> Products</a></li>
						<li><a href="list_expenses.php" target="def"><i class="fa fa-circle-o"></i> Expenses</a></li>
					  </ul>
					</li>
					<li>
					  <a href="#" target="def"><i class="fa fa-circle-o"></i> Operation <i class="fa fa-angle-down pull-right"></i></a>
						<ul class="treeview-menu">
							<li><a href="#" target="def"><i class="fa fa-circle-o"></i> Holiday Calendar <i class="fa fa-angle-down pull-right"></i></a>
								<ul class="treeview-menu">
									<li><a href="list_calendar.php" target="def"><i class="fa fa-circle-o"></i> Calendar</a></li>
									<li><a href="list_holidays.php" target="def"><i class="fa fa-circle-o"></i> Holidays</a></li>
								</ul>
							</li>
							<li><a href="list_leaves_category.php" target="def"><i class="fa fa-circle-o"></i> Leaves</a></li>
							<li><a href="list_region.php" target="def"><i class="fa fa-circle-o"></i> Region</a></li>
							<li><a href="list_location.php" target="def"><i class="fa fa-map-marker"></i> Locations</a></li>
							<li><a href="list_team.php" target="def"><i class="fa fa-users"></i> Teams</a></li>
						</ul>
					</li>
					
					<li>
					  <a href="#" target="def"><i class="fa fa-cart-arrow-down"></i> Sales <i class="fa fa-angle-down pull-right"></i></a>
					 <ul class="treeview-menu">
						<li><a href="list_sales_stage.php" target="def"><i class="fa fa-cart-arrow-down"></i> Sales stage</a></li>
						<li><a href="qualifiers.php" target="def"><i class="fa fa-circle-o" target="def"></i> Qualifiers</a></li>
						<li><a href="sales_cycle.php" target="def"><i class="fa fa-circle-o" target="def"></i> Sales Cycle</a></li>
					  </ul>
					</li>
					<li>
					  <a href="#" target="def"><i class="fa fa-circle-o"></i> Marketing <i class="fa fa-angle-down pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="list_lead_source.php" target="def"><i class="fa fa-circle-o"></i> Lead Source</a></li>
						<li><a href="agencies.php" target="def"><i class="fa fa-circle-o" target="def"></i> Agencies</a></li>
						<li><a href="distribution.php" target="def"><i class="fa fa-circle-o" target="def"></i> Distribution</a></li>
					  </ul>
					</li>
              </ul>
            </li>
				
				<li class="treeview"> 
					<a href="list_manager.php" target="def">
						<i class="fa fa-users"></i> <span>Users</span>
					</a>
				</li>
				<li class="treeview"> 
					<a href="#" target="def">
						<i class="fa fa-comments-o"></i> <span>Communicator Settings</span> <i class="fa fa-angle-down pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="chat_settings.php" target="def"><i class="fa fa-circle-o"></i> Chat Settings</a></li>
						<li><a href="list_email_settings.php" target="def"><i class="fa fa-circle-o"></i> Emails Settings</a></li>
						<li><a href="notice_settings.php" target="def"><i class="fa fa-circle-o"></i> Notice Settings</a></li>
					</ul>
			  </li>
			<?php
				}else if($accss_wright=='user'){
			?>
				<li class="active treeview">
					<a href="user_dashboard.php" target="abc">
						<i class="fa-home fa" ></i> <span>Home</span> 
					</a>
				</li>
			   <li class="treeview"> 
			 <a href="list_rep_details.php" target="abc">
                <i class="fa fa-users"></i> <span>Sales Reps</span>
				
              </a>
			 </li>
			   <li class="treeview"> 
			   <a href="list_lead_info.php" target="abc">
                <i class="fa fa-dashboard"></i> <span>Business leads</span> 
				
              </a>
			 </li>
			<li class="treeview"> 
				<a href="#" target="abc">
					<i class="fa fa-comments-o"></i> <span>Communicator</span> <i class="fa fa-angle-down pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="com_inbox.php" target="abc"><i class="fa fa-circle-o"></i> Chats</a></li>
					<li>
						<a href="email_inbox.php" target="abc">
							<i class="fa fa-circle-o" ></i> Emails 
						</a>
					</li>
					<li><a href="add_notice.php" target="abc"><i class="fa fa-circle-o" ></i> Notice</a></li>
				</ul>
			</li>
			<li class="treeview"> 
				<a href="list_sales_rep.php" target="abc">
					<i class="fa fa-street-view"></i> <span>Geo Tag</span> 	
				</a>
				</li>
			<li class="treeview"> 
				<a href="list_rep_leaves.php" target="abc">
					<i class="fa fa-calendar-o"></i> <span>Attendance</span> 	
				</a>
			</li>
			<li class="treeview"> 
				<a href="list_manager_expenses.php" target="abc">
					<i class="fa fa-money"></i> <span>Expenses</span> 	
				</a>
			</li>
            <li class="treeview">
              <a href="lconnect_calendar.php" target="abc">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
				<span id="calCount" class="logo-lg"><small class="label pull-right bg-red"><?php echo $calCount;?></small></span>
              </a>
            </li>
			<li class="treeview">
              <a id="library" href="library.php" target="abc">
                <i class="fa fa-book"></i> <span>Library</span>
              </a>
            </li>
			<li class="treeview"> 
			  <a href="lead_life_cycle.php" target="abc">
                <i class="fa fa-line-chart"></i> <span>Reports</span> 
              </a>
			</li>
			<?php
				}
			?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1></h1>
        </section>
 <!-- list department page -->
   
<!--<table  style="border:0;margin-top:-15px;" align="center">
  <tr>
    <td  colspan="4" > </tr>
</table>-->
	
	<div class="myIframe">
		<?php
			if($accss_wright=='user'){
		?>
		<iframe width="1136" scrolling="yes" style="border:0;" name="abc" bg-color="#ecf0f5" allowfullscreen src="user_dashboard.php"></iframe>
		<?php
			}else if($accss_wright=='admin'){
		?>
			<iframe width="1136" scrolling="yes" style="border:0;" name="def" bg-color="#ecf0f5" allowfullscreen src="admin_dashboard.php"></iframe>
		<?php
			}
		?>
	</div>
 
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
            <!--</ul>/.control-sidebar-menu -->
			<div id="control-sidebar-theme-demo-options-tab" class="tab-pane active">
			</div>
      </aside>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <script src="/js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>

<script>
$(document).ready(function () {
    $('ul.sidebar-menu li.treeview a').click(function(e) {

        $('.sidebar-menu li').removeClass('active');

        var $parent = $(this).parent();
        if (!$parent.hasClass('active')) {
            $parent.addClass('active');
        }
        e.preventDefault();
    });
});
</script>
</body>
</html>
<?php
	}
	}
	mysqli_close($con);
?>