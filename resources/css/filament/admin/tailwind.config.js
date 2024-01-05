import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/filament/**/**/*.blade.php',
        './resources/views/filament/**/**/pages/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            width: {
                '1/5': '20%',
                '2/5': '40%',
                '3/5': '60%',
                '4/5': '80%',
                '1/4': '25%',
                '2/4': '50%',
                '3/4': '75%',
            },
            borderWidth: {
                bottom:{
                    '2': '2px',
                    '3': '3px',
                    '4': '4px',
                }
            }
        }
    }
}
