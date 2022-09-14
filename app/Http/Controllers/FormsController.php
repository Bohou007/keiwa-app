<?php

namespace App\Http\Controllers;

use App\Exports\FormsExport;
use App\Mail\MailNewForm;
use App\Models\Forms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class FormsController extends Controller
{
    public $showDiv = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Forms::paginate(10);
        return view('form', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $form = new Forms();
            $form->name = $request->name;
            $form->whatsApp = $request->whatsApp;
            $form->email = $request->email;
            $form->location = $request->location;
            $form->raison_sociale = $request->raison_sociale;
            $form->situation_geo = $request->situation_geo;
            $form->activity = $request->activity;
            $form->staff = $request->staff;
            $form->registre = $request->registre;
            $form->dfe = $request->dfe;
            $form->regime = $request->regime;
            $form->logiciel = $request->logiciel;
            $form->cabinet = $request->cabinet;
            $form->is_required_finance = $request->is_required_finance;
            $form->montant_finance = $request->montant_finance;
            $form->balance_due = $request->balance_due;
            $form->preference = implode(", ", $request->preference);

            $form->save();

            $users = User::all();

            foreach ($users as $user) {
                Mail::to($user->email)->send(new MailNewForm($form));
            }
            return redirect()->route('succes');
        } catch (\Throwable $th) {
            dump($th);
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new FormsExport(), 'formulaire-de-demande-de-service.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forms  $forms
     * @return \Illuminate\Http\Response
     */
    public function show(Forms $forms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forms  $forms
     * @return \Illuminate\Http\Response
     */
    public function edit(Forms $forms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forms  $forms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forms $forms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forms  $forms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forms $forms)
    {
        //
    }
}