@extends('layouts.user_type.guest')

@section('content')

<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plains">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Bienvenue !</h4>
                                <p class="mb-0">Saisissez votre adresse électronique et votre mot de passe pour vous
                                    connecter</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="/session">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg"
                                            placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                        @error('email')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg" placeholder="Mot de passe"
                                            value="secret" aria-label="Password" aria-describedby="password-addon">
                                        @error('password')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-lg bg-logo-soft btn-lg w-100 mt-4 mb-0">Connectez-vous</button>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign
                                        up</a>
                                </p>
                            </div> --}}
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div
                            class="position-relative bg-gradient-logo h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                            <img src="{{ asset('assets/img/shapes/pattern-lines.svg') }}" alt="pattern-lines"
                                class="position-absolute opacity-4 start-0">
                            <div class="position-relative">
                                <img class="max-width-500 w-100 position-relative z-index-2"
                                    src="{{ asset('assets/img/illustrations/sign-in-pana.png') }}" alt="chat-img">
                            </div>
                            {{-- <h4 class="mt-5 text-white font-weight-bolder">"Attention is the new currency"</h4>
                            <p class="text-white">The more effortless the writing looks, the more effort the writer
                                actually put into the process.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
