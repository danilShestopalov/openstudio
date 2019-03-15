<template>
    <div>
        <div class="ideas" v-for="idea in ideas">
            <div :class="idea_class">
                <img class="img" height="80px" width="80px" src="https://ph-files.imgix.net/952e7db5-1150-4f82-84f2-5352f0920b18?auto=format&auto=compress&codec=mozjpeg&cs=strip&w=80&h=80&fit=crop">
                <h3 class="title">{{ idea.title }}</h3>
                <p v-if="idea__id != idea.id" class="body" >
                    {{ previewBody(idea.body) }}
                </p>
                <p v-if="more && idea__id == idea.id " class="body" >
                    {{ idea.body }}
                </p>
                <button @click="like(idea.id)">{{ idea.likes }}</button>
                <p>{{ data }}</p>
                <div class="comments" v-if="show_comments && idea__id == idea.id">
                    <div class="comment" v-for="comment in comments">
                        <h4>{{ comment.body }}</h4>
                    </div>
                </div>
                <button class="more" v-if="idea__id != idea.id" @click="showMore(idea.id)" >More</button>
                <button class="more" v-if="idea__id == idea.id" @click="getComments(idea.id)" >Comments</button>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data: function() {
            return {
                idea_class: 'idea',
                ideas: [],
                more: false,
                comments: [],
                show_comments: false,
                idea__id: -1,
                data: [],
            }
        },
        mounted() {
            this.update();
        },
        computed: {

        },
        methods: {
            update: function() {
                axios.get('/api/ideas').then((response) => {
                    this.ideas = response.data;
                });
            },
            previewBody: function(body) {
                return body.toString().slice(0, 20) + '...';
            },
            showMore: function (idea_id) {
                this.more = true;
                this.idea__id = idea_id;
                this.show_comments = false;
            },
            getComments: function(id)  {
                this.idea_class = 'idea_comments';
                this.show_comments = true;
                axios.get('icomment/'+id).then((response) => {
                    this.comments = response.data;
                });
            },
            like: function(id)  {
                axios.post('idea/'+id+'/like').then((response) => {
                    this.data = response.data;
                });
            }
        }
    }
</script>


<style>
    .idea {
    display: grid;
    margin: 0 200px 0 200px;
    padding-bottom: 0;
    padding-top: 0;
    border-radius: 0;
    border: 1px solid #C1C1C1;
    grid-template-areas:
    'i t t . . '
    'i b b . m ';
    grid-gap: 0;
    background: white;
    }

    .idea_comments {
        display: grid;
        margin: 0 200px 0 200px;
        padding-bottom: 0;
        padding-top: 0;
        border-radius: 0;
        border: 1px solid #C1C1C1;
        grid-template-areas:
            'i t t . . '
            'i b b . m '
            '. c c c . ';
        grid-gap: 0;
        background: white;
    }

    .img {
    justify-self: center;
    align-self: center;
    grid-area: i;
    text-align: center;
    }

    .title {
    padding: 5px 50px 0 50px;
    text-align: left;
    grid-area: t;
    }
    .body {
    margin-top: 0;
    padding: 0 50px 0 50px;
    max-width: 500px;
    grid-area: b;
    color: #C1C1C1;
    }

    .comments {
        grid-area: c;
    }

    .more {
    grid-area: m;
    margin: 5px 20px 20px 20px;
    }
</style>
