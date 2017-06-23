<?php
class Ticket_Model extends CI_Model
{
 
	public function __construct()
	{
		parent::__construct();
	}

	public function add($request)
	{
		if(isset($request)){
			$data = array(
					'title' => $request->title,
					'comment' => $request->comment,
					'name' => $request->name,
					'email' => $request->email,
					'phone' => $request->phone,
					'status' => $request->status,
					'created' => date('Y-m-d')
				);
			if($this->db->insert('tickets',$data)){
				return $this->db->insert_id();
			}			
		}
		return false;
	}

	public function getTicket($request)
	{
		if(isset($request->id)){
			$data = array('id' =>$request->id);
			$this->db->where($data);
			$query = $this->db->get("tickets");
			$result = $query->result();
			if(isset($result[0])){
				return $result[0];
			}			
		}
		return 0;
	}

	
}