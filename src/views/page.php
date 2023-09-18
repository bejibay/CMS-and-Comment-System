<?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>
<div class="row">
<div class="col-8">

<div><?php $content = "";
if(is_array($result1)){
foreach($result1 as $key=>$value) {
$content = $value['content'];
}
}
?></div><div><?php echo  $content;?></div>
</div>
</div class="col-4"></div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";;?></div>
</body>
</html>


