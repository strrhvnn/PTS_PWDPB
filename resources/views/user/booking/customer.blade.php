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
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        @foreach ($customers as $customer)
                            <tbody>
                                <tr class="bg-base-200">
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $customer->name }}</th>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td class="flex">
                                        <a href="{{ route('user.edit.customer', ['id' => $customer->id]) }}"
                                            class="btn btn-warning mx-3">Edit</a>
                                        <form action="{{ route('user.delete.customer', ['id' => $customer->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this customer?')">
                                            @csrf
                                            <button type="submit" class="btn btn-error w-full max-w-xs">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('user.customer.post') }}" method="POST">
                        @csrf
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Name
                            <input type="hidden" class="grow" name="users_id" id="users_id"
                                value="{{ auth()->user()->id }}" />
                            <input type="text" class="grow" placeholder="Your Name" name="name"
                                id="name" />
                        </label>
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Email
                            <input type="text" class="grow" placeholder="Your Email" name="email"
                                id="email" />
                        </label>
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Phone
                            <input type="text" class="grow" placeholder="Your Phone" name="phone"
                                id="phone" />
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
