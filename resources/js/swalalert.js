const annuler = document.querySelectorAll('.form-confirm-annuler').forEach(boutonAnnuler => {
    boutonAnnuler.addEventListener('click', e => {
        e.preventDefault();

        Swal.fire({
            title: "Êtes-vous sur d'annuler ?",
            text: "Confirmez-vous d'annuler cela ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, annuler",
            cancelButtonText: "Non"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = boutonAnnuler.href;
            }
        });
    });
});

const supprimerAbsence = document.querySelectorAll('.form-confirm-supprimer-absence').forEach(boutonSupprimerAbsence => {
    boutonSupprimerAbsence.addEventListener('submit', e => {
        e.preventDefault();

        Swal.fire({
            title: "Supprimer cette absence ?",
            text: "Confirmez-vous de vouloir supprimer cette absence ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, supprimer",
            cancelButtonText: "Non"
        }).then((result) => {
            if (result.isConfirmed) {
                boutonSupprimerAbsence.submit();
            }
        });
    });
});

const supprimerSalarie = document.querySelectorAll('.form-confirm-supprimer-salarie').forEach(boutonSupprimerSalarie => {
    boutonSupprimerSalarie.addEventListener('submit', e => {
        e.preventDefault();

        Swal.fire({
            title: "Supprimer ce salarié ?",
            text: "Confirmez-vous de vouloir supprimer '" + boutonSupprimerSalarie.dataset.salarie + "' ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, supprimer",
            cancelButtonText: "Non"
        }).then((result) => {
            if (result.isConfirmed) {
                boutonSupprimerSalarie.submit();
            }
        });
    });
});

const supprimerRole = document.querySelectorAll('.form-confirm-supprimer-role').forEach(boutonSupprimerRole => {
    boutonSupprimerRole.addEventListener('submit', e => {
        e.preventDefault();

        Swal.fire({
            title: "Supprimer ce rôle ?",
            text: "Confirmez-vous de vouloir supprimer le rôle '" + boutonSupprimerRole.dataset.role + "' ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, supprimer",
            cancelButtonText: "Non"
        }).then((result) => {
            if (result.isConfirmed) {
                boutonSupprimerRole.submit();
            }
        });
    })
});

const supprimerAbility = document.querySelectorAll('.form-confirm-supprimer-ability').forEach(boutonSupprimerAbility => {
    boutonSupprimerAbility.addEventListener('submit', e => {
        e.preventDefault();

        Swal.fire({
            title: "Supprimer cette abilitation ?",
            text: "Confirmez-vous de vouloir supprimer l'abilitation '" + boutonSupprimerAbility.dataset.ability + "' ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, supprimer",
            cancelButtonText: "Non"
        }).then((result) => {
            if (result.isConfirmed) {
                boutonSupprimerAbility.submit();
            }
        });
    })
});

const retirerAbility = document.querySelectorAll('.form-confirm-retirer-ability').forEach(boutonRetirerAbility => {
    boutonRetirerAbility.addEventListener('submit', e => {
        e.preventDefault();

        Swal.fire({
            title: "Retirer cette abilitation ?",
            text: "Confirmez-vous de vouloir retirer l'abilitation '" + boutonRetirerAbility.dataset.ability + "' ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, retirer",
            cancelButtonText: "Non"
        }).then((result) => {
            if (result.isConfirmed) {
                boutonRetirerAbility.submit();
            }
        });
    })
});
