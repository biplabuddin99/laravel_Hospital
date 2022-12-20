import React,{useEffect,useState} from "react";
//import axios from "axios";

export default function HomeIntro(){
  return(

      <div id="intro" className="intro">
        <div className="intro-content">
          <div className="container">
            <div className="row">
              <div className="col-md-5 float-end">
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
                      <label for="department">Department Name<span style="color:red">*</span>:</label>
                      <select className="form-control select2" style="width: 100%;" id="department" name="department">
                        <option value="">-- select department --</option>
                        
                          <option value="">data</option>
                      
                      </select>
                      <div className="error" style="color:red;font-style:italic;"></div>
                    </div>
                    <div className="form-group">
                      <label for="doctor">Doctor Name <span style="color:red">* </span>:</label>
                      <select className="form-control select2" style="width: 100%;" id="doctor" name="doctor_id">
                            <option value=""></option>
                        </select>
                        <div className="error" style="color:red;font-style:italic;"></div>
                        <div id="sch_data" style="color:green;font-size:14px;"></div>
                    </div>
                                  <div className="form-group">
                      <label for="patientPhone">Contact :</label>
                      <input type="text" name="patientPhone" id="patientPhone" className="form-control" value=""/>
                    </div>
                                  
                    <div className="form-group">
                      <label for="app_date">Appointment Date <span style="color:red">* </span>:</label>
                      <div className="input-group date">
                        <div className="input-group-addon">
                        <i className="fa fa-calendar"></i>
                        </div>
                        <input type="date" className="form-control app_date" min="" name="appoint_date" value=""/>
                      </div>
                      <div className="error" style="color:red;font-style:italic;"></div>
                    </div>
      
                    <div className="form-group">
                      <label for="serial">Serial No <span style="color:red">* </span>:</label>
                      <div className="ee" style="display:none;color:red">
                          No Schedule available
                      </div>
                      <div className="ss">
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial1">01</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial2">02</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial3">03</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial4">04</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial5">05</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial6">06</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial7">07</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial8">08</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial9">09</a>
                      <a className="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial10">10</a>
                      <input type="hidden" name="serial" id="serial_div" />
                      </div>
                    </div>
                    <div className="error" style="color:red;font-style:italic;"></div>
      
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
                                          <label for="patientName">Full Name <span style="color:red">*</span>:</label>
                      <input type="text" className="form-control" id="patientName" name="patientName" placeholder="First Name" required/>
                    </div>
                    <div className="col-md-6">
                                          <label for="patientAge">Age <span style="color:red">*</span>:</label>
                      <input type="number" className="form-control" id="patientAge" name="patientAge" placeholder="Age" required/>
                    </div>
                  </div>
                </div>
                  <div className="form-group">
                  <label for="patientPhone">Contact<span style="color:red">*</span>:</label>
                  <input type="text" className="form-control" id="patientPhone" name="patientPhone" placeholder="Mobile Number" required/>
                </div>
                <div className="form-group">
                  <label for="patientGender">Gender<span style="color:red">*</span>:</label>
                  &nbsp;
                  <input type="radio" name="patientGender" value="1"/> Male
                  &nbsp;
                  <input type="radio" name="patientGender" value="2"/> Female
                  &nbsp;
                  <input type="radio" name="patientGender" value="3"/> Common
                </div>
                <div className="form-group">
                  <label for="birth_date">Date of Birth<span style="color:red">*</span>:</label>
                  <input type="date" className="form-control" id="birth_date" name="birth_date" placeholder="Date of Birth" required/>
                </div>
                <div className="form-group">
                  <label for="patientBlood">Blood Group:</label>
                  <select className="form-control" id="patientBlood" name="patientBlood" required>
                    <option value="0">-- select --</option>
                  </select>
                </div>
                <div className="form-group">
                  <label for="patientAddress">Address<span style="color:red">*</span>:</label>
                  <textarea name="patientAddress" id="patientAddress" className="form-control" rows="1" required></textarea>
                </div>
                <div className="form-group">
                  <label for="patientProblem">Problem<span style="color:red">*</span>:</label>
                  <textarea name="patientProblem" id="patientProblem" className="form-control" rows="1" required></textarea>
                </div>
                <button type="submit" className="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
          </div>
  
              </div>
              <div className="col-lg-6">
                <div className="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                  <img src="frontend/img/dummy/frontimg1.png" className="img-responsive" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      );
    }