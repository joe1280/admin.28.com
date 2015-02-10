<?php
namespace Gii\Controller;
use Think\Controller;
class IndexController extends Controller{

    
    public function index(){
        
    
                        

        if(IS_POST){
        
            $tabName=I('post.tabName');
	        $modName=ucfirst(I('post.modName'));
            $dir_c='./Application/'.$modName.'/Controller/'; //生成控制器文件夹
            $dir_model='./Application/'.$modName.'/Model/'; //生成控制器文件夹 

            $tabname=$this->table($tabName);
            $dir_view='./Application/'.$modName.'/View/'.$tabname.'/';
            if(!is_dir($dir_c))
            
                mkdir($dir_c,0777,true);
            
             if(!is_dir($dir_model))
            
                mkdir($dir_model,0777,true);
            

            if(!is_dir($dir_view))
                mkdir($dir_view,0777,true);
				
                
				$controller_name=$tabname.'Controller.class.php';
                $model_name=$tabname.'Model.class.php';
                $view_name=$tabname.'Model.class.php';
				//生成控制器
				ob_start();
				
				include("./Application/Gii/Template/controller.php");
               
				
				$str=ob_get_clean();

              
				
				file_put_contents($dir_c.$controller_name,"<?php\r\n".$str);
				

                $db=M();
                $fields=$db->query('show full fields from '.$tabName);
                //show_bug($fields);
               // exit;
			    //生成Model
				
			
			        ob_start();
				
				include("./Application/Gii/Template/model.php");
               
				
				   $str=ob_get_clean();

             
				
				file_put_contents($dir_model.$model_name,"<?php\r\n".$str);
       
             
        
			
                //生成add.html
                    ob_start();
                
				include("./Application/Gii/Template/add.html");
               
				
				   $str=ob_get_clean();

             
				
				file_put_contents($dir_view.'add.html',$str);
                
              //生成showlist.html
                 ob_start();
                include("./Application/Gii/Template/showlist.html");
               
				
				   $str=ob_get_clean();

             
				
				file_put_contents($dir_view.'showlist.html',$str);
            //生成update
                 ob_start();
                include("./Application/Gii/Template/update.html");
               
				
				   $str=ob_get_clean();

             
				
				file_put_contents($dir_view.'update.html',$str);
                      $top_auths=I('post.top_auth'); 
                      $auth=D('Auth');
                      $top_auth=$auth->where("auth_name='$top_auths'and auth_level=0")->find();
                     
                      if($top_auth){
                         
                          $top_auth_id=$top_auth['auth_id'];
                      }else{
                        
                          $auth_arr=array(
                              
                              'auth_name'=>$top_auths,
                              'auth_m'=>'',
                              'auth_c'=>'',
                              'auth_a'=>'',
                              'auth_pid'=>0,
                              'auth_level'=>'0'
                              
                              );    
                     
                          $top_auth_id=$auth->add($auth_arr);
                         
                      }
                          
                      
                      //在顶级权限添加二级权限
                      $son_auth=I('post.son_auth');
                       $son_arr=array(
                              'auth_name'=>$son_auth.'列表',
                              'auth_m'=>$modName,
                              'auth_c'=>$tabname,
                              'auth_a'=>'showlist',
                              'auth_pid'=>$top_auth_id,
                              'auth_level'=>'1'
                              );
                       $son_auth_id=$auth->add($son_arr);
                   
                                
                      $son2_arr=array(
                              'auth_name'=>'添加'.$son_auth,
                              'auth_m'=>$modName,
                              'auth_c'=>$tabname,
                              'auth_a'=>'add',
                              'auth_pid'=>$son_auth_id,
                              'auth_level'=>'2'
                              );
                      $auth->add($son2_arr);
                          //添加三级权限 更新
                      
                        $son2_arr=array(
                              'auth_name'=>'修改'.$son_auth,
                              'auth_m'=>$modName,
                              'auth_c'=>$tabname,
                              'auth_a'=>'update',
                              'auth_pid'=>$son_auth_id,
                              'auth_level'=>'2'
                              );
                      $auth->add($son2_arr);
                        
                        //三级权限 del
                      
                        $son2_arr=array(
                              'auth_name'=>'删除'.$son_auth,
                              'auth_m'=>$modName,
                              'auth_c'=>$tabname,
                              'auth_a'=>'del',
                              'auth_pid'=>$son_auth_id,
                              'auth_level'=>'2'
                              );
                      $auth->add($son2_arr);
                       
                       //三级权限 批量删除
                       $son2_arr=array(
                              'auth_name'=>'批量删除'.$son_auth,
                              'auth_m'=>$modName,
                              'auth_c'=>$tabname,
                              'auth_a'=>'mdel',
                              'auth_pid'=>$son_auth_id,
                              'auth_level'=>'2'
                              );
                       $auth->add($son2_arr);  

                $this->success('操作成功');
            
           
        }
        
        $this->display();
    }
	
	public function table($tabname){
           			
                $pre=C('DB_PREFIX');//读取配置文件获得数据的前缀
                
			   

                if(strpos($tabname,$pre)===0){
                    //计算前缀的长度
                    $pre_len=strlen($pre);
                    
                     //截取表
                    $tabname=substr($tabname,$pre_len);
                
                    //去掉下划线
                    $tabname=explode('_',$tabname);

                    //把首字母变大写
								
                    $tabname=array_map('ucfirst',$tabname);
                   
                     return $tabname=implode('',$tabname);
					 
					
                    
                }
            
           
            
         }  
}

