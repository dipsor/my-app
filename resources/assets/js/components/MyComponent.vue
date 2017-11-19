<template id="my-template">
    <div>
        <h2>{{ subject }}</h2>
        <button @click="count +=1">{{ count }}</button>
    </div>

</template>

<script>
    export default {
        data () {
            return {
                count: 0,

            }
        },
        props: ['subject'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>