<template>
    <div>
        <h2>basdjkl;</h2>
        <button @click="showAll">SHOWALL</button>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                posts: [],
            };
        },
        mounted: function() {
            this.update();
        },
        methods: {
            showAll: function () {
                axios.get('api/blog').then((response) => {
                    console.log(response);
                    this.posts = response.data;
                })

            }
        },

    }
</script>
