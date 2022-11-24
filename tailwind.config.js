const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            transitionDuration: {
                '0': '0ms',
                '3000': '3000ms',
            },
            animation:{
                blob: "blob 8s infinite",
            },
            keyframes:{
                blob: {
                    "0%" : {
                        transform: "translate(0px, 0px) scale(1)",
                    },
                    "33%" : {
                        transform: "translate(15px, -30px) scale(1.05)",
                    },
                    "66%" : {
                        transform: "translate(-15px, 20px) scale(0.95)",
                    },
                    "100%" : {
                        transform: "translate(0px, 0px) scale(1)",
                    },
                }
            },
            height: {
                '128': '32rem',
                '112': '28rem'
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms')
    ],
};
