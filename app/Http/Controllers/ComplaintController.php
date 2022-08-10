<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Polyclinic;
use App\Models\Reason;
use App\Models\Client;
use App\Models\Complaint;
use Illuminate\Support\Facades\Redirect;

class ComplaintController
{
    /**
     * Показать конкретную жалобу
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
//        return view('user.profile', [
//            'user' => User::findOrFail($id)
//        ]);
    }

    /**
     * Показать конкретную жалобу
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showAll()
    {
        //Получаем клиента или создаём, если его ещё нет
        $clients = Client::all ();
        $complaintsByUsers = [];    //Обращения пользователей
        foreach ($clients as $client) {
            $complaints = $client->complaints;
//            Complaint::all()->filter(function ($complaint) use ($client) {
//                                                                        return $complaint->fk_clients == $client->id;
//                                                                    })->sortBy('created_at', SORT_ASC);
            //Если есть - добавляем в массив
            if (count($complaints)) {
                $complaintsByUsers[$client->id]['client'] = $client;
                $complaintsByUsers[$client->id]['complaints'] = $complaints;
            }
        }
        return view('complaintsList', [
            'complaintsByUsers' => $complaintsByUsers
        ]);
    }

    /**
     * Окно для создания нового обращения
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $polyclinics = Polyclinic::all();
        return view('complaintCreate', [
            'polyclinics' => Polyclinic::all()->sortBy('title', SORT_ASC),
            'reasons' => Reason::all()->sortBy('title', SORT_ASC),
        ]);
    }

    /**
     * Окно для создания нового обращения
     *
     * @return \Illuminate\View\View
     */
    public function store()
    {
        //Получаем клиента или создаём, если его ещё нет
        $client = Client::firstOrCreate (
            ['phone_number' => $_POST['phone_number']],
            ['surname' => $_POST['surname'] ?? null, 'name' => $_POST['name'] ?? null, 'patronymic' => $_POST['patronymic']] ?? null
        );

        //Поликлиника
        $polyclinic = Polyclinic::find($_POST['polyclinic']);
        //Повод обращения
        $reason = Reason::find($_POST['reason']);

//        $complaint = new Complaint(["fk_polyclinics" => $polyclinic->id, "fk_reasons" => $reason->id, "note" => $_POST['note']]);
        $client->complaints()->save(new Complaint(["fk_polyclinics" => $polyclinic->id, "fk_reasons" => $reason->id, "note" => $_POST['note']]));

//        $complaint->save();

        Redirect::action([ComplaintController::class, 'showAll']);
    }
}
