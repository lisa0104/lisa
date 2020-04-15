<form method="post" ><center>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href=""><b><center>Update Data</center></b></a>
  <div class="collapse navbar-collapse">
  </div>
  </nav>
  <br/>
<?php  
require('formbuilder.php');
$Form= new Form("","Update Data");
//$xkategori=explode(',',$row['kategori']);
$Form->addFielddis("id_buku","<td>ID Buku</td><td>:</td>",$row['kode_buku']);
//$Form->addFielddis("id_kategori","<td>ID Kategori</td><td>:</td>",$row['id_kategori']);
$Form->addField("judul_buku","<td>Judul Buku</td><td>:</td>",$row['judul_buku']);
//$Form->addRadio("jk","<td>Jenis Kelamin<t/d><td>:</td>",$row['jk'], array('Pria','Wanita'));
$Form->addDropdown("kategori","<td>Kategori</td><td>:</td>",$row['kategori'],array('novel','sains','sejarah','teknologi'));
//$Form->addcheckbox("hobby","<td>Hobby</td><td>:</td>",$xkategori,array('Sastra','Sains','Sosial','Komik'));
$Form->addField("penerbit","<td>Penerbit</td><td>:</td>",$row['penerbit']);
$Form->addField("tahun_terbit","<td>Tahun terbit</td><td>:</td>",$row['tahun_terbit']);
//$Form->addtextArea("alamat","<td>Alamat</td><td>:</td>",$row['alamat']);

if (!isset($_POST['tombol'])) {
	$Form->displayForm();
	echo "<br>";

}else{
	$Form->terimaForm();
	$Form->cetakForm();
}

 ?>

 