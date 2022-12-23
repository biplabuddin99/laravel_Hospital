import React,{useEffect,useState} from "react";
import Baseurl from '../http-common';
//import axios from "axios";

export default function Doctors(){
  const [doctors,setDoctors]=useState([]);
  const [isLoadding,setIsLoadding] = useState(true);
  const [isError,setIsError] = useState(false);
  const [error,setError] = useState('');
  

function getDoctor(){
  Baseurl.get('doctor').then(function({data}){
    setIsLoadding(true)
    setDoctors(data);
    setIsLoadding(false)
  }).catch(function(error){
console.log(error)
  });
}

useEffect(function(){
  getDoctor()
},[])

// content
const content=   !isLoadding && doctors.length > 0 && doctors.map(function(doctor){
return (<div className="col-md-3 div_wrap" >
<div className="wrapper">
  <a href={`/welcome/${doctor.doctorId}`} className="anchor">
    <img src={`/uploads/employee/${doctor.picture}`} alt="no image" width="250" height="200"/>
    <div className="wrap_child">
      <div className='text'>view profile</div>
    </div>
  </a>
</div>
<div className="name">{doctor.name}</div>
<div className="dep">{doctor.department}</div>
</div>);
})

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
       {content}

      </div>
    </div>

  </section>
    );
  }