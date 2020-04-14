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
    $query="SELECT * FROM buku";
    $query_list=mysqli_query($con,$query);
    return $query_list;
    }
public function getDetail()
    {
        $con=$this->koneksi();
        $query="SELECT * FROM buku WHERE id_buku='$_GET[id_buku]'";
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

public function getUpdate($objperpus)
{
	$con=$this->koneksi();
    $query="UPDATE buku SET 
                             id_kategori='".$objperpus->id_kategori."', 
                             judul_buku='".$objperpus->judul_buku."',
                             kategori='".$objperpus->kategori."', 
                             penerbit='".$objperpus->penerbit."'
                           
						WHERE id_buku='".$_GET['id_buku']."'";
        $query_list=mysqli_query($con,$query) or die(mysqli_error($con)) ;
        return $query_list;
}
public function inputperpus($objperpus)
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
    }
}//end class

?>