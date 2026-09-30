@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>{{ __('Dashboard') }}</h1>
        <p>{{ __("You're logged in to the Follow-Up !") . ' ' . __('Welcome') }} {{ auth()->user()->prenom }} !</p>
        <div class="d-flex justify-content-center gap-4">
            <div>
                <div class="text-center text-white border border-black rounded-top-3 bg-info display-1 p-2">
                    <i class="bi bi-folder-fill"></i>
                </div>
                <div class="border border-black rounded-bottom-3 fw-bold p-2">
                    {{ __('Number of absences') }} : <span id="absenceCount">0</span>
                </div>
            </div>
            <div>
                <div class="text-center text-white border border-black rounded-top-3 bg-primary display-1 p-2">
                    <i class="bi bi-person-vcard-fill"></i>
                </div>
                <div class="border border-black rounded-bottom-3 fw-bold p-2">
                    {{ __('Number of employees') }} : <span id="salarieCount">0</span>
                </div>
            </div>
            <div>
                <div class="text-center text-white border border-black rounded-top-3 bg-secondary display-1 p-2">
                    <i class="bi bi-file-person-fill"></i>
                </div>
                <div class="border border-black rounded-bottom-3 fw-bold p-2">
                    {{ __('Number of roles') }} : <span id="roleCount">0</span>
                </div>
            </div>
            <div>
                <div class="text-center text-white border border-black rounded-top-3 bg-success display-1 p-2">
                    <i class="bi bi-hand-index-thumb-fill"></i>
                </div>
                <div class="border border-black rounded-bottom-3 fw-bold p-2">
                    {{ __('Number of abilities') }} : <span id="abilityCount">0</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const salarieCount = {{ $nbSalaries }};
        const absenceCount = {{ $nbAbsences }};
        const roleCount = {{ $nbRoles }};
        const abilityCount = {{ $nbAbility }};

        const salarieElement = document.getElementById('salarieCount');
        const absenceElement = document.getElementById('absenceCount');
        const roleElement = document.getElementById('roleCount');
        const abilityElement = document.getElementById('abilityCount');

        let salarieCurrent = 0;
        let absenceCurrent = 0;
        let roleCurrent = 0;
        let abilityCurrent = 0;
        const duration = 1500;
        const salarieIncrement = salarieCount / (duration / 16);
        const absenceIncrement = absenceCount / (duration / 16);
        const roleIncrement = roleCount / (duration / 16);
        const abilityIncrement = abilityCount / (duration / 16);

        const timer = setInterval(() => {
            salarieCurrent += salarieIncrement;
            absenceCurrent += absenceIncrement;
            roleCurrent += roleIncrement;
            abilityCurrent += abilityIncrement;

            if (salarieCurrent >= salarieCount) {
                salarieCurrent = salarieCount;
                clearInterval(timer);
            }

            if (absenceCurrent >= absenceCount) {
                absenceCurrent = absenceCount;
                clearInterval(timer);
            }

            if (roleCurrent >= roleCount) {
                roleCurrent = roleCount;
                clearInterval(timer);
            }

            if (abilityCurrent >= abilityCount) {
                abilityCurrent = abilityCount;
                clearInterval(timer);
            }

            salarieElement.textContent = Math.floor(salarieCurrent);
            absenceElement.textContent = Math.floor(absenceCurrent);
            roleElement.textContent = Math.floor(roleCurrent);
            abilityElement.textContent = Math.floor(abilityCurrent);
        }, 16);
    </script>
@endsection
