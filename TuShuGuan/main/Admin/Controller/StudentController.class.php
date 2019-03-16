<?php
namespace Admin\Controller;
use Think\Controller;
class StudentController extends Controller {
	public function searchStudent(){
		$this->display();
	}
	
	public function apply(){
		
		if(IS_POST){
			$student_number=I('post.student_id');
			$student_name=I('post.student_name');
			$sex=I('post.sex');
			$sdept=I('post.sdept');
			$class=I('post.student_class');
			if($student_number!=''&&$student_name!=''&&$sex!=''&&$sdept!=''&&$class!=''){
				$studentModel=D('student');
				$studentModel->student_number=$student_number;
				$studentModel->student_name=$student_name;
				$studentModel->sex=$sex;
				$studentModel->sdept=$sdept;
				$studentModel->class=$class;
				$studentModel->add();
				$this->success('申请成功','',2);
			}else{
				$this->error('申请失误','',2);
			}
			
		}
		
		$this->display();
	}
	
	public function studentMessage(){
		
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
		
			$this->display();
		}
	}
	
}