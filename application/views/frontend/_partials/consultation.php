<form id="footer-consultation-form" class="consultation-form" action="<?= base_url("frontend/Index/simpan_ajax");?>" method="post">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Name -->
        <div>
            <label for="footer-your-name" class="hidden">Name*</label>
            <input type="text" name="your-name" id="your-name" placeholder="Name*" required class="w-full bg-slate-800 border-slate-600 text-white px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder:text-gray-400">
        </div>
        <!-- Location/Address -->
            <div>
            <label for="footer-address" class="hidden">Location*</label>
            <input type="text" name="address" id="address" placeholder="Location*" required class="w-full bg-slate-800 border-slate-600 text-white px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder:text-gray-400">
        </div>
        <!-- Email -->
        <div>
            <label for="footer-email" class="hidden">Email Address*</label>
            <input type="email" name="email" id="email" placeholder="Email Address*" required class="w-full bg-slate-800 border-slate-600 text-white px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder:text-gray-400">
        </div>
        <!-- Phone -->
        <div>
            <label for="footer-phone-number" class="hidden">Phone Number*</label>
            <input type="tel" name="phone-number" id="phone-number" placeholder="Phone Number*" required class="w-full bg-slate-800 border-slate-600 text-white px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder:text-gray-400">
        </div>
    </div>

    <!-- Options -->
    <div class="mt-4">
            <label for="footer-masalah" class="block text-sm font-medium text-gray-300 mb-1">What concerns do you have about your water quality?*</label>
            <select id="masalah" name="masalah" class="block w-full bg-slate-800 border-slate-600 text-white px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option>Bad Taste or Smell</option>
            <option>Cloudiness or Discoloration</option>
            <option>Hard Water / Scale Buildup</option>
            <option>Health Concerns (Bacteria, etc.)</option>
            <option>Not Sure</option>
        </select>
    </div>
    
    <div class="mt-4">
        <p class="block text-sm font-medium text-gray-300 mb-2">Which Product are you interested in? (optional)</p>
        <!-- <div class="space-y-2 text-sm">
            <label class="flex items-center text-gray-300"><input type="radio" name="wt" value="2" class="h-4 w-4 text-blue-600 bg-slate-700 border-slate-600 rounded focus:ring-blue-500 mr-2">Water Treatment Plant</label>
            <label class="flex items-center text-gray-300"><input type="radio" name="ws" value="3" class="h-4 w-4 text-blue-600 bg-slate-700 border-slate-600 rounded focus:ring-blue-500 mr-2">Water Softener</label>
            <label class="flex items-center text-gray-300"><input type="radio" name="dw" value="4" class="h-4 w-4 text-blue-600 bg-slate-700 border-slate-600 rounded focus:ring-blue-500 mr-2">RO-Drinking Water</label>
        </div> -->
        <div class="space-y-2 text-sm">
            <input type="radio" name="type" value="2"> Water Treatment Plant<br>
            <input type="radio" name="type" value="3"> Water Softener<br>
            <input type="radio" name="type" value="4"> RO-Drinking Water<br>
        </div>
    </div>
    
    <!-- Submit Button -->
    <div class="mt-6">
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 font-semibold transition-colors rounded-md">SUBMIT</button>
    </div>
</form>