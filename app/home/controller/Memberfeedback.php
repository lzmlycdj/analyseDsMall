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
class Memberfeedback extends BaseMember {

    public function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
        Lang::load(base_path() . 'home/lang/'.config('lang.default_lang').'/memberfeedback.lang.php');
    }

    /*
     * 反馈列表
     */

    public function index() {
        $feedback_model = model('feedback');
        $condition = array(
            'member_id' => session('member_id')
        );
        $feedback_list = $feedback_model->getFeedbackList($condition,10);
        /* 设置买家当前菜单 */
        $this->setMemberCurMenu('member_feedback');
        /* 设置买家当前栏目 */
        $this->setMemberCurItem('feedback_list');
        View::assign('feedback_list', $feedback_list);
        View::assign('show_page', $feedback_model->page_info->render());
        return View::fetch($this->template_dir . 'index');
    }

    public function add(){
        if (request()->isPost()) {
            $feedback_model = model('feedback');
            $param = array();
            $param['fb_content'] = input('param.fb_content');
            $param['fb_type'] = 2;
            $param['fb_time'] = TIMESTAMP;
            $param['member_id'] = session('member_id');
            $param['member_name'] = session('member_name');

            $result = $feedback_model->addFeedback($param);

            if ($result) {
                ds_json_encode(10000, lang('ds_common_op_succ'));
            } else {
                ds_json_encode(10001, lang('ds_common_op_fail'));
            }
        }else{
            $this->setMemberCurMenu('member_feedback');
            /* 设置买家当前栏目 */
            $this->setMemberCurItem('feedback_add');
            return View::fetch($this->template_dir . 'add');
        }
    }

    /**
     * 用户中心右边，小导航
     *
     * @param string $menu_type 导航类型
     * @param string $menu_key 当前导航的menu_key
     * @param array $array 附加菜单
     *
     * @return
     */
    public function getMemberItemList() {
        $menu_array = array(
            array(
                'name' => 'feedback_list',
                'text' => lang('feedback_list'),
                'url' => (string)url('Memberfeedback/index')
            ),
            array(
                'name' => 'feedback_add',
                'text' => lang('feedback_add'),
                'url' => (string)url('Memberfeedback/add'),
            )
        );

        return $menu_array;
    }

}
