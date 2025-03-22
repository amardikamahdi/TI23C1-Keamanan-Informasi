<?php

namespace App\Http\Controllers\Encrypt\Text;

use App\Http\Controllers\Controller;
use App\Models\EncryptText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EncryptText $encryptText)
    {
        try {
            $this->generateTextFile($encryptText);

            return Storage::download($encryptText->name . '.txt');
        } catch (\Throwable $th) {
            info($th);

            $this->InternalServerErrorResponse();
        }
    }

    /**
     * Generate text file.
     */
    protected function generateTextFile(EncryptText $encryptText): void
    {
        try {
            $filename = $encryptText->name . '.txt';
            $text = Crypt::decrypt($encryptText->text, $encryptText->key);

            Storage::put($filename, $text);
        } catch (\Throwable $th) {
            info($th);

            $this->InternalServerErrorResponse();
        }
    }
}
