import axios from 'axios';
import React,{useEffect, useState}from 'react'
import BaseUrl from '../http-common';

const Appointment = () => {
    const [department,setDepartment] = useState([]);
    const [isLoadding,setIsLoadding] = useState(true);
    const [isError,setIsError] = useState(false);
    const [error,setError] = useState('');
    // form control
    const [patientId,SetPatient] = useState(null);
    const [departmentId,setDepartmentId] = useState(null);
    const [doctorId,setDoctorId] = useState(null);
    const [contact,setContact] = useState('');
    const [appointmentDate,setAppointmentDate] = useState('');
    const [serial,setSerail] = useState("");



// departmanet 
    function getDepartment(){
        setIsLoadding(true);
        BaseUrl.get('department')
        .then(({data}) => {           
            setDepartment(data);
            setIsLoadding(false);
        })
        .catch((err) =>{          
            setError(err);
        });        
        setIsLoadding(false);
    }

useEffect(()=>{    
    getDepartment();
},[])


// handle Submit function 
function handleSubmitForm(e){
    // e.preventdefault()
    setIsLoadding(true);
    const data = {
        phone:contact,
        status:1,
        appoint_date:appointmentDate,
        patient_id:$('#p_id').val(),
        employee_id:doctorId,
        problem:'',
        serial:$('#serial_div').val(),
    }
    BaseUrl.post('appoitment',data)
    .then(({data})=> {
        
        // document.getElementById("appointment").reset();
        setIsLoadding(false);
        formReset()
        setIsError(false)
        // if(data){
        //     document.getElementById('home').innerText = 'Data Saved';
        // }
    }),caches((err)=>{
        console.log(err)
        setIsError(true)
        setError(err)
        setIsLoadding(false);
    });
   
}

function formReset(){
        setAppointmentDate('');
        setContact('');
        setDepartment(null);
        document.getElementById('doctor_id').value = '';
        document.getElementById('patient_id').value = '';
        SetPatient('');
}



// content
const DepartmentContent = !isLoadding && !isError && department && department.length > 0 && department.map(dprt => <option key={dprt.id} value={dprt.id}>{dprt.name}</option>);


const errorContent = isError && <p className='text-danger'>{error}</p>;
    

const Loadding = isLoadding && <p className='text-xl'>Loadding.....</p>;

    return (
        <div id="home" className="tab-pane fade in active">
            {errorContent}
            {Loadding}
            <form className="form-horizontal" action="" method="post" id='appointment'>
        <div className="front_from">
            <div className="form-group">
                <label for="patient_id">Patient Id<span className="text-danger">*</span>:</label>
                <input type="hidden" name="id" id="p_id"/>
                <input type="text" className="form-control" id="patient_id" name="patient_id" placeholder="Patient Id" value={patientId} onChange={(e)=>SetPatient(e.target.value)}/>
                <div className="error text-danger f"></div>
                <div id="pa_data" className="text-success fs-4"></div>
            </div>
            <div className="form-group">
            <label for="department">Department Name<span style={{color:"red"}}>*</span>:</label>
            <select className="form-control select2" style={{width:"100%"}} id="department" name="department">
                <option value="">select department</option>
                {DepartmentContent}

            </select>
            <div className="error" style={{color:"red",fontStyle:"italic"}}></div>
            </div>
            <div className="form-group">
            <label for="doctor">Doctor Name <span style={{color:"red"}}>* </span>:</label>
            <select className="form-control select2" style={{width: "100%"}} id="doctor" name="doctor_id" value={doctorId} onChange={(e)=>setDoctorId(e.target.value)}>
                    <option value=""></option>
                </select>
                <div className="error" style={{color:"red",fontStyle:"italic"}}></div>
                <div id="sch_data" style={{color:"green",fontSize:"14px"}}></div>
            </div>
                        <div className="form-group">
            <label for="patientPhone">Contact :</label>
            <input type="text" name="patientPhone" id="patientPhone" className="form-control" value={contact} onChange={(e)=> setContact(e.target.value)}/>
            </div>

            <div className="form-group">
            <label for="app_date">Appointment Date <span style={{color:"red"}}>* </span>:</label>
            <div className="input-group date">
                <div className="input-group-addon">
                <i className="fa fa-calendar"></i>
                </div>
                <input type="date" className="form-control app_date" min="" name="appoint_date" onChange={(e)=>setAppointmentDate(e.target.value)}/>
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

            <button type="button" className="btn btn-primary" disabled={isLoadding} onClick={(e)=>handleSubmitForm(e)}>Submit</button>
        </div>
    </form>;
        </div>
    );
}

export default Appointment;
