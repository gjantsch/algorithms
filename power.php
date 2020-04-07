<?php

/**
 * Implement integer exponentiation. That is, implement the pow(x, y) function, where x and y are integers and returns x^y.
 * Do this faster than the naive method of repeated multiplication.
 * For example, pow(2, 10) should return 1024.
 */
class Power
{
    public $interactions = 0;
    public $base = 0;
    public $exponent = 0;

    public function __construct($base, $exponent)
    {
        $this->interactions = 0;
        $this->base = $base;
        $this->exponent = $exponent;
    }

    public function pow($x = null, $n = null)
    {

        $this->interactions++;
        $n = $n ?? $this->exponent;
        $x = $x ?? $this->base;

        if ($n == 0) {

            $x = 1;

        } elseif ($n == 2) {

            $x = $x * $x;

        } elseif ($n > 2) {

            $remainder = $n % 2;
            $n = intval($n / 2);
            $partial = $this->pow($x, $n);
            $x = $partial * $partial * ($remainder == 1 ? $x : 1);

        }

        return $x;

    }
}

/**
 * Test
 */
for ($n = 0; $n <= 100; $n++) {
    $pow = new Power(2, $n);

    echo "2 ˆ $n  = " . $pow->pow() . " >> " . pow(2, $n) . " ({$pow->interactions} interactions) " . PHP_EOL;
}
