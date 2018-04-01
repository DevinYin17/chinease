<?php
namespace app\exceptions;

use yii\helpers\Json;
use yii\web\HttpException;

class InvalidParameterException extends HttpException
{
    /**
     * Constructor.
     * @param array | json string $message error message
     */
    public function __construct($message = [])
    {
        if (is_array($message)) {
            $message = Json::encode($message);
        }

        parent::__construct(440, $message, null);
    }

    public function getName()
    {
        return 'Form tip error';
    }
}
