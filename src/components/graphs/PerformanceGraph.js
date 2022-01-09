import React, { useState } from 'react'
import Highcharts from 'highcharts';
import crossfilter from 'crossfilter';
import Loading from '../Utility/Loading';
import CustomRadio from '../Utility/CustomRadio';

function PerformanceGraph() {

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

    const prepareData = (data) => {
        let cf = crossfilter(data);
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
        var URL = 'http://localhost/API/Admin/fetch-task-performance.php?status=';
        let filter = document.getElementsByName('status2');
        for(let i=0; i<filter.length; i++) {
            if(filter[i].checked) {
                URL += filter[i].value;
                break;
            }
        }
        console.log(URL)

        getData(URL)
        .then(data => {
            data = prepareData(data.data);
            renderChart(data);
            
        });
    }

    window.onload = () => {
        loadChart()
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
                        checked={true}
                    />
                    <CustomRadio 
                        value='Pending' 
                        text='Pending'
                        name='status2'
                        icon='fas fa-box-open'
                    />
                    <CustomRadio 
                        value='*' 
                        text='Accumulated'
                        name='status2'
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

export default PerformanceGraph
