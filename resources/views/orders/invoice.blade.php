@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Invoice Transaksi</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-16">Order # {{ $order->id }}</h4>
                                <div class="mb-4">
                                    <h4>Marketplace Katering</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <address>
                                        <strong>Pemesan:</strong><br>
                                        {{ $customer->name }}<br>
                                        {{ $customer->address }}<br>
                                        {{ $customer->phone }}
                                    </address>
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <address class="mt-2 mt-sm-0">
                                        <strong>Penjual:</strong><br>
                                        {{ $merchant->name }}<br>
                                        {{ $merchant->address }}<br>
                                        {{ $merchant->phone }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    <address>
                                        <strong>Metode Pembayaran:</strong><br>
                                        COD (Cash on Delivery)<br><br>
                                    </address>
                                </div>
                                <div class="col-sm-6 mt-3 text-sm-end">
                                    <address>
                                        <strong>Tanggal dan Waktu Pemesanan:</strong><br>
                                        {{ $pemesanan->tanggal_pengiriman }}<br>
                                        {{ $pemesanan->waktu_pengiriman }} WIB<br>
                                    </address>
                                </div>
                            </div>
                            <div class="py-2 mt-3">
                                <h3 class="font-size-15 fw-bold">Daftar Pesanan</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Nama Menu</th>
                                            <th>Deskripsi</th>
                                            <th class="text-end">Harga</th>
                                            <th class="text-end">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->description }}</td>
                                            <td class="text-end">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                            <td class="text-end">{{ $quantity }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-print-none">
                                <div class="float-end">
                                    <a href="javascript:window.print()"
                                        class="btn btn-success waves-effect waves-light me-1"><i
                                            class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
