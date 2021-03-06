<?php if (!defined('THINK_PATH')) exit();?>	<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php if(empty($PageKeyword) == false): ?><meta content="<?php echo ($PageKeyword["title"]); ?>" name="title"/>
	<meta content="<?php echo ($PageKeyword["keywords"]); ?>" name="keywords"/>
	<meta content="<?php echo ($PageKeyword["description"]); ?>" name="description"/>
	<title><?php echo ($PageKeyword["title"]); ?></title>
	<?php else: ?>
	<title><?php echo C('PAGE_TITLE');?></title><?php endif; ?>    
	<!-- 引用jq -->
	<script src="http://kllife.com/source/Static/home/common/js/jquery-1.11.3.min.js"></script>	
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
				var vhref = window.location.href.replace(/xinlvpai/g,'m.xinlvpai').replace(/qinglvpai/g,'qlpphone');
				window.location.href = vhref;
			}else{
				
			}
		}
		browserRedirect();	
	</script>
	
	<link rel="stylesheet" href="http://kllife.com/source/Static/qinglvpai/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://kllife.com/source/Static/qinglvpai/css/animate.css">
	<link rel="stylesheet" href="http://kllife.com/source/Static/qinglvpai/css/style/style.css">
	<link rel="stylesheet" href="http://kllife.com/source/Static/qinglvpai/css/style.css">
	<link rel="stylesheet" href="http://kllife.com/source/Static/qinglvpai/css/iconfont.css">
	<!-- css Reset -->
	<link rel="stylesheet" href="http://kllife.com/source/Static/home/common/css/cssreset.css">
	<!-- 公共样式 -->
	<link rel="stylesheet" href="http://kllife.com/source/Static/home/common/css/common.css">
	<!-- 公共样式 -->
	<link rel="stylesheet" href="http://kllife.com/source/Static/common/css/common.css">
    <style>
        .top-ask{position: fixed;right:50px;bottom:100px;display: none;z-index:1000;}
        .top-ask div{margin:2px 0px;cursor: pointer;}
        .top-ask div img{width:50px;height:50px;}
    </style>
</head>
<body>
<!--header-->
<div class="header">
    <?php if(C('MENU_CURRENT') === 'index_welcome'): ?><a href="<?php echo U('index/story');?>" target="_blank"><div class="banner" style="background-image: url(<?php echo ($set["banner"]); ?>);"></div></a>
   	<?php elseif(C('MENU_CURRENT') === 'line_list'): ?>
        <div class="banner" style="background-image: url(<?php echo ($set["content_banner"]); ?>);"></div>
    <?php elseif(C('MENU_CURRENT') === 'line_content'): ?>
        <div class="banner-content" style="background-image: url(<?php echo ($set["qinglvpai_content_banner"]); ?>);"></div>
   	<?php elseif(C('MENU_CURRENT') === 'line_main_list'): ?>
        <div class="banner" style="background-image: url(<?php echo ($set["xiaomantuan_banner"]); ?>);"></div>
    <?php elseif(C('MENU_CURRENT') === 'line_main_content'): ?>
        <div class="banner-content" style="background-image: url(<?php echo ($set["xiaomantuan_content_banner"]); ?>);"></div>
    <?php elseif(C('MENU_CURRENT') === 'book_line' or C('MENU_CURRENT') === 'line_pay_result' or C('MENU_CURRENT') === 'index_story' or stripos(C('MENU_CURRENT'),'leader_list') !== FALSE): ?>
    <?php else: ?>
        <div class="banner-content" style="background-image: url(<?php echo ($set["qinglvpai_content_banner"]); ?>);"></div><?php endif; ?>
    <div class="div-two">
        <div class="list">
            <a href="<?php echo U('Index/welcome');?>" target="_blank"><img class="logo-white" src="http://kllife.com/source/Static/qinglvpai/images/index/logo-qinglvpai.png" alt=""></a>
            <ul>
                <a class="active" href="<?php echo U('index/welcome');?>" target="_blank">首页</a>
                <a href="<?php echo U('index/story');?>" target="_blank">品牌故事</a>
                <a href="<?php echo U('line/list');?>" target="_blank">写真旅行</a>
                <a href="<?php echo U('line/slowly');?>" target="_blank">小团慢旅行</a>
                <a href="<?php echo U('article/list');?>" target="_blank">写真作品</a>
                <!--<a href="javascript:;">客户回顾</a>-->
            </ul>
            <div class="tel">
                <img src="http://kllife.com/source/Static/qinglvpai/images/index/tel-img.png" alt="">
                <img src="http://kllife.com/source/Static/qinglvpai/images/index/tel-number.png" alt="">
                <!--<em><?php echo ($pcset["askfor_tel"]); ?></em>-->
            </div>
            <div class="tel login" style="line-height:80px;color:#fff;font-size: 14px;width:170px;text-align: center;text-align: -webkit-center">
				<?php if(empty($user) == true): ?><a href="<?php echo U('user/login');?>" target="_blank">登录</a> |
					<a href="<?php echo U('user/register');?>" target="_blank">注册</a>
				<?php else: ?>
					<a href="<?php echo U('line/order');?>/type/center" target="_blank">我的订单</a> |
					<a href="<?php echo U('user/exit');?>" target="_blank">退出</a><?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!--返回顶部，咨询-->
