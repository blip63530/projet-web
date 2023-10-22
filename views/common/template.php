<!DOCTYPE html>
<html lang="fr">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
</style>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?=$page_description;?>">
    <title><?=$page_title;?></title>

</head>
<body class="d-flex flex-column min-vh-100" >
<?php 
if(!empty($_SESSION['login'])) {
  require_once("views/common/connected/header.php"); 
} else{
  require_once("views/common/header.php"); 
}

if(!empty($_SESSION["alert"])): ?>
  <div class="alert <?= $_SESSION['alert']['type'];?>" role="alert">
    <?=$_SESSION['alert']['message'];?>
</div>
<?php
 unset($_SESSION['alert']);
endif;

?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!--<php require_once ("views/acceuil.php");?>-->
<div class="page_content">
    <?=$page_content;?>
</div>



<?php require_once("views/common/footer.php"); ?>
</body>
</html>