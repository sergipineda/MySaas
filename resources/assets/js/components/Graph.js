/**
 * Created by sergi on 29/03/16.
 */
import Chart from 'chart.js';

export default {
    template: '<canvas id="barChartDailySales" style="height: 226px; width: 494px;" width="617" height="282"></canvas>',
    props:['id','labels','values'],
    ready(){


        var ctx = document.getElementById("barChartDailySales").getContext("2d");
        var data = {
            labels: this.labels,
            datasets: [ {
                data: this.values,
                label: "Daily Sales",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)"
            }
            ]
        }
        var myBarChart = new Chart(ctx).Bar(data);
    }
}