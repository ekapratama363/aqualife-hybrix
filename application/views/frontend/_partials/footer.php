<!-- Footer (UPDATED) -->
<footer id="contact" class="bg-[#0B112B] text-white">
    <div class="container mx-auto px-6 pt-16 pb-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-10 lg:gap-x-8">
            
            <!-- Column 1: Connect with Us -->
            <div class="lg:col-span-3">
                 <h4 class="font-bold tracking-wider mb-4 pb-2 border-b-2 border-slate-700 inline-block">Connect with Us!</h4>
                 <div class="flex space-x-3 mt-4">
                    <?php 
                        if(isset($companies_sosmed) && is_array($companies_sosmed)) {
                            foreach($companies_sosmed as $key => $social) { 
                    ?>
                    <a href="<?= $social->account;?>" target="_blank" class="text-gray-300 hover:text-white border border-slate-600 rounded-full p-2 transition-colors"><i data-feather="<?= $social->icon;?>" class="h-5 w-5"></i></a>
                    <?php
                            }
                        }
                    ?>
                 </div>
            </div>
            
             <!-- Column 2: Produk Links -->
            <div class="lg:col-span-2">
                 <h4 class="font-bold tracking-wider mb-4 pb-2 border-b-2 border-slate-700 inline-block">PRODUCT</h4>
                <ul class="space-y-3 mt-4 text-gray-300">
                    <?php 
                        if(isset($categories) && is_array($categories)) {
                            foreach($categories as $key => $category) {
                    ?>
                    <li><a href="<?= base_url();?>frontend/<?= $category->path;?>" class="hover:text-white transition-colors"><?= $category->name;?></a></li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
            
            <!-- Column 3: Aqualife Links -->
            <div class="lg:col-span-2">
                <h4 class="font-bold tracking-wider mb-4 pb-2 border-b-2 border-slate-700 inline-block">AQUALIFE</h4>
                <ul class="space-y-3 mt-4 text-gray-300">
                    <li><a href="#about" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="<?= base_url();?>frontend/Index#faq" class="hover:text-white transition-colors">FAQs</a></li>
                    <li><a href="https://api.whatsapp.com/send?phone=087733000333" target="_blank" class="hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact Form (NEW LAYOUT) -->
             <div class="lg:col-span-5">
                <h4 class="font-bold tracking-wider mb-1">Contact Us</h4>
                <p class="text-gray-400 text-sm mb-4">Have a Water Problem? <span class="text-gray-500 text-xs">Fields marked * are required fields.</span></p>
                
                <?php $this->load->view('frontend/_partials/consultation'); ?>
            </div>
        </div>
        
        <!-- Bottom Bar: Logo and Copyright -->
        <div class="border-t border-slate-800 mt-12 pt-6 flex flex-col sm:flex-row items-center justify-between">
             <img src="<?= base_url('uploads/');?>images/profiles/png5.png" alt="Aqualife Logo White" class="h-10 w-auto brightness-0 invert mb-4 sm:mb-0">
            <p class="text-gray-500 text-sm">&copy; 2025, Aqualife IDN. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Floating Chat Button -->
<?php
    $query = $this->db->query("SELECT * FROM abouts LIMIT 1");
    if ($query->num_rows() > 0) 
    {
        $data = $query->row_array();
?>
<div class="fixed bottom-5 right-5 z-50">
    <a href="https://api.whatsapp.com/send?phone=<?php echo $data['phone']; ?>" target="_blank">
        <!-- <button class="bg-blue-600 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-700 transition">
            <i data-feather="message-square" class="h-7 w-7"></i>
        </button> -->
        <img src="<?= base_url('uploads/');?>images/wa.png" alt="WA Logo" width="50">
    </a>
</div>
<?php 
    }
?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    // Ensure feather icons are replaced
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
</script>

<!-- <script>
    // Universal AJAX handler for all consultation forms
    $(document).ready(function() {
        // Using a class selector to target both forms
        $(document).on("submit", ".consultation-form", function(e) {
            e.preventDefault(); // Prevent the default form submission

            var form = $(this);

            $.ajax({
                url: form.attr('action'), // Get the URL from the form's action attribute
                type: "POST",
                data: form.serialize(), // Serialize the form data for submission
                cache: false,
                success: function(dataResult) {
                    try {
                        var result = JSON.parse(dataResult);
                        if (result.statusCode == 200) {
                            alert('Pengajuan berhasil dikirim!');
                            // Redirect after successful submission
                            window.location.href = '<?= base_url("frontend/Index") ?>';
                        } else {
                            // Handle server-side errors (e.g., validation)
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    } catch (error) {
                        console.error("Error parsing JSON response: ", dataResult);
                        alert('Ada masalah dengan respons dari server.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error: ", textStatus, errorThrown);
                    alert('Gagal mengirim formulir. Periksa koneksi Anda dan coba lagi.');
                }
            });
        });
    });
</script> -->
</body>
</html>

