<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

Class Mainmodel extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function getCnt($table, $where=array()){
		$this->db->select("count(*) as cnt");
		$this->db->from($table);
		foreach($where as $key => $val){
			$this->db->where($key, $val);
		}
		$query = $this->db->get();
		return $query->row()->cnt;
	}

	public function getRow($table, $column='*', $where=array()){
		$this->db->select($column, false);
		$this->db->from($table);
		foreach($where as $key => $val){
			$this->db->where($key, $val);
		}
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getList($table, $column='*', $where=array(), $order = array(), $limit=20, $start=0){
		$this->db->select($column, false);
		$this->db->from($table);
		foreach($where as $key => $val){
			$this->db->where($key, $val);
		}
		foreach($order as $key => $val){
			$this->db->order_by($key, $val);
		}
		$this->db->limit($limit, $start);
		$query = $this->db->get();
//		echo $this->db->last_query();

		return $query->result_array();
	}

	public function setRow($table, $data) {
		$this->db->insert($table,$data);

		return $this->db->insert_id();
	}

	public function udtRow($table, $data, $where) {
		foreach($where as $key => $val){
			$this->db->where($key, $val);
		}
		$this->db->update($table,$data);
	}

	public function delRow($table, $where) {
		foreach($where as $key => $val){
			$this->db->where($key, $val);
		}
		$this->db->delete($table);
	}
}