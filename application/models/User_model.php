<?php
class User_Model extends CI_Model
{
 
	public function __construct()
	{
		parent::__construct();
	}

	public function getUser($request)
	{
		if(isset($request->username) && isset($request->password)){
			$data = array('username' =>$request->username,'password' =>md5($request->password));
			$this->db->where($data);
			$this->db->select(array('id','username'));
			$query = $this->db->get("user");
			$result = $query->result();
			if(isset($result[0])){
				return $result[0];
			}			
		}
		return 0;
	}
}