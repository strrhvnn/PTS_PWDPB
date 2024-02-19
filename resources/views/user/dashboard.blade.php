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
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight my-4">
                                {{ __('List Car Available') }}
                            </h2>
                            <div class="flex space-x-4">
                                @foreach ($vehicles as $vehicle)
                                    <div class="card w-96 bg-primary text-primary-content">
                                        <div class="card-body">
                                            <h2 class="card-title">{{ $vehicle->type }}</h2>
                                            <p>Capacity : {{ $vehicle->capacity }}</p>
                                            <p>Unit: {{ $vehicle->unit }}</p>
                                            <p>Registration Plate: {{ $vehicle->registration_plate }}</p>
                                            <div class="card-actions justify-end">
                                                <a href="{{ route('user.booking',['id' => $vehicle->id]) }}" class="btn btn-success">Book</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</x-app-layout>
