<x-app-layout>
    <!-- Header Profil Tambahan dengan Warna Tema -->
    <div class="bg-blue-600 pb-24 pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center sm:text-left">
            <div class="flex flex-col sm:flex-row items-center gap-6 text-white px-4 sm:px-0">
                <!-- Avatar Inisial -->
                <div class="h-24 w-24 rounded-full bg-white text-blue-600 flex items-center justify-center text-4xl font-bold shadow-lg border-4 border-blue-200 uppercase">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <!-- Info Singkat -->
                <div>
                    <h3 class="text-3xl font-extrabold">{{ Auth::user()->name }}</h3>
                    <p class="text-blue-100 mt-1">{{ Auth::user()->email }}</p>
                    <span class="inline-block mt-3 px-4 py-1 bg-blue-500 text-xs rounded-full font-semibold tracking-wider uppercase shadow-sm">
                        Member RentalKu
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Konten Form -->
    <div class="-mt-16 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Kartu Update Informasi Profil -->
            <div class="p-6 sm:p-10 bg-white shadow-xl sm:rounded-xl border border-gray-100 relative z-10">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Kartu Update Password -->
            <div class="p-6 sm:p-10 bg-white shadow-xl sm:rounded-xl border border-gray-100">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Kartu Delete Account (Diberi aksen merah halus) -->
            <div class="p-6 sm:p-10 bg-red-50 shadow-xl sm:rounded-xl border border-red-100">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>