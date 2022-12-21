import axios from 'axios';
import React,{useEffect, useState}from 'react'

const Appointment = () => {
    const [department,setDepartment] = useState([]);
    const [isLoadding,setIsLoadding] = useState(false);
    const [isError,setIsError] = useState(false);

    function getDepartment(){
        axios.get('https://jsonplaceholder.typicode.com/posts')
        .then(({data}) => {
            console.log('data:',data);
        })
        .catch((err) =>{
            console.log(err);
        });
    }

useEffect(()=>{
    getDepartment();
},[])


    return (
        <div id="home" className="tab-pane fade in active">
            <form className="form-horizontal" action="" method="post">
                <div className="front_from">
                    <div className="form-group">
                        <label for="patient_id">Patient Id<span className="text-danger">*</span>:</label>
                        <input type="hidden" name="id" id="p_id"/>
                        <input type="text" className="form-control" id="patient_id" name="patient_id" placeholder="Patient Id"/>
                        <div className="error text-danger f"></div>
                        <div id="pa_data" className="text-success fs-4"></div>
                    </div>
                    <div className="form-group">
                    <label for="department">Department Name<span style={{color:"red"}}>*</span>:</label>
                    <select className="form-control select2" style={{width:"100%"}} id="department" name="department">
                        <option value="">-- select department --</option>

                        <option value="">data</option>

                    </select>
                    <div className="error" style={{color:"red",fontStyle:"italic"}}></div>
                    </div>
                    <div className="form-group">
                    <label for="doctor">Doctor Name <span style={{color:"red"}}>* </span>:</label>
                    <select className="form-control select2" style={{width: "100%"}} id="doctor" name="doctor_id">
                            <option value=""></option>
                        </select>
                        <div className="error" style={{color:"red",fontStyle:"italic"}}></div>
                        <div id="sch_data" style={{color:"green",fontSize:"14px"}}></div>
                    </div>
                                <div className="form-group">
                    <label for="patientPhone">Contact :</label>
                    <input type="text" name="patientPhone" id="patientPhone" className="form-control" value=""/>
                    </div>

                    <div className="form-group">
                    <label for="app_date">Appointment Date <span style={{color:"red"}}>* </span>:</label>
                    <div className="input-group date">
                        <div className="input-group-addon">
                        <i className="fa fa-calendar"></i>
                        </div>
                        <input type="date" className="form-control app_date" min="" name="appoint_date" value=""/>
                    </div>
                    <div className="error" style={{color:"ReactDOM",fontStyle:"italic"}}></div>
                    </div>

                    <div className="form-group">
                    <label for="serial">Serial No <span style={{color:"red"}}>* </span>:</label>
                    <div className="ee" style={{display:"none",color:"red"}}>
                        No Schedule available
                    </div>
                    <div className="ss">
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial1">01</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial2">02</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial3">03</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial4">04</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial5">05</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial6">06</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial7">07</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial8">08</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial9">09</a>
                    <a className="btn btn-sm btn-success serial" style={{padding: "5px",fontSize:"12px"}} id="serial10">10</a>
                    <input type="hidden" name="serial" id="serial_div" />
                    </div>
                    </div>
                    <div className="error" style={{color:"red",fontStyle:"italic"}}></div>

                    <button type="submit" className="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    );
}

export default Appointment;
