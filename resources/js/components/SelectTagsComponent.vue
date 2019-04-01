<template>
    <div class="tag">
        <select multiple>
            <option v-for="tag in tags" @click="appendTag(tag)" v-bind:value="tag.name">{{ tag.name }}</option>
        </select>

        <h3>Выбранные объекты</h3>
        <div v-model="selected_tags">
            <span class="span" @click="deleteTag(tag.name)" v-for="tag in selected_tags">{{ tag.name }}</span>
        </div>

        <div v-for="tagi in selected_tags">
            <input v-bind:name="name + '[]'" hidden v-bind:value="tagi.id"/>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            url: String,
            name: String,
        },
        data() {
            return {
                tags: [],
                selected_tags: [],
                input_value: '',
            }
        },
        mounted() {
            this.getTags();
        },
        methods: {
            getTags: function() {
                axios.get(this.url).then((response) => {
                    this.tags = response.data;
                    console.log(this.url);
                });
            },
           appendTag: function (tag) {
               this.selected_tags.push(tag);
           },
            deleteTag: function (tag) {
                this.selected_tags.splice(this.selected_tags.indexOf(tag), 1);
            }

        },
    }
</script>

<style>

    .tag .span {
        height: 35px !important;
        width: 300px !important;
        background: #FFFFFF;
        border: 1px solid #23A4DD;
        box-sizing: border-box;
        border-radius: 5px;
        color: #23A4DD
    }
</style>
