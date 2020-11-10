<?php /*a:3:{s:86:"E:\phpStudy\PHPTutorial\WWW\www.dsmall.com\app\home\view\default\mall\login\login.html";i:1596442232;s:83:"E:\phpStudy\PHPTutorial\WWW\www.dsmall.com\app\home\view\default\base\mall_top.html";i:1596442231;s:86:"E:\phpStudy\PHPTutorial\WWW\www.dsmall.com\app\home\view\default\base\mall_footer.html";i:1596442231;}*/ ?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo htmlentities((isset($html_title) && ($html_title !== '')?$html_title:config('ds_config.site_name'))); ?></title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand" />
        <meta name="keywords" content="<?php echo htmlentities((isset($seo_keywords) && ($seo_keywords !== '')?$seo_keywords:'')); ?>" />
        <meta name="description" content="<?php echo htmlentities((isset($seo_description) && ($seo_description !== '')?$seo_description:'')); ?>" />
        <link rel="stylesheet" href="<?php echo htmlentities(HOME_SITE_ROOT); ?>/css/common.css">
        <link rel="stylesheet" href="<?php echo htmlentities(HOME_SITE_ROOT); ?>/css/home_header.css">
        <script>
            var BASESITEROOT = "<?php echo htmlentities(BASE_SITE_ROOT); ?>";
            var HOMESITEROOT = "<?php echo htmlentities(HOME_SITE_ROOT); ?>";
            var BASESITEURL = "<?php echo htmlentities(BASE_SITE_URL); ?>";
            var HOMESITEURL = "<?php echo htmlentities(HOME_SITE_URL); ?>";
            var TIMESTAMP = "<?php echo htmlentities(TIMESTAMP); ?>";
        </script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/jquery-2.1.4.min.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/common.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/jquery.validate.min.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/additional-methods.min.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/layer/layer.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
    </head>
    <body>
        <div id="append_parent"></div>
        <div id="ajaxwaitid"></div>
        <?php if($adv_top): ?>
        <div style="background:<?php echo htmlentities((isset($adv_top['adv_bgcolor']) && ($adv_top['adv_bgcolor'] !== '')?$adv_top['adv_bgcolor']:'')); ?>;">
            <div class="w1200">
                <a href="<?php echo url('Advclick/Advclick',['adv_id'=>$adv_top['adv_id']]); ?>" target="_blank" title="<?php echo htmlentities($adv_top['adv_title']); ?>"><img src="<?php echo htmlentities(UPLOAD_SITE_URL); ?>/<?php echo htmlentities(ATTACH_ADV); ?>/<?php echo htmlentities($adv_top['adv_code']); ?>" width="1200"/></a>
            </div>
        </div>
        <?php endif; ?>
        <div class="public-top">
            <div class="w1200">
                <span class="top-link">
                    <?php echo htmlentities(lang('welcome_to')); ?> <em><?php echo htmlentities(config('ds_config.site_name')); ?></em>
                </span>
                <ul class="login-regin">
                    <?php if(session('member_id')): ?>
                    <li class="line"> <a href="<?php echo url('Member/index'); ?>"><?php echo session('member_nickname'); ?></a></li>
                    <li> <a href="<?php echo url('Login/Logout'); ?>"><?php echo htmlentities(lang('exit')); ?></a></li>
                    <?php else: ?>
                    <li class="line"> <a href="<?php echo url('Login/login'); ?>"><?php echo htmlentities(lang('please_log')); ?></a></li>
                    <li> <a href="<?php echo url('Login/register'); ?>"><?php echo htmlentities(lang('free_registration')); ?></a></li>
                    <?php endif; ?>
                </ul>
                <span class="top-link">
                    <strong style="margin-left:30px;"><?php echo htmlentities(lang('ds_attention')); ?><a href="http://www.csdeshang.com" target="_blank">www.csdeshang.com</a> <?php echo htmlentities(lang('ds_continuous_update')); ?></strong>&nbsp;
                    <?php echo htmlentities(lang('ds_purchase_authorization')); ?>：<a target="_blank" href="<?php echo htmlentities(HTTP_TYPE); ?>wpa.qq.com/msgrd?v=3&uin=858761000&site=qq&menu=yes"><img border="0" src="<?php echo htmlentities(HTTP_TYPE); ?>wpa.qq.com/pa?p=2:858761000:51" alt="<?php echo htmlentities(lang('click_here_send_message')); ?>" title="<?php echo htmlentities(lang('click_here_send_message')); ?>"/></a>
                </span>
                <ul class="quick_list">
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="<?php echo url('Member/index'); ?>"><?php echo htmlentities(lang('ds_user_center')); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <li><a href="<?php echo url('Memberorder/index'); ?>"><?php echo htmlentities(lang('ds_buying_goods')); ?></a></li>
                                <li><a href="<?php echo url('Memberfavorites/fglist'); ?>"><?php echo htmlentities(lang('ds_care_about')); ?></a></li>
                                <li><a href="<?php echo url('Memberfavorites/fslist'); ?>"><?php echo htmlentities(lang('ds_the_shop')); ?></a></li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="<?php echo url('Seller/index'); ?>"><?php echo htmlentities(lang('business_center')); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <?php if(session('seller_id')): ?>
                                <li><a href="<?php echo url('Seller/index'); ?>"><?php echo htmlentities(lang('ds_shop_overview')); ?></a></li>
                                <li><a href="<?php echo url('Sellerorder/index'); ?>"><?php echo htmlentities(lang('ds_member_path_store_order')); ?></a></li>
                                <li><a href="<?php echo url('Sellergoodsonline/index'); ?>"><?php echo htmlentities(lang('promotion_goods_manage')); ?></a></li>
                                <?php else: if(config('ds_config.store_joinin_open')!=0): ?>
                                <li><a href="<?php echo url('Showjoinin/index'); ?>"><?php echo htmlentities(lang('tenants')); ?></a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo url('Sellerlogin/login'); ?>"><?php echo htmlentities(lang('merchant_login')); ?></a></li>
                                <?php endif; ?>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="<?php echo url('Memberfavorites/fglist'); ?>"><?php echo htmlentities(lang('ds_favorites')); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <li><a href="<?php echo url('Memberfavorites/fglist'); ?>"><?php echo htmlentities(lang('ds_merchandise_collection')); ?></a></li>
                                <li><a href="<?php echo url('Memberfavorites/fslist'); ?>"><?php echo htmlentities(lang('ds_store_collect')); ?></a></li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="javascript:void(0)"><?php echo htmlentities(lang('ds_fast_nav')); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <?php foreach($navs['header'] as $nav): ?>
                                <li>
                                    <a href="<?php echo htmlentities($nav['nav_url']); ?>" <?php if($nav['nav_new_open'] == 1): ?>target="_blank"<?php endif; ?>><?php echo htmlentities($nav['nav_title']); ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </li>
                    <li class="moblie-qrcode">
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="javascript:void(0)"><?php echo htmlentities(lang('wechat_end')); ?></a>
                        <div class="dropdown-menu">
                            <img src="<?php echo htmlentities(UPLOAD_SITE_URL); ?>/<?php echo htmlentities(ATTACH_COMMON); ?>/<?php echo htmlentities(config('ds_config.site_logowx')); ?>" width="90" height="90" />
                        </div>
                    </li>
                    <!--
                    <li class="app-qrcode">
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="javascript:void(0)">APP</a>
                        <div class="dropdown-menu">
                            <img width="90" height="90" src="<?php echo htmlentities(UPLOAD_SITE_URL); ?>/<?php echo htmlentities(ATTACH_COMMON); ?>/<?php echo htmlentities(config('ds_config.site_logowx')); ?>" />
                            <h3>扫描二维码</h3>
                            <p>下载手机客户端</p>
                        </div>
                    </li>
                    -->
                </ul>
            </div>
        </div>
        
        
        
        <!--左侧导航栏-->
