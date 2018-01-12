<template>
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="base-nav-bg-color">
                <div class="nav-wrapper">
                    <ul class="left">
                        <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"></a><span class="logo-text">Admin</span></h1></li>
                    </ul>

                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">{{parsedLoggedUser.name}}'s Actions
                        </a>
                        </li>

                    </ul>
                    <!-- notifications-dropdown -->
                    <ul id="notifications-dropdown" class="dropdown-content">
                        <li><a @click="logout" class="users-actions" href="#">Log Out</a></li>
                        <li><a class="users-actions" href="#">Profile</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->
</template>
<script>
    export default {
        props: {
            urlPath: '',
            loggedUser: null
        },

        data() {
            return {
                parsedLoggedUser: null,
                isImpersonated: false
            }
        },

        mounted() {
            this.eventBus.$on('impersonate-enter', () => {
                this.isImpersonated = true;
            });
        },

        created() {
            this.parsedLoggedUser = JSON.parse(this.loggedUser);
        },

        methods: {
            logout(){
                axios.post(this.$laroute.route('logout'))
                .then((response) =>{
                    console.log(response);
                    //window.location.href = this.$laroute.route('login');
                }, (error) => {
                    console.log(error);
                });
            }
        }
    }

</script>