@extends('layouts.user_type.guest')

@section('content')

<main class="main-content  mt-0 ">
    <div class="container-fluid py-4 text-center mt-8">
        <div class="card success-card">
            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                <i class="success-i checkmark">✓</i>
            </div>
            <h1 class="success-h1">Une erreur est survenue</h1>
            <p class="success-p">Votre demande n'a pas été envoyée,<br /> Merci de réessayer.</p>
        </div>
    </div>
</main>

@endsection
