<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Events') }}
        </h2>
    </x-slot>
    <div class="">
        <h3>Edit <strong>{{ $event->title}} </strong> </h3>

            <form action="/events/{{ $event->id }}" method="POST" class="flex flex-col max-w-3xl m-auto gap-2">
            @csrf    
            @method('PUT')        
            <input class="rounded-md" type="text" name="title" id="title" placeholder="Title" value="{{ $event->title}}">
            @error('title')
                <p style="color: red">{{ $message }}</p>
            @enderror  
            <textarea class="rounded-md" name="description" id="description" cols="30" rows="10" placeholder="Description">
                {{ $event->description}}
            </textarea>
            @error('description')
                <p style="color: red">{{ $message }}</p>
            @enderror  
            <input class="rounded-md" type="text" name="location" placeholder="Location" value=" {{$event->location}}">
            @error('location')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <div class="flex flex-col">
                <label for="">Date event:</label>
                <input class="rounded-md" type="date" name="date" value="{{ $date }}">
            </div>
            @error('date')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <input type="hidden" name="updated_at" value="{{ now()->toDateTimeString() }}">
            <button class="bg-teal-100 hover:bg-teal-200 p-3 rounded-md text-gray-500 cursor-pointer" >Save changes</button>
        </form>
        @if(session('message'))
            <span class="message">{{ session('message')}}</span>
        @endif
</x-app-layout>
