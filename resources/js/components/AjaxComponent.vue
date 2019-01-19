<template>
    <div class="container">
       <!--<button @click="update" class="btn btn-danger text mb-1" v-if="!is_refresh">Обновить - {{id}}...</button>-->
        <!--<span class="badge badge-primary mb-1" v-if="is_refresh">Обнов ...</span>-->
        <table class="table" @click="update">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>URL</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="url in urldata">
                <td>{{url.title}}</td>
                <td>{{url.url}}</td>
                <td>{{id}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                urldata: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
           this.update()
        },
        methods: {
            update: function () {
                axios.get('/start').then((response) => {
                    console.log(response);
                    this.urldata = response.data;
                    this.is_refresh = false;
                    this.id++;
                });
            }
        }
    }
</script>
