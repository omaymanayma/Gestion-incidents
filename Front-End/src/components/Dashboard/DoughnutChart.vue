<template>
  <div>
    <canvas ref="doughnutChart"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
  props: [],
  data() {
    return {
      chartData: {
        labels: ["TODO", "INPROGRESS", "DONE", "CLOSED"],
        datasets: [
          {
            data: [],
            backgroundColor: ["#F44336", "#FF9800", "#4CAF50", "#009688"],
          },
        ],
      },
    };
  },
  watch: {
    chartData: function () {
      this.renderChart();
    },
  },
  mounted() {
    this.renderChart();
  },
  methods: {
    renderChart(data) {
      const ctx = this.$refs.doughnutChart.getContext("2d");
      this.chartData.datasets[0].data = data;
      if (this.chart) {
        this.chart.destroy();
      }

      this.chart = new Chart(ctx, {
        type: "doughnut",
        data: this.chartData,
        options: {
          responsive: false,
          maintainAspectRatio: false,
        },
      });
    },
  },
};
</script>
