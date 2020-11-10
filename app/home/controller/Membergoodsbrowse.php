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
class Membergoodsbrowse extends BaseMember {

    public function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
        Lang::load(base_path() . 'home/lang/'.config('lang.default_lang').'/membergoodsbrowse.lang.php');
    }

    /**
     * 浏览历史列表
     */
    public function listinfo() {
        $goodsbrowse_model = model('goodsbrowse');
        //商品分类缓存
        $gc_list = model('goodsclass')->getGoodsclassForCacheModel();
        //查询浏览记录
        $condition = array();
        $condition[] = array('member_id','=',session('member_id'));
        $gc_id = intval(input('param.gc_id'));
        $gc_depth=isset($gc_list[$gc_id]['depth'])?$gc_list[$gc_id]['depth']:1;
        if ($gc_id > 0) {
            $condition[] = array('gc_id_'.$gc_depth,'=',$gc_id);
        }
        $browselist_tmp = $goodsbrowse_model->getViewedGoodsList(session('member_id'), 20);
        $browselist = array();
        foreach ((array) $browselist_tmp as $k => $v) {
            $browselist[$v['goods_id']] = $v;
        }
        //查询商品信息
        $browselist_new = array();
        if ($browselist) {
            $goods_list_tmp = model('goods')->getGoodsList(array(array('goods_id','in', array_keys($browselist))), 'goods_id, goods_name, goods_promotion_price,goods_promotion_type, goods_marketprice, goods_image, store_id, gc_id, gc_id_1, gc_id_2, gc_id_3');
            $goods_list = array();
            foreach ((array) $goods_list_tmp as $v) {
                $goods_list[$v['goods_id']] = $v;
            }
            foreach ($browselist as $k => $v) {
                if ($goods_list[$k]) {
                    $tmp = array();
                    $tmp = $goods_list[$k];
                    $tmp["goodsbrowse_time"] = $v['goodsbrowse_time'];
                    if (date('Y-m-d', $v['goodsbrowse_time']) == date('Y-m-d', TIMESTAMP)) {
                        $tmp['browsetime_day'] = lang('today');
                    } elseif (date('Y-m-d', $v['goodsbrowse_time']) == date('Y-m-d', (TIMESTAMP - 86400))) {
                        $tmp['browsetime_day'] = lang('yesterday');
                    } else {
                        $tmp['browsetime_day'] = date('Y年m月d日', $v['goodsbrowse_time']);
                    }
                    $tmp['browsetime_text'] = $tmp['browsetime_day'] . date('H:i', $v['goodsbrowse_time']);
                    $browselist_new[] = $tmp;
                }
            }
        }
        
        //查询浏览记录商品分类
        $browseclass_list = $goodsbrowse_model->getViewedGoodsList(session('member_id'),20);
        $browseclass_arr = array();
        foreach ((array) $browseclass_list as $k => $v) {
            if ($v['gc_id_1'] > 0) {
                @$browseclass_arr[$v['gc_id_1']] = array('gc_name' => $gc_list[$v['gc_id_1']]['gc_name'], 'sonclass' => array());
            }
            if ($v['gc_id_2'] > 0) {
                @$browseclass_arr[$v['gc_id_1']]['sonclass'][$v['gc_id_2']] = array('gc_name' => $gc_list[$v['gc_id_2']]['gc_name'], 'sonclass' => array());
            }
        }
        $this->setMemberCurMenu('member_goodsbrowse');
        $this->setMemberCurItem('index');
        View::assign('browseclass_arr', $browseclass_arr);
        View::assign('browselist', $browselist_new);
        //View::assign('show_page', $goodsbrowse_model->page_info->render());
        return View::fetch($this->template_dir . 'index');
    }

    /**
     * 删除浏览历史
     */
    public function del() {
        $return_arr = array();
        $goodsbrowse_model = model('goodsbrowse');
        if (trim(input('param.goods_id')) == 'all') {
            //清除缓存中浏览记录
            dcache(session('member_id'), 'goodsbrowse');
            $goodsbrowse_model->delGoodsbrowse(array('member_id' => session('member_id')));
            $return_arr = array('done' => true);
        } elseif (intval(input('param.goods_id')) >= 0) {
            $goods_id = intval(input('param.goods_id'));
            if (config('ds_config.cache_open')) {
                //清除缓存中的浏览记录
                $browse_goodsid = rcache(session('member_id'), 'goodsbrowse');
                $goodsid_arr = $browse_goodsid['goodsid'] ? unserialize($browse_goodsid['goodsid']) : array();
                if (isset($browse_goodsid[$goods_id])) {
                    unset($browse_goodsid[$goods_id]);
                }
                if ($goodsid_arr) {
                    $goodsid_arr = array_diff($goodsid_arr, array($goods_id));
                    $browse_goodsid['goodsid'] = serialize($goodsid_arr);
                }
                wcache(session('member_id'), $browse_goodsid, 'goodsbrowse');
            }
            $goodsbrowse_model->delGoodsbrowse(array('member_id' => session('member_id'), 'goods_id' => $goods_id));
            $return_arr = array('done' => true);
        } else {
            $return_arr = array('done' => false, 'msg' => lang('param_error'));
        }
        echo json_encode($return_arr);
    }

    protected function getMemberItemList() {
        $menu_array = array(
            array(
                'name' => 'index', 'text' => lang('my_footprint'), 'url' => (string)url('Membergoodsbrowse/listinfo')
            )
        );
        return $menu_array;
    }

}