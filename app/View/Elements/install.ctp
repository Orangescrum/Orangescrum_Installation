<!DOCTYPE html>
	<html>
	<head>
		<meta name="robots" content="noindex,nofollow" />
		<link rel="shortcut icon" href="images/favicon_new.ico"/>
		<title>Orangescrum Setup Wizard</title>
		<style>
		*{
			padding:5;
			margin:5;	
			font-family:Tahoma, Verdana;
		}
		.link:hover {
			text-decoration:underline;
		}
		h4 {
			font-size:14px;
		}
		.email{
			width:300px;
			height:30px;
			border:1px solid #CCC;
			border-radius:5px;
			margin:10px 30px 10px 10px;
			padding-left:15px;
		}
		.verify{background-color: #5cb85c;border: none; border-radius: 5px;color: #fff;cursor: pointer;font-size: 15px;height: 30px;padding: 0 15px;width: auto;}
		.verify:hover{background-color: #449D44}
		.prev {background-color: #337ab7;border: none;border-radius: 5px;color: #fff;cursor: pointer;font-size: 15px;height: 30px;padding: 0 15px;width: auto;}
		.prev:hover{background-color: #668EB0}
		.left-sidebar{float:left;}
		.right-content{float:left;width:400px;margin:0;}
		.sidebar{width: 175px;line-height:25px;}
		.sidebar li{color:#ccc;font-size:14px;}
		.sidebar li.active{list-style-image:url('<?php echo HTTP_ROOT."img/prc_tick.png";?>');color:#000;font-size:14px;}
		.logo_landing{float: left;width: 200px; height:30px;}
		.community{text-align:center;float:left;margin: 12px 0 0 20px;}
		.community h2{color:#245271}
		.progress-bar{width:100%;height:20px;border:1px solid #ccc; border-radius:0px 10px 10px 0px; margin-top:20px;margin-left:-5px;}
		#container{width:750px; margin:0 auto;height:auto;}
		.progress-bar-inner{height:20px; border-radius:0px 10px 10px 0px;float:left;margin:-5px;}
		.progress-bar-txt{float:left;color:#ccc;text-align:center;margin:0px;}
		.wrapper{display: table;margin: 0 auto;min-height: 100%;width: 700px;border:1px solid #ccc; border-radius:5px; box-shadow: 0 5px 12px #333333;}
		table {margin:0; padding:0;}
		</style>
	</head>
	<body>
		<div id="container">
			<div class="wrapper">
			<div style="display:table-cell; height:100%; min-height:100%; vertical-align:middle">
			<div style="position:relative; z-index:9;">
				<div class="logo_landing">
					<a href="<?php echo HTTP_ROOT; ?>">
						<img border="0" title="Orangescrum.com" alt="Orangescrum.com" src="<?php echo HTTP_ROOT; ?>img/images/logo_outer.png?v=1">
					</a>
				</div>
				<div class="community">
					<h2>Community Edition v1.0</h2>
				</div>
				<div style="clear:both;margin:0px; padding:0px;"></div>
				<div class="left-sidebar">
					<ul class="sidebar">
						<li id="conf" class="active">Welcome!</li>
						<li id="conf_1">PHP Configuration</li>
						<li id="conf_2">MYSQL Configuration</li>
						<li id="conf_3">Database Configuration</li>
						<?php
						if(!defined("SUB_FOLDER") || SUB_FOLDER == ''){
							echo '<li id="conf_4">Sub Folder Configuration</li>';
						} ?>
						<li id="conf_5">Smtp Configuration</li>
						<?php if(PHP_OS == "LINUX"){ ?>
							<li id="conf_6">Write Permission Check</li>
						<?php } ?>
					</ul>
				</div>
				<div class="right-content">
					<div id="step_name" class="right-header">
						<h3 style="color:#245271;margin:0px">Welcome!</h3>
						<hr style="background:#ccc;padding:0px;"/>
					</div>
				<table width="100%" align="center">
					<tr>
						<td>
						<table id="form" cellpadding="0" cellspacing="0" style="color:#000000;padding:0px;" align="center" width="400px">
						<tr id="welcome">
							<td colspan="2" style="padding-top:0px">
								<p style="font-family:Raleway;font-size:17px;">OrangeScrum is an open source project management tool. This configuration process is split up into some easy steps. Hit next to start configuration.</p>
							</td>
						</tr>
							<tr id="sub_folder" style="display:none">
								<td colspan="2" style="padding-top:0px">
									<form method="POST">
										<input type="text" id="sub_text" class="email" name="sub_folder" placeholder="sub folder name"/><span style="color:red;display:none;" id="sub_txt_err">This field can not be left blank.</span>
										<button type="button" class="verify" value="Verify" onclick="sub_folder_ajax();">Submit</button>
									</form>
								</td>
							</tr>
							<tr id="smtp" style="display:none;">
								<td colspan="2" style="padding-top:0px">
									<form method="POST">
										<input id="host" type="text" class="email" name="host" placeholder="Smtp Host name"/><span style="color:red;display:none;" id="smtp_host_err">This field can not be left blank.</span>
										<input id="port" type="text" class="email" name="port" placeholder="Smtp Port number"/><span style="color:red;display:none;" id="smtp_port_err">This field can not be left blank.</span>
										<input id="email" type="email" class="email" name="email" placeholder="youremail@gmail.com"/><span style="color:red;display:none;" id="smtp_email_err">This field can not be left blank.</span>
										<input id="password" type="password" placeholder="******" class="email" name="password" /><span style="color:red;display:none;" id="smtp_pwd_err">This field can not be left blank.</span>
										<button type="button" class="verify" value="Verify" onclick="smtp_ajax();">Submit</button>
									</form>
								</td>
							</tr>
						</table>
						<table id="result" cellpadding="0" cellspacing="0" border="1px solid #999999" style="color:#000000;" align="center" width="400px">
						</table></td>
					</tr>
				</table>
				<div id="verify_btn" style="float:left; margin-top:30px;display:none;"></div>
				<div id="prev_btn" style="float:left; margin-top:20px;display:none;">
					<button type='button' class='prev' value='Verify'>Prev </button>
				</div>
				<div id="nxt_btn" style="float:right; margin-top:20px;">
					<button type='button' class='verify' value='Verify' onclick='check(1);'>Next </button>
				</div>
			</div>
			<div style="clear:both;"></div>
			</div>
			<div class="progress-bar">
				<div class="progress-bar-inner"></div>
				<span class="progress-bar-txt"></span>
				<div style="clear:both;"></div>
			</div>
			</div>
			</div>
			</div>
		</div>
	</body>
	</html>
	
<?php

if(defined("SUB_FOLDER") || SUB_FOLDER != ''){ ?>
<script> 
	var folder = '<?php echo SUB_FOLDER; ?>';
</script>
<?php }
?>
<script type="text/javascript" src="<?php echo HTTP_ROOT; ?>js/jquery-1.10.1.min.js"></script>
<script>
$(document).ready(function(){
	/* $.get("install.php?step=1", function(res){
		document.getElementById('result').innerHTML += res;
		$('#conf_1').addClass('active');
		$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='check(2);'>Next </button>");
		$('.progress-bar-inner').css({
			'background':'blue',
			'width':(100/6)+'px'
		});
		var txt = parseInt((100/6));
		$('.progress-bar-txt').html(txt+"% Completed");
	});*/
}); 
function check(step){
	var cmn_width = 0
	if($('ul li').length == 7){
		cmn_width = 100/6;
	}else if($('ul li').length == 6){
		cmn_width = 100/5;
	}else{
		cmn_width = 100/4;
	}
	var step_name = '';
	switch(step){
		case 1:
			step_name = 'PHP Configuration Check';break;
		case 2:
			step_name = 'MYSQL Configuration Check';break;
		case 3:
			step_name = 'Database configuration Check';break;
		case 4:
			step_name = 'Sub folder Configuration Check';break;
		case 5:
			step_name = 'SMTP Configuration Check';break;
		case 6:
			step_name = 'Write Permission Check';break;
		default:
			step_name = 'Welcome!';
	}
	$('#step_name h3').text(step_name);
	if(step != 4 && step != 5){
		$.post('<?php echo HTTP_ROOT."users/step"; ?>',{'step':step}, function(res){
			$('#welcome').hide();
			document.getElementById('result').innerHTML = res;
			$('#conf_'+step).addClass('active');
			if(step == 3 && $('ul li:nth-child(5)').html('Smtp Configuration')){
				$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='check(5);'>Next </button>");
				$('#prev_btn').show();
				$('#prev_btn').html("<button type='button' class='prev' value='previous' onclick='check("+(step-1)+");'>Prev </button>");
			}else if(step == 6){
				if($('#error').val() == 1){
					$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='check(6);'>Try Again </button>");
				}else{
					$('#prev_btn').show();
					$('#prev_btn').html("<button type='button' class='prev' value='previous' onclick='check("+(step-1)+");'>Prev </button>");
					$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='end_check();'>Continue to Orangescrum </button>");
				}
			}else{
				if($('#error').val() == 1){
					$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='check("+step+");'>Try Again </button>");
				}else{
					$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='check("+(step+1)+");'>Next </button>");
				}
				if(step != 1){
					$('#prev_btn').show();
					$('#prev_btn').html("<button type='button' class='prev' value='previous' onclick='check("+(step-1)+");'>Prev </button>");
				}
			}
			$('#step_'+(step-1)).hide();
			if(step != 6 && ($('#error').val() != 1)){
				$('.progress-bar-inner').css({
					'background':'blue',
					'width':(cmn_width*step)+'%'
				});
				var txt = parseInt(cmn_width*step);
				$('.progress-bar-txt').html(txt+"% Completed");
			}else{
				if($('#error').val() != 1){
					$('.progress-bar-inner').css({
						'background':'blue',
						'width':'100%'
					});
					$('.progress-bar-txt').html("");
				}
			}
			});
	}else if(step == 4){
		$('#result').hide();
		$('#nxt_btn').hide();
		$('#prev_btn').hide();
		$('#form').show();
		$('#sub_folder').show();
	}else if(step == 5){
		$('#step_3').hide();
		$('#nxt_btn').hide();
		$('#prev_btn').hide();
		$('#result').hide();
		$('#form').show();
		$('#smtp').show();
	}
}
function sub_folder_ajax(){
	var cmn_width = 0
	if($('ul li').length == 7){
		cmn_width = 100/6;
	}else if($('ul li').length == 6){
		cmn_width = 100/5;
	}else{
		cmn_width = 100/4;
	}
	var sub = $('#sub_text').val();
	if(sub == ''){
		$('#sub_txt_err').show();
		return false;
	}else{
		$.post('<?php echo HTTP_ROOT."users/step"; ?>',{'step':4,'sub_name':sub}, function(res){
			document.getElementById('result').innerHTML = res;
			$('#nxt_btn').show();
			$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='check(5);'>Next </button>");
			$('#prev_btn').show();
			$('#prev_btn').html("<button type='button' class='prev' value='previous' onclick='check(3);'>Prev </button>");
			$('#conf_4').addClass('active');	
			$('.progress-bar-inner').css({
				'background':'blue',
				'width':(cmn_width*5)+'%'
			});
			var txt = parseInt(cmn_width*5);
			$('.progress-bar-txt').html(txt+"% Completed");			
		});
	}
}

function smtp_ajax(){
	var cmn_width = 0
	if($('ul li').length == 7){
		cmn_width = 100/6;
	}else if($('ul li').length == 6){
		cmn_width = 100/5;
	}else{
		cmn_width = 100/4;
	}
	var host = $('#host').val();
	var port = $('#port').val();
	var email = $('#email').val();
	var pwd = $('#password').val();
	if(host == ''){
		$('#smtp_host_err').show();
		return false;
	}else if(port == ''){
		$('#smtp_port_err').show();
		return false;
	}else if(email == ''){
		$('#smtp_email_err').show();
		return false;
	}else if(pwd == ''){
		$('#smtp_pwd_err').show();
		return false;
	}else{
		$.post('<?php echo HTTP_ROOT."users/step"; ?>', {'step':5,'host':host, 'port':port, 'email':email, 'pwd':pwd}, function(res){
			$('#conf_5').addClass('active');
			document.getElementById('result').innerHTML = res;
			$('#nxt_btn').show();
			$('#verify_btn').show();
			$('#verify_btn').html("<a class='verify' style='padding:6px;' target='_blank' href='<?php echo HTTP_ROOT; ?>cron/test_email/?to="+email+"' >Verify Email </a>");
			if($('ul li:nth-child(6)').html() == "Write Permission Check"){
				$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='check(6);'>Next </button>");
			}else{ 
				$('#nxt_btn').html("<button type='button' class='verify' value='Verify' onclick='end_check();'>Continue to Orangescrum </button>");
			}
			if($('ul li:nth-child(5)').html() == "Smtp Configuration"){
				$('#prev_btn').show();
				$('#prev_btn').html("<button type='button' class='prev' value='previous' onclick='check(3);'>Prev </button>");
			}else{
				$('#prev_btn').show();
				$('#prev_btn').html("<button type='button' class='prev' value='previous' onclick='check(4);'>Prev </button>");
			}
			$('#step_4').hide();
			$('#result').show();
			$('#form').hide();
			$('#smtp').hide();
			$('.progress-bar-inner').css({
				'background':'blue',
				'width':(cmn_width*4)+'%'
			});
			var txt = parseInt(cmn_width*4);
			$('.progress-bar-txt').html(txt+"% Completed");
		});
	}
}

function end_check(){
	window.location = '<?php echo HTTP_ROOT; ?>';
}
</script>