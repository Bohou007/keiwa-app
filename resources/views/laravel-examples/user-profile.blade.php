@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-logo opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('assets/img/illustrations/user.png') }}" alt="..."
                            class="w-100 border-radius-lg shadow-sm">

                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" data-toggle="tab"
                                    href="#profile-tabs-icons" role="tab" aria-controls="preview" aria-selected="true">
                                    <i class="ni ni-badge text-sm me-2"></i> Mon Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" data-toggle="tab"
                                    href="#password" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="fa fa-lock text-sm me-2"></i> Mot de passe
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 tab-content clearfix">
        <div>
            @if($errors->any())
            <div class="mt-3  alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text text-white">
                    {{$errors->first()}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            @endif
            @if(session('success'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                    {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            @endif
        </div>
        <div class="card tab-pane active" id="profile-tabs-icons">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Information général') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/user-profile" method="POST" role="form text-left">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Nom complet') }}</label>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ auth()->user()->name }}" type="text"
                                        placeholder="Name" id="user-name" name="name">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Adresse Email') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ auth()->user()->email }}" type="email"
                                        placeholder="@example.com" id="user-email" name="email">
                                    @error('email')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">{{ __('Numero de téléphone')
                                    }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="tel" placeholder="40770888444" id="number"
                                        name="phone" value="{{ auth()->user()->phone }}">
                                    @error('phone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">{{ __('Localisation') }}</label>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Location" id="name"
                                        name="location" value="{{ auth()->user()->location }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">{{ 'A Propos de moi' }}</label>
                        <div class="@error('user.about')border border-danger rounded-3 @enderror">
                            <textarea class="form-control" id="about" rows="3"
                                placeholder="Say something about yourself"
                                name="about_me">{{ auth()->user()->about_me }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-logo-soft btn-md mt-4 mb-4">{{ 'Enregistrer les
                            modifications'
                            }}</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="card tab-pane" id="password">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Gestion des accès') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/admin-reset-password" method="POST" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="oldPassword" class="form-control-label">{{ __('Ancien mot de passe')
                                    }}</label>
                                <div class="@error('user.oldPassword')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="" type="password"
                                        placeholder="Ancien mot de passe" id="oldPassword" name="oldPassword">
                                    @error('oldPassword')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="newPassword" class="form-control-label">{{ __('Nouveau mot de passe')
                                    }}</label>
                                <div class="@error('newPassword')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="" type="password"
                                        placeholder="Nouveau mot de passe" id="newPassword" name="newPassword">
                                    @error('newPassword')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirmPassword" class="form-control-label">{{ __('Confirmation de mot de
                                    passe')
                                    }}</label>
                                <div class="@error('confirmPassword')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="" type="password"
                                        placeholder="Confirmation de mot de passe" id="confirmPassword"
                                        name="confirmPassword">
                                    @error('confirmPassword')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-logo-soft btn-md mt-4 mb-4">{{ 'Modifier mes accès'
                            }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
