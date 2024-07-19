import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import daisyui from "daisyui";


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/**/**/*.vue',

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Trirong','Figtree', ...defaultTheme.fontFamily.sans],
                //serif: ['Pridi', ...defaultTheme.fontFamily.sans],    //เปลี่ยน font จาก google
               
            },
        },
    },
    daisyui: {
        themes: ["light"],
    },

    plugins: [daisyui]
};
