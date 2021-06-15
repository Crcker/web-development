<?php
 
    function getGETParameter(string $key)
    {
        return $_GET[$key] ?? null;
    }

    function isIdentifier(?string $identifier)
    {
        if (is_null($identifier))
        {
            throw new Exception('Нет идентификатора "identifier"!');
        }

        if (iconv_strlen ($identifier) == 0)
        {
            throw new Exception('Пустой идентификатор "identifier"!');
        }

        if (!ctype_alpha($identifier[0]))
        {
            throw new Exception('Первый символ не является латинской буквой');
        }

        if (!ctype_alnum($identifier))
        {
            throw new Exception('Строка не является буквенно-цифровой');
        }

        return $identifier;
    }

    header("Content-Type: text/plain");

    $identifier = getGETParameter('identifier');
    try 
    {
       isIdentifier($identifier);
       echo "yes";
    }
    catch (Exception $e) 
    {
        echo "No" . PHP_EOL . $e->getMessage();
    }