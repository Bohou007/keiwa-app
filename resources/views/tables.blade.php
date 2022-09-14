@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Listes des Demande de service</h6>
                        <a class="btn bg-logo-soft-1 btn-xm float-end" href="{{ route('forms.export') }}">
                            Impression <i class="fa fa-print"> </i>
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nom de l'entreprise</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Secteur d'activité</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date de soumission</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @forelse ($forms->reverse() as $form)

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>

                                                    <img src="../assets/img/illustrations/file-form-2.png"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $form->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $form-> email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$form->raison_sociale}}</p>
                                            <p class="text-xs text-secondary mb-0">Nombre d'employés
                                                {{$form->staff}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{$form->activity}}</p>
                                            {{-- <span
                                                class="badge badge-sm bg-gradient-success">{{$form->activity}}</span>
                                            --}}
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$form->created_at->format('j
                                                F, Y')}}</span>
                                        </td>
                                        <td class="align-middle">

                                            <button class="btn bg-logo-soft ms-auto mb-0 font-weight-bold text-xs p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $form->id }}"
                                                type="button"><i class="fa fa-eye"></i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal-{{ $form->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-logo-soft-1">
                                                            <h5 class="modal-title text-white" id="exampleModalLabel">
                                                                Information
                                                                de la demande</h5>
                                                            </h5>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="card p-4 bg-logo-soft-1">
                                                                <div class="row">
                                                                    <div class="col-md-3 mb-2">
                                                                        <h6 class="mb-0 text-sm text-white">Nom complet
                                                                        </h6>
                                                                        <p class="text-xs text-secondary-logo mb-0">{{
                                                                            $form->name }}</p>
                                                                    </div>
                                                                    <div class="col-md-3 mb-2">
                                                                        <h6 class="mb-0 text-sm text-white">Adresse
                                                                            Email</h6>
                                                                        <p class="text-xs text-secondary-logo mb-0">{{
                                                                            $form->email }}</p>
                                                                    </div>
                                                                    <div class="col-md-3 mb-2">
                                                                        <h6 class="mb-0 text-sm text-white ms-md-2">
                                                                            Contact
                                                                            whatsApp</h6>
                                                                        <p class="text-xs text-secondary-logo ms-md-2">
                                                                            {{
                                                                            $form->whatsApp }}</p>
                                                                    </div>
                                                                    <div class="col-md-3 mb-2">
                                                                        <h6 class="mb-0 text-sm text-white">Localisation
                                                                        </h6>
                                                                        <p class="text-xs text-secondary-logo mb-0">{{
                                                                            $form->whatsApp }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card p-4 mt-4">
                                                                <div class="row">
                                                                    <div class="col-md-3 mb-2">
                                                                        <h6 class="mb-0 text-sm">Raison
                                                                            sociale
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->raison_sociale }}</p>
                                                                    </div>
                                                                    <div class="col-md-3 mb-2">
                                                                        <h6 class="mb-0 text-sm">Situation
                                                                            géographique</h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->situation_geo }}</p>
                                                                    </div>
                                                                    <div class="col-md-3 mb-2">
                                                                        <h6 class="mb-0 text-sm">Activité
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->activity }}</p>
                                                                    </div>
                                                                    <div class="col-md-3 mb-2">
                                                                        <h6 class="mb-0 text-sm">Nombre
                                                                            d'employés
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->staff }}</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="card p-4 mt-4">
                                                                <div class="row col-12 mt-4">
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Avez-vous un registre
                                                                            <br>
                                                                            de commerce ?
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->registre == 1 ? 'OUI' : 'NON' }}</p>
                                                                    </div>
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Avez-vous une DFE <br>
                                                                            (Déclaration Fiscale d'Existence)</h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->dfe == 1 ? 'OUI' : 'NON'}}</p>
                                                                    </div>
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Sui "Oui" à la question
                                                                            précédente, <br> choisir votre regime
                                                                            d'imposition
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->regime }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row col-12 mt-4">
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Avez-vous un logiciel
                                                                            de <br> facturation ?
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->logiciel == 1 ? 'OUI' : 'NON' }}</p>
                                                                    </div>
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Êtes-vous accompagné
                                                                            par un <br>
                                                                            cabinet comptable ou un CGA ?</h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->cabinet == 1 ? 'OUI' : 'NON'}}</p>
                                                                    </div>
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Êtes-vous à la
                                                                            recherche <br> d'un financement ?
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->is_required_finance== 1 ? 'OUI' :
                                                                            'NON' }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row col-12 mt-4">
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Si "Oui" à la
                                                                            précédente question, <br> de combien
                                                                            avez-vous besoin
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->montant_finance }}</p>
                                                                    </div>
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Combien êtes-vous prêt
                                                                            à payer
                                                                            <br>
                                                                            pour bénéficier de nos services ?
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->balance_due }}</p>
                                                                    </div>
                                                                    <div class="col-md-4 mb-2">
                                                                        <h6 class="mb-0 text-sm">Nous vous contacterons
                                                                            par
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">{{
                                                                            $form->preference }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-logo-soft"
                                                                data-bs-dismiss="modal">Fermer</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>

                                    @empty
                                    <p>No posts</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            {{ $forms->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
