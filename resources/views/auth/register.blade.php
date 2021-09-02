{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Roles -->
            <div class="form-group">
                <label for="roles_id">Roles</label>
                <select name="roles_id" id="roles_id" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->adminRoles }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('welcome',['titre' => 'Inscription'])

@section('content')
    <div class="container">
        <div class="row">
            @if (Session::has('erreur'))
            <div class="col-sm-12 alert alert-success alert-dismissible fade show p-4 shadow rounded" role="alert">
                <strong>{{ Session::get('erreur') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <div class="mx-auto col-md-7 shadow rounded p-4" style="margin-top:8rem;">
                <img style="margin: 0 auto;display:block;" src="../images/logo.png" alt="" width="150px;">
                <hr>
                <h2 class="text-muted text-center">Inscription</h2>

                <form action="{{ route('traitement.inscription') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="roles_id">Roles</label>
                        <select class="form-control" name="roles_id" id="roles_id">
                            @if($roles == null)
                                <option value=""></option>
                            @else
                                <option value=""></option>
                                @foreach ($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->adminRoles }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="passwordconfirm">Confirmer le mot de passe</label>
                        <input type="password" name="passwordconfirm" class="form-control" id="passwordconfirm">
                    </div>

                    <input type="submit" class="btn btn-primary btn-block"value="Inscription">
                    <br>
                    <small class="text-center d-block">J'ai déjà un compte ?<a href="{{ route('connexion') }}">Connexion</a></small>
                </form>
            </div>
        </div>
    </div>
@stop
