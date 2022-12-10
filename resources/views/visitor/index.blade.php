<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Visitor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Add a Visitor') }}
                    @if (session('status'))
                    <div class="p-4 bg-green-50 text-green-900 border-green-200 border rounded-sm">
                        <p>{{ session('status') }}</p>
                    </div>
                    @endif
                    <form action="{{ route('saveuser') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mt-4">
                                <x-input-label for="fullname" :value="__('Full Name')" />
                                <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname"
                                    :value="old('fullname')" required autofocus />
                                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="mobile" :value="__('Mobile Number')" />
                                <x-text-input id="mobile" class="block mt-1 w-full" type="number" name="mobile"
                                    :value="old('mobile')" required min="0" />
                                <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="gender" :value="__('Gender')" />
                                <select id="gender" name="gender" class="block mt-1 w-full" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="addr1" :value="__('Address')" />
                                <x-text-input id="addr1" class="block mt-1 w-full" type="text" name="addr1"
                                    :value="old('addr1')" required />
                                <x-input-error :messages="$errors->get('addr1')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="extra" :value="__('Extra Persons')" />
                                <x-text-input id="extra" class="block mt-1 w-full" type="number" name="extra"
                                    :value="old('extra')" required min="0" />
                                <x-input-error :messages="$errors->get('extra')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-primary-button class="ml-3 mt-7">
                                    {{ __('Save User') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
