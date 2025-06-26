@section('title', 'Buat Akun')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9 flex flex-col items-center gap-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-20 h-20 text-sky-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
            </svg>
            Buat Akun
        </h2>

        @if (Route::has('register'))
        <p class="mt-2 text-sm text-center text-gray-600 leading-5">
            Atau
            <a href="{{ route('login') }}"
                class="font-medium text-sky-600 hover:text-sky-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                Klik di sini untuk Login
            </a>
        </p>
        @endif
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 leading-5">
                        Name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="name" id="name" type="text" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="Bagian" class="block text-sm font-medium text-gray-700 leading-5">
                        Bagian
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <select
                            wire:model.lazy="Bagian"
                            id="Bagian"
                            required
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('Bagian') border-red-300 text-red-900 focus:border-red-300 focus:ring-red @enderror">
                            <option value="">-- Pilih Bagian --</option>
                            <option value="KK1A">KK1A</option>
                            <option value="KK1B">KK1B</option>
                            <option value="KK2A">KK2A</option>
                            <option value="KK2B">KK2B</option>
                            <option value="KK5G">KK5G</option>
                            <option value="KK7K">KK7K</option>
                            <option value="KK7L">KK7L</option>
                            <option value="KK8D">KK8D</option>
                            <option value="KK8J">KK8J</option>
                            <option value="KK9D">KK9D</option>
                            <option value="KK11M">KK11M</option>
                            <option value="PPC">PPC</option>
                            <option value="GBN">GBN</option>
                            <option value="SAMPLE">SAMPLE</option>
                            <option value="BP">BP</option>
                            <option value="USER">USER</option>
                            <option value="IT">IT</option>
                            <option value="FOLL UP">FOLL UP</option>
                            <option value="Packing">Packing</option>
                            <option value="CELUPAN">CELUPAN</option>
                            <option value="COVERING">COVERING</option>
                            <!-- Tambahkan bagian lain sesuai kebutuhan -->
                        </select>
                    </div>

                    @error('Bagian')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" placeholder="nama@kh.tex" />
                    </div>

                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 leading-5">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 appearance-none rounded-md focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-sky-600 border border-transparent rounded-md hover:bg-sky-500 focus:outline-none focus:border-sky-700 focus:ring-sky active:bg-sky-700 transition duration-150 ease-in-out">
                            Register
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>