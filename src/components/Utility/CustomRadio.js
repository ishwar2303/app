import React from 'react'
import '../css/CustomRadio.css'

function CustomRadio(props) {
    return (
        <label>
            <input type="radio" value={props.value} name={props.name} defaultChecked={props.checked}/>
            <span>
                <i className={props.icon}></i>
                {props.text}
            </span>
        </label>
    )
}

export default CustomRadio
