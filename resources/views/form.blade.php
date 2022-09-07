@extends('layouts.user_type.guest')

@section('content')

<main class="main-content  mt-0 ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 text-center">
                <div class="col-12 col-lg-8 mx-auto my-5">
                    <img class="img-height" src={{ asset('assets/img/illustrations/header-form-img.png') }} />
                </div>
                <div class="multisteps-form mb-5">
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-7 m-auto card">
                            <div class="col-12 col-lg-12 mx-auto block-h">
                                <div class="col-12 col-lg-12 mb-5">
                                    <h3>Demande de service : Assistance en gestion</h3>
                                </div>
                                <div class="multisteps-form__progress mt-5">
                                    <button class="multisteps-form__progress-btn js-active" type="button"
                                        title="User Info">
                                        <span>Information générale</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn " type="button" title="Order Info">
                                        <span>Raison sociale</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn " type="button" title="Order Info">
                                        <span>Expression de besoin</span>
                                    </button>
                                </div>
                            </div>

                            <form class="multisteps-form__form" action="{{ route('forms.store') }}" method="POST"
                                style="height: 377px;">
                                @csrf
                                <div class="multisteps-form__panel p-3 border-radius-xl bg-whited js-active"
                                    data-animation="FadeIn">
                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">

                                            <div class="col-12 col-sm-12 mt-4 mt-sm-0 text-start">
                                                <label>Nom complet</label>
                                                <input class="multisteps-form__input form-control mb-3" required
                                                    name="name" type="text" placeholder="Ex. Michael"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                                <label>Numéro de téléphone whatsApp</label>
                                                <input class="multisteps-form__input form-control mb-3" required
                                                    name="whatsApp" type="text" placeholder="Ex. 0700000000"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                                <label> Adresse Email</label>
                                                <input class="multisteps-form__input form-control" required name="email"
                                                    type="email" placeholder="Ex. exemple@domaine.com"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                                <label> Localisation</label>
                                                <input class="multisteps-form__input form-control" required
                                                    name="location" type="text"
                                                    placeholder="Ex. Abidjan, Yopougon - toit rouge"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button"
                                                title="Next">Suivant</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="multisteps-form__panel p-3 border-radius-xl bg-white"
                                    data-animation="FadeIn">
                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Nom de l'entreprise (Raison sociale) *</label>
                                                <input class="multisteps-form__input form-control" name="raison_sociale"
                                                    type="text" placeholder="Entrer le nom de votre entreprise'"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Situation géographique *</label>
                                                <input class="multisteps-form__input form-control" name="situation_geo"
                                                    type="text" placeholder="Ex. h" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Activité *</label>
                                                <input class="multisteps-form__input form-control" name="activity"
                                                    type="text" placeholder="Votre activité" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Nombre d'employés *</label>
                                                <input class="multisteps-form__input form-control" name="staff"
                                                    type="number"
                                                    placeholder="Entrez le nombre d'employés de votre entreprise"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                title="Prev">Précédent</button>
                                            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button"
                                                title="Next">Suivant</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="multisteps-form__panel p-3 border-radius-xl bg-white "
                                    data-animation="FadeIn">
                                    <div class="multisteps-form__content">
                                        <div class="row text-start">

                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Avez-vous un registre de commerce ? *</label>
                                                <select class="multisteps-form__input form-control" required
                                                    name="registre">
                                                    <option value="">Selectionné une option</option>
                                                    <option value="true">Oui</option>
                                                    <option value="false">Non</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Avez-vous une DFE (Déclaration Fiscale d'Existence) *</label>
                                                <select class="multisteps-form__input form-control" required name="dfe">
                                                    <option value="">Selectionné une option</option>
                                                    <option value="true">Oui</option>
                                                    <option value="false">Non</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Si "Oui" à la question précédente, choisir votre regime
                                                    d'imposition *</label>
                                                <select class="multisteps-form__input form-control" required
                                                    name="regime">
                                                    <option value="">Selectionné une option</option>
                                                    <option value="TEE (Taxe d'État de l'Entreprenant)">TEE (Taxe d'État
                                                        de l'Entreprenant)</option>
                                                    <option value="TME (Taxe de la Micro entreprise)">TME (Taxe de la
                                                        Micro entreprise)</option>
                                                    <option value="Regime du Réel Simplifié">Regime du Réel Simplifié
                                                    </option>
                                                    <option value="Regime du Réel Normal">Regime du Réel Normal</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Avez-vous un logiciel de facturation ? *</label>
                                                <select class="multisteps-form__input form-control" required
                                                    name="logiciel">
                                                    <option value="">Selectionné une option</option>
                                                    <option value="true">Oui</option>
                                                    <option value="false">Non</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Êtes-vous accompagné par un cabinet comptable ou un CGA ?
                                                    *</label>
                                                <select class="multisteps-form__input form-control" required
                                                    name="cabinet">
                                                    <option value="">Selectionné une option</option>
                                                    <option value="true">Oui</option>
                                                    <option value="false">Non</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Êtes-vous à la recherche d'un financement ? *</label>
                                                <select class="multisteps-form__input form-control" required
                                                    name="is_required_finance">
                                                    <option value="">Selectionné une option</option>
                                                    <option value="true">Oui</option>
                                                    <option value="false">Non</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Si "Oui" à la précédente question, de combien avez-vous besoin
                                                    *</label>
                                                <input class="multisteps-form__input form-control"
                                                    name="montant_finance" type="text"
                                                    placeholder="Exemple. 200 000 F CFA" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-6 ms-auto mt-3 text-start">
                                                <label>Combien êtes-vous prêt à payer pour bénéficier de nos services ?
                                                </label>
                                                <input class="multisteps-form__input form-control" required
                                                    name="balance_due" type="text"
                                                    placeholder="Exemple: xxx F CFA / mois" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-12 ms-auto mt-3 text-start">
                                                <label>Nous vous contacterons par *</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" name="preference[]" type="checkbox"
                                                        value="Mail" id="customCheckMail">
                                                    <label class="custom-control-label"
                                                        for="customCheckMail">Mail</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="preference[]" type="checkbox"
                                                        value="Appel téléphonique" id="customCheckAppel">
                                                    <label class="custom-control-label" for="customCheckAppel">Appel
                                                        téléphonique</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="preference[]" type="checkbox"
                                                        value="WhatsApp" id="fcustomCheckWhatsApp">
                                                    <label class="custom-control-label"
                                                        for="fcustomCheckWhatsApp">WhatsApp</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="preferenceOther"
                                                        type="checkbox" value="true" id="customCheckAutre">
                                                    <label class="custom-control-label"
                                                        for="customCheckAutre">Autre</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 ms-auto text-start">
                                                <label>Si
                                                    "Autre" remplissez ce champ
                                                </label>
                                                <input class="multisteps-form__input form-control" name="preference[]"
                                                    type="text" placeholder="Autre ..." onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                    title="Prev">Précédent</button>
                                                <button class="btn bg-logo-soft ms-auto mb-0" type="submit"
                                                    title="Send">Envoyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
