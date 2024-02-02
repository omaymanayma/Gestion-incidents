<template>
    <div style="padding: 30px; padding-top: 2%">
      <div class="mb-4 text-uppercase text-center">
        <h2>Dashboard</h2>
      </div>
      <v-container>
        <v-row>
          <v-col cols="3" v-for="item in header" :key="item.id">
            <Card
              :title="item.title"
              :icon="item.icon"
              :color_item="item.color"
              :modelTotal="modelTotal"
            />
          </v-col>
        </v-row>
      </v-container>
      <v-container>
        <v-row>
          <v-col cols="6">
            <template>
              <div>
                <h1></h1>
  <Barchart ref="BarChartComponentRef" :chartData="Object.values(modelTotal)"></Barchart>
                </div>
            </template>
          </v-col>
          <v-col cols="3">
            <template>
              <div>
                <h1></h1>
                <DoughnutChart ref="DoughnutChartComponentRef" :chartData="Object.values(modelTotal)"></DoughnutChart>

              </div>
            </template>
          </v-col>
          
        </v-row>
      </v-container>
    </div>
  </template>
  
  <script>
  
  import Card from "../components/Dashboard/Card.vue";
  import Barchart from "../components/Dashboard/Barchart.vue";
  import DoughnutChart from "../components/Dashboard/DoughnutChart.vue";
  import axios from "axios";
  export default {
    components: {
      Card,
      Barchart,
      DoughnutChart,
    },
    data() {
      return {
        header: [
          {
            id: 1,
            title: "Pannes Informatiques",
            icon: "desktop-classic",
            color: "red",
          },
          {
            id: 2,
            title: "Problèmes de Logistique",
            icon: "alert-circle-outline",
            color: "orange",
          },
          {
            id: 3,
            title: "Défaillances Électriques",
            icon: "flash-alert",
            color: "yellow",
          },
          {
            id: 4,
            title: "Perturbations Audiovisuelles",
            icon: "television-speaker-off",
            color: "teal",
          },
        ],
        modelTotal: {},
        
        
      };
    },
    
    
  
    methods: {
    async initialize() {
        try {
          const response = await axios.get('http://localhost:8000/api/countByType');
          const incidentCounts = response.data;

          console.log('Incident Counts:', incidentCounts);

          incidentCounts.forEach(item => {
            const key = item.type.toUpperCase().replace(/\s+/g, '_');
            this.$set(this.modelTotal, key, item.count);
          });

          console.log('Model Total:', this.modelTotal);

          this.$refs.BarChartComponentRef.renderChart(Object.values(this.modelTotal));
          this.$refs.DoughnutChartComponentRef.renderChart(Object.values(this.modelTotal));
        } catch (error) {
          console.error('Error fetching incident counts:', error);
        }
      },



    },


   async mounted() {
      await this.initialize();
    }





      
      
    
  };
  </script>
  
  <style lang="scss" scoped></style>
  