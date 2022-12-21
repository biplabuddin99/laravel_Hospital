import React, { Component } from 'react';

class Team extends Component {
  render() {
    return (
      <section id="facilities" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div>
              <div class="section-heading text-center">
                <h2 class="h-bold">Our facilities</h2>
                <p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div>
              <div id="owl-works" class="owl-carousel">
                <div class="item">
                  <a href="frontend/img/photo/1.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg">
                    <img src={'frontend/img/photo/1.jpg'} class="img-responsive" alt="img"/>
                  </a>
                  </div>
                <div class="item">
                  <a href='frontend/img/photo/2.jpg' title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg">
                  <img src={'frontend/img/photo/2.jpg'} class="img-responsive " alt="img"/>
                  </a>
                  </div>
                <div class="item">
                  <a href='frontend/img/photo/3.jpg' title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg">
                  <img src={'frontend/img/photo/3.jpg'} class="img-responsive " alt="img"/>
                    </a></div>
                <div class="item">
                    <a href='frontend/img/photo/4.jpg' title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg">
                    <img src='frontend/img/photo/4.jpg' class="img-responsive " alt="img"/>
                    </a>
                  </div>
                <div class="item">
                    <a href='frontend/img/photo/5.jpg' title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg">
                      <img src='frontend/img/photo/5.jpg' class="img-responsive " alt="img"/>
                    </a>
                  </div>
                <div class="item">
                    <a href='frontend/img/photo/6.jpg' title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg">
                      <img src='frontend/img/photo/6.jpg' class="img-responsive " alt="img"/>
                    </a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section> 
    );
  }
}

export default Team;


