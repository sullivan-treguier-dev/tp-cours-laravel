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
                window.location.submit = boutonSupprimerAbsence.submit;
            }
        });
    });
})

