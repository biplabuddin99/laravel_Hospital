import React from "react";

const Navbar = () => {

return (<>
  <nav className="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div className="top-area">
          <div className="container">
            <div className="row">
              <div className="col-sm-6 col-md-6">
                <p className="bold text-left">Monday - Saturday, 8am to 10pm </p>
              </div>
              <div className="col-sm-6 col-md-6">
                <p className="bold text-right">Call us now +8801628682796</p>
              </div>
            </div>
          </div>
        </div>
        <div className="container navigation">
  
          <div className="navbar-header page-scroll">
            <button type="button" className="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                      <i className="fa fa-bars"></i>
                  </button>
            <a className="navbar-brand" href="#home"> <img src="frontend/img/logo.png" alt="" width="50" height="30" />Hospital</a>
          </div>
  
         
          <div className="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul className="nav navbar-nav">
              <li className="active"><a href="#intro">Home</a></li>
              <li><a href="#service">Service</a></li>
              <li><a href="#doc">Doctors</a></li>
              <li><a href="#facilities">Facilities</a></li>
            </ul>
          </div>
  
        </div>
      </nav>
</>);
}

export default Navbar;