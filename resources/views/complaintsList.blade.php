<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Обращения</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-4.6.0/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
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
                <div><button onclick="location.href='/complaints/create'">Добавить</button></div>
            </div>
            <div class="flexContent max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="d-table bg-gray-100">
                    <div class="d-table-row header text-center">
                        <div class="d-table-cell p-2">
                            <p class="m-0">Клиент</p>
                        </div>
                        <div class="d-table-cell p-2">
                            <p class="m-0">Обращение</p>
                        </div>
                    </div>
                @foreach($complaintsByUsers as $complaintsByUser)
                    <div class="d-table-row">
                        <div class="d-table-cell text-center">
                            <div>{{$complaintsByUser['client']->surname}} {{$complaintsByUser['client']->name}} {{$complaintsByUser['client']->patronymic}}</div>
                            <div>{{$complaintsByUser['client']->phone_number}}</div>
                        </div>
                        <div class="d-table-cell border-left">
                        @foreach($complaintsByUser['complaints'] as $complaint)
                            <div class="row border-top">
                                <div class="col">
                                    <div class="text-sm-1">{{$complaint->created_at}} </div>
                                    <div class="p-2">{{$complaint->polyclinic->title}}</div>
                                </div>
                                <div class="col">
                                    <div class="text-lg">{{$complaint->reason->title}} </div>
                                    <div>{{$complaint->note}}</div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endforeach
                </div>





            </div>
        </div>
    </body>
</html>
