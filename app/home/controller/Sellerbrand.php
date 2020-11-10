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
class Sellerbrand extends BaseSeller {

    public function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
        Lang::load(base_path() . 'home/lang/' . config('lang.default_lang') . '/sellerbrand.lang.php');
    }

    /**
     * 品牌列表
     */
    public function index() {
        $brand_model = model('brand');
        $condition = array();
        $condition[] = array('store_id', '=', session('store_id'));
        if (!empty(input('param.brand_name'))) {
            $condition[] = array('brand_name', 'like', '%' . input('param.brand_name') . '%');
        }

        $brand_list = $brand_model->getBrandList($condition, '*', 10);
        View::assign('brand_list', $brand_list);
        View::assign('show_page', $brand_model->page_info->render());

        $this->setSellerCurMenu('seller_brand');
        $this->setSellerCurItem('brand_list');
        return View::fetch($this->template_dir . 'index');
    }

    /**
     * 品牌添加页面
     */
    public function brand_add() {
        $brand_model = model('brand');
        if (input('param.brand_id') != '') {
            $brand_array = $brand_model->getBrandInfo(array(
                'brand_id' => input('param.brand_id'),
                'store_id' => session('store_id')
            ));
            if (empty($brand_array)) {
                $this->error(lang('param_error'));
            }
            View::assign('brand_array', $brand_array);
        }

        // 一级商品分类
        $gc_list = model('goodsclass')->getGoodsclassListByParentId(0);
        View::assign('gc_list', $gc_list);

        echo View::fetch($this->template_dir . 'add');
    }

    /**
     * 品牌保存
     */
    public function brand_save() {

        $brand_model = model('brand');
        if (request()->isPost()) {
            /**
             * 验证
             */
            $data = [
                'brand_name' => input('param.brand_name'),
                'brand_initial' => input('param.brand_initial'),
            ];
            $sellerbrand_validate = ds_validate('sellerbrand');
            if (!$sellerbrand_validate->scene('brand_save')->check($data)) {
                ds_json_encode(10001, $sellerbrand_validate->getError());
            }

            /**
             * 上传图片
             */
            $brand_pic = '';
            if (!empty($_FILES['brand_pic']['name'])) {
                $upload_file = BASE_UPLOAD_PATH . DIRECTORY_SEPARATOR . ATTACH_BRAND;
                $file_name = session('store_id') . '_' . date('YmdHis') . rand(10000, 99999).'.png';
                $file_object = request()->file('brand_pic');

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
                            ->check(['image' => $file_object]);
                    $file_name = \think\facade\Filesystem::putFileAs('', $file_object, $file_name);
                    $brand_pic = $file_name;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            }
            $insert_array = array();
            $insert_array['brand_name'] = trim(input('param.brand_name'));
            $insert_array['brand_initial'] = strtoupper(input('param.brand_initial'));
            $insert_array['gc_id'] = input('param.class_id');
            $insert_array['brand_class'] = input('param.brand_class');
            $insert_array['brand_pic'] = $brand_pic;
            $insert_array['brand_apply'] = 0;
            $insert_array['store_id'] = session('store_id');

            $result = $brand_model->addBrand($insert_array);
            if ($result) {
                $this->success(lang('store_goods_brand_apply_success'), (string) url('Sellerbrand/index'));
            } else {
                $this->error(lang('ds_common_save_fail'));
            }
        }
    }

    /**
     * 品牌修改
     */
    public function brand_edit() {
        $brand_model = model('brand');

        $brand_id = intval(input('post.brand_id'));
        if ($brand_id <= 0) {
            $this->error(lang('ds_common_save_fail'));
        }

        if (request()->isPost()) {
            /**
             * 验证
             */
            $data = [
                'brand_name' => input('post.brand_name'),
                'brand_initial' => input('post.brand_initial'),
            ];
            $sellerbrand_validate = ds_validate('sellerbrand');
            if (!$sellerbrand_validate->scene('brand_edit')->check($data)) {
                $this->error($sellerbrand_validate->getError());
            } else {
                /**
                 * 上传图片
                 */
                if (!empty($_FILES['brand_pic']['name'])) {
                    $upload_file = BASE_UPLOAD_PATH . DIRECTORY_SEPARATOR . ATTACH_BRAND;
                    $file_name = session('store_id') . '_' . date('YmdHis') . rand(10000, 99999).'.png';
                    $file_object = request()->file('brand_pic');


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
                                ->check(['image' => $file_object]);
                        $file_name = \think\facade\Filesystem::putFileAs('', $file_object, $file_name);
                        $brand_pic = $file_name;
                        //删除图片
                        $brand_info = $brand_model->getBrandInfo(array('brand_id' => $brand_id));
                        if (!empty($brand_info['brand_pic'])) {
                            @unlink(BASE_UPLOAD_PATH . DIRECTORY_SEPARATOR . ATTACH_BRAND . DIRECTORY_SEPARATOR . $brand_info['brand_pic']);
                        }
                    } catch (\Exception $e) {
                        $this->error($e->getMessage());
                    }
                }
                $condition = array();
                $condition[] = array('brand_id', '=', $brand_id);
                $update_array = array();
                $update_array['brand_initial'] = strtoupper(input('post.brand_initial'));
                $update_array['brand_name'] = trim(input('post.brand_name'));
                $update_array['gc_id'] = input('post.class_id');
                $update_array['brand_class'] = input('post.brand_class');
                if (!empty($brand_pic)) {
                    $update_array['brand_pic'] = $brand_pic;
                }

                $result = $brand_model->editBrand($condition, $update_array);
                if ($result) {
                    $this->success(lang('ds_common_save_succ'), (string) url('Sellerbrand/index'));
                } else {
                    $this->error(lang('ds_common_save_fail'));
                }
            }
        } else {
            $this->error(lang('ds_common_save_fail'));
        }
    }

    /**
     * 品牌删除
     */
    public function drop_brand() {
        $brand_model = model('brand');
        $brand_id = intval(input('param.brand_id'));
        if ($brand_id > 0) {
            $brand_model->delBrand(array(
                'brand_id' => $brand_id, 'brand_apply' => 0, 'store_id' => session('store_id')
            ));
            ds_json_encode(10000, lang('ds_common_del_succ'));
        } else {
            ds_json_encode(10001, lang('ds_common_del_fail'));
        }
    }

    /**
     * 用户中心右边，小导航
     *
     * @param string $menu_type 导航类型
     * @param string $menu_key 当前导航的menu_key
     * @param array $array 附加菜单
     * @return
     */
    protected function getSellerItemList() {
        $menu_array = array(
            array(
                'name' => 'brand_list', 'text' => lang('ds_member_path_brand_list'),
                'url' => (string) url('Sellerbrand/index')
            )
        );

        return $menu_array;
    }

}