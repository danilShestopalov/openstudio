<template>
    <div class="tag">
        <ul class="tags">
           <li v-for="tag in tags" @click="appendTag(tag)">{{ tag.name }}</li>
        </ul>
        <ul class="tags" v-model="selected_tags">
            <li class="active" @click="deleteTag(id)" v-for="(tag, id) in selected_tags">
                {{ tag.name }}
                <input hidden :name="name + '[]'" v-bind:value="tag.id"/>
            </li>
        </ul>
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
                show_tags: false,
                isActive: false,
                active_tags: [],
            }
        },
        mounted() {
            this.getTags();
        },
        methods: {
            getTags: function() {
                axios.get(this.url).then((response) => {
                    this.tags = Object.values(response.data);
                });
            },
            appendTag: function (tag) {
                if(this.selected_tags.length != 0) {
                    for(let i = 0; i < this.selected_tags.length; i++){
                        if(this.selected_tags[i]['name'] == tag.name){
                            this.selected_tags.splice(i, 1);
                            return;
                        }
                    }
                }
                this.selected_tags.push(tag);
                this.active_tags.push(tag.id);
                this.isActive = true;
            },
            deleteTag: function (id) {
                this.selected_tags.splice(id, 1);
            },
            showTags: function () {
                if(this.show_tags){
                    this.show_tags = false;
                } else {
                    this.show_tags = true;
                }
            }
        },
    }
</script>


<style>
    .tags{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr;
        /*grid-area: ;*/
        grid-gap: 10px;
        padding: 2% 0;
    }
    .tags li{
        background: #FFFFFF;
        border: 1px solid #CCCCCC;
        box-sizing: border-box;
        border-radius: 5px;
        height: 35px;
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: normal;
        text-align: center;
        display: grid;
        align-items: center;
        color: #cccccc;
    }
    .tags .active {
        color: #23A4DD;
        border: 1px solid #23A4DD;
    }

    /*.taggrid{*/
        /*display: grid;*/
        /*grid-template-columns: 1fr 1fr 1fr 2fr;*/
        /*grid-gap: 10px;*/
    /*}*/
    /*.tag{*/
        /*display: grid;*/
        /*align-items: center;*/
        /*background: #FFFFFF;*/
        /*border: 1px solid #23A4DD;*/
        /*cursor: pointer;*/
        /*box-sizing: border-box;*/
        /*border-radius: 5px;*/
        /*height: 35px;*/
        /*font-family: Roboto;*/
        /*font-style: normal;*/
        /*font-weight: normal;*/
        /*font-size: 16px;*/
        /*line-height: normal;*/
        /*text-align: center;*/
        /*color: #23A4DD;*/
    /*}*/
    /*.show{*/
        /*height: 35px;*/
        /*display: grid;*/
        /*width: 50%;*/
        /*justify-self: end;*/
        /*align-items: center;*/
        /*background: #23A4DD;*/
        /*border-radius: 5px;*/
        /*cursor: pointer;*/
        /*font-family: Roboto;*/
        /*font-style: normal;*/
        /*font-weight: 500;*/
        /*font-size: 1px;*/
        /*line-height: normal;*/
        /*text-align: center;*/
        /*color: #FFFFFF;*/
    /*}*/
    /*.hiddentags{*/
        /*display: grid;*/
        /*grid-template-columns: 1fr 1fr 1fr 1fr;*/
        /*grid-template-rows: 1fr 1fr;*/
        /*grid-gap: 10px;*/
        /*padding: 2% 5%;*/
        /*height: 100px;*/
        /*overflow: scroll;*/
    /*}*/
    /*.hiddentags div{*/
        /*background: #FFFFFF;*/
        /*border: 1px solid #CCCCCC;*/
        /*box-sizing: border-box;*/
        /*border-radius: 5px;*/
        /*height: 40px;*/
        /*font-family: Roboto;*/
        /*font-style: normal;*/
        /*font-weight: normal;*/
        /*font-size: 14px;*/
        /*line-height: normal;*/
        /*text-align: center;*/
        /*display: grid;*/
        /*align-items: center;*/
        /*color: #cccccc;*/
    /*}*/
    /*.hiddentags .active {*/
        /*color: #23A4DD;*/
    /*}*/

    /*.active{*/
        /*display: grid !important;*/
    /*}*/
    /*.inactive {*/
        /*display: none !important;*/
    /*}*/

</style>
