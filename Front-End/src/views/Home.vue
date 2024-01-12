<template>
    <v-card class="overflow-hidden">
        <v-app-bar v-if="showAppBar" color="#fff" style="border-bottom: 2px solid #002f6c">
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

        <v-navigation-drawer v-model="drawer" absolute temporary width="15em" style="background-color: #fff">
            <v-list style="padding: 0px; align-items: center" nav dense>
                <v-list-item-group class="itemDrawer" active-class="deep-purple--text text--accent-4">
                    <br />
                    <v-img contain lazy-src="" max-height="220" max-width="250"
                        src=""></v-img>

                    <v-list>
                        
                        <v-list-item-group  active-class="activeDrawer" class="itemDrawer">
                            
                                <router-link class="linktext" to="/incidents">
                                        <div class="itemdrawer">
                                            <v-list-item class="itemd"> Dashboard Incidents </v-list-item>
                                        </div>
                                    </router-link>
                                     <router-link class="linktext" to="/users">
                                            <div class="itemdrawer">
                                                <v-list-item class="itemd"> Dashboard users </v-list-item>
                                            </div>
                                        </router-link>
                        </v-list-item-group>
                    </v-list>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>
        <v-app style="background-color: #fff">
            <router-view />
        </v-app>
    </v-card>
</template>

<script>

export default {
    components: {
    },
    data() {
        return {
            showAppBar: true,

            drawer: false,
            dialogNotif: false,
            logged: false,
            dialog: false,
            show1: false,
            show2: false,
            tab: "contrat",
            notifTotal_contrat: 0,
            notifTotal_bondecommande: 0,
            Validpassword: "",
            model: {
                id: 0,
                password: "",
            },
            modelNotificationPost: {
                type: "",
            },
            rules: {
                required: (value) => !!value || "Required.",
                min: (v) => v.length >= 8 || "Min 8 characters",
                emailMatch: () => `The email and password you entered don't match`,
            },
            fonction: "",
            department: "",
            listDrawerChildRouter: [
                { id: 1, name: "User", ROUTE: "/userGestion" },
                { id: 2, name: "Damage", ROUTE: "/Damage" },
                { id: 3, name: "Equipment Profile ", ROUTE: "/profile_groupe" },
                { id: 4, name: "technique ", ROUTE: "/technique" },
                { id: 5, name: "Dashboard ", ROUTE: "/Dashboard" },
            ],
            notifData: [],
            expireData: [],
            expireDataB: [],
        };
    },

    mounted() {
        // Initialiser la propriété showAppBar en fonction de la route actuelle
        this.showAppBar = this.$route.name !== 'LoginHome';
    },

    computed: {
    },
    watch: {
        tab: {
            deep: true,
            handler(newValue, oldvalue) {
                //this.setCONTRACT_SetterAction(newValue).then(() => {});
                console.warn("tab value", this.tab);
            },
        },
    },

    methods: {
        
        initialize() {
           
        },
        logout() {
            localStorage.clear();
            this.$router.push({
                name: "Login",
            });
            window.location.reload();
        },
        changepassword() {
            this.model.id = this.getUserActive.id;
            if (this.model.password == this.Validpassword) {
                this.changePasswordAction(this.model).then(() => {
                    Swal.fire(
                        "Good job!",
                        "Password has been changed successfully",
                        "success"
                    );
                    this.dialog = false;
                });
            } else {
                Swal.fire(
                    "warning !!",
                    "Please your password not matched with valide password!",
                    "warning"
                );
            }
            //this.changePasswordAction().then(() => {});
        },
        
      
    },
};
</script>

<style lang="scss" scoped></style>