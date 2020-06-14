
const state = {
    user: null,
    userStatus: null,
};

const getters = {
    authUser: state => {
        return state.user;
    }
};

const actions = {
    fetchAuthUser({commit, state}) {
        axios.get('/api/auth-user')
            .then(res => {
                commit('setAuthUser', res.data)
            })
            .catch(error => {
                console.log('Veri çekilirken bir hata oluştu' + error);
            });
    },
};

const mutations = {
    setAuthUser(state, user) {
        state.user = user;
    }
};


export default {
    state, getters, actions, mutations,
}