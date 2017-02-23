<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AWS;
use App\Code;

class DownloadController extends Controller
{
    private function download() {


    }

    public function check(Request $request) {
        $code = $request->code;
        $email = $request->email;
        $mailme = (boolean) $request->mailme;

        $lookup = Code::where('code', $code)->first();

        if (!$lookup) {
          $request->session()->flash('status', 'Code not found');
          return redirect('redeem');
        }

        $lookup->email = $email;
        $lookup->mailme = $mailme;
        $lookup->save();

        $s3 = AWS::createClient('s3');

        $cmd = $s3->getCommand('GetObject', [
          'Bucket' => 'walkertexasranger',
          'Key' => 'I Go Missing In My Sleep.zip'
        ]);

        $uri = (string) $s3->createPresignedRequest($cmd, '+5 minutes')->getUri();

        return redirect($uri);

    }

    public function redeem() {
      return view('redeem');
    }
}
