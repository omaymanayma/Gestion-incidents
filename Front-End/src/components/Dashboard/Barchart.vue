<template>
  <div>
    <canvas ref="barChart"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
  props: [],

  data() {
    return {
      chartData: [],
      chartOptions: {
        // Define chart options if needed
      },
      chart: null,
    };
  },
  methods: {
    async fetchData() {
      // Make API request to fetch data
      try {
        // const response = await this.DataList;
        // const data = await response.json();
        this.chartData = await this.modelTotal;
        this.renderChart();
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    },
    renderChart(data) {
      // Render the chart
      if (this.chart) {
        this.chart.destroy(); // Destroy existing chart to prevent duplicates
      }

      const ctx = this.$refs.barChart.getContext("2d");
      this.chart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["TODO", "INPROGRESS", "DONE", "CLOSED"],
          datasets: [
            {
              label: "",
              backgroundColor: ["#F44336", "#FF9800", "#4CAF50", "#009688"],
              borderWidth: 1,
              borderRadius: 5,
              data: data,
            },
          ],
        },
        options: this.chartOptions,
      });
    },
  },
  mounted() {
    this.fetchData();
  },
};
</script>

<style scoped>
/* Add any custom styles if needed */
</style>
