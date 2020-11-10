<?php /*a:2:{s:75:"E:\phpStudy\PHPTutorial\WWW\www.dsmall.com\app\admin\view\adv\adv_form.html";i:1596442213;s:76:"E:\phpStudy\PHPTutorial\WWW\www.dsmall.com\app\admin\view\public\header.html";i:1596442214;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo htmlentities((isset($html_title) && ($html_title !== '')?$html_title:config('ds_config.site_name'))); ?><?php echo htmlentities(lang('system_backend')); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo htmlentities(ADMIN_SITE_ROOT); ?>/css/admin.css">
        <link rel="stylesheet" href="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/jquery-ui/jquery-ui.min.css">
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/jquery-2.1.4.min.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/jquery.validate.min.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/jquery.cookie.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/common.js"></script>
        <script src="<?php echo htmlentities(ADMIN_SITE_ROOT); ?>/js/admin.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/perfect-scrollbar.min.js"></script>
        <script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/layer/layer.js"></script>
        <script type="text/javascript">
            var BASESITEROOT = "<?php echo htmlentities(BASE_SITE_ROOT); ?>";
            var ADMINSITEROOT = "<?php echo htmlentities(ADMIN_SITE_ROOT); ?>";
            var BASESITEURL = "<?php echo htmlentities(BASE_SITE_URL); ?>";
            var HOMESITEURL = "<?php echo htmlentities(HOME_SITE_URL); ?>";
            var ADMINSITEURL = "<?php echo htmlentities(ADMIN_SITE_URL); ?>";
        </script>
    </head>
    <body>
        <div id="append_parent"></div>
        <div id="ajaxwaitid"></div>








<div class="page">

  <div class="fixed-empty"></div>
  <form id="adv_form" enctype="multipart/form-data" method="post" name="advForm">
    <table class="ds-default-table">
      <tbody>
        <tr class="noborder">
          <td class="required w120"><label class="validation" for="adv_name"><?php echo htmlentities(lang('adv_name')); ?>:</label></td>
          <td class="vatop rowform"><input type="text" name="adv_name" id="adv_name" class="txt" value="<?php echo htmlentities((isset($adv['adv_title']) && ($adv['adv_title'] !== '')?$adv['adv_title']:'')); ?>"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
            <td class="required"><label><?php echo htmlentities(lang('adv_ap_id')); ?>:</label></td>
            <td class="vatop rowform">
                <select name="ap_id" id="ap_id">
                    <?php if(is_array($ap_list) || $ap_list instanceof \think\Collection || $ap_list instanceof \think\Paginator): if( count($ap_list)==0 ) : echo "" ;else: foreach($ap_list as $ap_k=>$ap): ?>
                    <option value='<?php echo htmlentities($ap['ap_id']); ?>' <?php if(app('request')->param('ap_id') == $ap['ap_id'] || $adv['ap_id'] == $ap['ap_id']): ?>selected<?php endif; ?>><?php echo htmlentities($ap['ap_name']); ?>[<?php echo htmlentities($ap['ap_width']); ?>X<?php echo htmlentities($ap['ap_height']); ?>]</option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
            <td class="required"><label for="adv_startdate"><?php echo htmlentities(lang('ds_start_time')); ?>:</label></td>
            <td class="vatop rowform"><input type="text" name="adv_startdate" id="adv_startdate" class="txt date" value="<?php echo date('Y-m-d',$adv['adv_startdate']); ?>"></td>
            <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
            <td class="required"><label for="adv_startdate"><?php echo htmlentities(lang('adv_sort')); ?>:</label></td>
            <td class="vatop rowform"><input type="text" name="adv_sort" id="adv_sort" class="txt" value="<?php echo htmlentities((isset($adv['adv_sort']) && ($adv['adv_sort'] !== '')?$adv['adv_sort']:'0')); ?>">
            </td>
            <td class="vatop tips"><?php echo htmlentities(lang('adv_sort_role')); ?></td>
        </tr>
        <tr class="noborder">
            <td class="required"><label for="adv_startdate"><?php echo htmlentities(lang('adv_enabled')); ?>:</label></td>
            <td class="vatop rowform">
                <div class="onoff">
                    <label for="adv_enabled1" class="cb-enable <?php if($adv['adv_enabled'] == 1): ?>selected<?php endif; ?>"><?php echo htmlentities(lang('ds_open')); ?></label>
                    <label for="adv_enabled0" class="cb-disable <?php if($adv['adv_enabled'] == 0): ?>selected<?php endif; ?>"><?php echo htmlentities(lang('ds_close')); ?></label>
                    <input id="adv_enabled1" name="adv_enabled" value="1" type="radio" <?php if($adv['adv_enabled'] == 1): ?> checked="checked"<?php endif; ?>>
                    <input id="adv_enabled0" name="adv_enabled" value="0" type="radio" <?php if($adv['adv_enabled'] == 0): ?> checked="checked"<?php endif; ?>>
                </div>
            </td>
            <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
            <td class="required"><label for="adv_enddate"><?php echo htmlentities(lang('ds_end_time')); ?>:</label></td>
            <td class="vatop rowform"><input type="text" name="adv_enddate" id="adv_enddate" class="txt date" value="<?php echo date('Y-m-d',$adv['adv_enddate']); ?>"></td>
            <td class="vatop tips"></td>
        </tr>
        <tr id="adv_code" class="noborder">
            <input type="hidden" name="mark" value="0">
            <td class="required"><label for="file_adv_code"><?php echo htmlentities(lang('adv_img_upload')); ?>:</label></td>
            <td class="vatop rowform">
                <?php if(!(empty($adv['adv_code']) || (($adv['adv_code'] instanceof \think\Collection || $adv['adv_code'] instanceof \think\Paginator ) && $adv['adv_code']->isEmpty()))): ?>
                <span class="type-file-show"><img class="show_image" src="<?php echo htmlentities(ADMIN_SITE_ROOT); ?>/images/preview.png">
                    <div class="type-file-preview"><img src="<?php echo htmlentities(BASE_SITE_ROOT); ?>/uploads/<?php echo htmlentities(ATTACH_ADV); ?>/<?php echo htmlentities((isset($adv['adv_code']) && ($adv['adv_code'] !== '')?$adv['adv_code']:'')); ?>"></div>
                </span>
                <?php endif; ?>
                <span class="type-file-box">
                    <input type='text' name='textfield' id='textfield1' class='type-file-text' />
                    <input type='button' name='button' id='button1' value='上传' class='type-file-button' />
                    <input name="adv_code" id="file_adv_code" type="file" class="type-file-file" id="site_logo" size="30" hidefocus="true">
                </span>
            </td>
          <td class="vatop tips"><?php echo htmlentities(lang('adv_edit_support')); ?>gif,jpg,jpeg,png </td>
        </tr>
        <tr class="noborder" >
            <td class="required"><label for="adv_bgcolor"><?php echo htmlentities(lang('adv_bgcolor')); ?>:</label></td>
            <td class="vatop rowform">
                <input id="adv_bgcolor"  type="text"  name="adv_bgcolor" value="<?php echo htmlentities((isset($adv['adv_bgcolor']) && ($adv['adv_bgcolor'] !== '')?$adv['adv_bgcolor']:'#fff')); ?>"/>
            </td>
        </tr>
        <tr id="adv_link" class="noborder">
            <td class="required"><label for="adv_link"><?php echo htmlentities(lang('adv_link')); ?>:</label></td>
            <td class="vatop rowform"><input type="text" id="adv_link" name="adv_link" value="<?php echo htmlentities((isset($adv['adv_link']) && ($adv['adv_link'] !== '')?$adv['adv_link']:'')); ?>" class="txt"></td>
            <td class="vatop tips"><?php echo htmlentities(lang('adv_link_donotadd')); ?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
            <td colspan="15"><input class="btn" type="submit" value="<?php echo htmlentities(lang('ds_submit')); ?>"/></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<link href="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/colorpicker/evol.colorpicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/colorpicker/evol.colorpicker.min.js"></script>
<script type="text/javascript">
$(function(){
    $('#adv_startdate').datepicker({dateFormat: 'yy-mm-dd'});
    $('#adv_enddate').datepicker({dateFormat: 'yy-mm-dd'});
    $('#adv_bgcolor').colorpicker({showOn: 'both'});
        $("#file_adv_code").change(function () {
            $("#textfield1").val($("#file_adv_code").val());
        });
});
</script>

<script>
    //按钮先执行验证再提交表单
    $(function(){
        $('#adv_form').validate({
            errorPlacement: function(error, element){
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules : {
                adv_name : {
                    required : true
                }
            },
            messages : {
                adv_name : {
                    required : '<?php echo htmlentities(lang('ap_can_not_null')); ?>'
                }

            }
        });
    });
</script>