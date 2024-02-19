<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Customer') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center my-5">
            {{ __('List Pending Payment') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Type Car</th>
                                <th>Pickup Date</th>
                                <th>Pickup Location</th>
                                <th>Return Date</th>
                                <th>Return Location</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        @foreach ($bookings as $booking)
                        @if ($booking->status_booking !== 'success')
                            <tbody>
                                <tr class="bg-base-200">
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $booking->customer->name }}</th>
                                    <td>{{ $booking->vehicle->type }}</td>
                                    <td>{{ $booking->pickup_date }}</td>
                                    <td>{{ $booking->pickup_location }}</td>
                                    <td>{{ $booking->return_date }}</td>
                                    <td>{{ $booking->return_location }}</td>
                                    <td> <a href="{{ route('admin.confirm',['id' => $booking->id]) }}" class="btn btn-success">Confirm</a></td>
                                </tr>
                            </tbody>
                            @endif
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center my-5">
            {{ __('List Success Payment') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Type Car</th>
                                <th>Pickup Date</th>
                                <th>Pickup Location</th>
                                <th>Return Date</th>
                                <th>Return Location</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        @foreach ($bookings as $booking)
                            @if ($booking->status_booking === 'success')
                                <tbody>
                                    <tr class="bg-base-200">
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $booking->customer->name }}</th>
                                        <td>{{ $booking->vehicle->type }}</td>
                                        <td>{{ $booking->pickup_date }}</td>
                                        <td>{{ $booking->pickup_location }}</td>
                                        <td>{{ $booking->return_date }}</td>
                                        <td>{{ $booking->return_location }}</td>
                                        <td>{{ $booking->status_booking }}</td>
                                    </tr>
                                </tbody>
                            @endif
                        @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
