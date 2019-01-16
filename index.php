<?php

function searchInFile($file, $searchKey){

        $handle = fopen($file, "r");
        $itemParts = [];
        $data = fgets($handle);
        $item = explode('\x0A', $data);

        foreach($item as $key => $value) {
            $itemParts[] = explode('\t', $value);
        }

        $first = 0;
        $last = count($itemParts)-1;

        while($last >= $first) {
            $middleKey = floor(($first + $last) / 2);
            if ($itemParts[$middleKey][0] > $searchKey)  $last = $middleKey - 1;
            if ($itemParts[$middleKey][0] < $searchKey)  $first = $middleKey + 1;
            if ($itemParts[$middleKey][0] == $searchKey)  return $itemParts[$middleKey][1];
        }

    return 'undef';
}

$searchKey = 'ключ25';

echo searchInFile('data.txt', $searchKey);