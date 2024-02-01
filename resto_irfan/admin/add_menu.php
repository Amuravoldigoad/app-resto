<?php
    if(isset($_POST['simpan'])){
        extract($_POST);
        $nama_foto = date('YmdHis').$_FILES['foto']['name'];
        $nama_tmp = $_FILES['foto']['tmp_name'];
        $folder = '../img/';
        move_uploaded_file($nama_tmp,$folder.$nama_foto);
        $ins = $dbo->insert("tblmenu","null,'$nama_menu','$deskripsi','$harga',
        '$nama_foto','$kategori','',''");
        if($ins){
            ?>
               <script>
                alert('simpan berhasil');
                location.href='?hal=menu';
               </script>
            <?php
        }
    }
?>
<div class="judul">
    <a href="?hal=menu"><i class="fa fa-list"></i>Lihat data</a>
    <div class="keterangan">data menu</div>
</div>
<div class="data-input">
    <form action="?hal=add_menu" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>kategori</td>
                <td>:</td>
                <td>
                    <select name="kategori" id="" required>
                        <option value="">pilih kategori</option>
                        <?php
                        $kat = $dbo->select('tblkategori');
                        foreach($kat as $baris){
                            ?>
                            <option value="<?=$baris['idkategori']?>"><?=$baris['kategori']?></option>
                            <?php
                        }
                    ?>    
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama menu</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_menu" placeholder="Nama Menu" required>
                </td>
            </tr>
            <tr>
                <td>deskripsi</td>
                <td>:</td>
                <td>
                    <input type="text" name="deskripsi" required>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>
                    <input type="number" name="harga" required>
                </td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td>
                    <input type="file" name="foto" required>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn-add" type="submit" name="simpan" value="simpan"><i class="fa fa-save"></i>simpan </button>
                </td>
            </tr>
        </table>
    </form>
</div>