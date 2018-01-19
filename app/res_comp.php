
<?php
include_once("classes/Image.php");

global $database;
$database->openConnection();
$image = new Image();
$imgList = $image->getImages();

function getMedian($array) {
    $iCount = count($array);
    /*if ($iCount == 0) {
        tdrow new DomainException('Median of an empty array is undefined');
    }*/
    $middle_index = floor($iCount / 2);
    sort($array, SORT_NUMERIC);
    $median = $array[$middle_index]; // assume an odd # of items
    // Handle tde even case by averaging tde middle 2 items
    if ($iCount % 2 == 0) {
        $median = ($median + $array[$middle_index - 1]) / 2;
    }
    return $median;
}

function getMode($array){
    $values = array_count_values($array); 
    return array_search(max($values), $values);
}

function getStdDev(array $a, $sample = false) {
    $n = count($a);
    if ($n === 0) {
        trigger_error("The array has zero elements", E_USER_WARNING);
        return false;
    }
    if ($sample && $n === 1) {
        trigger_error("The array has only 1 element", E_USER_WARNING);
        return false;
    }
    $mean = array_sum($a) / $n;
    $carry = 0.0;
    foreach ($a as $val) {
        $d = ((double) $val) - $mean;
        $carry += $d * $d;
    }
    if ($sample) {
        --$n;
    }
    return sqrt($carry / $n);
}
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Tumor-Infiltrating Lymphocytes | CCIPD & CIM@LAB</title>    
    </head>

    <body>
        <table style="width: 100%">
            <tr>
                <td><b>id</b></td>
                <td><b>image</b></td>
                <td><b>outcome</b></td>
                <td><b>num</b></td>
                <td><b>min</b></td>
                <td><b>max</b></td>
                <td><b>mean</b></td>
                <td><b>dev</b></td>
                <td><b>mean (round)</b></td>
                <td><b>median</b></td>
                <td><b>mode</b></td>
                <td><b>str</b></td>
            </tr>

            <?php
            while ($item = $database->fetchArray($imgList)) {
                ?>
                <tr>
                    <td><?php echo $item["id"] ?></td>
                    <td><a href="resources/<?php echo $item["name"] ?>" target="_blank"><?php echo $item["name"] ?></a></td>
                    <td><?php echo $item["val"] ?></td>

                    <?php
                    $imgRes = $image->getResPerImage($item["id"]);
                    $values = array();
                    $str = "";
                    while ($val = $database->fetchArray($imgRes)) {
                        array_push($values, $val["val"]);
                        $str.=$val["val"] . ",";
                    }

                    $num = count($values);
                    $avg = array_sum($values) / $num;
                    $median = getMedian($values);
                    $max = max($values);
                    $min = min($values);
                    $std = getStdDev($values);
                    $mode=  getMode($values);
                    
                    ?>

                    <td><?php echo $num ?></td>
                    <td><?php echo $min ?></td>
                    <td><?php echo $max ?></td>                    
                    <td><?php echo $avg ?></td>
                    <td><?php echo $std ?></td>
                    <td><?php echo round($avg) ?></td>
                    <td><?php echo $median ?></td>
                    <td><?php echo $mode ?></td>
                    <td><?php echo $str ?></td>
                </tr>
    <?php
}
?>

        </table>

    </body>
</html>
<?php
$database->closeConnection();