<div class="ds-appbar">
    <div class="ds-appbar-tabs" id="appBarTabs">
        <?php if(session('is_login')): ?>
        <div class="user" dstype="a-barUserInfo">
            <div class="avatar"><img src="<?php echo get_member_avatar(session('avatar')); ?>?<?php echo htmlentities(TIMESTAMP); ?>"/></div>
            <p><?php echo htmlentities(lang('sns_me')); ?></p>
        </div>
        <div class="user-info" dstype="barUserInfo" style="display:none;"><i class="arrow"></i>
            <div class="avatar"><img src="<?php echo get_member_avatar(session('avatar')); ?>?<?php echo htmlentities(TIMESTAMP); ?>"/></div>
            <dl>
                <dt>Hi, <?php echo session('member_nickname'); ?></dt>
                <dd><?php echo htmlentities(lang('ds_current_level')); ?>：<strong dstype="barMemberGrade"><?php echo session('level_name'); ?></strong></dd>
                <dd><?php echo htmlentities(lang('ds_current_experience')); ?>：<strong dstype="barMemberExp"><?php echo session('member_exppoints'); ?></strong></dd>
            </dl>
        </div>
       <?php else: ?>
        <div class="user TA_delay" dstype="a-barLoginBox">
            <div class="avatar TA"><img src="<?php echo get_member_avatar(session('avatar')); ?>?<?php echo htmlentities(TIMESTAMP); ?>"/></div>
            <p class="TA"><?php echo htmlentities(lang('login_notlogged')); ?></p>
        </div>
        <?php endif; ?>
        <ul class="tools">
            <?php if(config('ds_config.node_site_use') == '1'): ?>
            <li><a href="javascript:void(0);" id="chat_show_user" class="chat TA_delay"><span class="iconfont">&#xe71b;</span><span class="tit"><?php echo htmlentities(lang('ds_chat')); ?></span><i id="new_msg" class="new_msg" style="display:none;"></i></a></li>
            <?php endif; ?>
            <li><a href="javascript:void(0);" onclick="toglle_bar('rtoolbar_cart')" id="rtoolbar_cart" class="cart TA_delay"><span class="iconfont">&#xe69a;</span><span class="tit"><?php echo htmlentities(lang('ds_cart')); ?></span><i id="rtoobar_cart_count" class="new_msg" style="display:none;"></i></a></li>
            <li><a href="javascript:void(0);" onclick="toglle_bar('compare')" id="compare" class="compare TA_delay"><span class="iconfont">&#xe74a;</span><span class="tit"><?php echo htmlentities(lang('ds_comparison')); ?></span></a></li>
            <li>
                <a href="javascript:void(0);" id="qrcode" class="qrcode TA_delay"><span class="iconfont">&#xe72d;</span>
                    <span class="tit-box">
                        <?php echo htmlentities(lang('ds_mobile_shopping_better')); ?><br>
                        <img src="<?php echo htmlentities(HOME_SITE_URL); ?>/qrcode?url=<?php echo htmlentities(config('ds_config.h5_site_url')); ?>" width="110" height="110" />
                        <em class="tips_arrow"></em>
                    </span>
                </a>
            </li>
            <li><a href="javascript:void(0);" onclick="$('html,body').animate({scrollTop: '0px'}, 500)" id="gotop" class="gotop TA_delay" style="position: fixed;bottom: 0"><span class="iconfont">&#xe724;</span><span class="tit"><?php echo htmlentities(lang('ds_top')); ?></span></a></li>
        </ul>
        <div class="content-box" id="content-compare">
            <div class="top">
                <h3><?php echo htmlentities(lang('ds_comparison')); ?></h3>
                <a href="javascript:void(0);" class="close iconfont" title="<?php echo htmlentities(lang('ds_hidden')); ?>">&#xe73d;</a></div>
            <div id="comparelist"></div>
        </div>
        <div class="content-box" id="content-cart">
            <div class="top">
                <h3><?php echo htmlentities(lang('ds_my_shopping_cart')); ?></h3>
                <a href="javascript:void(0);" class="close iconfont" title="<?php echo htmlentities(lang('ds_hidden')); ?>">&#xe73d;</a></div>
            <div id="rtoolbar_cartlist"></div>
        </div>
    </div>
