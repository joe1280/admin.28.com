<?php

namespace Goods\Controller;



class CategoryController extends \Home\Controller\IndexController{


 
    function add(){
    $admin_info=D('Category');
              
        if(IS_POST){
               
               
              
                      
                        
                       
                     
                        if($admin_info->create()){

                            

                                if($admin_info->add()){
                                
                                     $this->success('添加成功',U('showlist'));
                                     exit;
                                }else{
                                
                                    $sql=$admin_info->getLastSql();
                                    $this->error('插入数失败 </br>SQL:'.$sql);
                                }



                           
                            
                           //$this->redirect('showlist',array(),2,'添加成功');
                        }else{
                            
                            $error=$admin_info->getError();
                            $this->error($error,U('showlist'));
                          
                           
                            
                        }

                    

                   
                         
               
        }else{
            $typeModel=D('Type');
            $type_info=$typeModel->select();
            //show_bug($type_info);die;
            $this->assign('type_info',$type_info);
            
              //$auth=$admin_info->$find();
            //获取得所有分类
            $cat_data = $admin_info->get_cat();
            
            $this->assign('cat_data', $cat_data);

            $this->display();
            
        
             
        
        }
    
       
    }

    function del($id){
            
            
            $admin_info=D('Category');
            
                $id_arr = $admin_info->getChild($id);
                $id_arr[] = $id;

                $id = implode(',', $id_arr);

            if($admin_info->delete($id)){
            
                    $this->success('删除成功',U('showlist'));
                    exit;
                
            }else{
            
            
                    $error=$admin_info->getError();
                    $this->error($error);
            }

           
         
               
            
            
        
    
        
    }

    function update($id){
       $admin_info=D('Category');
            
          if(!empty($_POST)){
                
             
                       
                        
                       
                     
                        if($admin_info->create()){

                                

                                if($admin_info->save()!==false){
                                
                                     $this->success('修改成功',U('showlist'));
                                     exit;
                                }else{
                                
                                    $sql=$admin_info->getLastSql();

                                   
                                    $this->error('修改失败 </br>SQL:'.$sql);
                                }



                           
                            
                           //$this->redirect('showlist',array(),2,'添加成功');
                        }else{
                            
                            $error=$admin_info->getError();
                            $this->error($error,U('showlist'));
                          
                           
                            
                        }

                    

                   
                         
               
        }else{

              $typeModel=D('Type');
            $type_info=$typeModel->select();
            //show_bug($type_info);die;
            $this->assign('type_info',$type_info);
            
              //获取得所有分类
            $cat_data = $admin_info->get_cat();
            
            $this->assign('cat_data', $cat_data);

           
           
            
             $admin_info=$admin_info->find($id);
             $this->assign('admin_info',$admin_info);
            
              $attr_info=D('Attr')->where("id IN ({$admin_info['cat_attr_id']})")->select();
             $this->assign('attr_info',$attr_info);
              //show_bug($attr_info);die;
             $this->display(); 
        
        }
    
    }

 

    function mdel($ids){
             $auth_info = D('Category');
               
                if(IS_POST){

                                    $id_arr = array();     
                                    foreach ($ids as $id) {

                                    $son_id = $auth_info->getChild($id);
                                    $id_arr = array_merge($id_arr, $son_id);
                                    $id_arr[] = $id;     
                                    }

                            $ids=implode(',',$ids);                
                            $admin_info=D('Category');
                            if($admin_info->delete($ids)){
                            $this->success('删除成功',U('showlist')); 
                            exit;

                     
                      
                }else{
                
                        $sql=$admin_info->getLastSql();
                       $this->error('删除失败 SQL:='.$sql,U('showlist'));
                }


                
                     
                             

                    
                
                            
                     


                }           
                    
                  
          
            
    
    }

    function showlist(){


            
       
        $admin_info=D('Category');
        $where=1;

      

      
        
        

        //$admin_info=$admin_info->select();

        $count=$admin_info->count();//取出管理员总记录数

        //实例化分布类 第一个参数是总记录数，第二个参数每页显示条数
        $Page=new \Think\Page($count,15);

        //分页显示输出 显示页码
        $show=$Page->show();

        //show_bug($show);

        

        $list=$admin_info->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            //加分级标志
          $list = $admin_info->get_cat();
        

        $admin_array=array(
            'show'=>$show,
            'list'=>$list
        );
        $this->assign('admin_array',$admin_array);
       

       
        $this->display();
    }
   function getAttr($type_id){
       $attrModel=D('Attr');
       $attr_info=$attrModel->where("type_id='$type_id'")->select();
       echo json_encode($attr_info);
   }
}