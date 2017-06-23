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

	public function update($request)
	{
		if(isset($request)){
			$data = array(
					'title' => $request->title,
					'comment' => $request->comment,
					'name' => $request->name,
					'email' => $request->email,
					'phone' => $request->phone,
					'status' => $request->status
				);
			$this->db->where(array('id'=>$request->id));
			if($this->db->update('tickets',$data)){
				return $request->id;
			}			
		}
		return false;
	}

	public function escalate($request)
	{
		if(isset($request)){
			$data = array(
					'department_id' => $request->department_id,
					'status' => $request->status
				);
			$this->db->where(array('id'=>$request->id));
			if($this->db->update('tickets',$data)){
				return $request->id;
			}			
		}
		return false;
	}


	public function getTicket($request)
	{

		$this->db->select(array('tickets.*','departments.name department'));
		if(isset($request->id)){
			$data = array('tickets.id' =>$request->id);
			$this->db->join('departments','tickets.department_id = departments.id','left');
		
			$this->db->where($data);
			$query = $this->db->get("tickets");
			$result = $query->result();
			if(isset($result[0])){
				return $result[0];
			}			
		}
		return 0;
	}

	public function getTickets($request)
	{
		$this->db->select(array('tickets.id id','tickets.title','tickets.comment','tickets.phone','tickets.email','tickets.status','departments.name department'));
		if(isset($request->search)){
			$this->db->like('email',$request->search);
			$this->db->or_like('phone', $request->search);
		}
		$this->db->join('departments','tickets.department_id = departments.id','left');
		$this->db->order_by("tickets.id desc");
		$query = $this->db->get("tickets");
		$result = $query->result();
		if(isset($result)){
			return $result;
		}
		return 0;
	}

	public function delete($request)
	{
		if(isset($request->id)){
			if($this->db->delete('tickets',array('id'=>$request->id))){
				return 1;
			}
		}		
		return 0;
	}

	
}