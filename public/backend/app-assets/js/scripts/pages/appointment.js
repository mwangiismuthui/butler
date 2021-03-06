/*=========================================================================================
    File Name: combo-bar-line.js
    Description: Chartjs combo bar line chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// const { ajax } = require("jquery");

// Combo bar line chart
// ------------------------------
$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#combo-bar-line");
    Chart.Legend.prototype.afterFit = function() {
        this.height = this.height + 50;
    };
    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                display: true,
                barPercentage: 0.75,
                categoryPercentage: 0.3,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: false,
                    labelString: 'Days'
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: false,
                    labelString: 'Value'
                }
            }]
        },
        title: {
            display: true,
            text: 'Shipment Statistics'
        }
    };

       $.ajax({
        type: "GET",
        url: "/report/data",
        success: function (data) {
        //  console.log(data);

            // Chart Data
            var chartData = {
                labels: data.dates,
                datasets: [
                    {
                    type: 'line',
                    label: "On-Time in-Full No Damage",
                    data: data.Status0,
                    borderColor: "rgb(30,159,242)",
                    backgroundColor: "transparent",
                    borderWidth: 2,
                    pointBorderColor: "#1e9ff2",
                    pointBackgroundColor: "#FFF",
                    pointBorderWidth: 2,
                    pointHoverBorderWidth: 2,
                    pointRadius: 4,
                },{
                    type: 'bar',
                    label: "On-Time In-Transit Damages",
                    data: data.Status1,
                    backgroundColor: "#00A5A8",
                    borderColor: "transparent",
                    borderWidth: 2
                }, {
                    type: 'bar',
                    label: "On Time, in-Transit-Losses",
                    data: data.Status2,
                    backgroundColor: "#FF4081",
                    borderColor: "transparent",
                    borderWidth: 2
                }, {
                    type: 'bar',
                    label: "Late,in-Full, No Damage",
                    data: data.Status3,
                    backgroundColor: "#626e82",
                    borderColor: "transparent",
                    borderWidth: 2
                }, {
                    type: 'bar',
                    label: "Late, in-Full, on-Transit-Damages",
                    data: data.Status4,
                    backgroundColor: "#626e82",
                    borderColor: "transparent",
                    borderWidth: 2
                }, {
                    type: 'bar',
                    label: "Late, in-Transit-Losses",
                    data: data.Status5,
                    backgroundColor: "#626e82",
                    borderColor: "transparent",
                    borderWidth: 2
                }
            ]
            };

            var config = {
                type: 'bar',

                // Chart Options
                options : chartOptions,

                data : chartData
            };

            // Create the chart
            var lineChart = new Chart(ctx, config);
        }
      });

});
