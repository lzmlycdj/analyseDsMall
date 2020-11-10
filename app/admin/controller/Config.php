<?php

namespace app\admin\controller;

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
class Config extends AdminControl {

    public function initialize() {
        parent::initialize();
        Lang::load(base_path() . 'admin/lang/' . config('lang.default_lang') . '/config.lang.php');
    }

    public function base() {
        $config_model = model('config');
        if (!request()->isPost()) {
            $list_config = rkcache('config', true);
            View::assign('list_config', $list_config);
            /* 设置卖家当前栏目 */
            $this->setAdminCurItem('base');
            return View::fetch();
        } else {
            //上传文件保存路径
            $upload_file = BASE_UPLOAD_PATH . DIRECTORY_SEPARATOR . ATTACH_COMMON;
            if (!empty($_FILES['site_logo']['name'])) {
                $file = request()->file('site_logo');

                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => $upload_file
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                            ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'site_logo.png');
                    $upload['site_logo'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['site_logo'])) {
                $update_array['site_logo'] = $upload['site_logo'];
            }
            if (!empty($_FILES['member_logo']['name'])) {
                $file = request()->file('member_logo');

                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => $upload_file
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                            ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'member_logo.png');
                    $upload['member_logo'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['member_logo'])) {
                $update_array['member_logo'] = $upload['member_logo'];
            }
            if (!empty($_FILES['seller_center_logo']['name'])) {
                $file = request()->file('seller_center_logo');

                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => $upload_file
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                            ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'seller_center_logo.png');
                    $upload['seller_center_logo'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['seller_center_logo'])) {
                $update_array['seller_center_logo'] = $upload['seller_center_logo'];
            }
            if (!empty($_FILES['admin_backlogo']['name'])) {
                $file = request()->file('admin_backlogo');


                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => BASE_UPLOAD_PATH.DIRECTORY_SEPARATOR.'admin/common'
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                            ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'backlogo.png');
                    $upload['admin_backlogo'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['admin_backlogo'])) {
                $update_array['admin_backlogo'] = $upload['admin_backlogo'];
            }

            if (!empty($_FILES['admin_logo']['name'])) {
                $file = request()->file('admin_logo');


                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => BASE_UPLOAD_PATH.DIRECTORY_SEPARATOR.'admin/common'
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                        ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'logo.png');
                    $upload['admin_logo'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['admin_logo'])) {
                $update_array['admin_logo'] = $upload['admin_logo'];
            }


            if (!empty($_FILES['site_mobile_logo']['name'])) {
                $file = request()->file('site_mobile_logo');


                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => $upload_file
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                        ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'site_mobile_logo.png');
                    $upload['site_mobile_logo'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['site_mobile_logo'])) {
                $update_array['site_mobile_logo'] = $upload['site_mobile_logo'];
            }

            if (!empty($_FILES['site_logowx']['name'])) {
                $file = request()->file('site_logowx');


                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => $upload_file
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                            ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'site_logowx.png');
                    $upload['site_logowx'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['site_logowx'])) {
                $update_array['site_logowx'] = $upload['site_logowx'];
            }
            if (!empty($_FILES['business_licence']['name'])) {
                $file = request()->file('business_licence');

                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => $upload_file
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                            ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'business_licence.png');
                    $upload['business_licence'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['business_licence'])) {
                $update_array['business_licence'] = $upload['business_licence'];
            }

            //首页首次访问悬浮图片
            if (!empty($_FILES['fixed_suspension_img']['name'])) {
                $file = request()->file('fixed_suspension_img');

                $file_config = array(
                    'disks' => array(
                        'local' => array(
                            'root' => $upload_file
                        )
                    )
                );
                config($file_config, 'filesystem');
                try {
                    validate(['image' => 'fileSize:' . ALLOW_IMG_SIZE . '|fileExt:' . ALLOW_IMG_EXT])
                            ->check(['image' => $file]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file, 'fixed_suspension_img.png');
                    $upload['fixed_suspension_img'] = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            if (!empty($upload['fixed_suspension_img'])) {
                $update_array['fixed_suspension_img'] = $upload['fixed_suspension_img'];
            }

            $update_array['baidu_ak'] = input('post.baidu_ak');
            $update_array['site_name'] = input('post.site_name');
            $update_array['icp_number'] = input('post.icp_number');
            $update_array['site_phone'] = input('post.site_phone');
            $update_array['site_tel400'] = input('post.site_tel400');
            $update_array['site_email'] = input('post.site_email');
            $update_array['flow_static_code'] = input('post.flow_static_code');
            $update_array['site_state'] = intval(input('post.site_state'));
            $update_array['cache_open'] = intval(input('post.cache_open'));
            $update_array['closed_reason'] = input('post.closed_reason');
            $update_array['hot_search'] = input('post.hot_search');
            $update_array['h5_site_url'] = input('post.h5_site_url');
            $update_array['h5_force_redirect'] = input('post.h5_force_redirect');
            $update_array['fixed_suspension_state'] = input('post.fixed_suspension_state'); //首页首次访问悬浮状态
            $update_array['fixed_suspension_url'] = input('post.fixed_suspension_url');
            $result = $config_model->editConfig($update_array);
            if ($result) {
                $this->log(lang('ds_edit') . lang('web_set'), 1);
                $this->success(lang('ds_common_save_succ'), 'Config/base');
            } else {
                $this->log(lang('ds_edit') . lang('web_set'), 0);
            }
        }
    }

    /**
     * 防灌水设置
     */
    public function dump() {
        $config_model = model('config');
        if (!request()->isPost()) {
            $list_config = rkcache('config', true);
            View::assign('list_config', $list_config);
            /* 设置卖家当前栏目 */
            $this->setAdminCurItem('dump');
            return View::fetch();
        } else {
            $update_array = array();
            $update_array['guest_comment'] = intval(input('post.guest_comment'));
            $update_array['captcha_status_login'] = intval(input('post.captcha_status_login'));
            $update_array['captcha_status_register'] = intval(input('post.captcha_status_register'));
            $update_array['captcha_status_goodsqa'] = intval(input('post.captcha_status_goodsqa'));
            $update_array['captcha_status_storelogin'] = intval(input('post.captcha_status_storelogin'));
            $result = $config_model->editConfig($update_array);
            if ($result === true) {
                $this->log(lang('ds_edit') . lang('dis_dump'), 1);
                $this->success(lang('ds_common_save_succ'));
            } else {
                $this->log(lang('ds_edit') . lang('dis_dump'), 0);
                $this->error(lang('ds_common_save_fail'));
            }
        }
    }

    /**
     * 站内im设置
     * */
    public function im() {
        $config_model = model('config');
        if (!request()->isPost()) {
            $list_config = rkcache('config', true);
            View::assign('list_config', $list_config);
            /* 设置卖家当前栏目 */
            $this->setAdminCurItem('im');
            return View::fetch();
        } else {
            $update_array['node_site_use'] = input('post.node_site_use');
            $update_array['node_site_url'] = input('post.node_site_url');
            $result = $config_model->editConfig($update_array);
            if ($result) {
                $this->log(lang('ds_edit') . lang('im_set'), 1);
                $this->success(lang('ds_common_save_succ'), 'Config/im');
            } else {
                $this->log(lang('ds_edit') . lang('im_set'), 0);
                $this->error(lang('ds_common_save_fail'));
            }
        }
    }

    /*
     * 设置自动收货时间
     */

    public function auto() {
        $config_model = model('config');
        if (!request()->isPost()) {
            $list_config = rkcache('config', true);
            View::assign('list_config', $list_config);
            /* 设置卖家当前栏目 */
            $this->setAdminCurItem('auto');
            return View::fetch();
        } else {
            $order_auto_receive_day = intval(input('post.order_auto_receive_day'));
            $order_auto_cancel_day = intval(input('post.order_auto_cancel_day'));
            $code_invalid_refund = intval(input('post.code_invalid_refund'));
            $store_bill_cycle = intval(input('post.store_bill_cycle'));
            if ($order_auto_receive_day < 1 || $order_auto_receive_day > 100) {
                $this->error(lang('automatic_confirmation_receipt') . '1-100' . lang('numerical'));
            }
            if ($order_auto_cancel_day < 1 || $order_auto_cancel_day > 50) {
                $this->error(lang('automatic_confirmation_receipt') . '1-50' . lang('numerical'));
            }
            if ($code_invalid_refund < 1 || $code_invalid_refund > 100) {
                $this->error(lang('exchange_code_refunded_automatically') . '1-100' . lang('numerical'));
            }
            if ($store_bill_cycle < 7) {
                $this->error(lang('store_bill_cycle_error'));
            }
            $update_array['order_auto_receive_day'] = $order_auto_receive_day;
            $update_array['order_auto_cancel_day'] = $order_auto_cancel_day;
            $update_array['code_invalid_refund'] = $code_invalid_refund;
            $update_array['store_bill_cycle'] = $store_bill_cycle;
            $result = $config_model->editConfig($update_array);
            if ($result) {
                $this->log(lang('ds_edit') . lang('auto_set'), 1);
                $this->success(lang('ds_common_save_succ'), 'Config/auto');
            } else {
                $this->log(lang('ds_edit') . lang('auto_set'), 0);
                $this->error(lang('ds_common_save_fail'));
            }
        }
    }

    /**
     * 获取卖家栏目列表,针对控制器下的栏目
     */
    protected function getAdminItemList() {
        $menu_array = array(
            array(
                'name' => 'base',
                'text' => lang('ds_base'),
                'url' => (string) url('Config/base')
            ),
            array(
                'name' => 'dump',
                'text' => lang('dis_dump'),
                'url' => (string) url('Config/dump')
            ),
            array(
                'name' => 'im',
                'text' => lang('station_im_settings'),
                'url' => (string) url('Config/im')
            ),
            array(
                'name' => 'auto',
                'text' => lang('automatic_execution_time_setting'),
                'url' => (string) url('Config/auto')
            ),
        );
        return $menu_array;
    }

}
