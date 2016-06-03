<?php
// 系统首页
class IndexAction extends Action {
    //展示首页
    public function Index(){
   		//获取focus链接
   		$Focus	=	M("focus_img");
   		$where	= 	array("status"=>"1");
   		//读取焦点图
   		$this->info  =	$Focus->where($where)->select();
   		//显示模板
   		$this->display();
    }

    //申请页
    public function Appl(){
      //显示模板
      $this->display();
    }

    //大屏幕展示
    public function Show(){
      //实例化数据库
      $screen = M("screen");
      //导入数据类
      import("ORG.Util.Page");
      //获取总数据
      $count  = $screen->where("status=1")->count();
      //实例化分页类
      $page   = new page($count,24);
      //设置分页样式
      $page->setConfig("theme","%totalRow% %header% %nowPage%/%totalPage% 页 %first% %upPage% %downPage% %prePage% %linkPage% %nextPage% %end%");
      //查询分页数据
      $list   = $screen->where("status=1")->order("id desc")->limit($page->firstRow.",".$page->listRows)->select(); 
      //获取分页展示
      $show   = $page->show();
      //赋值变量
      $this->assign("show",$show);
      $this->assign("list",$list);
      //输出模板
      $this->display(); 
    }

    //按学校查询
    public function School(){
      //接收变量
      $school  = I("get.s");
      //实例化数据库
      $screen = M("screen");
      //导入数据类
      import("ORG.Util.Page");
      //获取总数据
      $count  = $screen->where(array("status"=>'1',"area"=>$school))->count();
      //实例化分页类
      $page   = new page($count,24);
      //设置分页样式
      $page->setConfig("theme","%totalRow% %header% %nowPage%/%totalPage% 页 %first% %upPage% %downPage% %prePage% %linkPage% %nextPage% %end%");
      //查询分页数据
      $list   = $screen->where(array("status"=>'1',"area"=>$school))->order("id desc")->limit($page->firstRow.",".$page->listRows)->select(); 
      //获取分页展示
      $show   = $page->show();
      //赋值变量
      $this->assign("show",$show);
      $this->assign("list",$list);
      //输出模板
      $this->display(); 
    }

    //关键词展示页面
    public function action(){
      //接收变量
      $this->key = I("get.t");
      //调模板
      $this->display();
    }
}