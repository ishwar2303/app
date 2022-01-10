import React from 'react'
import Highcharts from 'highcharts';
import crossfilter from 'crossfilter';
import Loading from '../utility/Loading';
import CustomRadio from '../utility/CustomRadio';

function PerformanceGraph() {

    var chartData = [];

    async function getData(url) {
        const response = await fetch(url, {
            method: 'GET'
        });
        return response.json(); 
    }

    function reduceAdd(p, v, nf) {
        p.data.push(v.amount);
        return p;
    }

    function reduceRemove(p, v, nf) {
        p.data.pop();
        return p;
    }

    function reduceInitial() {
        return {data: []};
    }

    const prepareData = (data, analystFilter = '', statusFilter = '') => {
        let cf = crossfilter(data);

        if(analystFilter) {
            cf.dimension((d) => {return d.analyst}).filter(analystFilter);
        }
        if(statusFilter) {
            cf.dimension((d) => {return d.status}).filter(statusFilter);
        }

        let analystDim = cf.dimension((d) => {return d.analyst});

        let series = analystDim.group().reduce(reduceAdd, reduceRemove, reduceInitial).all();
        
        let seriesData = [];
        for(let i=0; i<series.length; i++) {
            let obj = {
                name: series[i].key,
                data: series[i].value.data
            }
            seriesData.push(obj);
        }

        return seriesData
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
            option.innerText = 'All Analyst';
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
        let analystFilter = document.getElementById('analyst-filter-select').value;
        let status = document.getElementsByName('status2');
        let statusFilter = '';
        for(let i=0; i<status.length; i++) {
            if(status[i].checked) { 
                statusFilter = status[i].value;
                break;
            }
        }
        let data = prepareData(chartData, analystFilter, statusFilter);
        renderChart(data);
    }

    const renderChart = (data) => {
        Highcharts.chart('graph-2', {

            title: {
                text: 'Analyst Performance'
            },
        
            subtitle: {
                text: null
            },
            credits: {
                enabled: false
            },
        
            yAxis: {
                title: {
                    text: 'Payment of task'
                }
            },
        
            xAxis: {
                title: {
                    text: 'Number of tasks'
                },
                accessibility: {
                    rangeDescription: 'Range: 2010 to 2017'
                }
            },
        
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.x + '</b>' + '<br/>' + this.y + ' $';
                },
                valueSuffix: ' $'
            },
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 1
                }
            },
        
            series: data,
        
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        
        });
    }
    return (
        <>
            <div id="graph-2">
                <Loading />
            </div>
            <div className='input-block'>
                <div className='customized-radio-black'>
                    <CustomRadio 
                        value='Completed' 
                        text='Completed'
                        name='status2'
                        icon='fas fa-check'
                        onclick={updateChart}
                    />
                    <CustomRadio 
                        value='Pending' 
                        text='Pending'
                        name='status2'
                        icon='fas fa-box-open'
                        onclick={updateChart}
                    />
                    <CustomRadio 
                        value='' 
                        text='Accumulated'
                        name='status2'
                        icon='fas fa-box'
                        checked={true}
                        onclick={updateChart}
                    />
                    <div className='flex-row jc-sb ml-10'>
                        <select id="analyst-filter-select" className='mr-10' onChange={updateChart}>
                        </select>
                        <button className='btn btn-primary btn-medium' onClick={loadChart}><i className='fas fa-sync'/> Refresh</button>
                    </div>
                </div> 
            </div>
            {loadChart()}
        </>
    )
}

export default PerformanceGraph
