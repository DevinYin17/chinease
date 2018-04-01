<?php
namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\Json;
use app\models\User;
use app\components\BaseControllerTrait;
use app\exceptions\InvalidParameterException;
use yii\web\Cookie;

class CommonController extends Controller
{
    use BaseControllerTrait;

    public function actionLogin()
    {
      var_dump(Yii::$app->request->cookies);die;
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

    public function isAdmin($token)
    {
      $user = User::findOne(['token' => $token]);
      if (empty($user['id'])) {
          throw new InvalidParameterException('none');
      }

      $tokenStr = base64_decode($token);
      $isAdmin = substr($tokenStr, 10, 1);
      return $isAdmin;
    }
}
