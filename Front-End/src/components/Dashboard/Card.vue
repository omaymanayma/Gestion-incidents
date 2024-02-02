<template>
  <div class="card">
    <div class="card_load">
      <v-icon medium :color="color_item" large> mdi-{{ icon }} </v-icon>
    </div>
    <div class="card_load_extreme_title">{{ title }}</div>
    <div class="card_load_extreme_descripion">{{ modelTotal[title.toUpperCase().replace(/\s+/g, '_')] }}</div>
  </div>
</template>

<script>
export default {
  name: "WorkorderFrontendCard",
  props: ['icon', 'color_item', 'title', 'modelTotal'],

  mounted() {
    console.log('Card Component - modelTotal:', this.modelTotal);
  },
};
</script>


<style lang="scss" scoped>
.card {
  width: 220px;
  height: 120px;
  background: #ffff;
  box-shadow: 0 1px 25px rgba(0, 0, 0, 0.2);
  padding: 12px 10px;
  border-radius: 10px;
}

.card_load {
  width: 40px;
  height: 70px;
  position: relative;
  float: left;

  border-radius: 50%;
  background-size: 200% 100%;
  background-position: 100% 0;
  animation: load89234 2s infinite;
}

.card_load_extreme_title {
  width: 120px;
  height: 60px;
  position: relative;
  float: right;
  border-radius: 5px;
  background-size: 200% 100%;
  background-position: 100% 0;
  animation: load89234 2s infinite;
}

.card_load_extreme_descripion {
  width: 90px;
  height: 47px;
  position: relative;
  float: right;
  border-radius: 5px;
  margin-top: 10px;
  background-size: 200% 100%;
  background-position: 100% 0;
  animation: load89234 2s infinite;
}
</style>