</div>
        
<script type="text/javascript">

    //动画显示边条内容区域
    $(function() {
        $(".close").click(function(){
            close_bar();
        });
        // 右侧bar用户信息
        $('div[dstype="a-barUserInfo"]').click(function(){
            $('div[dstype="barUserInfo"]').toggle();
        });
        // 右侧bar登录
        $('div[dstype="a-barLoginBox"]').click(function(){
            login_dialog();
        });

        <?php if($cart_goods_num > 0): ?>
            $('#rtoobar_cart_count').html(<?php echo htmlentities($cart_goods_num); ?>).show();
        <?php endif; ?>
    });
    function toglle_bar(item){
           var member_id = "<?php echo session('member_id'); ?>";
              if(member_id == ''){
                   login_dialog();
                  return;
              }
        //判断侧边栏是否已拉出
        if(parseInt($('.ds-appbar').css('width')) == 36){
            $('.ds-appbar').css('width','306px');
        }
        //判断选中项是否已显示
        if(!$("#"+item).hasClass('active')){
            $('.tools li > a').removeClass('active');
            $("#"+item).addClass('active');
            $('.content-box').removeClass('active');
            
            switch(item){
                case 'rtoolbar_cart':
                    $("#rtoolbar_cartlist").load("<?php echo url('Cart/ajax_load',['type'=>'html']); ?>");
                    $("#content-cart").addClass('active');
                    break;
                case 'compare':   
                    loadCompare(false);
                    $("#content-compare").addClass('active');
                    break;
            }
        }else{
            //关闭
            close_bar();
            $(".chat-list").css("display",'none');
        }
        
    }
    function close_bar(){
        $('.tools li > a').removeClass('active');
        $('.content-box').removeClass('active');
        $('.ds-appbar').css('width','36px');
    }
