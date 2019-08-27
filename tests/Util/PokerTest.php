<?php

namespace App\Tests\Util;

use App\Exception\ExceedMaxCardsException;
use App\Service\QuickSort;
use App\Service\SortInterface;
use App\Util\Poker;
use PHPUnit\Framework\TestCase;

class PokerTest extends TestCase
{
    /**
     * @throws ExceedMaxCardsException
     */
    public function testIsStraight(): void
    {
        $poker = new Poker(new QuickSort());

        $this->expectException(ExceedMaxCardsException::class);
        $this->assertEquals(true, $poker->isStraight([2, 3, 4 ,5, 6]), '2, 3, 4 ,5, 6');
        $this->assertEquals(true, $poker->isStraight([14, 5, 4 ,2, 3]), '14, 5, 4 ,2, 3');
        $this->assertEquals(false, $poker->isStraight([7, 7, 12 ,11, 3, 4, 14]), '7, 7, 12 ,11, 3, 4, 14');
        $this->assertEquals(false, $poker->isStraight([7, 3, 2]), '7, 3, 2');
        $this->assertEquals(true, $poker->isStraight([2, 3, 4 ,5, 6, 7, 8, 9]), '2, 3, 4 ,5, 6, 7, 8, 9');
    }
}
