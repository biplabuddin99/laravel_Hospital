import React,{useEffect,useState} from "react";
//import axios from "axios";

export default function Doctors(){
  return(

    <section id="doc" className="home-section bg-gray paddingbot-60">
    <div className="container marginbot-50">
      <div className="row">
        <div className="col-lg-8 col-lg-offset-2">
          <div>
            <div className="section-heading text-center">
              <h2 className="h-bold">Doctors</h2>
              <p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
            </div>
          </div>
          <div className="divider-short"></div>
        </div>
      </div>
    </div>

    <div className="container">
      <div className="row">
        <div className="col-md-3 div_wrap" >
    <div className="wrapper">
      <a href="" className="anchor">
                  {/* @if($l->employee->picture == '')
                  <i className="fa fa-user-md" style="font-size:150px;"></i>
              @else
                  <img src="{{ asset('uploads/employee/'.$l->employee->picture) }}" alt="no image" width="250" height="200"/>
              @endif */}
        <div className="wrap_child">
          <div className='text'>view profile</div>
        </div>
      </a>
    </div>
    <div className="name"></div>
    <div className="dep"></div>
    </div>

      </div>
    </div>

  </section>
    );
  }