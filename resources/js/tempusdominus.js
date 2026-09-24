import * as tempusDominus from '@eonasdan/tempus-dominus';
import '@eonasdan/tempus-dominus/dist/css/tempus-dominus.min.css';

const dateDebut = document.getElementById('date_debut');
const dateFin = document.getElementById('date_fin');

const options = {
    localization: {
        locale: 'fr',
        format: 'dd/MM/yyyy HH[h]mm'
    },

    display: {
        viewMode: 'calendar',
        components: {
            calendar: true,
            date: true,
            month: true,
            year: true,
            decades: true,
            clock: true,
            hours: true,
            minutes: true,
            seconds: false,
        }
    }
};

if (dateDebut) {
    new tempusDominus.TempusDominus(dateDebut, options);
}

if (dateFin) {
    new tempusDominus.TempusDominus(dateFin, options);
}

