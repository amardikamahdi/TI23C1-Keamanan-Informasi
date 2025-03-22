@extends('layouts.app')

@section('title')
    Buat Enkripsi Teks
@endsection

@section('content')
    <div class="col-xl-12">
        <form class="form encrypt--text-create-form" action="{{ route('encrypt.text.store') }}" method="POST"
            enctype="multipart/form-data">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        Buat Enkripsi Teks
                    </div>

                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-light-primary">
                                <i class="ki-duotone ki-plus fs-2"></i>Simpan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div class="mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Nama</label>
                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0">
                    </div>

                    <div class="mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Teks</label>
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0" data-kt-autosize="true" name="text"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('custom/js/default-ajax.js') }}"></script>
    <script>
        $('.encrypt--text-create').addClass('active');

        defaultAjax($('.encrypt--text-create-form'));
    </script>
@endpush
