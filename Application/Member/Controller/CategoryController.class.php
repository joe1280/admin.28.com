<?php

namespace Member\Controller;



class CategoryController extends \Home\Controller\IndexController{


 
    function add(){

        if(!empty($_POST)){
                
               $admin_info=D('Category');
                       
                        
                       
                     
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
        
             $this->display();
        
        }
    
       
    }

    function del($id){
            
            
            $admin_info=D('Category');


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

            
             $admin_info=$admin_info->find($id);
             $this->assign('admin_info',$admin_info);
             $this->display();
        
        }
    
    }

 

    function mdel($ids){
           
               
                if(IS_POST){
               

                  
             
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
            foreach($list as $k=>$v){
            $flag=str_repeat('--/',$v['auth_level']);
            $list[$k]['auth_name']=$flag.$v['auth_name'];
        }

        

        $admin_array=array(
            'show'=>$show,
            'list'=>$list
        );
        $this->assign('admin_array',$admin_array);
       

       
        $this->display();
    }
}