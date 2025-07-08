<?php
$pageTitle = "ShopKeeper - Your best shopping partner";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
  <?php 
    include('header.php');
  ?>

  <div class="body-container">
    <!-- Left side content -->
    <div class="left-side-content-container">

      <div class="text-container">
        <h1 class="text-title">Move. Shop. Get.</h1>
      </div>
      
    </div>

    <!-- Right side content -->
    <div class="right-side-content-container">
      <image class="content-picture" src="./images/index/yoga-women.jpg" />
    </div>
  </div>

  <?php 
    include('footer.php');
  ?>
</body>
<script src="./jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function(){
    $(".text-title").click(function(){
      var $this = $(this);
      var originalText = "Move. Shop. Get.";
      var newText = "Start Buying Now!";
      $this.fadeOut(400, function(){
        $this.text($this.text() === originalText ? newText : originalText).fadeIn(400);
      });
    });
  });
</script>
</html>