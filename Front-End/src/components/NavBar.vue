<template>
  <v-app-bar v-if="shouldShowAppBar" color="#fff" style="border-bottom: 2px solid #002f6c">
                <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

                <v-toolbar-title>
                    <v-img contain lazy-src="" max-height="100" max-width="150"
                        src=""></v-img>
                </v-toolbar-title>

                <h4 class="title">Gestion Incidents</h4>
                <v-spacer></v-spacer>

                <template>
                    <v-row justify="center">
                    
                    </v-row>
                </template>

                <div class="settingContainer">
                    <h4 class="username">
                    </h4>

                    <div class="text-center">
                        <v-menu min-width="180px" rounded offset-y origin="center center" transition="scale-transition">
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn v-bind="attrs" v-on="on">
                                    <v-icon> mdi-account-cog </v-icon>
                                </v-btn>
                            </template>
                            <v-list class="text-center">
                                <div class="pa-4">
                                    <v-icon x-large>mdi-account-circle-outline</v-icon>
                                    <h4 class="text-uppercase title">
                                    </h4>

                                    <h4 class="">
                                    </h4>

                                </div>
                                <v-divider></v-divider>
                                <div class="pa-8">
                                    <v-btn @click="dialog = true" color="primary">
                                        <h4 class="white--text">Changer password</h4>
                                    </v-btn>
                                </div>
                                <div class="pa-8">
                                    <v-btn width="190px" @click="logout">
                                        <v-icon>mdi-logout-variant</v-icon>
                                        LOGOUT
                                    </v-btn>
                                </div>
                            </v-list>
                        </v-menu>
                    </div>
                </div>
            </v-app-bar>
</template>

<script>
export default {
    computed: {
        // Determine if the app bar should be shown based on the route name
        shouldShowAppBar() {
            // You may need to access the route through the router instance
            // Example: this.$router.currentRoute.name
            return this.$route.name !== "Login";
        },
    },
    methods: {
        // ... any methods you may need ...
    },

}
</script>

<style>

</style>