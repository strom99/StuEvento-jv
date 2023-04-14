<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Events') }}
        </h2>
        <a class="bg-teal-100 hover:bg-teal-200 p-3 rounded-md text-gray-500 cursor-pointer" 
            href="events/create">Create Event</a>
    </x-slot>
    <div class="">
        

     @if(count($eventos) > 0)
                <table class="table-auto w-full border-2 border-solid border-slate-200">
                    <thead class="bg-teal-100">
                        <tr>
                        <th>title</th>
                        <th>description</th>
                        <th>location</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($eventos as $evento)

                        <tr>
                        <td>{{$evento->title}}</td>
                        <td>{{$evento->description}}</td>
                        <td>{{ $evento->location}}</td>
                        <td>
                        <a class="bg-teal-100 hover:bg-teal-200 p-3 rounded-md text-gray-500 cursor-pointer" 
                        href="events/{{ $evento->id }}">
                        View
                        </a>

                        </td>
                        </tr>
                @endforeach

                    </tbody>
                </table>
        @else
            <span>{{ count($eventos)}} events registered</span>
        @endif

        
    </div>
</x-app-layout>
