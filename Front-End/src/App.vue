<template>
  <v-app class="home">
    <HomePage  />
  </v-app>
</template>

<script>


import HomePage from './views/Home.vue'; 

export default {
  name: "App",
  components: {

    HomePage,
   
  },
  data: () => ({
    logged: true,
    fonction: "",
    department: "",
  }),
  mounted() {
    if (this.getUserActive == null) {
      this.logged = false;
    } else if (this.getUserActive != null) {
      this.fonction = this.getUserActive?.fonction?.name;
      this.department = this.getUserActive?.fonction?.department?.name;
      this.logged = true;
    }
  },
  computed: {
  },
  watch: {},
  methods: {
    initialize() { },
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
          this.dialog = false;
        });
      }
    },
  },
};
</script>