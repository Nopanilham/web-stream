@extends('admin.layouts.base')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-film"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Film</span>
                <span class="info-box-number">4</span>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-dollar-sign"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Transaksi</span>
                <span class="info-box-number">1</span>
            </div>
        </div>
    </div>
</div>
@endsection
