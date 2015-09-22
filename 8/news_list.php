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
    <?php include('header.php'); ?>
    
    <section class="news contents-box">
        <h2 class="section-title text-center">
            <span class="section-title__yellow">News</span>
        </h2>
        <article class="news-detail">
            <dl class="clearfix">
				<?php 
				define('NEWS_LIST', 5);
				$news_start = (intval($_GET['page']) - 1) * NEWS_LIST;
				$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");

				$sql = "SELECT * FROM newsapp ORDER BY create_date DESC LIMIT ". NEWS_LIST . " OFFSET " . $news_start;
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($results as $row) {
					$news_id = $row['id'];
					echo '<dt>';
					echo $row['create_date'];
					echo '</dt>';
					echo '<dd class="news-title">';
					echo $row['title'];
					echo '</dd>';
					echo '<a href="content.php?id=' . $news_id . '">';
					echo '<dd class="news-description">';
					echo mb_substr($row['content'],0,150);
					if (mb_strlen($row['content']) > 150) {echo ' ...';}
					echo '</dd>';
					echo '</a>';
					echo'<hr>';
				}

				// ページング
				$sql = "SELECT COUNT(id) AS count FROM newsapp";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				$news_count = $results[0]['count'];
				if ($news_start != 0) {
					echo '<a href="news_list.php?page=' . (intval($_GET['page']) - 1) . '">前の'. NEWS_LIST . '件</a>';
				}
				if ($news_count > ($news_start + NEWS_LIST)) {
					echo '<div class="news-next"><a href="news_list.php?page=' . (intval($_GET['page']) + 1) . '">次の' . NEWS_LIST . '件</a></div>';
				}
				$pdo = null;
				?>
				<p class="view-detail text-center"><a href="index.php">トップに戻る</a></p>
            </dl>
            
        </article>
    </section>
    
    <!--#information-->
    <?php include('footer.php'); ?>

    <!--end #information-->
<p class="btn-pageTop"><a href="#"><img src="img/btn-pagetop.png" alt=""></a></p>
</body>
</html>