import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap

import Swal from 'sweetalert2';
window.Swal = Swal;

import $ from 'jquery';
import select2 from 'select2';
window.$ = $;
window.jQuery = $;
select2();

document.addEventListener('DOMContentLoaded', () => {
    $('.select2').select2({
        placeholder: 'Rechercher...',
        allowClear: true,
        minimumResultsForSearch: 0
    });

    $('.select2-container .select2-selection--single').css('padding', '30px 4px');
});

import './swalalert';

import './tempusdominus';