</script> 

<link rel="stylesheet" href="<?php echo htmlentities(HOME_SITE_ROOT); ?>/css/home.css">
<div class="header-login clearfix">
    <div class="w1200">
        <div class="logo">
            <a href="<?php echo htmlentities(HOME_SITE_URL); ?>"><img src="<?php echo htmlentities(UPLOAD_SITE_URL); ?>/<?php echo htmlentities(ATTACH_COMMON); ?>/<?php echo htmlentities(config('ds_config.site_logo')); ?>"/></a>
        </div>
    </div>
</div>


<div class="page_login clearfix" style="background-image: url('<?php echo htmlentities(HOME_SITE_ROOT); ?>/images/login/login-bg.jpg');background-position: center center;">
    <div class="w1000">
        <div class="login_form">
            <div class="mt">
                <a href="javascript:void(0)" class="on"><span><?php echo htmlentities(lang('login_account')); ?></span><i></i></a>
                <?php if(config('ds_config.sms_login') == 1): ?>
                <a href="javascript:void(0)" ><span><?php echo htmlentities(lang('login_mobile')); ?></span><i></i></a>
                <?php endif; ?>
            </div>
            <div class="mc">
                <form id="login_normal_form" method="post" action="<?php echo url('Login/login'); ?>">
                    <div class="item">
                        <div class="text-area">
                            <div class="iconfont ico">&#xe702;</div>
                            <input type="text" id="member_name" name="member_name" class="text" placeholder="<?php echo htmlentities(lang('login_type')); ?>" tabindex="1"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-area">
                            <div class="iconfont ico">&#xe67b;</div>
                            <input type="password" id="member_password" name="member_password" class="text" placeholder="<?php echo htmlentities(lang('login_password')); ?>" tabindex="2"/>
                        </div>
                    </div>
                    <?php if(config('ds_config.captcha_status_login') == '1'): ?>
                     <div class="item">
                        <div class="text-area">
                            <div class="iconfont ico">&#xe67b;</div>
                            <input type="text" id="captcha_normal" name="captcha_normal" class="text" style="width:130px;float:left" placeholder="<?php echo htmlentities(lang('login_register_code')); ?>" tabindex="2" maxlength="4"/>
                            <span class="span">
                           <img style="position: absolute;top: 0;height:46px;" src="<?php echo url('Seccode/makecode'); ?>" title="<?php echo htmlentities(lang('login_index_change_checkcode')); ?>" id="codeimage">
                                <a class="makecode" href="javascript:void(0);" onclick="javascript:document.getElementById('codeimage').src='<?php echo url('Seccode/makecode'); ?>'+'?'+(new Date().getTime());"><?php echo htmlentities(lang('login_password_change_code')); ?></a>
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="item">
                        <a href="<?php echo url('Login/forget_password'); ?>"><?php echo htmlentities(lang('login_index_find_password')); ?>?</a>
                        <a href="<?php echo url('Login/register'); ?>" title="<?php echo htmlentities(lang('login_register_login_now_4')); ?>"><?php echo htmlentities(lang('new_user_registration')); ?></a>
                    </div>
                    <div class="item">
                        <input type="submit" class="btn login-btn" value="<?php echo htmlentities(lang('login_register_login_now_2')); ?>"/>
                    </div>    
                </form>
                <?php if(config('ds_config.sms_login') == 1): ?>
                <form id="login_mobile_form" method="post" action="<?php echo url('Connectsms/login'); ?>" style="display:none">
                    <div class="item">
                        <div class="text-area">
                            <div class="iconfont ico">&#xe702;</div>
                            <input type="text" id="sms_mobile" name="sms_mobile" class="text" placeholder="<?php echo htmlentities(lang('login_mobile_phone')); ?>" oninput = "value=value.replace(/[^\d]/g,'')" maxlength="11"  tabindex="1"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-area">
                            <div class="iconfont ico">&#xe67b;</div>
                            <input type="text" oninput="value=value.replace(/[^\d]/g,'')"  id="sms_captcha" name="sms_captcha" class="text" placeholder="<?php echo htmlentities(lang('login_mobile_verification_code')); ?>" tabindex="2" style="width:130px;float:left" maxlength="6"/>
                            <a class="send_code valid" id="btn_sms_captcha" ds_type="2" ><?php echo htmlentities(lang('login_get_verification_code')); ?></a>
                        </div>
                    </div>

                    <div class="item">
                        <a href="<?php echo url('Login/forget_password'); ?>"><?php echo htmlentities(lang('login_index_find_password')); ?>?</a>
                        <a href="<?php echo url('Login/register'); ?>" title="<?php echo htmlentities(lang('login_register_login_now_4')); ?>"><?php echo htmlentities(lang('new_user_registration')); ?></a>
                    </div>
                    <div class="item">
                        <input type="hidden" value="<?php echo htmlentities(app('request')->param('ref_url')); ?>" name="ref_url">
                        <input type="submit" class="btn login-btn" value="<?php echo htmlentities(lang('login_register_login_now_2')); ?>"/>
                    </div>    
                </form>
                <?php endif; ?>
            </div>
            <?php if(config('ds_config.qq_isuse') =='1' || config('ds_config.sina_isuse') =='1' || config('ds_config.weixin_isuse') =='1'): ?>
            <div class="partner-login clearfix">
                <h3><?php echo htmlentities(lang('partner_account_login')); ?></h3>
                <p>
                    <?php if(config('ds_config.qq_isuse') == '1'): ?>
                    <a class="login_ico ico_qq" href="<?php echo url('Api/oa_qq'); ?>"></a>
                    <?php endif; if(config('ds_config.sina_isuse') == '1'): ?>
                    <a class="login_ico ico_weibo" href="<?php echo url('Api/oa_sina'); ?>"></a>
                    <?php endif; if(config('ds_config.weixin_isuse') == '1'): ?>
                    <a class="login_ico ico_weixin" onclick="ajax_form('weixin_form', '<?php echo htmlentities(lang('wechat_account_login')); ?>', '<?php echo url('Connectwx/index'); ?>', 360);" title="<?php echo htmlentities(lang('wechat_account_login')); ?>"></a>
                    <?php endif; ?>
                </p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
