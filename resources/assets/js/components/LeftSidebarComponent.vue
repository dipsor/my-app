<template>
    <!-- START LEFT SIDEBAR NAV-->
    <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation avatar-area">
            <li class="user-details">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img :src="urlPath+'/img/avatar.jpg'" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        <p v-if="loadUser" class="user-roal" v-model="loggedUser">
                            <a class="sidebar-link" :href="$laroute.route('users.show', {id: parsedLoggedUser.id})">{{parsedLoggedUser.name}}</a>
                        </p>
                        <p v-show="isAdmin">
                            <a href="#" @click.prevent="leaveImpersonate()">Leave Impersonate</a>
                        </p>
                    </div>
                </div>
            </li>
            <li v-show="isAdmin" class="bold"><a :href="$laroute.route('admin.users.index')" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Users</a>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>

    </aside>
    <!-- END LEFT SIDEBAR NAV-->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
</template>
<style>
    .content-header {
        display: inline-block;
    }
</style>
<script>
    export default {
        props: {
            urlPath: '',
            loggedUser: null,
            isAdmin: false,
        },

        data() {
          return {
              parsedLoggedUser: null,
              isImpersonated: false,
              loadUser: true,
          }
        },
        created() {
            this.loadUser = false;
            this.eventBus.$on('user-info-updated', (userName) => {

            });
            this.eventBus.$on('impersonate-enter', () => {
                this.isImpersonated = true;
            });
        },

        mounted() {
            console.log('is admin?');
            console.log(this.isAdmin);
            this.loadUser = true;

            this.eventBus.$on('user-info-updated', (userName) => {
                console.log(userName);
                this.parsedLoggedUser.name = userName;
                this.loadUser = true;
            });
        },

        created() {
            this.parsedLoggedUser = JSON.parse(this.loggedUser);
        },

        methods: {
            leaveImpersonate() {
                console.log(this.loggedUser);
                axios.get(this.$laroute.route('impersonate.leave')).
                then(() => {
                    this.eventBus.$emit('impersonate-leave');
                }).catch((error) => {
                    console.log(error);
                });
            }
        }
    }
</script>