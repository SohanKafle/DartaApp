@extends('layouts.master')
@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-10 min-w-full mx-auto">
        @include('user.shareholder.contents')
        <div class="container mx-auto p-6">
            <form method="POST" action="{{ route('user.shareholder.step4.update',$userDetail->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="step" value="step4">
                <!-- Step 1: Company Info -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="mb-6">
                        <label for="citizennumber" class="block mb-2 text-sm font-medium text-gray-900">Citizenship
                            No:</label>
                        <input type="text" name="citizennumber" id="citizennumber"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('citizennumber', $userDetail->citizennumber ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="issuedate" class="block mb-2 text-sm font-medium text-gray-900">Issued
                            Date</label>
                        <input type="date" name="issuedate" id="issuedate"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('issuedate', $userDetail->issuedate ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="issuedplace" class="block mb-2 text-sm font-medium text-gray-900">Issued
                            Place</label>
                        <input type="text" name="issuedplace" id="issuedplace"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('issuedplace', $userDetail->issuedplace ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="notarized" class="block mb-2 text-sm font-medium text-gray-900">Notarized</label>
                        <select name="notarized" id="notarized"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                            <option value="yes"
                                {{ old('notarized', $userDetail->notarized ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no"
                                {{ old('notarized', $userDetail->notarized ?? '') == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="fathername" class="block mb-2 text-sm font-medium text-gray-900">Father
                            Name</label>
                        <input type="text" name="fathername" id="fathername"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('fathername', $userDetail->fathername ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="mothername" class="block mb-2 text-sm font-medium text-gray-900">Mother
                            Name</label>
                        <input type="text" name="mothername" id="mothername"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('mothername', $userDetail->mothername ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="spousename" class="block mb-2 text-sm font-medium text-gray-900">Spouse
                            Name</label>
                        <input type="text" name="spousename" id="spousename"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('spousename', $userDetail->spousename ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="grandfathername" class="block mb-2 text-sm font-medium text-gray-900">Grand
                            Father Name</label>
                        <input type="text" name="grandfathername" id="grandfathername"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('grandfathername', $userDetail->grandfathername ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900">Contact
                            No:</label>
                        <input type="tel" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('phone', $userDetail->phone ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900">Optional
                            No:</label>
                        <input type="tel" name="optphone" id="optphone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('optphone', $userDetail->optphone ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('email', $userDetail->email ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="optemail" class="block mb-2 text-sm font-medium text-gray-900">Optional
                            Email</label>
                        <input type="email" name="optemail" id="optemail"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('optemail', $userDetail->optemail ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="pan" class="block mb-2 text-sm font-medium text-gray-900">Personal
                            PAN</label>
                        <input type="text" name="pan" id="pan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('pan', $userDetail->pan ?? '') }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="nid" class="block mb-2 text-sm font-medium text-gray-900">National
                            ID</label>
                        <input type="text" name="nid" id="nid"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            value="{{ old('nid', $userDetail->nid ?? '') }}" required>
                    </div>
                </div>
                <!-- Button Section -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('user.shareholder.step3',$userDetail->id) }}"
                        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
                </div>
            </form>
        </div>
    </div>
@endsection
