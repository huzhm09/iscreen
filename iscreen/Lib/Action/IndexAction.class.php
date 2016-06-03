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
      //是否提交
      if($this->isPost()){
        //接收变量
        $data['title'] =  I("post.title");
        $data['topic'] =  I("post.topic");
        $data['stime'] =  I("post.stime");
        $data['ttime'] =  I("post.ttime");
        $data['area']  =  I("post.area");
        $data['zb']    =  I("post.zb");
        $data['uid']   =  I("post.uid");
        $data['phone'] =  I("post.phone");
        $data['cs']    =  I("post.cs");
        $data['vid']   =  I("post.vid");
        $data['auid']  =  I("post.auid");
        $data['qid']   =  I("post.qid");
        $data['email'] =  I("post.email");
        $data['renshu']=  I("post.renshu");
        //数据处理
        $screen = M("screen");
        //增加数据
        $rst = $screen->add($data);
        //判断结果
        if($rst){
          //申请成功
          $this->success("申请成功，等待审核",U("Index/index"));
        }else{
          //申请失败
          $this->error("申请失败，请重试",U("Index/appl"));
        }
      }else{
        //获取城市
        $this->cs = "1";
        //显示模板
        $this->display();
      }//判断是否提交POST请求
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