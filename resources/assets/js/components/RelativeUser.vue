<template>
    <div class="panel panel-default">
        <div class="panel-heading">Relative User</div>
        <div class="panel-body">
            <div class="row" v-model="users" id="friends">
                <div class="col-sm-2" v-for="user in users" :value="user.id">
                    <div v-if="user.avatar != ''"><img :src="user.avatar"></div>
                    <div>{{ user.name }}</div>
                    <div>{{ user.email }}</div>
                    <div class="btn btn-primary" @click.prevent="sendRequest(user)">Send Request</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['initialUsers'],

        data() {
            return {
                users: this.initialUsers
            }
        },
        watch: {
            sendRequest: function () {
              this.initialUsers = this.initialUsers
            }
        },
        methods: {
            sendRequest(user) {
                axios.post('/send-request', { user: user })
                .then((response) => {
                    if(response.status == 200){
                        this.users.splice(this.users.indexOf(user), 1);
                    }
                    // Bus.$emit('groupCreated', response.data);
                });
            }
        }
    }
</script>
