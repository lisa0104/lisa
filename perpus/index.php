<html>
<head>
    <title>DATA PERPUSTAKAAN</title>
</head>
<link rel="stylesheet" href="style.css">
<div class="header">
<font face="calibri" size="2" color="black"><center><h1>Data Perpustakaan</h1></center>
</div>
<div class="body">

<?php
	require('Cperpus.php');
	$objectperpus=new perpus(); 
 
    if (isset($_GET['menu'])) {
        switch($_GET['menu']){
            case 'detail' : $objectperpus->detail($_GET['id_buku']);break;
            case 'hapus'  : $objectperpus->hapus($_GET['id_buku']);break;
            case 'update' : $objectperpus->update($_GET['id_buku']);break;
    } 
} 
    else if (isset($_GET['target'])) {   
		if($_GET['target']=='input'){
			include './navbar.php';$objectperpus->inputperpus();
		}
    } 
    else if(isset($_GET['id_buku'])) {
		$objectperpus->detail();
	} else {
		$objectperpus->cetaklist();include './navbar.php';
	}
?>
</body>
</html>