<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center">
        <div class="max-w-8xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    @if (auth()->user()->role->name == 'manager')
                        <!-- This is an example component -->
                        <div class=' mt-8  flex flex-col justify-center items-center '>
                            <h2 class=" text-blue-500 font-bold text-xl text-left">Received Applications</h2>
                            @foreach ($applications as $application)
                                <div class="rounded-xl border     p-5 mt-6 shadow-md w-9/12  bg-white">
                                    <div class="lg:flex w-full items-center justify-between border-b pb-3 ">
                                        <div class="flex mt-2 ml-2 items-center space-x-3">
                                            <div
                                                class="h-8 w-8 rounded-full bg-blue-400 flex justify-center items-center">
                                                {{ $application->user->name[0] }}
                                            </div>
                                            <div class="text-lg font-bold text-slate-700">{{ $application->user->name }}
                                            </div>
                                        </div>
                                        <div class="flex mt-2 ml-2 items-center space-x-8">
                                            <button
                                                class="rounded-2xl border bg-neutral-100 
                                            px-3 py-1 text-xs text-neutral-600 font-semibold">
                                                # {{ $application->id }}
                                            </button>
                                            <div class="text-xs text-neutral-500">{{ $application->created_at }}</div>
                                        </div>
                                    </div>
                                    <div class="lg:flex justify-between items-center ">
                                        <div class="box-border p-8 ">
                                            <div class="mt-4 mb-3">
                                                <div class="mb-3 text-xl text-slate-600  font-bold">
                                                    {{ $application->subject }}
                                                </div>
                                                <div class="text-sm text-neutral-600">
                                                    {{ $application->message }}
                                                </div>
                                            </div>

                                            <div>
                                                <div class="flex items-center justify-between text-slate-500">
                                                    {{ $application->user->email }}

                                                </div>
                                            </div>
                                        </div>
                                        <div class=" flex flex-col justify-center items-center ">
                                            <div class="cursor-pointer box-border p-6">
                                                @if (is_null($application->file_url))
                                                    <div
                                                        class="flex flex-col items-center m-6 p-6
                                                        transition text-red-500 justify-center border border-red-500 rounded 
                                                         hover:bg-red-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                        </svg>
                                                    </div>
                                                @else
                                                    <a class="flex flex-col items-center 
                                                        border border-green-500 rounded  transition justify-center m-6 p-6
                                                         text-green-500    hover:bg-green-100"
                                                        href="{{ asset('storage/' . $application->file_url) }}"
                                                        target="_blank">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6 ">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                        </svg>
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border">
                                    <div class=" lg:flex lg:relative justify-between items-center box-border p-8 m-0 ">
                                        @if ($application->answer()->exists())
                                            <div class="text-sm text-neutral-600">
                                                <h1 class="text-xs text-blue-900">Answer:</h1>
                                                {{ $application->answer->body }}
                                            </div>
                                        @else
                                            <div class="lg:absolute top-0 left-7">
                                                <a href="{{ route('answers.create', ['application' => $application->id]) }}"
                                                    type="button"
                                                    class="bg-green-500 text-white px-3 py-1 rounded 
                                                    font-medium text-sm mx-3 hover:bg-green-600 
                                                    transition duration-200 each-in-out
                                                    flex items-center justify-center">
                                                    Answer
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach()
                            <div class=" mt-5">
                                {{ $applications->links() }}
                            </div>
                        </div>
                    @elseif (auth()->user()->role->name == 'client')
                        <!-- component -->
                        <div class='flex items-center  '>
                            <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                                @if (session()->has('error'))
                                    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700"
                                        role="alert">

                                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <span class="font-medium">! </span> {{ session()->get('error') }}
                                        </div>
                                    </div>
                                @endif
                                <div class='max-w-md mx-auto space-y-6'>
                                    <form action="{{ route('applications.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <h2 class="text-2xl font-bold text-slate-600">Submit your application</h2>

                                        <hr class="my-6">
                                        @error('subject')
                                            <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700"
                                                role="alert">
                                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <div>
                                                    <span class="font-medium">{{ $message }}</span> !
                                                </div>
                                            </div>
                                        @enderror
                                        <label
                                            class="uppercase text-sm font-bold opacity-70 text-slate-600">Subject</label>
                                        <input type="text" name="subject"
                                            class="p-3 mt-2 mb-4 w-full
                                                bg-slate-200 rounded border-2
                                                text-slate-950 border-slate-200 
                                                focus:border-slate-600 focus:outline-none">

                                        @error('message')
                                            <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700"
                                                role="alert">
                                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <div>
                                                    <span class="font-medium">{{ $message }}</span> !
                                                </div>
                                            </div>
                                        @enderror
                                        <label
                                            class="uppercase text-sm font-bold opacity-70 text-slate-600">Message</label>
                                        <textarea name="message" rows="4" type="text"
                                            class="p-3 mt-2 mb-4 w-full
                                                 text-slate-950 bg-slate-200 rounded">
                                        </textarea>
                                        @error('file')
                                            <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700"
                                                role="alert">
                                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <div>
                                                    <span class="font-medium">{{ $message }}</span> !
                                                </div>
                                            </div>
                                        @enderror
                                        <label
                                            class="uppercase text-sm font-bold opacity-70
                                             text-slate-600">
                                            File
                                        </label>
                                        <input type="file" name="file"
                                            class="p-3 mt-2 mb-4 w-full bg-slate-200 
                                            rounded border-2 text-slate-950 border-slate-200 
                                            focus:border-slate-600 focus:outline-none">

                                        <input type="submit"
                                            class="py-2 px-6 my-2 bg-green-500
                                            text-white font-medium rounded 
                                            cursor-pointer ease-in-out duration-300"
                                            value="Send">
                                    </form>

                                </div>
                            </div>
                        </div>
                    @else
                        User not
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
