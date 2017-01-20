<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>L-Connect</title>
<link href="<?php echo base_url(); ?>css/tablecss.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.selectBox.css" />
<link href="<?php echo base_url(); ?>js/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>css/rep-style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<style>
body{
	margin:auto;
	}
input[type='submit']
        {
            border-raduis: 2px;
            padding: 5px 13px;
            color: #fff;
            border: 0;
			background-color:#999;            
            box-shadow: 0px 0px 8px #000;
        }
input[type='submit']:hover
        {
            background-color: #3F4551;
        }
#table1 tr{
	width:100%;
	text-align:center;
	}
#table1 tr td{
	text-align:center;
	color:#000;
	
	}
.social_link td{
	width:100px;
	text-align:center;
	}
.social_link td input[type="url"]{
	width:100px;
	}
.add_email, .email_file{
	height:100px;
	border:1px solid #999;
	overflow:scroll;
	background:#FFF;
	}

.class1{ padding:5px 0px 0px 0px;line-height:20px; }
.class1 div { width:200px; height:20px; float:left;}
.c_both{ clear:both; width:0px !important; height:0px !important; border:0px solid !important;}
#attListDel, #fileDel{
	font-size:14px; 
	width:20px; 
	height:20px; 
	line-height:20px;
	border-radius:100%; 
	text-align:center; 
	background:#82899E; 
	font-weight:900;
	cursor: pointer;
	color:#900;
	box-shadow: 0px 0px 10px #F00;}
#attListDel:hover,
#fileDel:hover{
	border:1px solid red;
	width:18px; 
	height:18px;
	line-height:18px;
	color:#FFF; 
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
input[type='submit']{

	}
.dete_time td{
	width:100px;
	}
.time{ width:50px;}


input[type="submit"]{
	margin: 0 42%!important;
	width: 150px;
	float:none;
	background: linear-gradient(#3F4551, #3F4551, #3F4551);
	-moz-background: linear-gradient(#3F4551, #3F4551, #3F4551);
	-webkit-background: linear-gradient(#3F4551,#3F4551,#3F4551);
	-ms-background: linear-gradient(#3F4551, #3F4551, #3F4551);
	}
	#info_btn
        {
            border-raduis: 2px;
            padding: 15px 30px ;
            color: #fff;
			text-align:center;
            border: 0;
			background-color:#f93232;            
            box-shadow: 0px 0px 8px #000;
			width:100%;
			height:12px;
			width:80px;
			cursor:pointer;
			margin-bottom:-25px;
		}
		
		#info_btn1
        {
            border-raduis: 2px;
            padding: 15px 30px ;
            color: #fff;
			text-align:center;
            border: 0;
			background-color:#f93232;            
            box-shadow: 0px 0px 8px #000;
			width:100%;
			height:12px;
			cursor:pointer;
			margin-bottom:-25px;
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
	margin-top:50px;
		 
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
button{background: #b5000a;color:#fff!important;cursor:pointer;border:none;}
button:hover{background: #b5000a;color:#fff!important;cursor:pointer;}

</style>
<script src="<?php echo base_url(); ?>js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {	
	$(".errMessage").hide();
	$("#share_login_btn").click(function () {
		
		var shareSuc = 1;
		$(".errMessage").hide();
		
		if ($.trim($("#admin_contact_name").val()) == "")
			{
				$("#admin_contact_name_req").show();
				shareSuc = 0;
			}
		
		
			if ($.trim($("#admin_contact_name").val()) != ""){
			shareSuc=1;}
		
		if(shareSuc){
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
            <h2>Role list</h2>
            <span class="info-icon"><a data-toggle="tooltip" title="Role List"><img src="/images/new/i_off.png" onmouseover="this.src='/images/new/i_ON.png'" onmouseout="this.src='/images/new/i_off.png'" alt="info" width="30" height="30"/></a><span>
    </div>
    <div class="addBtns">
        <a href="insert_userrol_data.html" class="addExcel"><img src="/images/new/Xl_Off.png" onmouseover="this.src='/images/new/Xl_ON.png'" onmouseout="this.src='/images/new/Xl_Off.png'" width="30px" height="30px"/></a>
        <a href="#" class="addPlus" id="compose"><img src="/images/new/Plus_Off.png" onmouseover="this.src='/images/new/Plus_ON.png'" onmouseout="this.src='/images/new/Plus_Off.png'" width="30px" height="30px"/></a>
    </div>
</section>
<div id="new_conv">
    <p><input type="button" value="X" style="float:right" class="close1"></p><br>
    <form id="admin_client" class="Admin_Client" action="<?php echo site_url('admin_roleController/post_data'); ?>" method="post" name="adminClient">
        <table id="table1" class="table_admin" style="margin:32px auto;width:95%;">	
            <tr>
                <td class="td" style="font-size:14px;font-family: Times New Roman, Times, serif;text-align:center;">Department*</td>
                <td class="td">
                        <select name="adminContactDept" id="admin_contact_dept">
                        <?php
//                        $sql_query=mysqli_query($con,"select * from department order by deprtmt_name asc");
//                        while($Arr=mysqli_fetch_array($sql_query)){
//                        $depid=$Arr['deprt_id'];
//                        $depnam=$Arr['deprtmt_name'];
//                        echo "<option value='$depid'>$depnam</option>";
//                        }
                        ?>
                        </select>
                        <div>
                           <span id="admin_contact_dept_req" class="errMessage" style="background-color:#3f4551;">Department is required</span>
                        </div>
                </td>
            </tr>
            <tr>
                <td class="td" style="font-size:14px;font-family: Times New Roman, Times, serif;text-align:center;">Role Name*</td>
                <td class="td">
                        <input type="text" name="adminContactName" id="admin_contact_name"/>
                        <div>
                           <span id="admin_contact_name_req" class="errMessage">Role Name is required</span>
                        </div>
                </td>
            </tr>
            <tr>
                <td class="td"><button type="button" id="share_login_btn">Save</button></td>	
                <td class="td"><button type="reset">Clear</button></td>
            </tr>		
        </table>
    </form>
</div> 
<table id="table1" style="margin-top:0px;margin-bottom:20px;">
    <thead>  
        <tr>
            <th style=" padding:14px 13px;font-size:14px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;text-align:center;">SL No</th>
            <th style=" padding:14px 13px;font-size:14px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;text-align:center;">Department</th>
            <th style=" padding:14px 13px;font-size:14px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;text-align:center;">User Role</th>
            <th style=" padding:14px 13px;font-size:14px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;text-align:center;"></th>
	</tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        $sql_query=mysqli_query($con,"select a.roleid,a.rolename,b.deprtmt_name from user_role a,department b where a.department=b.deprt_id order by a.rolename asc");
        while($Arr=mysqli_fetch_array($sql_query))
            {
        ?>
        <tr>
            <td style="padding:10px;font-size:13px;font-size:13px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; border: 1px solid grey;"><?php echo $i; ?></td>
            <td style="padding:10px;font-size:13px;font-size:13px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; border: 1px solid grey;"><?php echo $Arr['deprtmt_name']; ?></td>
            <td style="padding:10px;font-size:13px;font-size:13px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; border: 1px solid grey;"><?php echo $Arr['rolename']; ?></td>
            <td style="padding:10px;font-size:13px;font-size:13px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; border: 1px solid grey;"><a href="edit_role.php?id=<?php echo $Arr['roleid'];?>" style="text-decoration:none;">Edit</a></td>
        </tr>
        <?php
        $i++;
            }
        ?>
    </tbody>
</table> 
</body>
</html>
