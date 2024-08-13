<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Answer') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center">
        <div class="max-w-8xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">

                    <div class='flex items-center  '>
                        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>

                            <div class='max-w-md mx-auto space-y-6'>
                                <form action="{{ route('answers.store', ['application' => $application->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="flex justify-between">
                                        <h2 class="text-2xl font-bold text-slate-600">
                                            Answer application
                                            id: {{ $application->id }}
                                        </h2>
                                        <div class="h-8 w-8 rounded-full bg-lime-600 flex justify-center items-center">
                                            <h3 ">
                                            {{ $application->user->name[0] }}</h3>
                                        </div>

                                    </div>

                                    <hr class="my-6">


                                        <label
                                            class="uppercase text-sm font-bold opacity-70 text-slate-600">Message</label>
                                        <textarea name="body" rows="4" type="text"
                                            class="p-3 mt-2 mb-4 w-full
                                                 text-slate-950 bg-slate-200 rounded">
                                        </textarea>


                                        <input type="submit"
                                            class="py-2 px-6 my-2 bg-green-500
                                            text-white font-medium rounded 
                                            cursor-pointer ease-in-out duration-300"
                                            value="Send">
                                        <a href="{{ route('dashboard') }}"
                                            class="py-2.5 px-6 my-2 bg-red-500
                                            text-white font-medium rounded 
                                            cursor-pointer ease-in-out duration-300">
                                            Cancel
                                        </a>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
