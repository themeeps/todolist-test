var todolistChart;
(function($) {
    $(document).ready(function(){
        var ctx = document.getElementById('myChart');
        todolistChartClass.ChartData(ctx)
    });

    todolistChartClass ={
        ChartData:function(ctx){
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: _ydata,
                    datasets: [{
                        label: 'Task',
                        data: _xdata,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }

})(jQuery);
