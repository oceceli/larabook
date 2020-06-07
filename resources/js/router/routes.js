import Vue from 'vue';
import VueRouter from 'vue-router';
import Example from '../views/Example';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Example,
        }
    ],

    mode: 'history',
});