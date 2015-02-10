<?php

namespace Goods\Controller;



class GoodsController extends \Home\Controller\IndexController{


 
    function add(){

        if(!empty($_POST)){
                
               $admin_info=D('Goods');
                       
                        
                       
                     
                        if($admin_info->create($_POST['Goods'])){

                            

                                if($admin_info->add()){
                                
                                     $this->success('添加成功',U('showlist'));
                                     
                                         
                                     exit;
                                }else{
                                
                                $sql= $admin_info->getError();
                                    $this->error('插入数失败 </br>SQL:'.$sql);
                                
                                    
                                }



                           
                            
                           //$this->redirect('showlist',array(),2,'添加成功');
                        }else{
                            
                            $error=$admin_info->getError();
                            $this->error($error,U('showlist'));
                          
                           
                            
                        }

                    

                   
                         
               
        }else{
            
            //取出所有的推荐位
            $recModel=D('Recommend');
            $rec=$recModel->where("rec_type='商品'")->select();
            $this->assign('rec',$rec);
            
                //获取所有分类
            $catModel=D('Category');
               $cat_data = $catModel->get_cat();
            
            $this->assign('cat_data', $cat_data);
            
            //获取所有类型
                $typeModel=D("Type");
                $type_info=$typeModel->select();
                $this->assign('type_info',$type_info);
          
             
            //获取商品品牌
             $brandModel=D('Brand');
            
             $brand_info=$brandModel->select();
        
             $this->assign('brand_info',$brand_info);
             
             //获取全部会员等级数据
             $member_levelModel=D('member_level');
             $member_level=$member_levelModel->select();
             //show_bug($member_level);die;
             $this->assign('member_level',$member_level);
             
             
             //获取会员价格数据
             $member_priceModel=D('member_price');
             $member_price=$member_priceModel->select();
             
             $this->assign('member_price',$member_price);
             
             
             
             
           $this->display();
        }
    
       
    }

    function del($id){
            
            
            $admin_info=D('Goods');


            if($admin_info->delete($id)){
            
                    $this->success('删除成功',U('showlist'));
                    exit;
                
            }else{
            
            
                    $error=$admin_info->getError();
                    $this->error($error);
            }

           
         
               
            
            
        
    
        
    }

    function update($id){
       $admin_info=D('Goods');
            
          if(!empty($_POST)){
                
             
                       
                      // show_bug($_POST);DIE;
                       
                     
                        if($admin_info->create($_POST['Goods'])){

                                

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
            
              //取出所有的推荐位
            $recModel=D('Recommend');
            $rec=$recModel->where("rec_type='商品'")->select();
            $this->assign('rec',$rec);
            
            //取出商品图片
            $picsModel=D('Pics');
            $pics=$picsModel->where('goods_id='.$id)->select();
            $this->assign('pics',$pics);
           // show_bug($pics);
            
              //取出所有的商品属性
             $sql="select a.*,b.attr_name,attr_type,attr_option_val from php28_goods_attr a left join php28_attr b on a.attr_id=b.id where goods_id=".$id;
            $attr_info= $admin_info->query($sql);
           // show_bug($attr_info);
            $this->assign('attr_info',$attr_info);

           //获取商品数据
             $admin_info=$admin_info->find($id);
             $this->assign('admin_info',$admin_info);
             //show_bug($admin_info);
                    $catModel=D('Category');
               $cat_data = $catModel->get_cat();
            
            $this->assign('cat_data', $cat_data);
            
            //获取所有类型
                $typeModel=D("Type");
                $type_info=$typeModel->select();
               // show_bug($type_info);
                $this->assign('type_info',$type_info);
          
             
            //获取商品品牌
             $brandModel=D('Brand');
            
             $brand_info=$brandModel->select();
        
             $this->assign('brand_info',$brand_info);
             
             //获取全部会员等级数据
             $member_levelModel=D('member_level');
             $member_level=$member_levelModel->select();
             //show_bug($member_level);die;
             $this->assign('member_level',$member_level);
             
             
             //获取会员价格数据
             $member_priceModel=D('member_price');
             $member_price=$member_priceModel->where('goods_id='.$id)->select();
            // show_bug($member_price);
             $this->assign('member_price',$member_price);
             
           
             
             $this->display();
        
        }
    
    }

 

    function mdel($ids){
           
               
                if(IS_POST){
               

                  
             
                            $ids=implode(',',$ids);                
                            $admin_info=D('Goods');
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


            
       
        $admin_info=D('Goods');
        $where=1;

      

      
        
        

        //$admin_info=$admin_info->select();

        $count=$admin_info->count();//取出管理员总记录数

        //实例化分布类 第一个参数是总记录数，第二个参数每页显示条数
        $Page=new \Think\Page($count,15);

        //分页显示输出 显示页码
        $show=$Page->show();

        //show_bug($show);

        

        $list=$admin_info->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
           

        

        $admin_array=array(
            'show'=>$show,
            'list'=>$list
        );
        $this->assign('admin_array',$admin_array);
       

       
        $this->display();
    }
    function getAttr($tid){
        $attrModel=D('Attr');
        
        $attr_info=$attrModel->where("type_id='$tid'")->select();
        //show_bug($attr_info);
      
        echo json_encode($attr_info);
    }
    function goodsnumber($id){
        if(IS_POST){
           // show_bug($_POST);DIE;
            $goodModel=D('GoodsNumber');
            //删除原来的库存
            $goodModel->where('goods_id='.$id)->delete();
            $attr_id=I('post.goods_attr_id');
            //show_bug($attr_id);
            $goods_number=I('post.goodsnumber');
           
                foreach($goods_number as $k=>$v){
                    
                       $num=array();
                        foreach($attr_id as $kk=>$vv){
                             $num[]=$vv[$k];
                        }     
                      sort($num);
                      $num=  implode(',', $num);
                      $goodModel->add(array(
                         'goods_id'=>$id,
                          'goods_number'=>$v,
                          'goods_attr_id'=>$num
                          
                      ));
                   
                       
                }
                $this->success('设置成功!');
                exit;
              
           
              
        }
            
        //实例化父类
            $Model=D();
        $sql="select a.*,b.attr_name from php28_goods_attr a left join php28_attr b on a.attr_id=b.id where goods_id='$id' and attr_id in(select attr_id from php28_goods_attr where goods_id='$id' group by attr_id having count(*)>1)";
        $attr_info=$Model->query($sql);
       // show_bug($attr_info);die;
        //将获取的属性信息变成三维数组
        //定义一个新的数组
        $attr_array=array();
        foreach($attr_info as $k=>$v){
            $attr_array[$v['attr_id']][]=$v;
        }
        //show_bug($attr_array);
        
        //取出商品库存量
        $gnModel=D('GoodsNumber');
        $goods_number=$gnModel->where('goods_id='.$id)->select();
        //show_bug($goods_number);
       
        $this->assign('goods_number',$goods_number);
        $this->assign('attr_array',$attr_array);
        // show_bug($attr_array);
        $this->display();

    }
}