@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Menu Katering</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <a href="{{ route('menus.index') }}"
                                            class="btn btn-primary waves-effect waves-light"><i
                                                class="bx bx-arrow-back font-size-16 align-middle me-2"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="font-size-16">Detail Menu</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Nama Menu</th>
                                                    <td>{{ $menu->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Harga</th>
                                                    <td>{{ $menu->price }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Deskripsi</th>
                                                    <td>{{ $menu->description }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Stok</th>
                                                    <td>{{ $menu->stock }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Kategori</th>
                                                    <td>{{ $menu->category }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="font-size-16">Foto Menu</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>
                                                <img src="{{ asset('images/menu/' . $menu->image) }}"
                                                    alt="{{ $menu->name }}" class="img-fluid rounded"
                                                    style="max-width: 550px; max-height: 1200px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
