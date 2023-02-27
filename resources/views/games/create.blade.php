<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form id="create-game" method="post" action="{{ route('games.store') }}" class="mt-12 space-y-12" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div>
                            <x-input-label for="name" value="{{ __('Name') }}"/>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                        </div>

                        <div>
                            <x-input-label for="email" value="{{ __('Price') }}"/>
                            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" step=".01" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('price')"/>
                        </div>

                        <div>
                            <x-input-label for="email" value="{{ __('Description') }}"/>
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"/>
                            <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                        </div>

                        <div class="col-md-6">
                            <x-text-input id="image_path" name="file" type="file" class="mt-1 block w-full" required/>
                            <input type="hidden" name="image_path" value="{{ $presignedInputs['key'] }}">
                        </div>

                        <div>
                            <x-input-label for="email" value="{{ __('Release date') }}"/>
                            <x-text-input id="release_date" name="release_date" type="datetime-local" class="mt-1 block w-full datetimepicker" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('release_date')"/>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </form>
                    <script>
                        document.getElementById("create-game").addEventListener('submit', async function(event) {
                            event.preventDefault();

                            const fileInput = document.getElementById("image_path");

                            const formData = new FormData();
                            @foreach($presignedInputs as $name => $value)
                                formData.append("{{ $name }}", "{{ $value }}");
                            @endforeach
                            formData.append("file", fileInput.files[0]);

                            const response = await fetch("{{ $presignedUrl }}", {method: 'POST', body: formData});
                            if (response.ok) {
                                fileInput.remove();
                                this.submit();
                            } else {
                                console.log("Fail "+response.status);
                            }
                        }, { once: true });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
