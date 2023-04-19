<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Events') }}
        </h2>
    </x-slot>
    <div class="">
        <h3>Add participants to <strong> {{ $event->title}}</strong> </h3>
        <div action="/events" method="POST" class="flex flex-col max-w-3xl m-auto gap-2 w-[500px]">
        <span class="bg-teal-100 p-2">Registered</span>
        @if($asistents)
            <ul class="flex gap-2 flex-col">
                        @foreach($asistents as $asistent)
                        <li class="flex justify-between">
                            
                            {{ $asistent->name}}
                            <form action="/events/{{ $event->id}}" method="post">
                                                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="user" value="{{ $asistent->id}}">

                                <button class="bg-red-600 p-2 rounded-lg text-slate-50 hover:bg-red-500">Remove</button>
                            </form>
                        </li>
            @endforeach
            </ul>
        @else
            <span>0 participants</span>
        @endif
        <span class="bg-teal-100 p-2">To Add</span>
        @if(count($noregisted) != 0)
        <ul class="w-[500px] flex gap-2 flex-col">
            @foreach($noregisted as $noreg)
                        <li class="flex justify-between">
                            {{ $noreg->name}}

                            <form action="/events/{{ $event->id}}/attendes" method="post">
                                @csrf
                                <input type="hidden" name="user" value="{{ $noreg->id}}">
                                <button class="bg-emerald-300 p-2 px-4 rounded-lg hover:bg-emerald-200 ">Add</button>
                            </form>
                        </li>
            @endforeach
            </ul>
        @else
        <span>Nothing to add</span>
        @endif
        </form>
        @if(session('message'))
            <span class="message">{{ session('message')}}</span>
        @endif
    </div>
</x-app-layout>
