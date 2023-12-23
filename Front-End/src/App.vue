<template>
  <!-- <h1> {{ title }} </h1> -->
  <TestLogin />
</template>

<script>
// import ModelTest from './components/ModelTest.vue'
import TestLogin from './components/TestLogin.vue'

export default {
  name: 'App',
  components: { TestLogin },
  data() {
    return {
      title: "My first Vue App :)"
    }
  },
  methods: {
    handleClick() {
      console.log(this.$refs.name)
      this.$refs.name.classList.add('active')
    }
  }
}
</script>

<style>
/* #app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50; 
 margin-top: 60px;
} */
</style>
