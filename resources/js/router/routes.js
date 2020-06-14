import Vue from 'vue';
import VueRouter from 'vue-router';
import NewsFeed from '../views/NewsFeed';
import UserShow from '../views/Users/Show';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: NewsFeed,
            meta: { title: 'Akış' }
        },
        {
            path: '/users/:userId', 
            name: 'user.show', 
            component: UserShow,
            meta: { title: 'Profil' }
        },
        // {
        //     path: '/posts/:userId',
        //     name: 'post.show',
        //     component
        // }
    ],

    mode: 'history',
});