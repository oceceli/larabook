
const state = {
    title: 'Larabook'
}

const getters = {
    pageTitle: state => {
        return state.title;
    }
}

const actions = {
    setPageTitle({commit, state}, title) {
        commit('setTitle', title);
    }
}

const mutations = {
    setTitle(state, title) {
        state.title = title + ' | Larabook';
        document.title = state.title;
    }
}

export default {
    state, getters, actions, mutations,
}

