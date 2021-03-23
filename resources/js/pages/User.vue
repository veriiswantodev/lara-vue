<template>
    <div>
        <section>
            <h1>Daftar User</h1>
            <router-link :to="{name: 'Register'}">Regiter</router-link>
            <ul>
                <li v-for="user in users">
                    <!-- <router-link :to="profile_uri(user.name)">{{user.name}}</router-link> -->
                    <a href="" @click.prevent="lihatuser(user.id)">{{user.name}}</a>

                </li>
            </ul>
        </section>
    </div>
</template>

<script>
export default {
    data(){
        return{
            users: []
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
            axios.get('/api/users').then((response) =>{
            // console.log(response)
            this.users = response.data
        })
        },

        profile_uri(name){
            return '/user/' +name.toLowerCase()
        },
        lihatuser(id){
            this.$router.push({
                name: 'Profile',
                params: {id}
            })
        }
    }
}
</script>
