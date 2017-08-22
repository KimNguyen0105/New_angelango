<?php
/*
 * This file is part of sebastian/diff.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Diff\LCS;

/**
<<<<<<< HEAD
 * Interface for implementations of longest common_icon subsequence calculation.
=======
 * Interface for implementations of longest common subsequence calculation.
>>>>>>> 3e79027f7dec6419f9a0e776ab821eff8a07fe72
 */
interface LongestCommonSubsequence
{
    /**
<<<<<<< HEAD
     * Calculates the longest common_icon subsequence of two arrays.
=======
     * Calculates the longest common subsequence of two arrays.
>>>>>>> 3e79027f7dec6419f9a0e776ab821eff8a07fe72
     *
     * @param array $from
     * @param array $to
     *
     * @return array
     */
    public function calculate(array $from, array $to);
}
