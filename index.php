<?php
$data=array();
$i=0;
if ($handle = opendir('data')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            $data[$i]['time'] = filemtime('data/'.$file);
            $data[$i]['name'] = $file;
            $data[$i]['size'] = filesize('data/'.$file);                            
            $i++;            
        }
    }
    closedir($handle);
}
natsort($data);
header('Content-Type: text/javascript');
echo json_encode($data);
?>