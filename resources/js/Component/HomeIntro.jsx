import axios from "axios";
import React,{useEffect,useState } from "react";
import CrudService from '../services/CrudService';
//import {useNavigate} from 'react-router-dom';

export default function HomeIntro(){
  //const navigate = useNavigate();
    const [pregi, setPregi]= useState();
    const [bloods, setBloods]= useState([]);
    const [isLoadding, setIsLoadding]= useState(false);
    const [isError, setIsError]= useState(false);

    useEffect(()=>{
      getBlood();
  },[]);
    const handelRegiChange = event =>{
        const {name, value} =event.target;
        setPregi({...pregi,[name]:value});
    }
    const saveRegi= () =>{
      CrudService.registration(pregi).then(response=>{
        document.getElementById('p_id_msg').innerHTML="Your Patient ID is "+response.data.patient_id
        console.log(response.data);
			//navigate('/students');
        }).catch(e=>{
            console.log(e);
        });
    }

    const getBlood= () =>{
      setIsLoadding(true);
      axios.get('http://localhost:8000/api/blood').then((res)=>{
        console.log('res:',res.data);
        setBloods(res.data)
      }).catch((err)=>{
        setIsError(err)
        console.log('err:',err);
      });
      setIsLoadding(false)

      // CrudService.getBlood().then(response=>{
      //   setBloods(response.data);console.log(response.data);
      //   console.log(bloods);
      //   }).catch(e=>{
      //       console.log(e);
      //   });
    }

    const content = !isLoadding && !isError && bloods.length  > 0 && bloods.map((blood) => {
      return (
        <option key={blood.id}>{blood.blood_name}</option>
      );
    });

  return(
      <div id="intro" className="intro">
        <div className="intro-content">
          <div className="container">
            <div className="row">
              <div className="col-md-5 float-end">
                <span className="text-success" id="p_id_msg"></span>
              </div>
            </div>
            <div className="row">
              <div className="col-lg-5  float-end">
                <ul className="nav nav-tabs fw-bold">
                  <li className="active"><a data-toggle="tab" href="#home">Appointment</a></li>
                  <li><a data-toggle="tab" href="#menu1">Registration</a></li>
                </ul>
                <div className="tab-content">
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
            <div id="menu1" className="tab-pane fade">
              <form className="form-horizontal" method="post" action="">
                <div className="front_from">
                  <div className="form-group">
                    <div className="row">
                      <div className="col-md-6">
                        <label for="name">Full Name <span style={{color:"red"}}>*</span>:</label>
                        <input type="text" className="form-control" id="name" name="name" placeholder="First Name" required
                        onChange={handelRegiChange}/>
                    </div>
                    <div className="col-md-6">
                      <label for="age">Age <span style={{color:"red"}}>*</span>:</label>
                      <input type="number" className="form-control" id="age" name="age" placeholder="Age" required onChange={handelRegiChange}/>
                    </div>
                  </div>
                </div>
                  <div className="form-group">
                  <label for="phone">Contact<span style={{color:"red"}}>*</span>:</label>
                  <input type="text" className="form-control" id="phone" name="phone" placeholder="Mobile Number" required onChange={handelRegiChange}/>
                </div>
                <div className="form-group">
                  <label for="gender">Gender<span style={{color:"red"}}>*</span>:</label>
                  &nbsp;
                  <input type="radio" onChange={handelRegiChange} name="gender1" value="1"/> Male
                  &nbsp;
                  <input type="radio" onChange={handelRegiChange} name="gender2" value="2"/> Female
                  &nbsp;
                  <input type="radio" onChange={handelRegiChange} name="gender3" value="3"/> Common
                </div>
                <div className="form-group">
                  <label for="dob">Date of Birth<span style={{color:"red"}}>*</span>:</label>
                  <input type="date" className="form-control" id="dob" name="dob" placeholder="Date of Birth" required onChange={handelRegiChange}/>
                </div>
                <div className="form-group">
                  <label for="blood">Blood Group:</label>
                  <select className="form-control" id="blood" onChange={handelRegiChange} name="blood" required>
                   {content}
                  </select>
                </div>
                <div className="form-group">
                  <label for="address">Address<span style={{color:"red"}}>*</span>:</label>
                  <textarea name="address" id="address" className="form-control" rows="1" required></textarea>
                </div>
                <div className="form-group">
                  <label for="problem">Problem<span style={{color:"red"}}>*</span>:</label>
                  <textarea name="problem" id="problem" className="form-control" rows="1" required></textarea>
                </div>
                <button type="button" onClick={() => saveRegi()} className="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
          </div>
  
              </div>
              <div className="col-lg-6">
                <div>
                  <img src="frontend/img/dummy/frontimg1.png" className="img-responsive" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      );
    }