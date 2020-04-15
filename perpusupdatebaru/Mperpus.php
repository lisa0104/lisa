<?php
class Mperpus {
    var  $host="localhost";
    var  $user="root";
    var  $pass="";
    var  $db="perpustakaan";

public function koneksi ()
    {
        return $con=mysqli_connect($this->host,$this->user,
            $this->pass,$this->db);
    }   
public function getAll() 
    {
    $con=$this->koneksi();
    $query="SELECT * FROM kategori_buku INNER JOIN buku ON kategori_buku.id_kategori=buku.id_kategori";
    $query_list=mysqli_query($con,$query);
    return $query_list;
    }
public function getDetail()
    {
        $con=$this->koneksi();
		$query= "SELECT * FROM kategori_buku INNER JOIN buku ON kategori_buku.id_kategori=buku.id_kategori WHERE kode_buku='$_GET[kode_buku]'";
		//$query="SELECT * from buku INNER JOIN pinjam ON buku.id_buku=pinjam.id_buku 
		//WHERE buku.id_buku=(SELECT id_buku from pinjam)"
        //$query="SELECT * FROM buku inner join kategori_buku WHERE id_buku='$_GET[id_buku]'";
        $query_list=mysqli_query($con,$query);
        return $query_list;
    } 
public function getHapus()
{
    $con=$this->koneksi();
    $query="DELETE FROM buku WHERE id_buku='$_GET[id_buku]'";
    $query_list=mysqli_query($con,$query);
    return $query_list;

}
//  kategori='".$objperpus->kategori."', 
public function getUpdate($objperpus)
{
	$con=$this->koneksi();
    $query="UPDATE buku SET 
                             id_kategori='".$objperpus->id_kategori."', 
                             judul_buku='".$objperpus->judul_buku."',
     
                             penerbit='".$objperpus->penerbit."',
							tahun_terbit='".$objperpus->tahun_terbit."'
						   
						   
						WHERE kode_buku='".$_GET['kode_buku']."'";
        $query_list=mysqli_query($con,$query) or die(mysqli_error($con)) ;
        return $query_list;
}
/*public function inputperpus($objperpus)
    {
        $con=$this->koneksi();
        $query="INSERT INTO buku (id_buku,id_kategori,judul_buku,kategori,
									penerbit)
        VALUES (
                '".$objperpus->id_buku."',
                '".$objperpus->id_kategori."',
                '".$objperpus->judul_buku."',
                '".$objperpus->kategori."',
                '".$objperpus->penerbit."'
               
            )";
            mysqli_query($con,$query) or die(mysqli_error($con));
    }*/
}//end class

?>