<?php /*a:3:{s:76:"E:\phpStudy\PHPTutorial\WWW\www.dsmall.com\app\admin\view\adv\adv_index.html";i:1596442213;s:76:"E:\phpStudy\PHPTutorial\WWW\www.dsmall.com\app\admin\view\public\header.html";i:1596442214;s:81:"E:\phpStudy\PHPTutorial\WWW\www.dsmall.com\app\admin\view\public\admin_items.html";i:1596442214;}*/ ?>
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
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3><?php echo htmlentities(lang('adv_index_manage')); ?></h3>
            </div>
            <?php if($admin_item): ?>
<ul class="tab-base ds-row">
    <?php if(is_array($admin_item) || $admin_item instanceof \think\Collection || $admin_item instanceof \think\Paginator): if( count($admin_item)==0 ) : echo "" ;else: foreach($admin_item as $key=>$item): ?>
    <li><a href="<?php echo htmlentities($item['url']); ?>" <?php if($item['name'] == $curitem): ?>class="current"<?php endif; ?>><span><?php echo htmlentities($item['text']); ?></span></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php endif; ?>
        </div>
    </div>
    <form method="get" name="formSearch" id="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo htmlentities(lang('adv_ap_id')); ?></dt>
                <dd>
                    <select name="ap_id">
                        <option value=""><?php echo htmlentities(lang('ds_please_choose')); ?>...</option>
                        <?php if(is_array($ap_list) || $ap_list instanceof \think\Collection || $ap_list instanceof \think\Paginator): if( count($ap_list)==0 ) : echo "" ;else: foreach($ap_list as $key=>$ap_v): ?>
                        <option value="<?php echo htmlentities($ap_v['ap_id']); ?>" <?php if(app('request')->param('ap_id') == $ap_v['ap_id']): ?>selected<?php endif; ?>><?php echo htmlentities($ap_v['ap_name']); ?>[<?php echo htmlentities($ap_v['ap_width']); ?>X<?php echo htmlentities($ap_v['ap_height']); ?>]</option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select> 
                </dd>
            </dl>
            <div class="btn_group">
                <input type="submit" class="btn" value="<?php echo htmlentities(lang('ds_search')); ?>">
                <?php if($filtered): ?>
                <a href="<?php echo url('Adv/adv'); ?>" class="btn btn-default" title="<?php echo htmlentities(lang('ds_cancel')); ?>"><?php echo htmlentities(lang('ds_cancel')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </form>
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo htmlentities(lang('ds_explanation_tip')); ?>"><?php echo htmlentities(lang('ds_explanation')); ?></h4>
            <span id="explanationZoom" title="<?php echo htmlentities(lang('ds_explanation_close')); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo htmlentities(lang('adv_help3')); ?></li>
        </ul>
</div>

    <div class="fixed-empty"></div>
    <form method="post" id="store_form">
        <table class="ds-default-table">
            <thead>
                <tr class="thead">
                    <th class="w24"></th>
                    <th class="w300"><?php echo htmlentities(lang('adv_name')); ?></th>
                    <th class="w300"><?php echo htmlentities(lang('adv_ap_id')); ?></th>
                    <th class="w60"><?php echo htmlentities(lang('adv_sort')); ?></th>
                    <th class="w60"><?php echo htmlentities(lang('adv_clicknum')); ?></th>
                    <th class="w200"><?php echo htmlentities(lang('adv_code')); ?></th>
                    <th class="w60"><?php echo htmlentities(lang('adv_enabled')); ?></th>
                    <th class="w150"><?php echo htmlentities(lang('ds_start_time')); ?></th>
                    <th class="w150"><?php echo htmlentities(lang('ds_end_time')); ?></th>
                    <th class="align-center"><?php echo htmlentities(lang('ds_handle')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if(!(empty($adv_info) || (($adv_info instanceof \think\Collection || $adv_info instanceof \think\Paginator ) && $adv_info->isEmpty()))): if(is_array($adv_info) || $adv_info instanceof \think\Collection || $adv_info instanceof \think\Paginator): if( count($adv_info)==0 ) : echo "" ;else: foreach($adv_info as $key=>$v): ?>
                <tr class="hover" id="ds_row_<?php echo htmlentities($v['adv_id']); ?>">
                    <td class="w24"><input type="checkbox" class="checkitem" name="del_id[]" value="<?php echo htmlentities($v['adv_id']); ?>" /></td>
                    <td class="name"><span class="editable"  ds_type="inline_edit" ajax_branch='adv_branch' fieldname="adv_title" fieldid="<?php echo htmlentities($v['adv_id']); ?>" required="1"  title="<?php echo htmlentities(lang('ds_editable')); ?>"><?php echo htmlentities($v['adv_title']); ?></span></td>
                    <td>
                        <?php if(is_array($ap_list) || $ap_list instanceof \think\Collection || $ap_list instanceof \think\Paginator): if( count($ap_list)==0 ) : echo "" ;else: foreach($ap_list as $key=>$ap_v): if($ap_v['ap_id'] === $v['ap_id']): ?>
                        <span title="<?php echo htmlentities($ap_v['ap_name']); ?>"><?php echo htmlentities($ap_v['ap_name']); ?></span>
                        <?php endif; ?>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                    <td class="sort"><span title="<?php echo htmlentities(lang('ds_editable')); ?>" ajax_branch="adv_branch" datatype="number" fieldid="<?php echo htmlentities($v['adv_id']); ?>" fieldname="adv_sort" ds_type="inline_edit" class="editable"><?php echo htmlentities($v['adv_sort']); ?></span></td>
                    <td><?php echo htmlentities((isset($v['adv_clicknum']) && ($v['adv_clicknum'] !== '')?$v['adv_clicknum']:'0')); ?></td>
                    <td><a data-lightbox="lightbox-image" data-title="<?php echo htmlentities($v['adv_title']); ?>" href="<?php echo htmlentities(UPLOAD_SITE_URL); ?>/<?php echo htmlentities(ATTACH_ADV); ?>/<?php echo htmlentities($v['adv_code']); ?>"><img src="<?php echo htmlentities(UPLOAD_SITE_URL); ?>/<?php echo htmlentities(ATTACH_ADV); ?>/<?php echo htmlentities($v['adv_code']); ?>" onload="javascript:ResizeImage(this,60,60);" /></a></td>
                    <td class="yes-onoff">
                        <?php if($v['adv_enabled'] == '0'): ?>
                        <a href="JavaScript:void(0);" class=" disabled" ajax_branch="adv_branch" ds_type="inline_edit" fieldname="adv_enabled" fieldid="<?php echo htmlentities($v['adv_id']); ?>" fieldvalue="0" title="<?php echo htmlentities(lang('ds_editable')); ?>"><img src="<?php echo htmlentities(ADMIN_SITE_ROOT); ?>/images/treetable/transparent.gif"></a>
                        <?php else: ?>
                        <a href="JavaScript:void(0);" class=" enabled" ajax_branch="adv_branch" ds_type="inline_edit" fieldname="adv_enabled" fieldid="<?php echo htmlentities($v['adv_id']); ?>" fieldvalue="1" title="<?php echo htmlentities(lang('ds_editable')); ?>"><img src="<?php echo htmlentities(ADMIN_SITE_ROOT); ?>/images/treetable/transparent.gif"></a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlentities(date('Y-m-d',!is_numeric($v['adv_startdate'])? strtotime($v['adv_startdate']) : $v['adv_startdate'])); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d',!is_numeric($v['adv_enddate'])? strtotime($v['adv_enddate']) : $v['adv_enddate'])); ?></td>
                    <td>
                     <a href="javascript:dsLayerOpen('<?php echo url('Adv/adv_edit',['adv_id'=>$v['adv_id']]); ?>','<?php echo htmlentities(lang('ds_edit')); ?>-<?php echo htmlentities($v['adv_title']); ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo htmlentities(lang('ds_edit')); ?></a>
                     <a href="javascript:dsLayerConfirm('<?php echo url('Adv/adv_del',['adv_id'=>$v['adv_id']]); ?>','<?php echo htmlentities(lang('ds_ensure_del')); ?>',<?php echo htmlentities($v['adv_id']); ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo htmlentities(lang('ds_del')); ?></a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <tr class="no_data">
                    <td colspan="15"><?php echo htmlentities($ap_name); ?><?php echo htmlentities(lang('ds_no_record')); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php echo $show_page; ?>
    </form>
</div>
<script type="text/javascript" src="<?php echo htmlentities(ADMIN_SITE_ROOT); ?>/js/jquery.edit.js" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/jquery.lightbox/css/lightbox.min.css">
<script src="<?php echo htmlentities(PLUGINS_SITE_ROOT); ?>/js/jquery.lightbox/js/lightbox.min.js"></script>