<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Customer') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('user.edit.customer.post', $customer->id) }}" method="POST">
                        @csrf
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Name
                            <input type="hidden" class="grow" name="users_id" id="users_id"
                                value="{{ auth()->user()->id }}" />
                            <input type="text" class="grow" placeholder="Your Name" name="name" id="name"
                                value="{{ $customer->name }}" />
                        </label>
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Email
                            <input type="text" class="grow" placeholder="Your Email" name="email" id="email"
                                value="{{ $customer->email }}" />
                        </label>
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Phone
                            <input type="text" class="grow" placeholder="Your Phone" name="phone" id="phone"
                                value="{{ $customer->phone }}" />
                        </label>
                        <div class="form-control mt-3">
                            <button type="submit" class="btn btn-warning w-full max-w-xs">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
