@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ __('Menu Katering') }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Menu</h4>
                            {{-- use card to show menus --}}
                            <div class="row">
                                {{-- create filter for address and category --}}
                                <div class="col-lg-12">
                                    <form action="{{ route('order.show') }}" method="GET">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        value="{{ request()->get('address') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Kategori</label>
                                                    <select class="form-select" id="category" name="category">
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="Lauk Ayam"
                                                            @if (request()->get('category') == 'Lauk Ayam') selected @endif>Lauk Ayam
                                                        </option>
                                                        <option value="Lauk Ikan"
                                                            @if (request()->get('category') == 'Lauk Ikan') selected @endif>Lauk Ikan
                                                        </option>
                                                        <option value="Lauk Daging"
                                                            @if (request()->get('category') == 'Lauk Daging') selected @endif>Lauk Daging
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @foreach ($menus as $menu)
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('images/menu/' . $menu->image) }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $menu->name }}</h4>
                                                <p class="card-text">{{ $menu->description }}</p>
                                                <p class="card-text">Harga: Rp {{ $menu->price }}</p>
                                                <p class="card-text">Katering: {{ $menu->merchant->name }}</p>
                                                <p class="card-text">Alamat: {{ $menu->merchant->address }}</p>
                                                <a href="{{ route('order', $menu->id) }}" class="btn btn-primary">Pesan</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- end card --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
