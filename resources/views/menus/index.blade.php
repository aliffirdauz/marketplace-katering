@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ __('Menu Katering') }}</h4>
                        <a href="{{ route('menus.create') }}" class="btn btn-primary waves-effect waves-light"><i
                                class="bx bx-plus font-size-16 align-middle me-2"></i>{{ __('Tambah Menu') }}</a>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Stok</th>
                                        <th>Terjual</th>
                                        <th>Ketersediaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->price }}</td>
                                            <td>{{ $menu->description }}</td>
                                            <td>{{ $menu->stock }}</td>
                                            <td>{{ $menu->sold }}</td>
                                            <td>{{ $menu->is_available ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                                            <td>
                                                <a href="{{ route('menus.show', $menu->id) }}" class="btn btn-primary"><i
                                                        class="bx bx-show"></i></a>
                                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning"><i
                                                        class="bx bxs-edit-alt"></i></a>
                                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="bx bx-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
