<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>L-Connectt</title>
<link href="<?php echo base_url();?>css/tablecss.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>css/rep-style.css" rel="stylesheet" type="text/css"/>
<style>
body{
	margin:auto;
}
#table1 tr{
	width:100%;
	text-align:center;
	}
#table1 tr td{
	text-align:left;
	color:#000;
	width:25%;
	}
.social_link td{
	width:100px;
	text-align:center;
	}

.table_admin input[type="text"]{
	width:95%;
	}
.table_admin input[type="url"],
.table_admin input[type="tel"],
.table_admin input[type="email"],
.table_admin input[type="password"],
.table_admin select,
.table_admin textarea{
	width:100% !important;
	}
.table_admin input[type="button"]{
	margin: 5px 8.33%;
	width: 167px;
	padding:10px;
	float:none;
	background: linear-gradient(#09F, #03F, #09F);
	-moz-background: linear-gradient(#09F, #03F, #09F);
	-webkit-background: linear-gradient(#09F, #03F, #09F);
	-ms-background: linear-gradient(#09F, #03F, #09F);
	}
.table_admin th{
	padding:3px 0px
	}
.table_admin textarea{
	height:90px;
}
.errMessage{
	color:red !important;
	}
.service td{
	text-align:center!important;
	}
	#table1 td{ padding:7px 0;}
</style>
<script src="<?php echo base_url();?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript">  
 function validateEmail(email) {
            var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            var valid = emailReg.test(email);

            if (!valid) {
                return false;
            } else {
                return true;
            }
        }
        function validateMobile(mobile) {
            var mobileReg = new RegExp(/^[1-9]{1}[0-9]{9}$/);
            var valid = mobileReg.test(mobile);
            
            if (!valid) {
                return false;
            } else {
                return true;
            }
        }		
       	$(document).ready(function() {
			
			$(".errMessage").hide();

			
			 /*----------------------------------------------------
			 Email and phone number validation
			 **----------------------------------------------------*/
            $("#share_login_btn").click(function () {
				var shareSuc = 1;
				
                $(".errMessage").hide();
            
				//---------------------admin section
				
				
				
				if ($.trim($("#admin_contact_name").val()) == "")
				 	{
                    	$("#admin_contact_name_req").show();
						shareSuc = 0;
                	}
				
                
					if ($.trim($("#admin_contact_name").val()) != ""){
					shareSuc=1;}
				
				if(shareSuc){
					document.getElementById("admin_client").submit();
					}
					
            });
			

			/*----------------------------------------------------
			Calender
			**----------------------------------------------------*/
								
			$(function() {
				$( "#license_start_date" ).datepicker();
			});
			
			$(function() {
				$( "#license_end_date" ).datepicker();
			}); 
		
			
		});
 </script>
</head>
<body>
<section class="row" style="height:25px;">
    <div class="pageHeader">
            <h2>Department</h2>
    </div>
</section>
    <?php
            if(isset($edit_department) && is_array($edit_department) && count($edit_department)){
                foreach ($edit_department as $key => $data) { 
      ?>
    <form id="admin_client" class="Admin_Client" action="<?php echo site_url('admin_departmentController/update_data/'.$data['deprt_id']); ?>" method="post" name="adminClient">

    <table id="table1" class="table_admin" style="margin:70px auto;width:95%;">
 	
        <tr>
        	<td class="td" style="font-family: Times New Roman, Times, serif;text-align:center;font-size:14px;"><label>Department*</label></td>
            <td class="td">
            	<input type="text" name="departmentName" id="admin_contact_name" value="<?php echo $data['deprtmt_name']; ?>">
            	<div>
                   <span id="admin_contact_name_req" class="errMessage">Department is required</span>
                </div>
            </td>
           
        </tr>	
 </table>
  <center>
	<a href="list_department.php"><input type="button" name="rep_info" id="rep_info" value="Back" style="margin-top:20px; outline:none;"/><a>
   <input type="button" id="share_login_btn" name="editSaveBtn"   value="Save" style="margin-top:20px; outline:none;" />
  </center>
     </form>
<?php
                }
            }
        ?>
</body>
</html>