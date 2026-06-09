@extends('layouts.user')

@section('content')
    <section class="bg-[#007bff] text-white py-20 px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Hubungi Kami</h1>
            <p class="text-lg text-blue-100">Punya pertanyaan, keluhan, atau butuh bantuan booking? Tim kami siap melayani Anda.</p>
        </div>
    </section>

    <section class="bg-white py-16 px-6 min-h-screen">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            
            <div class="lg:col-span-2 space-y-12">
                
                <div class="space-y-6">
                    <h2 class="text-3xl font-light text-[#007bff] mb-2">Lokasi Kami</h2>
                    
                    <div class="w-full h-80 rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.153926867623!2d106.82915801476985!3d-6.374100695388049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec1c70e28151%3A0x6ceba040b1713371!2sJl.%20Margonda%20Raya%2C%20Kota%20Depok%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1684300000000!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4 border-t border-gray-100">
                        <div>
                            <h4 class="text-sm font-bold text-gray-800 tracking-wider mb-3">ALAMAT KANTOR</h4>
                            <a href="#" class="text-[#007bff] hover:text-blue-800 transition block mb-4">
                                Jl. Margonda Raya No. 123,<br>
                                Kec. Beji, Kota Depok,<br>
                                Jawa Barat 16424
                            </a>
                            <p class="text-sm text-gray-500 italic">No. Perusahaan: 4166902</p>
                        </div>
                        <div>
                            <p class="mb-2 text-gray-800"><span class="font-bold">Hubungi Kami:</span> <a href="#" class="text-[#007bff] hover:underline">0859-6797-2691</a></p>
                            <div>
    <p class="mb-2 text-gray-800"><span class="font-bold">Hubungi Kami:</span> <a href="#" class="text-[#007bff] hover:underline">0851-5605-3064</a></p>
</div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-200">
                    <h2 class="text-2xl font-light text-[#007bff] mb-2">Kirimkan Pesan</h2>
                    <p class="text-gray-600 mb-8 text-sm">Beri tahu kami bagaimana kami bisa menghubungi Anda kembali.</p>

                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm text-gray-800 mb-1">Nama Depan <span class="text-red-500">*</span></label>
                                <input type="text" class="w-full border border-gray-300 p-2 rounded-sm outline-none focus:border-[#007bff] focus:ring-1 focus:ring-[#007bff]" required>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-800 mb-1">Nama Belakang <span class="text-red-500">*</span></label>
                                <input type="text" class="w-full border border-gray-300 p-2 rounded-sm outline-none focus:border-[#007bff] focus:ring-1 focus:ring-[#007bff]" required>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-800 mb-1">Alamat Email <span class="text-red-500">*</span></label>
                                <input type="email" class="w-full border border-gray-300 p-2 rounded-sm outline-none focus:border-[#007bff] focus:ring-1 focus:ring-[#007bff]" required>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-100">
                            <h3 class="text-xl font-light text-[#007bff] mb-2">Bagaimana kami bisa membantu?</h3>
                            <p class="text-gray-600 mb-4 text-sm">Jangan ragu untuk bertanya atau sekadar meninggalkan komentar.</p>
                            
                            <label class="block text-sm text-gray-800 mb-1">Komentar / Pertanyaan <span class="text-red-500">*</span></label>
                            <textarea rows="6" class="w-full border border-gray-300 p-2 rounded-sm outline-none focus:border-[#007bff] focus:ring-1 focus:ring-[#007bff] resize-y" required></textarea>
                        </div>

                        <a href="https://wa.me/6285967972691?text=Halo%20Admin%20RentalKu,%20saya%20ada%20pertanyaan%20dari%20halaman%20kontak" 
   target="_blank" 
   class="inline-block bg-[#e74c3c] hover:bg-red-600 text-white font-bold py-3 px-8 rounded-sm transition shadow-md uppercase text-sm text-center no-underline">
    Kirim Pesan via WhatsApp
</a>
                    </form>
                </div>

            </div>

            <div class="space-y-6 sticky top-24">
                <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-xl text-center">
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2 mb-6">
                        <span class="text-gray-400">🔍</span>
                        <input type="text" placeholder="Cari kendaraan..." class="w-full ml-2 outline-none text-sm bg-transparent">
                    </div>

                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?q=80&w=600&auto=format&fit=crop" alt="Armada RentalKu" class="w-full h-40 object-cover mb-0">
                    <a href="{{ route('home') }}" class="block w-full bg-[#007bff] hover:bg-blue-700 text-white font-bold py-4 transition text-lg shadow-inner">
                        📰 Booking Online Sekarang
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection