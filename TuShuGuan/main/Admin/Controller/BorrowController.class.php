<?php
namespace Admin\Controller;
use Think\Controller;
class BorrowController extends Controller {
	
	public function action(){
		if(IS_POST){
			$student_id=I('post.student_id');
			if(!$student_id){
				$this->error('查询失败','',2);
			}
			$studentModel=D('student');
			
			$student=$studentModel->where('student_number='.$student_id)->select();
			if(!$student){
				$this->error('查询失败','',2);
			}
			$this->assign('student',$student);
			session('student',$student);
		}
		$this->display();
	}
	
	public function borrowAction(){
		
		$this->display();
	}
	
	public function borrowBook(){
		$student=session('student');
		$this->assign('student',$student);
		$this->display();
	}
	
	public function returnBook(){
		$student=session('student');
		$this->assign('student',$student);
		
		if($student){
			$borrowModel=D('borrow');
			$borrow=$borrowModel->where('student_number='.$student[0]['student_number'])->select();
			$this->assign('borrow',$borrow);
		}
		
		if(IS_POST){
			$book_name=I('post.book_name');
			$student_id=I('post.student_id');
			
			$borrowModel=D('borrow');
			$studentModel=D('student');
			
			
			if($borrowModel->where('student_number='.$student_id." and borrowBook='".$book_name."'")->delete()){
				//学生-1
				$student=$studentModel->where('student_number='.$student_id)->select();
				$borrowNum=$student[0]['borrownumber'];
				$studentModel->borrowNumber=intval($borrowNum)-1;
				$studentModel->where('student_number='.$student_id)->save();
				
				//书库+1
				$bookModel=D('book');
				$book=$bookModel->where("book_name='".$book_name."'")->select();
				$num=$book[0]['num'];
				$borrow_num=$book[0]['borrow_num'];
				$bookModel->num=intval($num)+1;
				$bookModel->borrow_num=intval($borrow_num)-1;
				$bookModel->where("book_name='".$book_name."'")->save();
				
				$historyModel=D('history');
				$historyModel->student_number=$student_id;
				$historyModel->borrowBook=$book_name;
				$historyModel->formTime=date('y/m/d',time());
				$historyModel->action='还书';
				$historyModel->add();
				
				$this->success('还书成功!','',2);
			}else{
				$this->error('操作异常!','',2);
			}
		}
		
		$this->display();
	}
	
	public function renewBook(){
		$student=session('student');
		$this->assign('student',$student);
		
		if($student){
			$borrowModel=D('borrow');
			$borrow=$borrowModel->where('student_number='.$student[0]['student_number'])->select();
			$this->assign('borrow',$borrow);
		}
		
		if(IS_POST){
			$book_name=I('post.book_name');
			$student_id=I('post.student_id');
			$time=I('post.time');
			
			$borrowModel=D('borrow');
			$studentModel=D('student');
			
			$borrow=$borrowModel->where('student_number='.$student_id." and borrowBook='".$book_name."'")->select();
			$toTime=strtotime($borrow[0]['totime']);
			$toTime=date('Y/m/d',$toTime+$time*24*60*60);
			$borrowModel->toTime=$toTime;
			if($borrowModel->where('student_number='.$student_id." and borrowBook='".$book_name."'")->save()){
				
				$historyModel=D('history');
				$historyModel->student_number=$student_id;
				$historyModel->borrowBook=$book_name;
				$historyModel->formTime=date('y/m/d',time());
				$historyModel->action='续借'.$time.'天';
				$historyModel->add();
				
				$this->success('续借成功!','',1);
			}else{
				$this->error('续借失败!','',1);
			}
		}
		
		$this->display();
	}
	
	public function borrowList(){
		if(IS_POST){
			$book_id=I('post.book_id');
			$book_name=I('post.book_name');
			if($book_id==''&&$book_name==''){
				$this->error('请输入字段','',2);
			}

			$bookModel=D('book');
			if($book_id!=''){
				$book=$bookModel->where('book_id='.$book_id)->select();
			}
			if($book_name!=''){
				$book=$bookModel->where("book_name='".$book_name."'")->select();
			}
			if(!$book){
				$this->error('未查到','',2);
			}
			$this->assign('book',$book);
			$student=session('student');
			$this->assign('student',$student);
		}
		$this->display();
	}
	
