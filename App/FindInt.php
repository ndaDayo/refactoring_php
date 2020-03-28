<?php

namespace App;

class FindInt
{
    /** @var boolean */
    public $flag;

    /**
     * 配列を走査して$targetの有無でbool値を返す
     *
     * @param array $data
     * @param int   $target
     * @return boolean
     */
    public function find(array $data, $target)
    {
        $this->flag = false;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i] === $target) {
               $this->flag = true;
            }
        }
        return $this->flag;
    }
}