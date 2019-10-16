<?php
//计数器  
if(file_exists("count.txt")){  
$numx=file_get_contents("count.txt")+1;
}else{  
$numx=1;
}
file_put_contents("count.txt",$numx);
echo $numx;  


?>