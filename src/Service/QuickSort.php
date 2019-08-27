<?php


namespace App\Service;


class QuickSort implements SortInterface
{

    public function sort(array $elements): array
    {
        $count = count($elements);

        if ($count === 0) {
            return [];
        }

        $pivot = $elements[0];
        $left = $right = [];

        for ($i = 1; $i < $count; $i++) {
            if ($elements[$i] < $pivot) {
                $left[] = $elements[$i];
            } else {
                $right[] = $elements[$i];
            }
        }

        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}