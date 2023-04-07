<?php
declare(strict_types=1);

namespace App\Services;


use App\Helpers\AppHelper;
use Illuminate\Support\Facades\Storage;

class MediaService {
     public function uploadFile($fileObject, $visibility = 'public'): string
     {
          $mediaName = AppHelper::renameMediaFileUpload($fileObject);
          $pathPrefix = AppHelper::prepareFileStoragePath();
          $fileObject->storeAs("public/uploads/$pathPrefix", $mediaName);
          return "$pathPrefix/$mediaName";
     }

     public function deleteFileFromAwsStorage($attachmentPath): bool
     {
          Storage::delete($attachmentPath);
          return true;
     }
}
