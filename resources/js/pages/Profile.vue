<template>
    <div>
        <section v-if="id">
            <h1>Hello {{detailuser.name}}</h1>
            <p>Email : {{detailuser.email}}</p>
            <router-link :to="{name: 'User'}">Kembali</router-link>
        </section>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data(){
        return{
            detailuser: {}
        }
    },

    mounted(){
        this.getUser()

        // fetch('/api/users')
        // .then(response => response.json())
        // .then(data => {
        //     console.log(data)
        //     this.users = data
        // })
    },
    methods:{

        getUser(){
            axios.get('/api/users/' +this.id).then((response) =>{
            console.log(response)
            this.detailuser = response.data

        })
    }
    }
}
</script>
