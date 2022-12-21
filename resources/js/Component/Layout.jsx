import React,{useEffect,useState} from "react";
import Boxes from "./Boxes";
import Callaction from "./Callaction";
import HomeIntro from './HomeIntro';
import Navbar from "./Navbar";
import {Service} from "./TestInfo";
import Team from "./Team";
import Partner from "./Partner";
import Footer from "./Footer";
import Doctors from "./Doctors";
//import axios from "axios";

export default function Layout(){
  return(

    <div className='wrapper'>
        <Navbar/>
        <HomeIntro />
        <Boxes/>
        <Callaction/>
        <Service />   
        <Doctors />   
        {/*  */}
        <Team/>
        <Partner/>
        <Footer/>

      </div>
      
  );
}