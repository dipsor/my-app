
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$laroute = require('./laroute.js');

const eventBus = new Vue();

Vue.mixin({
    data: function () {
        return {
            eventBus: eventBus
        }
    }
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('users-list', require('./components/UsersListComponent.vue'));
Vue.component('users-form', require('./components/UsersFormComponent.vue'));
Vue.component('left-sidebar', require('./components/LeftSidebarComponent.vue'));
Vue.component('navigation', require('./components/NavigationComponent.vue'));
Vue.component('users-profile', require('./components/UsersProfileComponent.vue'));

const app = new Vue({

    el: '#app',


});



