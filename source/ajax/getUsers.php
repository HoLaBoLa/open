<?php
if(isset($_POST['q'])){
 $q=str_replace("@", "", urldecode($_POST['q']));
 if($q==""){
  $OP->ser();
 }
 $sql=$OP->dbh->prepare("SELECT name,id FROM users WHERE name LIKE ? ORDER BY name ASC LIMIT 8");
 $sql->execute(array("%$q%"));
 if($sql->rowCount()==0){
  $OP->ser();
 }
 $arr=array();
 $k=0;
 while($r = $sql->fetch()) {
  $k++;
  $name=$r['name'];
  $img=get("avatar", $r['id']);
  $arr[$k]['id']=$r['id'];
  $arr[$k]['name']=$name;
  $arr[$k]['avatar']=$img;
 }
 echo json_encode($arr);
}else{
 $OP->ser();
}
?>
