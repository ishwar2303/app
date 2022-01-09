import React from 'react'
import Highcharts from 'highcharts';
import Loading from '../Utility/Loading';
import CustomRadio from '../Utility/CustomRadio';

function TaskGraph() {

    var control = true;

    const setChartOptions = () => {
        Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });
    }


    async function getData(url) {
        const response = await fetch(url, {
            method: 'GET'
        });
        return response.json(); 
    }

    const loadChart = () => {
        var URL = 'http://localhost/API/Admin/fetch-task-share.php?status=';
        let filter = document.getElementsByName('status1');
        for(let i=0; i<filter.length; i++) {
            if(filter[i].checked) {
                URL += filter[i].value;
                break;
            }
        }
        console.log(URL)

        getData(URL)
        .then(data => {
            console.log(data)
            renderChart([data.data])
        });
    }


    window.onload = () => {
        loadChart()
    }
    
    const renderChart = (data) => {

        if(control) {
            setChartOptions();
            control = false;
        }
        // Build the chart
        Highcharts.chart('graph-1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Analyst task completion share'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} <i class="fas fa-rupee-sign"></i></b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        connectorColor: 'silver'
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: data
        });
    }
    return (
        <>
            <div id="graph-1">
                <Loading />
            </div>
            <div className='input-block'>
                <div className='customized-radio-black'>
                    <CustomRadio 
                        value='Completed' 
                        text='Completed'
                        name='status1'
                        icon='fas fa-check'
                        checked={true}
                    />
                    <CustomRadio 
                        value='Pending' 
                        text='Pending'
                        name='status1'
                        icon='fas fa-box-open'
                    />
                    <CustomRadio 
                        value='*' 
                        text='Accumulated'
                        name='status1'
                        icon='fas fa-box'
                    />
                </div> 
            </div>
            <div className='flex-row jc-e'>
                <button className='btn btn-primary btn-medium' onClick={loadChart}><i className='fas fa-sync'/> LoadChart</button>
            </div>
        </>
    )
}

export default TaskGraph
