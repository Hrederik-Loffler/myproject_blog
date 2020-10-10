<?php

    function debug($arr) 
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    
    function extractFields (array $target, array $fields) : array
    {
        $res = [];

        foreach($fields as $field) {
            $res[$field] = trim($target[$field]);
        }

        return $res;
    }

    function trimArrayStringContent(array $arr) : array
    {
        for($i = 0; $i < count($arr); $i++) {
        
            $arr[$i]['content'] = mb_substr($arr[$i]['content'], 0, 900);
        }

        return $arr;
    }

