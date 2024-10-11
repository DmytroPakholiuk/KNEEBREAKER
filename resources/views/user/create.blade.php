@extends('adminlte::page')

@section('plugins.BsCustomFileInput', true)
@section('plugins.KrajeeFileinput', true)

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Users \ Create new User</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 card py-3 px-3">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <x-adminlte-input name="name" label="Name" placeholder="Enter name" value="{{ old('name') }}"
                                          fgroup-class="col-12"/>
                    </div>

                    <div class="row">
                        <x-adminlte-input type="email" name="email" label="Email" placeholder="Enter email" value="{{ old('email') }}"
                                          fgroup-class="col-12"/>
                    </div>

                    <div class="row">
                        <x-adminlte-input type="password" name="password" label="Password" placeholder="Enter password"
                                          fgroup-class="col-12"/>
                    </div>

                    <div class="row">
                        <x-adminlte-input type="password" name="password_confirmation" label="Password Confirmation" placeholder="Enter password again"
                                          fgroup-class="col-12"/>
                    </div>


                    <div class="row">
                        <x-adminlte-select name="role" label="Role" fgroup-class="col-12">
                            <x-adminlte-options
                                :options="[\App\RBAC\Roles\UserRoles::ADMIN->value => 'Admin', \App\RBAC\Roles\UserRoles::EMPLOYEE->value => 'Employee']"
                                selected="{{ old('role', \App\RBAC\Roles\UserRoles::ADMIN->value) }}"/>
                        </x-adminlte-select>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <x-adminlte-button label="Save" theme="success" type="submit"/>
                        <a href="{{ route('users.index') }}"><x-adminlte-button label="Cancel" theme="secondary"/></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
