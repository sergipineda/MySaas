/**
 * Created by sergi on 29/03/16.
 */
import Chart from 'chart.js';

export default {
    template: '<canvas id="barChartDailySales" style="height: 226px; width: 494px;" width="617" height="282"></canvas>',
    ready(){


        var ctx = document.getElementById("barChartDailySales").getContext("2d");
        var data = {
            labels: ["day1", "day2", "day3"],
            datasets: [{
                data: [65, 45, 35, 25],
                label: "Daily Sales",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)"
            }
            ]
        }
        var myBarChart= new Chart(ctx).Bar(data);
    }
}