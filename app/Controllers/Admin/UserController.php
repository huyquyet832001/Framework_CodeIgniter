<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use App\Libraries\Hash;

class UserController extends BaseController
{
	public function list()
	{
		$pager = \Config\Services::pager();
		$model = new UserModel();
		$data =
			[
				'users' => $model->paginate(3),
				'pager' => $model->pager,

			];
		// dd($data);
		return view('admin/pages/user/list', $data);
	}
	public function create()
	{
		return view('admin/pages/user/create');
	}
	public function createAdd()
	{

		helper(['form', 'url']);
		$rules = [
			'name'     => 'required|min_length[3]',
			'email'        => 'required|valid_email|is_unique[users.email]',
			'password'     => 'required|min_length[8]',
		];
		$message = [
			'email'        => [
				'is_unique' => 'Email đã tồn tại',
				'required' => 'Bạn chưa nhập Email',
				'valid_email' => 'Email không đúng định dạng',
			],
			'name'        => [
				'required' => 'Bạn chưa nhập Email',
				'min_length' => 'Họ và tên phải từ 3 ký tự trở lên',
			],
			'password'        => [
				'required' => 'Bạn chưa nhập mật khẩu',
				'min_length' => 'Mật Khẩu phải từ 8 ký tự trở lên',
			]
		];
		if ($this->validate($rules)) {
			$model = new UserModel();
			$name = $this->request->getPost('name');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$data = [
				'name' => $name,
				'email' => $email,
				'password' => password_hash('$password', PASSWORD_BCRYPT),
			];
			$model->save($data);
			return redirect()->route('admin/user/list')->with('thongbaocreate', 'Bạn Đã Thêm Tài Khoản Thành Công');
		} else {
			$data['validation'] = $this->validator;
			echo view('admin/pages/user/create', $data);
		}
	}
	public function edit($id = 0)
	{
		$subjects = new UserModel();
		$subject = $subjects->find($id);
		$data['subject'] = $subject;
		return view('admin/pages/user/edit', $data);
	}
	public function delete($id)
	{
		$model = new UserModel();
		$model->where('id', $id)->delete();
		// dd($data);
		return redirect()->back();
	}
}
