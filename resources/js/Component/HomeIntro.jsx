import axios from "axios";
import React,{useEffect,useState } from "react";
import CrudService from '../services/CrudService';
import Appointment from "./Appointment";
import Registration from "./Registration"
//import {useNavigate} from 'react-router-dom';

export default function HomeIntro(){
  //const navigate = useNavigate();




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
                <Appointment/>
               <Registration/>

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
