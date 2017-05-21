<?php

/**
 * Created by PhpStorm.
 * User: chenallen
 * Date: 2017/5/21
 * Time: 下午5:22
 */
class Crud extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function c()
	{
		$arrUser = [];
		$arrUser['loginname'] = 'admin';
		$arrUser['username'] = 'administrator';
		var_dump($this->db->insert('users', $arrUser));
		echo $this->db->insert_id();
	}

	public function r()
	{
		$arrParams = $this->uri->uri_to_assoc();

		if(empty($arrParams) || empty($arrParams['id'])){
			echo 'no parameters';
		}

		$this->db->from('users')->where('id=', $arrParams['id']);
		$res = $this->db->get();

		var_dump($res->result());
	}

	public function ra()
	{
		$res = $this->db->get('users');
		var_dump($res->result());
	}

	public function u()
	{
		$this->db->set('username', 'ddddd');
		$this->db->where('id', 1);
		var_dump($this->db->update('users'));
	}

	public function d()
	{
		$this->db->where('id', 1);
		var_dump($this->db->delete('users'));
	}
}
