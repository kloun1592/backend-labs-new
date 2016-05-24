<?php
    function last($str)
    {
        return substr($str, -1);    
    }

    function withoutLast($str)
    {
        return substr($str, 0, -1);    
    }

    function reverse($str)
    {
        for($i = strlen($str) - 1, $j = 0; $j < $i; $i--, $j++) 
        {
            list($str[$j], $str[$i]) = array($str[$i], $str[$j]);
        }
        return $str;
    }

    function checkIdentifier($str)
    {
        $capitalLetters = range('A', 'Z');
        $lowerLetters = range('a', 'z');
        $numArray = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $str = str_split($str);
        if (in_array($str[0], $lowerLetters) || in_array($str[0], $capitalLetters))
        {
            foreach($str as $symbol) 
            {
                if (in_array($symbol, $lowerLetters) || in_array($symbol, $capitalLetters) || in_array($symbol, $numArray)) 
                {
                   $res = TRUE;
                }
                else
                {
                    return FALSE;
                    break;
                }
            }
        }
        else
        {
            return FALSE;
        }
        return $res;
    }

    function removeExtraBlanks($text)
    {
        return $text = preg_replace('/\s{2,}/', ' ', $text);
    }

    function countSpecificSymbols($str, $specArray, $counter)
    {
        foreach($str as $symbol) 
        {
            if (in_array($symbol, $specArray)) 
            {
               $counter++;
            }
        }
        return $counter;
    }

    function checkCounters($numCounter, $capLetCounter, $lowLetCounter, $passLength, $strength)
    {
        if ($numCounter == 0)
        {
            $strength = $strength - $passLength;
        }
        if ($capLetCounter == 0 && $lowLetCounter == 0) 
        {
            $strength = $strength - $passLength;  
        }
        return $strength;
    }

    function passwordStrength($password)
    {
        // Инициализация
        $numArray = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $capitalLetters = range('A', 'Z');
        $lowerLetters = range('a', 'z');
        $strength = 0;
        $numCounter = 0;
        $capLetCounter = 0;
        $lowLetCounter = 0;
        $str = $password;
        $passLength = strlen($password);
        // К надежности прибавляется (4*n), где n - количество всех симоволов пароля
        $strength = $strength + 4 * $passLength;
        $password = str_split($password);
        // К надежности прибавляется +(n*4), где n - количество цифр в пароле
        $numCounter = countSpecificSymbols($password, $numArray, $numCounter);
        $strength = $strength + $numCounter * 4;
        // К надежности прибавляется +((len-n)*2) в случае, если пароль содержит n символов в верхнем регистре
        $capLetCounter = countSpecificSymbols($password, $capitalLetters, $capLetCounter);
        $strength = $strength + ($passLength - $capLetCounter) * 2;
        // К надежности прибавляется +((len-n)*2) в случае, если пароль содержит n символов в нижнем регистре
        $lowLetCounter = countSpecificSymbols($password, $lowerLetters, $lowLetCounter);
        $strength = $strength + ($passLength - $lowLetCounter) * 2;
        // За каждый повторяющийся символ в пароле вычитается количество повторяющихся символов
        $numOfRecurringCharacters = count_chars($str, 0);
        for ($i = 0; $i < count($numOfRecurringCharacters); $i++) 
        {
            if ($numOfRecurringCharacters[$i] > 1)
            {
                $strength = $strength - $numOfRecurringCharacters[$i];
            }
        }
        // Если пароль состоит только из цифр вычитаем число равное количеству символов.
        // Если пароль состоит только из букв вычитаем число равное количеству символов.
        $strength = checkCounters($numCounter, $capLetCounter, $lowLetCounter, $passLength, $strength);
        return $strength;        
    }