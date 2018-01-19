<?php
include_once("classes/Image.php");

global $database;
$database->openConnection();
$img = filter_input(INPUT_GET, 'img');

$image = new Image();

$currImgUsr = ($image->getLastImageUser($_SESSION['user_id'])) + 1;

if (isset($img) || $img != "") {
    $imgId = $img;
} else {
    $imgId = $currImgUsr;
}

$imgName = $image->getImageName($imgId);
$num = $image->getNumImages();
$list = $image->getImageList($_SESSION['user_id']);

$options = ["None", "Low", "Medium", "High"];


if ($imgName == "") {
    ?>    
    <br /><br /><br />

    <h2>That's it. Thank you very much for your time!</h2>

    <?php
} else {
    ?>

                                                    <!--<p>Por favor seleccione el grado de infiltración de la siguiente imagen:</p>-->
    <p>Please select the grade of <strong>Tumor-infiltrating lymphocytes</strong> for the following image:</p>

    <div class="row">
        <div class="col-md-12">
            <a href="func/diagnostics.php?val=0&img=<?php echo $imgId ?>" class="btn blue-madison">0% (None)</a>
            <a href="func/diagnostics.php?val=1&img=<?php echo $imgId ?>" class="btn blue-madison">1% - 33% (Low)</a>
            <a href="func/diagnostics.php?val=2&img=<?php echo $imgId ?>" class="btn blue-madison">34% - 66% (Medium)</a>            
            <a href="func/diagnostics.php?val=3&img=<?php echo $imgId ?>" class="btn blue-madison">67% - 100% (High)</a>

            <p><?php 
                $txt='Image '.$imgId.' of '.$num;
                if($currImgUsr!=1 && $imgId!=1){
                    $txt='<a href="?img='.($imgId-1).'"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;'.$txt;
                }
                if($currImgUsr!=$num && $currImgUsr>$imgId){
                    $txt.='&nbsp;&nbsp;<a href="?img='.($imgId+1).'"><i class="fa fa-arrow-circle-right"></i></a>';
                }
                echo $txt;
            ?>
            </p> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <img width="100%" src="resources/<?php echo $imgName ?>" />
        </div>  
        <div class="col-md-3">


            <div class="portlet box blue-madison">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-image"></i>Image list</div>

                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible="1" data-rail-color="gray" data-handle-color="#7ca7cc ">
                        <ul>
                            <?php
                            while ($item = $database->fetchArray($list)) {
                                ?>
                                <li>

                                    <?php
                                    $name = "Image " . $item["id"];

                                    if ($item["id"] == $imgId) {
                                        $name = "<b>" . $name . "</b>";
                                    }

                                    if ($item["val"] != null || $item["id"] == $currImgUsr) {
                                        $name = '<a href="?img=' . $item["id"] . '">' . $name . '</a>';
                                    }

                                    if ($item["val"] != null) {
                                        $name .=' - ' . $options[$item["val"]];
                                    }

                                    echo $name;
                                    ?>



                                </li>
                                <?php
                            }
                            ?>
                        </ul>  

                    </div>
                </div>
            </div>
        </div> 
    </div>

    <?php
}
$database->closeConnection();
