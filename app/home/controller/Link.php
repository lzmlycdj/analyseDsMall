<?php

namespace app\home\controller;
use think\facade\View;
use think\facade\Lang;

/**
 * ============================================================================
 * DSMall多用户商城
 * ============================================================================
 * 版权所有 2014-2028 长沙德尚网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.csdeshang.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 控制器
 */
class Link extends BaseMall {

    public function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
        Lang::load(base_path() . 'home/lang/'.config('lang.default_lang').'/link.lang.php');
    }

    public function index() {
        //把加密的用户id写入cookie
        $uid = input('uid');
        cookie('uid', $uid);

        //友情连接内容
        $link_model = model('link');
        $link_list = $link_model->getLinkList();
        /**
         * 整理图片链接
         */
        if (is_array($link_list)) {
            foreach ($link_list as $k => $v) {
                if (!empty($v['link_pic'])) {
                    $link_list[$k]['link_pic'] = UPLOAD_SITE_URL . '/' . DIR_ADMIN . '/link' . '/' . $v['link_pic'];
                }
            }
        }
        View::assign('link_list', $link_list);
        View::assign('link', 'index');
        return View::fetch($this->template_dir . 'link');
    }
}

?>
