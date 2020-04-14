<link rel="stylesheet" href="style.css">
<div class="header">
	<table class="table">
	<table border="1" cellpadding ="10" align="center">
    <thead style="width:400px" class="thead-light">
        <tr>
            <th > <center> Judul Buku </center> </th>
			<th ><center> Kategori </center> </th>
            <th scope="col">Aksi</th>
        </tr>  
        </thead>     
        <tbody>
            <?php foreach ($query_list as $row) {?>
            <tr>
                <td><center><?php echo $row["judul_buku"]?></center></td>
				<td><center><?php echo $row["kategori"]?></center></td>

				<td><a href='index.php?menu=detail&id_buku=<?php echo $row["id_buku"]?>'>Detail</a>
                <a href='index.php?menu=hapus&id_buku=<?php echo $row["id_buku"]?>'>Delete</a>
                <a href='index.php?menu=update&id_buku=<?php echo $row["id_buku"]?>'>Update</a></td>   
             </tr>

<?php } ?>
        