<?php
/**
 * Created by PhpStorm.
 * User: AnhDuc
 * Date: 6/19/16
 * Time: 2:14 PM
 */

interface IUploader
{
    public function doUploadImage($originalPath, $newPath);
}

class S3AmazonUpload implements  IUploader
{
    public function doUploadImage($originalPath, $newPath)
    {
        // TODO: Implement doUploadImage() method.
        echo 'Upload file from ' . $originalPath . ' to S3 ' . $newPath;
    }
}

class LocalUpload implements IUploader
{

    public function doUploadImage($originalPath, $newPath)
    {
        // TODO: Implement doUploadImage() method.
        echo 'Upload file from ' . $originalPath . ' to local ' . $newPath;
    }

}

class Uploader
{
    /**
     * @var IUploader $uploader
     */
    private $uploader;

    /**
     * Uploader constructor.
     * @param IUploader $uploader
     */
    public function __construct(IUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function doUploadImage($originalPath, $newPath)
    {
        $this->uploader->doUploadImage($originalPath, $newPath);
    }
}

//Client
$localUpload = new Uploader(new LocalUpload());
$localUpload->doUploadImage('var/www/html/test', '/var/www/a');

$s3Upload = new Uploader(new S3AmazonUpload());
$localUpload->doUploadImage('var/www/html/test', 'bucketS3');