import './bootstrap';
import 'flowbite';

import Datepicker from 'flowbite-datepicker/Datepicker';
import DateRangePicker from 'flowbite-datepicker/DateRangePicker';
import uk from "flowbite-datepicker/locales/uk";

// livewire selelct2 init
window.Livewire.on('x-select-init', (param) => {
    if(param[0].class){
        let params = {
            width: param[0].width,
        }
        if(!param[0].searchable){
            params.minimumResultsForSearch = 'Infinity';
        }

        if(param[0].disabled){
            params.disabled = true;
        }

        if(param[0].ajax_url){
            params = {
                ...params,
                minimumInputLength:  param[0].minimum_input_length,
                ajax: {
                    url: param[0].ajax_url,
                    dataType: "json",
                    type: "GET",
                    data: function (params) {
                        var queryParameters = {
                            term: params.term
                        }
                        return queryParameters;
                    },
                }
            }
        }

        $("." + param[0].class).select2(params);
    }
});

// livewire datepicker init
window.Livewire.on('x-datepicker-init', (param) => {
    if(param[0].id){
        let options = {
            format: param[0].format,
            language: 'uk',
            autohide: true,
            weekStart: 1,
            todayHighlight: true,

        }

        // daysOfWeekDisabled: [0,1],
        // todayBtn: true,
        //     clearBtn: true,
        // minDate : new Date()

        let datepickerEl = document.getElementById(param[0].id);
        Object.assign(Datepicker.locales, uk);
        new Datepicker(datepickerEl, options);
    }
});

// livewire datepicker init
window.Livewire.on('x-daterangepicker-init', (param) => {
    if(param[0].id){
        let options = {
            format: param[0].format,
            language: 'uk',
            autohide: true,
            weekStart: 1,
            todayHighlight: true,
        }

        // daysOfWeekDisabled: [0,1],
        // todayBtn: true,
        //     clearBtn: true,
        // minDate : new Date()

        console.log(param[0]);

        let datepickerEl = document.getElementById(param[0].id);

        // Object.assign(DateRangePicker.locales, uk);
        new DateRangePicker(datepickerEl, options);
    }
});
