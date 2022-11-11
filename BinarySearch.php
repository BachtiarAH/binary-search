<?php

class BinarySearch
{
    function fillArray($min, $max)
    {
        $array = array();

        for ($i = $min; $i <= $max; $i++) {
            array_push($array, $i);
        }

        return $array;
    }

    function find($find, $array)
    {
        $low = 0;
        $high = array_key_last($array);
        $mid = intval(($low + $high) / 2);

        if ($find <= $array[$high] && $find >= $array[$low]) {
            $this->penanda($low, $mid, $high+1, $array);
            echo PHP_EOL;
            while ($low < $high && $array[$mid] != $find) {

                if ($find < $array[$mid]) {
                    $high = $mid;
                } else {
                    $low = $mid;
                }

                $mid = intval(($high + $low) / 2);
                $this->penanda($low, $mid, $high+1, $array);
                echo PHP_EOL;
            }

            return $mid;
        } else {
            echo "data tidak ada didalam array";
            return $mid;
        }
    }

    public function penanda($low, $mid, $high, $array)
    {
        $hasil = '[';
        for ($i = $low; $i < $high; $i++) {
            $x = $array[$i];
            if ($i == $mid) {
                $hasil .= "[$x], ";
            } else {
                $hasil .= "$x, ";
            }
        }

        $hasil .= ']';
        echo $hasil;
        return $hasil;
    }

    public function printArrayBetween($min, $max, $array)
    {
        $hasil = '[';
        for ($i = $min; $i < $max; $i++) {
            $x = $array[$i];
            $hasil .= "$x, ";
        }

        $hasil .= ']';
        echo $hasil;
        return $hasil;
    }

    function printArray($array)
    {
        $this->printArrayBetween(0, count($array), $array);
    }
}

// $array = array();
$obj = new BinarySearch();
$array = $obj->fillArray(9, 31);
$obj->printArray($array);
echo PHP_EOL;

$cari = 23;
$urutan = $obj->find($cari, $array);
echo PHP_EOL;
echo 'index ke ' . $urutan . ' = ' . $array[$urutan];
echo PHP_EOL;
