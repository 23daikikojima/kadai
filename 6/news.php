<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <?php include("header.php"); ?>
    
    <section class="news contents-box">
        <h2 class="section-title text-center">
            <span class="section-title__yellow">News</span></h2>
        <div class="text-center">
            <?php
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "dktky18");
$sql = "SELECT * FROM news";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$news_id=$_GET["news_id"];
$news_detail=$_GET["news_detail"];
$sql = "SELECT * FROM news_list where news_id = " .$news_id;
$sql ="SELECT * FROM news_list where news_detail = ".$news_detail;
?>
        </div>
        </article>
    </section>

    <!--#information-->
    <?php include("footer.php"); ?>
    <!--end #information-->
<p class="btn-pageTop"><a href="#"><img src="img/btn-pagetop.png" alt=""></a></p>
</body>
</html>
    <!--end #information-->
<p class="btn-pageTop"><a href="#"><img src="img/btn-pagetop.png" alt=""></a></p>
</body>
</html>