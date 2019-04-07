<template>
        <ul>
            <li v-for="startup in startups">
                <img class="logo" :src="'/uploads/startup/logo/'+ startup.logo" width="108px" height="108px"  alt="">
                <div class="div1">
                    <h1>{{ startup.title }}</h1>
                    <p>{{ previewBody(startup.info) }}</p>
                    <button>More</button>
                </div>
                <a class="div2" @click="putLike(startup.id)">
                    <span>{{ startup.likes }}</span>
                    <img src="/img/poly.png" alt="">
                </a>
            </li>
        </ul>
</template>


<script>
    export default {
        data: function() {
            return {
                startups: [],
            }
        },
        mounted() {
            this.update();
        },
        computed: {

        },
        methods: {
            update: function() {
                axios.get('/api/startups/top').then((response) => {
                    this.startups = response.data;
                });
            },

            previewBody: function(body) {
                return body.toString().slice(0, 14) + '...';
            },

            putLike: function(id) {
                axios.post('/api/startup/'+ id + '/like').then((response) => {
                    for(let i = 0; i < this.startups.length; i++){
                        // console.log(this.startups[1]['id']);
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
</style>
