<?php

namespace App\Http\Controllers\Encrypt\Text;

use App\Http\Controllers\Controller;
use App\Models\EncryptText;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ListController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            return DataTables::of(
                EncryptText::query()
            )
                ->addIndexColumn()
                ->editColumn('created_at', fn(EncryptText $encryptText) => $encryptText->created_at->diffForHumans())
                ->editColumn('actions', fn(EncryptText $encryptText) => view('encrypt.text.partials.datatable-actions', ['encryptText' => $encryptText]))
                ->make(true);
        } catch (\Throwable $th) {
            info($th);

            $this->InternalServerErrorResponse();
        }
    }
}
