<?php

namespace Home\Controller;



class RoleController extends \Home\Controller\IndexController{


 
    function add(){

        if(!empty($_POST)){
                
               $admin_info=D('Role');
                       
                      
                       
                     
                        if($admin_info->create()){

                            

                                if($admin_info->add()){
                                
                                     $this->success('添加成功',U('showlist'));
                                     exit;
                                }else{
                                
                                    $sql=$admin_info->getLastSql();

                                    show_bug($sql);
                                    //$this->error('插入数失败 </br>SQL:'.$sql);
                                }



                           
                            
                           //$this->redirect('showlist',array(),2,'添加成功');
                        }else{
                            
                            $error=$admin_info->getError();
                            $this->error($error,U('showlist'));
                          
                           
                            
                        }

                    

                   
                         
               
        }else{  
            $auth_info=D('Auth');
			$data=$auth_info->getTree();

                //show_bug($data);
                //show_bug($data);die;
			$this->assign('data',$data);


        
             $this->display();
        
        }
    
       
    }

    function del($id){
            
            
            $admin_info=D('Role');


            if($admin_info->delete($id)){
            
                    $this->success('删除成功',U('showlist'));
                    exit;
                
            }else{
            
            
                    $error=$admin_info->getError();
                    $this->error($error);
            }

           
         
            
            
            
        
    
        
    }

    function update($id){
       $admin_info=D('Role');
            
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
             $auth_info=D('Auth');
			$data=$auth_info->getTree();

                //show_bug($data);
                //show_bug($data);die;
			$this->assign('data',$data); 
            
             $admin_info=$admin_info->find($id);

             //show_bug($admin_info);die;
             $this->assign('admin_info',$admin_info);
             $this->display();
        
        }
    
    }

 

    function mdel($ids){
           
               
                if(IS_POST){
               

                  
             
                            $ids=implode(',',$ids);                
                            $admin_info=D('Role');
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


            
       
        $admin_info=D('Role');
        $where=1;

      

      
        
        

        //$admin_info=$admin_info->select();

        $count=$admin_info->count();//取出管理员总记录数

        //实例化分布类 第一个参数是总记录数，第二个参数每页显示条数
        $Page=new \Think\Page($count,15);

        //分页显示输出 显示页码
        $show=$Page->show();

        //show_bug($show);
        
        $sql="select r.*,group_concat(a.auth_name) pn from php28_role r left join php28_auth a ON find_in_set(a.auth_id,r.role_auth_ids)  group by r.role_id " ;
        $list=$admin_info->query($sql);

       
     



        //$list=$admin_info->alias('r')->field(' r.*,group_concat(a.auth_name) pn')->join('left join php28_auth a ON find_in_set(a.auth_id,r.role_auth_ids)  group by r.role_id')->group('r.role_id')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            //加分级标志
          
        //show_bug($list);die;

        $admin_array=array(
            'show'=>$show,
            'list'=>$list
        );
        $this->assign('admin_array',$admin_array);
       

       
        $this->display();
    }
}