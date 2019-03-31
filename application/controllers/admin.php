<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	if(!$this->session->userdata('adminlogin') && $this->uri->segment(2) && $this->uri->segment(2)!='login')
		{
			redirect('admin');

		}
	}

    public function index()
	{
		if($this->session->userdata('adminlogin'))
      {redirect('admin/panel');}
		$this->load->view('admin/login');
	}
  public function login()
  {
    $exist=Idare::Find(['mail'=>$this->input->post('email'),'password'=>$this->input->post('password')]);
    if ($exist) 
    {
      $this->session->set_userdata('adminlogin',true);
      $this->session->set_userdata('admininfo',$exist);
      redirect('admin/panel');
    }
    else{
      //login xeta
      $xeta="Email adresiniz yanlisdir";
      $this->session->set_flashdata('error',$xeta);
      redirect('admin');
    }
 
  }
  public function mehsullar()
  {
    $data['head']="Mehsullar";
    $data['products']=mehsullar::select();
    $this->load->view('admin/product/products',$data);
  }
  public function mehsulelave()
  {
    $data['head']='Mehsul elave';
    $data['subcategory']=kateqoriya::select();
    $this->load->view('admin/product/addproduct',$data);
  }
  public function deletefunction()
  {
    if($this->session->userdata('deletefunction'))
    {
      $this->session->unset_userdata('deletefunction');
    }
    else{
      $this->session->set_userdata('deletefunction',true);

    }
    back();
  }
  public function sil($table,$id)
  {
    if(!$this->session->userdata('deletefunction'))
    {
      echo "Burada isin yoxdur";

    }
    switch($table)
    {
      case 'products':
      $product=Mehsullar::find($id);
      if($product)
      {
         stoktipi::delete(['product'=>$id]);
         stoklar::delete(['product'=>$id]);
         $images=sekiller::select(['product'=>$id]);
         foreach ($images as $image) {
           unlink($image->path);
           sekiller::delete($image->id);
         }
         unlink($product->qrcode);
         mehsullar::delete($id);
         }
         break;

         case "stock":
          stoklar::delete($id);
           break;
         case "category":
         kateqoriya::delete($id);
          break;
          case"options":
         $option=secimler::find($id);
         altsecimler::delete(['option_id'=>$option->id]);
         secimler::delete($id);
         break; 
         case"suboptions":
         $altsecimler=altsecimler::find($id);
         stoklar::delete(['suboption1'=>$altsecimler->id]);
         stoklar::delete(['suboption2'=>$altsecimler->id]);

         altsecimler::delete($id);
         break;

      }
         flash('success','check',"Seciminiz silindi");
         back();
}
  public function mehsuldeyisdir($id)
  {
    if(isPost())
    {
       if(postvalue('product'))
       {
           $data=[
          'category'=>postvalue('category'),
          'subcategory'=>postvalue('subcategory'),
          'title'=>postvalue('title'),
          'price'=>postvalue('price'),
          'discount'=>postvalue('discount'),
          'description'=>postvalue('desc'),
          'tag'=>postvalue('tag') ];
          mehsullar::update($id,$data);
      flash('success','check','Mehsul deyisdirildi');
      back();
       }
    }
  

    $mehsul=mehsullar::find($id);
    if(!$mehsul)
    {
          flash('danger','remove','bu mehsul bazada tapilmadi');
          back();
    }
    $data['product']=$mehsul;
    $data['images']=sekiller::select(['product'=>$id]);
    $data['stock']=stoklar::select(['product'=>$id]);
    $data['type']=stoktipi::find(['product'=>$id]);
    $data['subcategory']=kateqoriya::select();
    $data['head']="Mehsul deyisdir";
    $this->load->view('admin/product/editproduct',$data);
  }
    public function mehsulstokdeyisdir($id)
    {
      if(isPost())
      {
        $stok=stoklar::find($id);
        $data=
        [
          'product'=>$stok->product,
          'suboption1'=>postvalue('subcategory1'),
          'suboption2'=>postvalue('subcategory2'),
          'stock'=>postvalue('stock')
        ];
        stoklar::update($id,$data);
        flash("success","check","stok ugurla deyisdirildi");
        back();


      }
     $stok=stoklar::find($id);
      $stocktype=stoktipi::find(['product'=>$stok->product]);
      $secim1=altsecimler::select(['option_id'=>$stocktype->option1]);
      $secim2=null;
      if($stocktype->option2!=null)
      {
        $secim2=altsecimler::select(['option_id'=>$stocktype->option2]);
       
      }
      $data['options']=$secim1;
      $data['option2']=$secim2;
      $data['type']=$stocktype;
      $data['stocks']=$stok;
    $data['head']="Mehsul stok Deyisdir";
      $this->load->view('admin/product/editproductstock',$data);
    }
  public function mehsulsekilsil($id)
  {
    $sekil=sekiller::find($id);
    if($sekil->master==1)
    {
     flash('warning','remove','Fon sekili siline bilmez!!!');
     back();
    }
    unlink($sekil->path);
    sekiller::delete($id);
    flash('success','check','sekil siilindi');
    back();

  }
  public function mehsulsekilfon($id)
  {
    $sekil=sekiller::find($id);
    sekiller::update(['product'=>$sekil->product],['master'=>0]);
    $data=['master'=>1];
    sekiller::update($id,$data);
    flash('success','check','fon sekili secildi');
    back();
  }
  public function mehsulsekilelave($id)
  {
    if(isPost())
    {
      $mehsul=mehsullar::find($id);
      $config['upload_path']='assets/upload/products/';
      $config['allowed_types']='jpg|png|jpeg';
      $config['file_name']=$mehsul->seo.$mehsul->id;
      $this->upload->initialize($config);
      if($this->upload->do_upload('file'))
      {
       $image=$this->upload->data();
       $path=$config['upload_path'].$image['file_name'];
       $data=['product'=>$id,'path'=>$path];
       sekiller::insert($data);

      }
    }



    $data['head']='Mehsul sekil elave';
      $data['subcategory']=kateqoriya::select();
    $this->load->view('admin/product/addproductimage',$data);
  }
  public function mehsulstoktipielave($id)
{
  if(isPost())
  {
    if (postvalue('subcategory1')==postvalue('subcategory2')) 
    {
      flash('warning','remove','Mehsul secimleri bir-birinden ferqli olmalidir');
      back();
      
    }
    if(stoktipi::count(['product'=>$id])==1)
    {
  flash('warning','remove','Bu mehsulcun bazada stok var ');
      back();

    }
        $data=['product'=>$id,'option1'=>postvalue('subcategory1')];
    if (postvalue('subcategory2')!=0) {$data['option2']=postvalue('subcategory2');}
    stoktipi::insert($data,'stoktype');
    flash('success','check','Stok ugurla elave edildi');
    redirect('admin/mehsulstok/'.$id);
  }


    $data['head']='Mehsul stok elave';
      $data['options']=secimler::select();
    $this->load->view('admin/product/addproductstoktype',$data);

  }
  public function mehsulstok($id)
  {
    if (isPost()) 
    {
      if(stoklar::find(['product'=>$id,'suboption1'=>postvalue('subcategory1'),'suboption2'=>postvalue('subcategory2')]))
      {
        flash('warning','remove','bu stok bazada artiq movcuddur');
        back();

      }
      $data=[
        'product'=>$id,
        'suboption1'=>postvalue('subcategory1'),
        'suboption2'=>postvalue('subcategory2'),
        'stock'=>postvalue('stock')
      ];
      stoklar::insert($data);
      flash('success','check','Stok elave edildi');
      back();
     
    }
    $product=mehsullar::find($id);
    if(!$product)
    {
      flash('danger','remove','bele bir mehsul tapilmadi');
      back();
    

    }
      $stocktype=stoktipi::find(['product'=>$product->id]);
      $secim1=altsecimler::select(['option_id'=>$stocktype->option1]);
      $secim2=null;
      if($stocktype->option2!=null)
      {
        $secim2=altsecimler::select(['option_id'=>$stocktype->option2]);
       
      }
      $data['options']=$secim1;
      $data['option2']=$secim2;
      $data['type']=$stocktype;
      $data['stocks']=stoklar::select(['product'=>$id]);
    $data['head']="Mehsul stok melumatlari";
    $this->load->view('admin/product/addproductstock',$data);
  }
  public function mehsulcontroller($id=null)
  {
    if (isPost()) {
      if (postvalue('step1')) {
        $data=[
          'category'=>postvalue('category'),
          'subcategory'=>postvalue('subcategory'),
          'title'=>postvalue('title'),
          'price'=>postvalue('price'),
          'discount'=>postvalue('discount'),
          'description'=>postvalue('desc'),
          'tag'=>postvalue('tag') ];
          mehsullar::insert($data);
      }
      $insert_id=$this->db->insert_id();
      $qrpath='assets/upload/qrcode/mehsul'.$insert_id.".png";
      $params['data'] = 'mehsulid-'.$insert_id;
      $params['level'] = 'H';
      $params['size'] = 5;
      $params['savename'] = FCPATH.$qrpath;
       $this->ciqrcode->generate($params);
       mehsullar::update($insert_id,['qrcode'=>$qrpath]);
       redirect('admin/mehsulsekilelave/'.$insert_id);
    }
    $mehsul=mehsullar::find($id);
      if ($mehsul)
     {
      mehsullar::update($id,['complete'=>1]);
      flash('success','check','mehsul elave edildi');
      redirect('admin/mehsullar');
    }

  }

	
	public function panel()
	{
		$data['head']="Panel";
		$this->load->view('admin/panel',$data);
	}
	//sayt ayarlar baslangici
	public function config()
	{
		$data['head']="Sayt ayarlari";
		$data['config']=Ayarlar::Find(7);
		$this->load->view('admin/config',$data);
	}
	public function configpost()
	{
		$config=Ayarlar::find(postvalue('id'));
		$data=array(
			'title'=>postvalue('title'),
			'info'=>postvalue('info'),
			'facebook'=>postvalue('facebook'),
            'twitter'=>postvalue('twitter'),
            'instagram'=>postvalue('instagram'),
            'youtube'=>postvalue('youtube'),
            'mail'=>postvalue('mail'),
       
		);
		if ($_FILES['logo']['size']>0) {
			$data['logo']=imageupload('logo','config');
			unlink($config->logo);
		}
		if ($_FILES['icon']['size']>0) {
             $data['icon']=imageupload('icon','config');
             unlink($config->icon);
		}
		  

 
            Ayarlar::update(postvalue('id'),$data);

            flash('success','check','Tebrikler','Muveffeqiyyetle elave edildi');
             back();	
           }
