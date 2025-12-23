/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: '#3b82f6',
                'primary-dark': '#1d4ed8',
                secondary: '#10b981',
                dark: '#1f2937',
                light: '#f9fafb',
            },
            fontFamily: {
                'sans': ['Figtree', 'sans-serif'],
            },
        },
    },
    plugins: [],
}