<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{


    function index(){
         
        if(!empty($_POST)){
            $verify=new \Think\Verify();

                if($verify->check($_POST['captcha'])){
                         $user=new \Home\Model\AdminModel();
              if($user->create($POST,4)){
                    

                    $rz=$user->user_verify($_POST);
                      if($rz==true){
                      
                        $this->success('登录成功',U('Index/index'));
                      }elseif($rz==-1){
                          $this->error('用户名不存在');
                      
                      }elseif($rz==-2){	   
                            $this->error('密码错误');
                      }
                      
                         
                     
                   
                        
                        
                        
					
                         
                          ;
              }else{
              
              
                    $this->error($user->getError());
              
              }
                      
                
        
        }else{
                
              $this->error('验证码错误');
        
        }
                    
               
                      
                    
                
              
            
              
			  
			    
                 
             
                  

            
                 

                  
                    
                   
               
                
            

        }else{
            
            $this->display();
            
        }

        
          


        
        
    }

    function logout(){
    
        session(null);
        $this->success('退出成功',U('Login/index'));
    }

    function verify(){

        $config =    array(    'fontSize'    =>   16,    // 验证码字体大小    
                                'length'      =>   4,     // 验证码位数   
                                'useNoise'    =>    false,  //
                           )
                                   ;
        $Verify = new \Think\Verify($config);
        $Verify->entry();
        
    }
}