<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
  class BillingController extends CI_Controller 
{
	public function dashboardUser(){
		if($this->isLoggedIn())
		{
			$data['graph']['1']=$this->BillingModel->graphMonth('1');
			$data['graph']['2']=$this->BillingModel->graphMonth('02');
			$data['graph']['3']=$this->BillingModel->graphMonth('03');
			$data['graph']['4']=$this->BillingModel->graphMonth('04');
			$data['graph']['5']=$this->BillingModel->graphMonth('05');
			$data['graph']['6']=$this->BillingModel->graphMonth('06');
			$data['graph']['7']=$this->BillingModel->graphMonth('07');
			$data['graph']['8']=$this->BillingModel->graphMonth('08');
			$data['graph']['9']=$this->BillingModel->graphMonth('09');
			$data['graph']['10']=$this->BillingModel->graphMonth('10');
			$data['graph']['11']=$this->BillingModel->graphMonth('11');
			$data['graph']['12']=$this->BillingModel->graphMonth('12');
			$this->load->view('user/billing-dashboard',$data);
		}
		else
		{
			redirect('user/login');
		}
	}
	public function isLoggedIn()
	{
		if($this->session->userdata('email') && $this->session->userdata('name') && $this->session->userdata('id'))
		{
			$data['name']=$this->session->userdata('name');
			$data['email']=$this->session->userdata('email');
			$this->load->view('partials/bill-header',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
		
	}
	public function doLogout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('result');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		redirect('user/login');
	}
	public function login()
	{
		if($this->isLoggedIn())
		{
			redirect('user/dashboard');
		}
		else
		{
			if($this->input->post())
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'required|max_length[30]');
				if ($this->form_validation->run() == FALSE) 
				{
					$data['message']="Entered Username/Email is in invalid format.";
					$this->load->view('user/login',$data);
				}
				else
				{
					$credentials['email']=$email;
					$credentials['password']=$password;
					$data=$this->BillingModel->login($credentials);
					if($data['result']==TRUE)
					{
						redirect('user/dashboard');
					}
					else
					{
						$data['message']="Invalid Login Credentials Entered";
						$this->load->view('user/login',$data);
					}
				}

			}
			else
			{
				$this->load->view('user/login');
			}
		}
		
	}
	public function uploadTemplate()
	{
		if($this->isLoggedIn())
		{
			if($this->input->post())
			{
				$data['templateName']=$this->input->post('name');
				$data['userId']=$this->session->userdata('id');
					$config['upload_path'] = './assets/upload_templates/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$config['max_width']  = '2224';
					$config['max_height']  = '2224';
					$data['date']=(date('Y-m-d H:i:s'));
					
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('img'))
					{
						$data['error'] = $this->upload->display_errors();
						

					}
					else
					{
						$upload_data =  $this->upload->data();
						$data['src']= $upload_data['file_name'];
						$this->BillingModel->uploadUserTemplate($data);
					}
				
				var_dump($data);
				die;
				redirect('user/dashboard');
				
			}
			else
			{
				$this->load->view('user/upload-template');
			}
		}
		else
		{
			$this->load->view('user/login');
		}
		
	}
	public function sendJson()
  	{

	    if ($this->input->post() && $this->input->is_ajax_request()) 
	    {
	      $text_result = $this->input->post('text_result');
	      $file_id = $this->input->post('file_id');
	      $templateId = $this->input->post('template');
	      $credentials['id']=$file_id;
	      $credentials['templateId']=$templateId;
	      $this->BillingModel->updateTemplateId($credentials);
	     	$data1=explode("\n",$text_result);
	     	$data_count=count($data1);
	     	if($templateId=='2')
	     	{
	     		$data2['title_bill']=$data1[0];
	     		for ($i=1; $i < $data_count; $i++) 
	     		{ 
	     			if (strpos($data1[$i], '#') !== false) 
	     			{
    					$data=explode("#",$data1[$i]);
    					$data[0]=trim($data[0]);
		     			$data2[$data[0]]=$data[1];
					}
					else
					{
						$data=explode(" ",$data1[$i]);
						$new_count=count($data);
						if($new_count==3)
						{
							$data2[$data[0].$data[1]]=$data[2];
						}
						elseif ($new_count==4) 
						{
							$data2[$data[0].$data[1]]=$data[2]." ".$data[3];
						}
						else
						{

						}
		     			
					}
	     		}
	     		
		        echo json_encode($data2);
	     	}
	     	elseif ($templateId=='1')
	     	{
	     		$data4['table']['psnt']=0;
	     		$data4["key"][0]="TITLE";
	     		$data4["valu"][0]=$data1[4];
	     		for ($i=1,$k=1; $i < $data_count; $i++) 
	     		{
	     			 if (strpos($data1[$i], 'CIN NO') !== false) 
	     			{
    					$data=explode("CIN NO",$data1[$i]);
    					$data[0]=trim($data[0]);
		     			$data4["key"][$k]='CIN_NO';
		     			$data4["valu"][$k]=$data[1];
		     			$k++;
					}
					 else if (strpos($data1[$i], 'S.N.') !== false || strpos($data1[$i], 'Code') !== false) 
	     			{
	     				$data4['table']['psnt']=1;
	     				$data4['table']['head']['count']=7;
	     				$data4['table']['head'][2]="Description of Goods";
	     				$data4['table']['head'][1]="S.N.";
	     				$data4['table']['head'][3]="HSN/SAC Code";
	     				$data4['table']['head'][4]="Qty";
	     				$data4['table']['head'][5]="Unit";
	     				$data4['table']['head'][6]="Price";
	     				$data4['table']['head'][7]="Amount";
    					$i++;
    					$m=1;
    					while((strcmp($data1[$i],"Declaration"))!==0)
    					{
    						
    						
    						$data=explode(" ",$data1[$i]);
    						$new_table_count=count($data);
    						$data[0]=trim($data[0],".");
    						if(is_numeric($data[0]))
    						{
    						for ($h=0,$g=1; $h < $new_table_count;) 
    						{ 
    							$data[$h]=trim($data[$h]);
    							if((is_numeric($data[$h])) && $h==0)
    							{
    								$data4['table'][$m][$g]=$data[$h];
    								$g++;
    								$h++;
    								$data4['table'][$m][$g]="";
    								while(!(is_numeric($data[$h])))
    								{
    									$data4['table'][$m][$g]=$data4['table'][$m][$g].$data[$h];
    									
    									$h++;
    								}
    								$g++;

    							}
    							else
    							{
    								$data4['table'][$m][$g]=$data[$h];
    								$g++;
    								$h++;
    							}
    						}
    						$m++;
    						
    						}
    						$i++;
    					}
    					
		     			$i=$data_count;
					}
					else if(strpos($data1[$i], ':') !== false)
					{
						$data=explode(":",$data1[$i]);
						$new_count=count($data);
						for ($j=0; $j < $new_count; $j++)
						{
							$data[$j]=trim($data[$j]);
						}
						
						if($new_count==3)
						{
							if (strpos($data[1], ' ') !== false) 
							{
								$data3=explode(" ",$data[1]);
								$data4["key"][$k]=$data[0];
								$data4["valu"][$k]=$data3[0];
								$k++;
								$data4["key"][$k]=$data3[1];
								$data4["valu"][$k]=$data[2];
								$k++;
							}
							
						}
						if($new_count==4)
						{
							$data[1]=trim($data[1]);
							if (strpos($data[1], ' ') !== false) 
							{
								$data3=explode(" ",$data[1]);
								$data4["key"][$k]=$data[0];
								$data4["valu"][$k]=$data3[0];
								$k++;
								$data4["key"][$k]=$data3[1].$data3[2];
								$data4["valu"][$k]=$data[3];
								$k++;
							}
							
						}
					}
					else
					{

					}
	     		}
	     		$data4['count']=$k;
	     		$data4['table']['row']['count']=$m;
	     		echo json_encode($data4);

	     	}
	     	else
	     	{
	     		echo json_encode($data1);
	     	}
	     	
	    } 
	    else 
	    {
	      redirect('admin/login');
	    }

  }
	public function uploadBill()
	{
		if($this->isLoggedIn())
		{
			if($this->input->post())
			{
				$count=$this->input->post('count');
				$data1['count']=$count;
				$data['user_id']=$this->session->userdata('id');
				for($i = 0; $i < $count; $i++)
				{	
					 $_FILES['file']['name']     = $_FILES['user-image']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['user-image']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['user-image']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['user-image']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['user-image']['size'][$i];
					$config['upload_path'] = './assets/upload_images/';
					
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$config['max_width']  = '2224';
					$config['max_height']  = '2224';
					$data['date']=(date('Y-m-d H:i:s'));
					
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('file'))
					{
						$data['error'] = $this->upload->display_errors();
						

					}
					else
					{
						$upload_data =  $this->upload->data();
						$data['image_name']= $upload_data['file_name'];
						$this->BillingModel->uploadUserPhoto($data);
						$data1['id'][$i]=$this->BillingModel->uploadUserPhotoId($data);
						$data1['url'][$i]=$data['image_name'];
					}
				}
				$data1['templatesResult'] =  $this->BillingModel->returnTemplates();
				
				$this->load->view('user/upload-bill',$data1);
				
			}
			else
			{
				$this->load->view('user/upload-button');
			}
		}
		else
		{
			$this->load->view('user/login');
		}
		
	}
	/*
	 Controller for drag and drop upload
    */
	 public function draguploadBill()
	{
		if($this->isLoggedIn())
		{
			if($this->input->post())
			{
				$count=$this->input->post('count');
				$data1['count']=$count;
				$data['user_id']=$this->session->userdata('id');
				for($i = 0; $i < $count; $i++)
				{	
					 $_FILES['file']['name']     = $_FILES['user-image']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['user-image']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['user-image']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['user-image']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['user-image']['size'][$i];
					$config['upload_path'] = './assets/upload_images/';
					
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$config['max_width']  = '2224';
					$config['max_height']  = '2224';
					$data['date']=(date('Y-m-d H:i:s'));
					
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('file'))
					{
						$data['error'] = $this->upload->display_errors();
						

					}
					else
					{
						$upload_data =  $this->upload->data();
						$data['image_name']= $upload_data['file_name'];
						$this->BillingModel->uploadUserPhoto($data);
						$data1['url'][$i]=$data['image_name'];
					}
				}
				$data1['templatesResult'] =  $this->BillingModel->returnTemplates();
				
				$this->load->view('user/upload-bill',$data1);
				
			}
			else
			{
				$this->load->view('user/upload-button');
			}
		}
		else
		{
			$this->load->view('user/login');
		}
		
	}
	/* Function for view template
	*/
	public function viewTemplate()
	{
      if($this->isLoggedIn())
		{
			$data1['result']=$this->BillingModel->returnTemplates();
				$this->load->view('user/viewtemplate',$data1);
		}
		else
		{
           $this->load->view('user/login');
		}	
	}
	public function viewBill()
	{
      if($this->isLoggedIn())
		{
			$data1['result']=$this->BillingModel->returnBill();
				$this->load->view('user/viewBill',$data1);
		}
		else
		{
           $this->load->view('user/login');
		}	
	}

}