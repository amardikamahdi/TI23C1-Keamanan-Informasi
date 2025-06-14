<?php

namespace App\Http\Controllers\Encrypt\Text;

use App\Http\Controllers\Controller;
use App\Http\Requests\Encrypt\Text\DownloadEncryptTextRequest;
use App\Models\EncryptText;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DownloadEncryptTextRequest $request, EncryptText $encryptText)
    {
        try {
            if (!$this->ensureUserCanAccessEncryptText($encryptText, $request)) {
                return response()->json([
                    'message' => 'Kunci Enkripsi tidak sesuai.',
                ], 403);
            }

            $this->generateTextFile($encryptText);

            return response()->json([
                'message' => 'File berhasil dibuat. Silakan unduh.',
                'redirect' => Storage::url(Str::slug($encryptText->name) . '.txt'),
            ]);
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
            $filename = Str::slug($encryptText->name) . '.txt';
            $text = Crypt::decrypt($encryptText->text, $encryptText->key);

            Storage::disk('public')->put($filename, $text);
        } catch (\Throwable $th) {
            info($th);

            $this->InternalServerErrorResponse();
        }
    }

    /**
     * Ensure the user can access the encrypt text.
     */
    protected function ensureUserCanAccessEncryptText(EncryptText $encryptText, DownloadEncryptTextRequest $request): bool
    {
        if ($encryptText->key === $request->key) {
            return true;
        }

        return false;
    }
}
