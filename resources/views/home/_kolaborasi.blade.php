{{-- ============ KOLABORASI SECTION ============ --}}
<section class="relative py-14 lg:py-20 bg-[#F5F5F5] overflow-hidden" id="kolaborasi">
    <div class="absolute inset-0 islamic-pattern-dark opacity-[0.02]"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-10 lg:mb-14 reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Mari Berkolaborasi</span>
                <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                Ajukan Kolaborasi
            </h2>
            <p class="text-gray-500 leading-relaxed">
                Ingin berkolaborasi dengan GPS TangSel? Isi formulir di bawah ini dan kami akan segera menghubungi Anda.
            </p>
        </div>

        {{-- Two Columns --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">
            {{-- Left: Form --}}
            <div class="reveal">
                <form id="kolab-form" class="bg-white rounded-2xl border border-gray-100 p-5 sm:p-7 lg:p-9 space-y-4 sm:space-y-5">
                    @csrf
                    {{-- Nama --}}
                    <div>
                        <label for="kolab-nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="kolab-nama" name="nama" placeholder="Masukkan nama Anda" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all duration-200">
                    </div>

                    {{-- WhatsApp --}}
                    <div>
                        <label for="kolab-whatsapp" class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <input type="tel" id="kolab-whatsapp" name="whatsapp" placeholder="08xxxxxxxxxx" class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all duration-200">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="kolab-email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <input type="email" id="kolab-email" name="email" placeholder="nama@email.com" class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all duration-200">
                        </div>
                    </div>

                    {{-- Tujuan --}}
                    <div>
                        <label for="kolab-tujuan" class="block text-sm font-semibold text-gray-700 mb-2">Tujuan Kolaborasi</label>
                        <textarea id="kolab-tujuan" name="tujuan" rows="5" placeholder="Ceritakan tujuan kolaborasi Anda..." class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all duration-200 resize-none"></textarea>
                    </div>

                    {{-- Captcha --}}
                    <div>
                        <label for="kolab-captcha" class="block text-sm font-semibold text-gray-700 mb-2">Berapa hasil dari: <span id="captcha-question" class="font-bold text-primary">...</span></label>
                        <div class="flex gap-2">
                            <input type="number" id="kolab-captcha" name="captcha" placeholder="Jawaban" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all duration-200">
                            <button type="button" id="btn-refresh-captcha" class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center justify-center" title="Refresh Captcha">
                                <span class="material-icons text-base">refresh</span>
                            </button>
                        </div>
                    </div>

                    {{-- Message Area --}}
                    <div id="kolab-message" class="hidden p-4 rounded-xl text-sm font-medium border"></div>

                    {{-- Submit --}}
                    <button type="submit" id="kolab-submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold text-white bg-primary rounded-xl border border-primary-dark/30 hover:bg-primary-dark hover:-translate-y-0.5 transition-all duration-200 shadow-sm disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                        <svg id="kolab-submit-icon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        <svg id="kolab-loading-icon" class="w-4 h-4 animate-spin hidden" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        <span id="kolab-submit-text">Kirim Pesan</span>
                    </button>
                </form>

                {{-- Social Media --}}
                <div class="flex items-center justify-center gap-3 mt-6">
                    <a href="#" target="_blank" rel="noopener noreferrer" class="w-11 h-11 rounded-full bg-[#FF0000] flex items-center justify-center text-white hover:opacity-80 transition-all duration-200" aria-label="YouTube">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="w-11 h-11 rounded-full bg-[#1877F2] flex items-center justify-center text-white hover:opacity-80 transition-all duration-200" aria-label="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="w-11 h-11 rounded-full bg-[#E4405F] flex items-center justify-center text-white hover:opacity-80 transition-all duration-200" aria-label="Instagram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="w-11 h-11 rounded-full bg-[#000000] flex items-center justify-center text-white hover:opacity-80 transition-all duration-200" aria-label="TikTok">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Right: Poster Donasi --}}
            <div class="reveal" style="transition-delay: 100ms">
                 {{-- <img src="{{ asset('poster_donasi.webp') }}" alt="Poster Donasi GPS TangSel" class="w-full h-auto rounded-xl object-cover"> --}}
                 <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DajqnO6EqDM/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/DajqnO6EqDM/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/DajqnO6EqDM/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Gerakan Pejuang Subuh Tangerang Selatan (@gps.tangselofficial)</a></p></div></blockquote>
<script async src="//www.instagram.com/embed.js"></script>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        function initCollaboration() {
            const kolabForm = document.getElementById('kolab-form');
            if (!kolabForm) return;

            const kolabSubmit = document.getElementById('kolab-submit');
            const kolabSubmitIcon = document.getElementById('kolab-submit-icon');
            const kolabLoadingIcon = document.getElementById('kolab-loading-icon');
            const kolabSubmitText = document.getElementById('kolab-submit-text');
            const kolabMessage = document.getElementById('kolab-message');
            const captchaQuestion = document.getElementById('captcha-question');
            const btnRefreshCaptcha = document.getElementById('btn-refresh-captcha');
            const captchaInput = document.getElementById('kolab-captcha');

            function refreshCaptcha() {
                fetch('{{ route("kolaborasi.captcha") }}')
                    .then(response => response.json())
                    .then(data => {
                        if (captchaQuestion) {
                            captchaQuestion.textContent = data.question;
                        }
                        if (captchaInput) {
                            captchaInput.value = '';
                        }
                    })
                    .catch(err => console.error('Gagal memuat captcha:', err));
            }

            if (btnRefreshCaptcha) {
                btnRefreshCaptcha.addEventListener('click', refreshCaptcha);
            }

            // Load captcha on load
            refreshCaptcha();

            kolabForm.addEventListener('submit', function (e) {
                e.preventDefault();

                // Clear messages
                kolabMessage.classList.add('hidden');
                kolabMessage.className = 'hidden p-4 rounded-xl text-sm font-medium border';

                // Disable submit button
                kolabSubmit.disabled = true;
                if (kolabSubmitIcon) kolabSubmitIcon.classList.add('hidden');
                if (kolabLoadingIcon) kolabLoadingIcon.classList.remove('hidden');
                if (kolabSubmitText) kolabSubmitText.textContent = 'Mengirim...';

                const formData = new FormData(kolabForm);

                fetch('{{ route("kolaborasi.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json().then(data => ({ status: response.status, body: data })))
                .then(res => {
                    if (res.status === 200 && res.body.success) {
                        kolabMessage.textContent = res.body.message;
                        kolabMessage.classList.add('bg-emerald-50', 'text-emerald-800', 'border-emerald-200');
                        kolabMessage.classList.remove('hidden');
                        kolabForm.reset();
                    } else {
                        let errMsg = res.body.message || 'Terjadi kesalahan. Silakan coba lagi.';
                        if (res.body.errors) {
                            const firstErrKey = Object.keys(res.body.errors)[0];
                            errMsg = res.body.errors[firstErrKey][0];
                        }
                        kolabMessage.textContent = errMsg;
                        kolabMessage.classList.add('bg-rose-50', 'text-rose-800', 'border-rose-200');
                        kolabMessage.classList.remove('hidden');
                    }
                    refreshCaptcha();
                })
                .catch(err => {
                    console.error('Error:', err);
                    kolabMessage.textContent = 'Terjadi kesalahan koneksi. Silakan coba lagi.';
                    kolabMessage.classList.add('bg-rose-50', 'text-rose-800', 'border-rose-200');
                    kolabMessage.classList.remove('hidden');
                })
                .finally(() => {
                    // Re-enable submit button
                    kolabSubmit.disabled = false;
                    if (kolabSubmitIcon) kolabSubmitIcon.classList.remove('hidden');
                    if (kolabLoadingIcon) kolabLoadingIcon.classList.add('hidden');
                    if (kolabSubmitText) kolabSubmitText.textContent = 'Kirim Pesan';
                });
            });
        }

        document.addEventListener('DOMContentLoaded', initCollaboration);
        document.addEventListener('livewire:navigated', initCollaboration);
    </script>
@endpush
