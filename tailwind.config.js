/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                bg: '#0b0b0f',
                neon: '#00FFAA',
                magenta: '#FF2D95',
                cyan: '#00A3FF'
            },
            boxShadow: {
                'neon-md': '0 6px 30px rgba(0,255,170,0.12), 0 0 18px rgba(0,255,170,0.06)'
            },
            keyframes: {
                pulseNeon: {
                    '0%,100%': { boxShadow: '0 0 0 0 rgba(0,255,170,0.0)' },
                    '50%': { boxShadow: '0 0 12px 4px rgba(0,255,170,0.08)' },
                },
                float: {
                    '0%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-6px)' },
                    '100%': { transform: 'translateY(0px)' }
                }
            },
            animation: {
                'pulse-neon': 'pulseNeon 2.4s infinite',
                'float-slow': 'float 6s ease-in-out infinite'
            }
        }
    },
    plugins: []
}