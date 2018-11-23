<?php
namespace Admin\Controller;

use Think\Controller;
/*
*  用户信息管理
*/
class UserController extends BaseController
{
	public function listUser()
	{
		$model = D('Studentinfo');
		$info = $model->search();
		//dump($info);die;
		$this->assign($info);
		$this->display();
	}

	public function add()
	{
		$model = D('Studentinfo');
		if(IS_POST){
			//dump(I('post.'));die;

			if($info=$model->create(I('post.'))){
				//dump($info);die;
				if($model->add()){
					$this->success('操作成功!', U('listUser'));
                    exit;
				}
			}
			$error = $model->getError();
            $this->error($error);
		}
		$this->display();
	}

	public function edit()
	{
		$id = I('get.id');
		$model = D('Studentinfo');
		print_r(I('post.'));
		if (IS_POST) {
            if($info = $model->create(I('post.'),2)){
            	//dump($info);die;
                if(FALSE!==$model->save()){
                    $this->success('操作成功!',  U('listUser'));
                    exit;
                }
            }            
            $error = $model->getError();
            $this->error($error);
            
        }
		$data = $model->find($id);
		$this->assign(array(
			'data' => $data
			));
		$this->display();
	}

	public function delete()
	{
		$id = I('get.id');
		$model = D('Studentinfo');
		if(FALSE !== $model->delete($id)){
			$this->success('操作成功!', U('listUser'));
            exit;
		}
		$error = $model->getError();
        $this->error($error);
	}

	//获得该用户的历史就诊记录
	public function listHis(){

	}
}
