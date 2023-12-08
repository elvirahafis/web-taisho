<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalesController extends CI_Controller {
		public function __construct()
	{
		parent::__construct();
		$this->load->model('Sales_model', 'BN');

	}
	public function viewSales()
	{
		$this->load->view('Page/Sales');
	}
	public function viewAddSales()
	{
		$this->load->view('Page/AddSales');
	}
	public function getListSales()
	{
		$response = new \stdClass();
		$Product = $this->db->query("select * from sales");
		$ListSales = $Product->result_array();
		if($ListSales){
			$response->data = $ListSales;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	public function HapusSales()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$No_dokumen_keluar = $post['No_dokumen_keluar'];
		$DeleteSales = $this->db->query("delete from sales where No_dokumen_keluar = '$No_dokumen_keluar'");
		if($DeleteSales ){
			$response->DeleteSales = $DeleteSales;
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
	public function viewUpdateSales()
	{
		$No_dokumen_keluar = $this->uri->segment('2');
        $data['No_dokumen_keluar'] = $No_dokumen_keluar;
		$this->load->view('Page/UpdateSales',$data);
	}
	public function getSalesKode()
	{
		$response = new \stdClass();
		$No_dokumen_keluar = $this->input->get('No_dokumen_keluar');
		$Sales = $this->db->query("select * from sales where No_dokumen_keluar = '$No_dokumen_keluar'");
		$ListSales = $Sales->result_array();
		if($ListSales){
			$response->data = $ListSales;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function UpdateSales()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$No_dokumen_keluar = $post['No_dokumen_keluar'];
		$No_dokumen_keluarr= $post['No_dokumen_keluarr'];
		$No_dokumen_masuk = $post['No_dokumen_masuk'];
		$Tanggal_transaksi = $post['Tanggal_transaksi'];
		$Kode_barang = $post['Kode_barang'];
		$Nama_barang = $post['Nama_barang'];
		$Kode_outlet = $post['Kode_outlet'];
		$Nama_outlet = $post['Nama_outlet'];
		$Qty = $post['Qty'];
		$Harga_jual = $post['Harga_jual'];
		
		$Purchase = $this->db->query("select * from purchase where No_dokumen_masuk = '$No_dokumen_masuk'");
		$ListPurchase = $Purchase->result_array();

		if(!$ListPurchase )
		{
			$response->pesan = 'Nomor Dokumen Tidak Ada';
            $response->kode = 'SC';
            $response->status = 2;
		} else {
			$UpdateSales = $this->db->query("update sales set No_dokumen_keluar = '$No_dokumen_keluar',
					No_dokumen_masuk = '$No_dokumen_masuk',
					Tanggal_transaksi = '$Tanggal_transaksi',	Kode_barang = '$Kode_barang',
					Nama_barang = '$Nama_barang',
					Kode_outlet = '$Kode_outlet',
					Nama_outlet = '$Nama_outlet',Qty = '$Qty',Harga_jual = '$Harga_jual'
					where No_dokumen_keluar = '$No_dokumen_keluarr'");
			
			if($UpdateSales ){
				$response->UpdateSales = $UpdateSales;
				$response->pesan ='Update Berhasil';
				$response->kode = 'SC';
				$response->status = 1;
			} else {
				$response->pesan = '  Gagal Update';
				$response->kode = 'GL';
				$response->status = 0;
			}
	// var_dump($this->db->last_query());
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function createSales()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$data_sales['No_dokumen_keluar'] = $post['No_dokumen_keluar'];
		$data_sales['No_dokumen_masuk'] = $post['No_dokumen_masuk'];
		$data_sales['Tanggal_transaksi'] = $post['Tanggal_transaksi'];
		$data_sales['Kode_barang'] = $post['Kode_barang'];
		$data_sales['Nama_barang'] = $post['Nama_barang'];
		$data_sales['Kode_outlet'] = $post['Kode_outlet'];
		$data_sales['Nama_outlet'] = $post['Nama_outlet'];
		$data_sales['Qty'] = $post['Qty'];
		$data_sales['Harga_jual'] = $post['Harga_jual'];
		$No_dokumen_masuk = $post['No_dokumen_masuk'];
		$Purchase = $this->db->query("select * from purchase where No_dokumen_masuk = '$No_dokumen_masuk'");
		//  var_dump($this->db->last_query());
		$ListPurchase = $Purchase->result_array();
	
		if(!$ListPurchase )
		{
			$response->pesan = 'Nomor Dokumen Tidak Ada';
            $response->kode = 'SC';
            $response->status = 2;
		} else {
				$createSales= $this->BN->createSales('sales', $data_sales);
			if($createSales ){
				$response->createSales = $createSales;
				$response->pesan = 'Insert Berhasil';
				$response->kode = 'SC';
				$response->status = 1;
			} else {
				$response->pesan = '  Gagal Insert';
				$response->kode = 'GL';
				$response->status = 0;
			}
		}
		  header('Content-Type: application/json');
		echo json_encode($response);
	}

}
?>