<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="跟拍游" name="author"/>
	<?php if(empty($PageKeyword) == false): ?><meta content="<?php echo ($PageKeyword["title"]); ?>" name="title"/>
	<meta content="<?php echo ($PageKeyword["keywords"]); ?>" name="keywords"/>
	<meta content="<?php echo ($PageKeyword["description"]); ?>" name="description"/>
	<title><?php echo ($PageKeyword["title"]); ?></title>
	<?php else: ?>
	<title>短信登录-跟拍游</title><?php endif; ?>
	<!-- css Reset -->
	<link rel="stylesheet" href="http://kllife.com/source/Static/home/common/css/cssreset.css">
	<!-- 公共样式 -->
	<link rel="stylesheet" href="http://kllife.com/source/Static/home/common/css/common.css">
	<!-- 私有样式 -->
	<link rel="stylesheet" href="http://kllife.com/source/Static/home/css/login-qinglvpai.css">
	<!-- 公共样式 -->
	<link rel="stylesheet" href="http://kllife.com/source/Static/common/css/common.css">
	<!-- Imported toastr -->
	<script src="http://kllife.com/source/Static/assets/js/toastr/toastr.min.js"></script>		
	<script src="http://kllife.com/source/Static/common/js/functions.js"></script>
	<!--[if lt IE 9]>
		<script>
			(function() {
				if (! 
					/*@cc_on!@*/
				0) return;
				var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video".split(', ');
				var i= e.length;
				while (i--){
					document.createElement(e[i])
				} 
			})() ;
		</script>
    	<script src="http://kllife.com/source/Static/home/common/js/html5shiv.min.js"></script>
    <![endif]-->
    <script>
	
		function browserRedirect() {
			var sUserAgent = navigator.userAgent.toLowerCase();
			var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
			var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
			var bIsMidp = sUserAgent.match(/midp/i) == "midp";
			var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
			var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
			var bIsAndroid = sUserAgent.match(/android/i) == "android";
			var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
			var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
			if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM)
			{
			    var vurl = window.location.href;
			    if (vurl.indexOf('www.') != -1) {
                    vurl = window.location.href.replace(/www./g, '');
                }
                var vhref = vurl.replace(/qinglvpai/g,'qlpphone');
                if (vhref.indexOf('http://') != -1) {
                	vhref = 'http://m.'+vhref.substr(7);
                } else if (vhref.indexOf('https://') != -1) {
                	vhref = 'http://m.'+vhref.substr(8);
                } else {
                	vhref = 'm.'+vhref;
                }
               	window.location.href = vhref;
			}else{
			}
		}
		browserRedirect();
    </script>
	<style>
		#content{height:948px;}
		.login > .go-welcome{width:inherit;}
		.msg-content-login .msg-send-code,.msg > a{background: #ff1c77;}
		.msg > p{color:#ff1c77;}
		.msg-content{top:21%;}
	</style>
</head>
<body>
	<div id="content">
		<!-- 短信登录 -->
		<div class="msg-content">
			<div class="msg">
				<img src="http://kllife.com/source/Static/qinglvpai/images/login/logo.png" alt="logo">
				<h2>登录每刻美</h2>
				<div class="msg-content-title">
					<img src="http://kllife.com/source/Static/home/images/login_img/phone.png" alt="">短信快捷登录
				</div>
				<div class="msg-content-login">
					<input type="number" class="msg-write-phone" maxlength="11" placeholder="请输入你的手机号码">
					<input type="number" class="msg-write-code" maxlength="6" placeholder="请输入动态验证码">
					<input type="button" class="msg-send-code" value="发送动态密码">
				</div>
				<a class="msg-login" href="javascript:;">登录</a>
				<p class="msg-return">返回账号登录>></p>
			</div>
		</div>
	</div>
	
	<!-- 引用jq -->
	<script src="http://kllife.com/source/Static/home/common/js/jquery-1.11.3.min.js"></script>
	
	<script>
		$('.msg-return').click(function(){
			location.href = '<?php echo U("user/login");?>';
		});
		
		function smsLogin() {			
			var sphone = $('.msg-write-phone').val();
			if (checkMobile(sphone) == false) {
				alert('错误的电话号码');
				return false;
			}
			
			var scode = $('.msg-write-code').val();
			if (scode.length != 6) {
				alert('验证码有误');
				return false;
			}
			
			$.post('<?php echo U("user/smslogin");?>', {phone: sphone, code: scode}, function(data){
				if (data.result.errno == 0) {
//					//登录成功后返回之前的页面
					var jumpUrl = document.referrer;
					if( jumpUrl.indexOf('/user/login') != -1 ||
						jumpUrl.indexOf('/user/forgotpassword') != -1 || 
						jumpUrl.indexOf('/user/register') != -1 || 
						jumpUrl.indexOf('/user/smslogin') != -1 ){
						jumpUrl = '<?php echo U("index/welcome");?>';
					}
					location.href = jumpUrl;
				} else {
					alert(data.result.message);
				}
			});
		}
		
		bindKeyUp('.msg-write-phone', smsLogin);
		bindKeyUp('.msg-write-code', smsLogin);;
		$('.msg-login').click(smsLogin);
				
		//发送动态密码
		//获取验证码
		var InterValObj; //timer变量，控制时间
		var count = 600; //间隔函数，1秒执行
		var curCount = 0;//当前剩余秒数
		$(".msg-send-code").click( function(){
			var phone = $('.msg-write-phone').val();
			if (checkMobile(phone) == false) {
				alert('错误的电话号码');
				return false;
			}
			
			alert('短信已经发往'+phone+',请耐心等待');
			if (curCount != 0) {
				return false;
			}
			
		　　  //向后台发送处理数据
			var jsonData = {
				type: 'send',
				tel: phone,
				use: 'qinglvpai_sms_login',
				interval: 600,
				rd: '<?php echo ($pagerd); ?>',		
			}
			var thisObj = this;
			$.post('<?php echo U("common/sms");?>', jsonData, function(data){
				if (data.result.errno == 0) {
					curCount = count;
				　　//设置button效果，开始计时
					$(thisObj).attr("disabled", "true");
					$(thisObj).val(curCount + "秒内输入");
					InterValObj = setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
				} else {
					alert(data.result.message);
				}
			});
		} );
		
		//timer处理函数
		function SetRemainTime() {
			if (curCount == 0) {          
				clearInterval(InterValObj);//停止计时器
				$(".msg-send-code").removeAttr("disabled");//启用按钮
				$(".msg-send-code").val("重新发送");
			}
			else {
				curCount--;
				$(".msg-send-code").attr("disabled", "disabled");
				$(".msg-send-code").val(curCount + "秒内输入");
			}
		}

	</script>
</body>
</html>