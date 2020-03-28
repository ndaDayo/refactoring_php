<?php

namespace App;

class FindInt
{
    /**
     * 配列を走査して$targetの有無でbool値を返す
     *
     * @param array $data
     * @param int   $target
     * @return boolean
     */
    public function find(array $data, $target)
    {
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i] === $target) {
               return true;
            }
        }
        return false;
    }
}