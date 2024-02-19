<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Vehicle') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('edit.vehicle.post', $vehicle->id) }}" method="POST">
                        @csrf
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Type :
                            <input type="text" class="grow" placeholder="Type Vehicles" name="type"
                                id="type" value="{{ $vehicle->type }}" />
                        </label>
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Capacity :
                            <input type="text" class="grow" placeholder="Capacity Vehicles" name="capacity"
                                id="capacity" value="{{ $vehicle->capacity }}" />
                        </label>
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Unit :
                            <input type="text" class="grow" placeholder="Unit Vehicles" name="unit"
                                id="unit" value="{{ $vehicle->unit }}" />
                        </label>
                        <label class="input input-bordered flex items-center gap-2 border-rounded mb-3">
                            Registration Plate :
                            <input type="text" class="grow" placeholder="Registration Plate Vehicles"
                                name="registration_plate" id="registration_plate"
                                value="{{ $vehicle->registration_plate }}" />
                        </label>
                        <div class="form-control flex mt-3">
                                <button type="submit" class="btn btn-warning w-full max-w-xs my-3">
                                    Simpan
                                </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
