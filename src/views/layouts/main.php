<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

//AppAsset::register($this);
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

    <!-- <script> window.config={isMobileBrowser:Boolean(' . $this->params['isMobileBrowser'] . ')};</script> -->
</head>

<body class="<?php if (Yii::$app->request->getPathInfo() == '') { echo 'home-page-wrapper'; } ?>">
    <?php if (strpos(Yii::$app->request->getPathInfo(), 'site') > -1 || Yii::$app->request->getPathInfo() == '') { ?>

        <header>
            <nav class="container">
                <ul class="menu">
                    <li class="menu-item <?php if (Yii::$app->request->getPathInfo() == '') { echo 'active'; } ?>">
                        <a href="/">Home</a>
                    </li>
                    <li class="menu-item sub-menu <?php if (Yii::$app->request->getPathInfo() == 'site/jobvacancy') { echo 'active'; } ?>">
                        <a href="/site/jobvacancy">Job Vacancy</a>

                        <ul class="sub-menu-list">
                            <li class="sub-menu-item">
                                <a href="/site/job?type=internship">Internship</a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="/site/job?type=graduate_scheme">Graduate Scheme</a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="/site/job?type=social_recruitment">Social Recruitment</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php if (Yii::$app->request->getPathInfo() == 'site/applicationprocess') { echo 'active'; } ?>">
                        <a href="/site/applicationprocess">Application Process</a>
                    </li>
                    <li class="menu-item <?php if (Yii::$app->request->getPathInfo() == 'site/discoverchina') { echo 'active'; } ?>">
                        <a href="/site/discoverchina">Discover China</a>
                    </li>
                    <li class="menu-item <?php if (Yii::$app->request->getPathInfo() == 'site/contactus') { echo 'active'; } ?>">
                        <a href="/site/contactus">Contact Us</a>
                    </li>
                    <li class="menu-item login-btn">
                        <a class="signup" href="javascript:void(0);">Sign Up/Login</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <?php $this->beginBody() ?>
            <?= $content ?>
        </main>

        <footer>
            <div class="tip">Please follow & like us :)</div>
            <ul class="attention-list">
              <li class="attention-item">
                <a href="/"></a>
              </li>
              <li class="attention-item">
                <a href="/"></a>
              </li>
              <li class="attention-item">
                <a href="/"></a>
              </li>
              <li class="attention-item">
                <a href="/"></a>
              </li>
            </ul>
            <div class="license">©2017 - <a href="/">Chinease Ltd</a></div>
        </footer>

        <section class="modal">
          <i class="mask"></i>
          <div class="main">
            <div class="title register">Registered</div>
            <div class="title login">Sign in to CHINEASE</div>
            <div class="modal-input">
              <span class="input-title">Email:</span>
              <input type="text" id="email"/>
            </div>

            <div class="modal-input">
              <span class="input-title">Password:</span>
              <input type="password" id="password"/>
            </div>

            <div class="register">
              <div class="modal-input">
                <span class="input-title">Confirm Password:</span>
                <input type="password" id="repassword"/>
              </div>
            </div>

            <div class="type">
              <a href="javascript:void(0);" class="to-register">Register</a>
              <div class="error-message"></div>
            </div>

            <div class="btn register modal-register">Create an account</div>
            <div class="btn login modal-login">Sign in</div>
            <div class="tip">Other chinease.co.uk services</div>
          </div>
        </section>

    <?php } else { ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                // 'items' => [
                //     ['label' => 'Home', 'url' => ['/site/index']],
                //     ['label' => 'About', 'url' => ['/site/about']],
                //     ['label' => 'Contact', 'url' => ['/site/contact']],
                //     Yii::$app->user->isGuest ? (
                //         ['label' => 'Login', 'url' => ['/site/login']]
                //     ) : (
                //         '<li>'
                //         . Html::beginForm(['/site/logout'], 'post')
                //         . Html::submitButton(
                //             'Logout (' . Yii::$app->user->identity->username . ')',
                //             ['class' => 'btn btn-link logout']
                //         )
                //         . Html::endForm()
                //         . '</li>'
                //     )
                // ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    <?php } ?>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
