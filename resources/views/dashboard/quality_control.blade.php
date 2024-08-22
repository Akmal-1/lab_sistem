@extends('dashboard.index')

@section('dashboard-content')
    <h3>Dashboard - Quality Control</h3>

    <!-- Contoh konten dashboard -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Jumlah Sampel Terkirim
                </div>
                <div class="card-body">
                    <h4>{{ $jumlahSampel }}</h4>
                    <p>Sampel yang telah dikirim untuk dianalisa.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Hasil Analisa Terbaru
                </div>
                <div class="card-body">
                    <h4>{{ $hasilAnalisa }}</h4>
                    <p>Hasil analisa yang terbaru.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
