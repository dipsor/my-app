<template>
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="base-nav-bg-color">
                <div class="nav-wrapper">
                    <a href="index.html" class="brand-logo darken-1"><span class="logo-text">Admin Dashboard</span></a>

                    <ul class="right hide-on-med-and-down">
                        <li><a :href="landingPageUrl" class="users-actions">Landing Page</a></li>

                        <li>
                            <a :href="$laroute.route('users.show', {id: parsedLoggedUser.id})" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">{{parsedLoggedUser.name}}
                            </a>
                        </li>
                        <li><a @click="logout" class="users-actions" href="#">Log Out</a></li>
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
                isImpersonated: false,
                landingPageUrl: '',
            }
        },

        mounted() {
            this.landingPageUrl = this.$laroute.route('home');

            this.eventBus.$on('impersonate-enter', () => {
                this.isImpersonated = true;
            });

            this.eventBus.$on('user-info-updated', (userName) => {
                console.log(userName);
                this.parsedLoggedUser.name = userName;
            });
        },

        created() {
            this.parsedLoggedUser = JSON.parse(this.loggedUser);
        },

        methods: {
            logout(){
                axios.get(this.$laroute.route('users.logout'))
                    .then((response) =>{
                        window.location.href = this.$laroute.route('home');
                    }, (error) => {
                        console.log(error);
                    });
            }
        }
    }

</script>