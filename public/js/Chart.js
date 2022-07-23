/**
 * function create chart from data query database
 */
$(function () 
{
    // list grade
    arrayGrade = arrayGrade.reverse();
    // list category
    var listCategory = [];
    var category = null;
    var serieData = [];
    var firstCategory = 0;
    var lastCategory = 0;
    var cnt = 0;

    // find first category to count
    while (firstCategory < arrayGrade[0]) 
    {
        firstCategory += step;
    }
    firstCategory = Math.round((firstCategory - step) * 100) / 100;

    lastCategory = firstCategory;
    // find last category to count
    while (lastCategory < arrayGrade[arrayGrade.length - 1]) 
    {
        lastCategory += step;
    }

    var numOfStep = (lastCategory - firstCategory) / step;
    lastCategory = firstCategory + step;

    var indexStudent = 0;
    for (let i = 0; i < numOfStep; i++) 
    {
        cnt = 0;
        while (lastCategory >= arrayGrade[indexStudent]) 
        {
            indexStudent++;
            cnt++;
        }
        category = firstCategory + "-" + lastCategory;

        listCategory.push(category);
        serieData.push(cnt);

        firstCategory += step;
        lastCategory += step;
    }

    var chart = new Highcharts.chart(chardId, {
        title: {
            text: 'Biểu đồ điểm dự tuyển',
        },
        xAxis: {
            title: {
                text: 'Điểm thi'
            },
            categories: listCategory
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' học sinh'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            data: serieData,
            name: "Số học sinh"
        }]
    });    
});