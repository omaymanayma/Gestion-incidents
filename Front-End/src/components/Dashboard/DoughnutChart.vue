<!-- DoughnutChart.vue -->
<template>
  <div>
    <canvas ref="doughnutChart"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
  
  props: ['chartData'],
  data() {
    return {
      chart: null,
    };
  },
  methods: {
   renderChart(chartData) {
      const ctx = this.$refs.doughnutChart.getContext("2d");
      if (this.chart) {
        this.chart.destroy();
      }

      this.chart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: ["Pannes Informatiques", "Problèmes de Logistique", "Défaillances Électriques", "Perturbations Audiovisuelles"],
          datasets: [
            {
              data: chartData, // Utilisez le paramètre chartData ici
              backgroundColor: ["#002f6c", "#2d63a8", "#6094d6", "#86afe5"],
            },
          ],
        },
        options: {
          responsive: false,
          maintainAspectRatio: false,
        },
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
