<?php
require('Mperpus.php');
class perpus {
    public $id_buku;
    public $id_kategori;
    public $judul_buku;
    public $kategori;
    public $penerbit;
    
    public function _construct(
        $id_buku="Belum diketahui",
        $id_kategori="Belum Diketahui",
        $judul_buku="Belum Diketahui",

        $kategori="Belum Diketahui",
		$penerbit="Belum Diketahui",
       $a="aaaa"
								)
    {
    $this->id_buku=$id_buku;
    $this->id_kategori=$id_kategori;
    $this->judul_buku=$judul_buku;
    $this->kategori=$kategori;
    $this->penerbit=$penerbit;
  
    } 
    public function cetaklist()
    {  
        $modelMperpus= new Mperpus; 
        $query_list=$modelMperpus->getAll();
        require('Vperpus/daftar_perpus.php');
    }
    public function detail()
    {
        $modelMperpus= new Mperpus(); 
        $query_list=$modelMperpus->getDetail();
        $id_buku=$_GET['id_buku'];
        require('Vperpus/detail.php');
    }
    public function hapus()
    {
        $modelMperpus= new Mperpus(); 
        $query_list=$modelMperpus->getHapus();
        $id_buku=$_GET['id_buku'];
        header('location: index.php');
    }
     public function update($id_buku)
     {
        if (!isset($_POST['tombol']))
        {
        $modelMperpus= new Mperpus(); 
        $query_list=$modelMperpus->getDetail($id_buku);
        $row=mysqli_fetch_array($query_list);

         require('Vperpus/formupdate.php');
            
        } else {
           // $this->id_kategori=$_POST['id_kategori'];
		   
			$this->judul_buku=$_POST['judul_buku'];
			$this->kategori=$_POST['kategori'];
			
			if($this->kategori=="Sastra"){
				//$a="Sastra";
            $this->id_kategori='k001';
			}
			if($this->kategori=="Sains"){
				//$a="Sains";
            $this->id_kategori='k002';
			}
			if($this->kategori=="Sosial"){
				//$a="Sosial";
            $this->id_kategori='k003';
			}
			if($this->kategori=="Komik"){
				//$a="Komik";
            $this->id_kategori='k004';
			}
			$a="fhg";
		/*	if($this->id_kategori=="k001"){
				//$a="Sastra";
            $this->kategori="Sastra";
			}
			if($this->id_kategori=="k002"){
				//$a="Sains";
            $this->kategori="Sains";
			}
			if($this->id_kategori=="k003"){
				//$a="Sosial";
            $this->kategori="Sosial";
			}
			if($this->id_kategori=="k004"){
				//$a="Komik";
            $this->kategori="Komik";
			}*/
			//else{$this->kategori=$_POST['kategori'];}
            $this->penerbit=$_POST['penerbit'];



            $modelMperpus= new Mperpus(); 
            $exe=$modelMperpus->getUpdate($this);
            if ($exe>0) {
            header ('location: index.php');    
            }else{
                echo "gagal";
            }      
        }
     }
public function inputperpus()
    {
        if (!isset($_POST['tombol']))
        {
         include('Vperpus/forminput_perpus.php');
        } else {
            $this->id_buku=$_POST['id_buku'];
			$this->id_kategori=$_POST['id_kategori'];
			$this->judul_buku=$_POST['judul_buku'];
            $this->kategori=$_POST['kategori'];
            $this->penerbit=$_POST['penerbit'];
            $modelperpus = new Mperpus(); 
            $query_list = $modelperpus->inputperpus($this);
            header('location: index.php');   
        }
    }
    }
?>