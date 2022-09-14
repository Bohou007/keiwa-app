<?php

namespace App\Exports;

use App\Models\Forms;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Forms::select(
            "id",
            "name",
            "whatsApp",
            "email",
            "location",
            "raison_sociale",
            "activity",
            "situation_geo",
            "staff",
            "registre",
            "dfe",
            "regime",
            "logiciel",
            "cabinet",
            "is_required_finance",
            "montant_finance",
            "balance_due",
            "preference",
            "created_at"
        )->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function headings(): array
    {
        return [
            "#",
            "Nom complet",
            "Numero de téléphone whatsApp",
            "Adresse email",
            "Localisation",
            "Nom de l'entreprise (Raison sociale)",
            "Activité",
            "Situation géographique",
            "Nombre d'employés",
            "Avez-vous un registre de commerce ?",
            "Avez-vous une Déclaration Fiscale d'Existence",
            "Regime",
            "Avez-vous un logiciel de facturation ?",
            "Êtes-vous accompagné par un cabinet comptable ou un CGA ?",
            "Êtes-vous à la recherche d'un financement ?",
            "Montant de financement",
            "Paiement du service fournir",
            "Préférence de contact",
            "Date de création",
        ];
    }
}