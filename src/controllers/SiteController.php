<?php
namespace app\controllers;

use Yii;
use yii\web\View;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Url;
use app\behaviors\CaptchaBehavior;
use app\utils\LanguageUtil;
use app\utils\UrlUtil;
use app\models\User;
use app\models\Validation;
use app\models\Account;
use app\models\Job;
use app\models\JobSearch;

class SiteController extends Controller
{

    const DEFAULT_DESCRIPTION = 'chinease';
    const DEFAULT_KEYWORDS = 'chinease';

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPage('index', '/build/script/index.js');
    }

    public function actionContactus()
    {
        return $this->renderPage('contactus', '/build/script/contactus.js');
    }

    public function actionApplicationprocess()
    {
        return $this->renderPage('applicationprocess');
    }

    public function actionDiscoverchina()
    {
        return $this->renderPage('discoverchina');
    }

    public function actionJobvacancy()
    {
        $model = Job::find()->all();
        return $this->renderPage('jobvacancy', '','','','',[
            'model' => $model,
        ]);
    }

    public function actionJob()
    {
        $model = Job::find()->all();
        return $this->renderPage('job', '','','','',[
            'model' => $model,
        ]);
    }

    public function actionJobdetail($id)
    {
        $model = Job::findOne(['id' => $id]);
        return $this->renderPage('jobdetail', '','','','',[
            'model' => $model,
        ]);
    }

    public function actionApply()
    {
        return $this->renderPage('apply');
    }

    /**
     * Displays signup page.
     *
     * @return string
     */
    public function actionLogin()
    {
        $description = 'login';
        $keywords = 'login';
        $title = 'Loign';
        return $this->renderPage('login', '/build/script/login.js', $description, $keywords, $title);
    }

    /**
     * Displays error page.
     *
     * @return string
     */
    public function actionError()
    {
        return $this->render('error', ['domain' => DOMAIN]);
    }

    private function renderPage($page, $jsFile = '', $descriptionCus = '', $keywordsCus = '', $titleCus = '', $params = [])
    {
        $js = null;
        $injectedFiles =[];
        $injectedFilesHead =[];
        $isMobileBrowser = $this->isMobileBrowser();
        $injectedFiles[] = '/build/script/vendor.js';

        if (!empty($jsFile)) {
            $injectedFiles[] = $jsFile;
        }
        $this->view->registerJs($js, View::POS_HEAD);
        foreach ($injectedFiles as $file) {
            $this->view->registerJsFile($file, ['position' => View::POS_END]);
        }

        foreach ($injectedFilesHead as $file) {
            $this->view->registerJsFile($file, ['position' => View::POS_HEAD]);
        }

        $description = self::DEFAULT_DESCRIPTION;
        $keywords = self::DEFAULT_KEYWORDS;
        $title = 'Chinease';
        if (!empty($descriptionCus)) {
            $description = $descriptionCus;
        }
        if (!empty($keywordsCus)) {
            $keywords = $keywordsCus;
        }
        if (!empty($titleCus)) {
            $title = $titleCus;
        }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => $description]);
        $this->view->title = $title;
        $this->view->params = array_merge(['isMobileBrowser' => $isMobileBrowser], $params);

        return $this->render($page);
    }

    private function isMobileBrowser()
    {
      if (isset($_SERVER['HTTP_USER_AGENT'])) {
          $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
          $clientkeywords = array(
              'nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-'
              ,'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu',
              'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini',
              'operamobi', 'opera mobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile'
          );
          if (preg_match("/(".implode('|', $clientkeywords).")/i", $userAgent)) {
              return true;
          }
      }
      return false;
    }
}
