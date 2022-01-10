import React from 'react'
import CustomRadio from '../utility/CustomRadio';

function SaveTask() {

    const resetResponse = () => {
        let form = document.getElementById('add-task-form');
        let formResponse = form.getElementsByClassName('response');
        for(let i=0; i<formResponse.length; i++)
            formResponse[i].innerText = '';
    }


    const handleReset = () => {
        let form = document.getElementById('add-task-form');
        form.reset();
    }

    async function postData(url, data) {
        const response = await fetch(url, {
            method: 'POST',
            body: data 
          });
        return response.json(); 
    }

    const populateResponse = (res) => {
        let form = document.getElementById('add-task-form');
        let successBlock =form.getElementsByClassName('form-success')[0];
        successBlock.style.display = 'none';
        let errorBlock = form.getElementsByClassName('form-error')[0];
        errorBlock.style.display = 'none';
        let success = res.success;
        let error = res.error;
        let errorLog = res.errorLog;

        if(success) {
            successBlock.innerHTML = success;
            successBlock.style.display = 'block';
            errorBlock.style.display = 'none';
            form.reset();
            resetResponse();
        }
        else {
            errorBlock.innerHTML = error;
            errorBlock.style.display = 'block';
            let icon = '<i class="fas fa-exclamation-circle"></i>';
            let formResponse = form.getElementsByClassName('response');
            let title = errorLog.title ? icon + errorLog.title : '';
            let amount = errorLog.amount ? icon + errorLog.amount : '';
            let analyst = errorLog.analyst ? icon + errorLog.analyst : '';
            let status = errorLog.status ? icon + errorLog.status : '';
            formResponse[0].innerHTML = title;
            formResponse[1].innerHTML = amount;
            formResponse[2].innerHTML = analyst;
            formResponse[3].innerHTML = status;
        }
    }
  
    const handleSubmit = (e) => {
        e.preventDefault();
        let inputBlock = e.target.getElementsByClassName('input-block');
        
        let inputs1 = inputBlock[0].getElementsByTagName('input');
        let inputs2 = inputBlock[1].getElementsByTagName('input');
        let inputs3 = inputBlock[2].getElementsByTagName('input');

        let body = new FormData;
        body.append('title', inputs1[0].value);
        body.append('amount', inputs1[1].value);
        body.append('analyst', inputs2[0].value);
        let status = inputs3[0].checked ? inputs3[0].value : inputs3[1].value;
        body.append('status', status);

        
        postData('http://apiforreact-env.eba-umuhetyq.ap-south-1.elasticbeanstalk.com/Admin/add-task.php', body)
        .then(data => {
             populateResponse(data);
        });

    }


    return (
        <div className='signup-container flex-row jc-c ai-c'>
            <form id="add-task-form" onSubmit={handleSubmit}>
                <div className='header'>Add Task</div>
                <div className='form-success'></div>
                <div className='form-error'></div>
                <div className='input-block'>
                    <div className='input-container-bottom-border'>
                        <label>Title</label>
                        <input type="text" name="title" />
                        <div className='response'></div>
                    </div>
                    <div className='input-container-bottom-border'>
                        <label>Amount</label>
                        <input type="number" step="0.000001" name="amount" />
                        <div className='response'></div>
                    </div>
                </div>
                <div className='input-block'>
                    <div className='input-container-bottom-border'>
                        <label>Done by</label>
                        <input type="text" name="analyst" />
                        <div className='response'></div>
                    </div>
                </div>
                <div className='input-block'>
                    <div className='customized-radio'>
                        <CustomRadio 
                            value='Completed' 
                            text='Completed'
                            name='status'
                            icon='fas fa-box-open'
                        />
                        <CustomRadio 
                            value='Pending' 
                            text='Pending'
                            name='status'
                            icon='fas fa-box'
                        />
                    </div>
                    <div className='response'></div>
                </div>
                <div className='flex-row jc-sb'>
                    <div onClick={handleReset} className='btn btn-secondary btn-medium'>Reset</div>
                    <button className='btn btn-primary btn-medium'>Add</button>
                </div>
                <div className='footer'>
                    Add your task and see analytics.
                </div>
            </form>
        </div>
    )
}

export default SaveTask
