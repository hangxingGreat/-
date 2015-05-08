<?php
	class statistics extends CI_Controller
	{
		public function index()
		{
			$res = $this->db->query("select count(projectid) as count,name,id from projectlist natural join person group by id")->result();
			$data['res'] = $res;
			$this->load->view('statistics/index',$data);
		}

		public function projectmoney()
		{
			$res = $this->db->query("select max(money) as money,currency from project group by currency")->result();
			$data['res'] = $res;
			$this->load->view('statistics/projectmoney',$data);
		}

		public function awardtotal()
		{
			$res = $this->db->query("select count(identifier) as times,id,name from awardlist natural join person group by id")->result();
			$data['res'] = $res;
			$this->load->view('statistics/awardtotal',$data);
		}

	}
?>