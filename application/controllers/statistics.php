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
			$res = $this->db->query("select count(identifier) as times,projectid,name from awardprojectlist natural join project group by projectid")->result();
			$data['resp'] = $res;
			$this->load->view('statistics/awardtotal',$data);
		}

		public function fundsstat()
		{
			$now = date("Y-m");
			$res = $this->db->query("select projectid,name,sum(payoff) as income,money-sum(payoff) as notpaid from project natural join funds where projectid in (select projectid from project where end >= \"$now\") group by projectid")->result();
			$data['res'] = $res;
			$this->load->view('statistics/fundsstat',$data);

		}

	}
?>