<template>
    <div class="section">
        <div class="row">
            <!-- Form with validation -->
            <div class="col s12 m12 l12">
                <div class="card-panel">
                    <h4 class="header2 content-header">List of users</h4>
                    <a class="right waves-effect waves-light btn modal-trigger" data-target="modal1" @click="addUser()">Add new User</a>
                    <table class="striped">
                        <thead>
                        <tr>
                            <th data-field="id">Name</th>
                            <th data-field="name">Item Name</th>
                            <th data-field="email">Item Email</th>
                            <th data-field="email">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in users">
                            <td>{{user.id}}</td>
                            <td>{{user.name}}</td>
                            <td>{{user.email}}</td>
                            <td>
                                <a class="waves-effect waves-light btn modal-trigger" data-target="modal1" @click="editUser(user.id)">Edit</a>
                                <a v-show="userId !== user.id && !isImpersonated" class="waves-effect waves-light btn" @click="deleteUser(user.id)">Delete</a>
                                <a v-show="userId !== user.id && !isImpersonated" class="waves-effect waves-light btn" @click="impersonateUser(user.id)">Impersonate</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .content-header {
        display: inline-block;
    }
</style>
<script>
    export default {
        props: {
            userId: null
        },

        data: function() {
            return {
                users: [],
                isImpersonated: false
            }
        },

        mounted() {
            this.getUsers();
            $('#modal1').modal();
            this.isImpersonated = this.getImpersonated();

            this.eventBus.$on('impersonate-leave', () => {
                this.isImpersonated = this.unsetImpersonated();
            });

            this.eventBus.$on('impersonate-enter', () => {
                this.isImpersonated = this.setImpersonated();
            });

            this.eventBus.$on('user-delete', () => {
               this.getUsers();
            });

            this.eventBus.$on('user-create', () => {
                $('#modal1').modal('close');
                this.getUsers();
            });

            this.eventBus.$on('user-updated', () => {
                $('#modal1').modal('close');
                this.getUsers();
            });
        },

        methods: {
            getUsers() {
                axios.get(this.$laroute.route('users.api.index')).
                then((response) => {
                    this.users = response.data;
                    this.eventBus.$emit('user-list');
                }).catch(function(error){
                    console.log(error);
                });
            },

            deleteUser(id) {
                axios.delete(this.$laroute.route('users.api.destroy', {id: id}) ).
                then( (response) => {
                    this.eventBus.$emit('user-delete');
                }).catch( (error) => {
                    console.log(error);
                });
            },

            editUser(id) {
                this.eventBus.$emit('user-update', id);
            },

            addUser() {
                this.eventBus.$emit('user-add');
            },

            impersonateUser(userId) {
                axios.get(this.$laroute.route('impersonate', {id: userId})).
                then(() => {
                    this.eventBus.$emit('impersonate-enter');
                }).catch((error) => {
                    console.log(error);
                });
            },

            setImpersonated() {
                localStorage.setItem("isImpersonated", true);

                return true;
            },

            unsetImpersonated() {
                if( localStorage.getItem("isImpersonated") ) {
                    localStorage.removeItem("isImpersonated");
                }
                return false;
            },

            getImpersonated() {
                let impersonated = false;
                if( localStorage.getItem("isImpersonated") ) {
                    impersonated = localStorage.getItem("isImpersonated");
                }
                return impersonated;
            },

            loadUser(id) {

            },
        }
    }
</script>