// sayt ayarlari bitisi
           //kateqoriyalar baslngici


           public function kateqoriyalar()
           {
           	$data['head']="kateqoriyalar";
           	$data['categories']=Kateqoriya::select();
           	$this->load->view('admin/category/categories',$data);
           }
           public function kateqoriyaelave()
           {
           	if (isPost()) {
           		$data=array
           		(
           			'topcategory'=>postvalue('topcategory'),
           		'name'=>postvalue('category'),
           		'slug'=>sef(postvalue('category'))

           		);
             kateqoriya::insert($data);
          	flash('success','check','Kateqoriya elave edildi');
           	redirect('admin/kateqoriyalar');

           	}
          
           	$data['head']="kateqoriyaelavesi";
           	$this->load->view('admin/category/addcategory',$data);

           }
           public function kateqoriyadeyisdir($id)
           {
 	           if (isPost())
 	            {
           		$data=array
           		(
           			'topcategory'=>postvalue('topcategory'),
           		'name'=>postvalue('category'),
           		'slug'=>sef(postvalue('category'))

           		);
             kateqoriya::update($id,$data);
          	flash('success','check','Kateqoriya guncellendi');
           	redirect('admin/kateqoriyalar');
           }


           	$isExist=kateqoriya::find($id);
           	if ($isExist) {
      	$data['categories']=$isExist;

	$this->load->view('admin/category/editcategory',$data);           

           

           }
       }
       // katqeqoriyalar bitisi
       /*mehsul secimleri bashlangici*/
       public function mehsulsecimleri()
       {
       	$data['head']="Mehsul secimleri";
       	$data['options']=Secimler::select();
       	$this->load->view('admin/options/options',$data);
       }
       public function secimelave()
       {
       	if(ispost()){
       	$data=array
       	(
       		'name'=>postvalue('option'),
       		'slug'=>postvalue('option')
       	);
       	secimler::insert($data);
       	flash('success','check','Secim elave edildi');
       redirect('admin/mehsulsecimleri');
       }
       $data['head']="Secim elave";
       $this->load->view('admin/options/addoption',$data);
       }
       public function secimdeyisdir($id)
       {
        if (ispost()) {
          $data=array
          (
            'name'=>postvalue('option'),
            'slug'=>sef(postvalue('option'))
          );
          Secimler::Update($id,$data);
          flash("success","check","secim ugurla deyisdirildi");
          redirect('admin/mehsulsecimleri');
        }


        $isExist=Secimler::find($id);
        if ($isExist) {
           $data['options']=$isExist;
        }
        $data['head']="Secim deyisdir";
        $this->load->view('admin/options/editoptions',$data);
       }
       public function altsecimler($id)
       {
        $option=secimler::find($id);
        $data['head']=$option->name."-ucun Alt secimler";
        $data['suboptions']=Altsecimler::select(['option_id'=>$id]);
        $data['option']=$option;
        $this->load->view('admin/options/suboption',$data);

       }
       public function altsecimelave($id)
       {
        if (isPost()) {
         $suboption=postvalue('suboption');
         $ara="-";
         if(strpos($suboption,$ara))
         {
          $value=explode("-", $suboption);
          foreach ($value as $name) {
            $hey= altsecimler::insert(['option_id'=>$id,'name'=>$name]);

          }
             flash("success","check","Alt secimler elave edildi");
            redirect('admin/altsecimler/'.$id);

         }else
         {
          altsecimler::insert(['option_id'=>$id,'name'=>$suboption]);
          flash("success","check","Altsecim elave edildi");
          redirect('admin/altsecimler/'.$id);
         }
        }
        $this->load->view('admin/options/addsuboption');
       }
       public function altsecimdeyisdir($id)
       {
        if(isPost())
        {
          $data=array
          (
            'name'=>postvalue('supoption')
          );
          $suboption=altsecimler::find($id);
          altsecimler::update($id,$data);
          flash("success","check","Alt secim deyisdirildi");
          redirect('admin/altsecimler/'.$suboption->option_id);

        }

             
           $isExist=altsecimler::find($id);
           if($isExist)
           {
            $data['suboptions']=$isExist;        

           }
           $data['head']="alt secim deyisdir";
           $this->load->view('admin/options/editsuboption',$data);

       }


	public function cixis()
	{
		$this->session->sess_destroy();
		redirect('admin');
		
	}
}
