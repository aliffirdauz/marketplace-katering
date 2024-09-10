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
                                                <form action="{{ route('order.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <input type="hidden" name="price" value="{{ $menu->price }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="total_price" value="{{ $menu->price }}">
                                                    <input type="hidden" name="delivery_date" value="{{ date('Y-m-d') }}">
                                                    <input type="hidden" name="delivery_time" value="{{ date('H:i') }}">
                                                    <h4 class="card-title">{{ $menu->name }}</h4>
                                                    <p class="card-text">{{ $menu->description }}</p>
                                                    <p class="card-text">Harga: Rp {{ $menu->price }}</p>
                                                    <p class="card-text">Katering: {{ $menu->merchant->name }}</p>
                                                    <p class="card-text">Alamat: {{ $menu->merchant->address }}</p>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div
                                                                class="page-title-box d-sm-flex align-items-center justify-content-between">
                                                                <button type="button"
                                                                    class="btn btn-primary right-bar-toggle waves-effect"
                                                                    onclick="addToCart('{{ $menu->id }}', '{{ $menu->name }}', '{{ $menu->price }}')">
                                                                    Pesan
                                                                </button>
                                                                <button type="submit" class="btn btn-success">Beli
                                                                    Langsung</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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

@section('script')
    <script>
        document.querySelector('.right-bar-toggle').addEventListener('click', function() {
            const rightBar = document.querySelector('.right-bar');
            rightBar.classList.remove('right-bar-visible');
        });

        // Initialize cart array
        let cart = [];

        function addToCart(id, name, price) {
            // Check if the item is already in the cart
            const itemIndex = cart.findIndex(item => item.id === id);
            if (itemIndex > -1) {
                // If item exists, increase quantity
                cart[itemIndex].quantity += 1;
            } else {
                // Otherwise, add new item to cart
                cart.push({
                    id,
                    name,
                    price,
                    quantity: 1
                });
            }

            updateCart();
        }

        function updateCart() {
            const cartContainer = document.querySelector('.right-bar .p-4');
            cartContainer.innerHTML = ''; // Clear current cart items

            cart.forEach(item => {
                cartContainer.innerHTML += `
                <div class="cart-item">
                    <h6>${item.name}</h6>
                    <input type="hidden" name="menu_id[]" value="${item.id}">
                    <p>Harga: Rp ${item.price} x ${item.quantity}</p>
                    <input type="hidden" name="quantity[]" value="${item.quantity}">
                    <button class="btn btn-danger btn-sm" onclick="removeFromCart('${item.id}')">Hapus</button>
                </div>
                <hr>
            `;
            });

            if (cart.length > 0) {
                cartContainer.innerHTML += `
                <h6>Total: Rp ${cart.reduce((acc, item) => acc + (item.price * item.quantity), 0)}</h6>
                <input type="hidden" name="total_price" value="${cart.reduce((acc, item) => acc + (item.price * item.quantity), 0)}">
                <hr>
                <div class="mb-3">
                    <label for="delivery_date" class="form-label">Tanggal Pengiriman</label>
                    <input type="date" class="form-control" id="delivery_date" name="delivery_date">
                </div>
                <div class="mb-3">
                    <label for="delivery_time" class="form-label">Waktu Pengiriman</label>
                    <input type="time" class="form-control" id="delivery_time" name="delivery_time">
                </div>
                <hr>
                <button class="btn btn-success" onclick="checkout()">Pesan</button>
            `;
            }
        }

        function removeFromCart(id) {
            cart = cart.filter(item => item.id !== id);
            updateCart();
        }

        function checkout() {
            alert('Fitur ini sedang dalam pengembangan');
        }
    </script>
@endsection
