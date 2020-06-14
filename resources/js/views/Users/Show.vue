<template>
    <div class="flex flex-col items-center">
        <p v-if="userLoading">Kullanıcı yükleniyor...</p>
        <div v-else class="relative mb-8">
            <div class="w-100 h-64 overflow-hidden z-10">
                <img class="object-cover w-full " src="https://i0.wp.com/digital-photography-school.com/wp-content/uploads/2019/10/Fake-It-to-Make-It-Wheatfield-Windmill.jpg?fit=1500%2C1000&ssl=1" alt="cover photo">
            </div>
            <div class="absolute bottom-0 left-0 z-20 -mb-8 ml-12 flex items-center">
                <div>
                    <img src="https://i.pravatar.cc/200" alt="user-profile-image" class="w-32 h-1w-32 shadow-lg object-cover rounded-full border-2 border-gray-200">
                </div>
                <p class="ml-4 text-2xl text-gray-100">{{ user.data.attributes.name }}</p> 
            </div>
        </div>
        <p v-if="postLoading">Akış yükleniyor...</p>
        <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post" />
        <p v-if="!postLoading && posts.data.length < 1" class="mt-32">Bu kullanıcıya ait hiçbir paylaşım bulunamadı...</p>
    </div>
</template>

<script>
import Post from '../../components/Post';
export default {

    components: {
        Post,
    },

    data() {
        return {
            user: null,
            posts: null,
            userLoading: true,
            postLoading: true,
        }
    },

    mounted() {
        axios.get('/api/users/' + this.$route.params.userId)
            .then(res => {
                this.user = res.data;
            })
            .catch(error => {
                console.log('Veri çekilirken bir hata oluştu: ' + error)
            })
            .finally(() => {
                this.userLoading = false;
            });

        axios.get('/api/users/' + this.$route.params.userId + '/posts')
            .then(res => {
                this.posts = res.data;
            })
            .catch(error => {
                console.log('Veri çekilirken bir hata oluştu: ' + error);
            })
            .finally(res => {
                this.postLoading = false;
            });
    },
}
</script>