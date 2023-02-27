<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    <table>
                        @foreach($games as $game)
                            <tr>
                                <td>
                                    @if($game->release_date > now())
                                        <x-input-label for="name" value="Coming soon"/>
                                    @elseif(Auth::check() && Auth::user()->hasGame($game))
                                        <x-input-label for="name" value="In library"/>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('games.show', $game) }}">
                                        <img src="{{ route('games.show', $game) }}" style="max-width: 200px">
                                    </a>
                                </td>
                                <td>
                                    <x-input-label for="name" value="{{ $game->name }}"/>
                                </td>
                                <td>
                                    <x-input-label for="name" value="{{ $game->price }}"/>
                                </td>
                                <td>
                                    <x-input-label for="name" value="{{ $game->release_date }}"/>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
