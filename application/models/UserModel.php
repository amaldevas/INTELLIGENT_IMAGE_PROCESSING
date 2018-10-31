<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function uploadUserPhoto($data)
	{
		if($this->db->insert('user',$data))
		{
			return true;
		} else {
			return false;
		}

	}

}