<?php 
$logoPath = "images/blank.png";
function watermarkProcess($oldImageName, $newImageName){
    global $logoPath;
    list($oldImageWidth,$oldImageHeight) = getimagesize($oldImageName);
     $width  = 2000;
     $height = 976;
    // CREATING TEMPORARY IMAGE
    $imageTmp = imagecreatetruecolor($width, $height) or die('Cannot Initialize new GD image stream');
    // GET TEMPORARY IMAGE INFO(WIDTH & HEIGHT)
    $info = getimagesize($oldImageName);
    // Get image path from jpg/jpeg types
    if($info[2] == IMAGETYPE_JPEG){
        $imageTmpPath = imagecreatefromjpeg($oldImageName) or die('JPEG/JPEG Image type is open failed');
    }
    // Get image path from gif type
    if($info[2] == IMAGETYPE_PNG){
        $imageTmpPath = imagecreatefrompng($oldImageName) or die('PNG Image type is open failed');
    }
    // Get image path from png type
    if($info[2] == IMAGETYPE_GIF){
        $imageTmpPath = imagecreatefromgif($oldImageName) or die('GIF Image type is open failed');
    }
    // Copy and resize part of an image with resampling
    imagecopyresampled($imageTmp, $imageTmpPath, 0, 0, 0, 0, $width, $height, $oldImageWidth, $oldImageHeight);
    // Get watermark image temp path
    $watermark = imagecreatefrompng($logoPath);
    // Assigning images size to the array 
    list($tempWidth, $tempHeight) = getimagesize($logoPath);
    // Deciding watermark image position      
    $pos_x = $width - $tempWidth;
    $pos_y = $height - $tempHeight;
    // Creating/Copy image by inserting watermark
    imagecopy($imageTmp, $watermark, $pos_x, $pos_y, 0, 0, $tempWidth, $tempHeight);
    // Create image for jpg/jpeg types
    if($info[2] == IMAGETYPE_JPEG){
        imagejpeg($imageTmp, $newImageName, 100);
    }
    // Create image for gif type
    if($info[2] == IMAGETYPE_PNG){
        imagepng($imageTmp, $newImageName, 0);
    }
    // Create image for png type
    if($info[2] == IMAGETYPE_GIF){
        imagegif($imageTmp, $newImageName, 100);
    }
    // delete temporary black color image
    imagedestroy($imageTmp);
    // delete uploaded original image
    unlink($oldImageName);
    return true;
}
?>
