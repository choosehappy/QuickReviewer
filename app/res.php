
<?php
include_once("classes/Image.php");

global $database;
$database->openConnection();
$image = new Image();
$list = $image->getResultList();
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Tumor-Infiltrating Lymphocytes | CCIPD & CIM@LAB</title>    
    </head>

    <body>
        <table>
            <tr>
                <th>id</th>
                <th>img_name</th>
                <th>outcome</th>
                <th>id_user</th>
                <th>user_name</th>
                <th>infiltration</th>
            </tr>

            <?php
            while ($item = $database->fetchArray($list)) {
                ?>
                <tr>
                    <td><?php echo $item["id"] ?></td>
                    <td><?php echo $item["img_name"] ?></td>
                    <td><?php echo $item["outcome"] ?></td>
                    <td><?php echo $item["id_user"] ?></td>
                    <td><?php echo $item["user_name"] ?></td>
                    <td><?php echo $item["infiltration"] ?></td>
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
<?php
$database->closeConnection();
