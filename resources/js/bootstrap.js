window._ = require('lodash');
window.moment = require('moment');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
} catch (e) {
    console.log(e);
}

require('./libs/default/datatables');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';