<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AWS;

class DownloadController extends Controller
{
    public function download() {

      $s3 = AWS::createClient('s3');

      $cmd = $s3->getCommand('GetObject', [
        'Bucket' => 'walkertexasranger',
        'Key' => 'I Go Missing In My Sleep.zip'
      ]);

      $uri = (string) $s3->createPresignedRequest($cmd, '+5 minutes')->getUri();

      return redirect($uri);

    }
}
