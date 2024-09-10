<section>
    <header>
        <h4 class="card-title mb-4">
            {{ __('Edit Menu') }}
        </h4>

        <p class="text-muted">
            {{ __("Perbaharui menu kateringmu.") }}
        </p>
    </header>

    <form method="post" action="{{ route('menus.update', $menu->id) }}" class="mt-4" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nama Menu') }}</label>
            <input id="name" name="name" type="text" class="form-control" required autofocus autocomplete="name" value="{{ $menu->name }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{ __('Harga') }}</label>
            <input id="price" name="price" type="number" class="form-control" required autocomplete="price" value="{{ $menu->price }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('Deskripsi') }}</label>
            <textarea id="description" name="description" class="form-control" required>{{ $menu->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">{{ __('Stok') }}</label>
            <input id="stock" name="stock" type="number" class="form-control" required autocomplete="stock" value="{{ $menu->stock }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">{{ __('Gambar') }}</label>
            <input id="image" name="image" type="file" class="form-control" required autocomplete="image">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">{{ __('Kategori') }}</label>
            <select id="category" name="category" class="form-select" required>
                <option value="" selected disabled>Pilih Kategori</option>
                <option value="Lauk Ayam" {{ $menu->category == 'Lauk Ayam' ? 'selected' : '' }}>Lauk Ayam</option>
                <option value="Lauk Ikan" {{ $menu->category == 'Lauk Ikan' ? 'selected' : '' }}>Lauk Ikan</option>
                <option value="Lauk Daging" {{ $menu->category == 'Lauk Daging' ? 'selected' : '' }}>Lauk Daging</option>
            </select>
        </div>

        <input type="hidden" name="merchant_id" value="{{ auth()->user()->merchant->id }}">

        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        </div>
    </form>
</section>
