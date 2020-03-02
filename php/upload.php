<?php

session_start();

setlocale(LC_TIME,"turkish");
$tarihsaat=date("Y-m-d h:i:s");

    $host = "localhost";
    $username = "maycloud_usr";
    $password = "";
    $db = "maycloud_db";
    
    $conn = mysqli_connect($host, $username, $password, $db); 

    $kullanici = $_SESSION['name'];
    $md5kullanici = md5($kullanici);

    $email = $_SESSION['email'];

    if(isset($_FILES['dosya']))
    {
        //echo "Yükleme İşlemi Başlatıldı... <br>"; 
        $Error = $_FILES['dosya']['error'];
    if($Error != 0)
    {
    echo "Dosyada Bir Hata Mevcut. <br>";
    }
    else
    {
    $file_size = $_FILES['dosya']['size'];
	$file_size2 = ($file_size/1024);
    if($file_size > (1024*1024*10)) // Max Dosya Boyutunu 10 Mb.
    {
    echo "Dosya boyutu 5 MB'den büyük olamaz. <br>";
    }
    else
    {
    $dosyamd5 = md5($_FILES['dosya']['name']);
    $file_type = $_FILES['dosya']['type']; // dosya tipi
    $file_name = $_FILES['dosya']['name']; // dosya adı
    $file_size = $_FILES['dosya']['size']; // size
    $file_extension = explode('.', $file_name);
    // . dan sonra olan uzantıyı aldık txt jpg falan
    $file_extension = $file_extension[count($file_extension)-1];
    // dosya uzantısından '.' (noktayı) kaldırdık.
    $target_folder = 'dosyalar/'.$md5kullanici.'/'.$dosyamd5.'.'.$file_extension;




        mkdir('dosyalar/'.$md5kullanici,0751);   //klasör oluşturma




    $temp_file = $_FILES['dosya']['tmp_name'];
    move_uploaded_file($temp_file, $target_folder);
    //klasöre yolladk

    //echo "Dosya <b>" .$target_folder. "</b> Klasörüne <b>" . $file_name. " </b> Adıyla Yüklendi.";
    echo "Dosya Yüklendi.";
    echo "<script type='text/javascript'> document.location = 'http://maycloud.space/profile.php'; </script>";

    $downloadlink = 'http://www.maycloud.space/'.$target_folder;


         $_SESSION['email'] = $email;
         $sql = "INSERT INTO file (id,filename,size,username,md5,link,date) VALUES('null','$file_name','$file_size2', '$kullanici','$dosyamd5','$downloadlink','$tarihsaat')";
        mysqli_query($conn, $sql);


		header ("Location:index.php"); 
		
    }
}
}
else
{
echo "Dosya Gelmedi";
}

?>