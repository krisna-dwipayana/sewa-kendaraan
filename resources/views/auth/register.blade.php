<x-guest-layout>
<style>
    .register-bg {
        min-height: 100vh;
        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 40%, #EEF2FF 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
    }
    .register-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(59, 130, 246, 0.12), 0 4px 16px rgba(0,0,0,0.06);
        width: 100%;
        max-width: 460px;
        padding: 2.5rem 2.5rem;
        border: 1px solid rgba(219, 234, 254, 0.8);
    }
    .brand-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, #2563EB, #3B82F6);
        color: white;
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        padding: 5px 14px;
        border-radius: 999px;
        margin-bottom: 1.25rem;
        text-transform: uppercase;
    }
    .register-title {
        font-size: 1.875rem;
        font-weight: 800;
        color: #111827;
        line-height: 1.2;
        margin-bottom: 0.4rem;
    }
    .register-subtitle {
        font-size: 0.875rem;
        color: #6B7280;
        margin-bottom: 2rem;
    }
    .field-label {
        display: block;
        font-size: 0.8rem;
        font-weight: 700;
        color: #374151;
        margin-bottom: 6px;
        letter-spacing: 0.02em;
        text-transform: uppercase;
    }
    .field-input {
        width: 100%;
        padding: 13px 16px;
        border: 1.5px solid #E5E7EB;
        border-radius: 12px;
        font-size: 0.9rem;
        color: #111827;
        background: #FAFAFA;
        transition: all 0.2s;
        outline: none;
        box-sizing: border-box;
    }
    .field-input:focus {
        border-color: #3B82F6;
        background: white;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
    }
    .field-input::placeholder {
        color: #9CA3AF;
        font-size: 0.875rem;
    }
    .field-group {
        margin-bottom: 1.1rem;
    }
    .divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, #E5E7EB, transparent);
        margin: 1.5rem 0;
    }
    .btn-daftar {
        width: 100%;
        background: linear-gradient(135deg, #2563EB 0%, #3B82F6 100%);
        color: white;
        font-size: 1rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        padding: 16px 24px;
        border-radius: 14px;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.35);
        text-transform: uppercase;
    }
    .btn-daftar:hover {
        background: linear-gradient(135deg, #1D4ED8 0%, #2563EB 100%);
        box-shadow: 0 6px 28px rgba(37, 99, 235, 0.45);
        transform: translateY(-1px);
    }
    .btn-daftar:active {
        transform: translateY(0);
        box-shadow: 0 2px 10px rgba(37, 99, 235, 0.3);
    }
    .login-link-text {
        text-align: center;
        font-size: 0.875rem;
        color: #6B7280;
        margin-top: 1.25rem;
    }
    .login-link-text a {
        color: #2563EB;
        font-weight: 700;
        text-decoration: none;
        transition: color 0.2s;
    }
    .login-link-text a:hover {
        color: #1D4ED8;
    }
    .icon-field {
        position: relative;
    }
    .icon-field svg {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9CA3AF;
        width: 18px;
        height: 18px;
        pointer-events: none;
    }
    .icon-field input {
        padding-right: 42px;
    }
</style>

<div class="register-bg">
    <div class="register-card">

        {{-- Brand Badge --}}
        <div>
            <span class="brand-badge">
                🚗 RentalKu
            </span>
        </div>

        <h2 class="register-title">Buat Akun Baru</h2>
        <p class="register-subtitle">Lengkapi data diri kamu untuk mulai menyewa kendaraan impianmu.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field-group">
                <label for="name" class="field-label">Nama Lengkap</label>
                <div class="icon-field">
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                        required autofocus placeholder="Masukkan nama lengkap..."
                        class="field-input">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="field-group">
                <label for="email" class="field-label">Email</label>
                <div class="icon-field">
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        required placeholder="Masukkan alamat email..."
                        class="field-input">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="field-group">
                <label for="password" class="field-label">Password</label>
                <div class="icon-field">
                    <input id="password" type="password" name="password"
                        required placeholder="Min. 8 karakter..."
                        class="field-input">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="field-group">
                <label for="password_confirmation" class="field-label">Konfirmasi Password</label>
                <div class="icon-field">
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        required placeholder="Ketik ulang password..."
                        class="field-input">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="divider"></div>

            <button type="submit" class="btn-daftar">
                🚀 Daftar Sekarang
            </button>

            <p class="login-link-text">
                Sudah punya akun?
                <a href="{{ route('login') }}">Log in di sini</a>
            </p>
        </form>
    </div>
</div>
</x-guest-layout>