<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Buku extends CI_Controller {
	public function index()
	{
        $dataUrl=base_url('assets/buku.json');
        $dataStringJson=file_get_contents($dataUrl);
        $dataJson=json_decode($dataStringJson);
		$output['buku']=$this->buku_data($dataJson);
        $this->load->view('buku',$output);
    }
    function buku_data($data)
    {
        $result=[['Klasifikasi','Eksemplar','Judul']];
        foreach ($data as $row) {
            $databuku=[$row->klasifikasi,(int)$row->eksemplar,(int)$row->judul];
            array_push($result,$databuku);
        }
        return json_encode($result);
    }
}