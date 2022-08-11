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
        return view('complaintCreate', [
            'polyclinics' => Polyclinic::all()->sortBy('title', SORT_ASC),
            'reasons' => Reason::all()->sortBy('title', SORT_ASC),
        ]);
    }

    /**
     * Окно для редактирования обращения
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $complaint = Complaint::find($id);
        return view('complaintEdit', [
            'complaint' => $complaint,
            'client' => $complaint->client(),
            'polyclinics' => Polyclinic::all()->sortBy('title', SORT_ASC),
            'reasons' => Reason::all()->sortBy('title', SORT_ASC),
        ]);
    }

    /**
     * Окно для создания нового обращения
     *
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        Complaint::destroy($id);

        return response()->json([
                'success' => 'Обращение успешно удалено'
            ]);   //redirect()->guest('/complaints')->with($resultKey, $resultValue);
    }

    /**
     * Добавление нового обращения
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

        $client->complaints()->save(new Complaint(["fk_polyclinics" => $polyclinic->id, "fk_reasons" => $reason->id, "note" => $_POST['note']]));


        return redirect()->guest('/complaints')->with('success', 'Обращение успешно добавлено');
    }
}
