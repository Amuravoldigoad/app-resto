<?php
if($id != ""){
    $del = $dbo->delete("tblpetugas","idpetugas=$id");
    if($del){
        ?>
        <script>
            alert('hapus berhasil');
            location.href='?hal=petugas';
        </script>
        <?php
    }
}
?>
<div class="judul">
    <a href="?hal=add_petugas"><i class="fa fa-plus"></i>Tambah data</a>
    <div class="keterangan">Data Menu</div>
</div>
<div class="data">
    <table border=1 cellspacing="0" cellpadding="0">
        <tr>
            <th>No</th>
            <th>Nama petugas</th>
            <th>Alamat</th>
            <th>NO.Hp</th>
            <th>Username</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        <?php
           $no=1;
           $data=$dbo->select("tblpetugas");
           foreach($data as $row){
            ?>
            <tr>
            <td><?=$no++?></td>
            <td><?=$row['nama_petugas']?></td>
            <td><?=$row['alamat']?></td>
            <td><?=$row['no_hp']?></td>
            <td><?=$row['username']?></td>
            <td><?=$row['role']?></td>
            <td>
                <a class="btn-edit" href="?hal=edit_petugas&id=<?=$row['idpetugas']?>"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <a class="btn-hapus" href="?hal=petugas&id=<?=$row['idpetugas']?>"><i class="fa fa-trash"></i></a>
           </td>
            </tr>
            <?php
           }
        ?>
    </table>
</div>