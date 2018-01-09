<template>
    <div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <div class="row">
                    <h4 v-if="!isUpdating" >Add new user</h4>
                    <h4 v-if="isUpdating" >Update user</h4>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="validate" v-model="user.name">
                                <label for="name" v-bind:class="{'active' : user.name}">Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" v-model="user.email">
                                <label for="email" v-bind:class="{'active' : user.name}">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" v-model="user.password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password_confirmation" type="password" class="validate" v-model="user.password_confirmation">
                                <label for="password_confirmation">Password Confirmation</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-12">
                                Roles:
                                <div v-for="role in roles">
                                    <input type="checkbox" :id="role.name" :value="role.id" v-model="user.roles"/>
                                    <label :for="role.name">{{role.name}}</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a v-if="!isUpdating" class="right waves-effect waves-light btn modal-trigger" data-target="modal1" @click="add()">Add new User</a>
                <a v-if="isUpdating" class="right waves-effect waves-light btn modal-trigger" data-target="modal1" @click="update(user.id)">Update User</a>
            </div>
        </div>
    </div>

</template>
<style>
</style>
<script>
    export default {
        data: function() {
            return {
                user: {
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    roles: [],
                },
                roles: [],
                roleIds: [],
                isUpdating: false,
            }
        },
        mounted() {
            this.getRoles();
            console.log('this.roles');
            console.log(this.roles);
            this.eventBus.$on('user-list', () => {
               console.log('event triggerd in form component');
            });

            this.eventBus.$on('user-update', (id) => {
                this.clearForm();
                this.loadUser(id);
                this.isUpdating = true;
            });

            this.eventBus.$on('user-add', () => {
               this.isUpdating = false;
               this.clearForm();
            });
        },

        methods: {
            add() {
                axios.post(this.$laroute.route('users.api.store'), this.user).
                then((response) => {
                    this.eventBus.$emit('user-create');
                }).catch((error) => {
                    console.log(error);
                });
            },

            update(id) {
                this.user.id = id;
                axios.put(this.$laroute.route('users.api.update'),this.user).
                then((response) => {
                    this.eventBus.$emit('user-updated');
                }).catch((error) => {
                    console.log(error);
                });
            },

            loadUser(id) {
                console.log(this.$laroute.route('users.api.show', {id:id}));
                axios.get(this.$laroute.route('users.api.show', {id:id})).
                then( (response) => {
                    this.user.id = response.data.id;
                    this.user.name = response.data.name;
                    this.user.email = response.data.email;
                    this.setRoles(response.data.roles);
                }).catch( (error) => {

                });
            },

            clearForm() {
                this.user.id = '';
                this.user.name = '';
                this.user.email = '';
                this.user.password = '';
                this.user.password_confirmation = '';
                this.user.roles = [];
            },

            getRoles() {
                axios.get(this.$laroute.route('roles.api.index')).
                then((response) => {
                    this.roles = response.data;
                }).catch(function(error){
                    console.log(error);
                });
            },

            setRoles(roles) {
                this.user.roles = roles.map(function(obj) {
                   return obj.id;
                });
            }
        }
    }
</script>