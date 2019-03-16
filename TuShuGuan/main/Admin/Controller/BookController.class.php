<?php
namespace Admin\Controller;
use Think\Controller;
class BookController extends Controller {
	public function addBook(){
		if(IS_POST){
			$book_name=I('post.book_name');
			$writer=I('post.writer');
			$number=I('post.number');
			$time=I('post.time');
			if($book_name!=''&&$writer!=''&&$number!=''&&$time!=''){
				$bookModel=D('book');
				$bookModel->book_name=$book_name;
				$bookModel->book_writer=$writer;
				$bookModel->num=$number;
				$bookModel->addtime=$time;
				$bookModel->add();
				$this->success('添加成功','',2);
			}
			
		}
		$this->display();
	}
	
	public function delBook(){
		$book_id=I('book_id');
		if($book_id){
			$bookModel=D('book');
			$book=$bookModel->where('book_id='.$book_id)->select();
			if(intval($book[0]['borrow_num'])>0){
				$this->error('书刊处于被借阅状态，不可删除','',2);
			}
			if($bookModel->where('book_id='.$book_id)->delete()){
				$this->success('删除成功','',2);
			}else{
				$this->error('操作异常','',2);
			}
			
		}
	}
	
	public function update(){
		$index=$_GET['index'];
		$newValue=$_GET['message'];
		$n=$_GET['n'];
		
		$bookModel=D('book');
		switch($n){
			case 1:$bookModel->book_name=$newValue;break;
			case 2:$bookModel->book_writer=$newValue;break;
			case 3:$bookModel->num=$newValue;break;
			case 5:$bookModel->addtime=$newValue;break;
		}
		if($bookModel->where('book_id='.$index)->save()){
			echo 'ok';
		}else{
			echo 'error';
		}
	}
    public function book(){
    	
        $bookModel=D('book');
		$cnt=6;//每页条数
		$num=count($bookModel->select());
		$n=ceil($num/$cnt);//页数
		if(!$_GET['page']){
			$_GET['page']=1;
		}
		if($_GET['to']=='prev'){
			$_GET['page']=$_GET['page']-1;
			$_GET['page']=($_GET['page']<=0?1:$_GET['page']);
		}
		if($_GET['to']=='next'){
			$_GET['page']=$_GET['page']+1;
			$_GET['page']=($_GET['page']>$n?$n:$_GET['page']);
		}
		
		
		
		$book=$bookModel->order('book_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
		
//		$curr=(count($book)/6)>=6?(count($book)/6):1;
		for($i=0;$i<count($book);$i++){
			$book[$i]['addtime']=date('Y/m/d',strtotime($book[$i]['addtime']));
		}
		$this->assign('booklist',$book);
		$this->assign('num',$num);
		$this->assign('current',$_GET['page']);
		$this->assign('nav',getPage($num,$_GET['page'],$cnt));
		$this->display();
    }

	public function student(){
       $this->display();
    }
	
	


}