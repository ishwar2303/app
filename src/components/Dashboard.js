import React from 'react'
import SaveTask from './dashboard/SaveTask'
import TaskGraph from './graphs/TaskShareGraph'
import PerformanceGraph from './graphs/PerformanceGraph'

import './css/Dashboard.css'

function Dashboard() {

    return (
        <div className='dashboard'>
            <div className='graph-container flex-row'>
                <div className='flex-col flex-full'>
                    <TaskGraph />
                </div>
                <div className='flex-full'>
                    <PerformanceGraph />
                </div>
            </div>
            <div>
                <SaveTask />
            </div>
        </div>
    )
}

export default Dashboard
