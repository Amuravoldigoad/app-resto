<?php
   session_start();
   include "../config/classDB.php";

   if(isset($_POST['login'])){
     extract($_POST);
     $sel = $dbo->select("tblpetugas where username='$username'");
     foreach($sel as $row){
        $pass = $row['password'];
     }
     if(password_verify($password,$pass)){
        $_SESSION['iduser']= $row['idpetugas'];
        $_SESSION['username']= $row['username'];
        $_SESSION['namapetugas']= $row['namapetugas'];
        ?>
         <script>
            location.href ='index.php'
         </script>
        <?php
     }else{
        ?>
         <script>
            alert('login gagal');
            location.href ='index.php'
         </script>
        <?php
     }
   }
?>