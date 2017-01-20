<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>L-Connectt</title>
<link href="<?php echo base_url();?>css/tablecss.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/jquery.selectBox.css" />
<link href="<?php echo base_url();?>css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>css/rep-style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<style>
body{
	margin:auto;
	}
#table1 tr{
	width:100%;
	text-align:center;
	}
#table1 tr td{
	text-align:center;
	color:#000;
	
	}
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="url"]{
	width:97%;
	padding:3px !important;
	}
.errMessage{
	color:red !important;
	}
ul {
    list-style-type: none;
	background: #ff8a00;
	background: -moz-linear-gradient(top,  #ff8a00 0%, #ff5400 100%);
	background: -webkit-linear-gradient(top,  #ff8a00 0%,#ff5400 100%); 
	background: linear-gradient(to bottom,  #ff8a00 0%,#ff5400 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff8a00', endColorstr='#ff5400',GradientType=0 );
	padding: 15px 6px;
	color:#ffffff;
	text-align:center;
	border: 0;
	background-color:#357ca5;            
	box-shadow: 0px 0px 8px #000;
	width:100%;
	height:52px;
	cursor:pointer;
	margin-bottom:-5px;
	margin-top:10px;	 
}
li {
   	float: left;
	height:12px;
	width:90px;
	color:#ffffff;
	font-size:15px;
	font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
	margin-top:2px;
}
.addExcel{position:relative;bottom:28PX;right:90px;float:right;text-decoration:none;}
.addPlus{position:relative;bottom:28PX;right:0px;float:right;text-decoration:none;}
a.tab{text-decoration:none;color:#fff;}
a.tab1{background-color:#1e282c;padding:11px 5px;}
#new_conv{
	width:500px;
	height:200px;
	border-radius: 2px;
    padding: 1px 13px;
    color: #82899E;
    border: 0;
	background-color:#FFFFFF;            
    box-shadow: 0px 0px 8px #000;
	position:absolute;
	z-index:500;
	top:150px;
	left:310px;	
}
button{background: #b5000a;color:#fff!important;cursor:pointer;border:none}
button:hover{background: #b5000a;color:#fff!important;cursor:pointer;}
</style>
<script src="<?php echo base_url();?>js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".errMessage").hide();
    $("#share_login_btn").click(function () {
	var shareSuc = 1;
	$(".errMessage").hide();
        if ($.trim($("#admin_contact_dept").val()) == ""){
            $("#admin_contact_dept_req").show();
            shareSuc = 0;
        }
	if ($.trim($("#admin_contact_dept").val()) != ""){
            shareSuc=1;
        }
	if(shareSuc==1){
            $("#share_login_btn").attr("disabled","disabled");
            document.getElementById("admin_client").submit();
	}
    });
    $('#new_conv').hide();
    $("#compose").click(function(){
        $("#new_conv").toggle();
    });
    $(".close1").click(function(){
        $("#new_conv").hide();
    });
});
</script>
</head>
<body>
<section class="row" style="height:43px;margin-top:65px;">
    <div class="pageHeader1">
        <h2>Department list</h2>
        <span class="info-icon"><a data-toggle="tooltip" title="Department List"><img src="/images/new/i_off.png" onmouseover="this.src='/images/new/i_ON.png'" onmouseout="this.src='/images/new/i_off.png'" alt="info" width="30" height="30"/></a><span>
    </div>
    <div class="addBtns">
        <a href="insert_department.html" class="addExcel"><img src="/images/new/Xl_Off.png" onmouseover="this.src='/images/new/Xl_ON.png'" onmouseout="this.src='/images/new/Xl_Off.png'" width="30px" height="30px"/></a>
        <a href="#" class="addPlus" id="compose"><img src="/images/new/Plus_Off.png" onmouseover="this.src='/images/new/Plus_ON.png'" onmouseout="this.src='/images/new/Plus_Off.png'" width="30px" height="30px"/></a>
    </div>
</section>
<div id="new_conv">
    <p><input type="button" value="X" style="float:right" class="close1"></p><br>
    <form id="admin_client" class="Admin_Client" action="<?php echo site_url('admin_departmentController/post_data'); ?>" method="post" name="adminClient">
        <table id="table1" class="table_admin" style="margin:32px auto;width:95%;">  
            <tr>
                <td class="td" style="font-family: Times New Roman, Times, serif;text-align:center;font-size:14px;"><label>Add Department*</label></td>
                <td class="td">
                        <input type="text" name="departmentName" id="admin_contact_dept"/>
                        <div>
                           <span id="admin_contact_dept_req" class="errMessage">Department is required</span>
                        </div>
                </td>
            </tr>
            <tr>
                <td class="td"><button type="button" id="share_login_btn" >Save</button></td>
                <td class="td"><button type="reset">Clear</button></td>						
            </tr>	
        </table>
    </form>
</div>
<table id="table1" style="margin-top:0px;margin-bottom:20px;">
    <thead>
        <tr>
            <th style="padding:14px;font-size:14px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;text-align:center;">SL No</th>
            <th style="padding:14px;font-size:14px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;text-align:center;">Department</th>
            <th style="padding:14px;font-size:14px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;text-align:center;"></th>
	</tr>
    </thead>
    <tbody>  
        <?php
            $i=1;
            if(isset($view_department) && is_array($view_department) && count($view_department)){
                foreach ($view_department as $key => $data) { 
        ?>
        <tr>
            <td style="padding:10px;font-size:13px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;"><?php echo $i; ?></td>
            <td style="padding:10px;font-size:13px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;"><?php echo $data['deprtmt_name']; ?></td>
            <td style="padding:10px;font-size:13px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;"><a href="<?php echo site_url('admin_departmentController/edit_data/'.$data['deprt_id']) ?>" style="text-decoration:none;padding:7px 13px;">Edit</a></td>	
	</tr>
        <?php
                 $i++;
                }
            }
        ?>
    </tbody>
</table>
</body>
</html>