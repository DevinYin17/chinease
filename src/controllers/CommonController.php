<?php
namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\Json;
use app\models\User;
use app\models\Message;
use app\models\Resume;
use app\models\Job;
use app\components\BaseControllerTrait;
use app\exceptions\InvalidParameterException;
use yii\web\Cookie;
use app\components\UploadHandler;

class CommonController extends Controller
{
    use BaseControllerTrait;

    public function actionLogin()
    {
        $params = $this->getParams();
        $user = User::findOne(['email' => $params['email'], 'password' => $params['password']]);

        if (empty($user['id'])) {
            throw new InvalidParameterException('email or password is error');
        }

        return $this->genToken($user);
    }

    public function actionRegister()
    {
      $params = $this->getParams();
      if ((isset($params['email']) && empty($params['email'])) || (isset($params['password']) && empty($params['password']))) {
        throw new InvalidParameterException('email or password is empty');
      }

      if (!isset($params['repassword']) || $params['password'] !== $params['repassword']) {
        throw new InvalidParameterException('password is different');
      }

      $user = User::findOne(['email' => $params['email']]);
      if (!empty($user['id'])) {
        throw new InvalidParameterException('email is used');
      }

      $user = new User();
      $user['email'] = $params['email'];
      $user['password'] = $params['password'];
      $user['isAdmin'] = 0;
      return $this->genToken($user);
    }

    public function actionMessage()
    {
      $model = new Message();
      $params = $this->getParams();

      if (!empty($params['message'])) {
        $model['name'] = $params['name'];
        $model['email'] = $params['email'];
        $model['phone'] = $params['phone'];
        $model['address'] = $params['address'];
        $model['message'] = $params['message'];
        $model['date'] = $params['date'];
        //var_dump($model);die;
        if ($model->save()) {
          return $model;
        }
      } else {
        throw new InvalidParameterException('error');
      }
    }

    public function actionResume()
    {
      $model = new Resume();
      $params = $this->getParams();


      if (!empty($params['resume']) && !empty($params['job_id']) && !empty($params['user_id'])) {

        $job = Job::findOne(['id' => $params['job_id']]);
        $user = User::findOne(['id' => $params['user_id']]);
        $user['resume'] = $params['resume'];
        $user->save();

        $model['job_id'] = $params['job_id'];
        $model['user_id'] = $params['user_id'];
        $model['resume'] = $params['resume'];
        $model['email'] = $params['email'];
        $model['date'] = $params['date'];
        $model['name'] = $job['title'];

        if ($model->save()) {
          return $model;
        }
      } else {
        throw new InvalidParameterException('resume error');
      }
    }

    public function actionUpload()
    {
      $upload_handler = new UploadHandler();
    }

    private function genToken($user)
    {
      if (!isset($user['email'])) {
        $user = User::findOne(['id' => $user]);
      }

      if (empty($user['token'])) {
        $user['token'] = base64_encode(time() . $user['isAdmin'] . $user['email']);
        if ($user->save()) {
          return $user;
        }
      } else {
        return $user;
      }
    }
}
