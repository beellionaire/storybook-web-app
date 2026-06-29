<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-slate-900 leading-tight tracking-tight">
                {{ __('Pengaturan Akun') }}
            </h2>
        </div>
    </x-slot>

    <div x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 100)"
        class="py-12 bg-[#FDFBF7] min-h-screen">

        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

                <div x-show="mounted" x-transition:enter="transition ease-out duration-700 delay-100"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="lg:col-span-2 p-6 sm:p-10 bg-white/80 backdrop-blur-xl border border-slate-200/60 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-3xl transition-all duration-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)]">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div x-show="mounted" x-transition:enter="transition ease-out duration-700 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="lg:col-span-1 p-6 sm:p-10 bg-white/80 backdrop-blur-xl border border-slate-200/60 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-3xl transition-all duration-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] flex flex-col justify-center">
                    <div class="w-full">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div x-show="mounted" x-transition:enter="transition ease-out duration-700 delay-500"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="lg:col-span-3 p-6 sm:p-10 bg-gradient-to-r from-red-50/50 via-white to-white border border-red-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-3xl transition-all duration-300">
                    <div class="max-w-3xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>