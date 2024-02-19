<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Booking') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('user.booking.post') }}" method="POST">
                        @csrf
                        
                        <select name="customer_id" class="select select-primary w-full max-w-xs my-3">
                            <option value="all" selected>Choose a Customer</option>
                            @foreach ($userCustomer as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>

                        <input type="hidden" class="grow" name="vehicle_id" id="vehicle_id"
                            value="{{ $vehicle->id }}" />

                        <input type="hidden" class="grow" name="users_id" id="users_id"
                            value="{{ auth()->user()->id }}" />

                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Pick up Date
                            <input type="date" class="grow" name="pickup_date" id="pickup_date" />
                        </label>

                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Return Date
                            <input type="date" class="grow" name="return_date" id="return_date" />
                        </label>

                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Pick up Location :
                            <input type="text" class="grow" name="pickup_location" id="pickup_location" />
                        </label>

                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Return Location :
                            <input type="text" class="grow" name="return_location" id="return_location" />
                        </label>

                        <input type="hidden" class="grow" name="status_booking" id="status_booking"
                            value="your_desired_status" />

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
