<?php

$ar = [
    [
        'id' => 1,
        'foreign' => 0
    ],
    [
        'id' => 7,
        'foreign' => 0
    ],
    [
        'id' => 2,
        'foreign' => 1
    ],
    [
        'id' => 6,
        'foreign' => 1
    ],
    [
        'id' => 5,
        'foreign' => 2
    ],
    [
        'id' => 3,
        'foreign' => 2
    ],
    [
        'id' => 4,
        'foreign' => 3
    ],
];

$new_ar = [];

function find_in_ar($new_ar, $v) {
    foreach ($new_ar as $k => $n) {
        if ($n['id'] == $v['foreign']) {
            $new_ar[$k]['sub'][] = $v;
            return $new_ar;
        }
    }

    if (count($new_ar) == 0 ) {
        $new_ar[] = $v;
        return $new_ar;
    }
    else {
        foreach ($new_ar as $k => $n) {
            if (isset($new_ar[$k]['sub'])) {
                $new_ar[$k]['sub'] = find_in_ar($n['sub'], $v);
                return $new_ar;
            }
        }
        $new_ar[] = $v;
        return $new_ar;
    }
}

foreach ($ar as $v) {
    $new_ar = find_in_ar($new_ar, $v);
}
