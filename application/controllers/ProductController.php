<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'MN');

	}
    public function index()
	{
		
		$this->load->view('layout/navbar');
	}

	public function getListProduct()
	{
		$response = new \stdClass();
		$Product = $this->db->query("select * from produk");
		$ListProduct = $Product->result_array();
		if($ListProduct){
			$response->data = $ListProduct;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		
		  header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function viewProduct()
	{
		$this->load->view('Page/Product');
	}
	public function viewAddProduct()
	{
		$this->load->view('Page/AddProduct');
	}
	public function createProduct()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$data_product['Kode_Barang'] = $post['Kode_Barang'];
		$data_product['Nama_Barang'] = $post['Nama_Barang'];
		$data_product['Klasifikasi'] = $post['Klasifikasi'];
		$data_product['UOM'] = $post['UOM'];
		$createproduct = $this->MN->createProduct('produk', $data_product);
		if($createproduct ){
			$response->createproduct = $createproduct;
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
	public function UpdateProduct()
	{
		$Kode_Barang = $this->uri->segment('2');
        $data['Kode_Barang'] = $Kode_Barang;
		$this->load->view('Page/UpdateProduct', $data);
	}
	public function getProductKode()
	{
		$response = new \stdClass();
		$Kode_Barang = $this->input->get('Kode_Barang');
		$Product = $this->db->query("select * from produk WHERE Kode_Barang = '$Kode_Barang'");
		$DataProduct = $Product->result_array();
		if($DataProduct){
			$response->data = $DataProduct;
			$response->pesan = 'Success';
            $response->kode = 'SC';
            $response->status = 1;
		}
		 header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function updateProductbyKode()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$Kode_Barang = $post['Kode_Barang'];
		$Kode_Barangg = $post['Kode_Barangg'];
		$Nama_Barang = $post['Nama_Barang'];
		$Klasifikasi = $post['Nama_Barang'];
		$UOM = $post['UOM'];
		$UpdateProduct = $this->db->query("update produk set Kode_Barang = '$Kode_Barang',
						Nama_Barang = '$Nama_Barang',
						Klasifikasi = '$Klasifikasi',UOM = '$UOM' where Kode_Barang = '$Kode_Barangg'");
		if($UpdateProduct ){
			$response->UpdateProduct = $UpdateProduct;
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

	public function HapusProduct()
	{
		$response = new \stdClass();
		$post = $this->input->post();
		$Kode_Barang = $post['Kode_Barang'];
		$DeleteProduct = $this->db->query("delete from produk where Kode_Barang = '$Kode_Barang'");
		if($DeleteProduct ){
			$response->DeleteProduct = $DeleteProduct;
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