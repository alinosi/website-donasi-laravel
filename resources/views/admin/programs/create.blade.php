@extends('layouts.admin')

@section('title', 'Daftar Program')
@section('header_title', 'Tambah Program Donasi')

@section('content')
<div class="container-fluid px-4 mt-4">
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            {{-- Card Container --}}
            <div class="card shadow-lg border-0 rounded-lg mb-5">
                <div class="card-header bg-primary text-white">
                    <h5 class="font-weight-light my-2">Form Tambah Program Baru</h5>
                </div>
                
                <div class="card-body p-4">

                    {{-- Menampilkan Pesan Error Global --}}
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        {{-- Nama Program --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Nama Program</label>
                            <input type="text" 
                                   name="program_name" 
                                   class="form-control form-control-lg @error('program_name') is-invalid @enderror" 
                                   value="{{ old('program_name') }}" 
                                   placeholder="Contoh: Peduli Bencana Alam...">
                            @error('program_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Deskripsi Singkat</label>
                            <textarea name="descriptions" 
                                      class="form-control @error('descriptions') is-invalid @enderror" 
                                      rows="4" 
                                      placeholder="Jelaskan detail program donasi disini...">{{ old('descriptions') }}</textarea>
                            @error('descriptions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Grid Row untuk Target Dana & Gambar --}}
                        <div class="row mb-4">
                            {{-- Target Dana --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary">Target Dana (Rp)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">Rp</span>
                                    <input type="number" 
                                           name="target_funds" 
                                           class="form-control @error('target_funds') is-invalid @enderror" 
                                           value="{{ old('target_funds') }}"
                                           placeholder="0">
                                </div>
                                <small class="text-muted">Masukkan angka saja tanpa titik/koma.</small>
                                @error('target_funds')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Upload Gambar --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary">Gambar Banner</label>
                                <input type="file" 
                                       name="image" 
                                       id="imageInput"
                                       class="form-control @error('image') is-invalid @enderror"
                                       onchange="previewImage()">
                                <small class="text-muted">Format: jpg, png, jpeg. Max: 2MB.</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                {{-- Area Preview Gambar --}}
                                <div class="mt-3 d-none" id="previewContainer">
                                    <label class="d-block small text-muted mb-1">Preview:</label>
                                    <img id="imagePreview" src="" alt="Image Preview" class="img-thumbnail" style="max-height: 150px; width: auto;">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- Tombol Action --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.programs.index') }}" class="btn btn-light border px-4">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4 fw-bold">
                                <i class="fas fa-save me-1"></i> Simpan Program
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script Sederhana untuk Preview Gambar --}}
<script>
    function previewImage() {
        const input = document.getElementById('imageInput');
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('d-none');
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            previewImage.src = "";
            previewContainer.classList.add('d-none');
        }
    }
</script>

@endsection