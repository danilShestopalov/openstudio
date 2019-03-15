<template>
    <div class="form-group block">
        <label>3. Соблюдает ли Организация законы и/или иные нормативные правовые акты, указанные выше в строке 2?</label>
        <div>
            <input type="radio" class="form-control" name="3"  v-on:click="no()"><label>Нет</label>
            <input type="radio" class="form-control" name="3"  v-on:click="yes()"><label>Да</label>
            <div class="form-group" v-if="seen3 == 'yes'">
                <label><strong>Указажите даты утверждения данных политик и процедур и даты их последних обновлений.</strong></label>
                <input type="text" class="form-control" name="3">
            </div>
            <div class="form-group" v-if="seen3 == 'no'">
                <label><strong>Укажите, намерена ли Организация разработать такие политики и процедуры.</strong></label>
                <input type="text" class="form-control" name="3">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
          this.update;
        },
        data: function() {
            return {
                seen3: ''
            }
        },
        methods: {
            no: function() {
                this.seen3 = 'no'
            },
            yes: function() {
                this.seen3 = 'yes'
            },
        }
    }
</script>
