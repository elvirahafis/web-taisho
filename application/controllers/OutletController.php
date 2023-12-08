<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OutletController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Outlet_model', 'ON');

	}
	public function viewOutlet()
	{
		$this->load->view('Page/Outlet');
	}
	public function getListOutlet()
	{
		$response = new \stdClass();
		$Outlet = $this->db->query("select * from outlet");
		$ListOutlet = $Outlet->result_array();
		if($ListOutlet){
			$response->data = $ListOutlet;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		
		  header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function viewAddOutlet()
	{
		$this->load->view('Page/AddOutlet');
	}

	public function createOutlet()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$data_outlet['Kode_Outlet'] = $post['Kode_Outlet'];
		$data_outlet['Nama_outlet'] = $post['Nama_Outlet'];
		$data_outlet['NPWP'] = $post['NPWP'];
		$data_outlet['Alamat'] = $post['Alamat'];
		$createoutlet = $this->ON->createOutlet('outlet', $data_outlet);
		if($createoutlet ){
			$response->createoutlet = $createoutlet;
			$response->pesan ='Insert Berhasil';
            $response->kode = 'SC';
            $response->status = 1;
		} else {
			 $response->pesan = '  Gagal Insert';
            $response->kode = 'GL';
            $response->status = 0;
		}
		  header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function viewUpdateOutlet()
	{
		$Kode_outlet = $this->uri->segment('2');
        $data['Kode_outlet'] = $Kode_outlet;
		$this->load->view('Page/UpdateOutlet', $data);
	}

	public function UpdateOutletbyKode()
	{
		$response = new \stdClass();
		$Kode_Outlet = $this->input->get('Kode_Outlet');
		$outlet = $this->db->query("select * from outlet WHERE Kode_Outlet = '$Kode_Outlet'");
		$DataOutlet = $outlet->result_array();
		if($DataOutlet){
			$response->data = $DataOutlet;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		 header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function updateOutlet()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$Kode_Outlet = $post['Kode_Outlet'];
		$Kode_outlett = $post['Kode_outlett'];
		$Nama_outlet = $post['Nama_outlet'];
		$NPWP = $post['NPWP'];
		$Alamat = $post['Alamat'];
		$UpdateOutlet = $this->db->query("update outlet set Kode_Outlet = '$Kode_Outlet',
						Nama_outlet = '$Nama_outlet',
						NPWP = '$NPWP',Alamat = '$Alamat' where Kode_Outlet = '$Kode_outlett'");

		if($UpdateOutlet ){
			$response->UpdateOutlet = $UpdateOutlet;
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
	public function HapusOutlet()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$Kode_Outlet = $post['Kode_Outlet'];
		$DeleteOutlet = $this->db->query("delete from outlet where Kode_Outlet = '$Kode_Outlet'");
		if($DeleteOutlet ){
			$response->DeleteOutlet = $DeleteOutlet;
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
}


?>