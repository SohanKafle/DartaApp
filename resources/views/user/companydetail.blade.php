@extends('layouts.master')
@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 max-w-3xl mx-auto">
            <h1 class="text-3xl font-bold text-center mb-8">Company Details</h1>

            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="mb-8">
                    <div class="flex justify-between mb-2">
                        <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200"
                            id="step1">
                            Company Details
                        </span>
                        <span
                            class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50"
                            id="step2">
                            Office Address
                        </span>
                        <span
                            class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50"
                            id="step3">
                            Company Bank Details
                        </span>
                        <span
                            class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-orange-200 opacity-50"
                            id="step4">
                            OCR/IRD Details
                        </span>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-orange-200">
                        <div id="progress-bar"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500 w-1/3 transition-all duration-500 ease-in-out">
                        </div>
                    </div>
                </div>

                <!-- Form Steps -->
                <form id="multi-step-form" action="{{ route('company.store') }}" method="post">
                    @csrf
                    <!-- Step 1: Company Details -->
                    <div id="step-1" class="step">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900">Company
                                    Name</label>
                                <input id="company_name" value="{{ $user->companyname }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" readonly>
                            </div>
                            <div class="mb-6">
                                <label for="registration_no"
                                    class="block mb-2 text-sm font-medium text-gray-900">Registration No:</label>
                                <input type="text" name="regno" id="registration_no"
                                    value="{{ old('regno', $company->regno ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="registration_date"
                                    class="block mb-2 text-sm font-medium text-gray-900">Registration Date</label>
                                <input type="date" name="regdate" id="registration_date"
                                    value="{{ old('regdate', $company->regdate ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                <input id="category" value="{{ $user->type }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" readonly>
                            </div>
                            <div class="mb-6">
                                <label for="pan_no" class="block mb-2 text-sm font-medium text-gray-900">PAN
                                    No:</label>
                                <input type="text" name="pan" id="pan_no" value="{{ old('pan', $company->pan ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="registration_date"
                                    class="block mb-2 text-sm font-medium text-gray-900">Registration Date</label>
                                <input type="date" name="panregdate" id="registration_date"
                                    value="{{ old('panregdate', $company->panregdate ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="vat_pan"
                                    class="block mb-2 text-sm font-medium text-gray-900">VAT/PAN</label>
                                <input type="text" name="vat" id="vat_pan" value="{{ old('vat', $company->vat ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Office Address -->
                    <div id="step-2" class="step hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="tole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                                <input type="text" name="tole" id="tole" value="{{ old('tole', $company->tole ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="municipality"
                                    class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                                <input type="text" name="municipality" id="municipality"
                                    value="{{ old('municipality', $company->municipality ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                                <input type="number" name="ward" id="ward"
                                    value="{{ old('ward', $company->ward ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="district"
                                    class="block mb-2 text-sm font-medium text-gray-900">District</label>
                                <input type="text" name="district" id="district"
                                    value="{{ old('district', $company->district ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="province"
                                    class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                                <input type="text" name="province" id="province"
                                    value="{{ old('province', $company->province ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Official
                                    Phone</label>
                                <input type="tel" name="phone" id="phone"
                                    value="{{ old('phone', $company->phone ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="oemail" id="email"
                                    value="{{ old('oemail', $company->oemail ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Company Bank Details -->
                    <div id="step-3" class="step hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="account_number" class="block mb-2 text-sm font-medium text-gray-900">Account
                                    Number</label>
                                <input type="text" name="accno" id="account_number"
                                    value="{{ old('accno', $company->accno ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900">Bank
                                    Name</label>
                                <input type="text" name="bankname" id="bank_name"
                                    value="{{ old('bankname', $company->bankname ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="branch" class="block mb-2 text-sm font-medium text-gray-900">Branch</label>
                                <input type="text" name="bankbranch" id="branch"
                                    value="{{ old('bankbranch', $company->bankbranch ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="signature"
                                    class="block mb-2 text-sm font-medium text-gray-900">Signature</label>
                                <input type="text" name="signature" id="signature"
                                    value="{{ old('signature', $company->signature ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="opened_on" class="block mb-2 text-sm font-medium text-gray-900">Opened
                                    on:</label>
                                <input type="date" name="created" id="opened_on"
                                    value="{{ old('created', $company->created ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: OCR/IRD Login Details -->
                    <div id="step-4" class="step hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="cid"
                                    class="block mb-2 text-sm font-medium text-gray-900">ID:</label>
                                <input type="text" name="cid" id="cid"
                                    value="{{ old('cid', $company->cid ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="cpassword"
                                    class="block mb-2 text-sm font-medium text-gray-900">Password:</label>
                                <input type="text" name="cpassword" id="cpassword"
                                    value="{{ old('cpassword', $company->cpassword ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>
                        <!-- RID Details Section (on new line) -->
                        <div class="w-full mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">RID Login Details</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="rid"
                                    class="block mb-2 text-sm font-medium text-gray-900">ID:</label>
                                <input type="text" name="rid" id="rid"
                                    value="{{ old('rid', $company->rid ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="rpassword"
                                    class="block mb-2 text-sm font-medium text-gray-900">Password:</label>
                                <input type="text" name="rpassword" id="rpassword"
                                    value="{{ old('rpassword', $company->rpassword ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
                                <input type="email" name="remail" id="remail"
                                    value="{{ old('remail', $company->remail ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900">Phone:</label>
                                <input type="tel" name="rphone" id="rphone"
                                    value="{{ old('rphone', $company->rphone ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="contactperson"
                                    class="block mb-2 text-sm font-medium text-gray-900">Contact Person:</label>
                                <input type="text" name="rcontactperson" id="rcontactperson"
                                    value="{{ old('rcontactperson', $company->rcontactperson ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    required>
                            </div>

                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between mt-8">
                        <button type="button" id="prevBtn"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline hidden">Previous</button>
                        <button type="button" id="nextBtn"
                            class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                        <button type="submit" id="submitBtn"
                            class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline hidden">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const form = document.getElementById('multi-step-form');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const progressBar = document.getElementById('progress-bar');

        function showStep(step) {
            // Hide all steps and show the current one
            document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
            document.getElementById(`step-${step}`).classList.remove('hidden');

            // Update progress bar width
            progressBar.style.width = `${(step / 4) * 100}%`;

            // Update step indicators' opacity
            for (let i = 1; i <= 4; i++) {
                const stepIndicator = document.getElementById(`step${i}`);
                if (i <= step) {
                    stepIndicator.classList.remove('opacity-50');
                } else {
                    stepIndicator.classList.add('opacity-50');
                }
            }

            // Toggle visibility of buttons based on step
            prevBtn.classList.toggle('hidden', step === 1);
            nextBtn.classList.toggle('hidden', step === 4);
            submitBtn.classList.toggle('hidden', step !== 4);
        }

        function validateStep(step) {
            const currentStepElement = document.getElementById(`step-${step}`);
            const inputs = currentStepElement.querySelectorAll('input[required], select[required]');
            let isValid = true;

            // Validate each required input field
            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    input.classList.add('border-red-500');
                    console.log(`Field ${input.id} is invalid`);
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            return isValid;
        }

        nextBtn.addEventListener('click', () => {
            console.log('Next button clicked');
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            } else {
                console.log('Validation failed');
            }
        });

        prevBtn.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });


        showStep(currentStep);

    </script>
    @endsection