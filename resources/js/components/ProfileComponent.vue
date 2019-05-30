<template>
    <div class="">
        <section class="prof" :style="{ 'background': 'url('+'/uploads/profile/background/' + profiles[id].background + ')'}">
            <img :src="'/uploads/profile/avatar/'+ profiles[id].avatar" alt="">
            <div class="profinfo">
                <h1>{{ '@' + profiles[id].nickname }}</h1>
                <a @click="getProfessionsAndSkills(profiles[id+1].id)">Отправить запрос</a>
            </div>
        </section>
        <section class="under">
            <div class="sometext">
                <h1>About me</h1>
                <p>{{ profiles[id].about }}</p>
            </div>
            <div class="tagsdiv">
                <h1>Tags</h1>
                <div>
                    <button>{{ professions.name }}</button>
                </div>
            </div>
            <div class="tagsdiv">
                <h1>Tags</h1>
                <div>
                    <button>{{ skills.name }}</button>
                </div>
            </div>
        </section>
    </div>
</template>


<script>
    export default {
        data: function() {
            return {
                id: 0,
                user_status: 0,
                profiles: [],
                skills: [],
                professions: [],
            }
        },
        beforeMount(){
            this.getProfiles();
            this.getSkills();
            this.getProfessions();
        },
        mounted() {
            this.getSkills();
            this.getProfessions();
        },
        computed: {

        },
        methods: {
            getProfiles: function() {
                axios.get('/api/profiles').then((response) => {
                    this.profiles = response.data;

                });
            },
            getSkills: function() {
                axios.get('/api/profile/skills/' + this.profiles[this.id].id ).then((response) => {
                    this.skills = response.data;
                    console.log(this.skills);
                });
            },
            getProfessions: function(){
                axios.get('/api/profile/professions/' + this.profiles[this.id].id).then((response) => {
                    this.professions = response.data;
                    console.log(this.professions);
                });
            },
            getProfessionsAndSkills: function(profile_id) {
                // this.id += 1;
                axios.get('/api/profile/skills/' + profile_id ).then((response) => {
                    this.skills = response.data;
                    console.log(this.skills);
                });
                axios.get('/api/profile/professions/' + profile_id).then((response) => {
                    this.professions = response.data;
                    console.log(this.professions);
                });
            },
        }
    }
</script>


<style>
</style>
