import React from 'react'
import SaveTask from './dashboard/SaveTask'
import TaskGraph from './graphs/TaskShareGraph'
import PerformanceGraph from './graphs/PerformanceGraph'

import './css/Dashboard.css'
import CollectionBarGraph from './graphs/CollectionBarGraph'

function Dashboard() {

    return (
        <div className='dashboard'>
            <div className='flex-col'>
                <div className='graph-container flex-row'>
                    <div className='flex-col flex-full'>
                        <TaskGraph />
                    </div>
                    <div className='flex-col flex-full'>
                        <CollectionBarGraph />
                    </div>
                </div>
                <div className='graph-container flex-row'>
                    <div className='flex-full'>
                        <PerformanceGraph />
                    </div>
                </div>
            </div>
            <div>
                <SaveTask />
            </div>
        </div>
    )
}

export default Dashboard
