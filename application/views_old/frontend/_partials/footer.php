<!-- Footer (UPDATED) -->
    <footer class="bg-[#0B112B] text-white">
        <div class="container mx-auto px-6 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Column 1: Logo -->
                <div class="lg:col-span-3">
                     <img src="<?= base_url('uploads/');?>images/profiles/png5.png" alt="Aqualife Logo White" class="h-14 w-auto brightness-0 invert">
                </div>
                
                 <!-- Column 2: Produk Links -->
                <div class="lg:col-span-2">
                     <h4 class="font-bold tracking-wider mb-4 pb-2 border-b-2 border-slate-700 inline-block">PRODUCT</h4>
                    <ul class="space-y-3 mt-4 text-gray-300">
                        <?php 
                            foreach($categories as $key => $categories) 
                            { 
                        ?>
                        <li><a href="<?= base_url();?>frontend/<?= $categories->path;?>" class="hover:text-white transition-colors"><?= $categories->name;?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                
                <!-- Column 3: Aqualife Links -->
                <div class="lg:col-span-2">
                    <h4 class="font-bold tracking-wider mb-4 pb-2 border-b-2 border-slate-700 inline-block">AQUALIFE</h4>
                    <ul class="space-y-3 mt-4 text-gray-300">
                        <li><a href="index.html#about" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Why Aqualife</a></li>
                        <li><a href="index.html#contact" class="hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Column 4: Social & Subscription -->
                 <div class="lg:col-span-5">
                    <h4 class="font-bold tracking-wider mb-4 pb-2 border-b-2 border-slate-700 inline-block">FOLLOW US ON SOCIAL MEDIA!</h4>
                     <div class="flex space-x-3 mt-4">
                        <?php 
                            foreach($companies_sosmed as $key => $companies_sosmed) 
                            { 
                        ?>
                        <a href="<?= $companies_sosmed->account;?>" target="_blank" class="text-gray-300 hover:text-white border border-slate-600 rounded-full p-2 transition-colors"><i data-feather="<?= $companies_sosmed->icon;?>" class="h-5 w-5"></i></a>
                        <?php
                            }
                        ?>
                     </div>
                    <p class="text-gray-400 text-sm my-4">Sign up to unlock 5% off your first order and be the first to learn about exclusive discounts and new products.</p>
                    <form>
                        <div class="flex border border-slate-600 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition-all">
                            <input type="email" placeholder="Enter Your Email" class="w-full bg-transparent text-white px-4 py-2 focus:outline-none">
                            <button class="bg-[#1E293B] hover:bg-blue-600 text-white px-6 py-2 font-semibold transition-colors">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="border-t border-slate-800 mt-12 pt-6 text-left text-gray-500 text-sm">
                <p>&copy; 2025, Aqualife IDN. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Chat Button -->
    <div class="fixed bottom-5 right-5 z-50">
        <button class="bg-blue-600 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-700 transition">
            <i data-feather="message-square" class="h-7 w-7"></i>
        </button>
    </div>


    <script>
        // Initialize Feather Icons
        feather.replace();

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Testimonial Slider Initialization
        const swiper = new Swiper('.testimonial-slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // FAQ Data
        <?php
            foreach ($faq as $faq) 
            { 
        ?> 
        const faqs = [
        
                $data[]=[question => "Apa itu Filtrasi Air?", answer => "Apa itu Filtrasi Air?"];
            
        
        ];
        <?php
            }
        ?>
        // const faqs = [
        //     { question: "Apa itu Filtrasi Air?", answer: "Filtrasi air adalah proses menghilangkan atau mengurangi konsentrasi partikel, termasuk partikel tersuspensi, parasit, bakteri, alga, virus, dan jamur, serta zat terlarut dan biologis lainnya dari air." },
        //     { question: "Apa itu Sistem Filtrasi Air?", answer: "Sistem filtrasi air adalah perangkat atau serangkaian perangkat yang digunakan untuk melakukan filtrasi air. Sistem ini dapat bervariasi dari kendi sederhana hingga sistem seluruh rumah yang kompleks." },
        //     { question: "Sistem Filtrasi Air Terbaik untuk Rumah atau Bisnis Saya?", answer: "Sistem terbaik tergantung pada kualitas air sumber Anda dan kebutuhan spesifik Anda. Hubungi kami untuk konsultasi gratis untuk menentukan solusi yang tepat untuk Anda." },
        //     { question: "Berapa Biaya Sistem Filtrasi Air Rumah?", answer: "Biaya bervariasi tergantung pada jenis dan ukuran sistem. Kami menawarkan berbagai pilihan yang sesuai dengan setiap anggaran, mulai dari unit bawah wastafel yang terjangkau hingga sistem seluruh rumah yang komprehensif." },
        //     { question: "Apa itu Sistem Filtrasi Air Reverse Osmosis (RO)?", answer: "Reverse Osmosis (RO) adalah proses pemurnian air yang menggunakan membran semi-permeabel untuk menghilangkan ion, molekul, dan partikel yang lebih besar dari air minum, menghasilkan air yang sangat murni." },
        //     { question: "Seberapa Sering Saya Harus Mengganti Filter?", answer: "Frekuensi penggantian filter tergantung pada jenis sistem dan tingkat penggunaan air Anda. Umumnya, filter harus diganti setiap 6 hingga 12 bulan. Kami akan memberikan jadwal perawatan khusus untuk sistem Anda." },
        //     { question: "Dapatkah Saya Memasang Sistem Filtrasi Air Sendiri?", answer: "Meskipun beberapa sistem yang lebih sederhana dapat dipasang sendiri, kami merekomendasikan pemasangan profesional untuk sebagian besar sistem untuk memastikan kinerja dan keamanan yang optimal. Tim teknisi kami yang berpengalaman dapat menanganinya untuk Anda." },
        //     { question: "Apakah Air Reverse Osmosis (RO) Aman untuk Diminum Setiap Hari?", answer: "Ya, air RO aman dan sehat untuk diminum setiap hari. Proses ini menghilangkan kontaminan berbahaya, menjadikannya salah satu bentuk air minum terbersih yang tersedia." },
        // ];

        // FAQ Accordion Logic
        const faqContainer = document.getElementById('faq-container');
        faqs.forEach(faq => {
            const faqItem = document.createElement('div');
            faqItem.className = 'border-b border-gray-200 py-4';
            faqItem.innerHTML = `
                <button class="faq-question w-full flex justify-between items-center text-left text-lg font-semibold text-gray-800 focus:outline-none">
                    <span>${faq.question}</span>
                    <span class="faq-arrow transform transition-transform duration-300">
                        <i data-feather="chevron-down" class="h-6 w-6 text-gray-500"></i>
                    </span>
                </button>
                <div class="faq-answer mt-2 text-gray-600">
                    <p class="p-2">${faq.answer}</p>
                </div>
            `;
            faqContainer.appendChild(faqItem);
        });

        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                button.classList.toggle('active');

                if (answer.style.maxHeight) {
                    answer.style.maxHeight = null;
                } else {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                }
            });
        });

        // Consultation Form Stepper Logic
        document.addEventListener('DOMContentLoaded', () => {
            const prevButton = document.getElementById('prev-step');
            const nextButton = document.getElementById('next-step');
            const submitButton = document.getElementById('submit-form');
            const formSteps = document.querySelectorAll('[data-step]');
            const stepperItems = document.querySelectorAll('.stepper-item');
            let currentStep = 1;

            const showStep = (stepNumber) => {
                formSteps.forEach(step => {
                    step.classList.toggle('hidden', parseInt(step.dataset.step) !== stepNumber);
                });
                
                stepperItems.forEach((item, index) => {
                    item.classList.toggle('active', (index + 1) <= stepNumber);
                });

                prevButton.classList.toggle('hidden', stepNumber === 1);
                nextButton.classList.toggle('hidden', stepNumber === formSteps.length);
                submitButton.classList.toggle('hidden', stepNumber !== formSteps.length);
            };
            
            nextButton.addEventListener('click', () => {
                 // Simple validation
                const currentFormStep = document.querySelector(`[data-step="${currentStep}"]`);
                const inputs = currentFormStep.querySelectorAll('input[required]');
                let isValid = true;
                inputs.forEach(input => {
                    if (!input.value) {
                        isValid = false;
                        input.classList.add('border-red-500');
                    } else {
                        input.classList.remove('border-red-500');
                    }
                });

                if (isValid && currentStep < formSteps.length) {
                    currentStep++;
                    if (currentStep === formSteps.length) {
                       // Populate confirmation details
                       const confirmationDetails = document.getElementById('confirmation-details');
                       const formData = new FormData(document.getElementById('consultation-form'));
                       let detailsHtml = '';
                       for(let [key, value] of formData.entries()) {
                           if(value) {
                               detailsHtml += `<p><strong class="capitalize">${key.replace(/-/g, ' ')}:</strong> ${value}</p>`;
                           }
                       }
                       confirmationDetails.innerHTML = detailsHtml;
                    }
                    showStep(currentStep);
                }
            });

            prevButton.addEventListener('click', () => {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);
        });
        
        // Re-run feather.replace() after dynamic content is added
        feather.replace();

    </script>
</body>
</html>
