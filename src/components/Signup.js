import React from 'react'
import {Link} from 'react-router-dom'
import '../components/css/Signup.css'
import InputBottomBorder from './utility/InputBottomBorder';

function Signup() {
    
    async function postData(url, data) {
        const response = await fetch(url, {
            method: 'POST',
            body: data 
          });
        return response.json(); 
    }

    const handleSubmit = (e) => {
        e.preventDefault();
        let inputBlock = e.target.getElementsByClassName('input-block');
        
        let inputs1 = inputBlock[0].getElementsByTagName('input');
        let inputs2 = inputBlock[1].getElementsByTagName('input');
        let inputs3 = inputBlock[2].getElementsByTagName('input');

        let body = new FormData;
        body.append('firstName', inputs1[0].value);
        body.append('lastName', inputs1[1].value);
        body.append('email', inputs2[0].value);
        body.append('contact', inputs2[1].value);
        body.append('password', inputs3[0].value);
        body.append('confirmPassword', inputs3[1].value);
        
        postData('http://apiforreact-env.eba-umuhetyq.ap-south-1.elasticbeanstalk.com/Admin/register.php', body)
        .then(data => {
              populateResponse(data)
        });

    }

    const populateResponse = (res) => {
        let form = document.getElementById('signup-form');
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
            let firstName = errorLog.firstName ? icon + errorLog.firstName : '';
            let email = errorLog.email ? icon + errorLog.email : '';
            let contact = errorLog.contact ? icon + errorLog.contact : '';
            let password = errorLog.password ? icon + errorLog.password : '';
            let confirmPassword = errorLog.confirmPassword ? icon + errorLog.confirmPassword : '';
            formResponse[0].innerHTML = firstName;
            formResponse[2].innerHTML = email;
            formResponse[3].innerHTML = contact;
            formResponse[4].innerHTML = password;
            formResponse[5].innerHTML = confirmPassword;
        }
    }
  
    const handleReset = () => {
        let form = document.getElementById('signup-form');
        form.reset();
    }

    const resetResponse = () => {
        let form = document.getElementById('add-task-form');
        let formResponse = form.getElementsByClassName('response');
        for(let i=0; i<formResponse.length; i++)
            formResponse[i].innerText = '';
    }

    return (
        <>
            <div className='signup-container flex-row jc-c ai-c'>
                <form id="signup-form" onSubmit={handleSubmit}>
                    <div className='header'>Admin Registration</div>
                    <div className='form-success'></div>
                    <div className='form-error'></div>
                    <div className='input-block'>
                        <InputBottomBorder 
                            name='firstName' 
                            type='text' 
                            label='First Name'
                            required={false}
                        />
                        <InputBottomBorder 
                            name='lastName' 
                            type='text' 
                            label='Last Name'
                            required={false}
                        />
                    </div>
                    <div className='input-block'>
                        <InputBottomBorder 
                            name='email' 
                            type='email' 
                            label='E-mail'
                            required={false}
                        />
                        <InputBottomBorder 
                            name='contact' 
                            type='number' 
                            label='Contact'
                            required={false}
                        />
                    </div>
                    <div className='input-block'>
                        <InputBottomBorder 
                            name='password' 
                            type='password' 
                            label='Password'
                            required={false}
                        />
                        <InputBottomBorder 
                            name='confirmPassword' 
                            type='password' 
                            label='Confirm Password'
                            required={false}
                        />
                    </div>
                    <div className='flex-row jc-sb'>
                        <div onClick={handleReset} className='btn btn-secondary btn-medium'>Reset</div>
                        <button className='btn btn-primary btn-medium'>Register</button>
                    </div>
                    <div className='footer'>
                        Already have an account? <Link to='/signin'>Signin</Link>
                    </div>
                </form>
            </div>
        </>
    )
}

export default Signup
