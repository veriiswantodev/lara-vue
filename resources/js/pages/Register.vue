<template>
    <div>
        <h1>Register</h1>

        <form @submit.prevent="handleSubmit" action="/users" method="post">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" v-model="form.name">
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="text"  v-model="form.email">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="text"  v-model="form.password">
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return{
            form: {
                name: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        handleSubmit(){
            console.log(this.form)
            axios.post('/api/users', this.form).then((response) =>{

                if(response.data.status){
                console.log(response)
                    alert(response.data.message)
                //redirect halaman
                this.$router.push({
                    name: 'User'
                //end redirect
                })
                }
            }).catch((error) => {
                console.log(error)
            })
        }
    }
}
</script>

<style>
    .input-group{
        margin-bottom: 5px;
    }
</style>
