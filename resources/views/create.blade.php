<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Event') }}
        </h2>
    </x-slot>
    <div class="formCreate">
        <form action="/events" method="POST" class="flex flex-col max-w-3xl m-auto gap-2">
            @csrf            
            <input class="rounded-md" type="text" name="title" id="title" placeholder="Title">
            @error('title')
                <p style="color: red">{{ $message }}</p>
            @enderror  
            <textarea class="rounded-md" name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
            @error('description')
                <p style="color: red">{{ $message }}</p>
            @enderror  
            <input class="rounded-md" type="text" name="location" placeholder="Location">
            @error('location')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <div class="flex flex-col">
                <label for="">Date event:</label>
                <input class="rounded-md" type="date" name="date">
            </div>
            @error('date')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <input type="hidden" name="created_at" value="{{ now()->toDateTimeString() }}">
            <input type="hidden" name="updated_at" value="{{ now()->toDateTimeString() }}">
            <button class="bg-teal-100 hover:bg-teal-200 p-3 rounded-md text-gray-500 cursor-pointer" >Create Event</button>
        </form>
        @if(session('message'))
            <span class="message">{{ session('message')}}</span>
        @endif
    </div>
</x-app-layout>
