<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Новое обращение</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-4.6.0/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-form-helpers.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/flexContainer.css')}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script type="text/javascript" src="{{URL::asset('js/jquery-3.0.0.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/bootstrap-4.6.0/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/bootstrap-formhelpers.min.js')}}"></script>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-200 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <form method="POST" autocomplete="off" action="/complaints/{{$complaint->id}}">
                        @method('PATCH')
                        @csrf
                        <input name="id" type="text" hidden value="{{$complaint->id}}">
                        <div class="text-center">
                            <div class="p-3 m-0">
                                <h4>Редактирование обращения от {{$complaint->created_at}}</h4>
                            </div>
                            <div class="row p-3 m-0 align-items-center">
                                <div class="col-auto pl-1 pr-1">
                                    <input name="surname" autocomplete="off" type="text" size="22" placeholder="Фамилия" value="{{$client->surname}}">
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <input name="name" autocomplete="off" type="text" size="18" placeholder="Имя" value="{{$client->name}}">
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <input name="patronymic" autocomplete="off" type="text" size="20" placeholder="Отчество" value="{{$client->patronymic}}">
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <input name="phone_number" required autocomplete="off" class="form-control bfh-phone" type="tel" size="16" data-format="+7 (ddd) ddd-dd-dd" value="{{$client->phone_number}}">
                                </div>
                            </div>
                            <div class="row justify-content-center p-3 m-0">
                                <div class="col-auto pl-1 pr-1">
                                    <select name="polyclinic">
                                        @foreach($polyclinics as $polyclinic)
                                            <option value="{{$polyclinic->id}}" {{$polyclinic->id == $complaint->fk_polyclinics ? "selected" : ""}}>{{$polyclinic->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <select name="reason">
                                        @foreach($reasons as $reason)
                                            <option value="{{$reason->id}}" {{$reason->id == $complaint->fk_reasons ? "selected" : ""}}>{{$reason->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="p-3">
                                <textarea name="note" rows="3" class="w-100" placeholder="Подробное описание">{{$complaint->note}}</textarea>
                            </div>
                            <div class="row justify-content-center p-3 m-0">
                                <div class="col-auto pl-1 pr-1">
                                    <button type="submit">Сохранить</button>
                                </div>
                                <div class="col-auto pl-1 pr-1">
                                    <button id="cancel">Отмена</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    document.getElementById('cancel').onclick = function (event) {
        event.preventDefault();
        location.href='/complaints';
    }
</script>
