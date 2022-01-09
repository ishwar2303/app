import React from 'react'
import {Link} from 'react-router-dom'
import '../components/css/Header.css'

function Header() {
    return (
        <>
            <header className='main-header'>
                <div className='logo flex-row jc-c'>
                    <h3>Apple.com</h3>
                </div>
                <div className='navigation flex-full flex-row jc-c'>
                    <Link to='/' className='main-header-active-link'>Home</Link>
                    <Link to='/services' className='main-header-in-active-link'>Services</Link>
                    <Link to='/products' className='main-header-in-active-link'>Products</Link>
                    <Link to='/contact-us' className='main-header-in-active-link'>Contact Us</Link>
                    <Link to='/dashboard' className='main-header-in-active-link'>Dashboard</Link>
                </div>
                <div className='sign-up flex-row'>

                    <Link to='/signup' className='btn btn-primary btn-medium'>Sign Up</Link>
                    <Link to='/signin' className='btn btn-primary btn-medium'>Sign In</Link>

                </div>
            </header>
            <div className='main-header-padding'></div>
        </>

    )
}

export default Header
