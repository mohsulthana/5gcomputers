<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Pengeluaran perusahaan</title>
</head>
<body>
    <h1>Records Belanja Perusahaan</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Tanggal Pembelian</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
            <?php foreach($records as $key): ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $key->nama_barang?></td>
                    <td><?php echo $key->harga?></td>
                    <td><?php echo $key->tanggal_pembelian?></td>
                    <td><a href="" class="btn btn-info">Edit</a> <a href="" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach;?>
        <?php $i++;?>
        </tbody>
    </table>
</body>
</html>