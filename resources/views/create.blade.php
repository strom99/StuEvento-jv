<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Event') }}
        </h2>
    </x-slot>
    <div class="">
        <form action="" method="post">
            <input type="text" name="title" id="title">
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <input type="text" name="location">
            <input type="date" name="date">
            <input type="hidden" name="created_at" value="{{ now()->toDateTimeString() }}">
            <input type="hidden" name="updated_at" value="{{ now()->toDateTimeString() }}">
        </form>
    </div>
</x-app-layout>
