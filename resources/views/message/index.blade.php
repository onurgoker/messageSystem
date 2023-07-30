@extends('layouts.master')

@section('content')
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            @if(Session::has('message'))
                {{ Session::get('message') }}
            @endif
        </h2>
        <h1>Welcome, {{ Auth::user()->name }} ({{Auth::user()->email}})
            @if(Auth::check())
                <a style="color:blue" href="/logout">Logout</a>
            @endif
        </h1>

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 text-left">
        <a style="color:blue" href="/account">    
            + Write a new message
        </a>
        </div>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mx-auto mt-4 max-w-xl sm:mt-4">
            <h4>Received Messages</h4>
            <h4>Sent Messages</h4>
        </div>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div>
            <table class="mt-2.5">
                <th>ID</th>
                <th>Sender</th>
                <th>Message</th>
                <th>Date</th>
                    @foreach ($receivedMessages as $message)
                    <tr>
                        <td>#{{$message->id}}</td>
                        <td>{{$message->sender}}</td>
                        <td><a style="color:blue" href="/message/{{$message->id}}">{{substr($message->message, 0, 50) . '...'}}</a></td>
                        <td>{{$message->created_at}}</td>
                    </tr>
                @endforeach
            </table>
        </div>            
        <div class="grid grid-cols-2 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div>
            <table class="mt-2.5">
                <th>ID</th>
                <th>Message</th>
                <th>Date</th>
                    @foreach ($sentMessages as $message)
                    <tr>
                        <td>#{{$message->id}}</td>
                        <td><a style="color:blue" href="/message/{{$message->id}}">{{substr($message->message, 0, 50) . '...'}}</a></td>
                        <td>{{$message->created_at}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
