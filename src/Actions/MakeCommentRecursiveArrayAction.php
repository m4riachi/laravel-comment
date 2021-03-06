<?php

namespace M4riachi\LaravelComment\Actions;

class MakeCommentRecursiveArrayAction
{
    public static function execute($new_ar, $v)
    {
        foreach ($new_ar as $k => $n) {
            if ($n['id'] == $v['m4_comment_id']) {
                $new_ar[$k]['sub'][] = $v;
                return $new_ar;
            }
        }

        foreach ($new_ar as $k => $n) {
            if (isset($n['sub'])) {
                $new_ar[$k]['sub'] = self::execute($n['sub'], $v);
            }
        }

        if (is_null($v['m4_comment_id'])) {
            $new_ar[] = $v;
        }

        return $new_ar;
    }
}
