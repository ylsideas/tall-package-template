const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    // By default we allow all styles on compilation
    // ignore warning about unused styles
    purge: false,

    // If you wish to purge unused styles you should uncomment the following
    // and remove the previous purge property above
    // mode: 'jit',
    // purge: [
    //     './resources/views/**/*.blade.php',
    // ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
