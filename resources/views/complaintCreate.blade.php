<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Новое обращение</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-4.6.0/bootstrap.css')}}">
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
        <div class="relative flex items-top justify-center min-h-screen bg-gray-200 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <form method="POST" autocomplete="off" action="/complaints/add">
                        @csrf
                        <div class="text-center">
                            <div class="p-3 m-0">
                                <h3>Новое обращение</h3>
                            </div>
                            <div class="row p-3 m-0">
                                <div class="col-auto pl-1 pr-1">
                                    <input name="surname" type="text" size="15" placeholder="Фамилия">
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <input name="name" type="text" size="15" placeholder="Имя">
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <input name="patronymic" type="text" size="15" placeholder="Отчество">
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <input name="phone_number" type="tel" size="10" placeholder="+7 xxx xxx xx xx">
                                </div>
                            </div>
                            <div class="row justify-content-center p-3 m-0">
                                <div class="col-auto pl-1 pr-1">
                                    <select name="polyclinic">
                                        @foreach($polyclinics as $polyclinic)
                                            <option value="{{$polyclinic->id}}">{{$polyclinic->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <select name="reason">
                                        @foreach($reasons as $reason)
                                            <option value="{{$reason->id}}">{{$reason->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="p-3">
                                <textarea name="note" rows="3" class="w-100" placeholder="Подробное описание"></textarea>
                            </div>
                            <div class="row justify-content-center p-3 m-0">
                                <div class="col-auto pl-1 pr-1">
                                    <button type="submit">Сохранить</button>
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <button href="/complaints">Отмена</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
