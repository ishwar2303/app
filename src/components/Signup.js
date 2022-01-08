import React from 'react'
import {Link} from 'react-router-dom'
import '../components/css/Signup.css'

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
        
        postData('http://localhost/API/Admin/register.php', body)
        .then(data => {
              populateResponse(data)
        });

    }

    const populateResponse = (res) => {
        console.log(res)
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

    return (
        <div className='signup-container flex-row jc-c ai-c'>
            <form id="signup-form" onSubmit={handleSubmit} e>
                <div className='header'>Admin Registration</div>
                <div className='form-success'></div>
                <div className='form-error'></div>
                <div className='input-block'>
                    <div className='input-container-floating'>
                        <label>First Name</label>
                        <input type="text" name="firstName" />
                        <div className='response'></div>
                    </div>
                    <div className='input-container-floating'>
                        <label>Last Name</label>
                        <input type="text" name="lastName" />
                        <div className='response'></div>
                    </div>
                </div>
                <div className='input-block'>
                    <div className='input-container-floating'>
                        <label>E-mail</label>
                        <input type="text" name="email" />
                        <div className='response'></div>
                    </div>
                    <div className='input-container-floating'>
                        <label>Contact</label>
                        <input type="text" name="contact" />
                        <div className='response'></div>
                    </div>
                </div>
                <div className='input-block'>
                    <div className='input-container-floating'>
                        <label>Password</label>
                        <input type="password" name="password" />
                        <div className='response'></div>
                    </div>
                    <div className='input-container-floating'>
                        <label>Confirm Password</label>
                        <input type="password" name="confirmPassword" />
                        <div className='response'></div>
                    </div>
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
    )
}

export default Signup
