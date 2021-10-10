<?php

namespace Shimoning\Formula;

class Formula
{
    /**
     * 数値
     */
    const NUMBER = '(\\d+(\\.\\d+)?)';

    /**
     * 数値もしくは括弧付きの数式を再起的(?R)に一致する
     */
    const FACTOR = '(-?(' . self::NUMBER . '|\(\\s*(?R)\\s*\)))';

    /**
     * 四則演算子 + 剰余
     */
    const OPERATORS = '[\\+\\-\\*\\/\\%]';

    /**
     * 許容する計算式
     */
    const EXPRESSION = '(?>\\s*' . self::FACTOR . '(\\s*' . self::OPERATORS . '\\s*' . self::FACTOR . ')*\\s*)';

    /**
     * 計算式のバリデーション
     *
     * @param string $formula
     * @return boolean
     */
    static public function validate(string $formula): bool
    {
        try {
            return preg_match(
                '/' . self::EXPRESSION . '/',
                $formula,
                $match
            ) && $match[0] == $formula;
        } catch (\Throwable $th) {
            // TODO: throw original error
            return false;
        }
    }

    /**
     * 計算式を実行する
     *
     * @param string $formula
     * @return integer|float|false
     */
    static public function calculate(string $formula)
    {
        if (!self::validate($formula)) {
            return false;
        }
        return eval('return ' . $formula . ';');
    }
}
