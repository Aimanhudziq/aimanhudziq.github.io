
jQuery(document).ready(function($) {
    "use strict";

    // Pie chart flotPie1
    var ctx = document.getElementById( "doughutChart" );
    ctx.height = 250;
    var myChart = new Chart( ctx, {
    type: 'doughnut',
    data: {
        datasets: [ {
            data: [ 23, 14, 6, 3 ],
            backgroundColor: [
                            "rgba(3, 169, 243, 1)",
                            "rgba(171, 140, 228, 1)",
                            "rgba(220, 53, 69, 1)",
                            "rgba(0, 194, 146, 1)"
                        ],
            hoverBackgroundColor: [
                            "rgba(3, 169, 243,0.7)",
                            "rgba(171, 140, 228,0.7)",
                            "rgba(220, 53, 69,0.7)",
                            "rgba(0, 194, 146,0.77)"
                        ]

                    } ],
            labels: [
                    "New",
                    "KIV",
                    "Reject",
                    "Approve"
                ]
},
options: {
    responsive: true
    }
} );
    // Pie chart flotPie1  End

    

    // Line Chart  #flotLine5
    var ctx = document.getElementById( "lineChart" );
    ctx.height = 125;
        var myChart = new Chart( ctx, {
type: 'line',
data: {
    labels: [ "January", "February", "March", "April", "May", "June", "July", "August" ],
    datasets: [
        {
            label: "Approve",
            borderColor: "rgba(0, 194, 146, 0.9)",
            borderWidth: "1",
            backgroundColor: "rgba(0, 194, 146, 0.5)",
            pointHighlightStroke: "rgba(26,179,148,1)",
            data: [ 16, 32, 18, 27, 42, 33, 44, 6 ]
            
                    },
        {
            label: "Reject",
            borderColor: "rgba(0,0,0,.09)",
            borderWidth: "1",
            backgroundColor: "rgba(220, 53, 69, 0.5)",
            data: [ 20, 47, 35, 43, 65, 45, 35, 60 ]
                    }
                ]
},
options: {
    responsive: true,
    tooltips: {
        mode: 'index',
        intersect: false
    },
    hover: {
        mode: 'nearest',
        intersect: true
    }

}
} );
    // Line Chart  #flotLine5 End
    
});