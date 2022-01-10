import React from 'react'

function InputBottomBorder(props) {
    return (
        <div className='input-container-bottom-border'>
            <label>{props.label}</label>
            <input type={props.type} name={props.name} required={props.required}/>
            <div className='response'></div>
        </div>
    )
}

export default InputBottomBorder
