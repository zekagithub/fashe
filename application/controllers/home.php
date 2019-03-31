<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view('front/home');
	}
	public function product($seo)
	{
         $product=mehsullar::find(['seo'=>$seo]);
         if($product and $product->active==1)
         {
         	$data['product']=$product;
         	$data['stocks']=stoklar::group('suboption1',['product'=>$product->id]);
         
         	
         	$data['images']=sekiller::select(['product'=>$product->id]);
         	$data['stocktype']=stoktipi::find(['product'=>$product->id]);
         	$this->load->view('front/product/product',$data);

         }
		
	}
	public function getstock()
	{
		$product=postvalue('product');
		$stockId=postvalue('firststock');
		$stocks=stoklar::Join(['suboptions','suboptions.id','stocks.suboption2'],['product'=>$product,'suboption1'=>$stockId]);
		echo json_encode($stocks);
	
	}
	public function category($category)
	{
		switch ($category) {
			case 'kisi':
			$data['kateqoriyalar']=kateqoriya::select(['topcategory'=>1]);
			$data['mehsullar']=mehsullar::select(['category'=>1,'active'=>1]);
			$data['pageinfo']=['title'=>'Kisi','subtitle'=>'Yeni sezonun trend kisi mehsullari','image'=>'empty'];
				
				break;
				case 'qadin':
					$data['kateqoriyalar']=kateqoriya::select(['topcategory'=>2]);
			$data['mehsullar']=mehsullar::select(['category'=>2,'active'=>1]);
			$data['pageinfo']=['title'=>'qadin','subtitle'=>'Yeni sezonun trend qadin mehsullari','image'=>'empty'];
				break;
				case 'usaq':
					$data['kateqoriyalar']=kateqoriya::select(['topcategory'=>3]);
			$data['mehsullar']=mehsullar::select(['category'=>3,'active'=>1]);
			$data['pageinfo']=['title'=>'Usaq','subtitle'=>'Yeni sezonun trend usaq mehsullari','image'=>'empty'];
				break;
			
			default:
				//xeta mesaji
				break;
		}




		$this->load->view('front/category/category',$data);
	}
	public function subcategory($category,$subcategory)
	{
		echo "dbr";
	}
	public function homeproduct()
	{
		$data['melumat']=mehsullar::select();
		$this->load->view('front/home',$data);
	}
}