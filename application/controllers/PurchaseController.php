<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PurchaseController extends CI_Controller {
		public function __construct()
	{
		parent::__construct();
		$this->load->model('Purchase_model', 'BN');

	}
	public function viewPurchase()
	{
		$this->load->view('Page/Purchase');
	}
	public function viewAddPurchase()
	{
		$this->load->view('Page/AddPurchase');
	}
	public function viewUpdatePurchase()
	{
		$No_dokumen_masuk = $this->uri->segment('2');
        $data['No_dokumen_masuk'] = $No_dokumen_masuk;
		$this->load->view('Page/UpdatePurchase',$data);
	}
	public function getPurchaseKode()
	{
		$response = new \stdClass();
		$No_dokumen_masuk = $this->input->get('No_dokumen_masuk');
		$Purchase = $this->db->query("select * from purchase where No_dokumen_masuk = '$No_dokumen_masuk'");
		$ListPurchase = $Purchase->result_array();
		if($ListPurchase){
			$response->data = $ListPurchase;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function getListPurchase()
	{
		$response = new \stdClass();
		$Purchase = $this->db->query("select * from purchase");
		$ListPurchase = $Purchase->result_array();
		if($ListPurchase){
			$response->data = $ListPurchase;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function UpdatePurchase()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$No_dokumen_masuk = $post['No_dokumen_masuk'];
		$No_dokumen_mask = $post['No_dokumen_mask'];
		$Tanggal_transaksi = $post['Tanggal_transaksi'];
		$Kode_barang = $post['Kode_barang'];
		$Nama_barang = $post['Nama_barang'];
		$Nomor_PO = $post['Nomor_PO'];
		$Qty = $post['Qty'];
		$Harga_beli = $post['Harga_beli'];
		$UpdatePurchase = $this->db->query("update purchase set No_dokumen_masuk = '$No_dokumen_masuk',
						Tanggal_transaksi = '$Tanggal_transaksi',Nomor_PO = '$Nomor_PO',
						Kode_barang = '$Kode_barang',
						Nama_barang = '$Nama_barang',Qty = '$Qty',Harga_beli = '$Harga_beli'
						 where No_dokumen_masuk = '$No_dokumen_mask'");
						// var_dump($this->db->last_query());
		if($UpdatePurchase ){
			$response->UpdatePurchase = $UpdatePurchase;
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
	public function createPurchase()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$data_purchase['No_dokumen_masuk'] = $post['No_dokumen_masuk'];
		$data_purchase['Tanggal_transaksi'] = $post['Tanggal_transaksi'];
		$data_purchase['Nomor_PO'] = $post['Nomor_PO'];
		$data_purchase['Kode_barang'] = $post['Kode_barang'];
		$data_purchase['Nama_barang'] = $post['Nama_barang'];
		$data_purchase['Qty'] = $post['Qty'];
		$data_purchase['Harga_beli'] = $post['Harga_beli'];
		$createPurchase= $this->BN->createPurchase('purchase', $data_purchase);
			if($createPurchase ){
			$response->createPurchase = $createPurchase;
			$response->pesan = 'Insert Berhasil';
            $response->kode = 'SC';
            $response->status = 1;
		} else {
			$response->pesan = 'Gagal REgister';
            $response->kode = 'GL';
            $response->status = 0;
		}		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function HapusPurchase()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$No_dokumen_masuk = $post['No_dokumen_masuk'];
		$DeletePurchase = $this->db->query("delete from purchase where No_dokumen_masuk = '$No_dokumen_masuk'");
		if($DeletePurchase ){
			$response->DeletePurchase = $DeletePurchase;
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