@extends('layouts.master')
@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 max-w-3xl mx-auto">
        @include('user.company.contents')
        <div class="container mx-auto p-6">
            <form method="POST" action="{{ route('company.stores') }}">
                @csrf
                <input type="hidden" name="step" value="step3">
                <!-- Step 3: Company Address -->
                <!-- Checkbox to auto-fill Step 2 details -->
                <div class="mb-6 flex items-center justify-start">
                 <input type="checkbox" name="copystep2data" id="copyStep2Data" class="w-4 h-4 text-gray-800 bg-gray-100 border-gray-300 focus:ring-orange-500 focus:ring-2">
                 <label for="copyStep2Data" class="ml-2 text-sm font-medium text-gray-900">Same address as office?</label>
             </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-6">
                        <label for="houseownername" class="block mb-2 text-sm font-medium text-gray-900">House Owner Name</label>
                        <input type="text" name="houseownername" id="houseownername" value="{{ old('houseownername', $company->houseownername ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownertole" class="block mb-2 text-sm font-medium text-gray-900">Tole</label>
                        <input type="text" name="hotole" id="hotole" value="{{ old('hotole', $company->hotole ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownermunicipality" class="block mb-2 text-sm font-medium text-gray-900">Municipality</label>
                        <input type="text" name="homunicipality" id="homunicipality"
                            value="{{ old('homunicipality', $company->homunicipality ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownerward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
                        <input type="text" name="howard" id="howard" value="{{ old('howard', $company->howard ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownerdistrict" class="block mb-2 text-sm font-medium text-gray-900">District</label>
                        <input type="text" name="hodistrict" id="hodistrict"
                            value="{{ old('hodistrict', $company->hodistrict ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownerprovince" class="block mb-2 text-sm font-medium text-gray-900">Province</label>
                        <input type="text" name="hoprovince" id="hoprovince"
                            value="{{ old('hoprovince', $company->hoprovince ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="houseownerphone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                        <input type="tel" name="hophone" id="hophone"
                            value="{{ old('hophone', $company->hophone ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="hopan" class="block mb-2 text-sm font-medium text-gray-900">House Owner PAN</label>
                        <input type="text" name="hopan" id="hopan"
                            value="{{ old('hopan', $company->hopan ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                    </div>
                </div>

                <!-- Button Section -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('user.company.step2') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const copyStep2Checkbox = document.getElementById('copyStep2Data');
        const toleField = document.getElementById('hotole');
        const municipalityField = document.getElementById('homunicipality');
        const wardField = document.getElementById('howard');
        const provinceField = document.getElementById('hoprovince');
        const districtField = document.getElementById('hodistrict');
    
        copyStep2Checkbox.addEventListener('change', function () {
            if (copyStep2Checkbox.checked) {
                // Copy data from Step 2 to Step 3
                toleField.value = "{{ old('tole', $company->tole ?? '') }}";
                municipalityField.value = "{{ old('municipality', $company->municipality ?? '') }}";
                wardField.value = "{{ old('ward', $company->ward ?? '') }}";
                provinceField.value = "{{ old('province', $company->province ?? '') }}";
                districtField.value = "{{ old('district', $company->district ?? '') }}";
            } else {
                // Clear the fields if unchecked
                toleField.value = '';
                municipalityField.value = '';
                wardField.value = '';
                provinceField.value = '';
                districtField.value = '';
            }
        });
    </script>

@endsection
