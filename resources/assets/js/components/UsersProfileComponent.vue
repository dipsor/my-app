<template>
    <div>
        <div v-if="isLoading" class="custom-loader-wrapper">
            <div class="preloader-wrapper big active custom-loader">
                <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a href="#test1">General info</a></li>
                    <li class="tab col s3"><a href="#test2">Billing Details</a></li>
                    <li class="tab col s3"><a class="active" href="#test3">Change Password</a></li>
                </ul>
            </div>
            <div id="test1" class="col s12 custom-tab-content">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate" v-model="user.name">
                            <label for="first_name" v-bind:class="{'active' : user.name}">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" v-model="user.email">
                            <label for="email" v-bind:class="{'active' : user.email}">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <a href="#" @click.prevent="updateUser()" class="waves-effect waves-light btn">Update User</a>
                        </div>
                    </div>
                </form>
            </div>
            <div id="test2" class="col s12 custom-tab-content">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email2" type="email" class="validate">
                            <label for="email2">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="submit" value="submit" class="waves-effect waves-light btn">
                        </div>
                    </div>
                </form>
            </div>
            <div id="test3" class="col s12 custom-tab-content">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" v-model="password.old">
                            <label for="password">Old Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="new_password" type="password" class="validate" v-model="password.newPassword">
                            <label for="new_password">New Password</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="confirm_new_password" type="password" class="validate" v-model="password.newPassword_confirmation">
                            <label for="confirm_new_password">Confirm New Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <a href="#" @click="updatePassword()" class="waves-effect waves-light btn">Change Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<style></style>
<script>
    export default {
        props: {
            userId: null
        },

        data: function() {
            return {
                user: {
                    name: '',
                    email: ''
                },
                password: {
                    old: '',
                    newPassword: '',
                    newPassword_confirmation: '',
                },
                isImpersonated: false,
                isLoading: false,
            }
        },

        mounted() {
            this.getUserData();

            this.eventBus.$on('impersonate-leave', () => {
                this.isImpersonated = this.unsetImpersonated();
            });

            this.eventBus.$on('user-info-updated', () => {
                Materialize.toast('User Updated', 4000);
                this.isLoading = false;
            });

            this.eventBus.$on('password-updated', () => {
                Materialize.toast('Password Updated', 4000);
                this.isLoading = false;
            });
        },

        methods: {
            getUserData() {
                axios.get(this.$laroute.route('users.api.show', {id: this.userId})).
                then((response) => {
                    this.user.name = response.data.name;
                    this.user.email = response.data.email;
                }).catch((error) => {
                    console.log(error);
                });
            },

            updateUser() {
                this.isLoading = true;

                axios.put(this.$laroute.route('users.api.update.general.info',{id: this.userId}), this.user).
                then((response) => {
                    this.eventBus.$emit('user-info-updated', this.user.name);
                }).catch((error) => {
                    this.isLoading = false;
                    Materialize.toast(error, 4000);
                    console.log(error);
                });
            },

            updatePassword() {
                this.isLoading = true;

                axios.put(this.$laroute.route('users.api.update.password',{id: this.userId}), this.password).
                then((response) => {
                    this.eventBus.$emit('password-updated');
                }).catch((error) => {
                    this.isLoading = false;
                    Materialize.toast(error, 4000);

                    console.log(error);
                });
            }
        }
    }
</script>