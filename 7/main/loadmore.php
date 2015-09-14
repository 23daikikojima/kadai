<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
    <?php include("header.php"); ?>
    
    <section class="news contents-box">

        <h2 class="section-title text-center">
            <span class="section-title__yellow">News</span><span class="section-title-ja text-center">お知らせ・更新情報</span>
        </h2>
        <article class="news-detail">
        <a href="news.php">
            
<?php
$pdo = new PDO("sqlite::memory:");
$pdo->exec("CREATE TABLE news (news_id INTEGER PRIMARY KEY AUTOINCREMENT, news_title TEXT, create_date TEXT DEFAULT CURRENT_TIMESTAMP)");
$stmt = $pdo->prepare("INSERT INTO news (news_title) VALUES (?)");
foreach (range('A', 'Z') as $i) {
    $stmt->execute(array("The $i article!"));
}
?>
<dl class="clearfix">
<?php
    $page = (int) $_GET["page"];
    $sql = "SELECT * FROM news LIMIT 5 OFFSET ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($page * 5));
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $row) {
                echo'<dt class="news-date">'.$row["create_date"].'</dt>';
                echo '<dd class="news-description"><a href="news.php?news_id=' . $row["news_id"] . '">' .mb_substr($row["news_title"],0,10)."...". '</a>';
                echo "<hr>";
                } 
                $pdo = null;
                ?> 
            </dl>
                <p id="loading" style="display:none;">loading...</p>
                <p id="error" style="display:none;">!!! error !!!</p>
                <input type="button" id="more" value="もっと読む">
                

            </a>
            <p class="view-detail text-right"><a href="#">ニュース一覧を見る</a></p>
        </article>
    </section>
   
    <section class="feature contents-box">
        <div class="inner">
            <h2 class="section-title text-center">
                <span class="section-title__white">Feature</span><span class="section-title-ja text-center">特徴</span>
            </h2>
            <ul class="list-feature">
                <li><img src="img/point1.png" alt=""></li>
                <li><img src="img/point2.png" alt=""></li>
                <li><img src="img/point3.png" alt=""></li>
            </ul>
        </div>
    </section>
    
    <section class="cource contents-box">
        <div class="inner">
            <h2 class="section-title text-center">
                <span class="">Cource</span><span class="section-title-ja text-center">コース紹介</span>
            </h2>
            <div class="block-cource block-cource-lab clearfix">
                <div class="cource-img"><img src="img/cource-lab.png" alt=""></div>
                <div class="cource-txt cource-txt__usually">
                <h3 class="cource-title text-center">LABコース</h3>
                <p>週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    </p>
                </div>
            </div>
            <div class="block-cource clearfix">   
                <div class="cource-img__reverse">
                    <img src="img/cource-academy.png" alt="">
                </div>
                <div class="cource-txt cource-txt__reverse">
                    <h3 class="cource-title text-center">ACADEMYコース</h3>
                    <p>週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="contents-heading bg-yellow">
            <h2 class="section-title text-center">
                <span class="section-title">Gallery</span><span class="section-title__white section-title-ja text-center">ギャラリー</span
            </h2>
        </div>
        <div class="inner contents-box">
            <ul class="list-gallery clearfix">
                <li><a href="#"><img src="img/gallery01.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery02.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery03.jpg" alt="" /></a></li>
                <li class="no-white-space"><a href="#"><img src="img/gallery04.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery05.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery06.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery07.jpg" alt="" /></a></li>
                <li class="no-white-space"><a href="#"><img src="img/gallery08.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery09.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery10.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery11.jpg" alt="" /></a></li>
                <li class="no-white-space"><a href="#"><img src="img/gallery12.jpg" alt="" /></a></li>
            </ul>
        </div>
    </section>

    <section class="entry-form">
        <div class="contents-heading bg-yellow">
            <h2 class="section-title text-center">
                <span class="section-title">Entry</span><span class="section-title__white section-title-ja text-center">説明会に申し込む</span></h2>
        </div>
        <div class="inner contents-box">
            <form action="#" class="form-module">
                <table>
                    <tr>
                        <td class="form-text">氏名</td>
                        <td><input type="text" value="" name="name"></td>
                    </tr>
                    <tr>
                        <td class="form-text">フリガナ</td>
                        <td><input type="text" value="" name="kana"></td>
                    </tr>
                    <tr>
                        <td class="form-text">メールアドレス</td>
                        <td><input type="text" value="" name="email"></td>
                    </tr>
                    <tr>
                        <td class="form-text">説明会の希望日時</td>
                        <td><select id="select-box" name="date">
                                <option value="2015/7/18 10:00">2015/7/18 10:00</option>
                                <option value="2015/7/25 10:00">2015/7/25 10:00</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-text">志望動機</td>
                        <td>
                            <label for="1"><input type="radio" name="motivation" value="起業したい" id="1">起業をしたい</label>
                            <label for="2"><input type="radio" name="motivation" value="チーズ企業に就職したい。" id="2">チーズ企業に就職したい。</label>
                            <label for="3"><input type="radio" name="motivation" value="チーズと関わる仕事なので、知識をつけたい。" id="3">チーズと関わる仕事なので、知識をつけたい。</label>
                            <label for="4"><input type="radio" name="motivation" value="教養として身につけたい" id="4">教養として身につけたい</label>
                        </td>
                    </tr>
                </table>
                <p class="text-center"><input type="submit" class="entry-btn"></p>
            </form>
        </div>
    </section>

    <!--#information-->
    <?php include("footer.php"); ?>
    <!--end #information-->
<p class="btn-pageTop"><a href="#"><img src="img/btn-pagetop.png" alt=""></a></p>

<script>
page = <?php echo $page ?>;
$(function(){
    function load_cb(response, status, xhr) {
        $("#loading").hide();
        if (status == "error") {
            $("#error").show();
        } else if ($(".clearfix:last dt").length < 5) {
            $("#more").prop("disabled", true);
        } else {
            $(".clearfix:last").after('<dl class="clearfix">');
            page = page + 1;
        }
    }
    load_cb(null, null, null);
    $("#more").click(function(){
        $("#loading").show();
        $("#error").hide();
        $(".clearfix:last").load("list.php?page="+page+"&time="+$.now()+" .clearfix>*", load_cb);
    });
});
</script>
</body>
</html>