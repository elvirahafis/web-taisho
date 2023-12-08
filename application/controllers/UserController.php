<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'PN');

	}
    public function index()
	{
		
		$this->load->view('login');
	}
	
	public function postLogin()
	{
		
		$response = new \stdClass();
		$Fullname = $this->input->post('email');
		$password = $this->input->post('password');
		$User = $this->db->query("select * from user WHERE Fullname = '$Fullname'");
		$pass = $this->db->query("select * from user WHERE password = '$password'");
		$Users = $User->result_array();
		$passs = $pass->result_array();
		
		if($Users && $passs){
			$response->login = $Users;
			$response->pesan = 'Login Berhasil';
            $response->kode = 'SC';
            $response->status = 1;
		} else if(!$Users)
		{
			$response->pesan = '  Fullname Salah';
            $response->kode = 'GL';
            $response->status = 0;
		}
		else if(!$passs){
			 $response->pesan = '  Password Salah';
            $response->kode = 'GL';
            $response->status = 0;
		}
		  header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function createUser()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$data_user['Fullname'] = $post['email'];
		$data_user['password'] = $post['password'];
		$createuser = $this->PN->createUser('user', $data_user);
		if($createuser ){
			$response->createuser = $createuser;
			$response->pesan = 'Register Berhasil';
            $response->kode = 'SC';
            $response->status = 1;
		} else {
			 $response->pesan = '  Gagal REgister';
            $response->kode = 'GL';
            $response->status = 0;
		}
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function viewUser()
	{
		$this->load->view('Page/ListUser');
	}
	public function viewAddUser()
	{
		$this->load->view('Page/AddUser');
	}
	public function getListUser()
	{
		$response = new \stdClass();
		$User = $this->db->query("select * from user");
		$ListUser = $User->result_array();
		if($ListUser){
			$response->data = $ListUser;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function HapusUser()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$User_Id = $post['User_Id'];
		$DeleteUser = $this->db->query("delete from user where User_Id = '$User_Id'");
		if($DeleteUser ){
			$response->DeleteUser = $DeleteUser;
			$response->pesan ='Delete Berhasil';
            $response->kode = 'SC';
            $response->status = 1;
		} else {
			 $response->pesan = '  Gagal Delete';
            $response->kode = 'GL';
            $response->status = 0;
		}
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function viewUpdateUser()
	{
		$User_Id = $this->uri->segment('2');
        $data['User_Id'] = $User_Id;
		$this->load->view('Page/UpdateUser', $data);
	}
	public function getUserKode()
	{
		$response = new \stdClass();
		$User_Id = $this->input->get('User_Id');
		$user = $this->db->query("select * from user WHERE User_id = '$User_Id'");
		$Datauser = $user->result_array();
		if($Datauser){
			$response->data = $Datauser;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		 header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function updateUser()
	{
		
		$response = new \stdClass();
		$post = $this->input->post();
		$User_Id = $post['User_Id'];
		$Fullname = $post['Fullname'];
		$password = $post['password'];

		$UpdateUser = $this->db->query("update user set Fullname = '$Fullname',
						password = '$password' where User_Id = '$User_Id'");
						// var_dump($this->db->last_query());
		if($UpdateUser ){
			$response->UpdateUser = $UpdateUser;
			$response->pesan ='Update Berhasil';
            $response->kode = 'SC';
            $response->status = 1;
		} else {
			 $response->pesan = '  Gagal Update';
            $response->kode = 'GL';
            $response->status = 0;
		}
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
}

?>