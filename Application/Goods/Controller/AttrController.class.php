<?php

namespace Goods\Controller;



class AttrController extends \Home\Controller\IndexController{


 
    function add($type_id){
          
        if(IS_POST){
              
               $admin_info=D('Attr');
                       
                        
                         
                     
                        if($admin_info->create()){

                            

                                if($admin_info->add()){
                                
                                     $this->success('添加成功',U('showlist',array('type_id'=>$type_id)));
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
        
             $this->display();
        
        }
    
       
    }

    function del($id,$type_id){
            
            
            $admin_info=D('Attr');


            if($admin_info->delete($id)){
            
                    $this->success('删除成功',U('showlist',array('type_id'=>$type_id)));
                    exit;
                
            }else{
            
            
                    $error=$admin_info->getError();
                    $this->error($error);
            }

           
         
               
            
            
        
    
        
    }

    function update($id,$type_id){
       $admin_info=D('Attr');
            
          if(IS_POST){ 
            
                
            
                       
                        
                       
                     
                        if($admin_info->create()){

                                

                                if($admin_info->save()!==false){
                                
                                     $this->success('修改成功',U('showlist',array('type_id'=>$type_id)));
                                     exit;
                                }else{
                                
                                    $sql=$admin_info->getLastSql();
                                        
                                    show_bug($sql);
                                    
                                    //$this->error('修改失败 </br>SQL:'.$sql);
                                }



                           
                            
                           //$this->redirect('showlist',array(),2,'添加成功');
                        }else{
                            
                            $error=$admin_info->getError();
                            $this->error($error,U('showlist'));
                          
                           
                            
                        }

                    

                   
                         
               
        }else{

            
             $admin_info=$admin_info->find($id);
             $this->assign('admin_info',$admin_info);
             $this->display();
        
        }
    
    }

 

    function mdel($ids,$type_id){
           
               
                if(IS_POST){
               

                  
             
                            $ids=implode(',',$ids);                
                            $admin_info=D('Attr');
                            if($admin_info->delete($ids)){
                            $this->success('删除成功',U('showlist',array('type_id'=>$type_id))); 
                            exit;

                     
                      
                }else{
                
                        $sql=$admin_info->getLastSql();
                       $this->error('删除失败 SQL:='.$sql,U('showlist'));
                }


                
                     
                             

                    
        }        
                            
                     


                 
                    
                  
          
            
    
    }

    function showlist(){


            
       
        $admin_info=D('Attr');
        $where="type_id=".(int)I('get.type_id');

      

      
        
        

        //$admin_info=$admin_info->select();

        $count=$admin_info->count();//取出管理员总记录数

        //实例化分布类 第一个参数是总记录数，第二个参数每页显示条数
        $Page=new \Think\Page($count,15);

        //分页显示输出 显示页码
        $show=$Page->show();

        //show_bug($show);

        

        $list=$admin_info->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
         
        $typeModel=D('Type');
        $type=$typeModel->select();
        $this->assign('type',$type);
        

        $admin_array=array(
            'show'=>$show,
            'list'=>$list
        );
        $this->assign('admin_array',$admin_array);
       

       
        $this->display();
    }
}