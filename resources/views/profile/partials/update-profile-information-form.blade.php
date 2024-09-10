<section>
    <header>
        <h4 class="card-title mb-4">
            {{ __('Informasi Profil') }}
        </h4>

        <p class="text-muted">
            {{ __("Perbaharui informasi profil kateringmu.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name_merchant" class="form-label">{{ __('Nama') }}</label>
            <input id="name_merchant" name="name_merchant" type="text" class="form-control"
                value="{{ old('name_merchant', $merchant->name) }}" required autofocus autocomplete="name_merchant">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- address_merchant --}}
        <div class="mb-3">
            <label for="address_merchant" class="form-label">{{ __('Alamat') }}</label>
            <input id="address_merchant" name="address_merchant" type="text" class="form-control"
                value="{{ old('address_merchant', $merchant->address) }}" required autocomplete="address_merchant">
            @error('address_merchant')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- phone_merchant --}}
        <div class="mb-3">
            <label for="phone_merchant" class="form-label">{{ __('Nomor Telepon') }}</label>
            <input id="phone_merchant" name="phone_merchant" type="number" class="form-control"
                value="{{ old('phone_merchant', $merchant->phone) }}" required autocomplete="phone_merchant">
            @error('phone_merchant')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- description_merchant --}}
        <div class="mb-3">
            <label for="description_merchant" class="form-label">{{ __('Deskripsi') }}</label>
            <textarea id="description_merchant" name="description_merchant" class="form-control"
                required>{{ old('description_merchant', $merchant->description) }}</textarea>
            @error('description_merchant')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- logo_merchant --}}
        <div class="mb-3">
            <label for="logo_merchant" class="form-label">{{ __('Logo') }}</label>
            <input id="logo_merchant" name="logo_merchant" type="file" class="form-control"
                value="{{ old('logo_merchant', $merchant->logo) }}" autocomplete="logo_merchant">
            @error('logo_merchant')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Alamat E-Mail') }}</label>
            <input id="email" name="email" type="email" class="form-control"
                value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-success ms-3">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