<div class="top-ask">
    <div onclick="openZoosUrl('chatwin');"><img src="http://kllife.com/source/Static/qinglvpai/common/images/ask1.jpg" alt=""></div>
    <div class="return-top"><img src="http://kllife.com/source/Static/qinglvpai/common/images/return-top.jpg" alt=""></div>
</div>
<script type="text/javascript">	
	// 导航划过变色
	$('.list ul a').mouseenter(function(){
		$(this).toggleClass('active');
	});
	$('.list ul a').mouseleave(function(){
		$(this).toggleClass('active');
	});

	// 登录我的订单点击选中
    $(".login a").on("click",function(){
        $(this).addClass("active").siblings("a").removeClass("active");
    })
    
    //屏幕滚动显示一键返回顶部按钮
    $(window).scroll( function (){
        if ($(this).scrollTop() > 150) {
            $('.top-ask').fadeIn();
        }else{
            $('.top-ask').fadeOut();
        };
    });

    //点击返回顶部
    $(".return-top").click(
        function(){
            $("html,body").animate({scrollTop: 0}, 1000);
        }
    );

</script>
    <!--选片样式-->
    <link rel="stylesheet" href="http://kllife.com/source/Static/photo/style/public.css">
    <link rel="stylesheet" href="http://kllife.com/source/Static/photo/style/product-selection.css">
	
	<!--私有样式-->
	<link rel="stylesheet" href="http://kllife.com/source/Static/photo/style/fine-selection.css">
    <style>
        .check .img{height:95%;overflow-y:scroll;padding:20px;}
        .choicese .img{height:80%;overflow-y:scroll;padding:20px;}
        .check .img span,.choicese .img span{
            display: inline-block;
            width:32%;
            height:215px;
            border:2px solid #eee;
            margin:5px;
            cursor: pointer;
        }
        .check .img span img,.choicese .img span img{height:100%;width:auto;display: block;margin:auto;}
        .form-group label{width:100px;font-size: 14px;font-weight: 100;text-align: right;text-align: -webkit-right}
        .col-xs-6{margin:20px 0px;}
        .col-xs-6 .form-group input{width:200px;border-radius: 0px;}
        .col-xs-12 .form-group input{width:753px;border-radius: 0px;}
    </style>
