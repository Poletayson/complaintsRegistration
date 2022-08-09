<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Polyclinic;
use App\Models\Reason;
use App\Models\Client;
use App\Models\Complaint;

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
            $complaints = $client->getComplaints()->sortBy('created_at', SORT_ASC);
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
            ['surname' => $_POST['surname'], 'name' => $_POST['name'], 'patronymic' => $_POST['patronymic']]
        );
//        $polyclinics = Polyclinic::all();
        return view('complaintsList', [
            'client' => $client,
            'complaints' => Complaint::all()->sortBy('created_at', SORT_ASC),
        ]);
    }
}
