jQuery(document).ready(function($) {
    "use strict";

    // Pie chart flotPie1
    var ctx = document.getElementById( "doughutChart" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
    type: 'pie',
    data: {
        datasets: [ {
            data: [ baru, kiv, reject, approve ],
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
    type: 'bar',
    data: {
    labels: [ "Jan", "Feb", "March", "Apr", "May", "June", "July", "Aug","Sept", "Okt", "Nov","Dec"],
    datasets: 
    [
        {
            label: "Approve",
            borderColor: "rgba(0, 194, 146, 0.9)",
            borderWidth: "1",
            backgroundColor: "rgba(0, 194, 146, 0.5)",
            pointHighlightStroke: "rgba(26,179,148,1)",
            data: [jan, feb, mac, apr, mei, jun, july, aug, sept, oct, nov, dec]
            
        },
        {
            label: "Reject",
            borderColor: "rgba(0,0,0,.09)",
            borderWidth: "1",
            backgroundColor: "rgba(220, 53, 69, 0.5)",
            data: [ jan_r, feb_r, mac_r, apr_r, mei_r, jun_r, july_r, aug_r, sept_r, oct_r, nov_r, dec_r ]
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