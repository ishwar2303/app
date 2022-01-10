import React from 'react'
import Highcharts from 'highcharts';
import crossfilter from 'crossfilter';
import Loading from '../utility/Loading';
import CustomRadio from '../utility/CustomRadio';

function CollectionBarGraph() {
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

    const prepareData = (data) => {
        let cf = crossfilter(data);

        cf.dimension((d) => {return d.status}).filter("Completed");
        

        let analystDim = cf.dimension((d) => {return d.analyst});

        let series = analystDim.group().reduceSum((d) => {return d.amount}).all();
        
        series.sort((a, b) => {
            return b.value - a.value;
        });

        let seriesData = {
            name: 'Analyst',
            data: []
        };

        let categories = [];
        for(let i=0; i<series.length && i<5; i++)
        {
            categories.push(series[i].key);
            seriesData.data.push(series[i].value);
        }
        
        return {
            categories,
            seriesData: [seriesData]
        }
    }

    const loadChart = () => {
        var URL = 'http://apiforreact-env.eba-umuhetyq.ap-south-1.elasticbeanstalk.com/Admin/fetch-task-performance.php';
        

        getData(URL)
        .then(data => {
            chartData = data.data;
            data = prepareData(data.data);
            console.log(data);
            renderChart(data.seriesData, data.categories);
            
        });
    }


    const updateChart = () => {
        let data = prepareData(chartData);
        renderChart(data);
    }

    const renderChart = (data, dataCategories) => {
        Highcharts.chart('graph-3', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Top analyst by collection'
            },
            subtitle: {
                text: null
            },
            xAxis: {
                labels: {
                    align: 'left',
                    x: 3,
                    y: -15,
                    style: {
                        color: 'blue',
                    }
                },
                categories: dataCategories,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Amount',
                    align: 'high',
                },
                labels: {
                    overflow: 'justify',
                    rotation: 45
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.x + '</b>' + '<br/>' + this.y + ' $';
                },
                valueSuffix: ' $'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            series: data
        });
    }
    
    return (
        <>
            <div id="graph-3">
                <Loading />
            </div>
            <div className='flex-row jc-e'>
                <button className='btn btn-primary btn-medium' onClick={loadChart}><i className='fas fa-sync'/> Refresh</button>
            </div>
            {loadChart()}
        </>
    )
}

export default CollectionBarGraph
