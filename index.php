<?php include('koneksi.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<center><h1>Data Produk</h1></center>
		<center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a></center>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Deskripsi</th>
					<th>Harga Beli</th>
					<th>Harga jual</th>		
					<th>Gambar</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM produk ORDER BY id ASC"; 
				$result = mysqli_query($koneksi, $query);

				if(!$result){
					die("Query Error :" .mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}
				$no = 1;

				while ($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row['nama_produk']; ?></td>
					<td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
					<td>Rp <?php echo number_format($row['harga_beli'], 0,',',','); ?></td>
					<td>Rp <?php echo number_format($row['harga_beli'], 0,',',','); ?></td>
					<td><img src="gambar/<?php echo $row['gambar_produk']; ?>"></td>
						<td>
							<a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a>
							<a href="proses_hapus.php?id=<?php echo $row['id']; ?>"onclik="return confirm('Anda yakin ingin hapus data ini?')">Hapus</a>
						</td>

				</tr>
				<?php
					$no++;
				}
				?>
			</tbody>
		</table>


</body>
</html>