	public function borrowUpdate(){
		
//		var_dump($_POST);
		
		$book_id=I('post.index');
		$student_id=I('post.student_id');
		$time=I('post.time');
		
		$bookModel=D('book');
		$borrowModel=D('borrow');
		$studentModel=D('student');
		
		$student=$studentModel->where('student_number='.$student_id)->select();
		$bookNum=intval($student[0]['borrownumber']);
		if($bookNum>=8){
			$this->error('借书数量过多，请先归还书刊!','./borrowBook',2);
		}

		$book=$bookModel->where('book_id='.$book_id)->select();
		
		$data=$borrowModel->where("student_number='".$student_id."' and borrowBook='".$book[0]['book_name']."'")->find();
		if(!$data){
			$remain=$book[0]['num']-$book[0]['borrow_num'];
			if($remain>0){
				$bookModel->num=$book[0]['num']-1;
				$bookModel->borrow_num=$book[0]['borrow_num']+1;
				if($bookModel->where('book_id='.$book_id)->save()){
					$borrowModel->student_number=$student_id;
					$borrowModel->borrowBook=$book[0]['book_name'];
					$borrowModel->formTime=date('y/m/d',time());
					$borrowModel->toTime=date('y/m/d',time()+$time*24*60*60);
					$borrowModel->add();
					
					$historyModel=D('history');
					$historyModel->student_number=$student_id;
					$historyModel->borrowBook=$book[0]['book_name'];
					$historyModel->formTime=date('y/m/d',time());
					$historyModel->action='借阅';
					$historyModel->add();
					
					$studentModel->borrowNumber=($bookNum+1);
					$studentModel->where('student_number='.$student_id)->save();
					
					$this->success('借阅成功!','./borrowBook',2);
				}else{
					$this->error('操作异常!','./borrowBook',2);
				}
			}else{
				$this->error('库存不足!','./borrowBook',2);
			}
		}else{
			$this->error('不可重复借此书!','./borrowBook',2);
		}
		
	}

	public function borrowItem(){
		$this->display();
	}
	
	public function borrowItemlist(){
			
		
		if(IS_POST){
			$student_id=I('post.student_id');
			if(!$student_id){
				$this->error('查询失败','',2);
			}
			$studentModel=D('student');
			
			$student=$studentModel->where('student_number='.$student_id)->select();
			if(!$student){
				$this->error('查询失败','',2);
			}
			session('student',$student);
			$this->assign('student',$student);
		}else{
			$student=session('student');
			$this->assign('student',$student);
		}
		
		
		if($student){
			$historyModel=D('history');
			
			$cnt=6;//每页条数
			$num=count($historyModel->select());
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
			
			
			$history=$historyModel->where('student_number='.$student[0]['student_number'])->limit(($_GET['page']-1)*$cnt,$cnt)->select();
			$i=($_GET['page']-1)*$cnt;
			$this->assign('history',$history);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('i',$i+$cnt);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			
			
		}
		$this->display();
	}

	public function borrowExceed(){
		$this->display();
	}
	
	public function exceedList(){
		
		if(IS_POST){
			$student_id=I('post.student_id');
			if(!$student_id){
				$this->error('查询失败','',2);
			}
			$studentModel=D('student');
			
			$student=$studentModel->where('student_number='.$student_id)->select();
			if(!$student){
				$this->error('查询失败','',2);
			}
			session('student',$student);
			$this->assign('student',$student);
		}else{
			$student=session('student');
			$this->assign('student',$student);
		}
		
		$BorrowModel=D('borrow');
		$borrow=$BorrowModel->where('student_number='.$student[0]['student_number'])->select();
		$data=[];
		foreach($borrow as $bow){
			if(time()>strtotime($bow['totime'])){
				list($y1,$m1,$d1)=explode('-',date('Y-m-d',time()));
				list($y2,$m2,$d2)=explode('-',$bow['totime']);
				$d=($y1*365+$m1*30+$d1)-($y2*365+$m2*30+$d2);
				$bow['d']=$d;
				$data[]=$bow;
			}
		}
		
		$this->assign('borrow',$data);
		$this->display();
	}
	
	public function jilu(){
		$bookModel=D('book');
		$book=$bookModel->select();
		$bookNum=count($book);
		$this->assign('bookNum',$bookNum);
		
		$studentModel=D('student');
		$student=$studentModel->select();
		$studentNum=count($student);
		$this->assign('studentNum',$studentNum);
		
		$borrowModel=D('borrow');
		$borrow=$borrowModel->select();
		$borrowNum=count($borrow);
		$this->assign('borrowNum',$borrowNum);
		
		$historyModel=D('history');
		$history=$historyModel->select();
		$historyNum=count($history);
		$this->assign('historyNum',$historyNum);
		
		$this->display();
	}
}