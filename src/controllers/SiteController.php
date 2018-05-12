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
use app\models\Statistics;
use app\models\Validation;
use app\models\Account;
use app\models\Job;
use app\models\JobSearch;

class SiteController extends Controller
{

    const DEFAULT_DESCRIPTION = 'CHINEASE LTD is an employment and relocation link for English teachers looking to teaching in China！';
    const DEFAULT_KEYWORDS = 'jobs, positions, teaching, china, teaching in china';

    public function beforeAction($action)
    {
        $cusAction = $action->actionMethod;
        if ($cusAction == "actionJob"
        || $cusAction == "actionIndex"
        || $cusAction == "actionContactus"
        || $cusAction == "actionApplicationprocess"
        || $cusAction == "actionDiscoverchina"
        || $cusAction == "actionJobvacancy"
        || $cusAction == "actionJobdetail"
        || $cusAction == "actionApply"
        || $cusAction == "actionTerms"
        || $cusAction == "actionPrivacy") {

          $url = Yii::$app->request->url;
          $querystrings = preg_split('/&/', $url);
          $media = '';
          foreach($querystrings as $querystring){
            $from = preg_split('/=/', $querystring);
            if(strpos($from[0], 'from') > -1){
              $media = $from[1];
            }
          }

          if (strlen($media) == 0) {
            $media = 'all';
          }
          if (strlen($media) > 0) {

            $media_y = $media . date('Y');
            $media_y_m = $media_y . date('m');

            $sta_media = Statistics::findOne(['from' => $media]);
            $sta_media_y = Statistics::findOne(['from' => $media_y]);
            $sta_media_y_m = Statistics::findOne(['from' => $media_y_m]);

            if (empty($sta_media['id'])) {
              $sta_media = new Statistics();
              $sta_media['from'] = $media;
              $sta_media['count'] = 1;
            } else {
              $sta_media['count'] = $sta_media['count'] + 1;
            }

            $sta_media->save();

            if (empty($sta_media_y['id'])) {
              $sta_media_y = new Statistics();
              $sta_media_y['from'] = $media_y;
              $sta_media_y['count'] = 1;
            } else {
              $sta_media_y['count'] = $sta_media_y['count'] + 1;
            }

            $sta_media_y->save();

            if (empty($sta_media_y_m['id'])) {
              $sta_media_y_m = new Statistics();
              $sta_media_y_m['from'] = $media_y_m;
              $sta_media_y_m['count'] = 1;
            } else {
              $sta_media_y_m['count'] = $sta_media_y_m['count'] + 1;
            }

            $sta_media_y_m->save();
          }
          
        }

        return true;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Job::find()->orderBy('id DESC')->limit(4)->all();
        return $this->renderPage('index', '/build/script/index.js','','','',[
            'model' => $model,
        ]);
    }

    public function actionContactus()
    {
        return $this->renderPage('contactus', '/build/script/contactus.js','Candidates can contact CHINEASE LTD on different social media. Such as email, telephone, Skype, twitter and facebook.','candidates, social media, contact, teaching, china');
    }

    public function actionApplicationprocess()
    {
        return $this->renderPage('applicationprocess', '', 'CHINEASE LTD will offer you any help on applying the  jobs in China and China\'s working visa step by step.', 'help, apply, visa, china, teaching');
    }

    public function actionDiscoverchina()
    {
        return $this->renderPage('discoverchina', '', 'CHINEASE LTD will update the news/information about  Chinese food, entertainment and life in China.', 'Chinese, food, entertainment, life, china, teaching');
    }

    public function actionJobvacancy()
    {
        $model = Job::find()->all();
        return $this->renderPage('jobvacancy', '','CHINEASE LTD provides various kinds of teaching positions, graduate scheme and internship for teachers and students.','teaching positions, graduate scheme, internship, china','',[
            'model' => $model,
        ]);
    }

    public function actionJob($key, $value)
    {
        $condition = [];
        if (!empty($key) && !empty($value)) {
          $condition = ['like', $key, $value];
        }
        $model = Job::find()->where($condition)->orderBy('id DESC')->all();

        return $this->renderPage('job', '','','','',[
            'model' => $model,
        ]);
    }

    public function actionJobdetail($id)
    {

        $model = Job::findOne(['id' => $id]);
        // $jobAll = Job::find()->orderBy('id DESC')->limit(6)->all();
        $category = $model['category'];
        $jobCategory = Job::find()->where(['category' => $category])->orderBy('id DESC')->limit(6)->all();
        // var_dump($jobAll);die;

        $jobs =[];
        foreach ($jobCategory as $jobC) {
            if ($jobC['id'] !== $model['id']) {
              $jobs[] = $jobC;
            }
        }

        // foreach ($jobAll as $jobA) {
        //     if ($jobA=['id'] !== $model['id']) {
        //       $jobs[] = $jobA;
        //     }
        // }
        return $this->renderPage('jobdetail', '','','','',[
            'model' => $model,
            'jobs' => array_slice($jobs, 0, 5)
        ]);
    }

    public function actionApply()
    {
        return $this->renderPage('apply', '/build/script/upload.js');
    }

    public function actionTerms()
    {
        return $this->renderPage('terms');
    }

    public function actionPrivacy()
    {
        return $this->renderPage('privacy');
    }

    // /**
    //  * Displays signup page.
    //  *
    //  * @return string
    //  */
    // public function actionLogin()
    // {
    //     $description = 'login';
    //     $keywords = 'login';
    //     $title = 'Loign | Teaching in China';
    //     return $this->renderPage('login', '/build/script/login.js', $description, $keywords, $title);
    // }

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
        $title = 'Chinease | Teaching in China';
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