$(function () {
    $(".login_form .mt a").click(function(){
        var index=$(this).index();
        $(this).parent().next().find("form").hide().eq(index).show();
        $(this).addClass("on").siblings().removeClass("on");
    });
    
    $("#login_normal_form").validate({
        errorPlacement: function (error, element) {
            var error_td = element.parent('.text-area');
            error_td.append(error);
            element.parents('.text-area:first').addClass('error');
        },
        success: function (label) {
            label.parents('.text-area:first').removeClass('error').find('label').remove();
        },
        submitHandler:function(form){
            ds_ajaxpost('login_normal_form','url','<?php if(app('request')->param('ref_url')): ?><?php echo urldecode(app('request')->param('ref_url')); else: ?><?php echo url("Member/index"); ?><?php endif; ?>');
        },
        onkeyup: false,
        rules: {
            member_name: "required",
            member_password: "required"
            <?php if(config('ds_config.captcha_status_login') == '1'): ?>,
            captcha_normal: {
                required: true,
                remote: {
                    url: "<?php echo url('Seccode/check',['reset'=>'false']); ?>",
                    type: 'get',
                    data: {
                        captcha: function () {
                            return $('#captcha_normal').val();
                        }
                    },
                    complete: function (data) {
                        if (data.responseText == 'false') {
                            document.getElementById('codeimage').src = "<?php echo url('Seccode/makecode'); ?>"+"?" + new Date().getTime();
                        }
                    }
                }
            }
            <?php endif; ?>
        },
        messages: {
            member_name: "<i class='iconfont'>&#xe64c;</i><?php echo htmlentities(lang('please_enter_registered_name')); ?>",
            member_password: "<i class='iconfont'>&#xe64c;</i><?php echo htmlentities(lang('login_index_input_password')); ?>"
            <?php if(config('ds_config.captcha_status_login') == '1'): ?>,
            captcha_normal: {
                required: '<i class="iconfont" title="<?php echo htmlentities(lang('login_index_input_checkcode')); ?>">&#xe64c;</i><?php echo htmlentities(lang('login_index_input_checkcode')); ?>',
                remote: '<i class="iconfont" title="<?php echo htmlentities(lang('login_index_wrong_checkcode')); ?>">&#xe64c;</i><?php echo htmlentities(lang('login_index_wrong_checkcode')); ?>'
            }
            <?php endif; ?>
        }
    });
});
</script>
<?php if(config('ds_config.sms_login') == 1): ?>
<script type="text/javascript" src="<?php echo htmlentities(HOME_SITE_ROOT); ?>/js/connect_sms.js"></script>
<script>
            $(function () {
                $("#login_mobile_form").validate({
                    errorPlacement: function (error, element) {
                        var error_td = element.parent('.text-area');
                        error_td.append(error);
                        element.parents('.text-area:first').addClass('error');
                    },
                    success: function (label) {
                        label.parents('.text-area:first').removeClass('error').find('label').remove();
                    },
                    submitHandler:function(form){
                        ds_ajaxpost('login_mobile_form','url','<?php if(app('request')->param('ref_url')): ?><?php echo htmlentities(app('request')->param('ref_url')); else: ?><?php echo url("Member/index"); ?><?php endif; ?>');
                    },
                    onkeyup: false,
                    rules: {
                        sms_mobile: {
                            required: true,
                            number:true,
                            rangelength:[11,11]
                        },
                        sms_captcha: {
                            required: true,
                            rangelength:[6,6]
                        }
                        <?php if(config('ds_config.captcha_status_login') == '1'): ?>,
                        captcha_mobile: {
                            required: true,
                            minlength: 4,
                            remote: {
                                url: "<?php echo url('Seccode/check',['reset'=>'false']); ?>",
                                type: 'get',
                                data: {
                                    captcha: function () {
                                        return $('#captcha_mobile').val();
                                    }
                                },
                                complete: function (data) {
                                    if (data.responseText == 'false') {
                                        document.getElementById('sms_codeimage').src = "<?php echo url('Seccode/makecode'); ?>"+"?" + new Date().getTime();
                                    }
                                }
                            }
                        }
                        <?php endif; ?>
                    },
                    messages: {
                        sms_mobile: {
                            required: '<i class="iconfont">&#xe64c;</i><?php echo htmlentities(lang('login_correct_phone')); ?>',
                            number: '<i class="iconfont">&#xe64c;</i><?php echo htmlentities(lang('login_correct_phone')); ?>',
                            rangelength:'<i class="iconfont">&#xe64c;</i><?php echo htmlentities(lang('login_correct_phone')); ?>'
                        },
                        sms_captcha: {
                            required: '<i class="iconfont">&#xe64c;</i><?php echo htmlentities(lang('login_sms_dynamic_code')); ?>',
                            rangelength: '<i class="iconfont">&#xe64c;</i><?php echo htmlentities(lang('login_sms_dynamic_code')); ?>'
                        }
                        <?php if(config('ds_config.captcha_status_login') == '1'): ?>,
                        captcha_mobile: {
                            required: '<i class="iconfont">&#xe64c;</i><?php echo htmlentities(lang('login_correct_verification_code')); ?>',
                            minlength: '<i class="iconfont">&#xe64c;</i><?php echo htmlentities(lang('login_correct_verification_code')); ?>',
                            remote: '<i class="iconfont">&#xe64c;</i><?php echo htmlentities(lang('login_correct_verification_code')); ?>'
                        }
                        <?php endif; ?>
                    }
                });
            });
