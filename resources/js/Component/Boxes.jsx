import React from "react";

const Boxes = () => {

  return (<div id="boxes" className="home-section paddingtop-80">
  <div className="container">
    <div className="row">
      <div className="col-sm-3 col-md-3">
        <div>
          <div className="box text-center">

            <i className="fa fa-check fa-3x circled bg-skin"></i>
            <h4 className="h-bold">Make an appoinment</h4>
            <p>
              Registration is required to make an appointment.When making an appointment you should give the person your name and the reason for wanting an appointment.
            </p>
          </div>
        </div>
      </div>
      <div className="col-sm-3 col-md-3">
        <div>
          <div className="box text-center">

            <i className="fa fa-list-alt fa-3x circled bg-skin"></i>
            <h4 className="h-bold">Choose your package</h4>
            <p>
                Our health check-up programs are designed to promote good health and facilitate early detection of health problems. Our goal is to encourage people toward a longer and healthier life so that there will be HOPE of having quality time with family.
            </p>
          </div>
        </div>
      </div>
      <div className="col-sm-3 col-md-3">
        <div>
          <div className="box text-center">
            <i className="fa fa-user-md fa-3x circled bg-skin"></i>
            <h4 className="h-bold">Help by specialist</h4>
            <p>
              Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
            </p>
          </div>
        </div>
      </div>
      <div className="col-sm-3 col-md-3">
        <div>
          <div className="box text-center">

            <i className="fa fa-hospital-o fa-3x circled bg-skin"></i>
            <h4 className="h-bold">Get diagnostic report</h4>
            <p>
              Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>);
}

export default Boxes;