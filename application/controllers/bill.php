<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bill extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function showBill()
	{
		$this->load->view('bill');
	}
	public function uploadPhotoAction()
	{
		if($this->input->post()){
			$count=$this->input->post('count');
			$data1['count']=$count;
			for($i = 0; $i < $count; $i++)
			{
				 $_FILES['file']['name']     = $_FILES['user-image']['name'][$i];
                $_FILES['file']['type']     = $_FILES['user-image']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['user-image']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['user-image']['error'][$i];
                $_FILES['file']['size']     = $_FILES['user-image']['size'][$i];
				$config['upload_path'] = './assets/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
				$config['max_width']  = '2224';
				$config['max_height']  = '2224';

				$data['date']=(date('Y-m-d H:i:s'));
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file'))
				{
					$data['error'] = $this->upload->display_errors();
					$this->load->view('userProfile',$data);
				}
				else
				{
					$upload_data =  $this->upload->data();
					$this->load->model('UserModel');
					$data['user-image']= $upload_data['file_name'];
					$this->UserModel->uploadUserPhoto($data);
					$data1['url'][$i]=$data['user-image'];
				}
			}
				$this->load->view('bill',$data1);
			
		}else{
			$this->load->view('userProfile');
		}
}
}
