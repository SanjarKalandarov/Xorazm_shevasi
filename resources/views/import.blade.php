@extends('dashboard')
@section('content')

    <div class="container">
        <div class="row">


            <form class="max-w-lg mx-auto" action="{{route('import.excel')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="import" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Import</label>
                    <input type="file" id="import" name="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>


    </div>
@endsection
