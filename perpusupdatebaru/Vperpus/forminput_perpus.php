<h5 style="padding:10px">Tambah Data Buku</h5>
<form method="post"><center>

<?php  
require('formbuilder.php');
$Form= new Form("","Input Form");
$Form->addField("id_buku","<td>ID Buku</td><td>:</td>");
$Form->addField("id_kategori","<td>ID Kategori</td><td>:</td>");
$Form->addField("judul_buku","<td>Judul Buku</td><td>:</td>");

$Form->addDropdown("kategori","<td>Kategori</td><td>:</td>","", array('Sastra','Sains','Sosial','Komik'));//addropdown sama addselect sama

$Form->addField("penerbit","<td>Penerbit</td><td>:</td>");






if (!isset($_POST['tombol'])) {
	$Form->displayForm();

}else{
	$Form->terimaForm();
	$Form->cetakForm();
}

?>

</form>