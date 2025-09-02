<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div
    x-data="chartComponent(@entangle($attributes->wire('model')))"
    class="w-full"
>
    <div x-ref="chart"></div>
</div>

<script>
    function chartComponent(rawData) {
        return {
            rawData,
            chart: null,

            init() {
                this.chart = new ApexCharts(this.$refs.chart, this.options)
                this.chart.render()

                this.$watch('rawData', () => {
                    this.chart.updateOptions(this.options)
                })

                const observer = new MutationObserver(() => {
                    this.chart.updateOptions(this.options)
                })
                observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] })
            },

            get isDark() {
                return document.documentElement.classList.contains('dark')
            },

            get options() {
                return {
                    chart: {
                        type: 'area',
                        toolbar: { show: false },
                        background: 'transparent',
                    },
                    theme: { mode: this.isDark ? 'dark' : 'light' },
                    tooltip: {
                        theme: this.isDark ? 'dark' : 'light',
                        marker: { show: false },
                        y: {
                            formatter(number) {
                                return '$' + number
                            }
                        }
                    },
                    legend: {
                        show: true,
                        labels: {
                            colors: this.isDark ? '#d1d5db' : '#374151',
                        }
                    },
                    xaxis: {
                        categories: this.rawData.labels ?? [],
                        labels: { style: { colors: this.isDark ? '#d1d5db' : '#374151' } },
                        axisBorder: { color: this.isDark ? '#374151' : '#e5e7eb' },
                        axisTicks: { color: this.isDark ? '#374151' : '#e5e7eb' },
                    },
                    yaxis: {
                        labels: { style: { colors: this.isDark ? '#d1d5db' : '#374151' } }
                    },
                    grid: {
                        borderColor: this.isDark ? '#374151' : '#e5e7eb',
                    },
                    stroke: { curve: 'smooth', width: 2 },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: this.isDark ? 'dark' : 'light',
                            type: 'vertical',
                            opacityFrom: 0.6,
                            opacityTo: 0.1,
                        },
                    },
                    series: this.rawData.series ?? [],
                }
            }
        }
    }
</script>