</script>
<?php endif; if(config('ds_config.node_site_use') == '1' && !isset($wait) && request()->controller() != 'Payment' && request()->controller() != 'Showgroupbuy'): ?>
<?php echo get_chat(); ?>
<?php endif; ?>
<script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/jquery.cookie.js"></script>
<script src="<?php echo htmlentities(HOME_SITE_ROOT); ?>/js/compare.js"></script>
<link rel="stylesheet" href="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/perfect-scrollbar.min.css">
<script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/qtip/jquery.qtip.min.js"></script>
<link href="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/jquery.lazyload.min.js"></script>
<script>
    //懒加载
    $("img.lazyload").lazyload({
//        placeholder : "<?php echo htmlentities(HOME_SITE_ROOT); ?>/images/loading.gif",
        effect: "fadeIn",
        skip_invisible : false,
        threshold : 200,
    });
</script>
<div class="footer-info">
    <div class="links w1200">
        <?php foreach($navs['footer'] as $nav): ?>
        <a href="<?php echo htmlentities($nav['nav_url']); ?>" <?php if($nav['nav_new_open'] == 1): ?>target="_blank"<?php endif; ?>><?php echo htmlentities($nav['nav_title']); ?></a>|
        <?php endforeach; ?>
    </div>
    <p class="copyright"><?php echo htmlentities(config('ds_config.flow_static_code')); ?></p>
</div>
