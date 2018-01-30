<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <!--
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    --->
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/favicon.ico">
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" media="all" href="/build/css/app.css" />
    <!-- <script>
        //Google GA
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-66878725-1', 'auto');
        ga('send', 'pageview');
    </script> -->

    <?= '<script> window.config={isMobileBrowser:Boolean(' . $this->params['isMobileBrowser'] . ')};</script>';?>
</head>

<body class="<?php if (Yii::$app->request->getPathInfo() == '') { echo 'home-page-wrapper'; } ?>">
    <header>
        <h1>Chinease</h1>
        <h2>Employment and relocation link for English language teachers looking to work in China</h2>
        <nav>
            <ul class="menu">
                <li class="menu-item">
                    <a href="/home">HOME</a>
                </li>
                <li class="menu-item">
                    <a href="/job">JOB VACANCY</a>
                </li>
                <li class="menu-item">
                    <a href="/process">APPLICATION PROCESS</a>
                </li>
                <li class="menu-item">
                    <a href="/china">DISCOVER CHINA</a>
                </li>
                <li class="menu-item">
                    <a href="/contact">CONTACT US</a>
                </li>
                <li class="menu-item">
                    <a href="/signin">SIGNIN</a>
                </li>
                <li class="menu-item">
                    <a href="/signup">SIGNUP</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <?php echo Yii::$app->request->getPathInfo(); ?>

        <?php $this->beginBody() ?>
        <?= $content ?>
    </main>


    <section class="fixed-wrapper">
        fixed
    </section>

    <footer>
        <div class="container license">
            ©2017 -
            <a href="/">Chinease Ltd</a>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
