import React from 'react'
import Highcharts from 'highcharts';
import crossfilter from 'crossfilter';
import Loading from '../utility/Loading';
import CustomRadio from '../utility/CustomRadio';

function TaskGraph() {

    var chartData = [];

    async function getData(url) {
        const response = await fetch(url, {
            method: 'GET'
        });
        return response.json(); 
    }

    const prepareData = (data, statusFilter = '') => {
        let cf = crossfilter(data);

        if(statusFilter) {
            cf.dimension((d) => {return d.status}).filter(statusFilter);
        }

        let analystDim = cf.dimension((d) => {return d.analyst});

        let series = analystDim.group().reduceSum((d) => {return d.amount}).all();

        // changing format of data to feed highchart
        let seriesData = [];
        for(let i=0; i<series.length; i++) {
            let obj = {
                name: '',
                y: 0
            };
            obj.name = series[i].key;
            obj.y = series[i].value;
            seriesData.push(obj)
        }

        return [{
            name: 'Task Share',
            data: seriesData
        }]
    }

    const loadChart = () => {
        
        var URL = 'http://apiforreact-env.eba-umuhetyq.ap-south-1.elasticbeanstalk.com/Admin/fetch-task-performance.php';

        getData(URL)
        .then(data => {
            chartData = data.data;
            data = prepareData(data.data);
            let analystSelect = document.getElementById('analyst-filter-select');
            analystSelect.innerHTML = '';

            let option = document.createElement('option');
            option.innerText = 'Select Analyst Filter';
            option.value = '';
            option.selected = true;
            analystSelect.appendChild(option);

            for(let i=0; i<data.length; i++) {
                let option = document.createElement('option');
                option.innerText = data[i].name;
                option.value = data[i].name;
                analystSelect.appendChild(option);
            }
            document.getElementsByName('status2')[2].checked = true;
            renderChart(data);
            
        });
    }

    
    const updateChart = () => {
        let status = document.getElementsByName('status1');
        let statusFilter = '';
        for(let i=0; i<status.length; i++) {
            if(status[i].checked) { 
                statusFilter = status[i].value;
                break;
            }
        }
        let data = prepareData(chartData, statusFilter);
        renderChart(data);
    }

    const renderChart = (data) => {

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
                        onclick={updateChart}
                    />
                    <CustomRadio 
                        value='Pending' 
                        text='Pending'
                        name='status1'
                        icon='fas fa-box-open'
                        onclick={updateChart}
                    />
                    <CustomRadio 
                        value='' 
                        text='Accumulated'
                        name='status1'
                        icon='fas fa-box'
                        checked={true}
                        onclick={updateChart}
                    />
                </div> 
            </div>
            <div className='flex-row jc-e'>
                <button className='btn btn-primary btn-medium' onClick={loadChart}><i className='fas fa-sync'/> Refresh</button>
            </div>
            {loadChart()}
        </>
    )
}

export default TaskGraph
