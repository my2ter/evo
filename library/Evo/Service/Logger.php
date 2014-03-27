<?php
namespace Evo\Service;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Evo\ValidationException;

class Logger
{
    public function log($ip, $params, $tmpPath)
    {
        $now = new \DateTime('now');
        $this->validateProperties($params);

        $file = fopen($tmpPath . 'log.txt', 'a');
        fwrite($file, '[' . $now->format('Y-m-d H:i:s') . ']');
        fwrite($file, '[' . $ip .']');
        fwrite($file, ' : ' . $params['message'] . "\n\r");
        fclose($file);

        return $now->format('Y-m-d H:i:s');
    }

    private function validateProperties($params)
    {
        $messages = array();
        $messageTemplates = array();

        $validator = Validation::createValidator();
        $violations = $validator->validateValue($params, $this->getValidators());

        if ($violations->count()) {
            throw new ValidationException('Invalid data supplied');
        }
    }

    private function getValidators()
    {
        $validators = new Assert\Collection(
            array(
                'message' => array(
                        new Assert\NotNull
                )
            )
        );

        return $validators;
    }
}
