<?php

namespace Home\Controller;

class AuthController extends \Home\Controller\IndexController {

    function add() {
        $admin_info = D('Auth');
        if (!empty($_POST)) {






            if ($admin_info->create()) {



                if ($admin_info->add()) {

                    $this->success('添加成功', U('showlist'));
                    exit;
                } else {

                    $sql = $admin_info->getLastSql();
                    $this->error('插入数失败 </br>SQL:' . $sql);
                }





                //$this->redirect('showlist',array(),2,'添加成功');
            } else {

                $error = $admin_info->getError();
                $this->error($error, U('showlist'));
            }
        } else {

            //$auth=$admin_info->$find();
            //获取得所有权限
            $data = $admin_info->getTree();
            //show_bug($data);die;
            $this->assign('data', $data);

            $this->display();
        }
    }

    function del($id) {


        $admin_info = D('Auth');
        $id_arr = $admin_info->getChild($id);
        $id_arr[] = $id;

        $id = implode(',', $id_arr);
        //show_bug($id_arr);die;




        if ($admin_info->delete($id)) {

            $this->success('删除成功', U('showlist'));
            exit;
        } else {


            $error = $admin_info->getError();
            $this->error($error);
        }
    }

    function update($id) {
        $admin_info = D('Auth');



        if (!empty($_POST)) {






            if ($admin_info->create()) {

                //show_bug($amdin_info->save());


                if ($admin_info->save() !== false) {

                    $this->success('修改成功', U('showlist'));
                    exit;
                } else {


                    $sql = $admin_info->getLastSql();

                    show_bug($sql);
                    //$this->error('修改失败 </br>SQL:'.$sql);
                }





                //$this->redirect('showlist',array(),2,'添加成功');
            } else {

                $error = $admin_info->getError();
                $this->error($error, U('showlist'));
            }
        } else {


            $data = $admin_info->getTree();

            //show_bug($data);
            //show_bug($data);die;
            $this->assign('data', $data);

            $admin_info = $admin_info->find($id);
            $this->assign('admin_info', $admin_info);

            ///show_bug($admin_info);


            $this->display();
        }
    }

    function mdel2() {


        $ids = I('post.ids');

        if (ids) {
          $model = D('Auth');
            show_bug($ids);
           $id_arr= array();
            foreach ($ids as $id) {

               $_children = $model->getChild($id);
                $id_arr = array_merge($id_arr,$_children);
                $id_arr[] = $id;
            }
           

            $ids = array_unique($id_arr);

            $ids = implode(',', $ids);

            if ($auth_info->delete($ids)) {
                $this->success('删除成功', U('showlist'));
                exit;
            }
        }
    }
    
    
    function mdel() {
        $auth_info = D('Auth');

        $ids = I('post.ids');

            if (IS_POST) {


            $id_arr = array();
            foreach ($ids as $id) {

                $son_id = $auth_info->getChild($id);
                $id_arr = array_merge($id_arr, $son_id);
                $id_arr[] = $id;
            }
            

            $ids = array_unique($id_arr);

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


    function showlist() {




        //$admin_info=M('Auth');
        $admin_info = new \Home\Model\AuthModel();


        $where = 1;







        //$admin_info=$admin_info->select();
        //$count=$admin_info->count();//取出管理员总记录数
        //实例化分布类 第一个参数是总记录数，第二个参数每页显示条数
        //$Page=new \Think\Page($count,15);
        //分页显示输出 显示页码
        //$show=$Page->show();
        //show_bug($show);
        //$list=$admin_info->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();//$list是一个二维数组;
        //show_bug($list);

        $list = $admin_info->getTree();

        // show_bug($list);die;




        $admin_array = array(
            'show' => $show,
            'list' => $list
        );
        $this->assign('admin_array', $admin_array);



        $this->display();
    }

}
