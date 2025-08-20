<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div
    x-data="{
        values: [45, 55, 75, 25, 45, 110],
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June'],
        init() {
            let chart = new ApexCharts(this.$refs.chart, this.options)

            chart.render()

            this.$watch('values', () => {
                chart.updateOptions(this.options)
            })
        },
        get options() {
            return {
                chart: { type: 'area', toolbar: false, theme: 'dark' },
                tooltip: {
                    marker: false,
                    y: {
                        formatter(number) {
                            return '$'+number
                        }
                    }
                },
                xaxis: { categories: this.labels },
                series: [{
                    name: 'Views',
                    data: this.values,
                }, {
                    name: 'Clicks',
                    data: this.values,
                }],
            }
        }
    }"
    class="w-full"
>
    <div x-ref="chart"></div>
</div>