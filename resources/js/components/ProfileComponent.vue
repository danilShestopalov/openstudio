<template>
    <div class="mainstartuppost">
        <div class="onepost" v-for="startup in startups">
            <a :href="'/startup/' + startup.id"><img :src="'/uploads/startup/logo/' + startup.logo" alt=""></a>
            <div class="fr2">
                <a :href="'/startup/' + startup.id">
                    <h1>{{ startup.title }}</h1>
                    <p>{{ startup.tagline }}</p>
                </a>
                <div v-if="user_status == 1">
                    <a class="like" @click="putLike(startup.id)">
                    <span>{{ startup.likes }}</span>
                    <img src="/img/poly.png" alt="">
                    </a>
                </div>
                <div v-else>
                    <a class="like" href="/auth">
                        <span>{{ startup.likes }}</span>
                        <img src="/img/poly.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: {
            url: String,
        },
        data: function() {
            return {
                user_status: 0,
                startups: [],
            }
        },
        mounted() {
            this.update();
            this.userStatus();
        },
        computed: {

        },
        methods: {
            update: function() {
                axios.get(this.url).then((response) => {
                    this.startups = response.data;
                });
            },
            userStatus: function() {
                axios.get('/api/status').then((response) => {
                    this.user_status = response.data;
                });
                console.log(this.user_status);
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
    .fr2{
        grid-template-columns: 1fr 1fr;
        grid-gap: 5%;
    }
    .like{
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        line-height: normal;
        font-size: 24px;
        color: #385E6E;
        border: 2px solid #B2DFF3;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        border-radius: 5px;
        display: -ms-grid;
        display: grid;
        margin-left: 20%;
        margin-top: 3%;
        -ms-grid-columns: 1fr 1fr;
        grid-template-columns: 1fr 1fr;
        width: 80%;
        height: 100%;
        -ms-grid-column-align: center;
        justify-self: center;
    }
    .like img{
        height: 20px;
        width: 20px;
        display: grid;
        align-self: center;
    }
    .like span{
        display: grid;
        align-self: center;
        justify-self: end;
        font-size: 20px;
    }
    .onepost{
        grid-template-rows: 2fr 1fr;
        justify-self: center;
    }
    .mainstartuppost{
        grid-template-columns: repeat(auto-fit, minmax(250px, 260px));
    }
    @media screen and (max-width: 1440px){
        .onepost{
            width: 240px;
            height: 280px;
        }
    }
</style>
