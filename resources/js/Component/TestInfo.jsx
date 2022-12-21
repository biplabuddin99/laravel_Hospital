import React,{useEffect,useState} from "react";
//import axios from "axios";

export function Service(){
  return(
      <section id="service" className="home-section nopadding paddingtop-60">

      <div className="container">

        <div className="row">
          <div className="col-sm-6 col-md-6">
            <div>
              <img src={'frontend/img/dummy/img-1.jpg'} className="img-responsive" alt="" />
            </div>
          </div>
          <div className="col-sm-3 col-md-3">

            <div >
              <div className="service-box">
                <div className="service-icon">
                  <span className="fa fa-stethoscope fa-3x"></span>
                </div>
                <div className="service-desc">
                  <h5 className="h-light">Medical checkup</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>

            <div >
              <div className="service-box">
                <div className="service-icon">
                  <span className="fa fa-wheelchair fa-3x"></span>
                </div>
                <div className="service-desc">
                  <h5 className="h-light">Nursing Services</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>
            <div >
              <div className="service-box">
                <div className="service-icon">
                  <span className="fa fa-plus-square fa-3x"></span>
                </div>
                <div className="service-desc">
                  <h5 className="h-light">Pharmacy</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>


          </div>
          <div className="col-sm-3 col-md-3">

            <div >
              <div className="service-box">
                <div className="service-icon">
                  <span className="fa fa-h-square fa-3x"></span>
                </div>
                <div className="service-desc">
                  <h5 className="h-light">Gyn Care</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>

            <div >
              <div className="service-box">
                <div className="service-icon">
                  <span className="fa fa-filter fa-3x"></span>
                </div>
                <div className="service-desc">
                  <h5 className="h-light">Neurology</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>
            <div >
              <div className="service-box">
                <div className="service-icon">
                  <span className="fa fa-user-md fa-3x"></span>
                </div>
                <div className="service-desc">
                  <h5 className="h-light">Sleep Center</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
      </section>);
  }