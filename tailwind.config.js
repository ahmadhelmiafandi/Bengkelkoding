import defaultTheme from 'tailwindcss/defaultTheme'
import daisyui from 'daisyui'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary-blue': '#2d4499',
                'edit-orange': '#f59e0b',
                'delete-red': '#ef4444',
            }
        },
    },

    plugins: [daisyui],
}
