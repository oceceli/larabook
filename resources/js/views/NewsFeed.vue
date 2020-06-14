<template>
    <div class="flex flex-col items-center py-4">
        <NewPost />
        <p v-if="loading">Yükleniyor...</p>
        <Post v-else v-for="post in posts.data" 
            :key="post.data.post_id" 
            :post="post"
        />
    </div>
</template>

<script>
import NewPost from '../components/NewPost';
import Post from '../components/Post';
export default {

    components: {
        NewPost, Post
    },

    data() {
        return {
            posts: null,
            loading: true,
        }
    },

    mounted() {
        axios.get('/api/posts')
            .then(res => {
                this.posts = res.data;
            })
            .catch(error => {
                console.log('Veri çekilirken bir hata oluştu: ' + error);
            })
            .finally(res => {
                this.loading = false;
            });
    },
    
}
</script>