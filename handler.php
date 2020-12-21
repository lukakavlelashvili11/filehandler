<?php
session_start();
if(empty($_POST['rad']))
    $_POST['rad']="ty";
    $zipname="";
    $op=true;
if(isset($_POST['subm'])){
    if(empty($_POST['tx'])){
	$zipname=time().".zip";
}else if(!empty($_POST['tx'])){
	$zipname=htmlentities($_POST['tx']).".zip";
    if(file_exists("up/$zipname"))
		$op=false;
	
}
if($op==true){
    $hand="";
    $n="";
    $c="";
    chdir('up');
    $zip=new ZipArchive();
    $zip->open($zipname,(ZipArchive::CREATE | ZipArchive::OVERWRITE));
    if($_POST['rad']=="ty"){
    foreach($_FILES['fil']['type'] as $type){
    $type=explode("/",$type);
    $zip->addEmptyDir($type[0]);
}   
    $hand="type";
    $n=0;
    $c="/";
}if(isset($_POST['rad']) && $_POST['rad']=="ex"){
    foreach($_FILES['fil']['name'] as $name){
        $name=explode(".",$name);
        $zip->addEmptyDir($name[1]);
    }
    $hand="name";
    $n=1;
    $c=".";
}
$stat=array();
      for($a=0;$a<$zip->numFiles;$a++){
        array_push($stat,substr($zip->statIndex($a)['name'],0,strlen($zip->statIndex($a)['name'])-1));
    }  
    for($i=0;$i<count($_FILES['fil']['name']);$i++){
            
             if(in_array(explode($c,$_FILES['fil'][$hand][$i])[$n],$stat)){
           
            $content=file_get_contents($_FILES['fil']['tmp_name'][$i]);
            $zip->addFromString(explode($c,$_FILES['fil'][$hand][$i])[$n]."/".$_FILES['fil']['name'][$i],$content);
           
                 }          
        }
$zip->close();
chdir("..");
}
if(isset($_SESSION['name'])){
    $up=scandir('up');
    $sesnam=explode('&',$_SESSION['name'])[1];
    if(in_array($sesnam,$up)){
        if(isset($_REQUEST['z']))
        $zipname=htmlentities($_REQUEST['z']);
        if(isset($zipname)){
            rename("up/$zipname","up/".$sesnam.'/'.$zipname);
        }}
}
header('Location:index.php?z='.$zipname.'&o='.$op);
}
?>