@extends('layouts.user_type.auth')

@section('content')

<div>


    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Listes des utilisateurs</h5>
                        </div>
                        <button class="btn bg-logo-soft btn-sm mb-0" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-form">+&nbsp; Nouvel utilisateur</button>

                        {{-- Modal --}}
                        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="card card-plain">
                                            <div class="card-header pb-0 text-left">
                                                <h3 class="font-weight-bolder text-dark text-gradient">Nouvel
                                                    utilisateur</h3>
                                                <p class="mb-0">Enter your email and password to sign in</p>
                                            </div>
                                            <div class="card-body">
                                                <form role="form" method="POST" action="{{ route('register-admin') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <label>Nom Complet</label>
                                                    <div class="mb-3">
                                                        <input type="text" name="name" required class="form-control"
                                                            placeholder="Name" aria-label="Name">
                                                    </div>
                                                    <label>Email</label>
                                                    <div class="mb-3">
                                                        <input type="email" name="email" required class="form-control"
                                                            placeholder="Email" aria-label="Email">
                                                    </div>
                                                    <label>Numéro de téléphone</label>
                                                    <div class="mb-3">
                                                        <input type="text" required name="phone" class="form-control"
                                                            placeholder="Numéro de téléphone"
                                                            aria-label="Numéro de téléphone">
                                                    </div>
                                                    <label>Mot de passe </label>
                                                    <div class="mb-3">
                                                        <input type="password" name="password" required
                                                            class="form-control" placeholder="Password"
                                                            aria-label="Password">
                                                    </div>

                                                    <div class="form-check form-check-info text-left">
                                                        <input class="form-check-input" type="checkbox" name="agreement"
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            I agree the <a href="javascript:;"
                                                                class="text-dark font-weight-bolder">Terms and
                                                                Conditions</a>
                                                        </label>
                                                        @error('agreement')
                                                        <p class="text-danger text-xs mt-2">First, agree to the Terms
                                                            and Conditions, then try register again.</p>
                                                        @enderror
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit"
                                                            class="btn bg-logo-soft w-100 mt-4 mb-0">Enregistrer
                                                            l'utilisateur
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>

                                    <th
                                        class="text-centers text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nom complet
                                    </th>
                                    <th
                                        class="text-centers text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th
                                        class="text-centers text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Numéro de téléphone
                                    </th>
                                    <th
                                        class="text-centers text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date de création
                                    </th>
                                    {{-- <th
                                        class="text-centers text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users->reverse() as $key=> $user)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $key+1 }}</p>
                                    </td>

                                    <td class="text-centers">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                    </td>
                                    <td class="text-centers">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td class="text-centers">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->phone }}</p>
                                    </td>
                                    <td class="text-centers">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{$user->created_at->format('j
                                            F, Y')}}</span>
                                    </td>
                                    {{-- <td class="text-centers">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td> --}}
                                    </tr>
                                @empty
                                <tr>
                                    NO data
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
