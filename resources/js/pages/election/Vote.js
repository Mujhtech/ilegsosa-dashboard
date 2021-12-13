import React from 'react'
import Nav from '../../components/Nav'
import Sidebar from '../../components/Sidebar'

export default function Vote() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />
            <div className="main-content">
                <section className="section">
                    <div className="section-header">
                        <h1>Cast Vote</h1>
                    </div>
                    <div className="row">
                        <div className="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div className="card">
                                <div className="card-header">
                                    <h4>Board of Directors Election</h4>
                                </div>
                                <div className="card-body">
                                    <div className="section-title">For President</div>
                                    <div className="custom-control custom-radio">
                                        <input type="radio" id="candidate1" name="President" className="custom-control-input" />
                                        <label class="custom-control-label" for="candidate1">High Royal Highness (Engineer) Adedoyin Adelekun</label>
                                    </div>
                                    <div className="custom-control custom-radio">
                                        <input type="radio" id="candidate2" name="President" className="custom-control-input" />
                                        <label class="custom-control-label" for="candidate2">Olusegun Adewumi Adepoju</label>
                                    </div>

                                    <div className="custom-control custom-radio">
                                        <input type="radio" id="candidate3" name="President" className="custom-control-input" />
                                        <label class="custom-control-label" for="candidate3">Oyediran Babatunde</label>
                                    </div>

                                </div>
                                <div className="card-body">
                                    <div className="section-title">For Secretary</div>
                                    <div className="custom-control custom-radio">
                                        <input type="radio" id="candidate15" name="Secretary" className="custom-control-input" />
                                        <label class="custom-control-label" for="candidate15">Mr.Rotimi Ijitona</label>
                                    </div>
                                    <div className="custom-control custom-radio">
                                        <input type="radio" id="candidate26" name="Secretary" className="custom-control-input" />
                                        <label class="custom-control-label" for="candidate26">Oshadare Adewale</label>
                                    </div>

                                    <div className="custom-control custom-radio">
                                        <input type="radio" id="candidate36" name="Secretary" className="custom-control-input" />
                                        <label class="custom-control-label" for="candidate36">Fadahunsi Precious</label>
                                    </div>

                                </div>
                                <button className="btn btn-primary mt-3" href="#" role="button">Submit Vote</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    )
}
