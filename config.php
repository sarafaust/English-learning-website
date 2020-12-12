<?php
   define('DB_SERVER', 'sql104.unaux.com');
   define('DB_USERNAME', 'unaux_26786044');
   define('DB_PASSWORD', 'r57k3j8g3gg');
   define('DB_DATABASE', 'unaux_26786044_englishcklickDB');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(mysqli_connect_errno()){
       echo "Failed to connect";
       exit();
   }
?>