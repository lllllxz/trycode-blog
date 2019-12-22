<template>
    <div>
        <button @click="click">dianji</button>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Test",
        data() {
            return {

            }
        },
        methods: {
            click (){
                this.$router.push('/test')
            }
        }

    }
</script>

<style scoped>

</style>
