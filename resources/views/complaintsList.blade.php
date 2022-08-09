<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Обращения</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-4.6.0/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/flexContainer.css')}}">
        <style type="text/css" >
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flexContainer items-top justify-center bg-gray-200 dark:bg-gray-900 p-4">

            <div class="flexContainerHorizontal">
                <div class="flexContentHorizontal text-left"><h3>Обращения клиентов</h3></div>
                <div><button href="/complaints/create">Добавить</button></div>
            </div>
            <div class="flexContent max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-2">
                @foreach($complaintsByUsers as $complaintsByUser)
                        <div>
                            <p>{{$complaintsByUser['client']->surname}} {{$complaintsByUser['client']->name}} {{$complaintsByUser['client']->patronymic}}</p>
                            <p class="text-light">{{$complaintsByUser['client']->phone_number}}</p>
                        </div>
                        <div>
                        @foreach($complaintsByUser['complaints'] as $complaint)
                                <div>
                                    <p>{{$complaint->id}} {{$complaint->note}}</p>
                                </div>
                        @endforeach
                        </div>
                @endforeach
                </div>





            </div>
        </div>
    </body>
</html>
