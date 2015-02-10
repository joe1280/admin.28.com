<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function __construct(){

    
        parent::__construct();

         if(!session('id')){
         
            $this->error('必须先登录',U('Login/index'));
         }
        
    }
    public function index(){
	
        
       $this->display();

    }

      public function main(){
	
        
       $this->display();

    }

   
     public function menu(){
	
        
       $this->display();

    }
   

      public function top(){

         //show_bug(get_defined_constants(true));
	
        
       $this->display();

    }
}