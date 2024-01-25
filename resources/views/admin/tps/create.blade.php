@extends('admin.layouts.main')
@section('title', 'Tambah TPS')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $title }} </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route($uri) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group mb-2">
                                            <label for="">Wilayah Pemilihan</label>
                                            <select name="district_id"
                                                class="form-control select2 @error('district_id') is-invalid @enderror">
                                                <option value="">---Pilih Wilayah---</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ old('district_id') == $district->id ? 'selected' : null }}>
                                                        {{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nomor TPS</label>
                                            <input type="text" name="number_of_tps" id="number_of_tps"
                                                class="form-control @error('number_of_tps') is-invalid @enderror"
                                                value="{{ old('number_of_tps') }}" placeholder="Cth: TPS-001" autocomplete="off">
                                            @error('number_of_tps')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Total DPT</label>
                                            <input type="text" name="total_dpt" id="total_dpt"
                                                class="form-control @error('total_dpt') is-invalid @enderror"
                                                value="{{ old('total_dpt') }}" placeholder="Cth: 100" autocomplete="off">
                                            @error('total_dpt')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Penanggung Jawab</label>
                                            <input type="text" name="pic" id="pic"
                                                class="form-control @error('pic') is-invalid @enderror"
                                                value="{{ old('pic') }}" placeholder="Cth: John" autocomplete="off">
                                            @error('pic')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Alamat</label>
                                            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Status <span class="text-danger">*</span></label>
                                            <select id="is_active" name="is_active"
                                                class="form-control @error('is_active') is-invalid @enderror">
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            </select>
                                            @error('is_active')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid gap-2 mt-4">
                                            <button class="btn btn-success"><i class="bx bx-check"></i>
                                                Simpan</button>
                                            <a href="{{ route($uri) }}" class="btn btn-secondary"><i class="bx bx-x"></i>
                                                Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
