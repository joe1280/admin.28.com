<?php
namespace Home\Model;
use Think\Model;

class AdminModel extends Model{

   
    
    
        protected $_validate=array(
            
            array('username','require','用户名不能为空',1),
            
        
            array('password','require','密码不能为空','1','regex',1),
            array('password','require','密码不能为空','1','regex',4),

            array('username','','用户名已存在',1,'unique',1),
            array('username','','用户名已存在',1,'unique',2),
           
        );


       function _before_insert(&$data,$option){
       
            $data['password']=md5($data['password']);
       }
       
       function _before_update(&$data,$option){
            $data['password']=md5($data['password']);
       
        }

       function user_verify($user){
            

            $username=$user['username'];
            $pwd=md5($user['password']);

          

            //$res=$this->where('username=admin')->find();
            $res=$this->where("username='$username'")->find();

           

                if($res){
                
                    if($pwd==$res['password']){
                        session('id',$res['id']);
                        session('username',$res['username']);
                         return true;
                    
                    }else{
                    
                        return -2;
                    }
                   

                    
                        




                }
               
                return -1;

            
       }
       
       
   
}