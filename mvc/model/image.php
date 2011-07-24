<?

/**
 * Helper functions for images
 */
class Jedarchive_Image
{

    /**
     * Resize an image to new dimensions. The width/height ratio of the original
     * image is kept. The new image will fit in the given dimensions, but might
     * be smaller in one dimension.
     *
     * The source can be jpg or png. The result will always be jpg.
     */
    function resize($width, $height, $srcFile, $dstFile)
    {
        $imgSize = getimagesize($srcFile);
        
        $oldWidth = $imgSize[0];
        $oldHeight = $imgSize[1];
        
        if ($oldWidth < $oldHeight) {
            list($width, $height) = array($height, $width);
        }
        
        $newWidth = $width;
        $newHeight = (int)(((float)$oldHeight) * ($newWidth / $oldWidth));
        
        if ($newHeight > $height) {
            $newHeight = $height;
            $newWidth = (int)(((float)$oldWidth) * ($newHeight / $oldHeight));
        }
        
        if (strpos($srcFile, '.jpg') || strpos($srcFile, '.jpeg')) {
            $imgSrc = imagecreatefromjpeg($srcFile);
        } elseif (strpos($srcFile, '.png')) {
            $imgSrc = imagecreatefrompng($srcFile);
        }

        $imgDst = imagecreatetruecolor($newWidth, $newHeight);
        
        imagecopyresampled($imgDst, $imgSrc, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);

        if(!imagejpeg($imgDst, $dstFile, 90)) {
            return false;
        }
    }
}