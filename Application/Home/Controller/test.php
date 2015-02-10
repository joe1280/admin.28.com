<?php

 function mdel() {
        $auth_info = D('Auth');

        $ids = I('post.ids');

            if (IS_POST) {


            $id_arr = array();
            foreach ($ids as $id) {

                $son_id = $auth_info->getChild($id);
                $son_ids = array_merge($id_arr, $son_id);
                $son_ids[] = $id;
            }
            show_bug($son_ids);
            die;

            $ids = array_unique($son_ids);

            $ids = implode(',', $ids);

            if ($auth_info->delete($ids)) {
                $this->success('删除成功', U('showlist'));
                exit;
            } else {

                $sql = $auth_info->getLastSql();
                $this->error('删除失败 SQL:=' . $sql, U('showlist'));
            }
        }
    }

