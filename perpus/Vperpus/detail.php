 <a class="btn btn-outline-info btn-md" style="margin:5px" href="index.php">Kembali</a>
  <table class="table">
  <table border="1" cellpadding ="10" align="center">
    <thead class="thead-light">
		<?php 
			foreach ($query_list as $row){
		?>
            <tr>
                <td scope="col">ID Buku</td>
                <td><?php echo $row['id_buku']?></td>
            </tr>
            <tr>
                <td scope="col">ID Kategori</td>
                <td><?php echo $row['id_kategori']?></td>
            </tr>
		 <tr>
                <td scope="col">Judul Buku</td>
                <td><?php echo $row['judul_buku']?></td>
            </tr>
			   <tr>
                <td scope="col">Kategori</td>
                <td><?php echo $row['kategori']?></td>
            </tr>
            <tr>
                <td scope="col">Penerbit</td>
                <td><?php echo $row['penerbit']?></td>
            </tr>
  
			<?php } ?>
            </thead>
        </table>
           

