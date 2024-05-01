@extends('dashboard')
@section('content')

    <div class="container">
<div class="d-flex">
    <div class="mt-1.5">
        <a href="{{route('word_create')}}" class="text-white bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Yangi soz qoshish</a>
        <a href="{{route('search_create')}}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Qidirish</a>
        <a href="{{route('import')}}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Import</a>


    </div>
</div>
        <div>

</div>


        <div class="relative overflow-x-auto mt-2.5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                     ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Xorazm shevasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                      adabiy tilda
                    </th>

                </tr>
                </thead>
                <tbody>
              @foreach($words as $word)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                      <td class="px-6 py-4">
                         {{$word->id}}
                      </td>

                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{$word->word}}
                      </th>
                      <td class="px-6 py-4">
                          {{$word->literature_text}}
                      </td>

                  </tr>

              @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection
