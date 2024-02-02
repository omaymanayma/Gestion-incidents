<!-- Barchart.vue -->
<template>
  <div>
    <canvas ref="barChart"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
  props: ['chartData'],
  data() {
    return {
      chart: null,
      chartOptions: {
        // Add any Chart.js options you need
      },
    };
  },
  methods: {
   renderChart(chartData) {
      if (this.chart) {
        this.chart.destroy();
      }

      const ctx = this.$refs.barChart.getContext("2d");
      this.chart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Pannes Informatiques", "Problèmes de Logistique", "Défaillances Électriques", "Perturbations Audiovisuelles"],
          datasets: [
            {
              label: "",
              backgroundColor: ["#002f6c", "#2d63a8", "#6094d6", "#86afe5"],
              borderWidth: 1,
              borderRadius: 5,
              data: chartData, // Use the parameter name here
            },
          ],
        },
        options: this.chartOptions, // Include chartOptions here
      });
    },

  },
  mounted() {
    console.log('Chart Component - chartData:', this.chartData);
    this.renderChart();
  },

};
</script>

<style scoped>
/* Add any custom styles if needed */
</style>
