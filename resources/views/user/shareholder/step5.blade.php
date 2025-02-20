@extends('layouts.master')
@section('content')

<div class="bg-white rounded-lg shadow-lg p-6 md:p-10 min-w-full mx-auto">
    @include('user.shareholder.contents')
    <div class="container mx-auto p-6">
    <form method="POST" action="{{ route('user.shareholder.step5.update',$userDetail->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="step" value="step5">
        <!-- Step 1: Company Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                            <div class="mb-6">
                                <label for="shareamount" class="block mb-2 text-sm font-medium text-gray-900">Share
                                    Amount</label>
                                <input type="text" name="shareamt" id="shareamt"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('shareamt', $userDetail->shareamt ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="shareno" class="block mb-2 text-sm font-medium text-gray-900">Share
                                    No:</label>
                                <input type="text" name="shareno" id="shareno"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('shareno', $userDetail->shareno ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="sharefrom" class="block mb-2 text-sm font-medium text-gray-900">From:</label>
                                <input type="text" name="sharefrom" id="sharefrom"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('sharefrom', $userDetail->sharefrom ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="shareto" class="block mb-2 text-sm font-medium text-gray-900">To:</label>
                                <input type="text" name="shareto" id="shareto"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('shareto', $userDetail->shareto ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="totalshare"
                                    class="block mb-2 text-sm font-medium text-gray-900">Total:</label>
                                <input type="text" name="totalshare" id="totalshare"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('totalshare', $userDetail->totalshare ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="addshare" class="block mb-2 text-sm font-medium text-gray-900">Additional
                                    Share</label>
                                <input type="text" name="addshare" id="addshare"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('addshare', $userDetail->addshare ?? '') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="salesofshare" class="block mb-2 text-sm font-medium text-gray-900">Sales of
                                    Share</label>
                                <input type="text" name="salesofshare" id="salesofshare"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('salesofshare', $userDetail->salesofshare ?? '') }}" required>
                            </div>

                        </div>
                        <!-- Lawyer Details Section (on new line) -->
                        <div class="w-full mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Lawyer Details</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="w-full mb-6">
                                <label for="lawyerid" class="block mb-2 text-sm font-medium text-gray-900">Lawyer
                                    Id:</label>
                                <input type="text" name="lawyerid" id="lawyerid"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lawyerid', $userDetail->lawyerid ?? '') }}" required>
                            </div>
                            <div class="w-full mb-6">
                                <label for="lawyername" class="block mb-2 text-sm font-medium text-gray-900">Lawyer
                                    Name</label>
                                <input type="text" name="lawyername" id="lawyername"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lawyername', $userDetail->lawyername ?? '') }}" required>
                            </div>
                            <div class="w-full mb-6">
                                <label for="lawyerphone" class="block mb-2 text-sm font-medium text-gray-900">Lawyer
                                    Phone</label>
                                <input type="tel" name="lawyerphone" id="lawyerphone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lawyerphone', $userDetail->lawyerphone ?? '') }}" required>
                            </div>
                            <div class="w-full mb-6">
                                <label for="lawyeridvalid" class="block mb-2 text-sm font-medium text-gray-900">Id
                                    Valid till:</label>
                                <input type="date" name="lawyeridvalid" id="lawyeridvalid"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                    value="{{ old('lawyeridvalid', $userDetail->lawyeridvalid ?? '') }}" required>
                            </div>

                        </div>
 <!-- Button Section -->
 <div class="flex justify-between mt-6">
    <a href="{{ route('user.shareholder.step4',$userDetail->id) }}"
        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 focus:outline-none focus:shadow-outline">Previous</a>
    <button type="submit"
        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline">Next</button>
</div>
    </form>
</div>
</div>
@endsection
