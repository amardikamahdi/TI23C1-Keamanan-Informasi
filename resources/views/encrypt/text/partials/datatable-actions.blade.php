<div class="d-flex justify-content-end align-items-center gap-4">
    <a href="{{ route('encrypt.text.download', $encryptText->id) }}" class="btn btn-light-info btn-icon"
        data-bs-toggle="tooltip" title="Download Hasil Dekripsi">
        <i class="ki-duotone ki-cloud-download fs-3">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </a>
    <div data-bs-toggle="tooltip" title="Dekripsi dengan Password">
        <a class="btn btn-light-primary btn-icon" onclick="showModalDecrypt({'encryptId': {{ $encryptText->id }} })">
            <i class="ki-duotone ki-shield-slash">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
        </a>
    </div>
</div>
