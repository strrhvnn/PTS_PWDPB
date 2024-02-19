<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
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
                                        <th>Type</th>
                                        <th>Capacity</th>
                                        <th>Unit</th>
                                        <th>Registration Plate</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                @foreach ($vehicles as $vehicle)
                                    <tbody>
                                        <tr class="bg-base-200">
                                            <th>{{ $loop->iteration }}</th>
                                            <th>{{ $vehicle->type }}</th>
                                            <td>{{ $vehicle->capacity }}</td>
                                            <td>{{ $vehicle->unit }}</td>
                                            <td>{{ $vehicle->registration_plate }}</td>
                                            <td class="flex">
                                                <a href="{{ route('edit.vehicle', ['id' => $vehicle->id]) }}" class="btn btn-warning mx-3">Edit Role</a>
                                                <form action="{{ route('delete.vehicle', ['id' => $vehicle->id]) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this vehicle?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-error w-full max-w-xs">Delete Vehicle</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>

</x-app-layout>
