<?php
  if($id !=""){
    $sel = $dbo->select("tblmenu where idmenu=$id");
    foreach($sel as $row){
        $idkategori = $row['idkategori'];
        $idmenu= $row['idmenu'];
        $nama_menu= $row['nama_menu'];
        $desk =$row['deskripsi'];
        $harga = $row['harga'];
    }
  }

  if(isset($_POST ['simpan'])){
    extract($_POST);
    $foto=isset($_FILES['foto']['name'])?$_FILES['foto']['name']:"";
    if($foto == ""){
        $up = $dbo->update("tblmenu","nama_menu='$nama_menu',deskripsi='$deskripsi',harga='$harga',idkategori='$kategori'","idmenu=$idmenu");
    }else{
        $nama_foto = date('YmdHis').$_FILES['foto']['name'];
        $nama_tmp = $_FILES['foto']['tmp_name'];
        $folder = '../img/';
        move_uploaded_file($nama_tmp,$folder.$nama_foto);
        $up = $dbo->update("tblmenu","nama_menu='$nama_menu',deskripsi='$deskripsi',harga='$harga',idkategori='$kategori',foto='$nama_foto'","idmenu=$idmenu");
    }
    if($up){
        ?>
        <script>
         alert('update berhasil');
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
    <form action="?hal=edit_menu" method="post" enctype="multipart/form-data">
        <table>
            <input type="hidden" name="idmenu" value="<?=$idmenu?>">
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
                            <option <?=$baris['idkategori']==$idkategori?'selected':''?> value="<?=$baris['idkategori']?>"><?=$baris['kategori']?></option>
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
                    <input type="text" value="<?=$nama_menu?>" name="nama_menu" placeholder="Nama Menu" required>
                </td>
            </tr>
            <tr>
                <td>deskripsi</td>
                <td>:</td>
                <td>
                    <input type="text" value="<?=$desk?>" name="deskripsi" required>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>
                    <input type="number" value="<?=$harga?>" name="harga" required>
                </td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td>
                    <input type="file" name="foto"> 
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