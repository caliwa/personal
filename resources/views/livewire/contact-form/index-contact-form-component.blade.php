@assets
<head>
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes slideIn {
            0% { transform: translateX(-100%); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse 8s ease-in-out infinite;
        }
        
        .animate-slide-in {
            animation: slideIn 0.8s ease-out forwards;
        }
        
        .animate-fade-in {
            animation: fadeIn 1.2s ease-out forwards;
        }
        
        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }
        
        .cursor {
            display: inline-block;
            width: 3px;
            height: 1em;
            background-color: black;
            margin-left: 2px;
            animation: blink 1s step-end infinite;
        }
        
        @keyframes blink {
            from, to { opacity: 1; }
            50% { opacity: 0; }
        }
        
        input:focus, textarea:focus, select:focus {
            outline: none;
            box-shadow: 4px 4px 0 rgba(0, 0, 0, 1);
        }
        
        .form-control {
            transition: all 0.3s ease;
        }
        
        .form-control:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
@endassets
<div x-data="{
    formData: {
        name: '',
        email: '',
        phone: '',
        address: '',
        birthdate: '',
        gender: '',
        comments: '',
        interests: []
    },
    errors: {},
    formSubmitted: false,
    
    validateForm() {
        this.errors = {};
        let valid = true;
        
        if (!this.formData.name) {
            this.errors.name = 'Name is required';
            valid = false;
        }
        
        if (!this.formData.email) {
            this.errors.email = 'Email is required';
            valid = false;
        } else if (!/^\S+@\S+\.\S+$/.test(this.formData.email)) {
            this.errors.email = 'Email is invalid';
            valid = false;
        }
        
        return valid;
    },
    
    submitForm() {
        if (this.validateForm()) {
            // Here you would typically send the data to a server
            console.log('Form submitted:', this.formData);
            this.formSubmitted = true;
        }
    }
}">

    <!-- Success Message -->
    <section 
        x-show="formSubmitted" 
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        class="py-16 md:py-24 px-6 md:px-12 border-b-4 border-black bg-[#06D6A0]"
    >
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block w-24 h-24 bg-white border-4 border-black mb-8 relative animate-pulse-slow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                THANK YOU!
            </h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Your information has been submitted successfully.
            </p>
            <a 
                href="#" 
                class="inline-block px-8 py-4 bg-black text-white border-4 border-black font-bold text-lg transform transition hover:-translate-y-1 hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,0.2)]"
            >
                BACK TO HOME
            </a>
        </div>
    </section>

    <!-- Data Capture Form -->
    <section class="py-16 md:py-24 px-6 md:px-12" x-show="!formSubmitted">
        <div class="max-w-4xl mx-auto">
            <form 
                id="data-form" 
                @submit.prevent="submitForm()" 
                class="border-4 border-black p-8 bg-white"
            >
                <h2 class="text-2xl md:text-3xl font-bold mb-8 border-b-4 border-black pb-4">Personal Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <label class="block font-bold mb-2">Full Name *</label>
                        <input 
                            type="text" 
                            x-model="formData.name" 
                            class="w-full px-4 py-3 border-4 border-black form-control"
                            :class="{'border-red-500': errors.name}"
                            placeholder="John Doe"
                        >
                        <p x-show="errors.name" x-text="errors.name" class="text-red-500 mt-1"></p>
                    </div>
                    
                    <div>
                        <label class="block font-bold mb-2">Email Address *</label>
                        <input 
                            type="email" 
                            x-model="formData.email" 
                            class="w-full px-4 py-3 border-4 border-black form-control"
                            :class="{'border-red-500': errors.email}"
                            placeholder="example@domain.com"
                        >
                        <p x-show="errors.email" x-text="errors.email" class="text-red-500 mt-1"></p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <label class="block font-bold mb-2">Phone Number</label>
                        <input 
                            type="tel" 
                            x-model="formData.phone" 
                            class="w-full px-4 py-3 border-4 border-black form-control"
                            placeholder="(123) 456-7890"
                        >
                    </div>
                    
                    <div>
                        <label class="block font-bold mb-2">Date of Birth</label>
                        <input 
                            type="date" 
                            x-model="formData.birthdate" 
                            class="w-full px-4 py-3 border-4 border-black form-control"
                        >
                    </div>
                </div>
                
                <div class="mb-8">
                    <label class="block font-bold mb-2">Address</label>
                    <input 
                        type="text" 
                        x-model="formData.address" 
                        class="w-full px-4 py-3 border-4 border-black form-control"
                        placeholder="123 Main St, City, Country"
                    >
                </div>
                
                <div class="mb-8">
                    <label class="block font-bold mb-2">Gender</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" x-model="formData.gender" value="male" class="form-radio border-2 border-black h-5 w-5">
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" x-model="formData.gender" value="female" class="form-radio border-2 border-black h-5 w-5">
                            <span class="ml-2">Female</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" x-model="formData.gender" value="other" class="form-radio border-2 border-black h-5 w-5">
                            <span class="ml-2">Other</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" x-model="formData.gender" value="prefer-not-to-say" class="form-radio border-2 border-black h-5 w-5">
                            <span class="ml-2">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                
                <div class="mb-8">
                    <label class="block font-bold mb-2">Interests (Select all that apply)</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="formData.interests" value="technology" class="form-checkbox border-2 border-black h-5 w-5">
                            <span class="ml-2">Technology</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="formData.interests" value="sports" class="form-checkbox border-2 border-black h-5 w-5">
                            <span class="ml-2">Sports</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="formData.interests" value="music" class="form-checkbox border-2 border-black h-5 w-5">
                            <span class="ml-2">Music</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="formData.interests" value="travel" class="form-checkbox border-2 border-black h-5 w-5">
                            <span class="ml-2">Travel</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="formData.interests" value="reading" class="form-checkbox border-2 border-black h-5 w-5">
                            <span class="ml-2">Reading</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="formData.interests" value="cooking" class="form-checkbox border-2 border-black h-5 w-5">
                            <span class="ml-2">Cooking</span>
                        </label>
                    </div>
                </div>
                
                <div class="mb-8">
                    <label class="block font-bold mb-2">Additional Comments</label>
                    <textarea 
                        x-model="formData.comments" 
                        rows="4" 
                        class="w-full px-4 py-3 border-4 border-black form-control"
                        placeholder="Any additional information you'd like to share..."
                    ></textarea>
                </div>
                
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        * Required fields
                    </div>
                    <button 
                        type="submit" 
                        class="px-8 py-4 bg-[#06D6A0] text-white border-4 border-black font-bold text-lg transform transition hover:-translate-y-1 hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,0.2)]"
                    >
                        SUBMIT FORM
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>