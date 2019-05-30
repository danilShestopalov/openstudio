<template>

    <div class="arts" >
        <div v-for="post in posts"  :style="{ backgroundImage: 'linear-gradient(360deg, rgba(0, 0, 0, 0.65) 0%, rgba(255, 255, 255, 0) 100%), url(' + '/uploads/posts/' + post.image + ')' }">
            <h1>{{ post.title }}</h1>
            <!--<p>{{ previewBody(post.body) }}</p>-->
        </div>
    </div>
</template>


<script>
    export default {
        data: function() {
            return {
                posts: [],
            }
        },

        mounted() {
            this.update();
        },

        methods: {
            update: function() {
                axios.get('api/posts/top').then((response) => {
                    this.posts = response.data;
                });
            },

            previewBody: function(body) {
                return body.toString().slice(0, 20) + '...';
            },

            putLike: function(id) {
                axios.post('api/startup/'+ id + '/like').then((response) => {
                    for(let i = 0; i < this.startups.length; i++){
                        console.log(this.startups[1]['id']);
                         if(this.startups[i]['id'] == id){
                            this.startups[i]['likes'] = response.data;
                        }
                    }
                });
            },

            getComments: function(id)  {
                this.idea_class = 'idea_comments';
                this.show_comments = true;
                axios.get('icomment/'+id).then((response) => {
                    this.comments = response.data;
                });
            },
        }
    }
</script>


<style>
   .arts div{
       padding: 10px;
       /*filter: blur(20px);*/
       /*backdrop-filter: blur(4px);*/
       /*background-color: rgba(255, 255, 255, 0.5);*/
   }
</style>
