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
                <Barchart ref="BarChartComponentRef"></Barchart>
              </div>
            </template>
          </v-col>
          <v-col cols="3">
            <template>
              <div>
                <h1></h1>
                <DoughnutChart
                  ref="DoughnutChartComponentRef"
                />
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
            title: "TODO",
            icon: "bell-alert",
            color: "red",
          },
          {
            id: 2,
            title: "INPROGRESS",
            icon: "bell-cog",
            color: "orange",
          },
          {
            id: 3,
            title: "DONE",
            icon: "bell-check",
            color: "green",
          },
          {
            id: 4,
            title: "CLOSED",
            icon: "check-all",
            color: "teal",
          },
        ],
        modelTotal: {
          TODO: 1,
          INPROGRESS: 2,
          DONE: 4,
          CLOSED: 5,
        },
        modelPostFiltre: {
          department_name: "",
        },
        
      };
    },
    computed: {
    },
    mounted() {
      this.initialize();
    },
  
    methods: {
      initialize() {


          this.$refs.BarChartComponentRef.renderChart([
              this.modelTotal.TODO,
              this.modelTotal.INPROGRESS,
              this.modelTotal.DONE,
              this.modelTotal.CLOSED,
            ]);
            this.$refs.DoughnutChartComponentRef.renderChart([
              this.modelTotal.TODO,
              this.modelTotal.INPROGRESS,
              this.modelTotal.DONE,
              this.modelTotal.CLOSED,
            ]);
        /* this.dashbord_totalWORKORDERAction(this.modelPostFiltre).then(
          (resolve) => {
            console.info("total", resolve);
  
            this.modelTotal.TODO = resolve.todo_total;
            this.modelTotal.INPROGRESS = resolve.inprogress_total;
            this.modelTotal.DONE = resolve.done_total;
            this.modelTotal.CLOSED = resolve.closed_total;
            this.$refs.BarChartComponentRef.renderChart([
              this.modelTotal.TODO,
              this.modelTotal.INPROGRESS,
              this.modelTotal.DONE,
              this.modelTotal.CLOSED,
            ]);
            this.$refs.DoughnutChartComponentRef.renderChart([
              this.modelTotal.TODO,
              this.modelTotal.INPROGRESS,
              this.modelTotal.DONE,
              this.modelTotal.CLOSED,
            ]);
           
  
            console.info("this.modelTotal", this.modelTotal);
          }
        ); */
      },
    },
  };
  </script>
  
  <style lang="scss" scoped></style>
  