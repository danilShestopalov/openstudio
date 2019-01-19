<template>

    <div class="card">
        <img class="avatar" :src="picture">
        <div class="infos">
            <div class="name capitalize">
                {{ name }}
            </div>
            <div class="birth">
                <i class="fas fa-fw fa-birthday-cake"></i>{{ birth }}
            </div>
            <div class="email">
                <i class="fas fa-fw fa-envelope"></i>{{ email }}
            </div>
            <div class="phone">
                <i class="fas fa-fw fa-phone"></i>{{ phone }}
            </div>
            <div class="nationality capitalize">
                <i class="fas fa-fw fa-globe-americas"></i>{{ nationality }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CardComponent.vue",
        el: 'main',
        data: {
            back: '',
            picture: 'https://image.flaticon.com/icons/svg/149/149992.svg',
            name: '',
            birth: '',
            email: '',
            phone: '',
            nationality: '',
        },
        beforeMount() {
            this.generate();
        },
        methods: {
            generate (gender) {
                var self = this;

                $.ajax({
                    url: 'https://uinames.com/api/?ext&maxlen=15' + ((gender != null && (gender == "male" || gender == "female")) ? '&gender=' + gender : ''),
                    dataType: 'json',
                    success: function(data) {

                        self.name = data.title + ' ' + data.name + ' ' + data.surname;

                        self.gender = data.gender;

                        self.birth = new Date(data.birthday.raw*1000).toLocaleDateString("en-US", { year: 'numeric', month: 'long', day: 'numeric' }) + ' (' + data.age + ' years old)';

                        self.email = data.email;

                        self.phone = data.phone;

                        self.nationality = data.region;

                        self.picture = data.photo;


                        var color = getRandomColor();
                        var color1 = shadeColor(color, 40);
                        var color2 = shadeColor(color, -40);
                        self.back = "linear-gradient(45deg, " + color1 + " 0%, " + color2 + " 100%)";
                    }
                });
            },
        }
    }

</script>

<style scoped>

</style>
