@extends('dashboard')
@section('content')

    <div class="container">

        <div class="row grid grid-cols-4 gap-4">
            <div class="col-md-6">
                <form id="translationForm">
                    @csrf
                    <div class="mb-3">
                        <label for="wordInput" class="form-label">Xorazm shevasi</label>
                        <input type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"                               id="wordInput" name="word">
                    </div>
                </form>
                <select id="wordSelect"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   aria-label="Select word"></select>

                <div id="result"></div>
                <div class="mb-3">
                    <label for="literatureOutput" class="form-label">Adabiy til</label>
                    <input type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"                           id="literatureOutput">
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#wordInput').on('input', function() {
                getTranslation();
            });
        });

        function getTranslation() {
            var word = $('#wordInput').val();
            $.ajax({
                type: "GET",
                url: "{{ route('get_translation') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'word': word
                },
                success: function(response) {
                    $('#literatureOutput').val(response.translation);
                }
            });
        }

        $(document).ready(function(){
            var timeout;

            // Inputga malumot kiritilganda
            $('#wordInput').on('keyup', function(){
                clearTimeout(timeout);
                var letter = $(this).val();
                if (letter) {
                    timeout = setTimeout(function(){
                        requestData(letter);
                    }, 1000); // 1 sekunddan keyin so'rovni yuborish
                } else {
                    // Agar input bo'sh bo'lsa, select elementi yashirilsin
                    hideSelect();
                }
            });

            // Select elementi aktivlashtirilganda
            $('#wordSelect').on('focus', function(){
                clearTimeout(timeout);
                var letter = $('#wordInput').val();
                if (letter) {
                    requestData(letter);
                } else {
                    // Agar input bo'sh bo'lsa, select elementi yashirilsin
                    hideSelect();
                }
            });

            // AJAX so'rovnoma
            function requestData(letter) {
                $.ajax({
                    type: 'GET',
                    url: '/qidiruv',
                    data: { word: letter },
                    dataType: 'json',
                    success: function(data){
                        $('#wordSelect').empty(); // avvalgi tanlovni tozalash
                        $.each(data, function(index, word){
                            $('#wordSelect').append('<option value="' + word + '">' + word + '</option>');
                        });
                        $('#wordSelect').show(); // Select elementini ko'rsatish
                    },
                    error: function(){
                        $('#wordSelect').empty(); // xato bo'lganda tanlovni tozalash
                        $('#wordSelect').hide(); // xato bo'lganda select elementini yashirish
                    }
                });
            }

            // Select elementini yashirish
            function hideSelect() {
                clearTimeout(timeout);
                $('#wordSelect').empty(); // Tanlovni tozalash
                $('#wordSelect').hide(); // Select elementini yashirish
            }

            // select o'zgarilganda
            $('#wordSelect').change(function(){
                var selectedWord = $(this).val();
                $('#result').html('<p>' + selectedWord + '</p>').show(); // Tanlangan so'zni ko'rsatish
            });
        });




    </script>
@endsection
