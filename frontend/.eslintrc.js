module.exports = {
    "rules": {
        "no-mixed-spaces-and-tabs": 0, // disable rule
    },
    root: true,
    env: {
        node: true
    },
    'extends': [
        'plugin:vue/essential',
        "plugin:vue/base",
        'eslint:recommended'
    ],
    rules: {
        'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
        'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
        'no-unused-vars':'off'
    },
    parserOptions: {
        parser: 'babel-eslint'
    }
}
