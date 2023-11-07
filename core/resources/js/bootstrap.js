window._ = require('lodash');

/**
 * Carregaremos a biblioteca HTTP axios que nos permite emitir requisições facilmente
 * ao nosso back-end do Laravel. Esta biblioteca lida automaticamente com o envio do
 * Token CSRF como um cabeçalho com base no valor do cookie de token "XSRF".
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
  * Echo expõe uma API expressiva para se inscrever em canais e ouvir
  * para eventos transmitidos pelo Laravel. Eco e transmissão de eventos
  * permite que sua equipe crie facilmente aplicativos da Web robustos em tempo real.
  */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
