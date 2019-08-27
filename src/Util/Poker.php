<?php


namespace App\Util;


use App\Exception\ExceedMaxCardsException;
use App\Service\SortInterface;

class Poker
{
    /**
     * @var SortInterface
     */
    protected $sortService;

    /**
     * Poker constructor.
     * @param SortInterface $sortService
     */
    public function __construct(SortInterface $sortService)
    {
        $this->sortService = $sortService;
    }

    /**
     * @param array $elements
     * @return bool
     * @throws ExceedMaxCardsException
     */
    public function isStraight(array $elements): bool
    {
        if ($this->exceedMaxCards($elements)) {
            throw new ExceedMaxCardsException('Exceeded Max Amount of Cards Allowed');
        }

        $orderedList = $this->sortService->sort($elements);
        $consecutive = 1;
        $total = count($orderedList);

        for ($i = 1; $i < $total; $i++) {
            if (($orderedList[$i] - $orderedList[$i - 1]) === 1) {
                $consecutive++;
            }

            if ($orderedList[$i] === 14 && $orderedList[0] === 2) {
                $consecutive++;
            }

            if ($consecutive >= 5) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array $elements
     * @return bool
     */
    protected function exceedMaxCards(array $elements): bool
    {
        return count($elements) > 7;
    }

}