<?php

namespace App\Http\Controllers\Encrypt\Text;

use App\Http\Controllers\Controller;
use App\Http\Requests\Encrypt\Text\StoreEncryptTextRequest;
use App\Models\EncryptText;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('encrypt.text.create');
        } catch (\Throwable $th) {
            info($th);

            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEncryptTextRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $model = new EncryptText();
            $model->name = $request->name;
            $model->text = Crypt::encrypt($request->text, $request->key);
            $model->key = $request->key;
            $model->save();

            DB::commit();
            return $this->CreatedResponse(route('encrypt.text.create'));
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th);

            return $this->InternalServerErrorResponse();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
