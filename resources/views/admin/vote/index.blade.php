@extends('admin.layouts.main')
@section('title', 'Penginputan Suara TPS')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between text-center">
                        <h4 class="mb-sm-0 font-size-18">Form Penginputan Suara TPS </h4>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route($uri) }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @if (Auth::user()->role != 'superadmin')
                            <input type="hidden" name="tps_id" value="{{ Auth::user()->tps_id }}">
                        @else
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="">TPS</label>
                                        <select name="tps_id"
                                            class="form-control form-control-lg @error('tps_id') is-invalid @enderror">
                                            <option value="">---Pilih TPS---</option>
                                            @foreach ($tps as $tp)
                                                <option value="{{ $tp->id }}"
                                                    {{ old('tps_id') == $tp->id ? 'selected' : null }}>
                                                    {{ $tp->number_of_tps }}</option>
                                            @endforeach
                                        </select>
                                        @error('tps_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endif
                        {{-- Looping --}}
                        @foreach ($candidates as $candidate)
                            <input type="hidden" name="candidate_id[]" value="{{ $candidate->id }}">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label
                                            for="">{{ $candidate->sort_number === '99' ? '-' : 'NOMOR URUT - ' . $candidate->sort_number }}</label>
                                        <input type="text" id="name" class="form-control form-control-lg"
                                            value="{{ $candidate->name }}" readonly>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="">Total Suara</label>
                                        @if (count($votes) > 0)
                                            @foreach ($votes as $vote)
                                                @if ($vote->candidate_id == $candidate->id)
                                                    <input type="hidden" name="vote_id[]" value="{{ $vote->id }}">
                                                    <input type="number" name="total[]" id="total"
                                                        class="form-control form-control-lg total"
                                                        value="{{ old('total', $vote->total) }}" min="0">
                                                @endif
                                            @endforeach
                                        @else
                                            <input type="number" name="total[]" class="form-control form-control-lg total"
                                                value="{{ old('total', 0) }}" min="0">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-2 font-weight-bold">
                                    <label for="" class="font-size-18">TOTAL SUARA</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2 font-weight-bold">
                                    <label for="" class="font-size-18" id="totalSuara">0</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-2 font-weight-bold">
                                    <label for="" class="font-size-18">TOTAL DPT</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2 font-weight-bold">
                                    <label for=""
                                        class="font-size-18">{{ auth()->user()->tps_id ? number_format($tps->total_dpt, 0, ',', '.') : 0 }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-danger btn-lg"><i class="bx bx-check-circle"></i>
                                SUBMIT</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        let totalSuara = 0;
        $('.total').each(function() {
            totalSuara += parseInt($(this).val())
        })
        $('#totalSuara').html(numberFormat(totalSuara || 0));

        $('.total').on('input', function() {
            let total = 0
            $('.total').each(function() {
                total += parseInt($(this).val())
            })
            $('#totalSuara').html(numberFormat(total || 0))
        });

        function numberFormat(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>

@endsection
