<?php
header("HTTP/2 301 Moved Permanently");
header("Location:".get_bloginfo('url')); 
exit(); 
?>