<div class="index" style="background: #f3f4f6;">
    <div class="tit">
        <h1 class="h1"><?php echo ($lineInfo["lineTitle"]); ?></h1>
        <p><span class="h2">团期：<?php echo ($lineInfo["hd"]); ?></span><span class="h2">/</span></p>
        <input type="hidden" id="lineid" value="<?php echo ($lineInfo["lineid"]); ?>" />
        <input type="hidden" id="hdid" value="<?php echo ($lineInfo["hdid"]); ?>" />
        <a href="<?php echo U('line/order');?>/type/center" class="btn btn-orange-one" window.open(>个人中心</a>
        <a href="javascript:;" class="btn btn-orange-two" id="next" style="position: absolute;right:100px;">下一步</a>
        <a href="javascript:;" class="btn btn-gray" style="position: absolute;right:240px;">
            已选照片
            <span id="number" style="position: absolute;top:0px;right:0px;background: #333;color:#fff;width:20px;height:20px;border-radius: 50%;padding-top:1px;font-size: 14px;"></span>
        </a>
    </div>
    <div class="index-centent index-centent1">
        <div class="index-selection">
            <div class="selection">
                <h2 class="h2 padding-top">精修选择</h2>
            </div>
        </div>
        
        <a href="javascript:;" class="photo-item template_ablum" style="display: none;">
            <div class="width">
                <i class="iconfont">&#xe800;</i>
                <div class="none" ></div>
            </div>
        </a>  
        
        <div class="selection-img">
            <?php if(is_array($photoList)): $i = 0; $__LIST__ = $photoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><a href="javascript:;" class="photo-item">
                <div class="width" style="background-image: url(<?php echo ($photo["path"]); ?>);" id="<?php echo ($photo["id"]); ?>" data-img="<?php echo ($photo["path"]); ?>">
                    <i class="iconfont">&#xe800;</i>
                    <div class="none" style="background-image: url(<?php echo ($photo["path"]); ?>);"></div>
                </div>
            </a><?php endforeach; endif; else: echo "" ;endif; ?>	
            
        </div>
        <div class="page"></div>
    </div>

    <!--产品选择-->
    <div class="index-centent index-centent2" style="display: none;">
        <div class="index-selection">
            <div class="selection">
                <h2 class="h2 padding-top">产品选择</h2>
            </div>
        </div>
        <div class="detail">
            <div class="item" id="product_list_0">
                <div class="item-tit">
                    <span class="h2 mouseover" data-id="<?php echo ($jx["id"]); ?>">精修</span>
                    <span class="h2"><span class="sm">(赠送<span id="jx-maxlenght"><?php echo (C("PHOTO_JX_MAXLENGHT")); ?></span>张 已选<span class="numberone">0</span>)</span></span>
                    <span class="h2 down">
                        <span class="sm priceone">¥ <span class="lg price-money">0</span></span>
                        <i class="iconfont down-up rotate">&#xe776;</i>
                    </span>
                    <div class="spec-show">
                        <img style="width:100%;" src="<?php echo ($jx["img"]); ?>" alt="">
                        <span>长:<?php echo ($jx["length"]); ?>cm x 宽:<?php echo ($jx["width"]); ?>cm x 高:<?php echo ($jx["thickness"]); ?>cm</span>
                        <p>描述：<?php echo ($jx["body"]); ?></p>
                        <div class="div1"><!--此div用于三角--></div>
                        <div class="div2"><!--此div用于三角--></div>
                    </div>
                </div>
                <div class="item-detail fine">
                    <div class="div">
                        <a href="javascript:;" class="btn"><img src="http://kllife.com/source/Static/photo/img/product-selection/choice.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            
            <?php if(is_array($giftList)): $k = 0; $__LIST__ = $giftList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gift): $mod = ($k % 2 );++$k;?><div class="item" id="product_list_<?php echo ($k); ?>">
	                <div class="item-tit">
	                    <span class="h2 mouseover" data-id="<?php echo ($gift["id"]); ?>"><?php echo ($gift["productname"]); ?></span>
	                    <span class="h2"><span class="sm">(可选<span class="minphotonum"><?php echo ($gift["minphotonum"]); ?></span>~<span class="maxphotonum"><?php echo ($gift["maxphotonum"]); ?></span> 已选<span class="numbertwo">0</span>)</span></span>
	                    <span class="h2 down">
	                        <span class="sm pricetwo">¥ <span class="lg price-money">0</span></span>
	                        <i class="iconfont down-up">&#xe776;</i>
	                    </span>
	                    <div class="spec-show">
	                        <img style="width:100%;" src="<?php echo ($gift["img"]); ?>" alt="">
	                        <span>长:<?php echo ($gift["length"]); ?>cm x 宽:<?php echo ($gift["width"]); ?>cm x 高:<?php echo ($gift["thickness"]); ?>cm</span>
	                        <p>描述：<?php echo ($gift["body"]); ?></p>
	                        <div class="div1"><!--此div用于三角--></div>
	                        <div class="div2"><!--此div用于三角--></div>
	                    </div>
	                </div>
	                <div class="item-detail" style="display: none">
	                    <div class="div addimg div-remove"><div style="border-color:#f5f5f5;"><img style="width:100%;" src="http://kllife.com/source/Static/photo/img/product-selection/addimg.jpg" alt=""></div></div>
	                </div>
	            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            
            <div id="big">增加产品</div>
            <div class="row price-paner" style="margin:20px 5px;padding-bottom:20px;background: #f5f5f5;">
                <div style="border-bottom:1px solid #ddd;height:50px;line-height:50px;padding:0px 39px;font-size:20px;">邮寄地址</div>
                <div class="col-xs-6">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="addressee-name">收件人：</label>
                            <input type="text" class="form-control" id="addressee-name" placeholder="请输入真实姓名">
                            <span style="color:red;display: none;">  * 姓名不能为空，请输入姓名</span>
                        </div>
                    </form>
                </div>
                <div class="col-xs-6">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="addressee-tel">电话：</label>
                            <input type="text" class="form-control" id="addressee-tel" placeholder="请输入手机号码">
                            <span style="color:red;display:none;">  * 电话号码格式不正确，请输入电话号码</span>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="addressee-address">收件地址：</label>
                            <input type="text" class="form-control" id="addressee-address" placeholder="请输入收件地址">
                            <span style="color:red;display: none;">  * 地址不能为空，请输入地址</span>
                        </div>
                    </form>
                </div>
            </div>
            <p class="price">精修：  <?php echo (C("PHOTO_JX_MAXLENGHT")); ?> * 0 （赠送）<span class="sm-none">+ <span class="jingxiu">0</span> * <span id="jx-unit-price"><?php echo (C("PHOTO_JX_UNIT_PRICE")); ?></span></span> </p>
            <p class="price give">赠送产品：  1 * 0 </p>
            <p class="price price-border">订单金额：  <span class="total">0</span>元</p>
            <div class="cope">应付金额：<span class="sm">¥</span><span class="lg total">0</span></div>
            <div class="pay"><a href="javascript:;" class="btn btn-orange-four" id="submit">提交订单</a></div>
        </div>
    </div>


    <!--遮罩层-->
    <div class="check" style="position:fixed;top:0px;left:0px;width:100%;height:100%;background:rgba(0,0,0,.5);z-index:1001;display: none">
        <div style="width:1200px;height:100%;margin:auto;background: #fff">
            <div style="font-size: 18px;padding:20px;height:5%;border-bottom:1px solid #eee;padding-bottom:40px;">已选照片 <i class="iconfont" style="float:right;font-size: 20px;cursor: pointer" id="remove">&#xe66c;</i></div>
            <div class="img">
            </div>
        </div>
    </div>
    <!--选择已选照片-->
    <div class="choicese" style="position:fixed;top:0px;left:0px;width:100%;height:100%;background:rgba(0,0,0,.5);z-index:1001;display: none">
        <div style="width:1200px;height:100%;margin:auto;background: #fff">
            <div style="font-size: 18px;padding:20px;height:5%;border-bottom:1px solid #eee;padding-bottom:40px;">已选照片 <i class="iconfont" style="float:right;font-size: 20px;cursor: pointer" id="remove1">&#xe66c;</i></div>
            <div class="img">
            </div>
            <div style="padding:50px 20px;text-align: right;"><a href="javascript:;" class="btn btn-orange-two btn-orange-two-queding" id="sure-two" disabled>确定</a></div>
        </div>
    </div>
    <!--弹出层-->
    <div class="popup">
        <div class="select-line">
            <div class="select-tit">选择产品 <i class="iconfont">&#xe66c;</i></div>
            <div class="content-width">
                <?php if(is_array($proList)): $i = 0; $__LIST__ = $proList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><span data-id="<?php echo ($pro["id"]); ?>"><?php echo ($pro["productname"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="select-one select-twp">
                <div class="left"></div>
                <div class="right">
                    <a href="javascript:;" class="btn btn-orange-five sure">确定</a>
                    <a href="javascript:;" class="btn btn-gray-two cancel">取消</a>
                </div>
            </div>
        </div>
    </div>
    <style>
	.footer-bottom-content span{margin-right:0px;}
</style>
	<footer>
		<!--<?php echo p_a($question_type);?>-->
		<div class="footer-content">
			<div class="footer-content-left">
				<?php if(is_array($question_type)): $i = 0; $__LIST__ = $question_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$qt): $mod = ($i % 2 );++$i; if ($key === 'config_update_time') { continue; } ?>
					<ul class="<?php echo ($qt["class"]); ?>">
						<li><?php echo ($qt["type_desc"]); ?></li>
						<?php if(is_array($qt["questions"])): $i = 0; $__LIST__ = $qt["questions"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$quest): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo U('service/question');?>/id/<?php echo ($quest["id"]); ?>"><?php echo ($quest["content"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="footer-content-right">
				<img src="http://kllife.com/source/Static/qinglvpai/common/images/footer_erweima.png" alt="">
			</div>
		</div>
	</footer>
	<div class="footer-bottom">
		<div class="footer-bottom-content">
			<!--<p>
				友情链接：
				<?php if(is_array($pcset)): $i = 0; $__LIST__ = $pcset;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$set_val): $mod = ($i % 2 );++$i; if(stripos($key, 'pc_friend_link') === 0): if(!empty($fk)): ?>&nbsp;|&nbsp;<?php endif; ?>
						<?php $fk = json_decode($set_val, true); ?>
						<a href="<?php echo ($fk["url"]); ?>" target="_blank"><?php echo ($fk["text"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</p>-->
			<span style="margin-top: 20px;">Copyright  2017 <a href="http://www.kllife.com/qinglvpai" target="_blank" style="color:#fff;">xinlvpai.com</a> | 杭州浪客旅行社有限公司版权所有</span>
			<br>
			<span>旅行社经营许可证号：ZJ30301 浙ICP备17010959号
			<span>
				<!--商务通代码--> 
				<script language="javascript" src="http://pqt.zoosnet.net/JS/LsJS.aspx?siteid=PQT43116159&float=1&lng=cn"></script>
				<script language="javascript" type="text/javascript" src="http://kllife.com/swt_xlp/js/swt.js"></script>
				<!--CNZZ统计--> 
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261595265'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1261595265%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
				<!--百度统计-->
				<script>
					var _hmt = _hmt || [];
					(function() {
						var hm = document.createElement("script");
						hm.src = "https://hm.baidu.com/hm.js?5b19bad2c5e7328683965e7447d46f4c";
						var s = document.getElementsByTagName("script")[0]; 
						s.parentNode.insertBefore(hm, s);
					})();
				</script>
			</span>
		</div>
	</div>
	
	<!-- Imported toastr -->
	<script src="http://kllife.com/source/Static/assets/js/toastr/toastr.min.js"></script>
	<script src="http://kllife.com/source/Static/common/js/functions.js"></script>
	
	
</body>
</html>
    <script src="http://kllife.com/source/Static/home/js/page.js"></script>
	<script>
        //头部点击选中状态
        $(".header ul a").on("click",function(){
            $(this).addClass("active").siblings("a").removeClass("active");
        })
        //判断最右边一个的放大图显示到左边
        $(".selection-img a").each(function(){
            var index = $(this).index()+1;
            if(index==3 || index % 3 == 0){
                $(this).find(".width .none").css("left","-605px")
            }else{
                $(this).find(".width .none").css("left","353px")
            }
        })
        //鼠标滑过显示大图
        $(".photo-item .width").on("mouseenter",function() {
            $(".selection-img a").each(function(){
                var index = $(this).index()+1;
                if(index==3 || index % 3 == 0){
                    $(this).find(".width .none").css("left","-605px")
                }else{
                    $(this).find(".width .none").css("left","353px")
                }
            })
            $(this).find(".none").show();
        })
        $(".photo-item .width").on("mouseleave",function() {
            $(this).find(".none").hide();
        })
        $(".photo-item .width .none").on("mouseenter",function() {
            $(this).hide();
        })

		//照片列表
	    var checkList = [];
	    var photoList = [[[],[]],[[],[]]];

	    //分页
		constructionPage('.page', 1, '<?php echo ($page_count); ?>',  _ajaxPhotoList, true);
		
		function _ajaxPhotoList(p, postJson=''){
			if(postJson == ''){
				var jsonData = {
					page: p - 1,
					cdsstr:'lineid|=|'+$('#lineid').val()+'|AND|hdid|=|'+$('#hdid').val()+'|AND|',
				}	
			}else{
				var jsonData = postJson;
			}
			$.post('<?php echo U("photo/photoList");?>',jsonData,function(data){
				var divObj = $('.selection-img');
				divObj.empty();
				if(data.ds != null){					
					for(var i=0; i < data.ds.length; i++){
						var d = data.ds[i];
						var itemObj = $('.template_ablum').clone(true);
						$(itemObj).removeClass('template_ablum');
						$(itemObj).css('display', 'block');
						$(itemObj).find('.width').css('background-image', 'url('+d.path+')');
						$(itemObj).find('.width').attr('id',d.id);
                        $(itemObj).find('.width').attr('data-img',d.path);
						$(itemObj).find('.none').css('background-image', 'url('+d.path+')');
						if(checkList.length >=1){
							for(j=0; j<checkList.length; j++){
								if(checkList[j] == d.id){
									$(itemObj).find('.width').addClass('select_box');
									$(itemObj).find("i").toggle();
								}
							}
						}
						divObj.append(itemObj);
					}
					newPageCount = data.page_count;
					constructionPage('.page', p, data.page_count,  _ajaxPhotoList, false);	
				}else{
					var vhtml = '<center>'+data.result.message+'</center>';
					divObj.html(vhtml);
				}
				
				//重构分页
				var pageObj = $('.page');
				var force = $(pageObj).html() == '' ? true : false;
				constructionPage(pageObj, p, data.page_count, _ajaxPhotoList, force);
				
			});
		}
		

	    //点击选中图片
	    $(".photo-item div").on("click",function(){
	    	if($(this).hasClass('select_box') == true){   		
	    		for(j=0; j<checkList.length; j++){
					if(checkList[j][0] == $(this).attr('id')){
						checkList.splice(j,1);
					}
				}	    		
	    		$(this).removeClass('select_box');
	    	}else{
	    	    var v = [];
	    	    v[0] = $(this).attr('id');
	    	    v[1] = $(this).attr('data-img');
                checkList[checkList.length] = v;
	    		$(this).addClass('select_box');
	    	}

	    	//获取选中个的个数并显示在按钮上方
	        $(this).find("i").toggle();
            //初始化btn样式
            BtnStyle();

	    })


	    //已选照片追加到弹出框显示
	    $('.btn-gray').click(function(){
            $(".check").find(".img").empty();
	        if(checkList.length >= 1){
                for(var i=0;i<checkList.length;i++){
                    var span = "<span style='position: relative;' id=" +checkList[i][0]+ "><img src=" +checkList[i][1]+ "><i class='iconfont i' style='position: absolute;top:0px;right:0px;cursor: pointer;font-size:20px;'>&#xe65f;</i></span>"
                    $(".check").find(".img").append(span);
                }
                $(".check").show();
            }
	    });

        //关闭弹出框
        $("#remove").on("click",function(){
            $(".check").hide();
        })
        $("#remove1").on("click",function(){
            $(".choicese").hide();
        })

        //初始化btn样式,封装函数方便别处调用
        function BtnStyle(){
            if(checkList.length >= 1){
                $('.btn-gray').removeClass('disabled');
                $('.btn-orange-two').removeClass('disabled');
                $("#number").html(checkList.length);
                $('#number').show();
            }else{
                $('.btn-gray').addClass('disabled');
                $('.btn-orange-two').addClass('disabled');
                $('#number').hide();
            }
        }
        BtnStyle();

        $("body").on("click",".img span .i",function(){
            $(this).parent("span").hide();
            var id = $(this).parent("span").attr("id");

            if($('#'+id)){
                $('#'+id).removeClass("select_box");
                $('#'+id).find("i").hide();
        }
            for(j=0; j<checkList.length; j++){
                if(checkList[j][0] == id){
                    checkList.splice(j,1);
                }
            }
            //初始化btn样式
            BtnStyle();

        })
        
        $('.btn-orange-two').click(function(){
        	if(checkList.length<1){
        		return false;
        	}
        	
        	var idlist = '';
        	for(i=0; i<checkList.length; i++) {
        		idlist += checkList[i][0]+',';
        	}        	
        	idlist = idlist.substring(0,idlist.length-1)
        	
        	
        	
        });


        //显示与隐藏订单价格详情
        $("body").on("click",".item .item-tit",function(){
            if($(this).next().is(':hidden')){
                $(this).next().slideDown();
                $(this).find(".down .down-up").addClass("rotate").removeClass("rotate1");
            }else{
                $(this).next().slideUp();
                $(this).find(".down .down-up").removeClass("rotate").addClass("rotate1")
            }
        })

        //删除单项
        $("body").on("click",".remove-item",function(){
            var indextwo = $(this).parents(".item").index();
            $(this).parents(".item").find("div").remove();
            photoList[indextwo]="";
            var totalMoney = 0.00;
            $('.sm').find('.price-money').each(function(i,el){
                totalMoney += parseFloat($(this).html());
            });
            $(".total").html(totalMoney.toFixed(2));
            var html = $(this).parents(".down").siblings(".mouseover").html();

            //删除产品列表式对应调整下面的产品数量
            var name = new Array();
            var nametwo = new Array();
            $(".price-two").each(function(){
                var d = [];
                d[0] = $(this).attr("id");
                d[1] = $(this).find(".product-name").html();
                name.push(d);
                nametwo.push(d[1]);
            });
            var indexof = nametwo.indexOf(html);
            if(indexof != -1){
                for(var i=0;i<name.length;i++){
                    if(name[i][1]==html){
                        var a = $("[id='"+name[i][0]+"']").find(".addnumber").html();
                        a--;
                        if(a==0){
                            $("[id='"+name[i][0]+"']").remove();
                        }
                        $("[id='"+name[i][0]+"']").find(".addnumber").html(a);
                        break;
                    }
                }
            }
        })
        //删除赠送产品时删除下方的产品数量
        $(".remove-item").on("click",function(){
            $(".give").remove();
        })

        //显示与隐藏选择线路遮罩层
        $("#big").on("click",function(){
            photoList.push([[],[]]);
            $(".popup").show();
        })
        $(".select-tit i , .cancel").on("click",function(){
            $(".popup").hide();
        })
        //选择增加产品类型
        $(".content-width span").on("click",function(){
            $(this).addClass("active").siblings("span").removeClass("active");
        })
        //增加产品标签
        var indexid
        indexid=1;
        var id;
        id=0;
        $(".sure").on("click",function(){
            indexid++;
            var itemId = 'product_list_'+indexid;
            if($(".content-width span").hasClass("active")){
                var html = $(".content-width .active").html();//产品名称
                var productId = $(".content-width .active").attr("data-id");//产品id
                if(productId != ''){
                	var jsonData = {
						'op_type': 'order_list',
						'data': {
					    	'cdsstr' : 'id|=|'+productId+'|AND',
					   	},
						
					};					
				    $.post('<?php echo U("photo/product");?>',jsonData,
				    function(backData){
				    	if(backData['result']['errno']==0){
				            var d = backData['ds'][0];				            
				            var pig = '<div class="item item-remove" id='+itemId +'>'+
				                    '<div class="item-tit">'+
				                        '<span class="h2 mouseover" data-id="' + d.id + '">'+ d.productname +'</span>'+
				                        '<span class="h2"><span class="sm">(可选<span class="minphotonum">'+ d.minphotonum +'</span>~<span class="maxphotonum">'+ d.maxphotonum +'</span> 已选<span class="numbertwo">0</span>)</span></span>'+
				                        '<span class="h2 down">'+
				                        '<span class="sm pricetwo">¥ <span class="lg price-money">'+ d.price +'</span></span>'+
				                        '<i class="iconfont down-up">&#xe776;</i>'+
				                        '<i class="iconfont remove-item" style="position: absolute;top:-22px;right:-5px;font-size:30px;">&#xe65f;</i>'+
				                        '</span>'+
				                        '<div class="spec-show">'+
				                        '<img style="width:100%;" src="'+ d.img +'" alt="">'+
				                        '<span>长 x '+ d.length +'cm 宽 x '+ d.width +' cm 高 x '+ d.thickness +'cm</span>'+
				                        '<p>描述：'+ d.body +'</p>'+
				                        '<div class="div1"><!--此div用于三角--></div>'+
				                        '<div class="div2"><!--此div用于三角--></div>'+
				                        '</div>'+
				                    '</div>'+
				                    '<div class="item-detail" style="display: none">'+
				                        '<div class="div addimg div-remove"><div style="border-color:#f5f5f5;"><img style="width:100%;" src="http://kllife.com/source/Static/photo/img/product-selection/addimg.jpg" alt=""></div></div>'+
				                        '</div>'+
				                    '</div>';
				                $("#big").before(pig);
				                $(".content-width span").removeClass("active");
				                $(".popup").hide();				            
				    	}
                        var totalMoney = 0.00;
                        var money;
                        $('.sm').find('.price-money').each(function(i,el){
                            money = $(this).html();
                            totalMoney += parseFloat($(this).html());
                        });
                        $(".total").html(totalMoney.toFixed(2));

                        //追加产品名称和价格
                        var name = new Array();
                        var nametwo = new Array();
                        var indexof;
                        $(".price-two").each(function(){
                            var d = [];
                            d[0] = $(this).attr("id");
                            d[1] = $(this).find(".product-name").html();
                            name.push(d);
                            nametwo.push(d[1]);
                        });
                        indexof = nametwo.indexOf(html);
                        if(indexof > -1){
                            for(var i=0;i<name.length;i++){
                                if(name[i][1]==html){
                                    var a = $("[id='"+name[i][0]+"']").find(".addnumber").html();
                                    a++;
                                    $("[id='"+name[i][0]+"']").find(".addnumber").html(a);
                                    break;
                                }
                            }
                        }else{
                            id++;
                            $(".price-border").before('<p class="price price-two" id="'+id+'"><span class="product-name"></span>：  <span class="addnumber">1</span> * '+money+' </p>');
                            $(".product-name:last").html(html);
                        }
				    });
                }


            }else{
                alert("请选择增加产品！")
            }


        })

        //下一步
        var priceone;
        $("#next").on("click",function(){
            if($(this).html()=="下一步"){
                $(".index-centent1").hide();
                $(".index-centent2").show();
                $(this).siblings(".btn").hide();
                $(".fine").empty();
                $(".fine").append('<div class="div"><a href="javascript:;" class="btn"><img src="http://kllife.com/source/Static/photo/img/product-selection/choice.jpg" alt=""></a></div>')

                photoList[0][0]=$(".index-centent2 .detail .item .mouseover").attr("data-id");
                photoList[0][1]=checkList;

                if(photoList[0][1].length >= 1){
                    for(var i=0;i<photoList[0][1].length;i++){
                        var div = "<div class='div div-mouseout' id=" +photoList[0][1][i][0]+ ">" +
                                    "<div class='div1'><img src=" +photoList[0][1][i][1]+ " alt=''></div>" +
                                    "<div class='div2'><img src=" +photoList[0][1][i][1]+ " alt=''></div>" +
                                  "</div>"
                        $(".fine").prepend(div);
                    }
                    $(".fine").show();
                }
                $(this).html("上一步");
                
                var maxJxLenght = $("#jx-maxlenght").html(); //赠送精修数
                var jxUnitPrice = $("#jx-unit-price").html(); //单张精修价
                var numberone = photoList[0][1].length; //选择精修照片数量
                $(".detail .item  .numberone").html(numberone);
                //照片超过十张开始收费
                if(numberone>maxJxLenght){
                    priceone = jxUnitPrice * (numberone - maxJxLenght);
                    $(".detail .item  .priceone span").html(priceone)
                    $(".detail .item  .priceone").show();
                    //总价
                    $(".total").html(priceone.toFixed(2))
                } else{
                    $(".detail .item  .priceone").hide();
                    $(".total").html(0)
                }
                var totalMoney = 0.00;
                $('.sm').find('.price-money').each(function(i,el){
                    totalMoney += parseFloat($(this).html());
                });
                $(".total").html(totalMoney.toFixed(2))
                $(".jingxiu").html(numberone - maxJxLenght);
                if($(".jingxiu").html()<=0){
                    $(".sm-none").hide();
                }else{
                    $(".sm-none").show();
                }
                console.log(photoList)
            }else{
                $(".index-centent2").hide();
                $(".index-centent1").show();
                $(this).siblings(".btn").show();
                $(this).html("下一步");
                photoList.splice(1,photoList.length-1);
                $(".item-detail .div-remove").siblings().remove();
                $(".item").find(".numbertwo").html(0);
            }
        })
        var index;
        //点击弹出已选择精修照片
        $("body").on("click",".addimg",function(){
            index=$(this).parents(".item").index();
            photoList[index][0] = $(this).parents(".item").find(".mouseover").attr("data-id");
            $(".choicese").find(".img").empty();
            if(photoList[0][1].length >= 1){
                for(var i=0;i<photoList[0][1].length;i++){
                    var span = "<span style='position: relative;' id=" +photoList[0][1][i][0]+ "><img src=" +photoList[0][1][i][1]+ "><i class='iconfont' style='position: absolute;bottom:10px;right:10px;cursor: pointer;font-size:20px;color:#ff1c77;display: none;'>&#xe600;</i></span>"
                    $(".choicese").find(".img").append(span);
                }
            }

            if(typeof(photoList[index][1]) == "undefined"){
                photoList[index][1] = [];
            }else{
                for(var i=0;i<photoList[0][1].length;i++){
                    for(var b=0;b<photoList[index][1].length;b++){
                        if(photoList[0][1][i][0]==photoList[index][1][b][0]){
                            $(".choicese").find(".img").find("[id='"+photoList[0][1][i][0]+"']").addClass("select");
                            $(".choicese").find(".img").find("[id='"+photoList[0][1][i][0]+"']").find("i").show();
                        }
                    }
                }

            }




            $(".choicese").show();

        })

        //点击从精选照片里再选择
        $("body").on("click",".choicese .img span",function(){
            var minphotonum = $(".item").eq(index).find(".item-tit .minphotonum").html()//可选照片最小值
            var maxphotonum = $(".item").eq(index).find(".item-tit .maxphotonum").html()//可选照片最大值
            if($(this).hasClass('select') == true){

                for(j=0; j<photoList[index][1].length; j++){
                    if(photoList[index][1][j][0] == $(this).attr('id')){
                        photoList[index][1].splice(j,1);
                    }
                }
                $(this).removeClass('select');
            }else{
                var v = [];
                v[0] = $(this).attr('id');
                v[1] = $(this).find("img").attr('src');

                if(typeof(photoList[index][1]) == "undefined"){
                    photoList[index][1] = [];
                }
                photoList[index][1][photoList[index][1].length] = v;

                $(this).addClass('select');
            }
            if(photoList[index][1].length>=minphotonum && photoList[index][1].length<=maxphotonum){
                $("#sure-two").removeAttr("disabled")
                //调用函数追加元素的click事件
                xzAddImg();
            }else{
                $("#sure-two").attr("disabled","disabled")
                $("#sure-two").unbind("click");
            }

            $(this).find("i").toggle();
        })

        //点击确定把选中的照片显示到页面
        var pricetwo;
        function xzAddImg(){
            $("#sure-two").on("click",function(){
                $('#product_list_'+index).find(".item-detail").empty();
                $('#product_list_'+index).find(".item-detail").append("<div class='div addimg div-remove'><div style='border-color:#f5f5f5;'><img style='width:100%;' src='http://kllife.com/source/Static/photo/img/product-selection/addimg.jpg' alt=''></div></div>");
                var divHTML = '';
                if(photoList[index][1].length >= 1){
                    for(var i=0;i<photoList[index][1].length;i++){
                        divHTML += "<div class='div div-mouseout' id='" +photoList[index][1][i][0]+ "'>" +
                            "<div class='div1' style='position: relative'><img src='" +photoList[index][1][i][1]+ "' alt=''><i class='iconfont removephoto' style='position: absolute;top:-5px;right:0px;font-size: 20px;cursor: pointer;'>&#xe65f;</i></div>" +
                            "<div class='div2'><img src=" +photoList[index][1][i][1]+ " alt=''></div>" +
                            "</div>";
                    }
                    $('#product_list_'+index).find(".item-detail").prepend(divHTML);
                }
                $(".choicese").hide();
                var numbertwo = photoList[index][1].length;
                $(".item").eq(index).find(".numbertwo").html(numbertwo);
            })
        }
        xzAddImg();

        //删除选中的图片
        $("body").on("click",".removephoto",function(){
            var indexthree=$(this).parents(".item").index();
            $(this).parents(".div").remove();
            for(j=0; j<photoList[indexthree][1].length; j++){
                if(photoList[indexthree][1][j][0] == $(this).parents(".div").attr('id')){
                    photoList[indexthree][1].splice(j,1);
                }
            }
            var numbertwo = photoList[indexthree][1].length;
            $(".item").eq(indexthree).find(".numbertwo").html(numbertwo);
        })

        //鼠标滑过显示弹框
        $("body").on("mouseover",".mouseover",function(){
            $(this).nextAll(".spec-show").show();
            var width = ($(this).width()) + 50;
            $(this).nextAll(".spec-show").css("left",width);
        })
        $("body").on("mouseout",".mouseover",function(){
            $(this).nextAll(".spec-show").hide();
        })

        //重新选择精修照片
        $("body").on("click",".fine .btn",function() {
            $(".index-centent2").hide();
            $(".index-centent1").show();
            $("#next").siblings(".btn").show();
            $("#next").html("下一步");
            photoList.splice(1,photoList.length-1);
            $(".item-detail .div-remove").siblings().remove();
            $(".item").find(".numbertwo").html(0);
        })

        //产片选择放大图
        $("body").on("mouseenter",".div1",function() {
            $(".div").each(function(){
                var index = $(this).index()+1;
                if(index % 4 == 0 || index % 5 == 0){
                    $(this).find(".div2").css("right","218px")
                }else{
                    $(this).find(".div2").css("right","-445px")
                }
            })
            $(this).next().show();
        })
        $("body").on("mouseleave",".div1",function() {
            $(this).next(".div2").hide();
        })
        $("body").on("mouseenter",".div2",function() {
            $(this).hide();
        })

        $("body").on("mouseover",".div-mouseout",function() {
            var index=$(this).index();
                $(this).parents(".item-detail").css("padding-bottom","150px")
        })
        $("body").on("mouseout",".div-mouseout",function() {
            $(this).parents(".item-detail").css("padding-bottom","0px")
        })

        //删除图片数组中的空元素
        function removeEmptyArrayEle(){
            for(var i = 0; i < photoList.length; i++) {
                if(photoList[i] == "") {
                    photoList.splice(i,1);
                    i = i - 1;
                }
            }
            return photoList;
        };

        //判断邮寄地址
        $("#addressee-tel").on("blur",function(){
            var addresseeTel = $("#addressee-tel").val();
            if(addresseeTel && /^1[3|4|5|8]\d{9}$/.test(addresseeTel)){
                $(this).next().hide();
            }else{
                $(this).next().show();
                $(this).focus();
            }
        })
        $("#addressee-name,#addressee-address").on("blur",function(){
            var valhtml = $(this).val();    //收件人姓名 地址
            if(valhtml!=""){
                $(this).next().hide();
            }else{
                $(this).next().show();
                $(this).focus();
            }
        })

        //订单提交
        $("#submit").on("click",function(){
            var addresseeName = $("#addressee-name").val();         //收件人姓名
            var addresseeTel = $("#addressee-tel").val();           //收件人电话
            var addresseeAddress = $("#addressee-address").val();   //收件人地址
            if(addresseeName == ""){
                $("#addressee-name").next().show();
                $("#addressee-name").focus();
            }if(addresseeTel ==""){
                $("#addressee-tel").next().show();
                $("#addressee-tel").focus();
            }if(addresseeAddress== ""){
                $("#addressee-address").next().show();
                $("#addressee-address").focus();
            }else if(addresseeName != "" && addresseeTel !="" && addresseeTel && /^1[3|4|5|7|8]\d{9}$/.test(addresseeTel)){
                console.log(addresseeName)
                console.log(addresseeTel)
                console.log(addresseeAddress)
                console.log(removeEmptyArrayEle())
            }
        })

	</script>