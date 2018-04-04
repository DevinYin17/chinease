<?php
namespace app\components;

use app\exceptions\InvalidParameterException;
use app\utils\StringUtil;
use Yii;
use yii\helpers\Json;
use app\models\User;

trait BaseControllerTrait
{
    public function getParams($key = null, $default = null)
    {
        $rawBody = Yii::$app->request->getRawBody();
        if (empty($rawBody)) {
            if (!empty($key)) {
                return $default;
            }

            return [];
        }
        if (!StringUtil::isJson($rawBody)) {
            throw new InvalidParameterException('data_error');
        }
        $rawArr = Json::decode($rawBody, true);

        $rawArr = self::formatSpecialChars($rawArr);

        if (!empty($key)) {
            if (isset($rawArr[$key])) {
                return $rawArr[$key];
            }

            return $default;
        }

        return $rawArr;
    }

    private function formatSpecialChars($array)
    {
        foreach ($array as $index => $value) {
            if (is_string($value)) {
                $safeValue = StringUtil::formatSpecialChars($value);
            } elseif (is_array($value)) {
                $safeValue = self::formatSpecialChars($value);
            } else {
                $safeValue = $value;
            }
            $array[$index] = $safeValue;
        }

        return $array;
    }

    public function getQuery($key = null, $default = null)
    {
        return Yii::$app->request->get($key, $default);
    }


    public static function isAdmin($token)
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
