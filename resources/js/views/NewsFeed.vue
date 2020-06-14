<template>
    <div class="flex flex-col items-center py-4">
        <NewPost />
        <Post v-for="(post, index) in posts.data" :key="index" 
            :description="post.data.attributes.body"
            :posted_by="post.data.attributes.posted_by.data.attributes.name"
            :posted_on="post.data.attributes.posted_on" />
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
        }
    },

    mounted() {
        axios.get('/api/posts')
            .then(res => {
                this.posts = res.data;
            })
            .catch(error => {
                console.log('Veri çekilirken bir hata oluştu: ' + error);
            });
    },
    
}
</script>